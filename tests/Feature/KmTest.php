<?php

namespace Tests\Feature;

use App\Models\User2;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KmTest extends TestCase
{
    /**
     * A basic feature test example.
     */


    public function test_add_km()
    {
        $user = User2::factory()->create(); // Replace this line with the appropriate model factory for your User2 model

        $response = $this->postJson("/api/add-km/{$user->id}", [
            'street' => 'Krakowskie Przedmieście',
            'house' => '5',
            'zip_code' => '00-068',
            'city' => 'Warszawa',
            'team' => 'Lech'
        ]);
        dump($response->getContent());
        $response->assertStatus(200)
            ->assertJsonStructure(['km']);
    }
}
