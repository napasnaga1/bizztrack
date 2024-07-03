<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,700,900');
    </style>
</head>
<body>
    <div class="main">
        <div class="teks">
            <span><i>Login Page</i></span>
            <span><i>Karyawan</i></span>
            <a><i>Start your business</i></a>
            <a><i>now with us</i></a>
        </div>
        <div class="login">
            <form action="login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
               
                <input  type="submit" value="Login">
               
                
            </form>
            
        </div>
</body>
</html>