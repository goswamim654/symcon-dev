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
        Quellen
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $absoluteUrl;?>"><i class="fa fa-dashboard"></i> <?php echo $home; ?></a></li>
        <li class="active">Quellen</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">
		              	<a href="<?php echo $absoluteUrl;?>stammdaten/quellen/add.php" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp; Neu Quelle</a>
		              </h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		            	<form id="frm-example" action="/path/to/your/script" method="POST">
		            		<div class="table-responsive">
					            <table id="quellen" class="table table-bordered table-striped display table-hover">
					                <thead>
						                <tr>
						                	<th class="rowlink-skip dt-body-center no-sort"><!-- <input type="checkbox" name="select_all" value="1" id="example-select-all">  --><button class="btn btn-danger btn-sm delete-row"  title="Löschen"><i class="fa fa-trash"></i></button></th>
											<th>Kürzel</th>
											<th>Titel</th>
											<th>Jahr</th>
											<th>Autor / Herausgeber</th>
											<th>Bearbeiter</th>
											<th class="no-sort">Aktionen</th>
						                </tr>
					                </thead>
					                <tbody data-link="row" class="rowlink">
						                <tr>
						                	<td class="rowlink-skip"></td>
											<td><a href="#rowlinkModal" data-toggle="modal">Trident</a></td>
											<td>InternetExplorer 4.0</td>
											<td>Win 95+</td>
											<td>4</td>
											<td>X</td>
											<td class="rowlink-skip">
												<a class="btn btn-warning btn-sm" href="<?php echo $absoluteUrl;?>stammdaten/quellen/edit.php" title="Ändern"><i class="fa fa-edit"></i></a>
		            	       	            </td>
						                </tr>
						                <tr>
						                	<td class="rowlink-skip"></td>
											<td><a href="#rowlinkModal" data-toggle="modal">Trident</a></td>
											<td>InternetExplorer 5.0</td>
											<td>Win 95+</td>
											<td>5</td>
											<td>C</td>
											<td class="rowlink-skip">
												<a class="btn btn-warning btn-sm" href="<?php echo $absoluteUrl;?>stammdaten/quellen/edit.php" title="Ändern"><i class="fa fa-edit"></i></a>
		            	       	            </td>
						                </tr>
						                <tr>
						                	<td class="rowlink-skip"></td>
											<td><a href="#rowlinkModal" data-toggle="modal">Trident</a></td>
											<td>InternetExplorer 5.0</td>
											<td>Win 95+</td>
											<td>5</td>
											<td>C</td>
											<td class="rowlink-skip">
												<a class="btn btn-warning btn-sm" href="<?php echo $absoluteUrl;?>stammdaten/quellen/edit.php" title="Ändern"><i class="fa fa-edit"></i></a>
		            	       	            </td>
						                </tr>
						            </tbody>
					            </table>
					        </div>
				        </form>    
			        </div>
			            <!-- /.box-body -->
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