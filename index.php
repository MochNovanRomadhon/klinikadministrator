<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <h1> Login</h1>
        <br>
    <?php
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Method:POST');
    include './database.php';
    include './vendor/autoload.php';

    use \Firebase\JWT\JWT;

    if (isset($_POST["submit"])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, ($_POST['password']));
 
        $select= mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") or die('query failed');
 
    if(mysqli_num_rows($select) > 0){
 
        $row = mysqli_fetch_assoc($select);
         
         if($row['password'] != ''){
            $payload = [
                'iss' => "localhost",
                'aud' => 'localhost',
                'exp' => time() + 1000,
                'data' => [
                    'email' => $email,
                    'password' => $password,
                ],
            ];
            $SECRET_KEY = "g1523AzABUYzhihdwuiiufujw901NHIU";
            $jwt = \Firebase\JWT\JWT::encode($payload, $SECRET_KEY, 'HS256');
            setcookie("COOKIES_LOGIN", $jwt);
            echo json_encode([
                'status' => 1,
                'jwt' => $jwt,
                'message' => 'Login Successfully',
            ]);
            header('Location: home.php');
        }else{
            echo json_encode([
                'status' => 0,
                'message' => 'Invalid Carditional',
            ]);
        }
    }else{
        echo json_encode([
            'status' => 0,
            'message' => 'Access Denied',
        ]);
    }

}
    ?>
      <form action="" method="post">
        <div class="form-group">
            <input type="email" placeholder="Email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Password" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="submit" class="btn btn-primary"></input>
        </div>
      </form>
      <br>
     <div><p>Belum punya akun? <a href="registration.php">Register</a></p></div>
    </div>
</body>
</html>