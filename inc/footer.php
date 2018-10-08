<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b><?php echo $version;?></b> 1.0.0
	</div>
	<strong><?php echo $copyright;?> &copy; 2018-2019 <a href="<?php echo $absoluteUrl;?>">Symcom</a>.</strong> <?php echo $all_rights_reserved;?>.
</footer>
	<div class="modal fade" id="rowlinkModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Default Title</h4>
				</div>
				<div class="modal-body">
				<p>One fine body&hellip;</p>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
		</div>
	<!-- /.modal-dialog -->
	</div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo $absoluteUrl;?>plugins/jquery/dist/jquery.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $absoluteUrl;?>plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo $absoluteUrl;?>plugins/jquery-ui/ui/i18n/datepicker-de.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $absoluteUrl;?>plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo $absoluteUrl;?>plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $absoluteUrl;?>plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo $absoluteUrl;?>plugins/select2/dist/js/select2.full.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo $absoluteUrl;?>plugins/moment/min/moment.min.js"></script>
<script src="<?php echo $absoluteUrl;?>plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<!-- <script src="<?php //echo $absoluteUrl;?>plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
<!-- FastClick -->
<script src="<?php echo $absoluteUrl;?>plugins/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $absoluteUrl;?>assets/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $absoluteUrl;?>assets/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $absoluteUrl;?>assets/js/demo.js"></script>
<!-- Datatable custom config -->
<script type="text/javascript">var absoluteUrl = "<?php echo $absoluteUrl;?>"</script>
<script src="<?php echo $absoluteUrl;?>assets/js/dataTablesConfig.js"></script>
<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  $(function () {

  })
</script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
	<script>

		$(document).ready(function () {
		    
		    //  multiple select
		    $('.select2').select2();

		    //datepicker init
		    $('#Jahr').datepicker(
		    	{
			      	changeMonth: true,
	     			changeYear: true,
	     			dateFormat: 'dd/mm/yy'
     			},
     			$.datepicker.regional[ "de" ]
     		);

		    // Quelle form validation

			$.extend($.validator.messages, {
			    required: '<i class = "icon-exclamation-sign"></i>'
			});
		    $("#addQuelleForm").validate({
			  errorPlacement: function(error, element) {
			  	//console.log(error);
			  	//error.prepend('<i class="fas fa-exclamation custom-exclamation"></i>');
			    error.appendTo(element.prev("span"));
			  },
			  
			  rules: {
		            code: "required",
		            Titel: "required",
		            Sprache: "required",
		            Jahr: "required",
		            Auflage: "required",
		            Verlag: "required"
		        },
		        messages: {
		            code: "Kurzel ist eine Pflichtangabe",
		            Titel: "Titel ist eine Pflichtangabe",
		            Sprache: 'Sprache ist eine Pflichtangabe',
		            Jahr: "Jahr ist eine Pflichtangabe",
		            Auflage: "Auflage ist eine Pflichtangabe",
		            Verlag: "Verlag ist eine Pflichtangabe"
		        }
			});

		});
	</script>
	<?php
	if($actual_link == $absoluteUrl.'stammdaten/zeitschriften/add.php' || $actual_link == $absoluteUrl.'stammdaten/zeitschriften/edit.php' ) { ?>
	<script src="<?php echo $absoluteUrl;?>assets/js/pages/zeitschriften.js"></script>
	<?php } ?>

	<script type="text/javascript" src="<?php echo $absoluteUrl;?>plugins/tinymce/jquery.tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $absoluteUrl;?>plugins/tinymce/jquery.tinymce.config.js"></script>
	<script type="text/javascript" src="<?php echo $absoluteUrl;?>plugins/tinymce/tinymce.min.js"></script>
	<?php
	//if($actual_link == $absoluteUrl.'stammdaten/zeitschriften/add.php' || $actual_link == $absoluteUrl.'stammdaten/zeitschriften/edit.php' ) { ?>
	<script src="<?php echo $absoluteUrl;?>assets/js/pages/autor.js"></script>
	<?php // } ?>

	<script type="text/javascript">
		$('.normal-search a').click(function() {
			$(this).hide();
			$('.navbar-custom-menu').hide();
			$('input#navbar-search-input').show();
			$('.closeBtn').show();
		});
		$('.closeBtn').click( function() {
			$(this).hide();
			$('.navbar-custom-menu').show();
			$('input#navbar-search-input').hide();
			$('.normal-search a').show();
		});
	</script>
</body>
</html>
