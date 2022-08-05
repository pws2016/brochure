
<div class="alert alert-danger" role="alert" id="soci_investment_error_alert" style="display:none"></div>
 <input type="hidden" name="type_plan" value="<?php echo $type_plan?>">
 
 <div class="row">
	<div class="col-lg-6">
		<div class="mb-3">
			<label for="verticalnav-firstname-input">Inserisci la data di rilascio della certificazione </label>
			<input type="text" class="form-control input-mask" id="data_rilascio_certificazione" name="data_rilascio_certificazione"  value="<?php echo $investement['data_rilascio_certificazione']?>" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" im-insert="false"  data-parsley-pattern="^[0-9]{2}/[0-9]{2}/[0-9]{4}$"  data-date-format="DD/MM/YYYY" >
		</div>
	</div>
</div>
<div class="row">  
	<h5 class="my-0 text-primary">Inserisci i dati dell'investimento effettuato</h5>
</div>
<hr>
<div class="row mt-4">  
	<div class="col-lg-12" id="">
		<div class="mb-1">
			 <label for="verticalnav-address-input">Tipologia di detrazione di cui si intende usufruire per l'investimento effettuato</label>
		</div>
		<?php 
			
		?>
			<div class="form-check form-check-inline">
				  <input class="form-check-input tipologia_di_detrazione" name="tipologia_di_detrazione" type="radio" id="inlineCheckbox30" value="30" <?php if($tipologia_di_detrazione=='30' || $tipologia_di_detrazione=='') echo 'checked'?>>
				  <label class="form-check-label" for="inlineCheckbox30"><?php if($inf_soci['type']=='giuridica') echo 'deduzione'; else echo 'detrazione'?> del 30%</label>
			</div>
			<div class="form-check form-check-inline">
				  <input class="form-check-input tipologia_di_detrazione"  name="tipologia_di_detrazione" type="radio" id="inlineCheckbox50" value="50" <?php if($tipologia_di_detrazione=='50') echo 'checked'?>  <?php if($inf_soci['type']=='giuridica') echo 'disabled'; ?>>
				  <label class="form-check-label" for="inlineCheckbox50"><?php if($inf_soci['type']=='giuridica') echo 'detrazione'; else echo 'detrazione'?> del 50%</label>
			</div>
			
			<div class="form-check form-check-inline">
				  <input class="form-check-input tipologia_di_detrazione tipologia_di_detrazione_50_30"  name="tipologia_di_detrazione" type="radio" id="inlineCheckbox5030" value="5030" <?php if($tipologia_di_detrazione=='5030') echo 'checked'?>  <?php if($company_type=='startup' || $inf_soci['type']=='giuridica') echo 'disabled'; ?>>
				  <label class="form-check-label" for="inlineCheckbox5030"><?php if($inf_soci['type']=='giuridica') echo 'detrazione'; else echo 'detrazione'?> del 50% e in parte del 30% (solo per investimenti in PMI Innovative)</label>
			</div>
	</div>
</div>
<div class="row mt-2" id="soci_pec" style="display:<?php if($tipologia_di_detrazione=='50' || $tipologia_di_detrazione=='5030') echo 'block'; else echo 'none'?>">
<div class="form-group col-md-6">
			<label><?php echo lang('app.field_pec')?></label>
			<?php  $val=""; if(isset($investement)) $val=$investement['pec']; 
			
					$input = [
							'type'  => 'text',
							'name'  => 'pec',
							'id'    => 'pec',	
'data-parsley-type'=>"email",							
							'class' => 'form-control',
							'value' => $val
					];

					echo form_input($input);
					?>
		  
		</div>
