<section class="section">
	<div class="section-header">
		<h1>Update Candidate Data</h1>
	</div>
	<div class="row">
		<div class="col-12 col-md-12 col-lg-12">
			<div class="card">
				<div class="card-body">
					<form action="a_candidate/update" method="post">
						<div class="form-group">
							<label for="">Fullname</label>
							<input type="text" class="form-control" value="<?= $candidate['name'] ?>">
						</div>
						<div class="form-group">
							<label for="">Birth Place</label>
							<input type="text" class="form-control" value="<?= $candidate['birth_place'] ?>">
						</div>
						<div class="form-group">
							<label for="">Birth Date</label>
							<input type="date" class="form-control" value="<?= $candidate['birth_date'] ?>">
						</div>
						<div class="form-group">
							<label for="">Gender</label>
							<input type="text" class="form-control" value="<?= $candidate['gender'] ?>">
						</div>
						<div class="form-group">
							<label for="">Religion</label>
							<input type="text" class="form-control" value="<?= $candidate['religion'] ?>">
						</div>
						<div class="form-group">
							<label for="">Identity Number</label>
							<input type="text" class="form-control" value="<?= $candidate['nik'] ?>">
						</div>
						<div class="form-group">
							<label for="">Telephone Number</label>
							<input type="text" class="form-control" value="<?= $candidate['no_tlp'] ?>">
						</div>
						<div class="form-group">
							<label for="">Hand Phone Number</label>
							<input type="text" class="form-control" value="<?= $candidate['no_hp'] ?>">
						</div>
						<div class="form-group">
							<label for="">Address</label>
							<input type="text" class="form-control" value="<?= $candidate['address'] ?>">
						</div>
					</form>
				</div>
				<div class="card-footer text-right">
					<button type="button" class="btn btn-icon btn-danger deleteButton" data-dismiss="modal">
						<i class="fas fa-times"></i> Cancel
					</button>
					<a href="<?= base_url('a_candidate/update') ?>" class="btn btn-icon btn-success">
						<i class="far fa-edit"></i> Update
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
