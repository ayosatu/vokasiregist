</div>
<footer class="main-footer">
	<div class="footer-left">
		Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
	</div>
	<div class="footer-right">
		2.3.0
	</div>
</footer>
</div>
</div>

<!-- General JS Scripts -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url('assets') ?>/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?= base_url('assets') ?>/modules/jquery.sparkline.min.js"></script>
<script src="<?= base_url('assets') ?>/modules/Chart.min.js"></script>
<script src="<?= base_url('assets') ?>/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
<script src="<?= base_url('assets') ?>/modules/summernote/dist/summernote-bs4.js"></script>
<script src="<?= base_url('assets') ?>/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

<!-- Template JS File -->
<script src="<?= base_url('assets') ?>/js/scripts.js"></script>
<script src="<?= base_url('assets') ?>/js/custom.js"></script>

<!-- Page Specific JS File -->
<!-- <script src="<?= base_url('assets') ?>/js/page/index.js"></script> -->

<!-- Sweet Alert JS -->
<script src="<?= base_url("assets") ?>/js/sweetalert2.all.min.js"></script>

<!-- Costum Sweet alert JS -->
<script src="<?= base_url("assets") ?>/js/myjsalert.js"></script>

<script>
	$(document).ready(function() {
		function ajaxLoadContent(controller) {
			$.ajax({
				url: "<?= site_url(); ?>" + controller,
				type: "POST",
				data: null,
				success: function(data) {
					$(".page-load").html(data);
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
				var menu_id = $(this).attr('menu-id');
				$('.nav-link').removeClass('active');
				$(this).addClass('active');
				$(this).parent('ul').parent('li').addClass('active');

				ajaxLoadContent(controllerName);
			}
		});
	});
</script>

</body>

</html>
