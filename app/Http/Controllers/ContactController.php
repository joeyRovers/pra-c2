<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function show()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $data = $request->only(['name', 'email', 'message']);

        $content = "Naam: {$data['name']}\nEmail: {$data['email']}\nBericht: {$data['message']}\n";

        Storage::disk('local')->put('contactform_' . time() . '.txt', $content);

        return back()->with('success', 'Formulier is verzonden en opgeslagen!');
    }
}
