<form target="_blank" action="https://web.whatsapp.com/send?phone={$phone}&text={$result}" method="post">
    <div class="form-group">
        <label for="estimation">{$messagevalue}</label>
        <textarea name="estimation" id="estimation" class="form-control" rows="5" id="comment">{$whatsappvalue}</textarea>
    </div>
    <button type="submit" name="submitGEstimation" class="btn btn-primary">{l s='send' mod='gonzamodule'}</button>
</form>
