<section class="section">
	<div class="section-header">
		<h1>Update Candidate Data</h1>
	</div>
	<div class="row">
		<div class="col-12 col-md-12 col-lg-12">
			<div class="card">
				<div class="card-body">
					<form action="<?= base_url() ?>a_candidate/update" method="POST">
						<div class="form-group">
							<label for="istr_candidate_id">Candidate ID</label>
							<input type="text" class="form-control" name="istr_candidate_id" value="<?= $candidate['candidate_id'] ?>" readonly>
						</div>
						<div class="form-group">
							<label for="istr_user_id">Username Account</label>
							<input type="text" class="form-control" name="istr_user_id" value="<?= $candidate['user_name'] ?>" readonly>
						</div>
						<div class="form-group">
							<label for="istr_name">Fullname</label>
							<input type="text" class="form-control" name="istr_name" value="<?= $candidate['name'] ?>">
						</div>
						<div class="form-group">
							<label for="istr_email">Email</label>
							<input type="text" class="form-control" name="istr_email" value="<?= $candidate['email'] ?>">
						</div>
						<div class="form-group">
							<label for="istr_birth_place">Birth Place</label>
							<input type="text" class="form-control" name="istr_birth_place" value="<?= $candidate['birth_place'] ?>">
						</div>
						<div class="form-group">
							<label for="istr_nik">NIK</label>
							<input type="text" class="form-control" name="istr_nik" value="<?= $candidate['nik'] ?>">
						</div>
						<div class="form-group">
							<label for="istr_no_tlp">Telephone Number</label>
							<input type="text" class="form-control" name="istr_no_tlp" value="<?= $candidate['no_tlp'] ?>">
						</div>
						<div class="form-group">
							<label for="istr_no_hp">Hand Phone Number</label>
							<input type="text" class="form-control" name="istr_no_hp" value="<?= $candidate['no_hp'] ?>">
						</div>
						<div class="form-group">
							<label for="istr_birth">Birth Date</label>
							<input type="date" class="form-control" name="istr_birth" value="<?= $candidate['birth_date'] ?>">
						</div>
						<div class="form-group">
							<label for="istr_img_path">Image Path</label>
							<input type="text" class="form-control" name="istr_img_path" value="<?= $candidate['img_path'] ?>">
						</div>
						<div class="form-group">
							<label for="istr_address">Address</label>
							<input type="text" class="form-control" name="istr_address" value="<?= $candidate['address'] ?>">
						</div>
						<div class="form-group">
							<label for="istr_gender_id">Gender</label>
							<select class="form-control form-control-sm" name="istr_gender_id">
								<option value="<?= $candidate['gender_id'] ?>">Default Choice - <?= $candidate['gender'] ?></option>
								<? foreach ($gender as $gnd):?>
								<option value="<?= $gnd['p_reference_list_id'] ?>"><?= $gnd['description'] ?></option>
								<?endforeach;?>
							</select>
						</div>
						<div class="form-group">
							<label for="istr_religion_id">Religion</label>
							<select class="form-control form-control-sm" name="istr_religion_id">
								<option value="<?= $candidate['religion_id'] ?>">Default Choice - <?= $candidate['religion'] ?></option>
								<? foreach ($religion as $rlg):?>
								<option value="<?= $rlg['p_reference_list_id'] ?>"><?= $rlg['description'] ?></option>
								<?endforeach;?>
							</select>
						</div>
						<div class="form-group">
							<label for="istr_result_id">Result</label>
							<input type="text" class="form-control" name="istr_result_id" value="<?= $candidate['final_result'] ?>">
						</div>
						<div class="form-group">
							<label for="">Created Date</label>
							<input type="text" class="form-control" name="" value="<?= $candidate['created_date'] ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Created By</label>
							<input type="text" class="form-control" name="" value="<?= $candidate['created_by'] ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Update Date</label>
							<input type="text" class="form-control" name="" value="<?= $candidate['update_date'] ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Update By</label>
							<input type="text" class="form-control" name="" value="<?= $candidate['update_by'] ?>" readonly>
						</div>
						<button type="button" class="btn btn-icon btn-danger" data-dismiss="modal">
							<i class="fas fa-times"></i> Cancel
						</button>
						<button type="submit" class="btn btn-icon btn-success">
							<i class="fas fa-times"></i> Update
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
