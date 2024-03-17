<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRController extends Controller
{
    public function generate(Request $request)
    {
        // Retrieve the text from the form submission
        $text = $request->input('text');

        // Generate the QR code
        $qrCode = QrCode::size(200)->generate($text);

        // Return the QR code view with the generated QR code image
        return view('qr_code', compact('qrCode'));
    }
}
