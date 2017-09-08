<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeTest extends TestCase
{

    /** @test */
    public function an_user_can_see_the_home_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function an_user_can_see_the_header(){

        $response = $this->get('/');

        $response->assertSee('IntraSAIN');

    }

    /** @test */
    public function an_user_can_see_the_login_button(){

        $response = $this->get('/');

        $response->assertSee('Login');

    }

    public function an_user_can_see_the_register_button(){

        $response = $this->get('/');

        $response->assertSee('Registrar');

    }


}
