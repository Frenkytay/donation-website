<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .login-card {
            background-color: #1f1f1f;
            color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 400px;
        }

        .login-card .btn-primary {
            background-color: transparent;
            border: 1px solid #fff;
            color: #fff;
        }

        .login-card .btn-primary:hover {
            background-color: #3b82f6;
            border-color: #3b82f6;
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

        .social-icons a {
            color: #fff;
            margin: 0 10px;
            font-size: 1.5rem;
            text-decoration: none;
        }

        .social-icons a:hover {
            color: #60a5fa;
        }

        .text-muted {
            font-size: 0.875rem;
        }

    </style>
</head>
<body>
    <div class="login-card text-center">
        <h3 class="mb-3">LOGIN</h3>
        <p class="mb-4">Please enter your login and password!</p>
        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <a href="#" class="d-block mb-3 text-muted text-decoration-none text-white">Forgot password?</a>
            <button type="submit" class="btn btn-primary w-100">LOGIN</button>
        </form>
        <div class="social-icons mt-4">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-google"></i></a>
        </div>
        <p class="mt-4">
            Don't have an account? <a href="/register" class="text-decoration-none text-primary">Sign Up</a>
        </p>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
