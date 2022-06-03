<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_login_exist()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_a_login_user_logged_in()
    {
       
        $response = $this->post('/login',[
            'identification'=>1144170160,
            'password'=>2205
        ]);

        $response->assertStatus(302);

        $this->actingAs(Auth::user())->get('/dashboard');
    }
}
