@extends('layouts.admin')

@section('admin.tag')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">acceuil du site</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tag.index') }}">liste des tags</a></li>
                        <li class="breadcrumb-item active">modifier le tag</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-6">

                <p class="h4 mb-4">modifier le tag - <span class="text-danger font-perso font-italic">{{ $tag->name }}</span></p>
                    <p>
                        <a href="{{ route('tag.index') }}" class="btn btn-info btn-md">annuler et revenir à la liste des tags</a></li>
                    </p>
                    @include('includes.errors')
                    <form class="text-center" action="{{ route('tag.update',$tag->id) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <label for="name">modifier le tag</label>
                        <input type="text" id="name" name="name" value="{{ $tag->name }}" class="form-control mb-4" placeholder="nom de la catégorie">
                        <button class="btn btn-success btn-block" type="submit"><span class="fas fa-pen pr-2"></span>confirmer le nouveau tag</button>
                    </form>
            </div>
        </div>
    </div>

@endsection
