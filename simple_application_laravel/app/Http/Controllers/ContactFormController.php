<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = ContactForm::select('id','name','title','created_at')->get();

        return view("contacts.index", compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("contacts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request, $request->name);

        // Eloquentモデル
        ContactForm::create([
            'name' => $request->name,
            'title' => $request->title,
            'email' => $request->email,
            'url' => $request->url,
            'gender' => $request->gender,
            'age' => $request->age,
            'contact' => $request->contact,
        ]);

        return to_route("contacts.index"); // redirect
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = ContactForm::find($id);

        $gender = $contact->gender === 0 ? "Male" : "Female";

        switch ($contact->age){
            case 1:
                $age = "~19";
                break;
            case 2:
                $age = "20~29";
                break;
            case 3:
                $age = "30~39";
                break;
            case 4:
                $age = "40~49";
                break;
            case 5:
                $age = "50~59";
                break;
            case 6:
                $age = "60~";
                break;
            default:
                break;
        }

        return view("contacts.show", compact("contact", "gender", "age"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
