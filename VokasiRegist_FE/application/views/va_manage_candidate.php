<script>
	$(document).ready(function() {
		$('.card-primary').load("<?= base_url('a_candidate') ?>");
		$('#example').DataTable();
	});
</script>
<section class="section">
	<div class="section-header">
		<h1>Manage Candidate</h1>
		<!-- Modal -->
	</div>
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-pills">
				<li class="nav-item">
					<a class="nav-link active" data-source="a_candidate" href="#" style=" border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;">
						<i class="ion ion-ios-people"></i>
						Candidate
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-source="a_canparent" href="#" style="border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;">
						<i class="ion ion-android-people"></i>
						Parent
					</a>
				</li>
			</ul>
			<div id="card-primary" class="card card-primary" style="border-top-left-radius: 0px;">
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
		function ajaxLoadContent(controller) {
			$.ajax({
				url: "<?= base_url(); ?>" + controller,
				type: "POST",
				success: function(data) {
					$(".card-primary").html(data);
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

		$('.nav-link').click(function() {
			var controllerName = $(this).attr('data-source');

			if (!controllerName) {

			} else {
				$('.nav-link').removeClass('active');
				$(this).addClass('active');
				$(this).parent('ul').parent('li').addClass('active');
				// alert(controllerName);

				ajaxLoadContent(
					controllerName
				);
			}
		});

		$('.btn-detail').click(function() {
			alert('Clicked');
		});

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
	});
</script>
