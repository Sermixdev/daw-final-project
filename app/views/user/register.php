<!--we start the views with <body> but the </body> is in the index-->
<body>
<form class="form" method="post" action="<?=base_url?>User/newUser" method="post">
    <h2>¡Bienvenidx a la familia Gecomme!</h2>
    <h3>Introduce tus datos para crear una nueva cuenta</h3>
    <fieldset class="form-fieldset">

            <label for="nameSurname">Nombre y Apellidos:</label>
            <input type="text" id="nameSurname" name="nameSurname" required/>
            <label for="userName">Usuario:</label>
            <input type="text" id="userName" name="userName" required/>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required/>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required/>
            <label for="address">Dirección de envío completa:</label>
            <input type="text" id="address" name="address" required/>
            <input
                    class="button"
                    type="submit"
                    name="registerSubmit"
                    value="Registrarse"
            />
    </fieldset>
</form>
