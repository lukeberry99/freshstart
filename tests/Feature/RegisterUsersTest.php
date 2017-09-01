<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterUsersTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    function a_user_can_register()
    {
        // Arrange
        // Act
        $response = $this->json('POST', '/api/register', [
            'first_name' => 'Luke',
            'last_name' => 'Berry',
            'email' => 'foo@bar.com',
            'password' => 'secret'
        ]);

        // Assert
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'data',
            'meta' => ['token']
        ]);
        $this->assertTrue(User::where('email', 'foo@bar.com')->where('first_name', 'Luke')->where('last_name', 'Berry')->exists());
    }

    /** @test */
    function given_invalid_information_throw_a_422()
    {
        $response = $this->json('POST', '/api/register', [
            'last_name' => 'Berry',
            'email' => 'luke@payzip.co.uk',
            'password' => 'secret'
        ]);

        $response->assertStatus(422);
    }
}
