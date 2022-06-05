<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_user_has_many_account()
    {
        $user = new User();

        $this->assertInstanceOf(Collection::class,$user->accounts);
        
    }

    public function test_a_user_has_many_otherAccounts()
    {
        $user = new User();

        $this->assertInstanceOf(Collection::class,$user->otherAccounts);
    }

    public function test_a_user_has_many_consolidateds()
    {
        $user = new User();

        $this->assertInstanceOf(Collection::class,$user->consolidateds);
    }
}
