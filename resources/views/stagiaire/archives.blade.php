<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Liste des stagiaires Archivés</title>
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");

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
                <h1><i class="fa fa-th-list"></i> Liste des stagiaires Archivés</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Stagiaire</li>
                <li class="breadcrumb-item active"><a href="/stagiaires">Archive des stagiaires</a></li>
            </ul>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>CIN</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Etablissement</th>
                                    <th>Filière</th>
                                    <th>Photo</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($archives as $stagiaire)
                                    <tr>
                                        <td>{{ $stagiaire->cin }}</td>
                                        <td>{{ $stagiaire->nom }}</td>
                                        <td>{{ $stagiaire->prenom }}</td>
                                        <td>{{ $stagiaire->email }}</td>
                                        <td>{{ $stagiaire->telephone }}</td>
                                        <td>{{ $stagiaire->etablissement }}</td>
                                        <td>{{ $stagiaire->filiere }}</td>
                                        <td><img src="{{ asset('uploads/stagiaires/' . $stagiaire->photo) }}"
                                                width="70px" height="70px">
                                        </td>

                                        <td>
                                            <form action="{{ route('stagiaire.restore', $stagiaire->id) }}"
                                                method="POST" class="arch">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="btn btn-sm btn-success">Restaurer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $('#myTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json',
            },
            scrollX: true,
            scrollX: '400px',

        });
    </script>
</body>

</html>
