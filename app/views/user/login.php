<!--we start the views with <body> but the </body> is in the index-->
<body>
<form method="post" action="$_SERVER['PHP_SELF']" method="post">
    <fieldset id="loginBox">
        <legend>
            <h2>Introduzca el nombre de usuario y contraseña:</h2>
        </legend>
        <div>
            <label for="userName">Usuario:</label>
            <input type="text" id="userName" name="userName" /><br /><br />
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" /><br /><br />
            <input
                    class="button"
                    type="submit"
                    name="loginSubmit"
                    value="Login"
            />
        </div>
    </fieldset>
    <br />
</form>
<!-- We need to remember to load the js file somewhere -->

