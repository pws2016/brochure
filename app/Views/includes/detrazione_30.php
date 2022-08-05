<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<meta name=Generator content="Microsoft Word 15 (filtered)">
<style>

 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
@font-face
	{font-family:Georgia;
	panose-1:2 4 5 2 5 4 5 2 3 3;}
@font-face
	{font-family:"Segoe UI";
	panose-1:2 11 5 2 4 2 4 2 2 3;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:0in;
	line-height:115%;
	font-size:12.0pt;
	font-family:"Calibri",sans-serif;}
.MsoChpDefault
	{font-family:"Calibri",sans-serif;}
.MsoPapDefault
	{margin-bottom:10.0pt;
	line-height:115%;}
@page WordSection1
	{size:595.3pt 841.9pt;
	margin:70.85pt 56.7pt 56.7pt 56.7pt;}
div.WordSection1
	{page:WordSection1;}
 /* List Definitions */
 ol
	{margin-bottom:0in;}
ul
	{margin-bottom:0in;}

</style>

</head>

<body lang=EN-US style='word-wrap:break-word'>

<div class=WordSection1>

<?php if($request_data_inf['logo']!=""){?>
<p class=MsoNormal style='margin-bottom:0in;line-height:150%;border:none'><b><span
lang=IT style='font-size:16.0pt;line-height:150%;font-family:"Arial",sans-serif;
color:black;'><img src="<?php echo base_url('uploads/logo/'.$request_data_inf['logo'])?>"></span></b></p>

<p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
line-height:150%;border:none'><b><span lang=IT style='font-size:16.0pt;
line-height:150%;font-family:"Arial",sans-serif;color:black'>&nbsp;</span></b></p>
<?php } ?>
<p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
line-height:150%;border:none'><b><span lang=IT style='font-size:16.0pt;
line-height:150%;color:black'>CERTIFICAZIONE AI
SOCI DI <?php echo $request_data_inf['denominazione'];?></span></b></p>

<p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
line-height:150%;border:none'><i><span lang=IT style='font-size:12.0pt;
line-height:150%;font-family:"Arial",sans-serif;color:black'>&nbsp;</span></i></p>

<p class=MsoNormal style='margin-bottom:0in;line-height:150%;border:none'><span
lang=IT style='font-size:12.0pt;line-height:150%;font-family:"Arial",sans-serif;
color:black'>&nbsp;</span></p>

<p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
line-height:150%'><b><i><span lang=IT style='line-height:150%;'>Rilasciata ai sensi dell’art. 29 del D.L.
179/2012 e dell’art. 5 del Decreto 7 maggio 2019 del Ministero dell’economia e delle finanze recante “Modalità di attuazione degli incentivi fiscali all'investimento in start-up innovative e in PMI innovative.”</span></i></b></p>

<p class=MsoNormal style='margin-bottom:0in;line-height:150%;border:none'><span
lang=IT style='font-size:12.0pt;line-height:150%;font-family:"Arial",sans-serif;
color:black'>&nbsp;</span></p>


<p class=MsoNormal style='margin-top:0in;margin-right:6.1pt;margin-bottom:0in;margin-left:13.4pt;margin-bottom:.0001pt;line-height:110%'><?php if($request_data_inf['rappresentante_sesso']=='F') echo 'La sottoscritta'; else echo 'Il sottoscritto';?>  <?php  echo $request_data_inf['rappresentante'].' '.$request_data_inf['rappresentante_cognome']?></p>

<p class=MsoNormal style='margin-top:0in;margin-right:6.1pt;margin-bottom:0in;margin-left:13.4pt;margin-bottom:.0001pt;line-height:110%'>
	<?php if($request_data_inf['rappresentante_sesso']=='F') echo 'Nata'; else echo 'Nato';?> a <?php echo $request_data_inf['rappresentante_birthplace']?><br>il <?php echo date('d/m/Y',strtotime($request_data_inf['rappresentante_birthdate']))?>, di cittadinanza  <?php echo  $request_data_inf['rappresentante_cittadinanza']?></p>

<p class=MsoNormal style='margin-top:0in;margin-right:6.1pt;margin-bottom:0in;
margin-left:13.4pt;margin-bottom:.0001pt;line-height:110%'>residente a <?php echo $request_data_inf['rappresentante_residente_a']?></p>

<p class=MsoNormal style='margin-top:0in;margin-right:6.1pt;margin-bottom:0in;
margin-left:13.4pt;margin-bottom:.0001pt;line-height:110%'>in <?php echo $request_data_inf['rappresentante_indirizzo']?> n. <?php echo $request_data_inf['rappresentante_indirizzo_civico']?></p>


<p class=MsoNormal style='margin-top:0in;margin-right:6.1pt;margin-bottom:0in;
margin-left:13.4pt;margin-bottom:.0001pt;line-height:110%'>codice fiscale <?php echo $request_data_inf['rappresentante_cf']?> in qualità di legale rappresentante</p>

