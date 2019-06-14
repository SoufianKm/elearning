@extends('layouts.app')
@section('content')


<meta id="token" name="token" content="{{csrf_token()}}">
<div class="container mt-5">
    <form action="/add_cour" method="POST"  enctype="multipart/form-data">
        @csrf
        <select class="form-control dynamic" name="filiere" id='filiere'data-dependent="semestre">
            <option selected>Filiere</option>    
             @foreach($filiere as $key => $fil)

                  <option value="{{$key}}"> {{$fil}}</option>
                
                  @endforeach
        </select> 
        <select class="form-control mt-5" name="semestre" id="semestre">
            <option selected>Semestre</option>    
           
            
        </select> 

           <select class="form-control mt-5" name="module" id="module">
            <option selected>Module</option>    
          
            <a href=""></a>
        </select> 

        {{ csrf_field() }}

        <textarea rows="4" cols="20" name="description" class="form-control"></textarea>
        <label>select image</label>
        <input type="file" class="form-control mt-5" name="image">
        <label>select PDF file</label>
        <input type="file" class="form-control mt-5" name="cours">
        <button type="submit" class="mt-5">Ajouter cours</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


<script>

$(document).ready(function(){

 $('#filiere').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).val();
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('select_multi.fetch') }}",
    method:"POST",
    data:{filiere_id:select, _token:_token},
    success:function(result)
    {
        $("#semestre").html("<option selected>Semestre</option>");
       $.each(result,function(index,value){
            $("#semestre").append("<option value='"+value.id+"'>"+value.libelle+"</option>")
       })
    }

   })
  }
 });

 $('#semestre').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).val();
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('select_multi.getSemestre') }}",
    method:"POST",
    data:{semestre_id:select, _token:_token},
    success:function(result)
    {
        $("#module").html("<option selected>Module</option>");
       $.each(result,function(index,value){
            $("#module").append("<option value='"+value.id+"'>"+value.libelle+"</option>")
       })
    }

   })
  }
 });
 

});
</script>

@endsection