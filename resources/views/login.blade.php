<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>

    <form action="http://127.0.0.1:8000/api/auth/login" method="post">
        <input type="text" name="email" placeholder="Login">

        <input type="text" name="password" placeholder="Password">

        <button type="submit">Entrar</button>

    </form>    
</body>
</html>