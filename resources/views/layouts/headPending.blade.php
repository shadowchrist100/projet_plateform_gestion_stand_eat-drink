<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eat & Drink Expo - @yield('title')</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .hero-bg {
            background-image: url('/images/hero-bg.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="font-sans">
    @include('partials.headerPending')

    <main>
        @yield('contentP')
    </main>

    
    <script>
        lucide.createIcons();
    </script>

</body>
</html>