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
        Ändern Quelle
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $absoluteUrl;?>"><i class="fa fa-dashboard"></i> <?php echo $home; ?></a></li>
        <li class=""><a href="<?php echo $absoluteUrl;?>stammdaten/quellen">Quellen</a></li>
        <li class="active"> Ändern Quelle</li>
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
		            <form role="form" class="content-form" id="addQuelleForm" data-action="update" data-source="quelle" data-source_id_value="<?php echo $quellen['quelle_id'];?>" data-source_id_name="quelle" autocomplete="off" enctype="multipart/form-data">
		            	<input type="hidden" name="quelle_id" value="<?php echo $quellen['quelle_id'];?>">
			            <div class="box-body">
			              	<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="code">Kürzel*</label><span class="error-text"></span>
										<input type="text" class="form-control" value="<?php echo $quellen['code']; ?>" id="code" name="code" autofocus required>
									</div>
									<div class="form-group">
										<label for="titel">Titel*</label><span class="error-text"></span>
										<input type="text" class="form-control" value="<?php echo $quellen['titel']; ?>" name="titel" id="titel">
									</div>
									<div class="form-group">
										<label for="sprache">Sprache*</label><span class="error-text"></span>
										<select id="sprache" class="form-control" name="sprache">
											<option value="">Sprache wählen</option>
											<option value="deutsch" <?php if($quellen['sprache'] == 'deutsch')  echo 'selected'; ?>>deutsch</option>
											<option value="englisch" <?php if($quellen['sprache'] == 'englisch')  echo 'selected'; ?>>englisch</option>
										</select>
									</div>
									<div class="form-group">
										<label for="herkunft_id">Herkunft</label>
										<select id="herkunft_id" class="form-control" name="herkunft_id">
											<option value="">Herkunft wählen</option>
											<?php foreach ($herkunfte as $key => $herkunft) { ?>
											<option value="<?php echo $herkunft['herkunft_id'];?>" <?php if($quellen['herkunft_id'] == $herkunft['herkunft_id'])  echo 'selected'; ?>><?php echo $herkunft['titel'];?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="quelle_schema_id">Schema</label>
										<select id="quelle_schema_id" class="form-control" name="quelle_schema_id">
											<option value="">Schema wählen</option>
											<?php foreach ($schemas as $key => $schema) { ?>
											<option value="<?php echo $key;?>" <?php if($quellen['quelle_schema_id'] == $key)  echo 'selected'; ?>><?php echo $schema;?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="jahr">Jahr*</label><span class="error-text"></span>
										<input type="text" class="form-control pull-right" id="jahr" name="jahr" value="<?php echo $quellen['jahr'];?>">
									</div>
									<div class="form-group">
										<label for="band">Band</label>
										<input type="text" class="form-control" id="band" name="band" value="<?php echo $quellen['band'];?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="nummer">Nummer</label>
										<input type="text" class="form-control" id="nummer" name="nummer" value="<?php echo $quellen['nummer'];?>">
									</div>
									<div class="form-group">
										<label for="auflage">Auflage*</label><span class="error-text"></span>
										<input type="text" class="form-control" id="auflage" name="auflage" value="<?php echo $quellen['auflage'];?>">
									</div>
									<div class="form-group">
										<label for="verlag_id">Verlag*</label><span class="error-text"></span>
										<select id="verlag_id" class="form-control" name="verlag_id">
											<option value="">Verlag wählen</option>
											<?php foreach ($verlage as $key => $verlag) { ?>
											<option value="<?php echo $verlag['verlag_id'];?>" <?php if($quellen['verlag_id'] == $verlag['verlag_id'])  echo 'selected'; ?>><?php echo $verlag['titel'];?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="autor_id">Autor / Herausgeber</label>
										<select id="autor_id" class="select2 form-control" multiple="multiple" data-placeholder="Select Autor / Herausgeber" name="autor_id[]">
									        <?php foreach ($autorenSelectBox as $key => $autor) { ?>
											<option value="<?php echo $autor['autor_id'];?>" <?php foreach ($autor_id_selected_values as $autor_id_selected_value) {
												if($autor_id_selected_value == $autor['autor_id']) echo 'selected';
											}?>><?php if(!empty($autor['suchname']) ) echo $autor['suchname']; else echo $autor['vorname'].' '.$autor['nachname'];  ?></option>
											<?php } ?>
									    </select>
									</div>
									<div class="form-group">
										<label>Datei ( nur PDF, DOC und DOCX Dateien sind erlaubt. )</label>
										<input name="file_url" data-max-file-size="2M" data-default-file="<?php echo $quellen['file_url'];?>" value="<?php echo $quellen['file_url'];?>" data-allowed-file-extensions="pdf doc docx" type="file" class="dropify" data-height="100" />
									</div>
								</div>
							</div>
			            </div>
			              <!-- /.box-body -->

			            <div class="box-footer">
			                <input class="btn btn-success" type="submit" value="Änderungen Speichern" name="ÄnderungenSpeichern" id="saveFormBtn">
							<a class="btn btn-default" href="<?php echo $absoluteUrl;?>stammdaten/quellen/" id="cancelBtn">Abbrechen</a>
							<a href="<?php echo $absoluteUrl;?>stammdaten/quellen/" class="pull-right btn btn-primary" style="background: #000;">Zurück</a>
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