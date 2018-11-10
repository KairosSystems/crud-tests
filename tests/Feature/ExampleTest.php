<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAll()
    {
        $response = $this->get('/example');
        $response->assertStatus(200);
    }

    public function testGetInexistent()
    {
        $response = $this->get('/example/inexistentId');
        $response->assertStatus(404);
    }

    public function testInsertAndGet()
    {
        $data = ['name' => 'Hello', 'description' => 'World', 'file' => 'Test'];
        $response = $this->json('POST', '/example', $data);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $data = ['name' => 'Changed'];
        $response = $this->json('PUT', '/example/1', $data);
        $response->assertStatus(200);
    }
}
