<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Register Admin | Marketplace</title>
    <style>
        :root {
            --primary-color: #6366f1;
            --bg-color: #f8fafc;
            --text-dark: #1e293b;
            --text-muted: #64748b;
        }

        body {
            min-height: 100vh;
            background-color: var(--bg-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            color: var(--text-dark);
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            border: none;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.03);
        }

        .brand-logo {
            width: 50px;
            height: 50px;
            background-color: #1e293b;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            margin: 0 auto 20px;
            font-size: 24px;
        }

        .login-header h1 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .login-header p {
            color: var(--text-muted);
            font-size: 15px;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 500;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px 15px;
            border: 1px solid #e2e8f0;
            background-color: #fcfcfc;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            background-color: var(--primary-color);
            border: none;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #4f46e5;
            transform: translateY(-1px);
        }

        .footer-text {
            text-align: center;
            margin-top: 25px;
            font-size: 13px;
            color: var(--text-muted);
        }

        .alert {
            border-radius: 12px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header text-center">
                <div class="brand-logo"><i class="bi bi-person-plus"></i></div>
                <h1>Daftar Akun</h1>
                <p>Buat akun admin marketplace Anda</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control border-end-0 @error('password') is-invalid @enderror"
                            id="password" name="password" required
                            style="border-top-right-radius: 0; border-bottom-right-radius: 0;">

                        <span class="input-group-text bg-white border-start-0 text-muted" id="togglePassword"
                            style="cursor: pointer; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border: 1px solid #e2e8f0;">
                            <i class="bi bi-eye" id="eyeIcon"></i>
                        </span>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <div class="input-group">
                        <input type="password"
                            class="form-control border-end-0 @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation" required
                            style="border-top-right-radius: 0; border-bottom-right-radius: 0;">

                        <span class="input-group-text bg-white border-start-0 text-muted"
                            id="togglePasswordConfirmation"
                            style="cursor: pointer; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border: 1px solid #e2e8f0;">
                            <i class="bi bi-eye" id="eyeIconConfirmation"></i>
                        </span>
                    </div>
                </div>

                <button type="submit" class="btn-primary">Daftar Sekarang</button>
            </form>

            <div class="footer-text">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none"
                    style="color: var(--primary-color); font-weight: 600;">Login di sini</a>
            </div>
        </div>
    </div>
    <script>
        function setupToggle(buttonId, inputId) {
            const button = document.querySelector(buttonId);
            const input = document.querySelector(inputId);
            const icon = button.querySelector('i');

            button.addEventListener('click', function () {
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                icon.classList.toggle('bi-eye');
                icon.classList.toggle('bi-eye-slash');
            });
        }

        // Jalankan untuk password utama
        setupToggle('#togglePassword', '#password');
        // Jalankan untuk konfirmasi password
        setupToggle('#togglePasswordConfirmation', '#password_confirmation');
    </script>
</body>

</html>