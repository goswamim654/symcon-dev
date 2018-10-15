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
        Herkunft
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $absoluteUrl;?>"><i class="fa fa-dashboard"></i> <?php echo $home; ?></a></li>
        <li class="active">Herkunft</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
					<?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 || $_SESSION['user_type'] == 2)) { ?>
		            <div class="box-header with-border">
		            	<?php if(isset($_SESSION['success'])) { ?>
		              	<div class="alert alert-success alert-dismissible alert-hide">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                <h4><i class="icon fa fa-check"></i> Contrats!</h4>
			                <?php echo $_SESSION['success'];?>.
			             </div>
		              	<?php unset($_SESSION['success']); } ?>
		              	<?php if(isset($_SESSION['validationError'])) { ?>
		              	<div class="alert alert-danger alert-dismissible alert-hide">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                <h4><i class="icon fa fa-check"></i> Error!</h4>
			                <?php echo $_SESSION['validationError'];?>.
			             </div>
		              	<?php unset($_SESSION['validationError']); } ?>
						<h3 class="box-title">
							<a href="<?php echo $absoluteUrl;?>stammdaten/herkunft/add.php" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp; Neu Herkunft</a>
						</h3>
		            </div>
		            <?php  } ?>
		            <!-- /.box-header -->
		            <div class="box-body">
			            <form id="listViewForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		            		<div class="table-responsive">
					            <table id="dataTable" class="table-loader table table-bordered table-striped display table-hover custom-table">
					                <thead>
						                <tr>
						                	<?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 || $_SESSION['user_type'] == 2)) { ?>
						                	<th class="rowlink-skip dt-body-center no-sort"><button class="btn btn-danger btn-sm delete-row"  title="Löschen"><i class="fa fa-trash"></i></button></th>
						                	<?php  } ?>
											<th>Code</th>
											<th>Titel</th>
											<?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 || $_SESSION['user_type'] == 2)) { ?>
											<th class="no-sort">Aktionen</th>
											<?php  } ?>
						                </tr>
					                </thead>
					                <tbody data-link="row" class="rowlink">
					                	<?php 
					                	if($herkunfte != null && $herkunfte != '') { 
					                		foreach ($herkunfte as $key => $herkunft) { ?>

							                <tr>
							                	<?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 || $_SESSION['user_type'] == 2)) { ?>
							                	<td class="rowlink-skip"><?php echo $herkunft['herkunft_id']; ?></td>
							                	<?php  } ?>
												<td><a href="#rowlinkModal" 
														data-herkunft_id="<?php echo $herkunft['herkunft_id']; ?>"
														data-toggle="modal"><?php echo $herkunft['code']; ?></a></td>
												<td><?php echo $herkunft['titel']; ?></td>
												<?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 || $_SESSION['user_type'] == 2)) { ?>
												<td class="rowlink-skip">
													<a class="btn btn-warning btn-sm" href="<?php echo $absoluteUrl;?>stammdaten/herkunft/edit.php?herkunft_id=<?php echo $herkunft['herkunft_id']; ?>" title="Ändern"><i class="fa fa-edit"></i></a>
			            	       	            </td>
			            	       	            <?php  } ?>
							                </tr>
							            <?php } 
							            } ?>
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