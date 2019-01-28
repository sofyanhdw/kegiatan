<?php
//validasi input
echo validation_errors('<div class="alert alert-warning">', '</div>');
 
//open form


?>
<form action="<?php base_url('admin/kegiatan/tambah') ?>" method="post" enctype="multipart/form-data" >
<div class="col-md-6">
    <div class="form-group form-group-lg">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" placeholder="Judul Kegiatan" value="<?php echo set_value('judul'); ?>">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group form-group-lg">
        <label>Video</label>
        <input type="text" name="video" class="form-control" placeholder="Video" value="<?php echo set_value('video'); ?>">
    </div>
</div>
<div class="col-md-12">
    <div class="form-group form-group-lg">
        <label>Deskripsi Kegiatan</label>
        <textarea id="editor1" class="form-control" name="deskripsi" placeholder="Deskripsi Kegiatan">
            <?php echo set_value('deskripsi'); ?>
        </textarea>
    </div>
</div>
    <div class="col-md-12">
    <div class="form-group form-group-lg">
        <label>Upload Gambar</label>
        <input type ="file" class="form-control" name="upload_gambar" value="<?php echo set_value('upload_gambar'); ?>">
           
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