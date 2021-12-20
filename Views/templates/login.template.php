<form action="/" method="POST" >
    <div style="display: grid; height: 90vh;">
        <div class="grid-form">
            <div>
                <h3>
                    Ingresar
                </h3>
                <h5>
                <?=(isset($message))?"<br><div class='message-text'>$message</div>":""?>
                </h5>
            </div>
            <div>
                <input type="email" name="username" id="username" placeholder="Casilla de correo" required>
            </div>
            <div>
                <input type="password" name="pass" id="pass" placeholder="Clave de acceso" required>
            </div>
            <div style="text-align: right;">
                <a href="/pass/retrieve" style="text-decoration: none; font-size: 0.8em;">Restablecer clave</a>
            </div>
            <div>
                <input type="submit" name="submit" value="Ingresar">
            </div>
        </div>
    </div>
</form>