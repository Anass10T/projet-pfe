@extends('layouts.app')
@section('title', 'Login')

@section('navbar-brand', 'Formulaire de candidature')
@section('content')
    <style>
        body {
            background-color: lightseagreen
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Formulaire de candidature:') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('stagiaire.store') }}" enctype="multipart/form-data" novalidate>
                            @csrf

                            <div class="row mb-3">
                                <label for="cin"
                                    class="col-md-4 col-form-label text-md-end">{{ __('CIN') }}</label>

                                <div class="col-md-6">
                                    <input id="cin" type="text"
                                        class="form-control @error('cin') is-invalid @enderror" name="cin"
                                        value="{{ old('cin') }}" required autocomplete="cin">

                                    @error('cin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nom"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                                <div class="col-md-6">
                                    <input id="nom" type="text"
                                        class="form-control @error('nom') is-invalid @enderror" name="nom"
                                        value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="prenom"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Prénom') }}</label>

                                <div class="col-md-6">
                                    <input id="prenom" type="text"
                                        class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                                        value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Adresse mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="sexe"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Sexe') }}</label>

                                <div class="col-md-6">
                                    <select id="sexe" class="form-control @error('sexe') is-invalid @enderror"
                                        name="sexe" required>
                                        <option value="">-- {{ __('Sélectionnez un sexe') }} --</option>
                                        <option value="F" {{ old('sexe') == 'F' ? 'selected' : '' }}>
                                            {{ __('Femme') }}
                                        </option>
                                        <option value="H" {{ old('sexe') == 'H' ? 'selected' : '' }}>
                                            {{ __('Homme') }}
                                        </option>
                                    </select>

                                    @error('sexe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="adresse"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Adresse') }}</label>

                                <div class="col-md-6">
                                    <textarea id="adresse" class="form-control @error('adresse') is-invalid @enderror" name="adresse" required>{{ old('adresse') }}</textarea>

                                    @error('adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="telephone"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Téléphone') }}</label>

                                <div class="col-md-6">
                                    <input id="telephone" type="text"
                                        class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                                        value="{{ old('telephone') }}" required autocomplete="telephone">

                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="etablissement"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Etablissement') }}</label>

                                <div class="col-md-6">
                                    <input id="etablissement" type="text"
                                        class="form-control @error('etablissement') is-invalid @enderror"
                                        name="etablissement" value="{{ old('etablissement') }}" required
                                        autocomplete="etablissement">

                                    @error('etablissement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="filiere"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Filière') }}</label>

                                <div class="col-md-6">
                                    <input id="filiere" type="text"
                                        class="form-control @error('filiere') is-invalid @enderror" name="filiere"
                                        value="{{ old('filiere') }}" required autocomplete="filiere">

                                    @error('filiere')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="encadrant"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Encadrant Académique') }}</label>

                                <div class="col-md-6">
                                    <input id="encadrant" type="text"
                                        class="form-control @error('encadrant') is-invalid @enderror" name="encadrant"
                                        value="{{ old('encadrant') }}" required autocomplete="encadrant">

                                    @error('encadrant')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="photo"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Photo') }}</label>

                                <div class="col-md-6">
                                    <input id="photo" type="file"
                                        class="form-control @error('photo') is-invalid @enderror" name="photo" required
                                        autocomplete="photo">

                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="cv"
                                    class="col-md-4 col-form-label text-md-end">{{ __('CV') }}</label>

                                <div class="col-md-6">
                                    <input id="cv" type="file"
                                        class="form-control @error('cv') is-invalid @enderror" name="cv" required
                                        autocomplete="cv">

                                    @error('cv')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="niveau_etude"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Niveau d\'étude') }}
                                </label>
                                <div class="col-md-6">
                                    <select id="niveau_etude"
                                        class="form-control @error('niveau_etude') is-invalid @enderror"
                                        name="niveau_etude" required>
                                        <option value="" selected disabled hidden>
                                            {{ __('Choisir le niveau d\'étude') }}</option>
                                        <option value="Bac+1">{{ __('Bac+1') }}</option>
                                        <option value="Bac+2">{{ __('Bac+2') }}</option>
                                        <option value="Bac+3">{{ __('Bac+3') }}</option>
                                        <option value="Bac+4">{{ __('Bac+4') }}</option>
                                        <option value="Bac+5 et plus">{{ __('Bac+5 et plus') }}</option>
                                    </select>

                                    @error('niveau_etude')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="diplome_prepare"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Diplôme préparé') }}</label>

                                <div class="col-md-6">
                                    <input id="diplome_prepare" type="text"
                                        class="form-control @error('diplome_prepare') is-invalid @enderror"
                                        name="diplome_prepare" value="{{ old('diplome_prepare') }}" required
                                        autocomplete="diplome_prepare">

                                    @error('diplome_prepare')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="motivation"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Motivation') }}</label>

                                <div class="col-md-6">
                                    <textarea id="motivation" type="text" class="form-control @error('motivation') is-invalid @enderror"
                                        name="motivation" value="{{ old('motivation') }}" required></textarea>

                                    @error('motivation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" style="background:teal; padding:5px 14px; color: white; border:1px solid transparent; border-radius:5px; font-size:18px" value=" {{ __('Envoyer') }}">


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
