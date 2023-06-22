<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier une absence</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Gestion des stagiaires</a>
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
            aria-label="Hide Sidebar"></a>
        <ul class="app-nav">
            <!-- User Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
                    aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>

                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="/admin/settings"><i class="fa fa-cog fa-lg"></i> Paramètre</a>
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
                <p class="app-sidebar__user-name mt-2 mb-2 mx-2 px-2" style="color:white">{{ old('nom', auth()->user()->nom) }}</p>
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
                <h1><i class="fa fa-dashboard"></i> Modifier l'absence</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="/admin-dashboard">Modifier l'absence</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Modifier l'absence</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('tache.index') }}"> Back</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error!</strong> <br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('absence.update', $absence->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="stagiaire_id">Nom et prénom du stagiaire :</label>
                <select class="form-control" id="stagiaire_id" name="stagiaire_id">
                    @foreach ($stagiaires as $stagiaire)
                        <option value="{{ $stagiaire->id }}"
                            {{ $absence->stagiaire_id == $stagiaire->id ? 'selected' : '' }}>
                            {{ $stagiaire->nom }} {{ $stagiaire->prenom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="type_absence">Type d'absence :</label>
                <input type="text" class="form-control" id="type_absence" name="type_absence"
                    value="{{ $absence->type_absence }}" required>
            </div>

            <div class="form-group">
                <label for="date_absence">Date d'absence :</label>
                <input type="date" class="form-control" id="date_absence" name="date_absence"
                    value="{{ $absence->date_absence }}" required>
            </div>

            <div class="form-group">
                <label for="justification">Justification :</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="justification" id="justification_oui"
                        value="1" {{ $absence->justification ? 'checked' : '' }}>
                    <label class="form-check-label" for="justification_oui">
                        Oui
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="justification" id="justification_non"
                        value="0" {{ !$absence->justification ? 'checked' : '' }}>
                    <label class="form-check-label" for="justification_non">
                        Non
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>



    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</html>
