<p><a href="<?php echo base_url('admin/kegiatan/tambah'); ?>" class="btn btn-primary">
<i class="fa fa-plus"></i>Tambah</a>
</p>
 
<?php
//cetak notifikasi
if($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>#</th>
            <th>Deskripsi</th>
            <th>Video</th>
            <th>Tanggal Posting</th>
            <th>Nama File</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1; foreach ($tbl_kegiatan as $data) { ?>
        <tr class="odd gradeX">
            <td><?php echo $i ?></td>
            <td><?php echo $data->deskripsi ?></td>
            <td><?php echo $data->video ?></td>
            <td><?php echo $data->datetime ?></td>
            <td><img src="<?php echo base_url('./assets/images/'.$data->file_gambar.'');?>" height="50px" width="50px"></td>
            <td>
                <a href="<?php echo base_url('admin/kegiatan/edit_data/'.$data->id_kegiatan); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                <a href="<?php echo base_url('admin/kegiatan/delete/'.$data->id_kegiatan); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
               
            </td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
 
<?php
        foreach($tbl_kegiatan as $data):
         
        ?>
        
    <?php endforeach;?>