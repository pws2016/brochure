 <div class="alert alert-danger" role="alert" id="soci_error_alert" style="display:none"></div>
 	<input type="hidden" name="type_plan" value="<?php echo $type_plan?>">
 		<div class="form-group required-field">
                            <div class="form-group-custom-control row">
                                <div class="col-md-6">
                                    <div class="custom-control">
											<?php 
											$check=true;
											if(isset($inf_soci)){
												if($inf_soci['type']=='giuridica') $check=false;
												else $check=true;
											}
											
											$data = [
														'name'    => 'soci_type',
														'id'      => 'soci_type_fisica',
														'value'   => 'fisica',
														'checked' => $check
														
												];

												echo form_radio($data);?>
                                        <label class="" for="">Persona fisica</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="custom-control">
                                     <?php 
									 $check=false;
											if(isset($inf_soci)){
												if($inf_soci['type']=='giuridica') $check=true;
												else $check=false;
											}
									 $data = [
														'name'    => 'soci_type',
														'id'      => 'soci_type_giuridica',
														'value'   => 'giuridica',
														'checked' => $check
														
												];

												echo form_radio($data);?>
                                        <label class="" for="">Persona giuridica</label>
                                    </div>
                                </div>
                            </div>
							<div class="row">
								<div class="alert alert-warning" id="warning_girudica_30" style="display:<?php if($check==true && $type_plan=='full') echo 'block'; else echo 'none'?>">In questo caso l’investitore può beneficiare solo della deduzione del 30%</div>
							</div>
                        </div>
                        <hr>
						<?php $disp='block';
if($inf_soci['type']=='giuridica') $disp='none';?>
					<div id="div_fisica" style="display:<?php echo $disp?>">
                        <div class="row mb-4">
                            <div class="form-group col-md-6">
                                <label>Nome <span class="text-primary">*</span></label>
								<?php  $val=""; if(isset($inf_soci)) $val=$inf_soci['nome'];
								
										$input = [
												'type'  => 'text',
												'name'  => 'soci_nome',
												'id'    => 'soci_nome',
												'required' =>true,
												'class' => 'form-control ',
												'value' => $val
										];

										echo form_input($input);
										?>
                              
                            </div>
                            <div class="col-md-6">
                                <label>Cognome <span class="text-primary">*</span></label>
                                <?php $val=""; if(isset($inf_soci)) $val=$inf_soci['cognome'];
										$input = [
												'type'  => 'text',
												'name'  => 'soci_cognome',
												'id'    => 'soci_cognome',
												'required' =>true,
												'class' => 'form-control ',
												'value' => $val
										];

										echo form_input($input);
										?>
                            </div>
                        </div>

