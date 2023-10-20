<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Contact::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name"=> "required",
            "email"=> "required",
            "phone" => "required",
            "address" => "required",
        ]);

        $contact = new Contact();
        $contact->fill($data);
        $contact->save();
        return response()->json(['success' => 'Contact created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return $contact;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            "name"=> "required",
            "email"=> "required",
            "phone" => "required",
            "address" => "required",
        ]);

        $contact->fill($data);
        $contact->save();
        return response()->json(['success' => 'Contact updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json(['success'=> 'Contact deleted successfully.']);
    }
}
