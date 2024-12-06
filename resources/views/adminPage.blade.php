<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>dash board admin</h1>
    @foreach($jobs as $job)
        <p>- {{ $job->name }}</p>
        
    @endforeach
    <button><a href="/api/newJobVacany">Nova Vaga de Trabalho</a></button>
</body>
</html>