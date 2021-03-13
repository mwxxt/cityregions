
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person Add</title>
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

        <form action="{{ route('personAddNew') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ csrf_field()}}
            
                <label for="name_person">Name</label>
                <input style="width: 300px" type="text" name="name_person" placeholder="Your name" id="name_person" class="form-control">
            
           
                <label for="area">Region</label>
            <select style="width: 300px" name="id_region" class="productcategory form-select" id="prod_cat_id">
            
            @foreach($prod as $cat)
                <option value="{{$cat->id}}">{{$cat->product_cat_name}}</option>
            @endforeach
                <option value="0" disabled="true" selected="true">choose region</option>
            </select>
			
          
                <label for="region">Area</label>
				
				
            <select style="width: 300px" name="id_area" class="productName form-select" id="prod_cat_idd">
            
            
	        </select>
            <div style="margin-top: 20px;">
            <button style="margin-right: 10px;" type="submit" class="btn btn-success">Add</button>
            <a type="button" href="{{ route('personlist')}}" class="btn btn-primary">Back</a>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
		
		$(document).on('change','.productcategory',function(){

			var cat_id=$(this).val();
			var div=$(this).parent();
			var op=" ";

			$.ajax({
				type:'get',
				url:'{!!URL::to('findProductName')!!}',
				data:{'id':cat_id},
				success:function(data){
					op+='<option value="0" selected disabled>choose area</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].productName+'</option>';
				   }

				   div.find('.productName').html(" ");
				   div.find('.productName').append(op);
				},
				error:function(){

				}
			});
		});
	});
</script>
</body>
</html>