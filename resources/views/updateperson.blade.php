
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
@include('include.header')
<div class="container">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap');
    body{
        font-family: 'Poppins',sans-serif;
    }
label {
	margin-top: 10px;
	margin-bottom: 6px;
}

</style>

        <form action="{{ route('person-update-submit', $data->id_person ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ csrf_field()}}
            
                <label for="name_person">Name</label>
                @foreach($person as $pe)
                <input style="width: 300px" type="text" name="name_person" value="{{$pe->name_person}}" placeholder="Ваше имя" id="name_person" class="form-control">
                @endforeach
            
           
                <label for="area">Region</label>
            <select style="width: 300px" name="area" class="productcategory form-select" id="prod_cat_id">
            
            @foreach($person as $pe)
                <option selected disabled id="opti" value="{{$pe->id_area}}" selected="true">Initially {{$pe->product_cat_name}}</option>
            @endforeach
            @foreach($prod as $cat)
                <option value="{{$cat->id}}">{{$cat->product_cat_name}}</option>
            @endforeach

            </select>
			
          
                <label for="region">Area</label>
				
				
            <select style="width: 300px" name="region" class="productName form-select" id="prod_cat_idd">
            
            
	        </select>
            <div style="margin-top: 20px;">
            <button style="margin-right: 10px;" type="submit" class="btn btn-success">Update</button>
            <a type="button" href="{{ route('personlist')}}" class="btn btn-primary">Back</a>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){

		var productReady =$('#prod_cat_id');
		
		productReady.ready(function(){
			var cat_id=$('.productcategory').val();
			console.log(cat_id);
			var div=$('.productcategory').parent();
			//var div=$(this);
			console.log(div);
			var op=" ";
			$.ajax({
				type:'get',
				url:'{!!URL::to('findProductName')!!}',
				data:{'id':cat_id},
				success:function(data){
				console.log('success');

				console.log(data);

				console.log(data.length);
				 op+='<option value="0" selected disabled>@foreach($person as $cat)Initially {{$cat->productName}}@endforeach</option>';
				for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].productName+'</option>';
		   		}

		   div.find('.productName').html(" ");
		   div.find('.productName').append(op);
		},
		error:function(){
			console.log('pizdes');
		}
	});
		});

$(document).on('change','.productcategory',function(){
	// console.log("hmm its change");

	var cat_id=$(this).val();
	// console.log(cat_id);
	var div=$(this).parent();

	var op=" ";

	$.ajax({
		type:'get',
		url:'{!!URL::to('findProductName')!!}',
		data:{'id':cat_id},
		success:function(data){
			console.log('success');

			console.log(data);

			console.log(data.length);
			op+='<option value="0" selected disabled>choose area</option>';
			for(var i=0;i<data.length;i++){
			op+='<option value="'+data[i].id+'">'+data[i].productName+'</option>';
		   }

		   div.find('.productName').html(" ");
		   div.find('.productName').append(op);
		},
		error:function(){
			console.log('pizdes');
		}
	});
});


});
</script>
</body>
</html>