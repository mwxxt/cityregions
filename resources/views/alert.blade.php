<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="..\css\styles.css">
</head>
<body>
	<style> @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap');
   body {
    font-family: 'Poppins',sans-serif;
   }
   div.form {
   	display: block;
    margin-left: auto;
    margin-right: auto;
   }
</style>
	@include('include.header')
	<div class="hei">
	@if (session('error'))
        <div style="width: 300px;" class="alert alert-danger" role="alert">{{ session('error') }}</div>
    @endif
    @if (session('success'))
        <div style="width: 300px"; class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif
    <a type="button" href="{{ route('personlist')}}" class="btn btn-primary">Back</a>
  </div>
</body>
</html>