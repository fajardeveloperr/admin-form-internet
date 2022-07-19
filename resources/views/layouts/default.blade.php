<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nusanet</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Dashboard Admin for Nusanet">
    <meta name="author" content="Muhammad Fajar">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" type="image" sizes="16x16" href="{{ asset('vendors/images/nusanet.png')}}">

    <!-- FontAwesome JS-->


    <!-- App CSS -->
    @include('includes.style')

    @include('sweetalert::alert')

</head>

<body class="app">

    @livewireStyles

    @include('includes.header')<!--//app-header-->

    @include('includes.sidebar')<!--//app-sidepanel-->

    <div class="app-wrapper">

	    {{ $slot }}<!--//app-content-->

	    @include('includes.footer')
        <!--//app-footer-->

    </div><!--//app-wrapper-->


    <!-- Javascript -->
    @include('includes.script')

    @livewireScripts

</body>
</html>

