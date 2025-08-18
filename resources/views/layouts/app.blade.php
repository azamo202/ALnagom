<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>محلات النجوم | NA</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    
    <!-- CSS -->
    @include('layouts.style')
    
    <!-- JS -->
    @include('layouts.script')
</head>
<body class="bg-gray-50">
    <!-- Header -->
    @include('layouts.header')
    
    <!-- Mobile Menu -->
    @include('layouts.mobile')
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('layouts.footer')
    
    <!-- JS -->
    @stack('scripts')
</body>
</html>