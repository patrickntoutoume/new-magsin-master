@extends('layout.app')

@section('title','update')

@section('content')

<h1> Modifier le produit</h1>



<div class="container">
    <div class="row mt-5">
       <div class="col-md-6 offset-md-3">
           <div class="card bg-light">
               <div class="card-body">
                   <form action="{{route('update_prod', $category->id)}}" method="POST">
                        
                       @csrf
                       @method('put')
                       <div class="form-group mb-3">

                           
                           <label for="name"> Nom  </label>
                           <input type="text" value="{{$category->name}}" name="name" id="name" class="form-control  @error( 'name') is-invalid @enderror">
                           @error('name' )
                           <span class="text-danger">{{$message}}</span>
                           @enderror <br>
                           <label for="name"> prix </label>
                           <input type="text" value="{{$category->prix }}" name="prix" id="prix" class="form-control  @error( 'prix') is-invalid @enderror">
                           @error('prix' )
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                       </div>
                       <div class="form-group" >
                        <button class="btn btn-dark w-100"> sauvegarder </button>
                    </div>
                   </form>
               </div>
           </div>
       </div>
    </div>
 </div>

@endsection