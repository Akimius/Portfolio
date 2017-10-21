<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thanks</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<div class="wrapper" >
    <div class="container" >

        <div class="row">
            <div class="page-header">
                <h1>Email successfully sent</h1>
            </div>
        </div>

        <div class="alert alert-success">
            <h1>Hello, {{$user->name}}!</h1>
            <h3>We sent an email to your address: <strong>{{$user->email}}</strong> </h3>
        </div>

        <br>
        <div class="row">
            <a href="/"><button type="button" class="btn btn-success btn-block">Back to Portfolio</button></a>
        </div>

    </div>

</div>

</body>
</html>
