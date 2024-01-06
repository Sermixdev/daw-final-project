<style>
    .bodyError {
        background-image: url("<?=base_url?>public/images/error/error404.png");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        font-family: 'Irish Grover', Arial, sans-serif;
        color: #000000;
        text-align: center;
        padding: 50px;
        margin: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    h1.errorH1 {
        font-size: 3em;
        margin-bottom: 10px;
        color: #27627b;
    }

    h2.errorH2 {
        font-size: 2em;
        margin-bottom: 20px;
        color: #1d4f63;
    }

    p.errorP {
        font-size: 1.2em;
        margin-bottom: 30px;
        color: #1d4f63;
    }

    button.errorButton {
        padding: 10px 20px;
        font-size: 1em;
        background-color: #27627b;
        color: #fff;
        border: none;
        cursor: pointer;
        border-radius: 50px;
    }

    button.errorButton:hover {
        background-color: #1d4f63;
    }
</style>

    <div class="bodyError">
        <div style="
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 15px;
      ">
            <h1 class="errorH1">¡Oops! 404</h1>
            <h2 class="errorH2">Parece que hemos extraviado algunas piezas por el camino</h2>
            <p class="errorP">
                Mientras las buscamos, siéntete libre de explorar otras secciones,
                ¡quizás descubras un nuevo juego para tu colección!
            </p>
            <button class="errorButton" onclick="window.location.href = '<?=base_url?>';">
                Volver al Inicio
            </button>
        </div>
    </div>