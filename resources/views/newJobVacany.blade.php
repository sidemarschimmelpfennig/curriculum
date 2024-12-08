<html>
    <form action="http://127.0.0.1:8000/api/v1/admin/add-job" method="post">
        <input type="text" name="name">

        <select name="department_id">
            @foreach ($departaments as $departament)
                <option value="{{ $departament->id }}">{{$departament->departament}}</option>

            @endforeach
        </select>
     
        <select name="department_categories_id">
            @foreach ($departament_categories as $departament_categorie)
                <option value="{{ $departament_categorie->id }}">{{$departament_categorie->departament_categorie }}</option>

            @endforeach
        </select>

        <select name="status_id">
            @foreach ($statuss as $status)
                <option value="{{ $status->id }}">{{$status->status }}</option>

            @endforeach

        </select>

        <button type="submit">Criar vaga</button>
    </form>

</html>