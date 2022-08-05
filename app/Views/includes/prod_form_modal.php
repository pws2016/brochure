<div class="alert alert-danger" role="alert" id="prod_error_alert" style="display:none"></div>
 <input type="hidden" name="type_plan" value="<?php echo $type_plan?>">
 <div class="row">
  <div class="form-group col-md-12">
                                <label><?php echo lang('app.field_product_title')?> </label>
								<?php  $val=""; if(isset($inf_prod)) $val=$inf_prod['titolo'];
								
										$input = [
												
												'name'  => 'prod_titolo',
												'id'    => 'prod_titolo',
												
												'class' => 'form-control form-control-sm',
												'value' => $val
										];

										echo form_input($input);
										?>
                              
                            </div>
 </div>
 <div class="row">
                            <div class="form-group col-md-6">
                                <label><?php echo lang('app.field_problem')?> </label>
								<?php  $val=""; if(isset($inf_prod)) $val=$inf_prod['problem'];
								
										$input = [
												
												'name'  => 'prod_problem',
												'id'    => 'prod_problem',
												'rows'=>4,
												'class' => 'form-control form-control-sm',
												'value' => $val
										];

										echo form_textarea($input);
										?>
                              
                            </div>
                            <div class="col-md-6">
                                <label><?php echo lang('app.field_solution')?> </label>
                               <?php  $val=""; if(isset($inf_prod)) $val=$inf_prod['solution'];
								
										$input = [
												
												'name'  => 'prod_solution',
												'id'    => 'prod_solution',
											'rows'=>4,
												'class' => 'form-control form-control-sm',
												'value' => $val
										];

										echo form_textarea($input);
										?>
                            </div>
                        </div>
						<div class="row">
                            <div class="form-group col-md-6">
                                <label>111<?php echo lang('app.field_prod_assoc')?> </label>
								<p><small><i>Altri prodotti/servizi offerti dall’impresa che possono essere venduti in via complementare o alternativa al prodotto/servizio descritto</i></small></p>
								<?php  $val=""; if(isset($inf_prod)) $val=$inf_prod['prod_assoc'];
								
										$input = [
												
												'name'  => 'prod_prod_assoc',
												'id'    => 'prod_prod_assoc',
											'rows'=>4,
												'class' => 'form-control form-control-sm',
												'value' => $val
										];

										echo form_textarea($input);
										?>
                              
                            </div>
							<div class="form-group col-md-6">
                                <label><?php echo lang('app.field_prod_riferimento')?> </label>
								<p><i>Indica il (o i) gruppi di clienti (segmenti) che il prodotto/servizio intende raggiungere.</i></p>
								<?php  $val=""; if(isset($inf_prod)) $val=$inf_prod['riferimento'];
								
										$input = [
												
												'name'  => 'prod_riferimento',
												'id'    => 'prod_riferimento',
											'rows'=>4,
												'class' => 'form-control form-control-sm',
												'value' => $val
										];

										echo form_textarea($input);
										?>
                              
                            </div>
							</div>