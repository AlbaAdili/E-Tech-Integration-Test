<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_view_contact_form()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertSee('Contact'); 
    }

    public function test_user_can_submit_contact_form()
    {
        $response = $this->post('/contact', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'description' => 'This is a test message.',
        ]);

        $response->assertRedirect(route('contact.create'));
        $this->assertDatabaseHas('contacts', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'description' => 'This is a test message.',
        ]);
    }

    public function test_admin_can_see_contact_messages()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        Contact::factory()->count(3)->create();

        $response = $this->actingAs($admin)->get('/contacts');

        $response->assertStatus(200);
        $response->assertSee('Customer'); // Adjust based on your blade content
    }

    public function test_admin_can_delete_contact_message()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $contact = Contact::factory()->create();

        $response = $this->actingAs($admin)->delete('/contacts/' . $contact->id);
        $response->assertRedirect(route('contact.index'));

        $this->assertDatabaseMissing('contacts', ['id' => $contact->id]);
    }

    public function test_admin_can_search_contact_messages()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        Contact::factory()->create(['name' => 'Alba']);
        Contact::factory()->create(['name' => 'Not Match']);

        $response = $this->actingAs($admin)->post('/contacts/search', ['search' => 'Alba']);

        $response->assertStatus(200);
        $response->assertSee('Alba');
        $response->assertDontSee('Not Match');
    }
}
