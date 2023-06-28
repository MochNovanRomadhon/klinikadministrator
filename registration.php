<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <?php
        require('./api/consumeapi_registration.php');
        if (isset($_POST["submit"])) {
            createConsume();

        }
        ?>
        <h1> Register</h1>
        <br>

        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="full_name" placeholder="Nama panjang">
            </div>
            <div class="form-group">
                <input type="emamil" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
            <br>
        <div><p>Sudah punya akun? <a href="index.php">Login</a></p></div>
      </div>
    </div>
</body>
</html>