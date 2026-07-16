<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Autenticação')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

<div class="auth-wrapper">
    <div class="auth-card card">
        <div class="card-header">
            <div class="icon-circle">
                <i class="bi bi-shield-lock-fill"></i>
            </div>
            <h4>Painel Admin</h4>
            <p>Restrict Access</p>
        </div>
        <div class="card-body">
            @yield('conteudo')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
