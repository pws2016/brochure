<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<style>
		body{font-family: "arial",sans-serif;margin:0; padding:0;font-size: 11px;line-height: 1.5;color: #495057;}
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
		h3.h3, h4.h4{border-bottom: 3px solid <?php echo $request_data_inf['logo_color']?>;color: <?php echo $request_data_inf['logo_color']?>;font-size:17px;}
		h5.h5{color:#987136;font-size:15px;color: <?php echo $request_data_inf['logo_color']?>;}
		
        
        table {caption-side: bottom;border-collapse: inherit;}
        table.flexible{width:100% !important;}
		table.flexible td{font-size:12px;}
		.page {width: 21cm;padding: 2cm 1cm;margin: 1cm auto;min-height: 27.7cm;}
		.subpage {padding: 1cm;/*border: 5px red solid;*/height: 236mm;/*outline: 2cm #FFEAEA solid;*/min-width: 100%;}
		@page {size: A4;margin: 0;}
        @media print {
            .page {margin: 0;border: initial;border-radius: initial;width: initial;min-height: initial;box-shadow: initial;background: initial;page-break-after: always;padding:1cm;}
        }
        .table {font-size: 12px;--bs-table-bg: transparent;--bs-table-striped-color: #495057;--bs-table-striped-bg: #f8f9fa;--bs-table-active-color: #495057;--bs-table-active-bg: rgba(0, 0, 0, 0.1); --bs-table-hover-color: #495057;--bs-table-hover-bg: #f8f9fa;width: 100%;margin-bottom: 1rem;color: #495057;vertical-align: top;border-color: #f5f6f8;}
        table.footer{margin-top: 45px;border-top:1px solid #b7b7b7;padding-top: 10px;color:#c0bfbf;font-size: 10px;}
        .textright {text-align: right;}
        table.header{padding-bottom: 25px;}
        table[class="center"]{float:none !important;margin:0 auto !important;}

        th[class="thead"]{display:table-header-group !important; width:100% !important;}
        th[class="tfoot"]{display:table-footer-group !important; width:100% !important;}
        td{vertical-align: top;padding:3px;}
		th{padding:3px;text-align: left;}
        .table .table-light {color: #495057;border-color: #f5f6f8;background-color: #f8f9fa;}
        .table th {font-weight: 600;}

        .table>:not(caption)>*>* {border-bottom-width: 0;border-top-width: 1px;}
        .table-sm>:not(caption)>*>* {padding: .25rem .25rem;}


        table.sommario td.left{width: 75%;}
        table.sommario td.right{width: 25%;text-align: right;}
        .mb-2 {margin-bottom: .5rem!important;}
        .mb-3 {margin-bottom: 1rem!important;}
        .mt-2 {margin-top: .5rem!important;}
        .mt-3 {margin-top: 1rem!important;}
        .pt-2 {padding-top: .5rem!important;}
		table {page-break-inside: avoid;}
		tr.sommario {page-break-inside: avoid;}

        .table-sm>:not(caption)>*>* {padding: .25rem .25rem;}
        .table>:not(caption)>*>* {background-color: var(--bs-table-bg);border-bottom-width: 1px;-webkit-box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);}
        .bordertd tbody tr td, .bordertd tbody tr th {border-top: 1px solid #ececec;}
.table-info {--bs-table-bg: #dcedfc;--bs-table-striped-bg: #d1e1ef;color: #000;border-color: #c6d5e3;}
    .table-success {--bs-table-bg: #d6f3e9;--bs-table-striped-bg: #cbe7dd;color: #000;border-color: #c1dbd2;}
		
	</style>
	
  
</head>
    <body bgcolor="#ffffff">
		<!-- Page 1 -->
		<table width="100%" cellspacing="0" cellpadding="0" class="page">
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" class="subpage">
                        <tr>
                            <td class="">
                                <table width="100%" cellpadding="0" cellspacing="0" class="flexible">
                                    <tr>
                                        <td style="">
										<?php 
										if($request_data_inf['logo']!='' && file_exists(ROOTPATH.'public/uploads/logo/'.$request_data_inf['logo'])){?>
										<img src="<?php echo base_url('uploads/logo/'.$request_data_inf['logo'])?>" border="0" align="left" vspace="0" hspace="0" width="350" />
										<?php } ?>
										</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="wrapper" style="padding:0 10px;">
                                <table data-module="module-1" width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td data-bgcolor="bg-module">
                                            <table class="flexible" width="600" align="right" style="margin:0 auto;" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="width: 25%;"></td>
                                                    <td style="width: 25%;"></td>
                                                    <td style="padding:29px 20px 30px;color:#000;font-size: 29px; text-align: right;">
													<?php if($request_data_inf['pdf_date']!="") echo $request_data_inf['pdf_date']; else echo date('d/m/Y');?></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="wrapper" style="padding:0 10px;">
                                <table data-module="module-1" width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td data-bgcolor="bg-module">
                                            <table class="flexible" width="600" align="right" style="margin:0 auto;" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="width: 10%;"></td>
                                                    <td style="color: <?php echo $request_data_inf['logo_color']?>;width: 90%;padding:29px 20px 30px;font-size: 29px; text-align: right;"><h1>Business Plan</h1><br><span style="color:#000;">(D.M. 07/05/2019)</span> </td>
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
        <table cellspacing="0" cellpadding="0" class="page">
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" class="subpage">
                        <thead>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible header">
                                        <tr>
                                            <td><p><b><?php echo $request_data_inf['denominazione']?> </b><br><span style="font-style: italic;">Business Plan (art. 5 D.M. 07/05/2019)</span></p></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible" style="padding-bottom: 25px;">
                                        <tr>
                                            <td><p><b>Sommario </b></p></td>
                                        </tr>

                                    </table>
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible sommario" style="">
                                        <tr>
                                            <td class="left pt-2"><b>Profilo aziendale</b></td>
                                            <td class="right">2</td>
                                        </tr>
                                        <tr>
                                            <td class="left pt-2"><b>Situazione soci al 31-12-2020</b></td>
                                            <td class="right">3</td>
                                        </tr>
                                        <tr class="">
                                            <td class="left pt-2"><b>L'Attività</b></td>
                                            <td class="right">4</td>
                                        </tr>
                                        <tr>
                                            <td class="left">Descrizione analitica del business</td>
                                            <td class="right">4</td>
                                        </tr>
                                        <tr>
                                            <td class="left">Partnership strategiche e operative attivate</td>
                                            <td class="right">4</td>
                                        </tr>
                                        <tr>
                                            <td class="left">Attività realizzate e prossimi step</td>
                                            <td class="right">5</td>
                                        </tr>
                                        <tr>
                                            <td class="left">Road Map a 12 mesi</td>
                                            <td class="right">5</td>
                                        </tr>
                                        <tr>
                                            <td class="left">La SWOT ANALISYS</td>
                                            <td class="right">6</td>
                                        </tr>
                                        <tr class="">
                                            <td class="left pt-2"><b>Modello di business</b></td>
                                            <td class="right">7</td>
                                        </tr>
                                        <tr>
                                            <td class="left">Le nostre problem/solution</td>
                                            <td class="right">7</td>
                                        </tr>
                                        <tr class="">
                                            <td class="left pt-2"><b>Il mercato</b></td>
                                            <td class="right">8</td>
                                        </tr>
                                        <tr>
                                            <td class="left">Ambito geografico e misurazione del mercato potenziale</td>
                                            <td class="right">8</td>
                                        </tr>
                                        <tr>
                                            <td class="left">I concorrenti</td>
                                            <td class="right">9</td>
                                        </tr>
                                        <tr class="">
                                            <td class="left pt-2"><b>L'Offerta</b></td>
                                            <td class="right">10</td>
                                        </tr>
                                        <tr>
                                            <td class="left">I nostri prodotti/servizi</td>
                                            <td class="right">10</td>
                                        </tr>
                                        <tr class="">
                                            <td class="left pt-2"><b>Exit strategy</b></td>
                                            <td class="right">11</td>
                                        </tr>
                                        <tr>
                                            <td class="left">Scalabilità</td>
                                            <td class="right">11</td>
                                        </tr>
                                        <tr>
                                            <td class="left">Riproducibilità</td>
                                            <td class="right">11</td>
                                        </tr>
                                        <tr>
                                            <td class="left">Vantaggio competitivo monetizzabile  (exit strategy)</td>
                                            <td class="right">11</td>
                                        </tr>
                                        <tr class="">
                                            <td class="left pt-2"><b>Piano</b></td>
                                            <td class="right">12</td>
                                        </tr>
                                        <tr>
                                            <td class="left">Conto economico previsionale</td>
                                            <td class="right">12</td>
                                        </tr>
                                        <tr>
                                            <td class="left">Piano degli investimenti</td>
                                            <td class="right">13</td>
                                        </tr>
                                        <tr class="">
                                            <td class="left pt-2"><b>Nota legale</b></td>
                                            <td class="right">14</td>
                                        </tr>
                                        <tr>
                                            <td class="left">ADEMPIMENTO DI LEGGE</td>
                                            <td class="right">14</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible footer">
                                        <tr>
                                            <td style="width: 80%;">REPORT GENERATO DA © CREAZIONEIMPRESA <?php echo date('Y');?>. - <?php if($request_data_inf['pdf_date']!="") echo $request_data_inf['pdf_date']; else echo date('d/m/Y');?></td>
                                            <td style="width: 20%;" class="textright">/// 1</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </table>
        <!-- Page 3 Profilo Aziendale-->
		<table cellspacing="0" cellpadding="0" class="page">
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" class="subpage">
                        <thead>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible header">
                                        <tr>
                                            <td><p><b><?php echo $request_data_inf['denominazione']?> </b><br><span style="font-style: italic;">Business Plan (art. 5 D.M. 07/05/2019)</span></p></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible">
                                        <tr>
                                            <td><h3 class="mb-3 h3">Profilo Aziendale</h3></td>
                                        </tr>
                                        <tr>
                                            <td style="height: 25px;"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2><?php echo $request_data_inf['denominazione']?></h2>
                                                <p><?php echo $request_data_inf['sede_indirizzo'].' '.$request_data_inf['sede_civico'].' '.$inf_comune['comune'].' ('.$inf_provincia['prov'].')'?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="100%" cellpadding="0" cellspacing="0" class="flexible">
                                                    <tr>
                                                        <td style="width: 70%;">
                                                            <p>
                                                                Attività: <b><?php echo $request_data_inf['activity']?></b><br>
                                                                Codice ATECO: <b><?php echo $request_data_inf['codice_ateco']?></b><br><br>
                                
                                                                <?php echo $request_data_inf['bref_description']?><br>
                                                                <?php echo $request_data_inf['website']?>
                                                            </p>
                                                        </td>
                                                        <td style="width: 30%;">
                                                            <p>
                                                                Soci: <b><?php echo count($list_soci)?></b><br>
                                                                Dipendenti: <b><?php echo $request_data_inf['dipendenti']?></b><br>
                                                                Anno di fondazione: <b><?php echo $request_data_inf['anno_fondazione']?></b>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="height: 25px;"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="100%" cellpadding="0" cellspacing="0" class="flexible">
                                                    <tr>
                                                        <td>
														<?php if(trim($request_data_inf['website'])!=""){?>
                                                            <p>
                                                                <img src="<?php echo base_url('Minible_v2.0.0/Admin/dist/assets/images/icon-web.png')?>" border="0" align="left" vspace="0" hspace="0" height="25" /> Sito web<br>
                                                                <?php echo $request_data_inf['website']?>
                                                            </p>
														<?php } if(trim($request_data_inf['facebook'])!=""){?>
                                                            <p>
                                                                <img src="<?php echo base_url('Minible_v2.0.0/Admin/dist/assets/images/icon-fb.png')?>" border="0" align="left" vspace="0" hspace="0" height="25" /> Facebook<br>
                                                                <?php echo $request_data_inf['facebook']?>
                                                            </p>
														<?php } ?>
                                                        </td>
                                                        <td>
														<?php if(trim($request_data_inf['linkedin'])!=""){?>
                                                            <p>
                                                                <img src="<?php echo base_url('Minible_v2.0.0/Admin/dist/assets/images/icon-linkedin.png')?>" border="0" align="left" vspace="0" hspace="0" height="25" /> LinkedIn<br>
                                                                <?php echo $request_data_inf['linkedin']?>
                                                            </p>
															<?php } if(trim($request_data_inf['twitter'])!=""){?>
                                                            <p>
                                                                <img src="<?php echo base_url('Minible_v2.0.0/Admin/dist/assets/images/icon-twitter.png')?>" border="0" align="left" vspace="0" hspace="0" height="25" /> Twitter<br>
                                                                <?php echo $request_data_inf['twitter']?>
                                                            </p>
														<?php } ?>
                                                        </td>
													<?php //} ?>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible footer">
                                        <tr>
                                            <td style="width: 80%;">REPORT GENERATO DA © CREAZIONEIMPRESA <?php echo date('Y');?>. - <?php if($request_data_inf['pdf_date']!="") echo $request_data_inf['pdf_date']; else echo date('d/m/Y');?></td>
                                            <td style="width: 20%;" class="textright">/// 2</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </table>
        <!-- Page 4 Situazione soci al 31-12-->
        <table cellspacing="0" cellpadding="0" class="page">
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" class="subpage">
                        <thead>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible header">
                                        <tr>
                                            <td><p><b><?php echo $request_data_inf['denominazione']?> </b><br><span style="font-style: italic;">Business Plan (art. 5 D.M. 07/05/2019)</span></p></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible">
                                        <tr>
                                            <td>
                                                <h4 class="mb-3 h4">Situazione soci al 31-12-<?php echo $request_data_inf['anno_riferimento']?></h4>
                                    
                                                <p class="<?php if($is_crypted==true) echo 'text_flou'?>">
                                                <?php ob_start();?>Di seguito viene riportata la situazione delle partecipazioni al 31/12/<?php echo $request_data_inf['anno_riferimento']?>. Maggiori informazioni sul tipo di quote assegnate e in genere sulla captable possono essere richieste all'organo amministrativo
                                                <?php $str=ob_get_clean();
                                                
                                                if($is_crypted==true) echo str_shuffle($str) ;
                                                else echo $str;
                                                ?></p>
                                            </td>
                                        </tr>
										<tr>
                                            <td>
                                               <?php echo $str_all_soci?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="height: 25px;"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div id="social_pie_chart" style="width: 400px; height: 240px;" ></div>
                                            </td>
                                        </tr>
										 
                                    </table>
									
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible footer">
                                        <tr>
                                            <td style="width: 80%;">REPORT GENERATO DA © CREAZIONEIMPRESA <?php echo date('Y');?>. - <?php if($request_data_inf['pdf_date']!="") echo $request_data_inf['pdf_date']; else echo date('d/m/Y');?></td>
                                            <td style="width: 20%;" class="textright">/// 3</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </table>
        <!-- Page 5 Attività-->
        <table cellspacing="0" cellpadding="0" class="page">
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" class="subpage">
                        <thead>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible header">
                                        <tr>
                                            <td><p><b><?php echo $request_data_inf['denominazione']?> </b><br><span style="font-style: italic;">Business Plan (art. 5 D.M. 07/05/2019)</span></p></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible">
                                        <tr>
                                            <td>
                                                <h3 class="mb-3 h3">1.L’attività</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="mb-2 h5">1.1 Descrizione analitica del business</h5>
                                                <?php echo $request_data_inf['description_activity']?>
                                            </td>
                                        </tr>
                                        <tr class="pba">
                                            <td class="pt-2">
                                                <h5 class="mb-2 h5">1.2 Partnership strategiche e operative attivate</h5>
                                                <?php echo $request_data_inf['partnership_strategy']?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible footer">
                                        <tr>
                                            <td style="width: 80%;">REPORT GENERATO DA © CREAZIONEIMPRESA <?php echo date('Y');?>. - <?php if($request_data_inf['pdf_date']!="") echo $request_data_inf['pdf_date']; else echo date('d/m/Y');?></td>
                                            <td style="width: 20%;" class="textright">/// 4</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </table>
        <!-- Page 5 Attività punto 1.3 e 1.4-->
        <table cellspacing="0" cellpadding="0" class="page">
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" class="subpage">
                        <thead>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible header">
                                        <tr>
                                            <td><p><b><?php echo $request_data_inf['denominazione']?> </b><br><span style="font-style: italic;">Business Plan (art. 5 D.M. 07/05/2019)</span></p></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible">
                                        <tr>
                                            <td class="pt-2">
                                                <h5 class="mb-2 h5">1.3 Attività realizzate e prossimi step</h5>
                                                <?php echo $request_data_inf['realized_activity']?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pt-2">
                                                <h5 class="mb-2 h5">1.4 Road Map a 12 mesi</h5>
                                                <?php echo $request_data_inf['road_map']?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible footer">
                                        <tr>
                                            <td style="width: 80%;">REPORT GENERATO DA © CREAZIONEIMPRESA <?php echo date('Y');?>. - <?php if($request_data_inf['pdf_date']!="") echo $request_data_inf['pdf_date']; else echo date('d/m/Y');?></td>
                                            <td style="width: 20%;" class="textright">/// 5</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </table>
        <!-- Page 5 Attività - SWOT-->
        <table cellspacing="0" cellpadding="0" class="page">
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" class="subpage">
                        <thead>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible header">
                                        <tr>
                                            <td><p><b><?php echo $request_data_inf['denominazione']?> </b><br><span style="font-style: italic;">Business Plan (art. 5 D.M. 07/05/2019)</span></p></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible">
                                        <tr>
                                            <td class="pt-2">
                                                <table width="100%" cellpadding="0" cellspacing="0" class="flexible">
                                                    <tr>
                                                        <td><h5 class="mb-2 h5">1.5 La SWOT ANALISYS</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table class="flexible table table-step-shipping swot">
                                                                <tr>
                                                                    <th style="width: 25% !important;" align="center" class="blue"><h2 style="font-size:6rem !important;color: #fff;">S</h2><h5 style="color: #fff;">STRENGTHS</h5></th>
                                                                    <th style="width: 25% !important;" align="center" class="orange"><h2 style="font-size:6rem !important;color: #fff;">W</h2><h5 style="color: #fff;">WEAKNESS</h5></th>
                                                                    <th style="width: 25% !important;" align="center" class="green"><h2 style="font-size:6rem !important;color: #fff;">O</h2><h5 style="color: #fff;">OPPORTUNITIES</h5></th>
                                                                    <th style="width: 25% !important;" align="center" class="violet"><h2 style="font-size:6rem !important;color: #fff;">T</h2><h5 style="color: #fff;">THREATS</h5></th>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding:4px;font-size:12px;" class="bluelight"><?php echo $request_data_inf['swot_s']?></td>
                                                                    <td style="padding:4px;font-size:12px;" class="orangelight"><?php echo $request_data_inf['swot_w']?></td>
                                                                    <td style="padding:4px;font-size:12px;" class="greenlight"><?php echo $request_data_inf['swot_o']?></td>
                                                                    <td style="padding:4px;font-size:12px;" class="violetlight"><?php echo $request_data_inf['swot_t']?></td>
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
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible footer">
                                        <tr>
                                            <td style="width: 80%;">REPORT GENERATO DA © CREAZIONEIMPRESA <?php echo date('Y');?>. - <?php if($request_data_inf['pdf_date']!="") echo $request_data_inf['pdf_date']; else echo date('d/m/Y');?></td>
                                            <td style="width: 20%;" class="textright">/// 6</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </table>        
        <!-- Page 7 modello di business-->
        <table cellspacing="0" cellpadding="0" class="page">
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" class="subpage">
                        <thead>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible header">
                                        <tr>
                                            <td><p><b><?php echo $request_data_inf['denominazione']?> </b><br><span style="font-style: italic;">Business Plan (art. 5 D.M. 07/05/2019)</span></p></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible">
                                        <tr>
                                            <td>
                                                <h4 class="mb-3 h4">2. Modello di business</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="mb-2 h5">2.2 Le nostre problem, solution</h5>
                                                <?php echo $request_data_inf['problem_solution']?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible footer">
                                        <tr>
                                            <td style="width: 80%;">REPORT GENERATO DA © CREAZIONEIMPRESA <?php echo date('Y');?>. - <?php if($request_data_inf['pdf_date']!="") echo $request_data_inf['pdf_date']; else echo date('d/m/Y');?></td>
                                            <td style="width: 20%;" class="textright">/// 7</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </table>
        <!-- Page 7 il mercato punto 3.1-->
        <table cellspacing="0" cellpadding="0" class="page">
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" class="subpage">
                        <thead>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible header">
                                        <tr>
                                            <td><p><b><?php echo $request_data_inf['denominazione']?> </b><br><span style="font-style: italic;">Business Plan (art. 5 D.M. 07/05/2019)</span></p></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible">
                                        <tr>
                                            <td>
                                                <h4 class="mb-3 h4">3. Il mercato</h4>
                                            </td>
                                        </tr>
										 <tr>
                                            <td>
                                              
                                                <?php echo $request_data_inf['mercato_description']?>
                                            </td>
                                        </tr>
										<?php if(trim(strip_tags($request_data_inf['mercato_potenziale']))!=""){?>
                                        <tr>
                                            <td>
                                                <h5 class="mb-2 h5">3.1 Ambito geografico e misurazione del mercato potenziale</h5>
                                                <?php echo $request_data_inf['mercato_potenziale']?>
                                            </td>
                                        </tr>
										<?php } ?>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible footer">
                                        <tr>
                                            <td style="width: 80%;">REPORT GENERATO DA © CREAZIONEIMPRESA <?php echo date('Y');?>. - <?php if($request_data_inf['pdf_date']!="") echo $request_data_inf['pdf_date']; else echo date('d/m/Y');?></td>
                                            <td style="width: 20%;" class="textright">/// 8</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </table>
        <!-- Page 7 il mercato punto 3.2-->
		<?php   if(!empty($list_conc)){?>
        <table cellspacing="0" cellpadding="0" class="page">
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" class="subpage">
                        <thead>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible header">
                                        <tr>
                                            <td><p><b><?php echo $request_data_inf['denominazione']?> </b><br><span style="font-style: italic;">Business Plan (art. 5 D.M. 07/05/2019)</span></p></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible">
                                        <tr class="sommario">
                                            <td>
                                                <h5 class="mb-2 h5">3.2 I concorrenti</h5>
                                                <table class="flexible table table-step-shipping">
                                                    <thead class="table-light">
                                                        <tr style="background-color:#c56431;">
                                                            <th style="color:#fff;width:25%;"><?php echo lang('app.field_first_name')?></th>
                                                            <th style="color:#fff;width:15%;"><?php echo lang('app.field_type')?> </th>
                                                            <th style="color:#fff;width:60%;"><?php echo lang('app.field_caracteristics')?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody >
                                                    <?php 
                                                 
                                                        foreach($list_conc as $k=>$v){
                                                            
                                                            ?>
                                                        <tr >
                                                            <td><?php echo $v['name']?></td>
                                                            <td><?php  echo $v['type']?></td>
                                                            <td><?php  echo $v['caracteristic']?></td>
                                                            
                                                    </tr>
                                                    <?php } 
?>
                                                    </tbody>
                                                    
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible footer">
                                        <tr>
                                            <td style="width: 80%;">REPORT GENERATO DA © CREAZIONEIMPRESA <?php echo date('Y');?>. - <?php if($request_data_inf['pdf_date']!="") echo $request_data_inf['pdf_date']; else echo date('d/m/Y');?></td>
                                            <td style="width: 20%;" class="textright">/// 9</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </table>
	<?php } ?>
        <!-- Page 8 l'offerte-->
        <table cellspacing="0" cellpadding="0" class="page">
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" class="subpage">
                        <thead>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible header">
                                        <tr>
                                            <td><p><b><?php echo $request_data_inf['denominazione']?> </b><br><span style="font-style: italic;">Business Plan (art. 5 D.M. 07/05/2019)</span></p></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible">
                                        <tr>
                                            <td>
                                                <h4 class="mb-3 h4">4. L’offerta</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="mb-2 h5">4.1 I nostri prodotti/servizi</h5>
                                                <table class="table table-step-shipping" style="width:100% important;">
                                                    <thead class="table-light">
                                                        <tr style="background-color:#c56431;">
                                                            <th style="width:25%;color:#fff;font-size:12px;"><?php echo lang('app.field_problem')?></th>
                                                            <th style="width:25%;color:#fff;font-size:12px;"><?php echo lang('app.field_solution')?> </th>
                                                            <th style="width:25%;color:#fff;font-size:12px;"><?php echo lang('app.field_prod_assoc')?></th>
                                                            <th style="width:25%;color:#fff;font-size:12px;"><?php echo lang('app.field_prod_riferimento')?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody >
                                                    <?php 
                                                    if(!empty($list_prod)){
                                                        foreach($list_prod as $k=>$v){
                                                            
                                                            ?>
                                                        <tr style="background-color:#f8f9fa;">
														 	<td colspan="4"><?php echo $v['titolo']?></td>
                                                    	</tr>
														<tr >
                                                            <td><?php echo $v['problem']?></td>
                                                            <td><?php  echo $v['solution']?></td>
                                                            <td><?php  echo $v['prod_assoc']?></td>
                                                            <td><?php  echo $v['riferimento']?></td>
                                                    	</tr>
                                                    <?php } }?>
                                                    </tbody>
                                                    
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible footer">
                                        <tr>
                                            <td style="width: 80%;">REPORT GENERATO DA © CREAZIONEIMPRESA <?php echo date('Y');?>. - <?php if($request_data_inf['pdf_date']!="") echo $request_data_inf['pdf_date']; else echo date('d/m/Y');?></td>
                                            <td style="width: 20%;" class="textright">/// 10</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </table>
        <!-- Page 9 Exit Strategy-->
        <table cellspacing="0" cellpadding="0" class="page">
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" class="subpage">
                        <thead>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible header">
                                        <tr>
                                            <td><p><b><?php echo $request_data_inf['denominazione']?> </b><br><span style="font-style: italic;">Business Plan (art. 5 D.M. 07/05/2019)</span></p></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible">
                                        <tr>
                                            <td>
                                                <h4 class="mb-3 h4">5. Exit strategy</h4>
                                            </td>
                                        </tr>
                                        <tr class="mb-2">
                                            <td>
                                                <?php $checks=explode(",",$request_data_inf['check'])?>
                                                <P><?php if(in_array('1',$checks)) echo '&#9745;'; else echo '&#9744;'?> Previsione opzioni put e call con diritto di vendita e riacquisto a prezzo stabilito della partecipazione</P>

                                                <P><?php if(in_array('2',$checks)) echo '&#9745;'; else echo '&#9744;'?> Previsione di cessione della maggioranza con clausole di trascinamento</P>

                                                <P><?php if(in_array('3',$checks)) echo '&#9745;'; else echo '&#9744;'?> Restituzione dell’investimento a data e rendimenti definiti</P>

                                                <P><?php if(in_array('4',$checks)) echo '&#9745;'; else echo '&#9744;'?> Exit totale e quasi exit con cessione delle partecipazioni a gruppo industriale o big company</P>

                                                <P><?php if(in_array('5',$checks)) echo '&#9745;'; else echo '&#9744;'?> Cessione totale o in licenza dei diritti di sfruttamento e relativo pagamento di royalties</P>

                                                <P><?php if(in_array('6',$checks)) echo '&#9745;'; else echo '&#9744;'?> Altro (descrivere) <br/><?php echo $request_data_inf['strategy_other']?></P>
                                            </td>
                                        </tr>
										<?php if(trim(strip_tags($request_data_inf['scalabilita']))!=""){?>
                                        <tr>
                                            <td>
                                                <h5 class="mb-2 h5">Scalabilità</h5>
                                        <?php echo $request_data_inf['scalabilita']?>
                                            </td>
                                        </tr>
										<?php } if(trim(strip_tags($request_data_inf['riproducibilita']))!=""){?>
                                        <tr>
                                            <td>
                                                <h5 class="mb-2 h5">Riproducibilità</h5>
                                        <?php echo $request_data_inf['riproducibilita']?>
                                            </td>
                                        </tr>
										<?php } if(trim(strip_tags($request_data_inf['competitivo_monetizzabile']))!=""){?>
                                        <tr>
                                            <td>
                                                <h5 class="mb-2 h5">Vantaggio competitivo monetizzabile (exit strategy)</h5>
                                        <?php echo $request_data_inf['competitivo_monetizzabile']?>
                                            </td>
                                        </tr>
										<?php } ?>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible footer">
                                        <tr>
                                            <td style="width: 80%;">REPORT GENERATO DA © CREAZIONEIMPRESA <?php echo date('Y');?>. - <?php if($request_data_inf['pdf_date']!="") echo $request_data_inf['pdf_date']; else echo date('d/m/Y');?></td>
                                            <td style="width: 20%;" class="textright">/// 11</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </table>                    
        <!-- Page 10 Conto economico previsionale 6.1-->
        <table cellspacing="0" cellpadding="0" class="page">
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" class="subpage">
                        <thead>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible header">
                                        <tr>
                                            <td><p><b><?php echo $request_data_inf['denominazione']?> </b><br><span style="font-style: italic;">Business Plan (art. 5 D.M. 07/05/2019)</span></p></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible">
                                        <tr>
                                            <td>
                                                <h4 class="mb-3 h4">6. piano</h4>
                                            </td>
                                        </tr>
                                        <tr class="mb-2">
                                            <td>
                                                <h5 class="mb-2 h5">6.1 Conto economico previsionale</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table cellpadding="0" cellspacing="0" class="flexible table table-step-shipping table-sm bordertd">
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
                                                            <td><?php echo $v['title'];//echo lang('app.field_prod').' '.($j);?></td>
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
									<td>Interessi attivi </td>
									<td><?php echo  $list_active_interessi[0]['year1']?></td>
									<td><?php echo $list_active_interessi[0]['year2']?></td>
									<td><?php echo $list_active_interessi[0]['year3']?></td>
								</tr>
								
								<tr>
									<td>Interessi passivi </td>
									<td><?php echo  $list_passive_interessi[0]['year1']?></td>
									<td><?php echo $list_passive_interessi[0]['year2']?></td>
									<td><?php echo $list_passive_interessi[0]['year3']?></td>
								</tr>
                                                        <tr>
                                                            <th>totale interessi </td>
                                                            <th><?php echo  $list_interessi[0]['year1']?></th>
                                                            <th><?php echo $list_interessi[0]['year2']?></th>
                                                            <th><?php echo $list_interessi[0]['year3']?></th>
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
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible footer">
                                        <tr>
                                            <td style="width: 80%;">REPORT GENERATO DA © CREAZIONEIMPRESA <?php echo date('Y');?>. - <?php if($request_data_inf['pdf_date']!="") echo $request_data_inf['pdf_date']; else echo date('d/m/Y');?></td>
                                            <td style="width: 20%;" class="textright">/// 12</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </table>
        <!-- Page 10 Conto economico previsionale 6.2-->
        <table cellspacing="0" cellpadding="0" class="page">
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" class="subpage">
                        <thead>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible header">
                                        <tr>
                                            <td><p><b><?php echo $request_data_inf['denominazione']?> </b><br><span style="font-style: italic;">Business Plan (art. 5 D.M. 07/05/2019)</span></p></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible">
                                        <tr class="mb-2">
                                            <td>
                                                <h5 class="mb-2 h5">6.2 Piano degli investimenti</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table cellpadding="0" cellspacing="0" class="flexible table table-step-shipping table-sm bordertd">
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
                                                            <th colspan="3"></th>
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
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible footer">
                                        <tr>
                                            <td style="width: 80%;">REPORT GENERATO DA © CREAZIONEIMPRESA <?php echo date('Y');?>. - <?php if($request_data_inf['pdf_date']!="") echo $request_data_inf['pdf_date']; else echo date('d/m/Y');?></td>
                                            <td style="width: 20%;" class="textright">/// 13</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </table>                 
        <!-- Page 11 nota legale-->
        <table cellspacing="0" cellpadding="0" class="page">
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" class="subpage">
                        <thead>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible header">
                                        <tr>
                                            <td><p><b><?php echo $request_data_inf['denominazione']?> </b><br><span style="font-style: italic;">Business Plan (art. 5 D.M. 07/05/2019)</span></p></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible">
                                        <tr>
                                            <td>
                                                <h4 class="mb-3 h4">7. Nota legale</h4>
                                            </td>
                                        </tr>
                                        <tr class="mb-5">
                                            <td>
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
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="100%" cellpadding="0" cellspacing="0" class="flexible">
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <b><?php echo $inf_comune['comune']?>, <?php echo $request_data_inf['pdf_date']?></b>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p>
                                                                <b>Il legale rappresentante</b>
                                                            </p>
                                                            <p>per <?php echo $request_data_inf['denominazione']?><br><?php echo $request_data_inf['rappresentante']?><br></p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="">
                                    <table width="100%" cellpadding="0" cellspacing="0" class="flexible footer">
                                        <tr>
                                            <td style="width: 80%;">REPORT GENERATO DA © CREAZIONEIMPRESA <?php echo date('Y');?>. - <?php if($request_data_inf['pdf_date']!="") echo $request_data_inf['pdf_date']; else echo date('d/m/Y');?></td>
                                            <td style="width: 20%;" class="textright">/// 14</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tfoot>
                    </table>  
                </td>
            </tr>
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

         chart.draw(data, {width: 660, height: 450, title: '', labels: '', legend: 'bottom', chma:'50,50,50,50|500,500'});
      }
    </script>
    </body>
</html>