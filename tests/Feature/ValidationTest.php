<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ValidationTest extends TestCase
{
    use RefreshDatabase;

    // --- Newsletter Validation ---

    public function test_newsletter_requires_valid_email()
    {
        $response = $this->post('/subscribe/newsletter', [
            'email' => 'not-an-email'
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_newsletter_email_must_be_unique()
    {
        \App\Models\Newsletter::create(['email' => 'test@example.com']);

        $response = $this->post('/subscribe/newsletter', [
            'email' => 'test@example.com'
        ]);

        $response->assertSessionHasErrors('email');
    }

    // --- Contact Form Validation ---

    public function test_contact_form_requires_all_fields()
    {
        $response = $this->post('/contact', []); // No input

        $response->assertSessionHasErrors(['name', 'email', 'description']);
    }

    public function test_contact_form_requires_valid_email()
    {
        $response = $this->post('/contact', [
            'name' => 'John',
            'email' => 'invalid-email',
            'description' => 'Help me please',
        ]);

        $response->assertSessionHasErrors('email');
    }

    // --- Registration Validation ---

    public function test_registration_requires_all_fields()
    {
        $response = $this->post('/custom-registration', []);

        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }

    public function test_registration_requires_valid_email()
    {
        $response = $this->post('/custom-registration', [
            'name' => 'Jane',
            'email' => 'invalid-email',
            'password' => 'password123',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_registration_requires_minimum_password_length()
    {
        $response = $this->post('/custom-registration', [
            'name' => 'Jane',
            'email' => 'jane@example.com',
            'password' => '123', // too short
        ]);

        $response->assertSessionHasErrors('password');
    }
}
