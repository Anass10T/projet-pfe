@extends('layouts.app')
@section('title', 'Modification des informations')

@section('navbar-brand', 'Modifier les informations')

@section('navbar-menu', ' | Dashboard')
@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
           
            <div class="col-md-6">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                  <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card">
                    <div class="card-header px-4">{{ __("Paramètres de l'administrateur") }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('settings.update') }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label px-5" style="font-size: 16px">{{ __('Nom:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('nom', auth()->user()->nom) }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label px-5" style="font-size: 16px">{{ __('Email:') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', auth()->user()->email) }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label px-5" style="font-size: 16px">{{ __('Le nouveau mot de passe:') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label px-5" style="font-size: 16px">{{ __('Confirmer le nouveau mot de passe:') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" style="background:teal; padding:5px 14px; color: white; border:1px solid transparent; border-radius:5px; font-size:18px">
                                        {{ __('Enregister') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
