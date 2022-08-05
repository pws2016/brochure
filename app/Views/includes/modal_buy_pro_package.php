<div class="card checkout-order-summary">
																<div class="card-body">
																	<div class="p-3 bg-light mb-4">
																		<h5 class="font-size-16 mb-0">ProPlan <span class="float-end ms-2">#PPS_01</span></h5>
																	</div>
																	<div class="table-responsive">
																		<table class="table table-centered mb-0 table-nowrap checkout_table">
																			<thead>
																				<tr>
																					<th class="border-top-0" scope="col">Nome prodotto</th>
																					<th class="border-top-0" scope="col">Prezzo</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td>
																						<h5 class="font-size-14 text-truncate">
																							<ul>
																								<li><b>x<?php echo $inf['nb_bp']?></b> Basic Plan</li>
																								<li><b>x<?php echo $inf['nb_cert']?></b> Certificazioni</li>
																							</ul>
																						</h5>
																						
																					</td>
																					<td><?php echo number_format($inf['price'],2,'.',',')?> €</td>
																				</tr>
																				<tr>
																					<td >
																						<h5 class="font-size-14 m-0"><?php echo lang('app.field_imponibile')?> :</h5>
																					</td>
																					<td>
																					<?php echo number_format($inf['price'],2,'.',',')?> €
																					</td>
																				</tr>
																				<?php if(isset($discount)){?>
																				<tr>
																					<td >
																						<h5 class="font-size-14 m-0"><?php echo lang('app.field_discount')?> :</h5>
																					</td>
																					<td>
																					-<?php echo number_format($discount,2,'.',',')?> €
																					</td>
																				</tr>
																				<tr>
																					<td >
																						<h5 class="font-size-14 m-0"><?php echo lang('app.field_imponibile')?> :</h5>
																					</td>
																					<td>
																					<?php echo number_format($inf['price']-($discount ?? 0),2,'.',',')?> €
																					</td>
																				</tr>
																				<?php } ?>
																				<tr>
																					<td>
																						<h5 class="font-size-14 m-0"><?php echo lang('app.field_vat')?> :</h5>
																					</td>
																					<td>
																					<?php echo number_format(($inf['price']-($discount ?? 0))*22/100,2,'.',',')?> €
																					</td>
																				</tr>                             
																					
																				<tr class="bg-light">
																					<td >
																						<h5 class="font-size-14 m-0"><?php echo lang('app.field_total')?>:</h5>
																					</td>
																					<td>
																					<?php echo number_format(($inf['price']-($discount ?? 0))*1.22,2,'.',',')?> €
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		
																	</div>
																</div>
															</div>
															<div class="mt-2 row" style="">
																<a class="btn btn-bloc btn-warning btn-lg" onclick="shareFacebook('<?php echo $inf['id']?>', '<?= $settings['fb_share_url'] ?? 0?>', '<?= $settings['fb_share'] ?? 0?>')">Condividi e risparmia <?= number_format($settings['fb_share'],2,'.','') ?? 0 ?>€</a>
															</div>
															<div class="mt-2" style="">
																<div class="p-4 border-top">
																	<div>
																		<h5 class="font-size-14 mb-3"><?php echo lang('app.section_title_payment_method')?> :</h5>

																		<div class="row">
																			<?php foreach($payment_method as $k=>$v){?>
																			<div class="col-lg-4 col-sm-6">
																				<div>
																					<label class="card-radio-label">
																						<input type="radio" name="method_payment" id="pay-methodoption2" class="card-radio-input" value="<?php echo $v['id']?>" <?php if($k==0) echo 'checked'?>>
							
																						<span class="card-radio text-center text-truncate">
																						<?php if($v['icon']!="") echo $v['icon'];?>
																							
																							<br>Carta di credito
																						</span>
																					</label>
																				</div>
																			</div>
																			<?php }?>
																		</div>

																	</div>
																</div>
															</div>