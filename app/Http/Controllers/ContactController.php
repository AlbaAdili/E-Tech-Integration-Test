<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use App\Services\ContactServiceInterface;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactServiceInterface $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $messages = Contact::all();
        return view('customer-contacts', compact('messages'));
    }
    
    public function create()
    {
        return view("contact");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'description' => 'required',
        ]);

        $this->contactService->storeContact($request); 

        return redirect()->route('contact.create')->with('success', 'Message Sent');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
    
        return redirect()->route('contact.index')->with('success', 'Deleted Message');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $messages = Contact::where(function ($query) use ($search) {
            $query->where('name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%");
        })->get();

        return view("customer-contacts", compact("messages"));
    }
}