<?php if($type_plan!='simple'){?>
                       
                        <h5 class="step-title text-primary" style="font-style: italic;">Luogo di nascita</h5>
						<hr>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Stato <span class="text-primary">*</span></label>
                                <div class="select-custom">
								<?php  $val=null; if(isset($inf_soci)) $val=$inf_soci['nascita_stato'];
										$options['']=lang('app.field_select');
										foreach($list_nazioni as $k=>$v){
											$options[$v['id']]=$v['nazione'].' ('.$v['tid'].')';
										}
										
										$input = [
												
												'name'  => 'soci_nascita_stato',
												'id'    => 'soci_nascita_stato',
												'required' =>true,
												'value'=>$val,
												'class' => 'form-control '
										];
										$js = 'id="soci_nascita_stato" onChange="get_provincia_soci(\'soci_nascita\',this.value);"';
										echo form_dropdown($input, $options,$val,$js);

										?>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Provincia <span class="text-primary">*</span></label>
								<?php $val=null; if(isset($inf_soci)) $val=$inf_soci['nascita_provincia'];
								
								
										
										$input = [
												'type'=>'hidden',
												'name'  => 'selected_soci_nascita_provincia',
												'id'    => 'selected_soci_nascita_provincia',
												
												'value'=>$val,
												
										];
										echo form_input($input);?>
                                <div class="select-custom" id="div_soci_nascita_provincia">
                                  <?php  if($inf_soci['nascita_stato']==106){
									  $options=array();
												$options['']=lang('app.field_select');
													foreach($list_nascita_provincia as $k=>$v){
														$options[$v['id']]=$v['provincia'];
													}
													
													$input = [
															
															'name'  => $name,
															'id'    => $name,
															'required' =>true,
															'class' => 'form-control'
													];
													$js = ' onChange="get_comune_soci(\'soci_nascita_provincia\',this.value);"';
													echo form_dropdown($input, $options,$val,$js);
										}											
									else{											
										$input = [
												'type'  => 'text',
												'name'  => 'soci_nascita_provincia',
												'id'    => 'soci_nascita_provincia',
												'required' =>true,
												'class' => 'form-control ',
												'value' => ''
										];

										echo form_input($input);
									}
										?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Comune <span class="text-primary">*</span></label>
								<?php  $val=null; if(isset($inf_soci)) $val=$inf_soci['nascita_comune'];
								  $input = [
												'type'=>'hidden',
												'name'  => 'selected_soci_nascita_comune',
												'id'    => 'selected_soci_nascita_comune',
												
												'value'=>$val,
												
										];
										echo form_input($input);?>
                                <div class="select-custom" id="div_soci_nascita_comune">
                                    <?php //var_dump($list_nascita_comune);
									 if($inf_soci['nascita_stato']==106 && !empty($list_nascita_comune)){
										  $options=array();
												$options['']=lang('app.field_select');
													foreach($list_nascita_comune as $k=>$v){
														$options[$v['id']]=$v['comune'];
													}
													
													$input = [
															
															'name'  => $name,
															'id'    => $name,
															'required' =>true,
															'class' => 'form-control'
													];
												
													echo form_dropdown($input, $options,$val);
										}											
									else{	
										$input = [
												'type'  => 'text',
												'name'  => 'soci_nascita_comune',
												'id'    => 'soci_nascita_comune',
												'required' =>true,
												'class' => 'form-control ',
												'value' => ''
										];

										echo form_input($input);
									}
										?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Cittadinanza <span class="text-primary">*</span></label>
                                <?php $val=''; if(isset($inf_soci)) $val=$inf_soci['nascita_cittadinanza'];
								$options['']=lang('app.field_select');
										foreach($list_nazioni as $k=>$v){
											$options[$v['id']]=$v['nazione'].' ('.$v['tid'].')';
										}
										$input = [
												
												'name'  => 'soci_nascita_cittadinanza',
												'id'    => 'soci_nascita_cittadinanza',
												'required' =>true,
												'value'=>$val,
												'class' => 'form-control '
										];
										
										echo form_dropdown($input, $options,$val);


										?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Data di nascita <span class="text-primary">*</span></label>
                                <?php $val=''; if(isset($inf_soci) && $inf_soci['nascita_data']!="") $val=date('d/m/Y',strtotime($inf_soci['nascita_data']));
										$input = [
												'type'  => 'text',
												'name'  => 'soci_nascita_data',
												'id'    => 'soci_nascita_data',
												'required' =>true,
												'data-inputmask'=>"'alias': 'date'",
												'data-inputmask-inputformat'=>'dd/mm/yyyy',
												'im-insert'=>"false",
												'data-parsley-pattern-message'=>lang('app.error_format_date'),
												'data-parsley-pattern'=>"^[0-9]{2}/[0-9]{2}/[0-9]{4}$",
												'data-date-format'=>"DD/MM/YYYY",
												'class' => 'form-control input-mask',
												'value' => $val
										];

									//	echo form_input($input);
										?>
										<input type="text" class="form-control input-mask" id="soci_nascita_data" name="soci_nascita_data" required data-parsley-pattern-message="<?php echo lang('app.error_format_date')?>" data-parsley-pattern="^[0-9]{2}/[0-9]{2}/[0-9]{4}$"  data-date-format="DD/MM/YYYY"  value="<?php echo $val?>" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" im-insert="false">
                            </div>
                            <div class="col-md-3">
                                <label>Sesso <span class="text-primary">*</span></label>
                                <div class="select-custom">
								<?php $options=array();
										$options['']=lang('app.field_select');
										$options['M']=lang('app.field_sex_m');
										$options['F']=lang('app.field_sex_f');
										
										$input = [
												
												'name'  => 'soci_sesso',
												'id'    => 'soci_sesso',
												'required' =>true,
												
												'class' => 'form-control '
										];
										$val=null; if(isset($inf_soci)) $val=$inf_soci['sesso'];
										echo form_dropdown($input, $options,$val);

										?>
                                    
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label>Codice Fiscale <span class="text-primary">*</span></label>
                                <?php $val=''; if(isset($inf_soci)) $val=$inf_soci['cf'];
										$input = [
												'type'  => 'text',
												'name'  => 'soci_cf',
												'id'    => 'soci_cf',
												'required' =>true,
												//'onclick' =>"generate_cf()",
												'class' => 'form-control ',
												'value' => $val
										];

										echo form_input($input);
										?>
								<small id="passwordHelpBlock" class="form-text text-muted"><a class="text-primary" href="javascript::void()" onclick="generate_cf()"><?php echo lang('app.generate_cf') ?></a></small>
                            </div>
                        </div>


                        <h5 class="step-title text-primary" style="font-style: italic;">Indirizzo di residenza</h5>
						<hr>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Stato <span class="text-primary">*</span></label>
                                <div class="select-custom">
                                   <?php $options=array();
										$options['']=lang('app.field_select');
										foreach($list_nazioni as $k=>$v){
												$options[$v['id']]=$v['nazione'].' ('.$v['tid'].')';
										}
										
										$input = [
												
												'name'  => 'soci_residenza_stato',
												'id'    => 'soci_residenza_stato',
												
												'class' => 'form-control '
										];
										$val=null; if(isset($inf_soci)) $val=$inf_soci['residenza_stato'];
										$js = 'id="soci_residenza_stato" onChange="get_provincia_soci(\'soci_residenza\',this.value);"';
										echo form_dropdown($input, $options,$val,$js);

										?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Provincia <span class="text-primary">*</span></label>
								<?php  $val=null; if(isset($inf_soci)) $val=$inf_soci['residenza_provincia'];
								  $input = [
												'type'=>'hidden',
												'name'  => 'selected_soci_residenza_provincia',
												'id'    => 'selected_soci_residenza_provincia',
												
												'value'=>$val,
												
										];
										echo form_input($input);
									?>
                               <div class="select-custom" id="div_soci_residenza_provincia">
                                  <?php
										$input = [
												'type'  => 'text',
												'name'  => 'soci_residenza_provincia',
												'id'    => 'soci_residenza_provincia',
												
												'class' => 'form-control ',
												'value' => ''
										];

										echo form_input($input);
										?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                            <label>Comune <span class="text-primary">*</span></label>
							<?php $val=null; if(isset($inf_soci)) $val=$inf_soci['residenza_comune'];
								  $input = [
												'type'=>'hidden',
												'name'  => 'selected_soci_residenza_comune',
												'id'    => 'selected_soci_residenza_comune',
												
												'value'=>$val,
												
										];
										echo form_input($input);?>
                                <div class="select-custom" id="div_soci_residenza_comune">
                                    <?php 
										$input = [
												'type'  => 'text',
												'name'  => 'soci_residenza_comune',
												'id'    => 'soci_residenza_comune',
												
												'class' => 'form-control ',
												'value' => ''
										];

										echo form_input($input);
										?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>CAP <span class="text-primary">*</span></label>
                                <?php $val=''; if(isset($inf_soci)) $val=$inf_soci['residenza_cap'];
										$input = [
												'type'  => 'text',
												'name'  => 'soci_residenza_cap',
												'id'    => 'soci_residenza_cap',
												
												'class' => 'form-control ',
												'value' => $val
										];

										echo form_input($input);
										?>
                            </div>
							<div class="col-md-8">
									 <div class="form-group required-field">
									<label>Indirizzo (via/piazza) <span class="text-primary">*</span></label>
								   <?php $val=null; if(isset($inf_soci)) $val=$inf_soci['residenza_indirizzo'];
												$input = [
														'type'  => 'text',
														'name'  => 'soci_residenza_indirizzo',
														'id'    => 'soci_residenza_indirizzo',
														
														'class' => 'form-control ',
														'value' =>$val
												];

												echo form_input($input);
												?>
								</div>
							</div>
							<div class="col-md-4">
									 <div class="form-group required-field">
									<label>Civico <span class="text-primary">*</span></label>
								   <?php $val=null; if(isset($inf_soci)) $val=$inf_soci['residenza_civico'];
												$input = [
														'type'  => 'text',
														'name'  => 'soci_residenza_civico',
														'id'    => 'soci_residenza_civico',
														
														'class' => 'form-control ',
														'value' =>$val
												];

												echo form_input($input);
												?>
								</div>
							</div>
                        </div>

                       
<?php /*
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Stato civile</label>
                                <div class="select-custom">
								<?php $options=array();
										$options['']=lang('app.field_select');
										$options['separazione']='Coniugato in regime di separazione dei beni';
										$options['comunione']='Coniugato in regime di comunione dei beni';
										$options['libero']='Non coniugato';
										
										$input = [
												
												'name'  => 'soci_stato_civile',
												'id'    => 'soci_stato_civile',
												'required' =>true,
												
												'class' => 'form-control '
										];
										$val=null; if(isset($inf_soci)) $val=$inf_soci['residenza_civile'];
										echo form_dropdown($input, $options,$val);

										?>
                                 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Professione<small></small></label>
                              <?php $val=null; if(isset($inf_soci)) $val=$inf_soci['professione'];
										$input = [
												'type'  => 'text',
												'name'  => 'soci_professione',
												'id'    => 'soci_professione',
												'required' =>true,
												'class' => 'form-control ',
												'value' => $val
										];

										echo form_input($input);
										?>
                            </div>
                        </div>
						*/ ?>
	<?php } ?>
