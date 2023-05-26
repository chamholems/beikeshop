<?php

namespace Tests\Browser\Pages\Front;


use Laravel\Dusk\Browser;
use Tests\Data\Catalog\LoginPage;
use Tests\Data\Catalog\RegisterData;
use Tests\DuskTestCase;
use Tests\Data\Catalog\IndexPage;



class RegisterFirst extends DuskTestCase
{
    /**
     * A basic browser test example.
     */

    //1.先单独注册一个账号
    public function testLoginFirst()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(LoginPage::Login['login_url'])
                ->type(LoginPage::Register['register_email'], RegisterData::False_Register['exist_email'])
                ->type(LoginPage::Register['register_pwd'], RegisterData::True_Register['password'])
                ->type(LoginPage::Register['register_re_pwd'], RegisterData::True_Register['password'])
                ->pause(2000)
                ->press(LoginPage::Register['register_btn'])
                ->pause(6000)
                ->assertSee(RegisterData::True_Register['assert'])
                ->pause(2000);
        });
    }
}
