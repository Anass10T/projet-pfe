@extends('layouts.app')

@section('title', 'Paramètres du compte')

@section('navbar-brand', 'Paramètres du compte')

@section('content')

<h1 style="text-align:center" class="mb-4 mt-3">Modifier les paramètres du compte</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size:15px">{{ __(" Paramètres de l'administrateur") }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                               
                                <th scope="col">{{ __('Email') }}</th>
                            
                                <th scope="col">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($settings as $setting) --}}
                            <tr>
                                <td scope="row" style="line-height: 30px; font-size:18px">{{ old('name', auth()->user()->email) }}</td>
                             
                               
                                <td>
                                    <a  href="{{ route('settings.edit',$user->id) }}" class="btn btn-dark">{{ __('Modifier') }}</a>
                                </td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
