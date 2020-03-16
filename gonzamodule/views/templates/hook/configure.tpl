<form action="" method="post">
    {if $save}
        <div class="bootstrap">
            <div class="module_confirmation conf confirm alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                Datos Guardados Correctamente.
            </div>
        </div>
    {/if}
    <div class="form-group">
        <label for="exampleMessage">Message</label>
        <input type="text" value="{$messagevalue}" class="form-control" name="exampleMessage" id="exampleMessage"
            aria-describedby="messageHelp" placeholder="Introduzca mensaje">
        <small id="messageHelp" class="form-text text-muted">Introduzca mensaje para los clientes</small>
        <br><br>
        <label for="whatsappMessage">Mensaje predeterminado de whatsapp</label>
        <input type="text" value="{$whatsappvalue}" class="form-control" name="whatsappMessage" id="whatsappMessage"
            aria-describedby="whatsappHelp" placeholder="Introduzca mensaje">
        <small id="whatsappHelp" class="form-text text-muted">Introduzca mensaje que se envia por whatsapp</small>
        <br><br>
        <label for="phone">Número de teléfono de la empresa</label>
        <input type="text" value="{$phonevalue}" class="form-control" name="phone" id="phone"
            aria-describedby="phoneHelp" placeholder="Introduzca teléfono">
        <small id="phoneHelp" class="form-text text-muted">Introduzca numero de teléfono si su numero es +34 123456789, 
                                                                su numero debe de ser 34123456789</small>
    </div>
    <button type="submit" name="submitgonzamodule" class="btn btn-primary">Enviar</button>
</form>

