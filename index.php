<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="./img/favicon.ico" />
    <title>Joke Emporium</title>
    <link rel="stylesheet" type="text/css" href="makeItRain.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="makeItRain.js" > </script>

    <script>
        //$("#rain").makeItRain();

        $(document).ready(function(){
            //$("#rain").click(function(){makeItRain()});
            $("#rain").makeItRain();
        });
    </script>
</head>
<body>
<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" href="#">Active</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
    </li>
</ul>
<form>
    <div class="form-group">
        <label for="emailInput">Email address</label>
        <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll share your email with everyone. Praise spam!</small>
    </div>
    <div class="form-group">
        <label for="passwordInput">Password</label>
        <input type="password" class="form-control" id="passwordInput" placeholder="Password">
        <small id="passwordHelp" class="form-text text-muted">Totally not secure.</small>
    </div>

    <button id="rain" type="button" class="btn btn-primary">Cash me outside</button>
    <br><br>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>