</div><!-- end div fisica -->

                     <?php /*   <p style="color:red;">Le prossime domande devono comparire solo nel form persona fisica amministratori e non in quello soci</p>
                        <div class="row">
                            <div class="col-md-12">
                                <label>In caso di consiglio di amministrazione l'amministratore sarà anche presidente o  vicepresidente del consiglio di amministrazione ?</label>
                                <div class="form-group-custom-control row">
                                    <div class="col-md-4"> 
                                        <div class="custom-control">
                                            <?php $data = [
														'name'    => 'soci_consiglio_amministrazione',
														'id'      => 'soci_consiglio_amministrazione_presidente',
														'value'   => 'presidente',
														'checked' => false
														
												];

												echo form_radio($data);?>
                                            <label class="" for="">Presidente</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="custom-control">
                                           <?php $data = [
														'name'    => 'soci_consiglio_amministrazione',
														'id'      => 'soci_consiglio_amministrazione_vicepresidente',
														'value'   => 'vicepresidente',
														'checked' => false
														
												];

												echo form_radio($data);?>
                                            <label class="" for="">Vicepresidente</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="custom-control">
                                           <?php $data = [
														'name'    => 'soci_consiglio_amministrazione',
														'id'      => 'soci_consiglio_amministrazione_no',
														'value'   => 'no',
														'checked' => true
														
												];

												echo form_radio($data);?>
                                            <label class="" for="">Membro CDA</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>*/?>
