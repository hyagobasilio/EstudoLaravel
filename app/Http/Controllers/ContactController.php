<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Storage;

class ContactController extends Controller
    {
    public function index(Request $request)
    {
        $contacts = Contact::all();

        return view('contact.index', compact('contacts'));
    }

    public function create()
    {

        return view('contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email',
        'telefone' => 'nullable|string|max:20',
        ]);
        $data = $request->all();
        if($request->hasFile('foto') && $request->foto->isValid()) {
            $request->foto->store('products');
            $photoName = $request->foto->hashName();

            $data['photo'] = $photoName;


        }
        Contact::create($data);

        return redirect()->route('contact.index')->with('status', 'Registration completed successfully!');
    }
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.show', compact('contact'));
    }
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.edit', compact('contact'));
    }
    public function update(Request $request, $id)
    {

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());
        if($request->hasFile('foto') && $request->image->isValid()) {
        if($contact->foto) {
            Storage::disk('public')->delete($contact->foto);
        }
        $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }
        return redirect()->route('contact.index');
    }
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contact.index');
    }

    public function homepage() {

        return view('contact.homepage');
    }

    public function list(Request $request)
    {
        $search = $request->input('search'); // pode usar 'search' em vez de 'search1'

        // Se houver termo de pesquisa, filtra
        $contacts = Contact::when($search, function ($query, $search) {
            return $query->where('nome', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
        })->paginate(10); // Paginação opcional

        return view('contacts.index', compact('contacts', 'search'));
    }


}


