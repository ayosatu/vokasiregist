<!-- Main Content -->
<script>
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>

<section class="section">
	<div class="section-header">
		<h1>Profile</h1>
		<!-- Modal -->
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card card-primary">
				<div class="card-header ">
					<h4>My Profile</h4>
				</div>
				<form method="post" action="" class="form-horizontal" id="form-profile">
				<div class="col-md-6 float-left">
					<div class="from-group">
						<h6 class="col-md-4">Name</h6>
						<div class="col-md-12">
                            <input type="text" name="name"  class="form-control" value="<?= $vw_candidate['name'] ?>">
                    	</div>	
					</div>
					<div class="from-group">
						<h6 class="col-md-4 mt-4">Email</h6>
						<div class="col-md-12">
                            <input type="text" name="email"  class="form-control" value="<?= $vw_candidate['email'] ?>">
                    	</div>	
					</div>
					<div class="from-group">
						<h6 class="col-md-4 mt-4">Birth Place</h6>
						<div class="col-md-12">
                            <input type="text" name="birth_place"  class="form-control" value="<?= $vw_candidate['birth_place'] ?>">
                        </div>	
					</div>
					<div class="from-group">
						<h6 class="col-md-4 mt-4">NIK</h6>
						<div class="col-md-12">
                            <input type="text" name="nik"  class="form-control" value="<?= $vw_candidate['nik'] ?>">
                        </div>	
					</div>
					<div class="from-group">
						<h6 class="col-md-4 mt-4 mb-4">Username</h6>
						<div class="col-md-12">
                            <input type="text" name="address"  readonly="" class="form-control" value="<?= $vw_candidate['user_name'] ?>">
                        </div>	
					</div>
				</div>
				<div class='col-md-6 float-right'>
					<div class="from-group">
						<h6 class="col-md-4">No Tlp</h6>
						<div class="col-md-12">
                            <input type="text" name="no_tlp"  class="form-control" value="<?= $vw_candidate['no_tlp'] ?>">
                        </div>	
					</div>
					<div class="from-group">
						<h6 class="col-md-4 mt-4">No Hp</h6>
						<div class="col-md-12">
                            <input type="text" name="no_hp"  class="form-control" value="<?= $vw_candidate['no_hp'] ?>">
                        </div>	
					</div>
					<div class="from-group">
						<h6 class="col-md-4 mt-4 ">Birth Date</h6>
						<div class="col-md-12">
                            <input type="text" name="birth_date"  class="form-control" value="<?= $vw_candidate['birth_date'] ?>">
                        </div>	
					</div>
					<div class="from-group">
						<h6 class="col-md-4 mt-4 ">Address</h6>
						<div class="col-md-12">
                            <input type="text" name="address"  class="form-control" value="<?= $vw_candidate['address'] ?>">
                        </div>	
					</div>
					<div class="from-group">
						<h6 class="col-md-4 mt-4 mb-4">Password</h6>
						<div class="col-md-12">
                            <input type="text" name="address" class="form-control" value="<?= $vw_candidate['user_password'] ?>">
                        </div>	
					</div>
				</div>
				<button type="button" class="btn btn-icon btn-primary mt-4 ml-4">Submit</button>
				<button type="button" class="btn btn-icon btn-secondary mt-4">cancel</button>
					
                </form>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-body modal-output">
			</div>
		</div>

	</div>
</div>

<script>
	$(document).ready(function() {

		function ajaxLoadDataContent(controller, action, params) {
			$.ajax({
				url: "<?= base_url(); ?>" + controller + action,
				type: "GET",
				data: params,
				success: function(data) {
					$(".modal-output").html(data);
				},
				error: function(xhr, status, error) {
					swal.fire({
						title: "Error",
						text: xhr.responseText,
						html: 404,
						type: "error"
					});
				}
			});

			return;
		}

		$('.btn-detail').click(function() {
			var controllerName = $(this).attr('data-source');
			var action = "/detail?id=" + $(this).attr('id');

			// alert($(this).attr('id'));
			// document.getElementById("");

			if (!controllerName) {

			} else {
				var menu_id = $(this).attr('menu-id');
				ajaxLoadDataContent(
					controllerName,
					action, {
						menu_id: menu_id
					}
				);
			}
		});

		$('.btn-update').click(function() {
			var controllerName = $(this).attr('data-source');
			var action = "/loadUpdateDisplay?id=" + $(this).attr('id');

			if (!controllerName) {

			} else {
				var menu_id = $(this).attr('menu-id');
				ajaxLoadDataContent(
					controllerName,
					action, {
						menu_id: menu_id
					}
				);
			}
		});
	});
</script>