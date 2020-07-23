<div class="main-content" style="min-height: 557px;">
	<section class="section">
		<div class="section-header">
			<h1>Update Candidate Data</h1>
		</div>
		<div class="row">
			<div class="col-12 col-md-1 col-lg-1">
			</div>
			<div class="col-12 col-md-10 col-lg-10">
				<div class="card">
					<div class="card-header">
						<h4>Update Data</h4>
					</div>
					<div class="card-body">
						<form action="admin/candidate/update" method="post">
							<div class="form-group">
								<label for="">Fullname</label>
								<input type="text" class="form-control" value="<?= $candidate['name'] ?>">
							</div>
							<div class="form-group mb-0">
								<label for="">Birth Place</label>
								<input type="text" class="form-control" value="<?= $candidate['birth_place'] ?>">
							</div>
							<div class="form-group mb-0">
								<label for="">Birth Date</label>
								<input type="date" class="form-control" value="<?= $candidate['birth_date'] ?>">
							</div>
							<div class="form-group mb-0">
								<label for="">Gender</label>
								<input type="text" class="form-control" value="<?= $candidate['gender'] ?>">
							</div>
							<div class="form-group mb-0">
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
						<a href="<?= base_url('a_candidate') ?>" class="btn btn-icon icon-left btn-primary">
							<i class="ion ion-ios-arrow-back"></i>Back
						</a>
						<a href="<?= base_url('a_candidate/update') ?>" class="btn btn-icon btn-success">
							<i class="far fa-edit"></i> Update
						</a>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-1 col-lg-1">
			</div>
		</div>
	</section>
</div>
