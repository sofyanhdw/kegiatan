<?php 
//validasi input
echo validation_errors('<div class="alert alert-warning">', '</div>');


?>
<form action="<?php base_url('admin/kegiatan/edit_data/'.$detail->id_kegiatan); ?>" method="post" enctype="multipart/form-data" >
<div class="col-md-12">

	<div class="form-group form-group-lg">
		<label>Kode Kegiatan</label>
		<input name="kode_barang" value="<?php echo $detail->id_kegiatan;?>" class="form-control" type="text" placeholder="Kode Kegiatan..." readonly>
	</div>
</div>
<div class="col-md-12">

	<div class="form-group form-group-lg">
		<label>Judul Kegiatan</label>
		<input name="judul_keg" value="<?php echo $detail->judul;?>" class="form-control" type="text" placeholder="Judul Kegiatan...">
	</div>
</div>
<div class="col-md-12">

	<div class="form-group form-group-lg">
		<label>Video Kegiatan</label>
		<input name="video" value="<?php echo $detail->video;?>" class="form-control" type="text" placeholder="Judul Kegiatan...">
	</div>
</div>
<div class="col-md-12">
	<div class="form-group form-group-lg">
		<label>Deskripsi Kegiatan</label>
		<textarea id="editor1" class="form-control" name="Deskripsi_keg" placeholder="Deskripsi Pekerjaan">
			<?php echo $detail->deskripsi ?>
		</textarea>
	</div>
</div>
<div class="col-md-12">

	<div class="form-group form-group-lg">
		<label>Gambar Kegiatan</label><br>
		<img src="<?php echo base_url('./assets/images/'.$detail->file_gambar.'');?>" height="150px" width="150px"><br>&nbsp;
                             <input type ="file" class="form-control" name="update_gambar">
	</div>
</div>
<div class="form-group">
	<input type="submit" name="submit" class="btn btn-primary btn-lg" value="simpan">
	<a href="<?php echo base_url('admin/kegiatan') ?>" class="btn btn-default btn-lg">cancel</a>
</div>
</div>

<script>
	CKEDITOR.replace('editor1');
</script>          
 
<?php 
//close form
echo form_close();
?>