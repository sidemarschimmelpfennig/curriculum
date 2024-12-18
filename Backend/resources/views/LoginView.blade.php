<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Login<h1>
    <form action="{{ route('admin.auth') }}" method="post">
        @csrf

        <div class="group" style="margin: 10px 0;">
            <label for="E-mail"></label>
            <input type="email" name="email" id="email" placeholder="Inserir e-mail...">
        </div>

        <div class="group" style="margin: 10px 0;">
            <label for="Password"></label>
            <input type="password name="password" id="password" placeholder="Inserir senha...">
        </div>

        <button type="submit">Entrar</button>
        
    </form>

</body>
</html>