<html>
    <form action="http://127.0.0.1:8000/api/v1/admin/add-job" method="post"
    style="margin: 5px;" >
        <input type="text" name="name" style="display: block; margin: 5px;">

        <select name="department_id" style="display: block; ">
            @foreach ($departaments as $departament)
                <option value="{{ $departament->id }}">{{$departament->departament}}</option>

            @endforeach
        </select>
        <a href=""><button type="button">Criar novo departamento</button></a>

        <select name="department_categories_id" style="display: block; margin: 5px;">
            @foreach ($departament_categories as $departament_categorie)
                <option value="{{ $departament_categorie->id }}">{{$departament_categorie->departament_categorie }}</option>

            @endforeach
        </select>
        <a href=""><button type="button">Criar nova categoria</button></a>

        <select name="status_id" style="display: block; margin: 5px;">
            @foreach ($statuss as $status)
                <option value="{{ $status->id }}">{{$status->status }}</option>

            @endforeach

        </select>
        <a href=""><button type="button">Criar novo status</button></a>

        <button type="submit">Criar vaga</button>
    </form>

</html>