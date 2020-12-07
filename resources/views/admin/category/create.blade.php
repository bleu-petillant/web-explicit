@extends('layouts.admin')

@section('admin.category.create')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">acceuil du site</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">categories</a></li>
                        <li class="breadcrumb-item active">créer une nouvelle categorie</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-6 card">
                <form class="text-center" action="{{route('category.store')}}" method="POST">
                    @csrf
                    <p class="h4 mb-4">créer une nouvelle categorie</p>
                    <p>
                        <a href="{{ route('category.index') }}" class="btn btn-info btn-md">revenir à la liste des catégories</a></li>
                    </p>
                    @include('includes.errors')
                    <input type="text" id="name" name="name" class="form-control mb-4" placeholder="nom de la catégorie" autofocus>
                    <label for="description">ajouter une description</label>
                    <textarea type="text" id="description" name="description" class="form-control mb-4" placeholder="description"></textarea>
                    <button class="btn btn-info" type="submit"><span class="fas fa-plus pr-2"></span> ajouter la catégorie</button>
                </form>
            </div>
        </div>
    </div>

@endsection
