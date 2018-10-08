<?php
include '../../lang/GermanWords.php';
include '../../config/route.php';
include '../../lang/GermanWords.php';
include '../../inc/header.php';
include '../../inc/sidebar.php';
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Neu Zeitschrift
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $absoluteUrl;?>"><i class="fa fa-dashboard"></i> <?php echo $home; ?></a></li>
        <li class=""> <a href="<?php echo $absoluteUrl;?>stammdaten/zeitschriften">Zeitschriften</a></li>
        <li class="active"> Neu Zeitschrift</li>
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
		            <form role="form" id="addZeitschriftForm">
		              <div class="box-body">
		              	<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="Herkunft">Herkunft</label>
									<select id="Herkunft" class="form-control" autofocus>
										<option value="">Herkunft wählen</option>
										<option value="294">deutsch</option>
										<option value="295">englisch</option>
									</select>
								</div>
								<div class="form-group">
									<label for="Kürzel">Kürzel*</label><span class="error-text"></span>
									<input type="text" class="form-control" id="Kürzel" name="code" required>
								</div>
								<div class="form-group">
									<label for="Titel">Titel*</label><span class="error-text"></span>
									<input type="text" class="form-control" name="Titel" id="Titel">
								</div>
								<div class="form-group">
									<label for="Jahr">Jahr*</label><span class="error-text"></span>
									<input type="text" class="form-control date" id="Jahr" name="Jahr">
								</div>
								<div class="form-group">
									<label for="Band">Band</label>
									<input type="text" class="form-control" id="Band" name="Band">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="Jahrgang">Jahrgang</label>
									<input type="text" class="form-control" id="Jahrgang" name="Jahrgang">
								</div>
								<div class="form-group">
									<label for="Nummer">Heft / Stück / Nummer</label>
									<input type="text" class="form-control" id="Nummer" name="Nummer">
								</div>
								<div class="form-group">
									<label for="Supplementheft">Supplementheft</label>
									<input type="text" class="form-control" id="Supplementheft" name="Supplementheft">
								</div>
								<div class="form-group">
									<label for="Autor_Herausgeber">Autor / Herausgeber *</label><span class="error-text"></span>
									<select id="Autor_Herausgeber" class="select2 form-control required" multiple="multiple" data-placeholder="Select Autor / Herausgeber" name="Autor_Herausgeber[]">
								        <option value="AFG">Afghanistan</option>
								        <option value="ALB">Albania</option>
								        <option value="DZA">Algeria</option>
								        <option value="AND">Andorra</option>
								        <option value="ARG">Argentina</option>
								        <option value="ARM">Armenia</option>
								        <option value="ABW">Aruba</option>
								        <option value="AUS">Australia</option>
								    </select>
								</div>
								<div class="form-group">
									<label>Datei</label>
									<div class="custom-file">
									  <input type="file" class="custom-file-input" id="customFile">
									  <label class="custom-file-label" for="customFile">Datei</label>
									</div>
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