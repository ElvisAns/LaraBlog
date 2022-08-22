<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class GeneralTest extends TestCase
{
    /**
     * Generals tests for our app.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_token_are_only_issued_to_trusted_users()
    { #seed at first test case
        $response = $this->post('/api/sanctum/token',['email'=>"inexistantmaiii@hotmailp.com","password"=>"1234567**","device_name"=>"default"]);
        $response->assertStatus(400);
    }

    public function test_user_cannot_signin_with_invalid_data()
    {   
        $response = $this->post('/api/user/create',['name'=>'Elvis Ans','email'=>"@hotmailp.com","password"=>"1234567**","device_name"=>"default"]);
        $response->assertStatus(400);
    }

    public function test_user_get_token_with_right_credential()
    { 
        $this->seed(); #on seeding, password are set to be 12345678
        $user = DB::table('users')->latest('id')->first();
        $response = $this->post('/api/sanctum/token',['email'=>$user->email,"password"=>"12345678","device_name"=>"default"]);
        $response->assertStatus(200);
    }

    public function test_user_cannot_signup_with_invalid_email()
    {
        $response = $this->post('/api/user/create',['name'=>'Elvis Ans','email'=>"@hotmailp.com","password"=>"1234567**","device_name"=>"default"]);
        $response->assertStatus(400)->assertExactJson(["email"=>["The email must be a valid email address."]]);
    }

    public function test_posts_can_be_listed_without_login(){
        $response = $this->get('/api/posts');
        $response->assertstatus(200);
    }

    public function test_unauthorized_users_cannot_create_post(){
        $response = $this->post('/api/posts/create',['title'=>'Dummy Title','image_url'=>"https://img.url",'content'=>'dummy content','caption'=>'dummy caption']);
        $response->assertstatus(302);
    }

    public function test_unauthorized_users_cannot_edit_post(){
        $this->seed(); 
        $response = $this->post('/api/posts/update/1',['title'=>'Dummy Edited Title']);
        $response->assertstatus(302);
    }

    public function test_unauthorized_users_cannot_delete_post(){
        $this->seed(); 
        $response = $this->get('/api/posts/delete/1');
        $response->assertstatus(302);
    }
}
