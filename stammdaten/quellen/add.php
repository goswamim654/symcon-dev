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
		            <form role="form" id="addQuelleForm">
		              <div class="box-body">
		              	<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="Kürzel">Kürzel*</label><span class="error-text"></span>
									<input type="text" class="form-control" id="Kürzel" name="code" autofocus required>
								</div>
								<div class="form-group">
									<label for="Titel">Titel*</label><span class="error-text"></span>
									<input type="text" class="form-control" name="Titel" id="Titel">
								</div>
								<div class="form-group">
									<label for="Sprache">Sprache*</label><span class="error-text"></span>
									<select id="Sprache" class="form-control" name="Sprache">
										<option value="">Sprache wählen</option>
										<option value="294">deutsch</option>
										<option value="295">englisch</option>
									</select>
								</div>
								<div class="form-group">
									<label for="Herkunft">Herkunft</label>
									<select id="Herkunft" class="form-control">
										<option value="">Herkunft wählen</option>
										<option value="294">deutsch</option>
										<option value="295">englisch</option>
									</select>
								</div>
								<div class="form-group">
									<label for="Schema">Schema</label>
									<select id="Schema" class="form-control">
										<option value="">Herkunft wählen</option>
										<option value="294">deutsch</option>
										<option value="295">englisch</option>
									</select>
								</div>
								<div class="form-group">
									<label for="Jahr">Jahr*</label><span class="error-text"></span>
									<input type="text" class="form-control pull-right" id="Jahr" name="Jahr">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="Band">Band</label>
									<input type="text" class="form-control" id="Band" name="Band">
								</div>
								<div class="form-group">
									<label for="Nummer">Nummer</label>
									<input type="text" class="form-control" id="Nummer" name="Nummer">
								</div>
								<div class="form-group">
									<label for="Auflage">Auflage*</label><span class="error-text"></span>
									<input type="text" class="form-control" id="Auflage" name="Auflage">
								</div>
								<div class="form-group">
									<label for="Verlag">Verlag*</label><span class="error-text"></span>
									<select id="Verlag" class="form-control" name="Verlag">
										<option value="">Verlag wählen</option>
										<option value="294">deutsch</option>
										<option value="295">englisch</option>
									</select>
								</div>
								<div class="form-group">
									<label for="Autor_Herausgeber">Autor / Herausgeber</label>
									<select id="Autor_Herausgeber" class="select2 form-control" multiple="multiple" data-placeholder="Select Autor / Herausgeber" name="Autor_Herausgeber[]">
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