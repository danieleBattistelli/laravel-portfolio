<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>

    <style>
        .container{
            width: 80%;
            margin: auto;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        th, td{
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>
            @yield("title")
        </h1>

        @yield("content")
    </div>

</body>
</html>
