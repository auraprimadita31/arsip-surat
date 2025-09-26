<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Arsip Surat')</title>
    {{-- Sederhanakan dengan CSS Internal untuk meniru desain --}}
    <style>
        body { font-family: sans-serif; margin: 0; background-color: #f4f4f4; }
        .container { display: flex; }
        .sidebar { width: 200px; background-color: #333; color: white; min-height: 100vh; padding: 20px; }
        .sidebar h2 { text-align: center; }
        .sidebar ul { list-style: none; padding: 0; }
        .sidebar ul li a { display: block; color: white; padding: 10px; text-decoration: none; }
        .sidebar ul li a:hover, .sidebar ul li a.active { background-color: #555; }
        .main-content { flex-grow: 1; padding: 20px; }
        /* ... tambahkan style lain untuk tabel, tombol, form, dll ... */
    </style>
</head>
<body>
    <div class="container">
        <nav class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="{{ route('surat.index') }}" class="{{ request()->is('/') ? 'active' : '' }}">⭐ Arsip</a></li>
                <li><a href="{{ route('kategori.index') }}" class="{{ request()->is('kategori*') ? 'active' : '' }}">🗂️ Kategori Surat</a></li>
                <li><a href="{{ route('about') }}" class="{{ request()->is('about') ? 'active' : '' }}">ℹ️ About</a></li>
            </ul>
        </nav>
        <main class="main-content">
            @yield('content')
        </main>
    </div>
</body>
</html>