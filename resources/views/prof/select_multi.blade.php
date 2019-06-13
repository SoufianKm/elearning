@extends('layouts.app')
@section('content')


<meta id="token" name="token" content="{{csrf_token()}}">
<div class="container mt-5">
    <form action="/add_cour" method="POST"  enctype="multipart/form-data">
        @csrf
        <select class="form-control dynamic" name="filiere" id='filiere'>
            <option selected>Filiere</option>    
             @foreach($filiere as $key => $fil)

                  <option value="{{$key}}"> {{$fil}}</option>
                
                  @endforeach
        </select> 
        <select class="form-control mt-5" name="semestre" id="semestre">
            <option selected>Semestre</option>    
            @foreach($somester as $key => $som)

                  <option value="{{$key}}"> {{$som}}</option>
                
                  @endforeach
            
        </select> 

           <select class="form-control mt-5" name="module" id="module">
            <option selected>Module</option>    
            @foreach($module as $key => $moduls)

                  <option value="{{$key}}"> {{$moduls}}</option>
                
                  @endforeach
            
        </select> 

        <textarea rows="4" cols="20" name="description" class="form-control"></textarea>

       <!--  <input type="file" class="form-control mt-5" name="image"> -->
        <input type="file" class="form-control mt-5" name="cours">
        <button type="submit" class="mt-5">Ajouter cours</button>
    </form>
</div>
@endsection