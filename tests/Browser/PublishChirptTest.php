<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use function Laravel\Prompts\pause;

class PublishChirptTest extends DuskTestCase
{
    public function test_publish_chirp()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/chirps')
                ->type('email', 'j@gmail.com')
                ->type('password','12345678')
                ->press('Entrar')
                ->pause(4000)
                ->screenshot('debugueei')
                ->clickLink('Peixes')
                ->type('textarea[name="chirp"]', 'Conseguei!F')
                ->screenshot('peixei')
                ->press('Peixar');
        });
    }
}
