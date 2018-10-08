<?php
include '../../lang/GermanWords.php';
include '../../config/route.php';
include '../../api/mainCall.php';
$autor_id = $_GET['autor'];
$autorTitelsUrl = $baseURL.'autor/titels';
$get_data = callAPI('GET',$autorTitelsUrl , false);
$response = json_decode($get_data, true);
$autorTitels = $response['content']['data'];
// print_r($autorTitels);
// die();
$autorEditUrl = $baseURL.'autor/view?autorId='.$autor_id;
$get_data = callAPI('GET',$autorEditUrl , false);
$response = json_decode($get_data, true);
$status = $response['status'];
$autoren = $response['content']['data'];
// print_r($autoren);
// die();
include '../../inc/header.php';
include '../../inc/sidebar.php';
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ändern Autor/Herausgeber
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $absoluteUrl;?>"><i class="fa fa-dashboard"></i> <?php echo $home; ?></a></li>
        <li class=""> <a href="<?php echo $absoluteUrl;?>stammdaten/autoren/">Autoren</a></li>
        <li class="active"> Ändern Autor/Herausgeber</li>
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
		            <form role="form" id="addAutorenForm">
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
									<input type="text" class="form-control" value="<?php echo $autoren['Vorname']; ?>" name="Vorname" id="Vorname">
								</div>
								<div class="form-group">
									<label for="Nachname">Nachname*</label><span class="error-text"></span>
									<input type="text" class="form-control" id="Nachname" name="Nachname" value="<?php echo $autoren['Nachname']; ?>" required>
								</div>
								<div class="form-group">
									<label for="Suchname">Suchname</label>
									<input type="text" class="form-control" name="Suchname" id="Suchname" value="<?php echo $autoren['Suchname']; ?>">
								</div>
								<div class="form-group">
									<label for="Geburtsjahr">Geburtsjahr/ datum</label>
									<input type="text" class="form-control" name="Geburtsjahr" id="Geburtsjahr" data-mask="99/99/9999" value="<?php echo $autoren['Geburtsdatum']; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="Todesjahr">Todesjahr/ datum</label>
									<input type="text" class="form-control" name="Todesjahr" id="Todesjahr" data-mask="99/99/9999" value="<?php echo $autoren['Sterbedatum']; ?>">
								</div>
								<div class="form-group">
									<label for="Kommentar">Kommentar</label>
									<textarea id="Kommentar" name="Kommentar" class="form-control texteditor" aria-hidden="true"><?php echo $autoren['Kommentar']; ?></textarea>
								</div>
							</div>
						</div>
		              </div>
		              <!-- /.box-body -->

		              <div class="box-footer">
		                <button class="btn btn-success" type="submit" id="saveFormBtn">Änderungen Speichern</button>
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