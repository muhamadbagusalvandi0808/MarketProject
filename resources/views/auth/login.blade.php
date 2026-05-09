<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tampilan Login</title>

    <style>
    body {
        min-height: 100vh;
        background: linear-gradient(135deg, #4e73df, #1cc88a);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-container {
        width: 100%;
        max-width: 400px;
        padding: 15px;
    }

    .login-card {
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        animation: fadeIn 0.6s ease-in-out;
    }

    .login-header {
        text-align: center;
        margin-bottom: 25px;
    }

    .login-header h1 {
        font-size: 32px;
        font-weight: 700;
        color: #4e73df;
        margin-bottom: 5px;
    }

    .login-header p {
        color: #6c757d;
        font-size: 14px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-label {
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .form-control {
        border-radius: 8px;
        padding: 10px 12px;
    }

    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }

    .btn-primary {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        font-weight: 600;
        background-color: #4e73df;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #2e59d9;
    }

    .alert {
        font-size: 14px;
        border-radius: 8px;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h1>Welcome</h1>
                <p>Please login to you're account</p>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" 
                    class="form-control @error('email') is-invalid @enderror"
                    id="email" name="email" 
                    value="{{ old('email') }}" required autofocus placeholder="Enter you're email">
                    @error('email')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" 
                    class="form-control @error('password') is-invalid @enderror"
                    id="password" name="password" 
                    value="{{ old('password') }}" required autofocus placeholder="Enter you're password">
                    @error('password')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn-primary">Login</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>