</div>
<div id="div_tipologia_di_detrazione_30" style="display:<?php if($tipologia_di_detrazione!='50') echo 'bloc'; else echo 'none'?>">
	<div class="row mt-4">
		<h5 style="color:#FF7700!important;"><?php if($inf_soci['type']=='giuridica') echo 'deduzione'; else echo 'detrazione'?> del 30%</h5>
	</div>
	<div  class="row">
		<h6>Capitale sociale</h6>
	</div>
	<div  class="row">
	
		<table class="table table-borderless capital_social_repeater">
			<thead>
				<tr style="background:#f3f3f3;">
					<th>periodo di imposta</th>
					<th>capitale sociale sottoscritto</th>
					<th>capitale sociale versato</th>
				
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody data-repeater-list="capital_social">
			<?php $tot=0; if(empty($investement['capital_social'])){?>
				<tr data-repeater-item>
					
						<td><input type="number" min="0" step="1" id="costi" name="periodo" class="form-control" value="<?php echo date('Y')?>" data-parsley-validate-if-empty="true" data-parsley-type="number" /></td>
						<td><input type="number" min="0" step="0.01" id="costi" name="sottoscritto" class="form-control" value="0" data-parsley-validate-if-empty="true" data-parsley-type="number" /></td>
						<td><input type="number" min="0" step="0.01" id="costi" name="versato" class="form-control capital_social_versato" value="0" data-parsley-validate-if-empty="true" data-parsley-type="number" onchange="calculInvestment();"/></td>
						
						<td><button data-repeater-delete type="button" class="btn btn-sm btn-danger " ><i class="fas fa-trash"></i></button></td>
					</tr>
			<?php } else {
				//foreach($investement['capital_social'] as $k=>$v){
					//$tot+=$v['versato'];?>
				<tr data-repeater-item>
					
						<td><input type="number" min="0" step="1" id="costi" name="periodo" class="form-control" value="<?php echo $investement['periodo']?>" data-parsley-validate-if-empty="true" data-parsley-type="number" /></td>
						<td><input type="number" min="0" step="0.01" id="costi" name="sottoscritto" class="form-control" value="<?php echo $investement['capital_social']?>" data-parsley-validate-if-empty="true" data-parsley-type="number" /></td>
						<td><input type="number" min="0" step="0.01" id="costi" name="versato" class="form-control capital_social_versato" value="<?php echo $investement['versato']?>" data-parsley-validate-if-empty="true" data-parsley-type="number" onchange="calculInvestment();"/></td>
						
						<td><!--button data-repeater-delete type="button" class="btn btn-sm btn-danger " ><i class="fas fa-trash"></i></button--></td>
					</tr>
			<?php } //}?>
			</tbody>
			<!--tfoot>
				<tr >
					<td colspan="3" align="center"><input data-repeater-create type="button" class="btn btn-primary mt-3 mt-lg-0" value="<?php echo lang('app.btn_add_row')?>"/></td>
				</tr>
			</tfoot-->
		</table>

	</div>
	<div  class="row">
		<h6>Sovrapprezzo</h6>
	</div>
	<div  class="row">
		<div class="form-group col-md-12">
			<label>importo del sovrapprezzo sottoscritto e versato nel periodo di imposta di riferimento della certificazione</label>
			<?php  $val=0; if(isset($investement)) $val=$investement['sovrapprezzo']; 
			
					$input = [
							'type'  => 'number',
							'step'=>0.01,
							'name'  => 'sovrapprezzo',
							'id'    => 'sovrapprezzo',
							
							'class' => 'form-control capital_social_versato',
							'value' => $val
							
					];

					echo form_input($input);
					?>
		  
		</div>
	</div>
	<div class="row">
	<b>Importo del versamento complessivo agevolabile: <span id="versamento_complessivo"><?php echo $investement['sovrapprezzo']+$tot?></span></b>
	</div>
