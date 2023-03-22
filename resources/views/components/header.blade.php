<div>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
        {{-- <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}
    
        <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        {{-- <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet"> --}}
    
        <!-- Custom styles for this template-->
    
        <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
        {{-- <script src="{{asset('ajax.js')}}">
        </script>  --}}
         <script src="{{asset('jquery.js')}}">
    
    
         </script>
          {{-- <link src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"> --}}
        
    
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
       
    </head>

</div>
