<script>
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>
<section class="section">
	<div class="section-header">
		<h1>Test Question</h1>
		<!-- Modal -->
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card card-primary">
				<div class="card-header ">
					<h4>Question Test</h4>
				</div>
				<div class="card-body">
					<div class="flashdatafail" data-flashdata="<?= $this->session->flashdata('msgfail'); ?>"></div>
					<div class="flashdata" data-flashdata="<?= $this->session->flashdata('msg'); ?>"></div>
					<div class="owl-carousel owl-theme" id="products-carousel">
						<div class="float-right card example-1 scrollbar-deep-purple">
							<?php
							$tmp = 0;
							for ($i = 1; $i <= 10; $i++) {
								echo '<div class="row mb-1 ml-1 mr-1">';
								for ($j = 1; $j <= 5; $j++) {
									$tmp += 1;
									echo '<a href="#soal_no' . $tmp . '" data-toggle="tab" class="col mr-1 btn btn-primary nav-link">' . $tmp . '</a>';
								}
								echo '</div>';
							}
							?>
						</div>

						<div>
							<?php

							for ($i = 1; $i <= 50; $i++) {
								echo '
								<div class="tab-content">
									<div id="soal_no' . $i . '" class="col-md-6 tab-pane fade">
										<div class="no_soal mb-3">Soal No.' . $i . '</div>
										<div class="pg ml-3">
											<div class="pg_a mb-2"><input type="radio" name="pg" id=""> indonesia</div>
											<div class="pg_b mb-2"><input type="radio" name="pg" id=""> indonesia</div>
											<div class="pg_c mb-2"><input type="radio" name="pg" id=""> indonesia</div>
											<div class="pg_d mb-2"><input type="radio" name="pg" id=""> indonesia</div>
											<div class="pg_e mb-2"><input type="radio" name="pg" id=""> indonesia</div>
										</div>
										<button class="btn btn-danger mr-2 mt-2">Back</button>
										<div class="btn btn-warning mr-2 mt-2"><input type="checkbox" name="ragu" id=""> Ragu</div>
										<button class="btn btn-success mt-2">Next</button>
									</div>
								</div>';
							}
							?>


						</div>


					</div>
				</div>
			</div>
		</div>
	</div>
</section>