<p class=MsoNormal style='margin-top:0in;margin-right:6.1pt;margin-bottom:0in;
margin-left:13.4pt;margin-bottom:.0001pt;line-height:110%'>della società <?php echo $request_data_inf['denominazione']?></p>

<p class=MsoNormal style='margin-top:0in;margin-right:6.1pt;margin-bottom:0in;
margin-left:13.4pt;margin-bottom:.0001pt;line-height:110%'>con sede a <?php echo $request_data_inf['sede']?></p>

<p class=MsoNormal style='margin-top:0in;margin-right:6.1pt;margin-bottom:0in;
margin-left:13.4pt;margin-bottom:.0001pt;line-height:110%'>in <?php echo $request_data_inf['sede_indirizzo']?> n. <?php echo $request_data_inf['sede_civico']?></p>

<p class=MsoNormal style='margin-top:0in;margin-right:6.1pt;margin-bottom:0in;
margin-left:13.4pt;margin-bottom:.0001pt;line-height:110%;'>codice fiscale impresa <?php echo $request_data_inf['cf']?> n. REA <?php echo $request_data_inf['rea']?></p>

<p class=MsoNormal style='margin-top:0in;margin-right:6.1pt;margin-bottom:0in;
margin-left:13.4pt;margin-bottom:.0001pt;line-height:110%;'>codice attività prevalente (classificazione ATECO 2007) <?php echo $request_data_inf['codice_ateco']?></p>

<p class=MsoNormal style='margin-top:0in;margin-right:6.1pt;margin-bottom:0in;
margin-left:13.4pt;margin-bottom:.0001pt;line-height:110%;'>indirizzo PEC <?php echo $request_data_inf['pec']?></p>

<p class=MsoNormal style='margin-bottom:0in;line-height:150%;border:none'><span
lang=IT style=';line-height:150%;font-family:"Arial",sans-serif;
color:black'>&nbsp;</span></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
150%;border:none'><span lang=IT style='line-height:150%;'>&nbsp;</span></p>

<p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
line-height:150%;border:none'><span lang=IT style='line-height:150%;'>CERTIFICA</span></p>
<?php if($inf_soci['type']=='fisica'){?> 
<p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:150%;border:none'>
	<span lang=IT style='line-height:150%;'>1) che <?php if($inf_soci['sesso']=='F') echo 'la Sig.ra '; else echo 'il Sig. ';?> <b><?php echo $inf_soci['cognome'].' '.$inf_soci['nome']; ?></b> <?php if($inf_soci['sesso']=='F') echo 'nata'; else echo 'nato';?> a  <?php echo $inf_soci['nato_a']?> codice fiscale <?php echo $inf_soci['cf']?> residente in <?php echo $inf_soci['residenza_indirizzo'].' '. $inf_soci['residenza_civico'].' '.$inf_soci['residente_comune_name']?>.</span></p>
<?php } else{?>
<p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:150%;border:none'>
	<span lang=IT style='line-height:150%;'>1) che la società <b><?php echo $inf_soci['giuridica_denomincazione']?></b>, codice fiscale <?php echo $inf_soci['giuridica_cf']?> Iscritta alla Camera di Commercio di <?php echo $inf_soci['giuridica_camera']?> con sede legale in <?php echo $inf_soci['sede_indirizzo'].' '. $inf_soci['sede_civico'].' '.$inf_soci['sede_comune_name'].''?></span></p>
<?php } ?>
<p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
150%;border:none'><span lang=IT style='font-size:12.0pt;line-height:150%;
font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
150%;border:none'><span lang=IT style='line-height:150%;'>ha effettuato un investimento nella società <b><?php echo $request_data_inf['denominazione']?></b> che risulta iscritta nell'apposita sezione speciale in qualità di <?php echo $request_data_inf['company_type']?> Innovativa</span></p>


<p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
150%;border:none'><span lang=IT style='line-height:150%;'>&nbsp;</span></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
150%;border:none'><span lang=IT style='line-height:150%;'>2) che l’investimento effettuato è così dettagliato:</span></p>
<?php $tot=0;
 if(!empty($inf_soci['investement']['capital_social'])){
	//foreach($inf_soci['investement']['capital_social'] as $k=>$v){ $tot+=floatval($v['versato']);?>
<p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:100%;border:none'>
	<span lang=IT style='line-height:150%;'>- capitale sociale sottoscritto nel periodo di imposta <?php echo $inf_soci['investement']['periodo']?> per Euro <?php echo number_format(floatval($inf_soci['investement']['capital_social']),2,',','.');?></span></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify;border:none'>
	<span lang=IT style='line-height:100%;'>- capitale sociale versato nel corso del periodo di imposta  <?php echo $inf_soci['investement']['periodo']?> per Euro <?php echo number_format(floatval($inf_soci['investement']['versato']),2,',','.');?></span></p>

<?php } //}?>
<p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:100%;border:none'>
	<span lang=IT style='line-height:100%;'>- sovrapprezzo sottoscritto e contestualmente versato per un importo di Euro <?php echo number_format($inf_soci['investement']['sovrapprezzo'],2,',','.');?></span></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:150%;border:none'>
	<span lang=IT style='line-height:150%;'>Pertanto, <b>l’importo del versamento complessivo agevolabile ammonta ad Euro <?php $tot+=$inf_soci['investement']['sovrapprezzo']; echo number_format($tot,2,',','.');?></b></span></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:150%;border:none'><span lang=IT style='font-size:12.0pt;line-height:150%;
