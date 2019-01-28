<?php 
//validasi input
echo validation_errors('<div class="alert alert-warning">', '</div>');

//open form
echo form_open(base_url('admin/user/tambah'));
?>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>NPM</label>
		<input type="text" name="npm" class="form-control" placeholder="npm" value="<?php echo set_value('npm'); ?>">
	</div>
</div>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Nama</label>
		<input type="text" name="nama_users" class="form-control" placeholder="Nama" value="<?php echo set_value('nama_users'); ?>">
	</div>
</div>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Jurusan</label>
			<select class="form-control" name="jurusan">
				<option value="Teknik Informatika">Teknik Informatika</option>
				<option value="Sistem Informatika">Sistem Informatika</option>
				<option value="Manajemen Informatika">Manajemen Informatika</option>
			</select>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Angkatan</label>
		<input type="text" name="angkatan" class="form-control" placeholder="Angkatan" value="<?php echo set_value('angkatan'); ?>">
	</div>

</div>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Password Alumni</label>
		<input type="password" name="password_user" class="form-control" placeholder="Password Alumni" value="<?php echo set_value('pass_users'); ?>">
	</div>
	<div class="form-group form-group-lg">
		<label>Hak Akses</label>
			<select class="form-control" name="hak_akses">
				<option value="admin">Admin</option>
				<option value="users">User</option>
				
			</select>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Tahun Lulus</label>
		<input type="text" name="tahun_lulus" class="form-control" placeholder="Tahun Lulus" value="<?php echo set_value('tahun_lulus'); ?>">
	</div>
</div>
<div class="col-md-6">
<div class="form-group">
	<input type="submit" name="submit" class="btn btn-primary btn-lg" value="simpan">
	<a href="<?php echo base_url('admin/user') ?>" class="btn btn-default btn-lg">cancel</a>
</div>
</div>


<?php 
//close form
echo form_close();
?>