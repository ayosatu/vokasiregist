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
				<div class="card-header">
					<h4>My Profile</h4>
				</div>
				<div>
					<h5>Name</h5>
					<?= $profile['name']; ?>
					<div class="card-header card-profile">
						<img src="<?= base_url() . $profile['img_path']; ?>" alt="">
					</div>
				</div>
				<div class="card-body">
					<div class="flashdatafail" data-flashdata="<?= $this->session->flashdata('msgfail'); ?>"></div>
					<div class="flashdata" data-flashdata="<?= $this->session->flashdata('msg'); ?>"></div>
					<div class="owl-carousel owl-theme" id="products-carousel">

					</div>
				</div>
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