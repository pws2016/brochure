  <div class="mb-3">
                                            <label class="form-label" for="useremail">Email</label>
                                          <?php $input = [
												'type'  => 'email',
												'name'  => 'signup_email',
												'id'    => 'signup_email',
												'class' => 'form-control',
												'required'=>true,
												'parsley-type'=>'email',
												'placeholder' =>"Email"
										];

										echo form_input($input);?>
										
                                        </div>
                
                                      
                
                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword"><?php echo lang('app.field_password')?></label>
                                          <?php $input = [
												'type'  => 'password',
												'name'  => 'signup_password',
												'id'    => 'signup_password',
												'class' => 'form-control',
												'required'=>true,
												'placeholder' =>"Password"
										];

										echo form_input($input);?>
                                        </div>
									<div class="mb-3">
                                            <label class="form-label" for="userpassword"><?php echo lang('app.field_confirm_password')?></label>
                                          <?php $input = [
												'type'  => 'password',
												'name'  => 'signup_password_confirmation',
												'id'    => 'signup_password_confirmation',
												'class' => 'form-control',
												 'data-parsley-equalto'=>'#signup_password',
												'required'=>true,
												 
												'placeholder' =>lang('app.field_confirm_password')
										];

										echo form_input($input);?>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="auth-terms-condition-check" name="terms" required>
                                            <label class="form-check-label" for="auth-terms-condition-check" ><?php echo lang('app.field_terms')?></label>
                                        </div>

                                     <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="auth-newsletter-condition-check" name="newsletter">
                                            <label class="form-check-label" for="auth-newsletter-condition-check" checked><?php echo lang('app.field_newsletter')?></label>
                                        </div>
