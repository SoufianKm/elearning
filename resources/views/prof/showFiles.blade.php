<form enctype="multypart/form-data">
	@csrf


	@foreach($files as $file)
<object data="/storage/1/1/1/1/{{$file->libelle}}" style="width:100% " height="700px"></object>

@endforeach

</form>


