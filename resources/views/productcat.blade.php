<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Region</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    @include('include.header')
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap');
    body{
        font-family: 'Poppins',sans-serif;
    }
    #button_down {
        margin: 5px 5px 5px 5px;
    }


    h1#regions {
        margin : 20px 0 20px 0;
    }
    </style>
    <div class="container">
        <h1 id="regions" >Regions</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Region</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($product_cat as $prod)
                <tr>
                    <td scope="row">{{$prod->id}}</td>
                    <td scope="row">{{$prod->product_cat_name}}</td>
                    <td>
                        <a type="button" href="#">
                            <button id="button_down" type="submit" class="btn btn-success">Update</button>
                        </a>
                        <button id="button_down" type="submit" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$product_cat->links()}}
        <a style="margin: 20px 0 60px 0;" type="button" href="#">
            <button type="submit" class="btn btn-success">Add Region</button>
        </a>
    </div>
</body>
</html>