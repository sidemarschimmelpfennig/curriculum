<html>
    <form action="http://127.0.0.1:8000/api/v1/add-job" method="post">
        <input type="text" name="name">
        <select name="department">
            <option value="desktop">Desktop</option>
            <option value="web">Web</option>
            <option value="suporte">Suporte</option>

        </select>

        <select name="department_categories">
            <option value="frontend">Frontend</option>
            <option value="backend">Backend</option>
            <option value="suporte">Suporte</option>

        </select>

        <select name="status">
            <option value="aberta">Aberta</option>
            <option value="analise">Analise</option>
            <option value="fechada">Fechada</option>

        </select>

        <button type="submit">Criar vaga</button>
    </form>

</html>