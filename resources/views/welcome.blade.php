@extends('layout.conquer')

@section('content')
    <h3 class="page-title">
        Welcome 
        <small>Selamat datang!</small>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Welcome</a>
                <i class="fa fa-angle-right"></i>
            </li>
            
            <li >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#" onclick="showInfo()">
                <i class="icon-bulb"></a></i>
            </li>

        </ul>
        <div class="page-toolbar">
            <button class='btn btn-info'>Help</button>

            <button class='btn btn-warning'
            data-toggle="modal"
            href="#disclaimer">Disclaimer</button>
            <!-- tempat action button -->
        </div>
    </div>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

           
        </div>

        <div class="content">
            <div id='div_showinfo'>

            </div>
            <div class="title m-b-md">
                APOTIKZ
            </div>

        </div>

        <div class="modal fade" id="disclaimer" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">DISCLAIMER</h4>
                    </div>
                    <div class="modal-body">
                    Pictures shown are for illustration purpose only. 
                    Actual product may vary due to product enhancement.
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        @endsection