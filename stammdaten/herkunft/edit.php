<?php
include '../../lang/GermanWords.php';
include '../../config/route.php';
include '../../api/herkunft.php';
include '../../inc/header.php';
include '../../inc/sidebar.php';
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Ändern Herkunft
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $absoluteUrl;?>"><i class="fa fa-dashboard"></i> <?php echo $home; ?></a></li>
        <li class=""> <a href="<?php echo $absoluteUrl;?>stammdaten/herkunft/"> Herkunft</a></li>
        <li class="active">  Ändern Herkunft</li>
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
		            <form role="form" class="content-form" id="addHerkunftForm" data-action="update" data-source="herkunft" data-source_id_value="<?php echo $herkunft['herkunft_id'];?>" data-source_id_name="herkunft" autocomplete="off">
		              <div class="box-body">
		              	<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="code">Code*</label><span class="error-text"></span>
									<input type="text" class="form-control" id="code" name="code" value="<?php echo $herkunft['code']; ?>" required autofocus>
								</div>
								<div class="form-group">
									<label for="titel">Titel*</label><span class="error-text"></span>
									<input type="text" class="form-control" id="titel" name="titel" value="<?php echo $herkunft['titel']; ?>" required>
								</div>
							</div>
						</div>
		              </div>
		              <!-- /.box-body -->

		              <div class="box-footer">
		                <input class="btn btn-success" type="submit" value="Änderungen Speichern" name="ÄnderungenSpeichern" id="saveFormBtn">
						<a class="btn btn-default" href="<?php echo $absoluteUrl;?>stammdaten/herkunft/" id="cancelBtn">Abbrechen</a>
						<a href="<?php echo $absoluteUrl;?>stammdaten/herkunft/" class="pull-right btn btn-primary" style="background: #000;">Zurück</a>
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