<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="img/fplogo.png">
    <title>{{ config('app.name', 'Gestion Laboratoire') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles  -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    <h3>Gestion Laboratoire</h3>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                            <li>
                                <a style="font-size: larger; padding-right: 25px; color: white" id="navbarDropdown" class="nav-link " href="{{ route('chef.equipe.Home') }}" role="button">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a style="font-size: larger; padding-right: 25px; color: white" id="navbarDropdown" class="nav-link " href="{{ route('chef.equipe.rapport') }}" role="button">
                                    Rapports
                                </a>
                            </li>
                            </li>
                            <li>
                                <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"
                                    style="font-size: larger; padding-right: 25px; color: white" id="navbarDropdown" class="nav-link" role="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                    </svg>
                                    {{ Auth::guard('chefequipe')->user()->name }}
                                </a>
                            </li>
                            <li>
                                
                                <a href="" onclick="ShowModal('LogOut','Do you really want to leave this page', 'Yes', 'No');
                                            return false;" style="font-size: larger; padding-right: 25px; color: white" class="nav-link " role="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                    </svg>
                                    {{ __('Logout') }}
                                   
                                </a>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script>
        var ModalWrap = null;

        //don't creat multiple modal
        if(ModalWrap !== null){
        modal.remove();
        }
            const ShowModal = (title, description, btnyes, btnNO) => {
                ModalWrap = document.createElement('div');
                ModalWrap.innerHTML = `
                <div style=" background-color:rgba(0,0,0,0.5); position: absolute;" class="modal fade" tabindex="-1">
                    <div style="width:35%; height:30%; z-index: -1; border-raduis:3px;" class="modal-dialog bg-light">
                        <div class="modal-content">
                            <div style="border-radius: 0 0 0 0 !important; height:55px; background-color: #424e83 !important; color: white; margin: -1; border-raduis: 3px 3px 0 0" class="modal-header bg-light">
                                <h1 class="modal-title">${title}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div style="margin-top: 10px; height:120px" class="modal-body">
                                <h4 style="font-weight: bold; margin-bottom:10px;">${description}</h4>
                            </div>
                            <div style="border-radius: 0 0 0 0 !important; height:55px; background-color: #424e83 !important; color: white; margin: -1; border-raduis: 3px 3px 0 0" class="modal-footer bg-light">
                                <button style="margin-top:-5" type="button" class="btn btn-success" data-bs-dismiss="modal">${btnNO}</button>
                                <a style="margin-top:-5" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  href="{{ route('logout') }}" class="btn btn-danger">${btnyes}</a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            `;

            document.body.append(ModalWrap);
            var modal = new bootstrap.Modal(ModalWrap.querySelector('.modal'));
            modal.show();
        }
    </script>
</body>
</html>
