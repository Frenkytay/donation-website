<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #212529;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .form-card {
      background-color: #2d2d2d;
      color: #fff;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
      width: 100%;
      max-width: 600px;
    }
    .form-control {
      background-color: transparent;
      color: #fff;
      border: 1px solid #fff;
    }
    .form-control::placeholder {
      color: #aaa;
    }
    .form-control:focus {
      box-shadow: none;
      border-color: #60a5fa;
    }
    .form-check-input:checked {
      background-color: #3b82f6;
      border-color: #3b82f6;
    }
    .btn-primary {
      background-color: #3b82f6;
      border: none;
    }
    .btn-primary:hover {
      background-color: #2563eb;
    }
    .alert-danger {
      margin-top: 0.5rem;
    }
  </style>
</head>
<body>
  <div class="form-card">
    <h3 class="text-center mb-4">Registration Form</h3>
    <form method="POST" action="{{ url('/register') }}">
      @csrf
      <div class="row g-3 mb-3">
        <div class="col-md-6">
          <input type="text" name="name" class="form-control" placeholder="First Name" value="{{ old('name') }}" required>
          @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <!-- <div class="col-md-6">
          <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}" required>
          @error('last_name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div> -->
      </div>
      <!-- <div class="row g-3 mb-3">
        <div class="col-md-6">
          <input type="date" name="birthday" class="form-control" value="{{ old('birthday') }}" required>
          @error('birthday')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <label class="form-label d-block">Gender:</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="female" value="female" required {{ old('gender') == 'female' ? 'checked' : '' }}>
            <label class="form-check-label" for="female">Female</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
            <label class="form-check-label" for="male">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="other" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
            <label class="form-check-label" for="other">Other</label>
          </div>
        </div>
      </div> -->
      <div class="row g-3 mb-3">
        <div class="col-md-6">
          <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
          @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <input type="tel" name="phoneNo" class="form-control" placeholder="Phone Number" value="{{ old('phoneNo') }}" required>
          @error('phoneNo')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="row g-3 mb-3">
        <div class="col-md-6">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
        </div>
      </div>
      <button type="submit" class="btn btn-primary w-100">REGISTER</button>
    </form>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
