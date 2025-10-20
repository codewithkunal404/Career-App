<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Application Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- important for responsiveness -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #007bff, #6610f2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .application-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 700px;
            padding: 40px 50px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .application-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        h3 {
            color: #343a40;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 16px;
        }

        .btn-primary {
            background: linear-gradient(90deg, #007bff, #6610f2);
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-size: 18px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
        }

        .alert-success {
            border-radius: 10px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .application-card {
                padding: 30px 25px;
                border-radius: 15px;
            }
            h3 {
                font-size: 1.5rem;
            }
            .btn-primary {
                font-size: 16px;
                padding: 10px;
            }
        }

        @media (max-width: 576px) {
            .application-card {
                padding: 25px 20px;
            }
            .form-control {
                font-size: 15px;
                padding: 10px 12px;
            }
            .btn-primary {
                font-size: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="application-card">
            <h3 class="text-center mb-4">💼 Apply for a Job</h3>

            @if(session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

          <!-- ... previous head and styles remain the same ... -->

<form action="{{ route('job.apply') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-3">
        <!-- Full Name -->
        <div class="col-md-6">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" placeholder="John Doe" value="{{ old('name') }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Email -->
        <div class="col-md-6">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" placeholder="john@example.com" value="{{ old('email') }}">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Education -->
        <div class="col-12">
            <label class="form-label">Education Details</label>
            <input type="text" name="education" class="form-control" placeholder="B.Tech in Computer Science" value="{{ old('education') }}">
            @error('education') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Experience -->
        <div class="col-md-6">
            <label class="form-label">Experience (Years)</label>
            <input type="number" name="experience" class="form-control" placeholder="3" value="{{ old('experience') }}">
            @error('experience') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Current Salary -->
        <div class="col-md-6">
            <label class="form-label">Current Salary (₹)</label>
            <input type="number" name="current_salary" class="form-control" placeholder="500000" value="{{ old('current_salary') }}">
            @error('current_salary') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Expected Salary -->
        <div class="col-md-6">
            <label class="form-label">Expected Salary (₹)</label>
            <input type="number" name="expected_salary" class="form-control" placeholder="600000" value="{{ old('expected_salary') }}">
            @error('expected_salary') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Work Preference -->
        <div class="col-md-6">
            <label class="form-label">Preferred Work Location</label>
            <select name="work_location" class="form-select">
                <option value="" disabled selected>Select</option>
                <option value="Remote" {{ old('work_location')=='Remote' ? 'selected':'' }}>Remote</option>
                <option value="Office" {{ old('work_location')=='Office' ? 'selected':'' }}>Office</option>
                <option value="Hybrid" {{ old('work_location')=='Hybrid' ? 'selected':'' }}>Hybrid</option>
            </select>
            @error('work_location') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Current Location -->
        <div class="col-12">
            <label class="form-label">Your Current Location</label>
            <input type="text" name="current_location" class="form-control" placeholder="City, State, Country" value="{{ old('current_location') }}">
            @error('current_location') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Cover Letter -->
        <div class="col-12">
            <label class="form-label">Cover Letter / Message</label>
            <textarea name="message" class="form-control" rows="4" placeholder="Write something about yourself...">{{ old('message') }}</textarea>
            @error('message') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Resume -->
        <div class="col-12">
            <label class="form-label">Attach Resume (PDF/DOC)</label>
            <input type="file" name="resume" class="form-control">
            @error('resume') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Submit -->
        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary w-100">Submit Application</button>
        </div>
    </div>
</form>

        </div>
    </div>
</body>
</html>
