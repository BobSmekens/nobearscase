<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>

    <a href="/jsonDownload">Download table as Json</a>
    <br>
    <a href="/json">View table as Json</a>
    <table>
        @if($bearCollection)
        @foreach($bearCollection as $bear)
            <tr>
                <td>{{$bear->company_name}}</td>
                <td>{{$bear->street}}</td>
                <td>{{$bear->street_number}}</td>
                <td>{{$bear->postal_code}}</td>
                <td>{{$bear->city}}</td>
                <td>{{$bear->country}}</td>
                <td>{{$bear->latitude}}</td>
                <td>{{$bear->longitude}}</td>
                <td>{{$bear->email}}</td>
            </tr>
        @endforeach
        @endif
        </table>
        <script src="" async defer></script>
    </body>
</html>