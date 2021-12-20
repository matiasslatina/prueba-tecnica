<div style="display: grid; height: 100%;">
    <div class="grid-welcome">
        <div style="align-self: center; justify-self: start;">
            <h3>
                Bienvenido <?=$_SESSION['name']?>!
            </h3>
        </div>                
        <div class="menu">
            <a href="<?=URL_BASE?>/logout">Salir</a>
        </div>
    </div>
</div>
<input type="text" id="myInput" onkeyup="filterTableUsers()" placeholder="Filtrar por palabra clave">
<div style="overflow-x:auto; width: 100%;" id="divTableContent">
    <?=$tableContent?>
</div>
<div style="margin-top: 1em; margin-bottom: 1em; float: right;">
    <input type="button" value="Nuevo usuario" onclick="newUserModal()">
</div>
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="modalContent"></div>
    </div>
</div>
<script src="assets/scripts.min.js"></script>