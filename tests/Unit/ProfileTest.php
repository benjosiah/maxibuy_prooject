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

class ProfileTest extends TestCase
{

    use RefreshDatabase, WithFaker, HasFactory;

    /** @test */
    public function profile_database_has_expected_columns()
    {
        $this->assertTrue( 
          Schema::hasColumns('profiles', [
            'id','full_name', 'dob', 'user_id'
        ]), 1);
    }

        /** @test */
        public function a_profile_belongs_to_a_user()
        {
            $user = User::factory()->create();
            $profile = Profile::factory()->create(['user_id' => $user->id]); 
    
            $this->assertInstanceOf(User::class, $profile->user);
        }

    
}
