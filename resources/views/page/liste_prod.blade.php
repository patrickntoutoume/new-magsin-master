@extends('layout.app')

@section('title','liste')

@section('content')

<h1> liste </h1>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-8 mx-auto">
            <div class="card rounded-0 shadow">
                <div class="card-header">
                    <h5>Liste des categories</h5>

                </div>
                <div class="card-body">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOM</th>
                                <th>PRIX</th>
                                <th>DATE DE CREATION </th>
                                <th>MISE A JOUR</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->prix }} dhs</td>
                            <td>{{$category->created_at->diffForHumans()}}</td>
                            <td>{{$category->updated_at->diffForHumans()}}</td>
                            <td><a class="btn btn-success btn-sm"  href="{{route ('update',$category->id)}}">modifier</a>
                            <a class="btn btn-danger btn-sm" href="{{route('supprimer',$category->id)}}">supprimer</a>
                            </td>
                        </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection