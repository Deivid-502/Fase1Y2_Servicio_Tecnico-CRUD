<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Servicios tecnicos DH - @yield('titulo')</title>
    <style>
        :root{
            --bg:#f6f7fb;
            --card:#ffffff;
            --accent:#4f46e5;
            --accent-2:#06b6d4;
            --muted:#6b7280;
            --danger:#ef4444;
            --success:#10b981;
            --radius:12px;
            --shadow: 0 6px 18px rgba(15,23,42,0.08);
            font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        }
        body{ background:var(--bg); color:#111827; margin:0; padding:30px; }
        .wrap{ max-width:1100px; margin:0 auto; }
        header{ display:flex; align-items:center; gap:18px; margin-bottom:20px;}
        .brand{ background:linear-gradient(135deg,var(--accent),var(--accent-2)); color:white; padding:10px 14px; border-radius:10px; box-shadow:var(--shadow); font-weight:700;}
        nav a{ margin-right:12px; color:var(--muted); text-decoration:none; }
        .card{ background:var(--card); border-radius:var(--radius); padding:18px; box-shadow:var(--shadow); }
        table{ width:100%; border-collapse:collapse; }
        th,td{ padding:10px 8px; text-align:left; border-bottom:1px solid #eef2ff; color:#111827; }
        th{ color:var(--muted); font-size:13px; }
        .btn{ display:inline-block; padding:8px 12px; border-radius:8px; text-decoration:none; cursor:pointer; border:none; }
        .btn-primary{ background:var(--accent); color:white; }
        .btn-ghost{ background:transparent; border:1px solid #e6e9ff; color:var(--muted); }
        .btn-danger{ background:var(--danger); color:white; }
        form input, form select, form textarea{ width:100%; padding:8px 10px; border-radius:8px; border:1px solid #e6e9ef; margin-bottom:10px; }
        .flex-row{ display:flex; gap:8px; align-items:center; }
        .msg{ padding:10px 14px; border-radius:8px; margin-bottom:12px; }
        .msg-success{ background:var(--success); color:white; }
        .msg-error{ background:var(--danger); color:white; }
        footer{ margin-top:18px; color:var(--muted); font-size:13px; }
        .small-muted{ color:var(--muted); font-size:13px; }
        .actions { display:flex; gap:6px; }
        .topbar { display:flex; justify-content:space-between; align-items:center; margin-bottom:12px; }
        .search { width:260px; }
    </style>
</head>
<body>
<div class="wrap">
    <header>
        <div class="brand">Serv.Tec Guastatoya</div>
        <nav>
            <a href="{{ route('servicios.index') }}">Servicios</a>
            <a href="{{ route('clientes.index') }}">Clientes</a>
            <a href="{{ route('tecnicos.index') }}">Técnicos</a>
            <a href="{{ route('marcas.index') }}">Marcas</a>
            <a href="{{ route('equipos.index') }}">Equipos</a>
            <a href="{{ route('servicio-estados.index') }}">Estados</a>
            <a href="{{ route('hist-estados.index') }}">Historial</a>
        </nav>
    </header>

    @if(session('success'))
    <div class="msg msg-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('ok'))
    <div class="msg msg-success">
        {{ session('ok') }}
    </div>
    @endif

    @if(session('error'))
    <div class="msg msg-error">
        {{ session('error') }}
    </div>
    @endif

    <div class="card">
        <h2 style="margin-top:0">@yield('titulo')</h2>
        @yield('contenido')
    </div>

    <footer class="small-muted">Fase I · Servicios Tecnicos · hecho por David Hernández</footer>
</div>
</body>
</html>
