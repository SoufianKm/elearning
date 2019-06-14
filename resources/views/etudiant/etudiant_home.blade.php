<style type="text/css">
	.image width:200px;

</style>

<meta id="token" name="token" content="{{csrf_token()}}">
<div class="container mt-5">
        @csrf
        <select class="form-control dynamic" name="semestre" id='semestre'data-dependent="semestre">
            <option selected>Semestre</option>    
             @foreach($semestre as $semmestre)

                  <option value="{{$semmestre->id}}"> {{$semmestre->libelle}}</option>
                
                  @endforeach
        </select> 
        <select class="form-control mt-5" name="module" id="module" >
           <option selected>Semestre</option>  
         </select>

<div class="container" >
	<div class="row" id="listCours">

		

	</div>

	
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


<script>

$(document).ready(function(){

 $('#semestre').change(function(){ 
  if($(this).val() != '')
  {
   var select = $(this).val();
   //var value = $(this).val();
   //var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('etudiant_controller.getModule') }}",
    method:"POST",
    data:{semestre_id:select, _token:_token},
    success:function(result)
    {
    	console.log(result);
        $("#module").html("<option selected>Semestre</option>");
       $.each(result,function(index,value){
            $("#module").append("<option value='"+value.id+"'>"+value.libelle+"</option>")
       })
    }

   })
  }
  });

 		$('#module').change(function(){
 			var select = $(this).val();
 			var _token = $('input[name="_token"]').val();
 			$("#listCours").show();
 			$.ajax({
 				url:"{{ route('etudiant_controller.getCours') }}",
 				method:"POST",
 				data:{module_id:select, _token:_token},
 				success:function(result){
 					console.log(result);
 					$.each(result,function(index,value){
 						//$("#listCours").empty();
 						$("#listCours").append("<img src="+"/storage/2/1/1/1/"+value.image+">");

 						//$("#listCours").append("<object data="+"/storage/2/1/1/1/"+value.libelle+"></object>");
 						$("#listCours").append("<a href="+"/storage/2/1/1/1/"+value.libelle+">link</a>");

 							//$("#listCours").append("<h2>"+value.libelle+"</h2>");


 							
 					})


 				}
 			});


 		});


 });
</script>