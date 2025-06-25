<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Newsletter;

class NewsletterSubscriptionTest extends TestCase
{
    
    use WithFaker;

    public function test_user_can_subscribe_to_newsletter()
    {

        $email = $this->faker->unique()->safeEmail;
        
        $response = $this->post(route('subscribe.newsletter'), [
            'email' => $email,
        ]);

        $response->assertRedirect()->assertSessionHas('success', 'Subscribed successfully!');
        $this->assertDatabaseHas('newsletters', [
            'email' => $email,
        ]);
    }
}
