<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first(); // Assuming you have a Contact model to fetch contact details
        return view('pages.kontak', compact('contact'));
    }
}
