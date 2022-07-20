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
    <link rel="icon" type="image" sizes="16x16" href="{{ asset('vendors/images/nusanet.png') }}">
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">

    <!-- App CSS -->
    @include('includes.style')

    @include('sweetalert::alert')

</head>

<body class="app">

    @livewireStyles

    @include('includes.header')
    <!--//app-header-->

    @include('includes.sidebar')
    <!--//app-sidepanel-->

    <div class="app-wrapper">

        {{ $slot }}
        <!--//app-content-->

        @include('includes.footer')
        <!--//app-footer-->

    </div>
    <!--//app-wrapper-->


    <!-- Javascript -->
    @include('includes.script')

    @livewireScripts

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            var table1 = $('#datatables-Personal').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true
            });
            var table2 = $('#datatables-Bussiness').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true
            });
        });
    </script>
</body>

</html>
