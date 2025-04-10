<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function edit()
    {
        // Aquí asumes que tu Contact ID = 1
        // O si quieres varios, ajusta la lógica.
        $contact = Contact::findOrFail(1);
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        $contact = Contact::findOrFail(1); // igual, asumiendo un único registro

        $data = $request->validate([
            'attention_hours' => 'nullable|string|max:255',
            'phone'           => 'nullable|string|max:255',
            'email'           => 'nullable|email|max:255',
        ]);

        $contact->update($data);

        return redirect()->route('contacts.edit')
                         ->with('success', 'Información de contacto actualizada correctamente.');
    }
}
