<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!--- Tambahkan setelah app.css --->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F9F9F7;
        }
        .font-serif {
            font-family: 'Playfair Display', serif;
        }
        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #121212;
            padding: 0.5rem 1rem;
            line-height: 1.25;
            border: 1px solid #E5E5E5;
            border-radius: 0;
            background-color: #fff;
        }
        .dataTables_wrapper select:focus,
        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #C5A059;
            outline: none;
            ring: 0;
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #FAF7F2;
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 600;
            border-radius: 0;
            border: 1px solid #E5E5E5;
            margin-left: 2px;
            padding: 0.5rem 1rem !important;
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            background: #121212 !important;
            border: 1px solid #121212 !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            background: #C5A059 !important;
            border: 1px solid #C5A059 !important;
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #E5E5E5;
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
        }

        table.dataTable thead th {
            border-bottom: 2px solid #121212 !important;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 1rem !important;
        }

        table.dataTable tbody td {
            padding: 1rem !important;
            font-size: 0.875rem;
            border-bottom: 1px solid #E5E5E5;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #C5A059 !important;
        }
    </style>

    <!--- Tambahkan setelah app.js --->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    <!--- Tambahkan setelah livewireScripts --->
    {{ $script ?? '' }}
</body>

</html>
