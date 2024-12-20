<!-- resources/views/form.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
        <h1>Configurações de E-mail</h1>

        <!-- Formulário de configuração de e-mail -->
        <form action="{{ route('email.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="smtp_username">Username:</label>
                <input type="text" class="form-control" id="smtp_username" name="smtp_username" value="{{ old('smtp_username', $settings->smtp_username ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="smtp_host">SMTP Host:</label>
                <input type="text" class="form-control" id="smtp_host" name="smtp_host" value="{{ old('smtp_host', $settings->smtp_host ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="smtp_port">SMTP Port:</label>
                <input type="text" class="form-control" id="smtp_port" name="smtp_port" value="{{ old('smtp_port', $settings->smtp_port ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $settings->email ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ old('password', $settings->password ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="smtp_encryption">SMTP Encryption:</label>
                <input type="text" class="form-control" id="smtp_encryption" name="smtp_encryption" value="{{ old('smtp_encryption', $settings->smtp_encryption ?? '') }}">
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
    </div>
</body>
</html>
   