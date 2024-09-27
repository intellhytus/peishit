<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase

{

    public function testExample(): void
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('login')
                ->type('email', 'test@example.com')
                ->type('password', 'password')
                ->press('Entrar')
                ->resize(1920, 1080)
                ->screenshot('dashboard');
        });

    }
}


#dusk NO BOTÃO  <x button dusk="nome">
