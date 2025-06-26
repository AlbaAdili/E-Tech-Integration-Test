<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Newsletter;

class NewsletterFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_subscribe_to_newsletter()
    {
        $response = $this->post('/subscribe/newsletter', [
            'email' => 'test@example.com',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('newsletters', [
            'email' => 'test@example.com',
        ]);
    }

    public function test_guest_cannot_subscribe_with_duplicate_email()
    {
        \App\Models\Newsletter::factory()->create(['email' => 'test@example.com']);

        $response = $this->post('/subscribe/newsletter', [
            'email' => 'test@example.com',
        ]);

        $response->assertSessionHasErrors('email');
    }

}
