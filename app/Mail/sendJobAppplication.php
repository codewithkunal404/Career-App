<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendJobAppplication extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $resumeName;
    public $resumeUrl;

    public $resumePath;

    public function __construct($details, $resumePath = null, $resumeName = null, $resumeUrl = null)
    {
        $this->details = $details;      // ✅ pass details to the view
        $this->resumeName = $resumeName; // optional
        $this->resumeUrl = $resumeUrl;   // optional
        $this->resumePath = $resumePath; // optional, for attachment
    }

    public function build()
    {
        $mail = $this->from('noreply@yourdomain.com', 'HR Team')
                     ->subject('New Job Application from ' . $this->details['name'])
                     ->view('emails.job_application') // Blade template
                     ->with([
                         'details' => $this->details,       // ✅ important!
                         'resumeName' => $this->resumeName,
                         'resumeUrl' => $this->resumeUrl
                     ]);

        if ($this->resumePath && file_exists($this->resumePath)) {
            $mail->attach($this->resumePath, [
                'as' => $this->resumeName,
                'mime' => 'application/pdf',
            ]);
        }

        return $mail;
    }
}
