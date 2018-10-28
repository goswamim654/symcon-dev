<?php
include '../../lang/GermanWords.php';
include '../../config/route.php';
include '../../api/mainCall.php';
if(isset($_POST['delete_array_id'])) {
	$data_array =  array("verlag_id" => $_POST['delete_array_id']);
	$get_data = callAPI('POST', $baseApiURL.'verlage/delete', json_encode($data_array));
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			header('Location: '.$absoluteUrl.'unauthorised.php');
			break;
		case 2:
			$_SESSION['success'] = 'Verlage wurde erfolgreich gelöscht';
			break;	
		case 3:
			$error = $response['message'];
			break;
		case 4:
			$error = $response['message'];
			break;
		case 5:
			$error = $response['message'];
			break;
		case 6:
			$error = $response['message'];
			break;
		default:
			break;
	}
}
$verlages = '';
$get_data = '';
$response = '';
$get_data = callAPI('GET', $baseApiURL.'verlage/all?is_paginate=0', false);
$response = json_decode($get_data, true);
$status = $response['status'];
switch ($status) {
	case 0:
		header('Location: '.$absoluteUrl.'unauthorised.php');
		break;
	case 2:
		$verlages = $response['content']['data'];
		break;
	case 6:
		$error = $response['message'];
		break;
	default:
		break;
}
include '../../inc/header.php';
include '../../inc/sidebar.php';
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Verlage
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $absoluteUrl;?>"><i class="fa fa-dashboard"></i> <?php echo $home; ?></a></li>
        <li class="active">Verlage</li>
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
		              	<?php if(isset($_SESSION['validationError'])) { ?>
		              	<div class="alert alert-danger alert-dismissible alert-hide">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                <h4><i class="icon fa fa-check"></i> Error!</h4>
			                <?php echo $_SESSION['validationError'];?>.
			             </div>
		              	<?php unset($_SESSION['validationError']); } ?>
						<h3 class="box-title">
							<a href="<?php echo $absoluteUrl;?>stammdaten/verlage/add.php" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp; Neu Verlage</a>
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
											<th>Titel</th>
											<th>PLZ</th>
											<th>ORT</th>
											<?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 || $_SESSION['user_type'] == 2)) { ?>
											<?php if($_SESSION['user_type'] == 1 ) { ?>
											<th>Angelegt durch</th>
											<th>Bearbeiter</th>
											<?php  } ?>
											<th class="no-sort">Aktionen</th>
											<?php  } ?>
						                </tr>
					                </thead>
					                <tbody data-link="row" class="rowlink">
					                	<?php 
					                	if($verlages != null && $verlages != '') { 
					                		foreach ($verlages as $key => $verlage) { ?>

							                <tr>
							                	<?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 || $_SESSION['user_type'] == 2)) { ?>
							                	<td class="rowlink-skip"><?php echo $verlage['verlag_id']; ?></td>
							                	<?php  } ?>
												<td><a href="#rowlinkModal" 
														data-id="<?php echo $verlage['verlag_id']; ?>" data-type="verlag" data-title="Anzeigen Verlage"
														data-toggle="modal"><?php echo $verlage['titel']; ?></a></td>
												<td><?php echo $verlage['plz']; ?></td>
												<td><?php echo $verlage['ort']; ?></td>
												<?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 || $_SESSION['user_type'] == 2)) { ?>
												<?php if($_SESSION['user_type'] == 1 ) { ?>
												<td><?php echo $verlage['ersteller']; ?></td>
												<td><?php echo $verlage['bearbeiter']; ?></td>
												<?php } ?>
												<td class="rowlink-skip">
													<a class="btn btn-warning btn-sm" href="<?php echo $absoluteUrl;?>stammdaten/verlage/edit.php?verlag_id=<?php echo $verlage['verlag_id']; ?>" title="Ändern"><i class="fa fa-edit"></i></a>
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