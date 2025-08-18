<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'محلات النجوم | NA' }}</title>
    @livewireStyles
</head>
<body class="bg-gray-100">
    <div class="mx-auto py-0">
        {{ $slot }}
    </div>
    @livewireScripts
</body>
</html>
