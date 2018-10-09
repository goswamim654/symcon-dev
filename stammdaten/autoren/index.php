<?php
include '../../lang/GermanWords.php';
include '../../config/route.php';
include '../../api/autoren.php';
include '../../inc/header.php';
include '../../inc/sidebar.php';
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Autoren
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $absoluteUrl;?>"><i class="fa fa-dashboard"></i> <?php echo $home; ?></a></li>
        <li class="active">Autoren</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		            	<?php if(isset($_SESSION['success'])) { ?>
		              	<div class="alert alert-success alert-dismissible alert-hide">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                <h4><i class="icon fa fa-check"></i> Contrats!</h4>
			                <?php echo $_SESSION['success'];?>.
			             </div>
		              	<?php unset($_SESSION['success']); } ?>
						<h3 class="box-title">
							<a href="<?php echo $absoluteUrl;?>stammdaten/autoren/add.php" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp; Neu Autor/ Herausgeber</a>
						</h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
			            <form id="frm-example" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		            		<div class="table-responsive">
					            <table id="autoren" class="table-loader table table-bordered table-striped display table-hover">
					                <thead>
						                <tr>
						                	<th class="rowlink-skip dt-body-center no-sort"><!-- <input type="checkbox" name="select_all" value="1" id="example-select-all">  --><button class="btn btn-danger btn-sm delete-row"  title="Löschen" disabled><i class="fa fa-trash"></i></button></th>
											 <th>Suchname</th>
											<th>Angelegt durch</th>
											<th>Bearbeiter</th>
											<th class="no-sort">Aktionen</th>
						                </tr>
					                </thead>
					                <tbody data-link="row" class="rowlink">
					                	<?php foreach ($autoren as $key => $autor) { ?>

						                <tr>
						                	<td class="rowlink-skip"><?php echo $autor['AutorID']; ?></td>
											<td><a href="#rowlinkModal" 
													data-autor_id="<?php echo $autor['AutorID']; ?>"
													data-Vorname="<?php echo $autor['Vorname']; ?>"
													data-Nachname="<?php echo $autor['Nachname']; ?>"
													data-Suchname="<?php echo $autor['Suchname']; ?>"
													data-Geburtsdatum="<?php echo $autor['Geburtsdatum']; ?>"
													data-Sterbedatum="<?php echo $autor['Sterbedatum']; ?>"
													data-Kommentar='<?php echo $autor['Kommentar']; ?>'
													data-toggle="modal"><?php if( $autor['Suchname'] ) echo $autor['Suchname']; else echo $autor['Vorname'].$autor['Nachname'];  ?></a></td>
											<td><?php echo $autor['Ersteller']; ?></td>
											<td><?php echo $autor['Bearbeiter']; ?></td>
											<td class="rowlink-skip">
												<a class="btn btn-warning btn-sm" href="<?php echo $absoluteUrl;?>stammdaten/autoren/edit.php?autorid=<?php echo $autor['AutorID']; ?>" title="Ändern"><i class="fa fa-edit"></i></a>
		            	       	            </td>
						                </tr>
						            	<?php } ?>
						            </tbody>
					            </table>
					        </div>
				        </form> 
			        </div>
			            <!-- /.box-body -->
		        </div>
			</div>
		</div> <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include '../../inc/footer.php';
?>