<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .row {
            display: flex;
            justify-content: space-around;
            margin: 80px 0;
        }


        .widget-small {
            width: 100%;
            height: 100%;
            text-align: center;
            padding: 0px;
            box-sizing: border-box;
        }

        .widget-small .icon {
            font-size: 8rem;
            min-width: 200px;
        }

        .details {
            width: 60%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .details h4 {
            margin-top: 15px;
            font-size: 23px;
        }

        .details p {
            margin-bottom: 5px;
            font-size: 3rem;
            font-weight: bold;
        }

        .small-box-footer {
            margin-top: 20px;
            font-size: 1rem;
            font-weight: bold;
            display: inline-block;
        }
    </style>

</head>

<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="/admin-dashboard">Gestion des Stagiaires</a>
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
            aria-label="Hide Sidebar"></a>
        <ul class="app-nav">
            <!-- User Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
                    aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>

                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="{{route('settings.index')}}"><i class="fa fa-cog fa-lg"></i> Paramètre</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"><i
                                class="fa fa-sign-out fa-lg"></i> Déconnexion</a></li>

                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar_user"><img class="app-sidebar_user-avatar mx-2" src="{{ asset('images/user.png') }}"
                alt="User Image">
            <div>
                <p class="app-sidebar__user-name mt-2 mb-2 mx-2 px-2" style="color:white"> {{ old('nom', auth()->user()->nom) }}</p>
                <p class="app-sidebar__user-designation"></p>
            </div>
        </div>
        <ul class="app-menu">
            <li><a class="app-menu__item" href="/admin-dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span
                        class="app-menu__label">Tableau de bord</span></a></li>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Stagiaires</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="{{ route('stagiaire.index') }}"><i
                                class="icon fa fa-circle-o"></i> Les stagiaires en cours</a></li>
                                <li><a class="treeview-item" href="{{ route('stagiaire.archives') }}"><i class="icon fa fa-circle-o"></i> Les stagiaires
                                    Archivés</a></li>
                        </ul>
            </li>

            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-tasks"></i><span class="app-menu__label">Stages</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="{{ route('stage.index') }}"><i
                                class="icon fa fa-circle-o"></i>Afficher les stages</a></li>
                    <li><a class="treeview-item" href="{{ route('stage.create') }}"><i
                                class="icon fa fa-circle-o"></i>Ajouter un stage</a></li>
                </ul>

            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-user-times"></i><span class="app-menu__label">Absences</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="{{ route('absence.index') }}"><i
                                class="icon fa fa-circle-o"></i>Afficher les Absences</a></li>
                    <li><a class="treeview-item" href="{{ route('absence.create') }}"><i
                                class="icon fa fa-circle-o"></i>Ajouter une absence</a></li>
                </ul>
            </li>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Tâches</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="{{ route('tache.index') }}"><i
                                class="icon fa fa-circle-o"></i>Afficher les tâches</a></li>
                    <li><a class="treeview-item" href="{{ route('tache.create') }}"><i
                                class="icon fa fa-circle-o"></i> Ajouter une tâche</a></li>
                </ul>
            </li>
        </ul>
    </aside>
    <main class="app-content">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Tableau de bord</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="/admin-dashboard">Tableau de bord</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                    <div class="details">
                        <h4>Le nombre des stagiaires</h4>
                        <p><b>{{ \App\Models\Stagiaire::count() }}</b></p>
                        <a href="{{ url('/stagiaires') }}" class="small-box-footer">Plus d'informations <i
                                class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="widget-small info coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
                    <div class="details">
                        <h4>Le nombre des tâches</h4>
                        <p><b>{{ \App\Models\Tache::count() }}</b></p>
                        <a href="{{ route('tache.index') }}" class="small-box-footer">Plus d'informations <i
                                class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 my-5">
                <div class="widget-small warning coloured-icon"><i class="icon fa fa-tasks fa-3x "></i>
                    <div class="details">
                        <h4>Le nombre d'affectation</h4>
                        <p><b>{{ \App\Models\Stage::count() }}</b></p>
                        <a href="{{ route('stage.index') }}" class="small-box-footer">Plus d'informations <i
                                class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 my-5">
                <div class="widget-small danger coloured-icon"><i class="icon fa fa-user-times fa-3x"></i>
                    <div class="details">
                        <h4>Le nombre des absences</h4>
                        <p><b>{{ \App\Models\Absence::count() }}</b></p>
                        <a href="{{ route('absence.index') }}" class="small-box-footer">Plus d'informations <i
                                class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>





    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