font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:150%;border:none'>
	<span lang=IT style='line-height:150%;'>3) che vengono rispettati i limiti di cui all’art. 4 comma 7 del Decreto 7 maggio 2019, in quanto</span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:56.7pt;text-align:justify;text-indent:-21.25pt;line-height:150%;border:none'><a name="_heading=h.gjdgxs"></a><span lang=IT style='line-height:150%;'>a) l'ammontare complessivo dei conferimenti in denaro ricevuti da <?php echo $request_data_inf['denominazione'];?> non è superiore ad € 15.000.000,00;</span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:56.7pt;text-align:justify;text-indent:-21.25pt;line-height:150%;border:none'><span lang=IT style='line-height:150%;'>b) non è impresa in difficoltà; </span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:56.7pt;text-align:justify;text-indent:-21.25pt;line-height:150%;border:none'><span lang=IT style='line-height:150%;'>c) l'impresa non opera nel settore delle costruzioni navali né del carbone e dell’acciaio</span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:56.7pt;text-align:justify;text-indent:-21.25pt;line-height:150%;border:none'><span lang=IT style='line-height:150%;'>d) l'impresa non ha ricevuto aiuti di Stato illeciti che non siano stati integralmente recuperati </span></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
150%;border:none'><span lang=IT style='font-size:12.0pt;line-height:150%;
font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
150%;border:none'><span lang=IT style='line-height:150%;'>Ai sensi dell’articolo 5, comma 1, lettera b. del Decreto 7 maggio 2019 si allega altresì copia del piano di investimento (business plan) di <?php echo $request_data_inf['denominazione'];?> contenente, tra l’altro, informazioni dettagliate sull'oggetto della prevista attività della medesima impresa, sui relativi prodotti, nonché sull'andamento, previsto o attuale, delle vendite e dei profitti.</span></p>

<p class=MsoNormal style='margin-bottom:0in;line-height:150%;border:none'><span
lang=IT style='font-size:12.0pt;line-height:150%;font-family:"Arial",sans-serif;
color:black'>&nbsp;</span></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
150%;border:none'><span lang=IT style='line-height:150%;'>Si raccomanda di conservare la presente comunicazione perché potrebbe esserne chiesta l’esibizione, congiuntamente al business plan, da parte dell’Agenzia delle Entrate nel corso delle normali attività di controllo formale svolte annualmente, ai sensi dell’art.36-ter del DPR 600/1973, sui dati esposti dai contribuenti nelle loro dichiarazioni dei redditi.</span></p>

<p class=MsoNormal style='margin-bottom:0in;line-height:150%;border:none'><span
lang=IT style='font-size:12.0pt;line-height:150%;font-family:"Arial",sans-serif;
color:black'>&nbsp;</span></p>

<p class=MsoNormal style='margin-bottom:0in;line-height:150%;border:none'>
	<span lang=IT style='line-height:150%;'><?php echo $request_data_inf['sede_comune_name']?>, lì <?php echo $inf_soci['investement']['data_rilascio_certificazione']?></span></p>

<p class=MsoNormal align=center style='margin-top:0in;margin-right:0in;
margin-bottom:0in;margin-left:247.8pt;text-align:center;line-height:150%;
border:none'><span lang=IT style='line-height:150%;'>Il legale rappresentante</span></p>

<p class=MsoNormal align=center style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:247.8pt;text-align:center;line-height:150%;border:none'><span lang=IT style='line-height:150%;'><?php  echo $request_data_inf['rappresentante'].' '.$request_data_inf['rappresentante_cognome']?></span></p>

<p class=MsoNormal align=center style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:247.8pt;text-align:center;line-height:150%;border:none'><span lang=IT style='font-size:12.0pt;line-height:150%;font-family:
"Arial",sans-serif;color:black'>&nbsp;</span></p>

<p class=MsoNormal align=center style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:247.8pt;text-align:center;line-height:150%;border:none'><span lang=IT style='line-height:150%;'>____________________________</span></p>

</div>

</body>

</html>
