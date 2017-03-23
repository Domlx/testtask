<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Users</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <table class="table table-striped">
            <caption>Users</caption>
            <input type="text" id="search" class="form-control" placeholder="Search" style="display: inline-block; width: 200px; margin: 15px 0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Comments</th>
                </tr>
            </thead>
            <tbody id="list">
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }} {{ $user->surname }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->lastComment['text'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
<script>
    var search = document.getElementById('search');
    search.onkeyup = function () {
        var query = search.value;
        if(query.length > 3){
            var req = new XMLHttpRequest();
            req.onreadystatechange = function () {
                if(req.readyState == 4 && req.status == 200){
                    if(req.responseText != 0) {
                        console.log(req.responseText);
                        document.getElementById('list').innerHTML = req.responseText;
                    }
                }
            }
            req.open('GET', "{{ App::make('url')->to('/').'/search/' }}"+query,true);
            req.send();
        }
    }
</script>