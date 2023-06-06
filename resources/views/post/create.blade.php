@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 my-5">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5>Créer un article</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" name="title" id="title" class="form-control">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="category">Catégorie</label>
                            <select name="catgory_id" id="category" class="form-select">
                                <option value="">Sélectionner une catégorie</option>
                                @foreach ($categories as $category)
                                
                          <option  value="{{$category->id}}">{{$category->name}}</option>
                                < 
                                @endforeach
                            </select>
                            @error('catgory_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="cover">Photo de couverture</label>
                            <input type="file" name="cover" id="cover" class="form-control">
                            @error('cover')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="content">Contenu</label>
                            <textarea name="description" id="content" rows="6" class="form-control"></textarea>
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-success">Créer un article</button>
                            <a href="{{ route('post.index') }}" class="btn btn-secondary">Retour</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection