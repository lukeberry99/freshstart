<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tymon\JWTAuth\JWTAuth;

class LoginUsersTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    function a_user_can_login()
    {
       factory(User::class)->create([
           'email' => 'foo@bar.com',
           'password' => bcrypt('secret')
       ]);

       $response = $this->json('POST', '/api/login', [
           'email' => 'foo@bar.com',
           'password' => 'secret'
       ]);

       $response->assertStatus(200);
       $response->assertJsonStructure([
           'data',
           'meta' => ['token']
       ]);
    }

    /** @test */
    function a_user_receives_an_error_when_using_incorrect_credentials()
    {
        $response = $this->json('POST', '/api/login', [
            'email' => 'foo@bar.com',
            'password' => 'secret'
        ]);

        $response->assertStatus(401);
        $response->assertJsonStructure([
            'errors'
        ]);
    }

    /** @test */
    function missing_details_fail_validation_checks()
    {
        $response = $this->json('POST', '/api/login', [
            'email' => 'foo@bar.com'
        ]);

        $response->assertStatus(422);
    }

    /** @test */
    function a_user_can_log_out()
    {
        factory(User::class)->create([
            'email' => 'foo@bar.com',
            'password' => bcrypt('secret')
        ]);

        $loginResponse = $this->json('POST', '/api/login', [
            'email' => 'foo@bar.com',
            'password' => 'secret'
        ]);

        $token = $loginResponse->json()['meta']['token'];

        $this->flushSession();

        $this->json('POST', '/api/logout', [], ['Authorization' => 'Bearer '. $token]);

        $response = $this->json('GET', '/api/profile', [], ['Authorization' => 'Bearer '. $token]);

        $response->assertStatus(401);
    }

    /** @test */
    function can_retrieve_user_details()
    {
        factory(User::class)->create([
            'email' => 'foo@bar.com',
            'password' => bcrypt('secret')
        ]);

        $loginResponse = $this->json('POST', '/api/login', [
            'email' => 'foo@bar.com',
            'password' => 'secret'
        ]);

        $token = $loginResponse->json()['meta']['token'];

        $this->flushSession();

        $response = $this->json('GET', '/api/profile', [], ['Authorization' => 'Bearer '. $token]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'first_name',
                'last_name',
                'email'
            ],
        ]);
    }
}
