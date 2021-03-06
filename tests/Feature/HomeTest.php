<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomePageIsWorkingCorrectly()
    {
        $response = $this->actingAs($this->user())->get('/');

        $response->assertSeeText('Hello world');
    }

    public function testContactPageIsWorkingcorrectly()
    {
        $response = $this->get('/contact');

        $response->assertSeeText('Contact');
    }
}
