<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Profile;
use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;

class AddressTest extends TestCase
{

    use RefreshDatabase, WithFaker, HasFactory;

    /** @test */
    public function address_database_has_expected_columns()
    {
        $this->assertTrue( 
          Schema::hasColumns('addresses', [
            'id','address', 'user_id'
        ]), 1);
    }

        /** @test */
        public function a_address_belongs_to_a_user()
        {
            $user = User::factory()->create();
            $address = Address::factory()->create(['user_id' => $user->id]); 
    
            $this->assertInstanceOf(User::class, $address->user);
        }

    
}
