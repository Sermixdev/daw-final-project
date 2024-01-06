<!--we start the views with <body> but the </body> is in the index-->
<body>
<form class="form" method="post" action="<?=base_url?>User/checkLogin" method="post">
    <h2>Introduzca el nombre de usuario y contraseña:</h2>
    <fieldset class="form-fieldset">
        <div>
            <label for="userName">Usuario:</label>
            <input type="text" id="userName" name="userName" required/>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required/>
            <input
                    class="button"
                    type="submit"
                    name="loginSubmit"
                    value="Login"
            />
        </div>
        <p>¿No tienes una cuenta?</p> 
        <a class="button" href="<?=base_url?>user/register">Regístrate</a>
    </fieldset>
</form>


