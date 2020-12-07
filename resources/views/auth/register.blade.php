<x-admin-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <x-jet-label for="prenom" value="{{ __('Prénom') }}" />
                <x-jet-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom" placeholder="votre prénom...." />
            </div>
            <div>
                <x-jet-label for="name" value="{{ __('nom') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="votre nom...." />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <p for="role-select" class="font-semibold text-gray-700">enregistrer en tant que :</p>
                <div class="flex justify-between items-center">
                    <label for="admin">Admin
                        <input type="radio" value="1" id="admin" name="role_id">
                        <span class="checkmark"></span>
                    </label>

                    <label for="teacher">Professeur
                    <input type="radio" value="2" id="teacher" name="role_id">
                    <span class="checkmark"></span>
                </label>
                <label for="student">étudient
                    <input type="radio" value="3" id="student" name="role_id">
                    <span class="checkmark"></span>
                </label>
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
</x-admin-layout>
