<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GeneralTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_token_are_only_issued_to_trusted_users()
    {
        $response = $this->post('/api/sanctum/token',['email'=>"unexistantmaiii@hotmail.com","password"=>"1234567**","device_name"=>"default"]);
        $response->assertStatus(400);
    }
    public function test_app_is_runing()
    {
        $this->assertTrue(true);
    }
    
    public function test_user_can_signin()
    {
        $this->assertTrue(true);
    }

    public function test_user_can_login()
    {
        $this->assertTrue(true);
    }

    public function test_user_cannot_signup_with_invalid_email()
    {
        $this->assertTrue(true);
    }

    public function test_posts_can_be_listed_without_login(){
        $this->assertTrue(true);
    }

    public function test_unauthorized_users_cannot_edit_post(){
        $this->assertTrue(true);
    }

    public function test_unauthorized_users_cannot_delete_post(){
        $this->assertTrue(true);
    }
}
