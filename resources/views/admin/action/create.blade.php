@extends('layouts.admin')

@section('admin.create')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">dashboard admin</a></li>
                        <li class="breadcrumb-item active">créer un nouvel étudient</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

        <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('admin.store') }}">
            @csrf
            @include('includes.errors')
            <input hidden type="text" id="role_id" name="role_id" value="1">
            <div>
                <x-jet-label for="prenom" value="{{ __('Prénom de l\'admin') }}" />
                <x-jet-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom" placeholder="Admin" />
            </div>
            <div>
                <x-jet-label for="name" value="{{ __('nom de famille de l\'admin') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Super-Admin" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="admin@super-admin.fr"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <span class="muted text-cool-gray-600">8 caractère minimum contenant 1 majuscule et 1 chiffre</span>
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Password1234"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
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
