<p><a href="<?php echo base_url('admin/job/tambah'); ?>" class="btn btn-primary">
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
            <th>Job Title</th>
            <th>Deskripsi Pekerjaan</th>
            <th>Tanggal Posting</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1; foreach ($tbl_job as $data) { ?>
        <tr class="odd gradeX">
            <td><?php echo $i ?></td>
            <td><?php echo $data->job_title ?></td>
            <td><?php echo $data->info ?></td>
            <td><?php echo $data->datetime ?></td>
            <td>
            	<a href="<?php echo base_url('admin/job/edit/'.$data->id_job); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
            	<?php 
            		include('delete.php');
            	?>
            </td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>