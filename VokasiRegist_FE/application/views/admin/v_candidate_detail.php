<div class="main-content" style="min-height: 557px;">
	<section class="section">
		<div class="section-header">
			<h1>Candidate Details</h1>
		</div>
		<div class="row">
			<div class="col-12 col-md-1 col-lg-1">
			</div>
			<div class="col-12 col-md-10 col-lg-10">
				<div class="card">
					<div class="card-header card-profile">
						<img src="<?= base_url('assets/img/avatar/') ?>avatar-1.png" alt="Avatar">
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="">Candidate ID</label>
							<input type="text" class="form-control" value="<?= $candidate['candidate_id'] ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Username</label>
							<input type="text" class="form-control" value="<?= $candidate['user_id'] ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Fullname</label>
							<input type="text" class="form-control" value="<?= $candidate['name'] ?>" readonly>
						</div>
						<div class="form-group mb-0">
							<label for="">Birth Place/Date</label>
							<input type="text" class="form-control" value="<?= $candidate['birth_place'] . ", " . $candidate['birth_date'] ?>" readonly>
						</div>
						<div class="form-group mb-0">
							<label for="">Gender</label>
							<input type="text" class="form-control" value="<?= $candidate['gender_id'] ?>" readonly>
						</div>
						<div class="form-group mb-0">
							<label for="">Religion</label>
							<input type="text" class="form-control" value="<?= $candidate['religion_id'] ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Identity Number</label>
							<input type="text" class="form-control" value="<?= $candidate['nik'] ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Telephone Number</label>
							<input type="text" class="form-control" value="<?= $candidate['no_tlp'] ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Hand Phone Number</label>
							<input type="text" class="form-control" value="<?= $candidate['no_hp'] ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Address</label>
							<input type="text" class="form-control" value="<?= $candidate['address'] ?>" readonly>
						</div>
					</div>
					<div class="card-footer text-left">
						<a href="<?= base_url('admin/candidate') ?>" class="btn btn-icon icon-left btn-lg btn-primary">
							<i class="ion ion-ios-arrow-back"></i>Back
						</a>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-1 col-lg-1">
			</div>
		</div>
	</section>
</div>
