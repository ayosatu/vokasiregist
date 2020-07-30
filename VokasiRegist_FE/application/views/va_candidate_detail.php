<section class="section">
	<div class="section-header">
		<h1>Candidate Details</h1>
	</div>
	<div class="row">
		<div class="col-12 col-md-12 col-lg-12">
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
					<div class="form-group">
						<label for="">Birth Place/Date</label>
						<input type="text" class="form-control" value="<?= $candidate['birth_place'] . ", " . $candidate['birth_date'] ?>" readonly>
					</div>
					<div class="form-group">
						<label for="">Gender</label>
						<input type="text" class="form-control" value="<?= $candidate['gender'] ?>" readonly>
					</div>
					<div class="form-group">
						<label for="">Religion</label>
						<input type="text" class="form-control" value="<?= $candidate['religion'] ?>" readonly>
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
				<button type="button" class="btn btn-icon btn-danger deleteButton" data-dismiss="modal">
					<i class="fas fa-times"></i> Close
				</button>
			</div>
		</div>
	</div>
</section>
