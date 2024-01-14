<div class="body-content">

    <h2 class="aboutTitle">Compromiso con los Clientes</h2>
    <p class="aboutP">Nuestros clientes son el corazón de nuestra empresa. Nos esforzamos por ofrecer una experiencia de
        compra
        excepcional y soporte dedicado.</p>

    <div class="review-card">
        <h3>Laura Ríos</h3>
        <p class="review-rating">Valoración: 5/5</p>
        <p class="review-comment">Comentario: ¡Me encanta este sitio! Siempre encuentro los mejores juegos aquí.</p>
    </div>

    <div class="review-card">
        <h3>Pedro Gómez</h3>
        <p class="review-rating">Valoración: 4.5/5</p>
        <p class="review-comment">Comentario: Excelente servicio al cliente. Tuve un problema con mi pedido y lo
            resolvieron de inmediato.</p>
    </div>

    <div class="Conecta">
        <h2 class="aboutTitle">Contacta con Nosotros</h2>

        <form class="contactForm" action="<?=base_url?>Contact/insert" method="POST">
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre"><br>
            <label for="correo">Correo electrónico:</label><br>
            <input type="email" id="correo" name="correo"><br>
            <label for="telefono">Teléfono:</label><br>
            <input type="tel" id="telefono" name="telefono"><br>
            <label for="mensaje">¿En qué podemos ayudarte?:</label><br>
            <textarea id="mensaje" name="mensaje"></textarea><br>
            <input type="submit" value="Enviar" id="contactButton">

            <?php if (!empty($_SESSION['errors'])): ?>
                <div id="contactErrors">
                    <?php foreach ($_SESSION['errors'] as $error): ?>
                        <p>
                            <?php echo $error; ?>
                        </p>
                    <?php endforeach; ?>
                    <?php unset($_SESSION['errors']); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($_SESSION['success'])): ?>
                <div id="contactSuccess">
                    <p>
                        <?php echo $_SESSION['success']; ?>
                    </p>
                    <?php unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>
        </form>

        <p id="contactP"><strong> Síguenos en nuestras redes sociales o suscríbete a nuestro boletín para estar al tanto
                de las últimas novedades y ofertas.</strong></p>
    </div>
</div>