<?php

namespace App\Http\Controllers;

use App\Mail\sendJobAppplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class JobApplication extends Controller
{


public function apply(Request $request)
{
    // 1️⃣ Validation
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email',
        'education' => 'required|string|max:255',
        'experience' => 'required|numeric|min:0',
        'current_salary' => 'nullable|numeric|min:0',
        'expected_salary' => 'nullable|numeric|min:0',
        'work_location' => 'required|string',
        'current_location' => 'required|string|max:255',
        'message' => 'required|string|max:1000',
        'resume' => 'required|mimes:pdf,doc,docx|max:2048',
    ]);

    // 2️⃣ Upload resume to storage
    $resumeFullPath = null;
    $resumeName = null;
    $resumeUrl = null;

    if ($request->hasFile('resume')) {
        // Store the file in storage/app/public/resumes
        $resumePath = $request->file('resume')->store('resumes', 'public');
        $resumeFullPath = storage_path('app/public/' . $resumePath); // Full server path for attachment
        $resumeName = $request->file('resume')->getClientOriginalName(); // Original filename
        $resumeUrl = asset('storage/' . $resumePath); // Public URL for download link
    }

    // 3️⃣ Prepare details array
    $details = $request->only([
        'name',
        'email',
        'education',
        'experience',
        'current_salary',
        'expected_salary',
        'work_location',
        'current_location',
        'message'
    ]);

    // 4️⃣ Send email using Mailable
    Mail::to('deepakchaudhary1004@gmail.com')
        ->send(new \App\Mail\sendJobAppplication($details, $resumeFullPath, $resumeName, $resumeUrl));

    // 5️⃣ Return back with success message
    return back()->with('success', 'Application submitted successfully!');
}


}
