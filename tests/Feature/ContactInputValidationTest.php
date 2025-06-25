<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ContactInputValidationTest extends TestCase
{
    use WithFaker;

    public function test_contact_method_validates_input()
    {
        $data = [
            'name' => '',
            'email' => 'invalid-email',
            'description' => '',
        ];

        $response = $this->post(route('contact.store'), $data);

        $response->assertSessionHasErrors(['name', 'email', 'description']);

        $response->assertStatus(302);
    }
}
