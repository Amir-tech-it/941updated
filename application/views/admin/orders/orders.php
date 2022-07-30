<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<style>
	#image_collection{
		display: flex;
		justify-content: space-evenly;
	}
	#image_collection i{
		color: red;
		background: white;
		cursor: pointer;
	}
	.form-control2{
		display: block;
		width: 10% !important;
		height: calc(1.25rem + 2px) !important;
	}
	.hide{
		display: none !important;
	}
	#image_collection img{
		max-width : 100% !important;
	}
</style>
<?php
$countryList = array(
	"DE" => "Germany",
	"ES" => "Spain",
	"PT" => "Portugal",
	"FR" => "France"
);

?>
<div class="content-wrapper" style="min-height: 1302.4px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Orders</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="row mr-3 mt-3" style="justify-content: space-between;">
							<div class="col-2 ml-3">
<!--								<select name="compaign_filter" id="compaign_filter" class="form-control">-->
<!--									<option value="">Select Campaign</option>-->
<!--									--><?php //foreach($campaigns as $campaign){ ?>
<!--										<option value="--><?php //echo $campaign['campaign_id'];?><!--">--><?php //echo $campaign['campaign_title'];?><!--</option>-->
<!--									--><?php //} ?>
<!--								</select>-->
							</div>
						</div>
						<!-- <div class="card-header">
						  <h3 class="card-title">Products</h3>
						</div> -->
						<!-- /.card-header -->
						<div class="card-body">
							<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
								<div class="row">
									<div class="col-sm-12">
										<table id="datatable" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
											<thead>
											<tr>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">
													Title
												</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">
													Price
												</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">
													URL
												</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">
													Free Offer
												</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">
													Country Code
												</th>
											</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
									<!-- /.card-body -->
								</div>
								<!-- /.card -->
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js" defer></script>

<script>
	$(document).ready(function() {

		var offertables = $('#datatable').DataTable({
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?php echo base_url('orders/list'); ?>",
				"type": "POST",
				"data": function(d) {
					return $.extend({}, d, {
						"compaign_filter": $('#compaign_filter').val()
					});
				}
			},
			"columnDefs": [{
				"targets": [0],
				"orderable": false
			}],
			"columns": [
				{ "data": "offer_title" },
				{ "data": "offer_price" },
				{ "data": "offer_url" },
				{ "data": "free_offer_url" },
				{ "data": "offer_country" }
			]
		});
		// $("#compaign_filter").on("change", function (){
		// 	offertables.draw();
		// });

	});
</script>

