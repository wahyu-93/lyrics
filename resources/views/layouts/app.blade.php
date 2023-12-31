<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'lyrics')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- tailwind --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@0.7.4/dist/utilities.min.css" rel="stylesheet">

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    
    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>
<body>
    <div id="app">
        @include('layouts.partials.navigation')

        <main class="py-4">
            <div class="container">
                @include('alert')
            </div>
            @yield('content')

            <footer>
                <div class="bg-blue py-2 mt-5">
                   <div class="text-sm text-center text-white">
                    &copy; Lyrics - 2023
                   </div>
                </div>
            </footer>
        </main>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
    <script type="text/javascript">
    $(document).ready(function(){
        $('#genre').select2({
            multiple: true,
            tags: true,
        })

        $('#select-band').select2()
        $('#select-album').select2()
    })
    </script>

    @yield('script')
</body>
</html>
