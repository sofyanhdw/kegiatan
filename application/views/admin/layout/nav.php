           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <!-- nav user/pengguna-->	                   
                    <li>
                        <a href="#"><i class="fa fa-user fa-3x"></i> Pengguna<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url('admin/user'); ?>">Data Pengguna</a>
                                <a href="<?php echo base_url('admin/user/tambah'); ?>">Tambah Pengguna</a>
                            </li>
                        </ul>
                      </li>
                      <!-- End nav user/pengguna-->
                      <!-- nav prodi-->
                      <li>
                        <a href="#"><i class="fa fa-user fa-3x"></i> Prodi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url('admin/user'); ?>">Data Prodi</a>
                                <a href="<?php echo base_url('admin/user/tambah'); ?>">Tambah Prodi</a>
                            </li>
                        </ul>
                      </li>
                      <!-- End nav prodi-->
                      <!-- nav job -->
                      <li>
                        <a href="#"><i class="fa fa-newspaper-o fa-3x"></i> Lowongan Pekerjaan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url('admin/job'); ?>">Data Lowongan</a>
                                <a href="<?php echo base_url('admin/job/tambah'); ?>">Tambah Lowongan Pekerjaan</a>
                            </li>
                        </ul>
                      </li> 
                      <!-- End nav job -->
                      <!-- nav kegiatan alumni -->
                       <li>
                        <a href="#"><i class="fa fa-calendar-o fa-3x"></i> Kegiatan Alumni<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url('admin/kegiatan'); ?>">Data Kegiatan Alumni</a>
                                <a href="<?php echo base_url('admin/kegiatan/tambah'); ?>">Tambah Kegiatan Alumni</a>
                            </li>
                        </ul>
                      </li>
                      <!-- End nav kegiatan alumni -->
                      <!-- nav Kuisioner -->
                       <li>
                        <a href="#"><i class="fa fa-file-o fa-3x"></i> Kuisioner<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url('admin/kegiatan'); ?>">Data Kegiatan Alumni</a>
                                <a href="<?php echo base_url('admin/kegiatan/tambah'); ?>">Tambah Kegiatan Alumni</a>
                            </li>
                        </ul>
                      </li>
                      <!-- End nav Kuisioner -->  	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php echo $title; ?></h2>   
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

