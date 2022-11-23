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

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker, HasFactory;

    /** @test */
    public function user_database_has_expected_columns()
    {
        $this->assertTrue( 
          Schema::hasColumns('users', [
            'id','name', 'email', 'email_verified_at', 'password'
        ]), 1);
    }

    /** @test  */
    public function a_user_has_a_profile()
    {
        $user = User::factory()->create();
        $profile = Profile::factory()->create(['user_id' => $user->id]); 

        $this->assertInstanceOf(Profile::class, $user->profile); 

    }
    /** @test  */
    public function a_user_has_an_address()
    {
        $user = User::factory()->create();
        $address = Address::factory()->create(['user_id' => $user->id]); 

        $this->assertInstanceOf(Address::class, $user->address); 

    }
    
}
