<div class="alert alert-danger" role="alert" id="conc_error_alert" style="display:none"></div>
 <input type="hidden" name="type_plan" value="<?php echo $type_plan?>">
 <div class="row">
                            <div class="form-group col-md-6">
                                <label><?php echo lang('app.field_first_name')?> </label>
								<?php  $val=""; if(isset($inf_conc)) $val=$inf_conc['name'];
								
										$input = [
												'type'  => 'text',
												'name'  => 'conc_nome',
												'id'    => 'conc_nome',
												'required' =>true,
												'class' => 'form-control form-control-sm',
												'value' => $val
										];

										echo form_input($input);
										?>
                              
                            </div>
                            <div class="col-md-6">
                                <label><?php echo lang('app.field_type')?> </label>
                                <?php $val=null; if(isset($inf_conc)) $val=$inf_conc['type'];
										$options['']=lang('app.field_select');
										$options['diretto']='diretto';
										$options['indiretto']='indiretto';
										$input = [
												
												'name'  => 'conc_type',
												'id'    => 'conc_type',
												'required' =>true,
												'value'=>$val,
												'class' => 'form-control form-control-sm'
										];
										$js = '';
										echo form_dropdown($input, $options,$val,$js);
										?>
                            </div>
                        </div>
						<div class="row">
                            <div class="form-group col-md-12">
                                <label><?php echo lang('app.field_caracteristics')?> </label>
								<?php  $val=""; if(isset($inf_conc)) $val=$inf_conc['caracteristic'];
								
										$input = [
												
												'name'  => 'conc_caracteristic',
												'id'    => 'conc_caracteristic',
											
												'class' => 'form-control form-control-sm',
												'value' => $val
										];

										echo form_textarea($input);
										?>
                              
                            </div>
							</div>