</div> <!-- end div div_tipologia_di_detrazione_30 -->
<hr>
<div id="div_tipologia_di_detrazione_50" style="display:<?php if($tipologia_di_detrazione!='30' && $tipologia_di_detrazione!='') echo 'bloc'; else echo 'none'?>">
	<div class="row mt-4"><h5 style="color:#FF7700!important;"><?php if($inf_soci['type']=='giuridica') echo 'deduzione'; else echo 'detrazione'?> del 50%</h5></div>
	<div  class="row">
		<div class="form-group col-md-6">
			<label>Indica l'importo dell'investimento (in cifre) </label>
			<?php  $val=""; if(isset($investement)) $val=$investement['importo_investimento'];
			
					$input = [
							'type'  => 'number',
							'step'=>0.01,
							'name'  => 'importo_investimento',
							'id'    => 'importo_investimento',
							
							
							'class' => 'form-control',
							'onchange'=>"calc_detrazione_fiscale(this.value)",
							'value' => $val
					];

					echo form_input($input);
					?>
		  
		</div>
		<div class="form-group col-md-6">
			<label>Indica l'importo dell'investimento (in lettere) </label>
			<?php  $val=""; if(isset($investement)) $val=$investement['importo_investimento_lettere'];
			
					$input = [
							'type'  => 'text',
							'name'  => 'importo_investimento_lettere',
							'id'    => 'importo_investimento_lettere',
							
							'class' => 'form-control ',
							'value' => $val
					];

					echo form_input($input);
					?>
		  
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-6">
			<label>data di effettuazione dell'investimento</label>
			<?php  $val=""; if(isset($investement) ) $val=$investement['data_effet_invest'];?>
			<input id="input-date1" value="<?php echo $val?>" name="data_effet_invest" class="form-control input-mask" data-parsley-pattern="^[0-9]{2}/[0-9]{2}/[0-9]{4}$"  data-date-format="DD/MM/YYYY" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" im-insert="false">
		</div>
		<div class="form-group col-md-6">
			<label>Data presentazione istanza piattaforma </label>
			<?php  $val=""; if(isset($investement) ) $val=$investement['data_istanza'];?>
			<input id="input-date1" value="<?php echo $val?>" name="data_istanza" class="form-control input-mask" data-parsley-pattern="^[0-9]{2}/[0-9]{2}/[0-9]{4}$"  data-date-format="DD/MM/YYYY" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" im-insert="false">
		</div>
		<div class="form-group col-md-12">
			<label>data in cui è stato ottenuto il codice di Concessione RNA/COR</label>
			<?php  $val=""; if(isset($investement) ) $val=$investement['data_rna'];?>
			<input id="input-date1" value="<?php echo $val?>" name="data_rna" class="form-control input-mask" data-parsley-pattern="^[0-9]{2}/[0-9]{2}/[0-9]{4}$"  data-date-format="DD/MM/YYYY" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" im-insert="false">
		</div>
	</div>
	<div class="row">
	
		<div class="form-group col-md-6">
			<label>detrazione fiscale spettante</label>
			<?php  $val=""; if(isset($investement)) $val=$investement['detrazione_fiscale'];
			
					$input = [
							'type'  => 'number',
							'step'=>0.01,
							'name'  => 'detrazione_fiscale',
							'id'    => 'detrazione_fiscale',
							
							'class' => 'form-control ',
							'value' => $val
					];

					echo form_input($input);
					?>
		  
		</div>
		<div class="form-group col-md-6">
			<label>detrazione fiscale spettante (in lettere) </label>
			<?php  $val=""; if(isset($investement)) $val=$investement['detrazione_fiscale_lettere'];
			
					$input = [
							'type'  => 'text',
							'name'  => 'detrazione_fiscale_lettere',
							'id'    => 'detrazione_fiscale_lettere',
							
							'class' => 'form-control ',
							'value' => $val
					];

					echo form_input($input);
					?>
		  
		</div>
	</div>
