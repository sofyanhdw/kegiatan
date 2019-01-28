<?php 
//validasi input
echo validation_errors('<div class="alert alert-warning">', '</div>');

//open form
echo form_open(base_url('admin/user/edit/'.$detail->id_alumni));
?>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>NPM</label>
		<input type="text" name="npm" id="npm" class="form-control" placeholder="npm" value="<?php echo $detail->npm ?>">
	</div>
</div>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Nama</label>
		<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" value="<?php echo $detail->nama_users ?>">
	</div>
</div>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Password</label>
		<input type="password" name="password_user"class="form-control" placeholder="Nama" value="<?php echo $detail->pass_users ?>">
	</div>
</div>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Hak Akses</label>
		<select class="form-control show-tick"  name="hak_akses">
			<option value="Admin" 
				<?php if($detail->Akses_users=="admin") { echo 'selected'; } ?>>admin
			</option>
			<option value="users" 
				<?php if($detail->Akses_users=="users") { echo 'selected'; } ?>>users
			</option>
		</select>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Jurusan</label>
		<select class="form-control show-tick" id="jurusan" name="jurusan">
			<option value="Teknik Informatika" 
				<?php if($detail->jurusan=="Teknik Informatika") { echo 'selected'; } ?>>Teknik Informatika
			</option>
			<option value="Sistem Informatika" 
				<?php if($detail->jurusan=="Sistem Informatika") { echo 'selected'; } ?>>Sistem Informatika
			</option>
			<option value="Manajemen Informatika" 
				<?php if($detail->jurusan=="Manajemen Informatika") { echo 'selected'; } ?>>Manajemen Informatika
			</option>
		</select>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Angkatan</label>
		<input type="text" id="angkatan" name="angkatan" class="form-control" placeholder="Angkatan" 
		value="<?php echo $detail->angkatan ?>">
	</div>
</div>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Tahun Lulus</label>
		<input type="text" id="tahun_lulus" name="tahun_lulus" class="form-control" placeholder="Tahun Lulus" 
		value="<?php echo $detail->tahun_lulus ?>">
	</div>
<div class="form-group">
	<input type="submit" name="submit" class="btn btn-primary btn-lg" value="simpan">
	<a href="<?php echo base_url('admin/user') ?>" class="btn btn-default btn-lg">cancel</a>
</div>
</div>


<?php 
//close form
echo form_close();
?>