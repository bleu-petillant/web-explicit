@extends('layouts.admin')

@section('admin.student.create')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">créer un nouveau profil étudiant</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

        <x-jet-authentication-card>
        <x-slot name="logo">
        <a href="{{route('home')}}">
                <img class="block lg:hidden w-1/2 mx-auto logo-course-explicit" src="{{ asset('img/logo/logo_couleur.svg') }}" alt="Workflow" >
                <img class="hidden lg:block w-1/2 mx-auto logo-course-explicit" src="{{ asset('img/logo/logo_couleur.svg') }}" alt="Workflow" >
            </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('student.store') }}">
            @csrf
            @include('includes.errors')
            <input hidden type="text" id="role_id" name="role_id" value="3">
            <div>
                <x-jet-label for="prenom" value="Prénom de l'étudiant" />
                <x-jet-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom" placeholder="Jean" />
            </div>
            <div>
                <x-jet-label for="name" value="Nom de l'étudiant" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Dupond" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="jean@dupond.fr"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <span class="muted text-cool-gray-600">8 caractères minimum contenant 1 majuscule et 1 chiffre</span>
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Password1234"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmer votre mot de passe') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @error('role_id')
                <span class="text-red-400 text-sm block">{{ $message }}</span>
            @enderror
            <div class="flex items-center justify-end mt-4">

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
    </div>
@endsection