<!-- Persone giuridica -->
<?php $disp='none';
if($inf_soci['type']=='giuridica') $disp='block';?>
<div id="div_girudica" style="display:<?php echo $disp?>">
                        <!--p style="color:red;">Devi apparire sono se scelgo persona giuridica</p-->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Denominazione Sociale <span class="text-primary">*</span></label>
                                 <?php $val=""; if(isset($inf_soci)) $val=$inf_soci['giuridica_denomincazione'];
										$input = [
												'type'  => 'text',
												'name'  => 'soci_giuridica_denomincazione',
												'id'    => 'soci_giuridica_denomincazione',
												'required' =>true,
												'class' => 'form-control ',
												'value' => $val
										];

										echo form_input($input);
										?>
                            </div>
					</div>
                            
                        
						<?php if($type_plan!='simple'){?>
                        <div class="row mb-4">
						<div class="col-md-3">
                                <label>Codice Fiscale <span class="text-primary">*</span></label>
                               <?php $val=""; if(isset($inf_soci)) $val=$inf_soci['giuridica_cf'];
										$input = [
												'type'  => 'text',
												'name'  => 'soci_giuridica_cf',
												'id'    => 'soci_giuridica_cf',
												'required' =>true,
												'class' => 'form-control ',
												'value' => $val
										];

										echo form_input($input);
										?>
                            </div>
                            <div class="form-group col-md-5">
                                <label>Iscritta alla camera di commercio di <span class="text-primary">*</span></label>
                              <?php $val=""; if(isset($inf_soci)) $val=$inf_soci['giuridica_camera'];
										$input = [
												'type'  => 'text',
												'name'  => 'soci_giuridica_camera',
												'id'    => 'soci_giuridica_camera',
												'required' =>true,
												'class' => 'form-control ',
												'value' => $val
										];

										echo form_input($input);
										?>
                            </div>
                            <div class="col-md-4">
                                <label>Numero di iscrizione REA <span class="text-primary">*</span></label>
                               <?php $val=""; if(isset($inf_soci)) $val=$inf_soci['giuridica_iscrizione'];
										$input = [
												'type'  => 'text',
												'name'  => 'soci_giuridica_iscrizione',
												'id'    => 'soci_giuridica_iscrizione',
												'required' =>true,
												'class' => 'form-control ',
												'value' =>$val
										];

										echo form_input($input);
										?>
								<small>Il dato lo puoi trovare in visura</small>
                            </div>
                        </div>
                        <h5 class="step-title" style="font-style: italic;">Inserisci l'indirizzo della Sede Legale</h5>
                        <hr>
						<div class="row">
                            <div class="form-group col-md-4">
                                <label>Stato <span class="text-primary">*</span></label>
                                <div class="select-custom">
                                    <?php $options=array();
										$options['']=lang('app.field_select');
										foreach($list_nazioni as $k=>$v){
											$options[$v['id']]=$v['nazione'].' ('.$v['tid'].')';
										}
										
										$input = [
												
												'name'  => 'soci_sede_stato',
												'id'    => 'soci_sede_stato',
												'required' =>true,
												
												'class' => 'form-control '
										];
										$js = 'id="soci_sede_stato" onChange="get_provincia_soci(\'soci_sede\',this.value);"';
										$val=null; if(isset($inf_soci)) $val=$inf_soci['sede_stato'];
										echo form_dropdown($input, $options,$val,$js);

										?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Provincia <span class="text-primary">*</span></label>
								<?php $val=null; if(isset($inf_soci)) $val=$inf_soci['sede_provincia'];
								  $input = [
												'type'=>'hidden',
												'name'  => 'selected_soci_sede_provincia',
												'id'    => 'selected_soci_sede_provincia',
												
												'value'=>$val,
												
										];
										echo form_input($input);?>
                                <div class="select-custom" id="div_soci_sede_provincia">
                                   <?php 
										$input = [
												'type'  => 'text',
												'name'  => 'soci_sede_provincia',
												'id'    => 'soci_sede_provincia',
												'required' =>true,
												'class' => 'form-control ',
												'value' => ''
										];

										echo form_input($input);
										?>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                            <label>Comune <span class="text-primary">*</span></label>
							<?php $val=null; if(isset($inf_soci)) $val=$inf_soci['sede_comune'];
								  $input = [
												'type'=>'hidden',
												'name'  => 'selected_soci_sede_comune',
												'id'    => 'selected_soci_sede_comune',
												
												'value'=>$val,
												
										];
										echo form_input($input);
										?>
                                <div class="select-custom" id="div_soci_sede_comune">
                                     <?php 
										$input = [
												'type'  => 'text',
												'name'  => 'soci_sede_comune',
												'id'    => 'soci_sede_comune',
												'required' =>true,
												'class' => 'form-control ',
												'value' => ''
										];

										echo form_input($input);
										?>
                                </div>
                            </div>
                        </div>
						<div class="row">
						<div class="col-md-8">
									 <div class="form-group required-field">
									<label>Indirizzo (via/piazza) <span class="text-primary">*</span></label>
								   <?php $val=null; if(isset($inf_soci)) $val=$inf_soci['sede_indirizzo'];
												$input = [
														'type'  => 'text',
														'name'  => 'soci_sede_indirizzo',
														'id'    => 'soci_sede_indirizzo',
														'required' =>true,
														'class' => 'form-control ',
														'value' =>$val
												];

												echo form_input($input);
												?>
								</div>
							</div>
							<div class="col-md-4">
									 <div class="form-group required-field">
									<label>Civico <span class="text-primary">*</span></label>
								   <?php $val=null; if(isset($inf_soci)) $val=$inf_soci['sede_civico'];
												$input = [
														'type'  => 'text',
														'name'  => 'soci_sede_civico',
														'id'    => 'soci_sede_civico',
														'required' =>true,
														'class' => 'form-control ',
														'value' =>$val
												];

												echo form_input($input);
												?>
								</div>
							</div>
                         </div>
						<?php /*
                        <h4 class="step-title">Inserisci i dati del legale rappresentante</h4>
                        <p><b>Se chi parteciperà all'atto di costituzione è un procuratore utilizza i dati del procuratore</b></p>

<div class="row">
                            <div class="form-group col-md-6">
                                <label>Nome </label>
                               <?php $val=""; if(isset($inf_soci)) $val=$inf_soci['represent_nome'];
										$input = [
												'type'  => 'text',
												'name'  => 'soci_represent_nome',
												'id'    => 'soci_represent_nome',
												'required' =>true,
												'class' => 'form-control ',
												'value' =>$val
										];

										echo form_input($input);
										?>
                            </div>
                            <div class="col-md-6"> 
                                <label>Cognome </label>
                                <?php $val=""; if(isset($inf_soci)) $val=$inf_soci['represent_cognome'];
										$input = [
												'type'  => 'text',
												'name'  => 'soci_represent_cognome',
												'id'    => 'soci_represent_cognome',
												'required' =>true,
												'class' => 'form-control ',
												'value' => $val
										];

										echo form_input($input);
										?>
                            </div>
                        </div> */ ?>

<?php /*
                        <div class="form-group">
                            <label>Email </label>
                          <?php 
										$input = [
												'type'  => 'email',
												'name'  => 'soci_represent_email',
												'id'    => 'soci_represent_email',
												'required' =>true,
												'class' => 'form-control ',
												'value' => ''
										];

										echo form_input($input);
										?>
                        </div> 
					
                        <h4 class="step-title">Luogo di nascita</h4>
                       
                     
                          <div class="row">
                            <div class="form-group col-md-6">
                                <label>Stato</label>
                                <div class="select-custom">
								<?php  $options=array();
										$options['']=lang('app.field_select');
										foreach($list_nazioni as $k=>$v){
												$options[$v['id']]=$v['nazione'].' ('.$v['tid'].')';
										}
										
										$input = [
												
												'name'  => 'soci_represent_nascita_stato',
												'id'    => 'soci_represent_nascita_stato',
												'required' =>true,
												
												'class' => 'form-control '
										];
										$js = 'id="soci_represent_nascita_stato" onChange="get_provincia_soci(\'soci_represent_nascita\',this.value);"';
										$val=null; if(isset($inf_soci)) $val=$inf_soci['represent_nascita_stato'];
										echo form_dropdown($input, $options,$val,$js);

										?>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Provincia</label>
								<?php $val=null; if(isset($inf_soci)) $val=$inf_soci['represent_nascita_provincia'];
								  $input = [
												'type'=>'hidden',
												'name'  => 'selected_soci_represent_nascita_provincia',
												'id'    => 'selected_soci_represent_nascita_provincia',
												
												'value'=>$val,
												
										];
										echo form_input($input);
										?>
                                <div class="select-custom" id="div_soci_represent_nascita_provincia">
                                  <?php 
										$input = [
												'type'  => 'text',
												'name'  => 'soci_represent_nascita_provincia',
												'id'    => 'soci_represent_nascita_provincia',
												'required' =>true,
												'class' => 'form-control ',
												'value' => ''
										];

										echo form_input($input);
										?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Comune</label>
								<?php $val=null; if(isset($inf_soci)) $val=$inf_soci['represent_nascita_comune'];
								  $input = [
												'type'=>'hidden',
												'name'  => 'selected_soci_represent_nascita_comune',
												'id'    => 'selected_soci_represent_nascita_comune',
												
												'value'=>$val,
												
										];
										echo form_input($input);
										?>
                                <div class="select-custom" id="div_soci_represent_nascita_comune">
                                    <?php 
										$input = [
												'type'  => 'text',
												'name'  => 'soci_represent_nascita_comune',
												'id'    => 'soci_represent_nascita_comune',
												'required' =>true,
												'class' => 'form-control ',
												'value' => ''
										];

										echo form_input($input);
										?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Cittadinanza  </label>
                                <?php $val=""; if(isset($inf_soci)) $val=$inf_soci['represent_nascita_cittadinanza'];
										
										
										$options['']=lang('app.field_select');
										foreach($list_nazioni as $k=>$v){
											$options[$v['id']]=$v['nazione'].' ('.$v['tid'].')';
										}
										$input = [
												
												'name'  => 'soci_represent_nascita_cittadinanza',
												'id'    => 'soci_represent_nascita_cittadinanza',
												'required' =>true,
												'value'=>$val,
												'class' => 'form-control '
										];
										
										echo form_dropdown($input, $options,$val);
										?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Data di nascita</label>
                                <?php $val=""; if(isset($inf_soci)) $val=$inf_soci['represent_nascita_data'];
										$input = [
												'type'  => 'text',
												'name'  => 'soci_represent_nascita_data',
												'id'    => 'soci_represent_nascita_data',
												'required' =>true,
												'data-inputmask'=>"'alias': 'date'",
												'class' => 'form-control ',
												'value' => $val
										];

										echo form_input($input);
										?>
                            </div>
                            <div class="col-md-3">
                                <label>Sesso</label>
                                <div class="select-custom">
								<?php $options=array();
										$options['']=lang('app.field_select');
										$options['M']=lang('app.field_sex_m');
										$options['F']=lang('app.field_sex_f');
										
										$input = [
												
												'name'  => 'soci_represent_sesso',
												'id'    => 'soci_represent_sesso',
												'required' =>true,
												
												'class' => 'form-control '
										];
										$val=null; if(isset($inf_soci)) $val=$inf_soci['represent_sesso'];
										echo form_dropdown($input, $options,$val);

										?>
                                    
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label>Codice Fiscale  </label>
                                <?php $val=""; if(isset($inf_soci)) $val=$inf_soci['represent_cf'];
										$input = [
												'type'  => 'text',
												'name'  => 'soci_represent_cf',
												'id'    => 'soci_represent_cf',
												'required' =>true,
												
												'class' => 'form-control ',
												'value' => $val
										];

										echo form_input($input);
										?>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Se ne sei già in possesso inserisci a dati della procura conferita dal notaio</label>
                              <?php $val=""; if(isset($inf_soci)) $val=$inf_soci['represent_procura'];
										$input = [
												'type'  => 'text',
												'name'  => 'soci_represent_procura',
												'id'    => 'soci_represent_procura',
												'required' =>true,
												'class' => 'form-control ',
												'value' => $val
										];

										echo form_input($input);
										?>
                            </div>
                            
                        </div>
						*/ ?>
						<?php } ?>
	</div>
	
	<?php if($type_plan=='simple'){?>
					 <div class="row">
                            <div class="form-group col-md-12">
                                <label><?php //echo lang('app.field_percent')?>Quota di partecipazione (%)</label>
                              <?php $val=""; if(isset($inf_soci)) $val=$inf_soci['percent'];
										$input = [
												'type'  => 'number',
												'name'  => 'soci_percent',
												'id'    => 'soci_percent',
												'required' =>true,
												'step'=>0.1,
												'class' => 'form-control ',
												'value' => $val
										];

										echo form_input($input);
										?>
                            </div>
                            
 
 </div>
	<?php }?>
	
	 <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/inputmask/min/jquery.inputmask.bundle.min.js"></script>

        <!-- form mask init -->
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/pages/form-mask.init.js"></script>
<script>

		function get_provincia_soci(t,v,selected=null){
		
			$.ajax({
				  url:"<?php echo base_url()?>/ajax/get_provincia_soci_by_nazione",
				  method:"POST",
				  data:{id_nazione:v,t:t,selected:selected}
				  
			}).done(function(data){
			
				if(t=='soci_nascita'){
					$("#div_soci_nascita_provincia").html(data);
					
					var xxx="<input type='text' name='soci_nascita_comune' id='soci_nascita_comune' class='form-control '>";
					$("#div_soci_nascita_comune").html(xxx);
				}
				if(t=='soci_residenza'){
					$("#div_soci_residenza_provincia").html(data);
					var xxx="<input type='text' name='soci_residenza_comune' id='soci_residenza_comune' class='form-control '>";
					$("#div_soci_residenza_comune").html(xxx);
				}
				if(t=='soci_sede'){
					$("#div_soci_sede_provincia").html(data);
					var xxx="<input type='text' name='soci_sede_comune' id='soci_sede_comune' class='form-control '>";
					$("#div_soci_sede_comune").html(xxx);
				}
				if(t=='soci_represent_nascita'){
					$("#div_soci_represent_nascita_provincia").html(data);
					var xxx="<input type='text' name='soci_represent_nascita_comune' id='soci_represent_nascita_comune' class='form-control '>";
					$("#div_soci_represent_nascita_comune").html(xxx);
				}
				
				
			});
		} 
		function get_comune_soci(t,v,selected=null){
			
			$.ajax({
				  url:"<?php echo base_url()?>/ajax/get_comune_soci_by_provincia",
				  method:"POST",
				  data:{id_provincia:v,t:t,selected:selected}
				  
			}).done(function(data){
			//	console.log('get_comune_soci',data);
			
				setTimeout(function(){  
					if(t=='soci_nascita_provincia') $("#div_soci_nascita_comune").html(data);
					if(t=='soci_residenza_provincia') $("#div_soci_residenza_comune").html(data);
					if(t=='soci_sede_provincia') $("#div_soci_sede_comune").html(data);
				
					if(t=='soci_represent_nascita_provincia') $("#div_soci_represent_nascita_comune").html(data);
				}, 1000);
			});
		}
		
