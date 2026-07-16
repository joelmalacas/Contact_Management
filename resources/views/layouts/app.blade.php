<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Painel Admin')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #f4f6f8;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        .navbar {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            box-shadow: 0 2px 10px rgba(0,0,0,0.15);
        }

        .navbar-brand {
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link {
            font-size: 0.92rem;
            transition: color 0.15s ease;
        }

        .nav-link.active {
            font-weight: 600;
            color: #3498db !important;
        }

        main {
            max-width: 1100px;
            margin: 0 auto;
            padding: 30px 20px 60px;
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #999;
            font-size: 0.85rem;
        }

        .btn-logout {
            border: 1px solid rgba(255,255,255,0.3);
            color: #ecf0f1;
        }

        .btn-logout:hover {
            background-color: rgba(255,255,255,0.1);
            color: white;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-contact {
            animation: fadeInUp 0.4s ease both;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border-left: 4px solid #3498db;
        }

        .card-contact:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.12) !important;
        }

        .card-contact .btn {
            transition: transform 0.15s ease;
        }

        .card-contact .btn:hover {
            transform: scale(1.05);
        }

        .contact-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3498db, #2c3e50);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
            flex-shrink: 0;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}" href="{{ route('contact.index') }}">
                        <i class="bi bi-person-lines-fill"></i> Contactos
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item d-flex align-items-center">
                        <span class="text-light me-3 small">
                            <i class="bi bi-person-circle"></i> {{ Auth::guard('admin')->user()->name }}
                        </span>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-logout">
                            <i class="bi bi-box-arrow-right"></i> Sair
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('conteudo')
</main>

<footer>
    <small>Painel Admin &copy; {{ date('Y') }}</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
