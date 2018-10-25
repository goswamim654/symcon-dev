<?php
include '../../lang/GermanWords.php';
include '../../config/route.php';
include '../../api/quellen.php';
include '../../inc/header.php';
include '../../inc/sidebar.php';

?>
<style type="text/css">
	.ui-datepicker-calendar {
	   display: none;
	}
	.ui-datepicker-month {
	   display: none;
	}
	.ui-datepicker-prev{
	   display: none;
	}
	.ui-datepicker-next{
	   display: none;
	}
	.ui-datepicker .ui-datepicker-buttonpane button {
		width: 100%;
		float: none;
	}
	.ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current {
		display: none;
	}
</style>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Neu Quelle
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $absoluteUrl;?>"><i class="fa fa-dashboard"></i> <?php echo $home; ?></a></li>
        <li class=""><a href="<?php echo $absoluteUrl;?>stammdaten/quellen">Quellen</a></li>
        <li class="active"> Neu Quelle</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <p>Die mit * gekennzeichneten Felder sind Pflichtfelder</p>
		            </div>
		            <!-- /.box-header -->
		            <!-- form start -->
		            <form role="form" class="content-form" id="addQuelleForm" autocomplete="off" data-action="add" data-source="quelle" enctype="multipart/form-data">
		              	<div class="box-body">
			              	<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="code">Kürzel*</label><span class="error-text"></span>
										<input type="text" class="form-control" value="<?php if(isset($code)) echo $code;?>" id="code" name="code" autofocus required>
									</div>
									<div class="form-group">
										<label for="titel">Titel*</label><span class="error-text"></span>
										<input type="text" class="form-control" value="<?php if(isset($titel)) echo $titel;?>" name="titel" id="titel">
									</div>
									<div class="form-group">
										<label for="sprache">Sprache*</label><span class="error-text"></span>
										<select id="sprache" class="form-control" name="sprache">
											<option value="">Sprache wählen</option>
											<option value="deutsch">deutsch</option>
											<option value="englisch">englisch</option>
										</select>
									</div>
									<div class="form-group">
										<label for="herkunft_id">Herkunft</label>
										<select id="herkunft_id" class="form-control" name="herkunft_id">
											<option value="">Herkunft wählen</option>
											<?php foreach ($herkunfte as $key => $herkunft) { ?>
											<option value="<?php echo $herkunft['herkunft_id'];?>"><?php echo $herkunft['titel'];?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="quelle_schema_id">Schema</label>
										<select id="quelle_schema_id" class="form-control" name="quelle_schema_id">
											<option value="">Schema wählen</option>
											<?php foreach ($schemas as $key => $schema) { ?>
											<option value="<?php echo $key;?>"><?php echo $schema;?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="jahr">Jahr*</label><span class="error-text"></span>
										<input type="text" class="form-control pull-right" id="jahr" name="jahr" value="<?php if(isset($jahr)) echo $jahr;?>">
									</div>
									<div class="form-group">
										<label for="band">Band</label>
										<input type="text" class="form-control" id="band" name="band" value="<?php if(isset($band)) echo $band;?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="nummer">Nummer</label>
										<input type="text" class="form-control" id="nummer" name="nummer" value="<?php if(isset($nummer)) echo $nummer;?>">
									</div>
									<div class="form-group">
										<label for="auflage">Auflage*</label><span class="error-text"></span>
										<input type="text" class="form-control" id="auflage" name="auflage" value="<?php if(isset($auflage)) echo $auflage;?>">
									</div>
									<div class="form-group">
										<label for="verlag_id">Verlag*</label><span class="error-text"></span>
										<select id="verlag_id" class="form-control" name="verlag_id">
											<option value="">Verlag wählen</option>
											<?php foreach ($verlage as $key => $verlag) { ?>
											<option value="<?php echo $verlag['verlag_id'];?>"><?php echo $verlag['titel'];?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="autor_id">Autor / Herausgeber</label>
										<select id="autor_id" class="select2 form-control" multiple="multiple" data-placeholder="Select Autor / Herausgeber" name="autor_id[]">
									        <?php foreach ($autorenSelectBox as $key => $autor) { ?>
											<option value="<?php echo $autor['autor_id'];?>"><?php if(!empty($autor['suchname']) ) echo $autor['suchname']; else echo $autor['vorname'].' '.$autor['nachname'];  ?></option>
											<?php } ?>
									    </select>
									</div>
									<div class="form-group">
										<label>Datei ( nur PDF, DOC und DOCX Dateien sind erlaubt. )</label>
										<input type="file" data-allowed-file-extensions="pdf doc docx" name="file_url" class="dropify" data-height="100"/>
									</div>
								</div>
							</div>
		              	</div>
		              	<!-- /.box-body -->

		              	<div class="box-footer">
		               		<input class="btn btn-success" type="submit" value="Speichern" name="Speichern" id="saveFormBtn">
							<a class="btn btn-default" href="<?php echo $absoluteUrl;?>stammdaten/quellen/" id="cancelBtn">Abbrechen</a>
							<button type="reset" id="reset" class="sr-only"></button>
		              	</div>
		            </form>
		          </div>
			</div>
		</div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include '../../inc/footer.php';
?>