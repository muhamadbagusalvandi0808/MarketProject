<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons (Sesuai Dashboard) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Login Admin | Marketplace</title>

    <style>
        :root {
            --primary-color: #6366f1;
            /* Warna indigo sesuai tombol di dashboard */
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
            font-family: 'Inter', -apple-system, sans-serif;
            color: var(--text-dark);
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            /* Lebih bulat sesuai dashboard */
            border: none;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.03);
            /* Shadow halus */
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
            color: var(--text-dark);
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
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #e2e8f0;
            background-color: #fcfcfc;
            transition: all 0.2s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
            background-color: #fff;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            background-color: var(--primary-color);
            border: none;
            margin-top: 10px;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #4f46e5;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.2);
        }

        .footer-text {
            text-align: center;
            margin-top: 25px;
            font-size: 13px;
            color: var(--text-muted);
        }

        /* Styling Alert agar sesuai dashboard */
        .alert {
            border-radius: 12px;
            border: none;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header text-center">
                <!-- Icon Toko Sesuai Dashboard -->
                <div class="brand-logo">
                    <i class="bi bi-shop"></i>
                </div>
                <h1>Welcome Back</h1>
                <p>Silakan masuk ke akun admin Anda</p>
            </div>

            @if (session('success'))
                <div class="alert alert-success border-0 shadow-sm mb-4" style="background-color: #d1e7dd; color: #0f5132;">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                </div>
            @endif

            <!-- Bagian Error Validasi (Sudah ada di kode sebelumnya) -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" required autofocus>
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

                <button type="submit" class="btn-primary">
                    Login
                </button>
            </form>

            <div class="footer-text">
                Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none"
                    style="color: var(--primary-color); font-weight: 600;">Daftar Akun</a>
            </div>

            <div class="footer-text">
                &copy; {{ date('Y') }} Marketplace Admin Sistem
            </div>
        </div>
    </div>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const eyeIcon = document.querySelector('#eyeIcon');

        togglePassword.addEventListener('click', function () {
            // Toggle tipe input
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Toggle icon
            this.querySelector('i').classList.toggle('bi-eye');
            this.querySelector('i').classList.toggle('bi-eye-slash');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>