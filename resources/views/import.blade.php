<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
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
    @if(Route::has('succes'))
        {{'succes'}}
    @endif
    <form action="{{ url('/import')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">file</label>
        <input type="file" name="file">
        <button type="submit">submit</button>
    </form>
    <script src="" async defer></script>
</body>

</html>