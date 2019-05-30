<div class="row small-spacing">
	<div class="col-xs-12">
		<div class="box-content">
			<h4 class="box-title">Data Mahasiswa <a href="?page=tambah-mahasiswa" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Data</a></h4>
			<!-- /.box-title -->
			<div class="dropdown js__drop_down">
				<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
				<ul class="sub-menu">
					<li><a href="#">Action</a></li>
				</ul>
				<!-- /.sub-menu -->
			</div>
			<!-- /.dropdown js__dropdown -->
			<table id="example-row-grouping" class="table table-striped table-bordered display" style="width:100%">
				<thead>
					<tr>
						<th>NIM</th>
						<th>Nama Mahasiswa</th>
						<th>Jurusan</th>
						<th>Jenjang</th>
						<th>Angkatan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$q = $objek->query("SELECT * FROM mahasiswa");
					while ($data = @mysqli_fetch_array($q)) {
						echo
						'<tr>
						<th>'.$data['NIM'].'</th>
						<th>'.$data['Nama_Mahasiswa'].'</th>
						<th>'.$data['Nama_Fakultas'].' / '.$data['Nama_Jurusan'].'</th>
						<th>'.$data['Jenjang'].'</th>
						<th>'.$data['Angkatan'].'</th>
						<th>
						<a href="?page=tambah-mahasiswa&id='.$data['NIM'].'" class="btn btn-success">Edit</a>&nbsp;
						<a href="proses.php?del-mahasiswa='.$data['NIM'].'" class="btn btn-danger" onclick="return confirm(\'Apakah anda yakin ingin menghapus nim '.$data['NIM'].'?\');">Delete</a>
						</th>
						</tr>';
					}
					?>
					
				</tbody>
			</table>
		</div>
		<!-- /.box-content -->
	</div>
</div>