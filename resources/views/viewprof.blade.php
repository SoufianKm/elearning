@extends('layouts.app')
  
  <style type="text/css">
    img{
      width: 60px;
      height: 60px;
    }
  </style>

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher Un Professeur <i class="fa fa-search"></i></button><span class="float-right">
                
                <a href="{{route('addprof')}}" class="btn btn-info">Ajouter Un Professeur</a>
                </span>
      
      
    </div>

                <div class="card-body">
                <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Cin</th>
      <th scope="col">Adresse</th>
      <th scope="col">Tel</th>
      <th scope="col">Photo</th>
      <th scope="col">Id User</th>
      <th scope="col">Les Opérations</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($professeurs as $professeur)
  <tr>
  	<td>{{ $professeur->id }}</td>
  	<td>{{ $professeur->nom }}</td>
  	<td>{{ $professeur->prenom }}</td>
  	<td>{{ $professeur->cin }}</td>
  	<td>{{ $professeur->adresse }}</td>
  	<td>{{ $professeur->tel }}</td>
  	<td><?php echo '<img src="uploads/' . $professeur->photo .'"class="photoperso"/>'?></td>
    <td>{{ $professeur->id_user }}</td>
  	<td><h6><a href = 'delete/{{ $professeur->id_user }}'>SUPPRIMER</a><button class="btn btn-primary">EDIT</button><button class="btn btn-warning">PDF</button></h6></td>
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
