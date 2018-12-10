<?php
include '../../../lang/GermanWords.php';
include '../../../config/route.php';
include '../../../api/mainCall.php';

$references = [];
$get_data = '';
$response = [];
$get_data = callAPI('GET', $baseApiURL.'reference/all?is_paginate=0', false);
$response = json_decode($get_data, true);
$status = $response['status'];
switch ($status) {
	case 0:
		header('Location: '.$absoluteUrl.'unauthorised');
		break;
	case 2:
		$references = $response['content']['data'];
		break;
	case 6:
		$error = $response['message'];
		break;
	default:
		break;
}
include '../../../inc/header.php';
include '../../../inc/sidebar.php';
?>
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reference
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $absoluteUrl;?>"><i class="fa fa-dashboard"></i> <?php echo $home; ?></a></li>
        <li> Stemmdaten</li>
        <li class="active">Reference</li>
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
						<h3 class="box-title">
							<a href="<?php echo $absoluteUrl;?>stammdaten/reference/de/add" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp; Neuer Reference</a>
						</h3>
		            </div>
		            <?php  } ?>
		            <!-- /.box-header -->
		            <div class="box-body">
			            <form id="listViewForm" data-action="delete" data-source="reference" data-source_id_name="reference_id">
		            		<div class="table-responsive">
					            <table id="dataTable" class="table-loader table table-bordered table-striped display table-hover custom-table">
					                <thead>
						                <tr>
						                	<?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 || $_SESSION['user_type'] == 2)) { ?>
						                	<th class="rowlink-skip dt-body-center no-sort"><button class="btn btn-danger btn-sm delete-row"  title="Löschen"><i class="fa fa-trash"></i></button></th>
						                	<?php  } ?>
											 <th>Reference</th>
											 <th>Autor</th>
											 <?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 || $_SESSION['user_type'] == 2)) { ?>
											<th class="no-sort">Aktionen</th>
											<?php  } ?>
						                </tr>
					                </thead>
					                <tbody data-link="row" class="rowlink">
					                	<?php 
					                	if($references != null && $references != '') { 
					                		foreach ($references as $key => $reference) { ?>

							                <tr>
							                	<?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 || $_SESSION['user_type'] == 2)) { ?>
							                	<td class="rowlink-skip"><?php echo $reference['reference_id']; ?></td>
							                	<?php  } ?>
												<td><a href="#rowlinkModal" 
														data-id="<?php echo $reference['reference_id']; ?>" data-type="reference" data-title="Reference" 
														data-toggle="modal"><?php echo $reference['reference']; ?></a></td>
												<td><?php echo $reference['autor']; ?></td>
												<?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 || $_SESSION['user_type'] == 2)) { ?>
												<td class="rowlink-skip">
													<a class="btn btn-warning btn-sm" href="<?php echo $absoluteUrl;?>stammdaten/reference/de/edit?reference_id=<?php echo $reference['reference_id']; ?>" title="Ändern"><i class="fa fa-edit"></i></a>
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
include '../../../inc/footer.php';
?>
