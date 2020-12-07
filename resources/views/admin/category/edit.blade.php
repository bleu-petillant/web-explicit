@extends('layouts.admin')

@section('admin.category.edit')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">liste des catégorie</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-6">

                <p class="h4 mb-4">modifier la categorie - <span class="text-danger font-perso font-italic">{{ $category->name }}</span></p>

                    @include('includes.errors')
                    <form class="text-center" action="{{ route('category.update',$category->id) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <input type="text" id="name" name="name" value="{{ $category->name }}" class="form-control mb-4" placeholder="nom de la catégorie">
                        <label for="description">modifier la description</label>
                        <textarea type="text" id="desc" name="desc" class="form-control mb-4" placeholder="{{ $category->desc }}"></textarea>
                        <button class="btn btn-success btn-block" type="submit"><span class="fas fa-pen pr-2"></span>confirmer la nouvelle catégorie</button>
                    </form>
            </div>
        </div>
    </div>

@endsection
