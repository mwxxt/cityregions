<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person</title>
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

    h1#people {
        margin : 20px 0 20px 0;
    }
    </style>
    <div class="container">
        <h1 id="people" >Peoples</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Region</th>
                    <th scope="col">Area</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($person as $per)
                <tr>
                    <th scope="row">{{$per->id_person}}</th>
                    <td scope="row">{{$per->name_person}}</td>
                    <td scope="row">{{$per->product_cat_name}}</td>
                    <td scope="row">{{$per->productName}}</td>
                    <td>
                        <a type="button" href="{{route('person-update', $per->id_person)}}">
                            <button id="button_down" type="submit" class="btn btn-success">Update</button>
                        </a>
                        <a type="button" href="{{route('personDelete', $per->id_person)}}">
                        <button id="button_down" type="submit" class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a type="button" href="{{route('personadd')}}">
            <button type="submit" class="btn btn-success">Add Human</button>
        </a>
        <a id="button_down" type="button" class="btn btn-primary" href="\download-pdf">Download PDF</a>
        <a id="button_down" type="button" class="btn btn-primary" href="\download-excel">Download Excel</a>
        <a id="button_down" type="button" class="btn btn-primary" href="\download-csv">Download CSV</a>
    </div>
</body>

</html>