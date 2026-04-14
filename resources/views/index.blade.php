<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
</head>

<body>
    <h1>This is my main page of application</h1>

    @if (count($tasks))
        <div>
            <h2>There are some Tasks to do:</h2>
        </div>
    @else
        <div>
           <h2> There are no Tasks to do!</h2>
    @endif

</body>

</html>
