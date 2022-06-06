<?php

namespace Tests\Feature;

use App\Models\Transaction;
use App\Models\User;
use Carbon\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class TransaccionManagementTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    /** @test */
    public function a_transaction_can_be_created()
    {
      

        $this->withExceptionHandling();

        $response = $this->post('/login',[
            'identification'=>1144170160,
            'password'=>2205
        ]);

        $response->assertStatus(302);

        // $user = User::factory()->create();

        // $this->actingAs($user);

        $response = $this->post('/transaction',[
            'account_origin'=>1,
            'user_origin'=>1,
            'code'=>Hash::make("3.2.2000000".now()),
            'account_final'=>2,
            'user_final'=>2,
            'value'=>22513350
        ]);

        $response->assertStatus(200);
        $response->assertOk();
    }
}
