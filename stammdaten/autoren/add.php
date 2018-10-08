<?php
include '../../lang/GermanWords.php';
include '../../config/route.php';
include '../../api/mainCall.php';
include '../../api/autoren.php';
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
		            <form role="form" id="addAutorenForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		              <div class="box-body">
		              	<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="Titel">Titel</label>
									<select class="form-control" name="Titel" id="Titel" autofocus>
										<option value="">Select a Titel</option>
										<?php foreach ($autorTitels as $key => $autorTitel) { ?>
										<option value="Dr"><?php echo $autorTitel;?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="Vorname">Vorname</label>
									<input type="text" class="form-control" name="Vorname" value="<?php if(isset($_POST['Vorname'])) echo $_POST['Vorname'];?>" id="Vorname">
								</div>
								<div class="form-group">
									<label for="Nachname">Nachname*</label><span class="error-text"></span>
									<input type="text" class="form-control" id="Nachname" name="Nachname" value="<?php if(isset($_POST['Nachname'])) echo $_POST['Nachname'];?>" required>
								</div>
								<div class="form-group">
									<label for="Suchname">Suchname</label>
									<input type="text" class="form-control"  name="Suchname" value="<?php if(isset($_POST['Suchname'])) echo $_POST['Suchname'];?>" id="Suchname">
								</div>
								<div class="form-group">
									<label for="Geburtsjahr">Geburtsjahr/ datum</label>
									<input type="text" class="form-control" name="Geburtsjahr" value="<?php if(isset($_POST['Geburtsjahr'])) echo $_POST['Geburtsjahr'];?>" id="Geburtsjahr" data-mask="99/99/9999">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="Todesjahr">Todesjahr/ datum</label>
									<input type="text" class="form-control" name="Todesjahr" value="<?php if(isset($_POST['Todesjahr'])) echo $_POST['Todesjahr'];?>" id="Todesjahr" data-mask="99/99/9999">
								</div>
								<div class="form-group">
									<label for="Kommentar">Kommentar</label>
									<textarea id="Kommentar" name="Kommentar" value="<?php if(isset($_POST['Kommentar'])) echo $_POST['Kommentar'];?>" class="form-control texteditor" aria-hidden="true"></textarea>
								</div>
							</div>
						</div>
		              </div>
		              <!-- /.box-body -->

		              <div class="box-footer">
		                <input class="btn btn-success" type="submit" value="Speichern" name="Speichern" id="saveFormBtn">
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