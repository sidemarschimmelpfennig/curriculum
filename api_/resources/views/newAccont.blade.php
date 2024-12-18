<div>
    <form action="http://127.0.0.1:8000/api/register/create" method="post">
        @csrf
        <input type="text" name="full_name" placeholder="Nome completo">

        <input type="email" name="email" placeholder="E-mail">

        <input type="password" name="password" placeholder="Senha">

        <input type="text" name="phone" placeholder="Telefone">

        <input type="text" name="additional_info" placeholder="Informações adicioanis">

        <input type="text" name="skills" placeholder="Habilidades">

        <button type="submit">Register</button>
    
    </form>
</div>