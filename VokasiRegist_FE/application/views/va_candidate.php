<script>
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>
<div class="card-header ">
	<h4>Manage Candidate</h4>
</div>
<div class="card-body">
	<div class="flashdatafail" data-flashdata="<?= $this->session->flashdata('msgfail'); ?>"></div>
	<div class="flashdata" data-flashdata="<?= $this->session->flashdata('msg'); ?>"></div>

	<div class="owl-carousel owl-theme" id="products-carousel">
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>ID - Username</th>
					<th>Full Name</th>
					<th>Email</th>
					<th>User Identity Number</th>
					<th>Address</th>
					<th style="text-align: center;">Action</th>
				</tr>
			</thead>
			<tbody>
				<? foreach ($candidate as $can):?>
				<tr>
					<td><?= $can['candidate_id'] ?></td>
					<td><?= $can['user_name'] ?></td>
					<td><?= $can['name'] ?></td>
					<td><?= $can['email'] ?></td>
					<td><?= $can['nik'] ?></td>
					<td><?= $can['address'] ?></td>
					<td style=" text-align: center;">
						<a href="#" class="btn btn-icon btn-primary has-dropdown" data-toggle="dropdown"><i class="ion ion-ios-person"></i> <span>Manage Candidate</span></a>
						<ul class="dropdown-menu" style="width: 30%; text-align:center">

							<li>
								<button data-toggle="modal" data-target="#myModal" data-source="a_candidate" class="btn btn-icon btn-info btn-detail" id="<?= $can['candidate_id'] ?>">
									<i class="fas fa-info-circle"></i> Detail
								</button>

								<button data-toggle="modal" data-target="#myModal" data-source="a_candidate" class="btn btn-icon btn-success btn-update" id="<?= $can['candidate_id'] ?>">
									<i class="far fa-edit"></i> Update
								</button>

								<a href="<?= base_url('a_candidate/delete?candidate_id=' . $can['candidate_id']); ?>" class="btn btn-icon btn-danger deleteButton">
									<i class="fas fa-times"></i> Delete
								</a>
							</li>

						</ul>
					</td>
				</tr>
				<?endforeach;?>
			</tbody>
		</table>
	</div>
</div>

<script>
	$(document).ready(function() {


		function ajaxLoadDataContent(controller, action, id) {
			$.ajax({
				url: "<?= base_url(); ?>" + controller + action,
				type: "POST",
				data: id,
				success: function(data) {
					$(".modal-output").html(data);
				}
			});
			return;
		}

		$('.btn-detail').click(function() {
			var controllerName = $(this).attr('data-source');
			var action = "/detail";
			var id = $(this).attr('id');

			// alert(controllerName + action + id);
			if (!controllerName) {} else {
				ajaxLoadDataContent(
					controllerName,
					action, {
						id: id
					}
				);
			}
		});

		$('.btn-update').click(function() {
			var controllerName = $(this).attr('data-source');
			var action = "/loadUpdateDisplay";
			var id = $(this).attr('id');

			// alert(controllerName + action + id);
			if (!controllerName) {} else {
				ajaxLoadDataContent(
					controllerName,
					action, {
						id: id
					}
				);
			}
		});
	});
</script>
