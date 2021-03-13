<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title></title>
</head>
<body>
	@include('include.header')
    <div class="container">
        <h1 style="margin-top: 80px;margin-bottom: 30px;">TMNT</h1>

        <span>Выберите область: </span>
        <select style="width: 200px" class="productcategory form-select" id="prod_cat_id">
            
            <option value="0" disabled="true" selected="true">-Выберите область-</option>
            @foreach($prod as $cat)
                <option value="{{$cat->id}}">{{$cat->product_cat_name}}</option>
            @endforeach

        </select>

        <span>Выберите район : </span>
	<select style="width: 200px" class="productName form-select">

		<option value="0" disabled="true" selected="true">Выберите Район </option>
	</select>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		
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
					//console.log('success');

					//console.log(data);

					//console.log(data.length);
					op+='<option value="0" selected disabled>выберите район</option>';
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