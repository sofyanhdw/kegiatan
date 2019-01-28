
<?php 
//validasi input
echo validation_errors('<div class="alert alert-warning">', '</div>');

//open form
echo form_open(base_url('admin/job/tambah'));
?>
<div class="col-md-12">
	<div class="form-group form-group-lg">
		<label>Job Title</label>
		<input type="text" name="job_title" class="form-control" placeholder="Job Title" value="<?php echo set_value('job_title'); ?>">
	</div>
</div>
<div class="col-md-12">
	<div class="form-group form-group-lg">
		<label>Deskripsi Pekerjaan</label>
		<textarea id="editor1" class="form-control" name="info" placeholder="Deskripsi Pekerjaan">
			<?php echo set_value('info'); ?>
		</textarea>
	</div>
<div class="form-group">
	<input type="submit" name="submit" class="btn btn-primary btn-lg" value="simpan">
	<a href="<?php echo base_url('admin/job') ?>" class="btn btn-default btn-lg">cancel</a>
</div>
</div>
<script>
	CKEDITOR.replace('editor1');
</script>
<?php 
//close form
echo form_close();
?>