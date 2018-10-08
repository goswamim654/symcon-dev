<?php
include '../../lang/GermanWords.php';
include '../../config/route.php';
include '../../inc/header.php';
include '../../inc/sidebar.php';
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Neu Autor/Herausgeber
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $absoluteUrl;?>"><i class="fa fa-dashboard"></i> <?php echo $home; ?></a></li>
        <li class=""> <a href="<?php echo $absoluteUrl;?>stammdaten/autoren/">Autoren</a></li>
        <li class="active"> Neu Autor/Herausgeber</li>
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
		            <form role="form" id="addAutorenForm" @submit="registerUser()">
		              <div class="box-body">
		              	<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="Titel">Titel</label>
									<select class="form-control" name="Titel" id="Titel" autofocus>
										<option value="">Select a Titel</option>
										<option value="Dr">Dr.</option>
										<option value="Mr.">Mr.</option>
										<option value="Mrs.">Mrs.</option>
									</select>
								</div>
								<div class="form-group">
									<label for="Vorname">Vorname</label>
									<input type="text" class="form-control" name="Vorname" id="Vorname">
								</div>
								<div class="form-group">
									<label for="Nachname">Nachname*</label><span class="error-text"></span>
									<input type="text" class="form-control" id="Nachname" name="Nachname" required>
								</div>
								<div class="form-group">
									<label for="Suchname">Suchname</label>
									<input type="text" class="form-control" name="Suchname" id="Suchname">
								</div>
								<div class="form-group">
									<label for="Geburtsjahr">Geburtsjahr/ datum</label>
									<input type="text" class="form-control" name="Geburtsjahr" id="Geburtsjahr" data-mask="99/99/9999">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="Todesjahr">Todesjahr/ datum</label>
									<input type="text" class="form-control" name="Todesjahr" id="Todesjahr" data-mask="99/99/9999">
								</div>
								<div class="form-group">
									<label for="Kommentar">Kommentar</label>
									<textarea id="Kommentar" name="Kommentar" :bind="autor.Kommentar" class="form-control texteditor" aria-hidden="true"></textarea>
								</div>
							</div>
						</div>
		              </div>
		              <!-- /.box-body -->

		              <div class="box-footer">
		                <button class="btn btn-success" type="submit" id="saveFormBtn">Speichern</button>
						<button class="btn btn-default" type="button" id="cancelBtn">Abbrechen</button>
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