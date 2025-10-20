<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Job Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f8f9fa; padding: 20px; }
        .email-card { max-width: 650px; margin:auto; background:#fff; border-radius:12px; padding:30px; box-shadow:0 4px 20px rgba(0,0,0,0.1);}
        h2 { color:#0d6efd; font-weight:700; margin-bottom:25px; text-align:center;}
        .section { margin-bottom:18px; border-bottom:1px solid #dee2e6; padding-bottom:10px;}
        .label { font-weight:600; color:#495057; display:block; margin-bottom:5px;}
        .value { color:#212529; font-size:16px;}
        .resume-link { display:inline-block; padding:10px 16px; background-color:#0d6efd; color:#fff !important; text-decoration:none; border-radius:8px; font-weight:600; transition:0.3s;}
        .resume-link:hover { background-color:#0b5ed7; }
        .footer { text-align:center; font-size:14px; color:#6c757d; margin-top:25px;}
    </style>
</head>
<body>
    <div class="email-card">
        <h2>💼 New Job Application</h2>

        <div class="section">
            <span class="label">Full Name:</span>
            <p class="value">{{ $details['name'] }}</p>
        </div>

        <div class="section">
            <span class="label">Email Address:</span>
            <p class="value">{{ $details['email'] }}</p>
        </div>

        <div class="section">
            <span class="label">Education:</span>
            <p class="value">{{ $details['education'] ?? 'N/A' }}</p>
        </div>

        <div class="section">
            <span class="label">Experience:</span>
            <p class="value">{{ $details['experience'] ?? 'N/A' }} years</p>
        </div>

        <div class="section">
            <span class="label">Current Salary:</span>
            <p class="value">₹{{ $details['current_salary'] ?? '0' }}</p>
        </div>

        <div class="section">
            <span class="label">Expected Salary:</span>
            <p class="value">₹{{ $details['expected_salary'] ?? '0' }}</p>
        </div>

        <div class="section">
            <span class="label">Preferred Work Location:</span>
            <p class="value">{{ $details['work_location'] ?? 'N/A' }}</p>
        </div>

        <div class="section">
            <span class="label">Current Location:</span>
            <p class="value">{{ $details['current_location'] ?? 'N/A' }}</p>
        </div>

        <div class="section">
            <span class="label">Cover Letter / Message:</span>
            <p class="value">{{ $details['message'] }}</p>
        </div>

        @if(isset($resumeName))
        <div class="section">
            <span class="label">Resume:</span><br>
            <a href="{{ $resumeUrl }}" class="resume-link" target="_blank">Download Resume</a>
        </div>
        @endif

        <div class="footer">
            This email was automatically generated from the Job Application Portal.
        </div>
    </div>
</body>
</html>
