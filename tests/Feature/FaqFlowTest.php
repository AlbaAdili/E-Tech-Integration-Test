<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FaqFlowTest extends TestCase
{
    public function test_guest_can_access_faq_page()
    {
        $response = $this->get('/faqs');
        $response->assertStatus(200);
    }

    public function test_faqs_are_visible_on_faq_page()
    {
        $response = $this->get('/faqs');
        $response->assertSee('What payment methods do you accept?');
        $response->assertSee('How can I track my order?');
        $response->assertSee('What is your return and exchange policy?');
        $response->assertSee('Are your products covered by a warranty?');
        $response->assertSee('Do you offer international shipping?');
    }
}
