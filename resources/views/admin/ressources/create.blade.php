@extends('layouts.admin')

@section('admin.resources.create')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">dashboard</a></li>
                        <li class="breadcrumb-item active">créer une nouvelle ressource</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-6 card">
                <form class="text-center" action="{{route('resources.store')}}" method="POST">
                    @csrf
                    <p>
                        <a href="{{ route('resources.index') }}" class="btn btn-info btn-md">revenir à la liste des admins</a></li>
                    </p>
                    @include('includes.errors')

                    <button class="btn btn-outline-pink raleway my-4" type="submit"><span class="fas fa-plus pr-2"></span>créez votre compte admin</button>
                </form>
            </div>
        </div>
    </div>

@endsection
