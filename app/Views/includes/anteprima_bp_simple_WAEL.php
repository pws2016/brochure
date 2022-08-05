<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<style>
		.swot th{text-align:center}
		.swot .blue{background-color:#0178ba;}
		.swot .orange{background-color:#fb894d;}
		.swot .green{background-color:#22ba55;}
		.swot .violet{background-color:#6469a9;}
		.swot .bluelight{background-color:#f2f7fb;}
		.swot .orangelight{background-color:#fbf3f1;}
		.swot .greenlight{background-color:#f1fcf4;}
		.swot .violetlight{background-color:#f7f6fc;}
		.text_flou{color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.5);transition: all 0.5s;}
		h3.h3, h4.h4{border-bottom: 3px solid #e66e60;color: <?php echo $request_data_inf['logo_color']?>;}
		h5.h5{color:#987136;}
		
		@media only screen and (max-width:500px) {
				table[class="flexible"]{width:100% !important;}
				table[class="center"]{
					float:none !important;
					margin:0 auto !important;
				}
				*[class="hide"]{
					display:none !important;
					width:0 !important;
					height:0 !important;
					padding:0 !important;
					font-size:0 !important;
					line-height:0 !important;
				}
				td[class="img-flex"] img{
					width:100% !important;
					height:auto !important;
				}
				td[class="aligncenter"]{text-align:center !important;}
				th[class="flex"]{
					display:block !important;
					width:100% !important;
				}
				td[class="wrapper"]{padding:0 !important;}
				td[class="holder"]{padding:30px 15px 20px !important;}
				td[class="nav"]{
					padding:20px 0 0 !important;
					text-align:center !important;
				}
				td[class="h-auto"]{height:auto !important;}
				td[class="description"]{padding:30px 20px !important;}
				td[class="i-120"] img{
					width:120px !important;
					height:auto !important;
				}
				td[class="footer"]{padding:5px 20px 20px !important;}
				td[class="footer"] td[class="aligncenter"]{
					line-height:25px !important;
					padding:20px 0 0 !important;
				}
				tr[class="table-holder"]{
					display:table !important;
					width:100% !important;
				}
				th[class="thead"]{display:table-header-group !important; width:100% !important;}
				th[class="tfoot"]{display:table-footer-group !important; width:100% !important;}
			}
	</style>
	
  
</head>
    <body style="margin:0; padding:0;" bgcolor="#ffffff">
		<table style="min-width:320px;" width="100%" cellspacing="0" cellpadding="0" class="flexible">
            <!-- Page 1 -->
			<tr>
				<td class="">
					<table width="100%" cellpadding="0" cellspacing="0" class="flexible">
						<tr>
							<td style="min-width:100%; font-size:0; line-height:0;">LOGO</td>
						</tr>
					</table>
				</td>
			</tr>
            <tr>
				<td class="wrapper" style="padding:0 10px;">
					<table data-module="module-1" width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td data-bgcolor="bg-module">
								<table class="flexible" width="600" align="left" style="margin:0 auto;" cellpadding="0" cellspacing="0">
									<tr>
										<td style="padding:29px 0 30px;">
											<table width="100%" cellpadding="0" cellspacing="0">
												<tr>
													<th class="flex" width="113" align="left" style="padding:0;">
														<table class="center" cellpadding="0" cellspacing="0">
															<tr>
																<td style="line-height:0;">
																	<img src="" border="0" style="font:bold 12px/12px Arial, Helvetica, sans-serif; color:#606060;" align="left" vspace="0" hspace="0" width="130" />
																</td>
															</tr>
														</table>
													</th>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
                </td>
            </tr>
		</table>
		<!-- Page 2 -->
		<table style="min-width:320px;" width="100%" cellspacing="0" cellpadding="0" class="flexible">
			<tr>
				<td class="">
					<table width="100%" cellpadding="0" cellspacing="0" class="flexible">
						<tr>
							<td><p><b>Nome Impesa </b><br><span style="font-style: italic;">Business Plan (art. 5 D.M. 07/05/2019)</span></p></td>
						</tr>
					</table>
				</td>
			</tr>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <h3 class="mb-3 h3">Profilo Aziendale</h3>
                    </div>
                </div>

                <div class="col-lg-12 mb-5">
                    <div>
                        <h2><?php echo $request_data_inf['denominazione']?></h2>
                        <p><?php echo $request_data_inf['sede_indirizzo'].' '.$request_data_inf['sede_civico'].' '.$inf_comune['comune'].' ('.$inf_provincia['prov'].')'?></p>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <p>
								Attività: <b><?php echo $request_data_inf['activity']?></b><br>
								Codice ATECO: <b><?php echo $request_data_inf['codice_ateco']?></b><br><br>

                                <?php echo $request_data_inf['bref_description']?><br>
                                <?php echo $request_data_inf['website']?>
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <p>
                                Soci: <b><?php echo count($list_soci)?></b><br>
                                Dipendenti: <b><?php echo $request_data_inf['dipendenti']?></b><br>
                                Anno di fondazione: <b><?php echo $request_data_inf['anno_riferimento']?></b>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <p>
                                <i class="mdi mdi-web"></i> Sito web<br>
								<?php echo $request_data_inf['website']?>
                            </p>
                            <p>
                                <i class="mdi mdi-twitter"></i> Twitter<br>
								<?php echo $request_data_inf['twitter']?>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <p>
                                <i class="mdi mdi-linkedin"></i> LinkedIn<br>
								<?php echo $request_data_inf['linkedin']?>
                            </p>
                            <p>
								<i class="mdi mdi-facebook"></i> Facebook<br>
								<?php echo $request_data_inf['facebook']?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-5">
                    <div>
                        <h4 class="mb-3 h4">Situazione soci al 31-12-<?php echo $request_data_inf['anno_fondazione']?></h4>
						
						<p class="<?php if($is_crypted==true) echo 'text_flou'?>">
						<?php ob_start();?>Di seguito viene riportata la situazione delle partecipazioni al 31/12/<?php echo $request_data_inf['anno_fondazione']?>. Maggiori informazioni sul tipo di quote assegnate e in genere sulla captable possono essere richieste all'organo amministrativo
						<?php $str=ob_get_clean();
						
						if($is_crypted==true) echo str_shuffle($str) ;
						else echo $str;
						?></p>
						
						<div id="social_pie_chart" style="width: 400px; height: 240px;" ></div>
                    </div>
                </div>
                <div class="col-lg-12 mb-5">
                    <div>
                        <h3 class="mb-3 h3">1.l’attività</h3>
						
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <h5 class="mb-2 h5">1.1 Descrizione analitica del business</h5>
							<?php echo $request_data_inf['description_activity']?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <h5 class="mb-2 h5">1.2 Partnership strategiche e operative attivate</h5>
							<?php echo $request_data_inf['partnership_strategy']?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <h5 class="mb-2 h5">1.3 Attività realizzate e prossimi step</h5>
							<?php echo $request_data_inf['realized_activity']?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <h5 class="mb-2 h5">1.4 Road Map a 12 mesi</h5>
							<?php echo $request_data_inf['road_map']?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="mb-2 h5">1.5 La SWOT ANALISYS</h5>
                        </div>
                    </div>
					 <div class="row">
						<table class="table table-step-shipping swot">
							<tr>
								<th style="width: 25% !important;" align="center" class="blue"><h2 style="font-size:6rem !important;color: #fff;">S</h2><h5 style="color: #fff;">STRENGTHS</h5></th>
								<th style="width: 25% !important;" align="center" class="orange"><h2 style="font-size:6rem !important;color: #fff;">W</h2><h5 style="color: #fff;">WEAKNESS</h5></th>
								<th style="width: 25% !important;" align="center" class="green"><h2 style="font-size:6rem !important;color: #fff;">O</h2><h5 style="color: #fff;">OPPORTUNITIES</h5></th>
								<th style="width: 25% !important;" align="center" class="violet"><h2 style="font-size:6rem !important;color: #fff;">T</h2><h5 style="color: #fff;">THREATS</h5></th>
							</tr>
							<tr>
								<td class="bluelight"><?php echo $request_data_inf['swot_s']?></td>
								<td class="orangelight"><?php echo $request_data_inf['swot_w']?></td>
								<td class="greenlight"><?php echo $request_data_inf['swot_o']?></td>
								<td class="violetlight"><?php echo $request_data_inf['swot_t']?></td>
							</tr>
						</table>
					 </div>
                </div>
                <div class="col-lg-12 mb-5">
                    <div>
                        <h4 class="mb-3 h4">2. modello di business</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="mb-2 h5">2.2 Le nostre problem, solution</h5>
							<?php echo $request_data_inf['problem_solution']?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-5">
                    <div>
                        <h4 class="mb-3 h4">3. il mercato</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <h5 class="mb-2 h5">3.1 Ambito geografico e misurazione del mercato potenziale</h5>
							<?php echo $request_data_inf['mercato_potenziale']?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <h5 class="mb-2 h5">3.2 I concorrenti</h5>
							<table class="table table-step-shipping" style="width:100% important;">
								<thead class="table-light">
									<tr>
										<th><?php echo lang('app.field_first_name')?></th>
										<th><?php echo lang('app.field_type')?> </th>
										<th><?php echo lang('app.field_caracteristics')?></th>
									</tr>
								</thead>
								<tbody >
								<?php 
								if(!empty($list_conc)){
									foreach($list_conc as $k=>$v){
										
										?>
									<tr >
										<td><?php echo $v['name']?></td>
										<td><?php  echo $v['type']?></td>
										<td><?php  echo $v['caracteristic']?></td>
										
								   </tr>
								<?php } }?>
								</tbody>
								
							</table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-5">
                    <div>
                        <h4 class="mb-3 h4">4. l’offerta</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <h5 class="mb-2 h5">4.1 I nostri prodotti/servizi</h5>
							<table class="table table-step-shipping" style="width:100% important;">
								<thead class="table-light">
									<tr>
										<th><?php echo lang('app.field_title')?></th>
										<th><?php echo lang('app.field_problem')?></th>
										<th><?php echo lang('app.field_solution')?> </th>
										<th><?php echo lang('app.field_prod_assoc')?></th>
										<th><?php echo lang('app.field_prod_riferimento')?></th>
									</tr>
								</thead>
								<tbody >
								<?php 
								if(!empty($list_prod)){
									foreach($list_prod as $k=>$v){
										
										?>
									<tr >
										<td><?php echo $v['title']?></td>
										<td><?php echo $v['problem']?></td>
										<td><?php  echo $v['solution']?></td>
										<td><?php  echo $v['prod_assoc']?></td>
										<td><?php  echo $v['riferimento']?></td>
								   </tr>
								<?php } }?>
								</tbody>
								
							</table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-5">
                    <div>
                        <h4 class="mb-3 h4">5. exit strategy</h4>
                    </div>
					<?php $checks=explode(",",$request_data_inf['check'])?>
					<P><?php if(in_array('1',$checks)) echo '&#9745;'; else echo '&#9744;'?> Previsione opzioni put e call con diritto di vendita e riacquisto a prezzo stabilito della partecipazione</P>

<P><?php if(in_array('2',$checks)) echo '&#9745;'; else echo '&#9744;'?> Previsione di cessione della maggioranza con clausole di trascinamento</P>

<P><?php if(in_array('3',$checks)) echo '&#9745;'; else echo '&#9744;'?> Restituzione dell’investimento a data e rendimenti definiti</P>

<P><?php if(in_array('4',$checks)) echo '&#9745;'; else echo '&#9744;'?> Exit totale e quasi exit con cessione delle partecipazioni a gruppo industriale o big company</P>

<P><?php if(in_array('5',$checks)) echo '&#9745;'; else echo '&#9744;'?> Cessione totale o in licenza dei diritti di sfruttamento e relativo pagamento di royalties</P>

<P><?php if(in_array('6',$checks)) echo '&#9745;'; else echo '&#9744;'?> Altro (descrivere) <br/><?php echo $request_data_inf['strategy_other']?></P>
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <h5 class="mb-2 h5">Scalabilità</h5>
							<?php echo $request_data_inf['scalabilita']?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <h5 class="mb-2 h5">Riproducibilità</h5>
							<?php echo $request_data_inf['riproducibilita']?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <h5 class="mb-2 h5">Vantaggio competitivo monetizzabile (exit strategy)</h5>
							<?php echo $request_data_inf['competitivo_monetizzabile']?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-5">
                    <div>
                        <h4 class="mb-3 h4">6. piano</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="mb-2 h5">6.1 Conto economico previsionale</h5>
                        </div>
                    </div>
					<div class="row">
						<table class="table table-step-shipping table-sm">
							<thead class="table-light">
								<tr>
									<th>&nbsp;</th>
									<th class="year1"><?php echo $request_data_inf['anno_riferimento']?></th>
									<th class="year2"><?php echo intval($request_data_inf['anno_riferimento'])+1?></th>
									<th class="year3"><?php echo intval($request_data_inf['anno_riferimento'])+2?></th>
									
								</tr>
							</thead>
							<tbody>
								<tr>
									<th >Fatturato</th>
									<td colspan="3"></td>
								</tr>
								<?php if(!empty($list_eco_prod)){
										$j=0;
								foreach($list_eco_prod as $k=>$v){
									$j++;
									$tot_year1+=$v['year1'];
									$tot_year2+=$v['year2'];
									$tot_year3+=$v['year3'];?>
								<tr>
									<td><?php echo lang('app.field_prod').' '.($j);?></td>
									<td><?php echo $v['year1']?></td>
									<td><?php echo $v['year2']?></td>
									<td><?php echo $v['year3']?></td>
								</tr>
								<?php } }?>
								<tr class="table-info">
									<th>Totale Ricavi</th>
									<th><?php echo $tot_year1?></th>
									<th><?php echo $tot_year2?></th>
									<th><?php echo $tot_year3?></th>
								</tr>
								<tr>
									<th >Costi</th>
									<td colspan="3"></td>
								</tr>
								<?php if(!empty($list_costi)){
										$j=0;
										$tot_costi_year1=0;
															$tot_costi_year2=0;
															$tot_costi_year3=0;
								foreach($list_costi as $k=>$v){
									$j++;
									$tot_costi_year1+=$v['year1'];
									$tot_costi_year2+=$v['year2'];
									$tot_costi_year3+=$v['year3'];?>
								<tr>
									<td><?php echo $v['title'];?></td>
									<td><?php echo $v['year1']?></td>
									<td><?php echo $v['year2']?></td>
									<td><?php echo $v['year3']?></td>
								</tr>
								<?php } }?>
								<tr class="table-info">
									<th>Totale costi</th>
									<th><?php echo $tot_costi_year1?></th>
									<th><?php echo $tot_costi_year2?></th>
									<th><?php echo $tot_costi_year3?></th>
								</tr>
								<tr>
									<th>Margine operativo (Ebitda)</th>
									<th><?php echo $margin_year_1=$tot_year1-$tot_costi_year1?></th>
									<th><?php echo $margin_year_2=$tot_year2-$tot_costi_year2?></th>
									<th><?php echo $margin_year_3=$tot_year3-$tot_costi_year3?></th>
								</tr>
								<tr>
									<td>Ammortamenti immobilizzazioni immateriali</td>
									<td><?php echo $ammortamenti_immateriali['year1']?></td>
									<td><?php echo $ammortamenti_immateriali['year2']?></td>
									<td><?php echo $ammortamenti_immateriali['year3']?></td>
								</tr>
								<tr>
									<td>Ammortamenti immobilizzazioni materiali</td>
									<td><?php echo $ammortamenti_materiali['year1']?></td>
									<td><?php echo $ammortamenti_materiali['year2']?></td>
									<td><?php echo $ammortamenti_materiali['year3']?></td>
								</tr>
								<tr class="table-info">
									<th>Totale ammortamenti</th>
									<th><?php echo $total_ammortamenti_year_1=$ammortamenti_immateriali['year1']+$ammortamenti_materiali['year1']?></th>
									<th><?php echo $total_ammortamenti_year_2=$ammortamenti_immateriali['year2']+$ammortamenti_materiali['year2']?></th>
									<th><?php echo $total_ammortamenti_year_3=$ammortamenti_immateriali['year3']+$ammortamenti_materiali['year3']?></th>
								</tr>
								<tr>
									<th>Risultato operativo (Ebit)</th>
									<th><?php echo $total_res_operative_year_1=$margin_year_1-$total_ammortamenti_year_1?></th>
									<th><?php echo $total_res_operative_year_2=$margin_year_2-$total_ammortamenti_year_2?></th>
									<th><?php echo $total_res_operative_year_3=$margin_year_3-$total_ammortamenti_year_3?></th>
								</tr>
								<tr>
									<td>Interessi</td>
									<td><?php echo  $list_interessi[0]['year1']?></td>
									<td><?php echo $list_interessi[0]['year2']?></td>
									<td><?php echo $list_interessi[0]['year3']?></td>
								</tr>
								<tr>
									<th>Risultato prima delle imposte</th>
									<th><?php echo $total_interessi_year_1=$total_res_operative_year_1-$list_interessi[0]['year1']?></th>
									<th><?php echo $total_interessi_year_2=$total_res_operative_year_2-$list_interessi[0]['year2']?></th>
									<th><?php echo $total_interessi_year_3=$total_res_operative_year_3-$list_interessi[0]['year3']?></th>
								</tr>
								<tr>
									<td>Imposte</td>
									<td><?php echo  $total_imposte_year_1=round($total_interessi_year_1*$settings['imposte'],2)?></td>
									<td><?php echo $total_imposte_year_2=round($total_interessi_year_2*$settings['imposte'],2)?></td>
									<td><?php echo $total_imposte_year_3=round($total_interessi_year_3*$settings['imposte'],2)?></td>
								</tr>
								<tr>
									<th>Risultato dell'esercizio</th>
									<th><?php echo $total_interessi_year_1-$total_imposte_year_1?></th>
									<th><?php echo $total_interessi_year_2-$total_imposte_year_2?></th>
									<th><?php echo $total_interessi_year_3-$total_imposte_year_3?></th>
								</tr>
							</tbody>
						</table>
					</div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="mb-2 h5">6.2 Piano degli investimenti</h5>
                        </div>
                    </div>
					<div class="row">
						<table class="table table-step-shipping table-sm">
							<thead class="table-light">
								<tr>
									<th rowspan="2" valign="top">Descrizione</th>
									<th colspan="3" align="center">Importo</th>

								</tr>
								<tr>
									<th class="year1"><?php echo $request_data_inf['anno_riferimento']?></th>
									<th class="year2"><?php echo intval($request_data_inf['anno_riferimento'])+1?></th>
									<th class="year3"><?php echo intval($request_data_inf['anno_riferimento'])+2?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th >Investimenti in immobilizzazioni immateriali</th>
									<td colspan="3"></td>
								</tr>
								<?php 
								$tot_year1=0;
										$tot_year2=0;
										$tot_year3=0;
								if(!empty($list_inv_immo_immateriali)){
										$j=0;
										$tot_costi_year1=0;
										$tot_costi_year2=0;
										$tot_costi_year3=0;
								foreach($list_inv_immo_immateriali as $k=>$v){
									$j++;
									$tot_costi_year1+=$v['year1'];
									$tot_costi_year2+=$v['year2'];
									$tot_costi_year3+=$v['year3'];?>
								<tr>
									<td><?php echo $v['title'];?></td>
									<td><?php echo $v['year1']?></td>
									<td><?php echo $v['year2']?></td>
									<td><?php echo $v['year3']?></td>
								</tr>
								<?php } $tot_year1+=$tot_costi_year1;
								$tot_year2+=$tot_costi_year2;
								$tot_year3+=$tot_costi_year3;?>
								<tr class="table-info">
									<th>Totale immobilizzazioni immateriali</th>
									<th><?php echo $tot_costi_year1?></th>
									<th><?php echo $tot_costi_year2?></th>
									<th><?php echo $tot_costi_year3?></th>
								</tr>
								<?php }?>
								<tr>
									<th >Investimenti in immobilizzazioni materiali</th>
									<td colspan="3"></td>
								</tr>
								<?php if(!empty($list_inv_immo_materiali)){
										$j=0;
										$tot_costi_year1=0;
										$tot_costi_year2=0;
										$tot_costi_year3=0;
								foreach($list_inv_immo_materiali as $k=>$v){
									$j++;
									$tot_costi_year1+=$v['year1'];
									$tot_costi_year2+=$v['year2'];
									$tot_costi_year3+=$v['year3'];?>
								<tr>
									<td><?php echo $v['title'];?></td>
									<td><?php echo $v['year1']?></td>
									<td><?php echo $v['year2']?></td>
									<td><?php echo $v['year3']?></td>
								</tr>
								<?php }
								$tot_year1+=$tot_costi_year1;
								$tot_year2+=$tot_costi_year2;
								$tot_year3+=$tot_costi_year3;?>
								<tr class="table-info">
									<th>Totale immobilizzazioni materiali</th>
									<th><?php echo $tot_costi_year1?></th>
									<th><?php echo $tot_costi_year2?></th>
									<th><?php echo $tot_costi_year3?></th>
								</tr>
								<?php }?>
								<tr>
									<th >Immobilizzazioni finanziarie</th>
									<td colspan="3"></td>
								</tr>
								<?php if(!empty($list_inv_immo_fin)){
										$j=0;
										$tot_costi_year1=0;
										$tot_costi_year2=0;
										$tot_costi_year3=0;
								foreach($list_inv_immo_fin as $k=>$v){
									$j++;
									$tot_costi_year1+=$v['year1'];
									$tot_costi_year2+=$v['year2'];
									$tot_costi_year3+=$v['year3'];?>
								<tr>
									<td><?php echo $v['title'];?></td>
									<td><?php echo $v['year1']?></td>
									<td><?php echo $v['year2']?></td>
									<td><?php echo $v['year3']?></td>
								</tr>
								<?php }
								$tot_year1+=$tot_costi_year1;
								$tot_year2+=$tot_costi_year2;
								$tot_year3+=$tot_costi_year3;?>
								<tr class="table-info">
									<th>Totale immobilizzazioni finanziarie</th>
									<th><?php echo $tot_costi_year1?></th>
									<th><?php echo $tot_costi_year2?></th>
									<th><?php echo $tot_costi_year3?></th>
								</tr>
								<?php }?>
								<tr class="table-success">
									<th>TOTALE IMMOBILIZZAZIONI</th>
									<th><?php echo $tot_year1?></th>
									<th><?php echo $tot_year2?></th>
									<th><?php echo $tot_year3?></th>
								</tr>
							</tbody>
						</table>
					</div>
                </div>
                <div class="col-lg-12 mb-5">
                    <div>
                        <h4 class="mb-3 h4">7. Nota legale</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="mb-2 h5">ADEMPIMENTO DI LEGGE</h5>
                            <p>
                                Con l'emanazione del D.M. 7 maggio 2019 (pubblicato nella G.U. 04.07.2019, n. 156), il Ministero dell'economia e delle finanze ha dato attuazione agli incentivi di natura fiscale previsti per le start-up innovative, così come previsto dall'art. 29 del D.L. 18 ottobre 2012, n. 179 convertito con modificazioni dalla Legge 17 dicembre 2012, n. 221.<br>
L'art. 5 del D.M. 7 maggio 2014 pone alcune condizioni che gli investitori (cioè i soggetti passivi di imposta IRPEF o IRES che effettuano un investimento agevolato in start-up innovative) oppure gli organismi di investimento collettivo del risparmio (OICV) e le società di capitali che investono prevalentemente in start-up innovative debbono osservare per poter beneficiare delle agevolazioni fiscali sopra richiamate.<br>
È infatti indispensabile che questi soggetti ricevano e conservino la seguente documentazione:<br>
una certificazione rilasciata dalla start-up innovativa attestante il rispetto del limite di € 2.500.000 per i conferimenti relativamente al periodo di imposta in cui è stato fatto l'investimento;<br>
copia del piano di investimento della start-up  innovativa  o PMI  innovativa  ammissibile,  contenente  informazioni   dettagliate sull'oggetto della prevista attività  della  medesima  impresa,  sui relativi prodotti, nonché' sull'andamento, previsto o attuale,  delle vendite e dei profitti.<br>
una certificazione rilasciata dalla start-up innovativa attestante l'oggetto della propria attività nel caso in cui vengano effettuati investimenti in start-up innovative a vocazione sociale o investimenti in start-up innovative che sviluppano e commercializzano esclusivamente prodotti o servizi innovativi ad alto valore tecnologico in ambito energetico.<br>
Il presente elaborato (business plan) assolve alle previsioni dell’art. 5 D.M. 7 maggio 2019 in merito ai contenuti del Piano d’investimento.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</table>
		<?php /*  <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/apexcharts/apexcharts.min.js"></script>
		  
		   <script>
		   var options = {
          series: [<?php echo $soci_chart_str_percent?>],
          chart: {
          height:320,type:"pie"
        },
        labels: [<?php echo $soci_chart_str_labels?>],
        legend:{show:!0,position:"bottom",horizontalAlign:"center",verticalAlign:"middle",floating:!1,fontSize:"14px",offsetX:0},responsive:[{breakpoint:600,options:{chart:{height:240},legend:{show:!1}}}]
        };

        var chart = new ApexCharts(document.querySelector("#social_pie_chart"), options);
        chart.render();
		
		</script>*/?>
		
   
  <script>
  jQuery(document).bind("contextmenu", function(e) {
    e.preventDefault();
    return false;
});
</script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["imagepiechart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
         <?php echo $soci_chart?>
        ]);

        var chart = new google.visualization.ImagePieChart(document.getElementById('social_pie_chart'));

        chart.draw(data, {width: 430, height: 240, title: '', labels: 'value'});
      }
    </script>
    </body>
</html>
