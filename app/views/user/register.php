<!--we start the views with <body> but the </body> is in the index-->
<body>
<form method="post" action="<?=base_url?>User/newUser" method="post">
    <h2>¡Bienvenidx a la familia Gecomme!</h2>
    <fieldset id="loginBox">

        <legend>
            <h3>Introduce tus datos para crear una nueva cuenta:</h3>
        </legend>
        <div>
            <label for="nameSurname">Nombre y Apellidos:</label>
            <input type="text" id="nameSurname" name="nameSurname" /><br /><br />
            <label for="userName">Usuario:</label>
            <input type="text" id="userName" name="userName" /><br /><br />
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" /><br /><br />
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" /><br /><br />
            <label for="address">Dirección de envío completa:</label>
            <input type="text" id="address" name="address" /><br /><br />
            <input
                    class="button"
                    type="submit"
                    name="registerSubmit"
                    value="Registrarse"
            />
        </div>
    </fieldset>
    <br />
</form>
