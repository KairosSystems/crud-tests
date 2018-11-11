<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SimpleTest extends TestCase
{
    use RefreshDatabase;

    protected $base = 'simple';

    /**
     * A basic test for simple CRUD.
     *
     * @return void
     */
    public function testGetAll()
    {
        $response = $this->get($this->base);
        $response->assertStatus(200);
    }

    public function testGetInexistent()
    {
        $response = $this->get($this->base.'/inexistentId');
        $response->assertStatus(404);
    }

    public function testInsertAndGet()
    {
        $data = ['name' => 'Hello', 'description' => 'World'];
        $response = $this->json('POST', $this->base, $data);
        $response->assertStatus(200);
        $data = json_decode($response->getContent());
        $id = $data->data->id;
        $response = $this->get($this->base.'/'.$id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        # Insert new record
        $data = ['name' => 'Hello', 'description' => 'World'];
        $response = $this->json('POST', $this->base, $data);
        $data = json_decode($response->getContent());
        $id = $data->data->id;
        # Update the record
        $data = ['name' => 'Changed'];
        $response = $this->json('PUT', $this->base.'/'.$id, $data);
        $response->assertStatus(200);
    }

    public function testDestroy()
    {
        # Insert records
        $data = ['name' => 'Hello', 'description' => 'World'];
        $response = $this->json('POST', $this->base, $data);
        $data = json_decode($response->getContent());
        $id = $data->data->id;
        # Delete the record
        $response = $this->json("DELETE", $this->base.'/'.$id);
        $response->assertStatus(200);
    }

    public function testInvalidInsert()
    {
        $data = ['name' => 'Hello'];
        $response = $this->json('POST', $this->base, $data);
        $response->assertStatus(400);
    }

}
