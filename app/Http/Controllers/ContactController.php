<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal. Silakan periksa data yang diinput.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Send email notification
            Mail::to('info@jayatama.id')->send(new ContactFormMail($request->all()));

            // You can also save to database here if needed
            // Contact::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Pesan Anda telah berhasil dikirim. Tim kami akan menghubungi Anda segera.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi nanti.'
            ], 500);
        }
    }
}