function generate_cf(){
	
	 var $form = $('#form_soci').parsley();

					$form.on('field:validated', function() {
					  $('.parsley-error').length === 0;
					 
					}).validate({
					  force: true
					});
	var soci_type_fisica=$("#soci_type_fisica").is(':checked');
	
	var soci_nascita_stato=$("#soci_nascita_stato").val();
	var soci_nome=$("#soci_nome").val();
		var soci_cognome=$("#soci_cognome").val();
		var soci_nascita_provincia=$("#soci_nascita_provincia").val();
		var soci_nascita_comune=$("#soci_nascita_comune").val();
		var soci_sesso=$("#soci_sesso").val();
		var soci_nascita_data=$("#soci_nascita_data").val();
	if(soci_nome=="" || soci_cognome=="" || soci_nascita_provincia=="" || soci_nascita_comune=="" || soci_sesso=="" || soci_nascita_data=="" || soci_nascita_stato=="") { $("#error_generate_cf").html("<?php echo lang('app.error_required')?>"); $("#generate_cf_modal").modal('show');}
	
	else{
	if(soci_type_fisica==true && soci_nascita_stato==106){
	
		
		$.ajax({
				  url:"<?php echo base_url()?>/ajax/generate_cf",
				  method:"POST",
				  data:{soci_nome:soci_nome,soci_cognome:soci_cognome,soci_nascita_provincia:soci_nascita_provincia,soci_nascita_comune:soci_nascita_comune,soci_sesso:soci_sesso,soci_nascita_data:soci_nascita_data}
				  
			}).done(function(data){

				if(data==""){ $("#error_generate_cf").html("<?php echo lang('app.error_generate_cf')?>"); $("#generate_cf_modal").modal('show');} 
				else $("#soci_cf").val(data);
			});
	}
		else { $("#error_generate_cf").html("<?php echo lang('app.error_italian_country')?>"); $("#generate_cf_modal").modal('show');} 
	}
}

		</script>


