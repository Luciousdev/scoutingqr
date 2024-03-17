<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entries;
use App\Models\Auth;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EntriesController extends Controller
{
    public function getEntry($alias)
    {
        // Get the entry from the database
        $entry = Entries::where('alias', $alias)->first();

        // If the entry does not exist, return a 404 error
        if (!$entry) {
            abort(404);
        }

        return view('entry', ['data' => $entry]);
    }


    public function cp()
    {
        if(session('auth') !== true) {
            return redirect('/cp')->withErrors(['error' => 'You are not authorized to view this page']);
        }

        $allEntries = Entries::all();

        return view('cp', ['data' => $allEntries]);
    }

    public function createEntry(Request $request)
    {
        // Validate the request
        $request->validate([
            'alias' => 'required|max:50',
            'text' => 'required',
        ]);

        // Create the entry
        $entry = new Entries;
        $entry->alias = $request->alias;
        $entry->text = $request->text;
        $entry->save();

        return redirect('/cp1234');
    }

    public function auth()
    {
        return view('auth');
    }


    public function authPost(Request $request)
    {
        $code = Auth::where('id', 1)->first();

        // Validate the request
        $request->validate([
            'code' => 'required',
        ]);

        $inputCode = intval($request->code); // Convert to integer

        // Check if the password is correct
        if($inputCode === $code->code) {
            Session::put('auth', true);
            return redirect('cp1234');
        }

        return redirect('/cp');
    }

    public function logout()
    {
        Session::forget('auth');
        return redirect('/cp');
    }

    public function generate(Request $request)
    {
        // Retrieve the text from the form submission
        $text = $request->input('text');

        // Return the QR code view with the text
        return view('qr_code', compact('text'));
    }
}
