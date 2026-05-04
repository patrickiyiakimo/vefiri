<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Vefiri') }}</title>
    
    <!-- Fonts - Professional E-commerce Font Stack -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Primary Font: Inter - Modern, clean, excellent for e-commerce -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600&display=swap" rel="stylesheet">
    
    <!-- Secondary Font: Plus Jakarta Sans - Contemporary and elegant -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Fallback System Font Stack -->
    <style>
        :root {
            --font-primary: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            --font-heading: 'Plus Jakarta Sans', 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        
        body {
            font-family: var(--font-primary);
            font-weight: 400;
            font-size: 16px;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-heading);
            font-weight: 700;
            letter-spacing: -0.02em;
        }
        
        /* Optional: Better font rendering for headings */
        h1 {
            letter-spacing: -0.03em;
        }
        
        h2, h3 {
            letter-spacing: -0.02em;
        }
        
        /* Button text styling */
        button, .btn, .button {
            font-weight: 500;
            letter-spacing: -0.01em;
        }
        
        /* Price styling */
        .price, .product-price {
            font-weight: 700;
            letter-spacing: -0.01em;
        }
    </style>
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    @include('layouts.navbar')
    
    <main>
        @yield('content')
    </main>

    @include('layouts.footer')
</body>
</html>