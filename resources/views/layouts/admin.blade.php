<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Marketplace</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @livewireStyles

    <style>
        :root {
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --primary-soft: #6366f1;
            --primary-light: #eef2ff;
            --card-bg: #ffffff;
            --border-color: #f1f5f9;
            --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.04);
        }

        [data-bs-theme='dark'] {
            --bg-body: #0f172a;
            --text-main: #f1f5f9;
            --text-muted: #94a3b8;
            --card-bg: #1e293b;
            --border-color: #334155;
            --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2);
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            transition: 0.3s;
            margin: 0;
        }

        .main-content {
            min-height: 100vh;
            padding-bottom: 50px;
        }

        .dashboard-container {
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Komponen Global yang sering dipakai */
        .stat-card,
        .action-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            transition: 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .bg-indigo-light {
            background-color: var(--primary-light);
            color: var(--primary-soft);
        }

        .date-badge {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 0.85rem;
            color: var(--text-muted);
            font-weight: 500;
        }
    </style>

    <script>
        (function () {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', savedTheme);
        })();

        function toggleTheme() {
            const html = document.documentElement;
            const targetTheme = html.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark';
            html.setAttribute('data-bs-theme', targetTheme);
            localStorage.setItem('theme', targetTheme);
            if (typeof updateThemeIcon === "function") updateThemeIcon(targetTheme);
        }
    </script>
</head>

<body>

    @include('admin.sidebar') {{-- Navbar Anda --}}

    <div class="main-content">
        <div class="dashboard-container">
            @yield('content')
        </div>
    </div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateThemeIcon(theme) {
            const icon = document.getElementById('theme-icon');
            if (icon) icon.className = theme === 'dark' ? 'bi bi-sun-fill fs-5' : 'bi bi-moon-stars-fill fs-5';
        }
        document.addEventListener('DOMContentLoaded', () => updateThemeIcon(localStorage.getItem('theme') || 'light'));
    </script>
</body>

</html>