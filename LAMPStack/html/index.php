<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample DB Connection</title>
</head>
<body>
    <?php
       // hostname is the name of the container
       //username, password & database are set in docker compose
       $con = mysqli_connect('db', 'your_username', 'your_password', 'lamp_db');
       if($con){
        echo "<p>Success!</p>";
       }
       else{
        echo "<p>Error</p>";
       }

    ?>
    
</body>
</html>