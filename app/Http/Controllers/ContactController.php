<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function show()
    {
        return view('pages.contact');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        try {
            // Send email notification to admin
            $adminEmail = config('mail.admin_email', 'admin@vefiri.com');
            
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message_content' => $request->message,
            ];

            Mail::send('emails.contact', $data, function ($mail) use ($adminEmail, $data) {
                $mail->to($adminEmail)
                    ->from($data['email'], $data['name'])
                    ->subject('Vefiri Contact Form: ' . $data['subject']);
            });

            // Optional: Send auto-reply to user
            // Mail::to($request->email)->send(new AutoReplyContact($data));

            return redirect()->route('contact')
                ->with('success', 'Thank you for your message! We will get back to you within 24 hours.');

        } catch (\Exception $e) {
            Log::error('Contact form submission failed: ' . $e->getMessage());
            return redirect()->route('contact')
                ->with('error', 'Failed to send message. Please try again later or call our support team.');
        }
    }
}