</div> <!-- end div div_tipologia_di_detrazione_50 -->
<div class="mt-3" id="checks_tipologia_di_detrazione_50" style="display:<?php if($tipologia_di_detrazione!='30' && $tipologia_di_detrazione!='') echo 'bloc'; else echo 'none'?>">
<div class="row">
<h5>Al fine del rilascio della certificazione dichiaro</h5>
<p><?php if($request_data_inf['company_type']=='startup'){?>
che la società è in possesso dei requisiti di <b>startup innovativa</b> ed è regolarmente iscritta nella apposita sezione speciale del Registro Imprese
<?php } else{?>
che la società è in possesso dei requisiti di <b>PMI innovativa</b> ed è regolarmente iscritta nella apposita sezione speciale del Registro Imprese
<?php } ?>
</p>
</div>

	<div class="form-check mb-3">
		<input class="form-check-input" type="checkbox" id="formCheck21" name="Check21" disabled checked>
		<label class="form-check-label" for="formCheck21">
			di essre a conoscenza del fatto che l’importo della detrazione fiscale ha concorso ai fini del calcolo dell’ammontare complessivo di euro 200.000 (duecentomila/00) di aiuti concessi a titolo «de minimis» alla su indicata società, ai sensi del Regolamento (UE) n. 1407/2013 della Commissione del 18 dicembre 2013;
		</label>
	</div>
	
	<div class="form-check mb-3">
		<input class="form-check-input" type="radio" id="formCheck261" name="Check261" value="1" <?php if(!isset($investement) || $investement['Check261']=='1') echo 'checked'?>>
		<label class="form-check-label" for="formCheck261">
		che la società non presenta relazioni con altre imprese tali da configurare l’appartenenza ad una medesima “impresa unica”
		</label>
	</div>
	<div class="form-check mb-3">
		<input class="form-check-input" type="radio" id="formCheck262" name="Check261" value="2" <?php if(isset($investement) && $investement['Check261']=='2') echo 'checked'?>>
		<label class="form-check-label" for="formCheck262">
			che la società presenta relazioni con le imprese indicate nel prospetto nell’allegato “Dichiarazione de minimis” tali da configurare l’appartenenza ad una medesima “impresa unica”.
		</label>
	</div>
	<div class="form-check mb-3">
		<input class="form-check-input" type="checkbox" id="formCheck22" name="Check22" disabled checked>
		<label class="form-check-label" for="formCheck22">
			di aver letto integralmente il D.M.;
		</label>
	</div>
	<div class="form-check mb-3">
		<input class="form-check-input" type="checkbox" id="formCheck23" name="Check23" disabled checked>
		<label class="form-check-label" for="formCheck23">
			di essere consapevole delle responsabilità, anche penali, derivanti dal rilascio di dichiarazioni mendaci, ai sensi degli articoli 75 e 76 del DPR 28 dicembre 2000, n. 445;
		</label>
	</div>
	<div class="form-check mb-3">
		<input class="form-check-input" type="checkbox" id="formCheck24" name="Check24" disabled checked>
		<label class="form-check-label" for="formCheck24">
			di essere informato/a, ai sensi del D.Lgs. n. 196/2003 (Codice in materia di protezione dei dati personali) che i dati personali raccolti saranno trattati esclusivamente nell’ambito del procedimento per il quale la presente dichiarazione viene resa;
		</label>
	</div>
	<div class="form-check mb-3">
		<input class="form-check-input" type="checkbox" id="formCheck25"  name="Check25" <?php if(isset($investement) && $investement['Check25']==true) echo 'checked'?>>
		<label class="form-check-label" for="formCheck25">
		di impegnarmi a comunicare tempestivamente eventuali variazioni dei dati comunicati ai sensi dell’art 5, comma 9.
		</label>
	</div>
