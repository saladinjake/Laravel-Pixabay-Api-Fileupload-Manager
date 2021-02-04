<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FrontTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response2 = $this->get('/');
        $response2->assertStatus(200);
        $response2->assertSee('Welcome to our image search app');
        $response2->assertDontSee('Error loading this page. Contact the geek');
    }
}
