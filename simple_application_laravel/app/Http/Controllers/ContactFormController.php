<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Services\CheckFormService;
use App\Http\Requests\StoreContactRequest;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $contacts = ContactForm::select('id','name','title','created_at')->get();

        // ペジネーション対応
        // $contacts = ContactForm::select('id','name','title','created_at')->paginate(20);
        $contacts = "";

        if (isset($request->search)){
            $search = $request->search;
            $query = ContactForm::search($search);
            // dd($search);
            $contacts = $query->select('id','name','title','created_at')->paginate(20);
        }
        else{
            $contacts = ContactForm::select('id','name','title','created_at')->paginate(20);
        }

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
    public function store(StoreContactRequest $request)
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

        $gender = CheckFormService::checkGender($contact->id);
        $age = CheckFormService::checkAge($contact->age);

        return view("contacts.show", compact("contact", "gender", "age"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = ContactForm::find($id);

        return view("contacts.edit", compact("contact"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = ContactForm::find($id);

        // dd($contact, $request);

        $contact->name = $request->name;
        $contact->title = $request->title;
        $contact->email = $request->email;
        $contact->url = $request->url;
        $contact->gender = $request->gender;
        $contact->age = $request->age;
        $contact->contact = $request->contact;

        $contact->save();

        return to_route("contacts.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = ContactForm::find($id);
        // dd($contact);
        $contact->delete();

        return to_route("contacts.index");
    }
}
