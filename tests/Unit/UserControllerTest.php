<?php

use App\Models\User;
use App\Models\User2;
use App\Models\UserActivation;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get('/api/users?page=1');

        $response->assertStatus(200);
       // dump($response->getContent());
    }
//
//    public function testRegister()
//    {
//        $userData = [
//            'login' => 'Bumm420',
//            'email' => 'bubutumm@gmail.com',
//            'password' => 'test1234',
//            'password_confirmation' => 'test1234',
//        ];
//
//        $response = $this->postJson('/api/users/register', $userData);
//
//        $response->assertStatus(200)
//            ->assertJson([
//                'status' => 'ok',
//            ]);
//
//        $this->assertDatabaseHas('user2', [
//            'email' => 'bubutumm@gmail.com',
//        ]);
//
////        $this->assertDatabaseHas('user_activations', [
////            'user_id' => User2::where('email','basiatumm@gmail.com')->first()->id,
////        ]);
//    }


    public function testShow()
    {
        $user = User2::factory()->create();
        //dd($user);
        $response = $this->getJson("/api/users/{$user->id}");

        $response->assertStatus(200)
            ->assertJson([
                'user' => $user->toArray(),
            ]);
    }

    public function testUpdate()
    {
        $user = User::factory()->create();

        $updateData = [
            'login' => 'Updated Name',
            'email' => 'updated@test.com',
        ];

        $response = $this->putJson("/api/users/{$user->id}", $updateData);

        $response->assertStatus(200)
            ->assertJson([
                'status' => 'ok',
                'message' => 'User updated successfully',
                'data' => $updateData,
            ]);

        $this->assertDatabaseHas('user2', $updateData);
    }


    public function testDestroy()
    {
        $user = User2::factory()->create();

        $response = $this->deleteJson("/api/users/{$user->id}");

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'User deleted',
            ]);

        $this->assertDatabaseMissing('user2', ['id' => $user->id]);
    }


    public function testActivate()
    {
        $user = User2::factory()->create([
            'aktwn_u' => false,
        ]);

        $token = Str::random(60);
        UserActivation::create([
            'user_id' => $user->id,
            'token' => hash('sha256', $token),
        ]);

        $response = $this->get("/api/activate/{$token}");

        $response->assertRedirect()
            ->assertSessionHas('success', 'Your account has been activated!');

        $this->assertDatabaseHas('user2', [  // changed from 'users'
            'id' => $user->id,
            'aktwn_u' => true,
        ]);


        $this->assertDatabaseMissing('user_activations', [
            'user_id' => $user->id,
        ]);
    }

/// your tests will go here
}
