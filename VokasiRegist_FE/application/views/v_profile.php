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
				<form method="POST" action="<?= base_url('C_Profile/ProfileUpdate') ?>" class="form-horizontal" id="form-profile">
				<div class="col-md-6 float-left">
					<div class="from-group">
						<h6 class="col-md-4">Name</h6>
						<div class="col-md-12">
                            <input type="text" name="istr_name" id="istr_name"  class="form-control" value="<?= $vw_candidate['name'] ?>">
                    	</div>	
					</div>
					<div class="from-group">
						<h6 class="col-md-4 mt-4 mb-4">Username</h6>
						<div class="col-md-12">
                            <input type="text" name="username"  readonly="" class="form-control" value="<?= $vw_candidate['user_name'] ?>">
                        </div>	
					</div>
					<div class="from-group">
						<h6 class="col-md-4 mt-4">Email</h6>
						<div class="col-md-12">
                            <input type="text" name="istr_email" id="istr_email" class="form-control" value="<?= $vw_candidate['email'] ?>">
                    	</div>	
					</div>
					<div class="from-group">
						<h6 class="col-md-4 mt-4">Birth Place</h6>
						<div class="col-md-12">
                            <input type="text" name="istr_birth_place" id="istr_birth_place"  class="form-control" value="<?= $vw_candidate['birth_place'] ?>">
                        </div>	
					</div>
					<div class="from-group">
						<h6 class="col-md-4 mt-4">NIK</h6>
						<div class="col-md-12">
                            <input type="text" name="istr_nik" id="istr_nik" class="form-control" value="<?= $vw_candidate['nik'] ?>">
                        </div>	
					</div>
					<div class="from-group">
						<h6 class="col-md-4 mt-4">Gender</h6>
						<div class="col-md-12">
						<select class="form-control selectpicker mb-3" name="ddlgender" id="ddlgender">
							<option value="<?= $vw_candidate['gender_id'] ?>">Default Choice - <?= $vw_candidate['gender'] ?></option>
							<? foreach ($gender as $gen ):?>
							<option value="<?= $gen['gender_id'] ?>"><?= $gen['name'] ?></option>
							<?endforeach;?>
						</select>                       
						</div>	
					</div>

					<button type="submit" class="btn btn-icon btn-primary mt-4 ">Submit</button>
					<button type="button" class="btn btn-icon btn-secondary mt-4 ">cancel</button>
				</div>
				<div class='col-md-6 float-right'>
					<div class="from-group">
						<h6 class="col-md-4">Image Path</h6>
						<div class="col-md-12">
                            <input type="text" name="istr_img_path" id="istr_img_path" class="form-control" value="<?= $vw_candidate['img_path'] ?>">
                        </div>	
					</div>
					<div class="from-group">
						<h6 class="col-md-4 mt-4">No Tlp</h6>
						<div class="col-md-12">
                            <input type="text" name="istr_no_tlp" id="istr_no_tlp" class="form-control" value="<?= $vw_candidate['no_tlp'] ?>">
                        </div>	
					</div>
					<div class="from-group">
						<h6 class="col-md-4 mt-4">No Hp</h6>
						<div class="col-md-12">
                            <input type="text" name="istr_no_hp" id="istr_no_hp" class="form-control" value="<?= $vw_candidate['no_hp'] ?>">
                        </div>	
					</div>
					<div class="from-group">
						<h6 class="col-md-4 mt-4 ">Birth Date</h6>
						<div class="col-md-12">
                            <input type="text" name="idt_birth_date" id="idt_birth_date" class="form-control" value="<?= $vw_candidate['birth_date'] ?>">
                        </div>	
					</div>
					<div class="from-group">
						<h6 class="col-md-4 mt-4 ">Address</h6>
						<div class="col-md-12">
                            <input type="text" name="istr_address" id="istr_address" class="form-control" value="<?= $vw_candidate['address'] ?>">
                        </div>	
					</div>
					<div class="from-group">
						<h6 class="col-md-4 mt-4">Religion</h6>
						<div class="col-md-12">
						<select class="form-control selectpicker mb-3" name="ddlreligion" id="ddlreligion">
							<option value="<?= $vw_candidate['religion_id'] ?>">Default Choice - <?= $vw_candidate['religion'] ?></option>

							<? foreach ($religion as $reg ):?>
							<option value="<?= $reg['religion_id'] ?>"><?= $reg['name'] ?></option>
							<?endforeach;?>
						</select>                       
						</div>	
					</div>
				</div>	
								
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