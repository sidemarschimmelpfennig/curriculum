<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="http://127.0.0.1:8000/api/v1/send-curriculum" method="post" enctype="multipart/form-data">
        
        <label for="curriculum">Arquivo</label>
        <input type="file" name="file" id="file">

        <label for="curriculum">Texto</label>
        <input type="text" name="test">
        <button type="submit">Enviar</button>

    </form>


</body>
</html> <?php /**PATH D:\SGBR\ProjetoCurriculum\api\resources\views/file.blade.php ENDPATH**/ ?>