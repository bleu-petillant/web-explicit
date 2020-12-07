@extends('layouts.admin')

@section('teacher.student.create')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">acceuil du site</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">dashboard admin</a></li>
                        <li class="breadcrumb-item active">créer un nouveau admin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-6 card">
                <form class="text-center" action="{{route('user.store')}}" method="POST">
                    @csrf
                    <p>
                        <a href="{{ route('user.index') }}" class="btn btn-info btn-md">revenir à la liste des admins</a></li>
                    </p>
                    @include('includes.errors')
                    <label for="name">entrez votre pseudo ou votre prenom, celui-ci sera votre signature d'articles.</label>
                    <input type="text" id="name" name="name" class="form-control my-4" autofocus placeholder="votre nom ou pseudo" required>
                    <label for="email" class="label">entrez votre email</label>
                    <input type="email" name="email" id="email" class="form-control my-4" required placeholder="votre email">
                    <label for="password">entrez votre mot de passe, 8 character minimum</label>
                    <input type="password" name="password" id="password" class="form-control my-2" required minlength="8">
                    <button class="btn btn-outline-pink raleway my-4" type="submit"><span class="fas fa-plus pr-2"></span>créez votre compte admin</button>
                </form>
            </div>
        </div>
    </div>

@endsection
