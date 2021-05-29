<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('title')</title>

    {{-- prepend style --}}
    @stack('prepend-style')

    {{-- css --}}
    @include('includes.style')

    {{-- addons css --}}
    @stack('addons-style')
</head>

<body>
    {{-- navbar --}}
    @include('includes.navbar-alternate')

    {{-- Header dan content index / halaman utama website --}}
    @yield('content')

    {{-- Footer Website --}}
    @include('includes.footer')
    
    {{-- prepend javascript --}}
    @stack('prepend-script')

    {{-- javascript --}}
    @include('includes.script')

    {{-- addons javascript --}}
    @stack('addons-script')
</body>

</html>