<?php

namespace Tests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Illuminate\Support\Collection;
use Laravel\Dusk\TestCase as BaseTestCase;
use PHPUnit\Framework\Attributes\BeforeClass;

abstract class DuskTestCase extends BaseTestCase
{
    /**
     * Prepare for Dusk test execution.
     */
    #[BeforeClass]
    public static function prepare(): void
    {
        if (! static::runningInSail()) {
            static::startChromeDriver(['--port=9515']);
        }
    }

    /**
     * Create the RemoteWebDriver instance.
     */
//    protected function driver(): RemoteWebDriver
//    {
//        $options = (new ChromeOptions)->addArguments(collect([
//            $this->shouldStartMaximized() ? '--start-maximized' : '--window-size=1920,1080',
//            '--disable-search-engine-choice-screen',
//        ])->unless($this->hasHeadlessDisabled(), function (Collection $items) {
//            return $items->merge([
//                '--disable-gpu',
//                '--headless=new',
//            ]);
//        })->all());
//
//        return RemoteWebDriver::create(
//            $_ENV['DUSK_DRIVER_URL'] ?? env('DUSK_DRIVER_URL') ?? 'http://localhost:9515',
//            DesiredCapabilities::chrome()->setCapability(
//                ChromeOptions::CAPABILITY, $options
//            )
//        );
//    }


    protected function driver()
    {
        $options = (new ChromeOptions)->addArguments([
            '--disable-gpu',
            '--headless',
            '--window-size=1920,1080',
            '--no-sandbox',
            '--disable-dev-shm-usage',
        ]);

        return RemoteWebDriver::create(
                    'http://selenium:4444/wd/hub', DesiredCapabilities::chrome()->setCapability(
            ChromeOptions::CAPABILITY, $options
        )
        );
    }

    protected function waitForSelenium()
    {
        $maxAttempts = 30;
        $attempt = 0;
        while ($attempt < $maxAttempts) {
            $attempt++;
            try {
                // Verifica se a URL do Selenium está acessível
                $response = file_get_contents('http://selenium:4444/wd/hub/status');
                $data = json_decode($response, true);
                if (isset($data['value']['ready']) && $data['value']['ready']) {
                    return; // Selenium está pronto
                }
            } catch (\Exception $e) {
                // Ignora a exceção e tenta novamente
            }

            sleep(1); // Espera um segundo antes de tentar novamente
        }

        throw new \Exception("Selenium não está pronto após várias tentativas.");
    }
}
