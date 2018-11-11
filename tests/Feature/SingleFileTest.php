<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;

class SingleFileTest extends TestCase
{
    use RefreshDatabase;

    protected $base = 'single';

    /**
     * A basic test for CRUDs 
     * with one or multiple fields with single file.
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
        $data = ['name' => 'Hello',
            'filewithpath' => UploadedFile::fake()->image('avatar.png'),
            'filecontent' => UploadedFile::fake()->image('avatar.png'),
            'filestring' => UploadedFile::fake()->image('image.png')];
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
        $data = ['name' => 'Hello',
            'filewithpath' => UploadedFile::fake()->image('avatar.png'),
            'filecontent' => UploadedFile::fake()->image('other.png'),
            'filestring' => UploadedFile::fake()->image('image.png')];
        $response = $this->json('POST', $this->base, $data);
        $data = json_decode($response->getContent());
        $id = $data->data->id;
        # Update the record
        $data = ['name' => 'World',
            'filewithpath' => UploadedFile::fake()->image('avatar.png'),
            'filecontent' => UploadedFile::fake()->image('other.png'),
            'filestring' => UploadedFile::fake()->image('image.png')];
        $response = $this->json('PUT', $this->base.'/'.$id, $data);
        $response->assertStatus(200);
    }

    public function testDestroy()
    {
        # Insert records
        $data = ['name' => 'Hello', 'filewithpath' => UploadedFile::fake()->image('avatar.png')];
        $response = $this->json('POST', $this->base, $data);
        $data = json_decode($response->getContent());
        $id = $data->data->id;
        # Delete the record
        $response = $this->json("DELETE", $this->base.'/'.$id);
        $response->assertStatus(200);
    }

    public function testInvalidInsert()
    {
        $data = [];
        $response = $this->json('POST', $this->base, $data);
        $response->assertStatus(400);
    }
}
