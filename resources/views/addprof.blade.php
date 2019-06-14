@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="row">
    <div class="col-lg-12">
    <h4>Merci de remplire le formulaire ci-dessous pour Ajouter Professeur</h4>
      <div class="jumbotron">
<form action="{{ route('create')}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="Name">Nom :</label>
    <input type="text" class="form-control" name="nom" placeholder="le nom" value='<?php echo Auth::user()->name;?>' readonly>
  </div>
  <div class="form-group">
    <label for="Prenom">Prénom :</label>
    <input type="text" name="prenom" class="form-control" placeholder="le prénom" required="">
  </div>
  <div class="form-group">
    <label for="cin">cin :</label>
    <input type="text" class="form-control" name="cin" placeholder="cin" required="">
  </div>
  <div class="form-group">
    <label for="adresse">adresse :</label>
    <input type="text" class="form-control" name="adresse" placeholder="l'adresse" required="">
  </div>
  <div class="form-group">
    <label for="tel">Téléphone:</label>
    <input type="text" class="form-control" name="tel" placeholder="tel" required="">
  </div>
 <!--  -->
 <div class="form-group">
    <label for="tel">photo:</label>
    <input type="file" class="form-control" name="file" >
  </div>
<div class="form-group">

    <label for="userid">user id:</label>
    <input type="text" class="form-control" name="id_user" value='<?php echo Auth::user()->id;?>' readonly>
  </div>
  <input type="submit" name="create" class="btn btn-primary" value="Ajouter">
  <input type="reset" class="btn btn-warning" value="Effacer">
   <a href="index.php" class="float-right btn btn-success" >Retourner a la page d'acceuil</a>
</form>  
</div>
</div>
</div>
</div>

@endsection