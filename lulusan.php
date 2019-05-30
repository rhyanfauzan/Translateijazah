<div class="row small-spacing">
	<div class="col-xs-12">
		<div class="box-content">
			<h4 class="box-title">Data Lulusan Mahasiswa</h4>
			<!-- /.box-title -->
			<div class="dropdown js__drop_down">
				<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
				<ul class="sub-menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else there</a></li>
					<li class="split"></li>
					<li><a href="#">Separated link</a></li>
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
					$q = $objek->query("SELECT * FROM mahasiswa WHERE status = 'LULUS'");
					while ($data = @mysqli_fetch_array($q)) {
						echo
						'<tr>
						<th>'.$data['NIM'].'</th>
						<th>'.$data['Nama_Mahasiswa'].'</th>
						<th>'.$data['Nama_Fakultas'].' / '.$data['Nama_Jurusan'].'</th>
						<th>'.$data['Jenjang'].'</th>
						<th>'.$data['Angkatan'].'</th>
						<th>
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