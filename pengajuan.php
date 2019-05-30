<div class="row small-spacing">
	<div class="col-xs-12">
		<div class="box-content">
			<h4 class="box-title">Data Pengajuan Ijazah</h4>
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
					$q = $objek->query("SELECT B.*, A.`status` FROM notif A LEFT JOIN mahasiswa B ON B.nim = A.NIM WHERE B.STATUS = 'Lulus' AND B.ijazah <> ''");
					while ($data = @mysqli_fetch_array($q)) {
						if($data['status'] == 0){
							$color = ' style="background-color:#e53434; color:white;"';
						}else{
							$color = '';
						}
						echo
						'<tr '.$color.'>
						<th>'.$data['NIM'].'</th>
						<th>'.$data['Nama_Mahasiswa'].'</th>
						<th>'.$data['Nama_Fakultas'].' / '.$data['Nama_Jurusan'].'</th>
						<th>'.$data['Jenjang'].'</th>
						<th>'.$data['Angkatan'].'</th>
						<th>
							<a href="config/pdf.php?id='.$data['NIM'].'" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> Print</a>&nbsp;
							<a href="ijazah/'.$data["ijazah"].'" target="_blank" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Lihat Ijazah</a>
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