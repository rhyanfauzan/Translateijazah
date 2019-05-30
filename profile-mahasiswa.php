<div class="row small-spacing">
	<div class="col-md-3 col-xs-12">
		<div class="box-content bordered primary margin-bottom-20">
			<div class="profile-avatar">
				<img src="foto/<?php echo $objek->cek_gambar();?>" alt="">
				<form enctype="multipart/form-data" action="proses.php" method="post">
					<input type="file" name="fupload" class="form-control">
					<button type="submit" name="upload-foto" class="btn btn-block btn-friend"><i class="fa fa-send"></i> Upload File</button>
				</form>
				<h3><strong><?php echo $objek->get_info($_SESSION['username'], "Nama_Mahasiswa"); ?></strong></h3>
				
			</div>
			<!-- .profile-avatar -->
			<table class="table table-hover no-margin">
				<tbody>
					<tr>
						<td>Status</td>
						<td><span class="notice notice-danger"><?php echo $objek->get_info($_SESSION['username'], "status"); ?></span></td>
					</tr>
					<tr>
						<td>Angkatan</td>
						<td><?php echo $objek->get_info($_SESSION['username'], "Angkatan"); ?> / <?php echo $objek->get_info($_SESSION['username'], "Nama_Jurusan"); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- /.box-content -->
	</div>
	<!-- /.col-md-3 col-xs-12 -->
	<div class="col-md-9 col-xs-12">
		<div class="row">
			<div class="col-xs-12">
				<div class="box-content card">
					<h4 class="box-title"><i class="fa fa-user ico"></i>About</h4>
					<!-- /.box-title -->
	
					<!-- /.dropdown js__dropdown -->
					<div class="card-content">
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-xs-5"><label>Nama Mahasiswa :</label></div>
									<!-- /.col-xs-5 -->
									<div class="col-xs-7"><?php echo $objek->get_info($_SESSION['username'], "Nama_Mahasiswa"); ?></div>
									<!-- /.col-xs-7 -->
								</div>
								<!-- /.row -->
							</div>
							<!-- /.col-md-6 -->
							<div class="col-md-6">
								<div class="row">
									<div class="col-xs-5"><label>Angkatan :</label></div>
									<!-- /.col-xs-5 -->
									<div class="col-xs-7"><?php echo $objek->get_info($_SESSION['username'], "Angkatan"); ?></div>
									<!-- /.col-xs-7 -->
								</div>
								<!-- /.row -->
							</div>
							<!-- /.col-md-6 -->
							<div class="col-md-6">
								<div class="row">
									<div class="col-xs-5"><label>NIM :</label></div>
									<!-- /.col-xs-5 -->
									<div class="col-xs-7"><?php echo $objek->get_info($_SESSION['username'], "NIM"); ?></div>
									<!-- /.col-xs-7 -->
								</div>
								<!-- /.row -->
							</div>
							<!-- /.col-md-6 -->
							<div class="col-md-6">
								<div class="row">
									<div class="col-xs-5"><label>Status Kelulusan :</label></div>
									<!-- /.col-xs-5 -->
									<div class="col-xs-7"><?php echo $objek->get_info($_SESSION['username'], "Status"); ?></div>
									<!-- /.col-xs-7 -->
								</div>
								<!-- /.row -->
							</div>
							<!-- /.col-md-6 -->
							<div class="col-md-6">
								<div class="row">
									<div class="col-xs-5"><label>Fakultas :</label></div>
									<!-- /.col-xs-5 -->
									<div class="col-xs-7"><?php echo $objek->get_info($_SESSION['username'], "Nama_Fakultas"); ?></div>
									<!-- /.col-xs-7 -->
								</div>
								<!-- /.row -->
							</div>
							<!-- /.col-md-6 -->
							<!-- /.col-md-6 -->
							<div class="col-md-6">
								<div class="row">
									<div class="col-xs-5"><label>Jurusan :</label></div>
									<!-- /.col-xs-5 -->
									<div class="col-xs-7"><?php echo $objek->get_info($_SESSION['username'], "Nama_Jurusan"); ?> / <?php echo $objek->get_info($_SESSION['username'], "Jenjang"); ?></div>
									<!-- /.col-xs-7 -->
								</div>
								<!-- /.row -->
							</div>
							<!-- /.col-md-6 -->
							<!-- /.col-md-6 -->
							
							<div class="col-md-6">
								<div class="row">
									<div class="col-xs-5"><label>Ijazah :</label></div>
									<!-- /.col-xs-5 -->
									<div class="col-xs-7">
										<?php
										if ($objek->get_info($_SESSION['username'], "ijazah") != "") {
											echo "<a class='btn btn-danger btn-xs' target='_blank' href='ijazah/".$objek->get_info($_SESSION['username'], "ijazah")."'><i class='fa fa-file-archive-o'></i> Lihat File</a>";
										}else{
											echo "File belum diupload";
										}
										?>
										<form enctype="multipart/form-data" action="proses.php" method="post">

											<input type="file" name="fupload">
											<button type="submit" name="upload-ijazah" class="btn btn-primary btn-friend"><i class="fa fa-send"></i> Upload Ijazah</button>
										</form>
									</div>
									<!-- /.col-xs-7 -->
								</div>
								<!-- /.row -->
							</div>
							<!-- /.col-md-6 -->
							<!-- /.col-md-6 -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content card -->
			</div>
			<!-- /.col-md-12 -->
			<!-- /.col-md-6 -->
			<!-- /.col-md-6 -->
		</div>
		<?php
			if (@mysqli_num_rows($objek->query("SELECT * FROM notif WHERE nim = '".$_SESSION['username']."' AND status = '1'")) > 0) {
				
			
		?>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="box-content card">
					<h4 class="box-title"><i class="ti-files"></i> File Ijazah</h4>
					<div class="card-content">
						<ul class="notice-list">
							<li>
								<a href="config/pdf.php?id=<?= $_SESSION['username']; ?>" target="_blank">
									<span class="avatar bg-warning"><i class="fa fa-cloud-download"></i></span>
									<span class="name">Download File</span>
									<span class="desc">Selamat, ijazah anda telah diproses admin !!</span>
								</a>
							</li>
						</ul>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content card -->
			</div>
		</div>
		<?php
			}
		?>
		<!-- /.row -->
	</div>
	<!-- /.col-md-9 col-xs-12 -->
</div>