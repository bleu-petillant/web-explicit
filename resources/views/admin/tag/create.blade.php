@extends('layouts.admin')

@section('admin.tag')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">acceuil du site</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tag.index') }}">liste des tags</a></li>
                        <li class="breadcrumb-item active">créer un nouveau tag</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-6 card">
                <form class="text-center" action="{{route('tag.store')}}" method="POST">
                    @csrf
                    <p class="h4 mb-4">créer un nouveau tag</p>
                    <p>
                        <a href="{{ route('tag.index') }}" class="btn btn-success btn-md">revenir à la liste des tags</a></li>
                    </p>
                    @include('includes.errors')
                    <input type="text" id="name" name="name" class="form-control mb-4" placeholder="tag" autofocus>
                    <button class="btn btn-info" type="submit"><span class="fas fa-plus pr-2"></span> ajouter le tag</button>
                </form>
            </div>
        </div>
    </div>

@endsection
