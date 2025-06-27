<?php

namespace Tests\Feature;

use Tests\TestCase;

class AboutPageTest extends TestCase
{
    public function test_guest_can_view_about_page()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }
}
