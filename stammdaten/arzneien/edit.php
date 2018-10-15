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
        Ändern Arznei
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $absoluteUrl;?>"><i class="fa fa-dashboard"></i> <?php echo $home; ?></a></li>
        <li class=""> <a href="<?php echo $absoluteUrl;?>stammdaten/arzneien">Arzneien</a></li>
        <li class="active"> Ändern Arznei</li>
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
		            <form role="form" id="addArzneiForm">
		              <div class="box-body">
		              	<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="arzneien">Arznei*</label><span class="error-text"></span>
									<input type="text" class="form-control" id="arzneien" name="code" required>
								</div>
								<div class="form-group">
									<label for="Quelle">Quelle</label><span class="error-text"></span>
									<select id="Quelle" class="select2 form-control required" multiple="multiple" data-placeholder="Quelle wählen" name="Quelle[]">
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
									<label for="kommentar">kommentar</label>
									<textarea id="kommentar" name="kommentar" class="texteditor" aria-hidden="true"></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="Unklarheiten">Unklarheiten</label>
									<textarea id="Unklarheiten" name="Unklarheiten" class="texteditor" aria-hidden="true"></textarea>
								</div>
								<div class="form-group">
									<label for="Autor_Herausgeber">Autor / Herausgeber </label>
									<select id="Autor_Herausgeber" class="select2 form-control required" multiple="multiple" data-placeholder="Autor / Herausgeber wählen" name="Autor_Herausgeber[]">
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