</div> <!-- end div checks_tipologia_di_detrazione_50 -->
<div class="mt-3" id="checks_tipologia_di_detrazione_30" style="display:<?php if($tipologia_di_detrazione!='50') echo 'bloc'; else echo 'none'?>">
<div class="row">
<h5>che vengono rispettati i limiti di cui all’art. 4 comma 7 del Decreto 7 maggio 2019, in quanto</h5>
</div>
	<div class="form-check mb-3">
		<input class="form-check-input" type="checkbox" id="formCheck1" name="Check1" disabled checked>
		<label class="form-check-label" for="formCheck1">
			l'ammontare complessivo dei conferimenti in danaro ricevuti  non è superiore ad € 15.000.000,00.
		</label>
	</div>
	<div class="form-check mb-3">
		<input class="form-check-input" type="checkbox" id="formCheck2"  name="Check2" disabled checked>
		<label class="form-check-label" for="formCheck2">
			 non è impresa in difficoltà; 
		</label>
	</div>
	<div class="form-check mb-3">
		<input class="form-check-input" type="checkbox" id="formCheck3"  name="Check3" disabled checked>
		<label class="form-check-label" for="formCheck3">
			non opera nel settore delle costruzioni navali né del carbone e dell’acciaio
		</label>
	</div>
	<div class="form-check mb-3">
		<input class="form-check-input" type="checkbox" id="formCheck4"  name="Check4" disabled checked>
		<label class="form-check-label" for="formCheck4">
			 non ha ricevuto aiuti di Stato illeciti che non siano stati integralmente recuperati 
		</label>
	</div>
</div>
  <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/inputmask/min/jquery.inputmask.bundle.min.js"></script>

        <!-- form mask init -->
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/pages/form-mask.init.js"></script>
<script>
$(document).ready(function () {
    'use strict';
$(".tipologia_di_detrazione").on('click',function(){ 
		var v=$(this).val();
		$("#div_tipologia_di_detrazione_30").hide(0);
		$("#div_tipologia_di_detrazione_50").hide(0);
		$("#checks_tipologia_di_detrazione_30").hide(0);
		$("#checks_tipologia_di_detrazione_50").hide(0);
		$("#soci_pec").hide(0);
		if(v=='30'){
			$("#div_tipologia_di_detrazione_30").show('slow');
			$("#checks_tipologia_di_detrazione_30").show('slow');
		}
		if(v=='50'){
			$("#div_tipologia_di_detrazione_50").show('slow');
			$("#checks_tipologia_di_detrazione_50").show('slow');
			$("#soci_pec").show(0);
		}
		if(v=='5030'){
			$("#div_tipologia_di_detrazione_30").show('slow');
			$("#div_tipologia_di_detrazione_50").show('slow');
			$("#checks_tipologia_di_detrazione_30").show('slow');
			$("#checks_tipologia_di_detrazione_50").show('slow');
			$("#soci_pec").show(0);
		}
	});
	$('.capital_social_repeater').repeater({
		isFirstItemUndeletable :true,
        defaultValues: {
            'textarea-input': 'foo',
            'text-input': 'bar',
            'select-input': 'B',
            'checkbox-input': ['A', 'B'],
            'radio-input': 'B'
        },
        show: function () {
            $(this).slideDown();
        },
        hide: function (deleteElement) { 
            if(confirm('Are you sure you want to delete this element?')) {
                $(this).slideUp(deleteElement);
				calculInvestment();
            }
			
        },
        ready: function (setIndexes) {
			
        }
    });
	$(".capital_social_versato").on('change',function(){
		calculInvestment();
	});
	
	
});	   
		   function calculInvestment(){
			   var total_versamento_complessivo=0;
		$(".capital_social_versato").each(function( index ) {
			var v=$(this).val();
			
			if(isNaN(v)) v=0;
		//	alert(parseFloat(v));
			total_versamento_complessivo=total_versamento_complessivo+parseFloat(v);
		});
		
		
		$("#versamento_complessivo").text(parseFloat(total_versamento_complessivo).toFixed(2));
		   }
		   
		   var intervalId = window.setInterval(function(){
  calculInvestment()
}, 1000);

function calc_detrazione_fiscale(v){
	var x=parseFloat(v)/2;
	$("#detrazione_fiscale").val(x);
}

</script>