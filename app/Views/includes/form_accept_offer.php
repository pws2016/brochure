<p><?php echo lang('app.msg_accept_offer')?></p>
<form id="form_accept_offer">
<div class="alert alert-danger" id="error_form_accept_offer" style="display:none"></div>
<div class="row" id="fileds_form_accept">
<div class="col-12">
<label>Nome e cognome <span class="text-danger">*</span></label>
<input type="text" class="form-control" name="name" required>
</div>
<div class="col-8">
<label>Indirizzo <span class="text-danger">*</span></label>
<input type="text" class="form-control" name="address">
</div>
<div class="col-4">
<label>Comune <span class="text-danger">*</span></label>
<input type="text" class="form-control" name="comune">
</div>
<div class="col-6">
<label>Provincia <span class="text-danger">*</span></label>
<input type="text" class="form-control" name="provincia" maxlength="2">
</div>
<div class="col-6">
<label>CAP <span class="text-danger">*</span></label>
<input type="text" class="form-control" name="cap"  maxlength="5">
</div>
<div class="col-6">
<label>Codice Fiscale <span class="text-danger">*</span></label>
<input type="text" class="form-control" name="cf">
</div>
<div class="col-6">
<label>Ragione Sociale <span class="text-danger">*</span></label>
<input type="text" class="form-control" name="company">
</div>
<div class="col-12">
<label>Email PEC </label>
<input type="text" class="form-control" name="pec">
</div>
</div>
</form>