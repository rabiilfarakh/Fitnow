<?php

namespace Tests\Feature;

use App\Models\progression;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class progressTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_add_progress() {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/api/progression', [
            'poids' => 23, 
            'height' => 29, 
            'biceps' => 29, 
            'mollet' => 29, 
        ]);
    
        $response->assertStatus(200);
    }
    
    public function test_update_progress() {
        $user = User::factory()->create();
        $this->actingAs($user);

        $progression = progression::create([
            'user_id'=>$user->id,
            'poids' => 23, 
            'height' => 29, 
            'biceps' => 29, 
            'mollet' => 29,
        ]);

        $response = $this->put('/api/progression/'.$progression->id , [
            'poids'  => 255, 
            'height' => 255, 
            'biceps' => 255, 
            'mollet' => 255,
        ]);
    
        $response->assertStatus(200);
    }

    public function  test_update_status(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $progression = progression::create([
            'user_id'=>$user->id,
            'poids' => 23, 
            'height' => 29, 
            'biceps' => 29, 
            'mollet' => 29,
        ]);
        $response = $this->patch('/api/progression/'.$progression->id , [
            'status' => 'terminé'
        ]);
    
        $response->assertStatus(200);

    }
    
    public function test_delete_progress() {
        $user = User::factory()->create();
        $this->actingAs($user);

        $progression = progression::create([
            'user_id'=>$user->id,
            'poids' => 23, 
            'height' => 29, 
            'biceps' => 29, 
            'mollet' => 29,
        ]);

        $response = $this->delete('/api/progression/'.$progression->id);
    
        $response->assertStatus(200);
    }


}
