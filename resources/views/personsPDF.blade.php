<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<style>
  body{
    font-family: DejaVu Sans;
  }
</style>
<table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Имя</th>
                <th scope="col">Область</th>
                <th scope="col">Район</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($person as $per)
            <tr>
                <th scope="row">{{$per->id_person}}</th>
                <td scope="row">{{$per->name_person}}</td>
                <td>{{$per->product_cat_name}}</td>
                <td>{{$per->productName}}</td>
                <td>
            </tr>
        @endforeach
        </tbody>
   </table>
</body>
</html>