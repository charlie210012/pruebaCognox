<?php

namespace Tests\Unit;

use App\Models\account;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class AccountTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_account_has_many_transaction_remove()
    {
        $account = new account();
        $this->assertInstanceOf(Collection::class,$account->transactionsRemove);

    }

    public function test_a_account_has_many_transaction_add()
    {
        $account = new account();
        $this->assertInstanceOf(Collection::class,$account->transactionsAdd);

    }
    
}
