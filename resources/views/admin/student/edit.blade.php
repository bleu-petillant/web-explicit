@extends('layouts.admin')

@section('admin.student.edit')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Liste des étudiants</a></li>
                        <li class="breadcrumb-item active">modifier {{$user->name}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <x-jet-authentication-card>
        <x-slot name="logo">
        <a href="{{route('home')}}">
                <img class="block lg:hidden w-1/6 mx-auto logo-course-explicit" src="{{ asset('img/logo/logo_couleur.svg') }}" alt="Workflow" >
                <img class="hidden lg:block w-1/6 mx-auto logo-course-explicit" src="{{ asset('img/logo/logo_couleur.svg') }}" alt="Workflow" >
            </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
<form action="{{route('student.update',$user->id)}}" name="form" id="form" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Prénom -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="prenom" value="{{ __('Modifier son prénom') }}" />
        <x-jet-input id="prenom" type="text"  class="mt-1 block w-full" name="prenom" wire:model.defer="state.prenom" autocomplete="prenom" value="{{$user->prenom}}" />
            <x-jet-input-error for="prenom" class="mt-2" />
        </div>
                <!-- Nom -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Modifier son nom de famille') }}" />
            <x-jet-input id="name" type="text" name="name" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" value="{{$user->name}}"/>
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Modifier son adresse email') }}" />
            <x-jet-input id="email" type="email" name="email" class="mt-1 block w-full" wire:model.defer="state.email" value="{{$user->email}}" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

    <div class="flex items-center justify-end mt-4">
        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </div>
    </form>
     </x-jet-authentication-card>


@endsection
