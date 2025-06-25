<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactService implements ContactServiceInterface
{
    public function storeContact(Request $request)
    {
        return Contact::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'description' => $request->get('description'),
        ]);
    }
}
