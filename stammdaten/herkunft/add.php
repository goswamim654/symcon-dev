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
        Neue Herkunft
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $absoluteUrl;?>"><i class="fa fa-dashboard"></i> <?php echo $home; ?></a></li>
        <li class=""> <a href="<?php echo $absoluteUrl;?>stammdaten/herkunft/">Herkunft</a></li>
        <li class="active"> Neue Herkunft</li>
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
		            <form class="content-form" id="addHerkunftForm" data-action="add" data-source="herkunft">
		              <div class="box-body">
		              	<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="code">Code*</label><span class="error-text"></span>
									<input type="text" class="form-control" id="code" name="code" value="<?php if(isset($code)) echo $code;?>" required autofocus>
								</div>
								<div class="form-group">
									<label for="titel">Titel*</label><span class="error-text"></span>
									<input type="text" class="form-control" id="titel" name="titel" value="<?php if(isset($titel)) echo $titel;?>" required>
								</div>
							</div>
						</div>
		              </div>
		              <!-- /.box-body -->

		              <div class="box-footer">
		                <input class="btn btn-success" type="submit" value="Speichern" name="Speichern" id="saveFormBtn">
						<a class="btn btn-default" href="<?php echo $absoluteUrl;?>stammdaten/herkunft/" id="cancelBtn">Abbrechen</a>
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