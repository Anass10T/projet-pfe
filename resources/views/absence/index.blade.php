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
    <title>Liste d'absences</title>

    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");
    </style>
</head>

<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Gestion des Stagiaires</a>
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
                <h1><i class="fa fa-th-list"></i> Liste d'absences</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="/absence/index">liste d'absences</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a class="btn btn-primary mb-3" href="{{ route('absence.create') }}"> Ajouter une absence</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="tile">
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom et prénom du stagiaire :</th>
                            <th>Justification</th>
                            <th>Type d'absence</th>
                            <th>Date d'absence</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absences as $absence)
                            <tr>
                                <td>{{ $absence->id }}</td>
                                <td>{{ $absence->stagiaire->nom }} {{ $absence->stagiaire->prenom }}</td>
                                <td>{{ $absence->justification ? 'oui' : 'non' }}</td>
                                <td>{{ $absence->type_absence }}</td>
                                <td>{{ $absence->date_absence }}</td>



                                <td>
                                    <div class="d-inline-block">


                                        <a href="{{ route('absence.edit', $absence->id) }}"
                                            class="d-inline edit-link">
                                            <img src="/images/edit.png" alt="Modifier" class="edit-icon">
                                        </a>
                                        <style>
                                            .edit-link {
                                                text-decoration: none;
                                                /* enlever la soulignement du lien */
                                            }

                                            .edit-icon {
                                                width: 30px;
                                                /* définir la largeur de l'icône */
                                                height: 30px;
                                                /* définir la hauteur de l'icône */
                                                margin-right: 9px;
                                                /* ajouter une marge à droite pour séparer l'icône du texte */
                                            }
                                        </style>




                                        <a href="{{ route('absence.destroy', $absence->id) }}"
                                            onclick="return confirm('Voulez-vous vraiment supprimer l absence ?')"
                                            class="d-inline destroy-link">
                                            <img src="/images/delete.png" alt="Modifier" class="destroy-icon">
                                        </a>
                                        <style>
                                            .destroy-link {
                                                text-decoration: none;
                                                /* enlever la soulignement du lien */
                                            }

                                            .destroy-icon {
                                                width: 30px;
                                                /* définir la largeur de l'icône */
                                                height: 30px;
                                                /* définir la hauteur de l'icône */
                                                margin-right: 9px;
                                                /* ajouter une marge à droite pour séparer l'icône du texte */
                                            }
                                        </style>

                                    </div>
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
            $(document).ready(function() {
            $('#myTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json',
                },
                scrollX: true,
            scrollX: '400px',

            });
        });

             </script>


</body>



<html>
