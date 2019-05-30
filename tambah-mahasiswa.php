<?php
	if (isset($_GET['id'])) {
		$data = @mysqli_fetch_array($objek->query("SELECT * FROM mahasiswa WHERE NIM = '".$_GET['id']."'"));
		$action = "update-mahasiswa";
		$read = 'readonly="readonly"';
	}else{
		$data["Nama_Mahasiswa"] = "";
		$data["NIM"] = "";
		$data["Nama_Fakultas"] = "";
		$data["Nama_Jurusan"] = "";
		$data["Jenjang"] = "";
		$data["Angkatan"] = "";
		$data["status"] = "";
		$action = "tambah-mahasiswa";
		$read = '';
	}
?>
<div class="row small-spacing">
	<div class="col-lg-12 col-xs-12">
		<div class="box-content card white">
			<h4 class="box-title">Tambah Data Mahasiswa</h4>
			<div class="card-content">
				<form method="post" action="proses.php">
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Mahasiswa</label>
						<input type="text" required="required" class="form-control" name="data[Nama_Mahasiswa]" id="exampleInputEmail1" placeholder="Masukan Nama Mahasiswa" value="<?= $data['Nama_Mahasiswa']; ?>">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">NIM</label>
						<input type="number" required="required" class="form-control" name = "data[NIM]" id="exampleInputPassword1" <?= $read; ?> placeholder="Masukan NIM" value="<?= $data['NIM']; ?>">
					</div>
					<div class="form-group">
						<label for="exampleInputFile">Fakultas</label>
						<select required="required" class="form-control" name = "data[Nama_Fakultas]" >
							<?php
								if(isset($_GET['id'])){
							?>
								<option value="ADAB" <?= $objek->isSelected("ADAB", $data["Nama_Fakultas"], 'selected="selected"') ?>>ADAB</option>
								<option value="SAINTEK" <?= $objek->isSelected("SAINTEK", $data["Nama_Fakultas"], 'selected="selected"') ?>>SAINTEK</option>
								<option value="DAKWAH" <?= $objek->isSelected("DAKWAH", $data["Nama_Fakultas"], 'selected="selected"') ?>>DAKWAH</option>
								<option value="FISIP" <?= $objek->isSelected("FISIP", $data["Nama_Fakultas"], 'selected="selected"') ?>>FISIP</option>
								<option value="HUKUM" <?= $objek->isSelected("HUKUM", $data["Nama_Fakultas"], 'selected="selected"') ?>>HUKUM</option>

							<?php
								}
								else{
							?>
									<option value="ADAB">ADAB</option>
									<option value="SAINTEK">SAINTEK</option>
									<option value="DAKWAH">DAKWAH</option>
									<option value="FISIP">FISIP</option>
									<option value="HUKUM">HUKUM</option>
							<?php
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Jurusan</label>
						<select required="required" class="form-control" name = "data[Nama_Jurusan]" >
						<?php
								if(isset($_GET['id'])){
							?>
								<option value="Teknik Informatika" <?= $objek->isSelected("Teknik Informatika", $data["Nama_Jurusan"], 'selected="selected"') ?>>Teknik Informatika</option>
								<option value="Teknik Elektro" <?= $objek->isSelected("Teknik Elektro", $data["Nama_Jurusan"], 'selected="selected"') ?>>Teknik Elektro</option>
								<option value="Fisika" <?= $objek->isSelected("Fisika", $data["Nama_Jurusan"], 'selected="selected"') ?>>Fisika</option>
								<option value="Kimia" <?= $objek->isSelected("FISIP", $data["Nama_Jurusan"], 'selected="selected"') ?>>Kimia</option>
								<option value="Agroteknologi" <?= $objek->isSelected("Agroteknologi", $data["Nama_Jurusan"], 'selected="selected"') ?>>Agroteknologi</option>
								<option value="Biologi" <?= $objek->isSelected("Biologi", $data["Nama_Jurusan"], 'selected="selected"') ?>>Biologi</option>
								<option value="Matematika" <?= $objek->isSelected("Matematika", $data["Nama_Jurusan"], 'selected="selected"') ?>>Matematika</option>
								<?php
								}
								else{
								?>

								<option value="Teknik Informatika">Teknik Informatika</option>
									<option value="Teknik Elektro">Teknik Elektro</option>
									<option value="Fisika">Fisika</option>
									<option value="Kimia">Kimia</option>
									<option value="Agroteknologi">Agroteknologi</option>
									<option value="Biologi">Biologi</option>
									<option value="Matematika">Matematika</option>
							<?php
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Jenjang</label>
						<select required="required" class="form-control" name = "data[Jenjang]">
							<?php
								if(isset($_GET['id'])){
							?>
								<option value="S2" <?= $objek->isSelected("S2", $data["Jenjang"], 'selected="selected"') ?>>S2</option>
								<option value="S1" <?= $objek->isSelected("S1", $data["Jenjang"], 'selected="selected"') ?>>S1</option>
							<?php
								}
								else{
							?>
								<option value="S2">S2</option>
								<option value="S1">S1</option>
							<?php
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Angkatan</label>
						<input type="number" class="form-control" value="<?= $data['Angkatan']; ?>" name = "data[Angkatan]" id="exampleInputPassword1" placeholder="Masukan Angkatan">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Status</label>
					</div>
					<div class="form-group">
						<?php
							if(isset($_GET['id'])){
						?>
							<input type="radio" name = "data[status]" value="Lulus" id="chk-1" <?= $objek->isSelected("Lulus", $data["status"], 'checked="checked"') ?>><label for="chk-1">Lulus</label>
							<input type="radio" name = "data[status]" value="Tidak Lulus" id="chk-2" <?= $objek->isSelected("Tidak Lulus", $data["status"], 'checked="checked"') ?>><label for="chk-2">Tidak Lulus</label>
						<?php
							}
							else{
						?>
							<input type="radio" name = "data[Status]" value="Lulus" id="chk-1"><label for="chk-1">Lulus</label>
							<input type="radio" name = "data[Status]" value="Tidak Lulus" id="chk-2"><label for="chk-2">Tidak Lulus</label>
						<?php
							}
						?>
					</div>
					<button type="submit" name="<?= $action; ?>" class="btn btn-primary btn-sm waves-effect waves-light">Proses</button>
				</form>
			</div> 
			
		</div>
	</div>
</div>
</div>