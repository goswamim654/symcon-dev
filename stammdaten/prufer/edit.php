<?php
include '../../lang/GermanWords.php';
include '../../config/route.php';
include '../../api/pruefer.php';
include '../../inc/header.php';
include '../../inc/sidebar.php';
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ändern Prüfer
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $absoluteUrl;?>"><i class="fa fa-dashboard"></i> <?php echo $home; ?></a></li>
        <li class=""> <a href="<?php echo $absoluteUrl;?>stammdaten/pruefer/">Prüfer</a></li>
        <li class="active"> Ändern Prüfer</li>
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
		            <form id="addAutorenForm" class="content-form" data-action="update" data-source="pruefer" data-source_id_value="<?php echo $pruefer['pruefer_id'];?>" data-source_id_name="pruefer" autocomplete="off">
		              <div class="box-body">
		              	<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="titel">Titel</label>
									<select class="form-control" name="titel" id="titel" autofocus>
										<option value="">Titel wählen</option>
										<?php foreach ($autorTitels as $key => $autorTitel) { ?>
										<option value="<?php echo $autorTitel;?>" <?php echo ($pruefer['titel'] == $autorTitel ? 'selected' : ''); ?>><?php echo $autorTitel;?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="vorname">Vorname</label>
									<input type="text" class="form-control" value="<?php echo $pruefer['vorname']; ?>" name="vorname" id="vorname">
								</div>
								<div class="form-group">
									<label for="nachname">Nachname*</label><span class="error-text"></span>
									<input type="text" class="form-control" id="nachname" name="nachname" value="<?php echo $pruefer['nachname']; ?>" required>
								</div>
								<div class="form-group">
									<label for="suchname">Suchname</label>
									<input type="text" class="form-control" name="suchname" id="suchname" value="<?php echo $pruefer['suchname']; ?>">
								</div>
								<div class="form-group">
									<label for="kuerzel">Kürzel (mehrere mit "|" trennen!)</label>
									<input type="text" class="form-control"  name="kuerzel" value="<?php echo $pruefer['kuerzel']; ?>" id="kuerzel">
								</div>
								<div class="form-group">
									<label for="geburtsjahr">Geburtsjahr/ datum</label>
									<input type="text" class="form-control" name="geburtsdatum" id="geburtsjahr" data-mask="99/99/9999" value="<?php echo $pruefer['geburtsdatum']; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="todesjahr">Todesjahr/ datum</label>
									<input type="text" class="form-control" name="sterbedatum" id="todesjahr" data-mask="99/99/9999" value="<?php echo $pruefer['sterbedatum']; ?>">
								</div>
								<div class="form-group">
									<label for="kommentar">Kommentar</label>
									<textarea id="kommentar" name="kommentar" class="form-control texteditor" aria-hidden="true"><?php echo $pruefer['kommentar']; ?></textarea>
								</div>
							</div>
						</div>
		              </div>
		              <!-- /.box-body -->

		              <div class="box-footer">
		              		<input class="btn btn-success" type="submit" value="Änderungen Speichern" name="ÄnderungenSpeichern" id="saveFormBtn">
							<a class="btn btn-default" href="<?php echo $absoluteUrl;?>stammdaten/prufer/" id="cancelBtn">Abbrechen</a>
							<a href="<?php echo $absoluteUrl;?>stammdaten/prufer/" class="pull-right btn btn-primary" style="background: #000;">Zurück</a>
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