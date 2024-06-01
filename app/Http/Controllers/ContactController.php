<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function create(): View
    {
        return view('contacts.create');
    }

    public function index(Request $request): View
    {
       return view('contacts.index', [
            'contacts' => $request->user()->contacts()->get(),
       ]);
    }
    public function edit(Contact $contact): View
    {
        return view('contacts.edit', [
            'contact' =>$contact,
        ]);
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect(route('contacts.index'));
    }
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'last_name' => 'nullable|regex:/^[\pL\s]+$/u|max:30',
            'phone' => 'required|digits:9',
            'email' => 'nullable|email:strict',
            'address' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'profile_photo' => 'nullable|image|max:1024'
        ]);

        if ($request->hasFile('profile_photo')) {
            $validated['profile_photo_path'] = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        $request->user()->contacts()->create($validated);

        return redirect(route('contacts.index'));
    }


    public function update(Request $request, Contact $contact): RedirectResponse
    {
        $this->authorize('update', $contact);

        $validated = $request->validate([
            'first_name' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'last_name' => 'nullable|regex:/^[\pL\s]+$/u|max:30',
            'phone' => 'required|digits:9',
            'email' => 'nullable|email:strict',
            'address' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'profile_photo' => 'nullable|image|max:1024'
        ]);

        if ($request->hasFile('profile_photo')) {
            if ($contact->profile_photo_path) {
                Storage::disk('public')->delete($contact->profile_photo_path);
            }
            $validated['profile_photo_path'] = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        $contact->update($validated);

        return redirect(route('contacts.index'));
    }

    public function show(Contact $contact): View
    {
        return view('contacts.show', [
            'contact' => $contact,
        ]);
    }

}
