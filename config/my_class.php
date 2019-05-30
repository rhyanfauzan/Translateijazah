<?PHP
	class dash{
		function __construct($host,$username,$password,$name){
			#$this->name =$name;
			$this->con = new mysqli($host,$username,$password,$name) or die($this->con->error());
		}
		
		function __destruct(){
			$this->con->close();
		}

		function antihac($d){
			$d=stripslashes(strip_tags(htmlspecialchars($d,ENT_QUOTES)));
			return $d;
		}
		function isSelected($val1, $val2, $action){
			if($val1 == $val2)
				return $action;
			else
				return "";
		}
		function dekan($fakultas){
			$data = array();
			switch ($fakultas) {
				case 'SAINTEK':
					$data["nama"] = "Dr. H.Opik Taupik  Kurahman";
					$data["nip"] = "1968121141996031001";
					$data["fakultas"] = "Science And Technology";
					break;
				
				default:
					$data["nama"] = "Dr. H.Maman Sudrajat";
					$data["nip"] = "19681211419960318901";
					$data["fakultas"] = "Science Agama";
					break;
			}
			return $data;
		}
		function gelar($jurusan, $jenjang){
			$gelar = "";
			if($jenjang == "S1"){
				switch ($jurusan) {
					case 'Teknik Informatika':
						$gelar = "SARJANA KOMPUTER (S. KOM)";
						break;

					case 'Teknik Elektro':
						$gelar = "SARJANA TEKNIK (S.T)";
						break;

					case 'Kimia':
						$gelar = "SARJANA SAINS (S.Si)";
						break;

					case 'Fisika':
						$gelar = "SARJANA SAINS (S.Si)";
						break;

					case 'Agroteknologi':
						$gelar = "SARJANA SAINS (S.Si)";
						break;

					case 'Biologi':
						$gelar = "SARJANA SAINS (S.Si)";
						break;

					case 'Matematika':
						$gelar = "SARJANA SAINS (S.Si)";
						break;
					
					default:
						$gelar = "SARJANA Agama (S.Ag)";
						break;						break;
				}
			}else{
				switch ($jurusan) {
					case 'Teknik Informatika':
						$gelar = "MAGISTER KOMPUTER (M. KOM)";
						break;

					case 'Teknik Elektro':
						$gelar = "MAGISTER TEKNIK (M.T)";
						break;

					case 'Kimia':
						$gelar = "MAGISTER SAINS (M.Si)";
						break;

					case 'Fisika':
						$gelar = "MAGISTER SAINS (M.Si)";
						break;

					case 'Agroteknologi':
						$gelar = "MAGISTER SAINS (M.Si)";
						break;

					case 'Biologi':
						$gelar = "MAGISTER SAINS (M.Si)";
						break;

					case 'Matematika':
						$gelar = "MAGISTER SAINS (M.Si)";
						break;
					
					default:
						$gelar = "SARJANA AGAMA (M.Ag)";
						break;
				}
			}
			
			return $gelar;
		}
		function INSERT($table, $value) {
			$fild = "";
			$val = "";
			$i = 0;
			foreach($value as $key => $value){
				if ($i < 1){
					$koma = "";
				} else {
					$koma = ", ";
				}
				$fild .= $koma . $key;
				$val .= $koma . "'".$value."'" ;
				$i++;
			}
			$field = ("INSERT INTO {$table} ({$fild}) VALUES ({$val})");
			$this->result = $this->con->query($field);
			
			return $this->result;
		}
		function DELETE($tabel, $where='', $key=''){
			$delete = "WHERE $where='".$key."'";
			$hapus = ("DELETE FROM {$tabel} {$delete}");
			$this->result = $this->con->query($hapus);
			
			return $this->result;
		}
		function UPDATE($table, $value, $key_id, $id){
			$fild = "";
			$val = "";
			$i = 0;
			foreach($value as $key => $value){
				if ($i < 1){
					$koma = "";
				} else {
					$koma = ", ";
				}
				$fild .= $koma . $key . " = '".$this->con->real_escape_string($value)."'";
				$i++;
			}
			$field = ("UPDATE {$table} SET {$fild} WHERE {$key_id} = '{$id}'");
			$this->result = $this->con->query($field);

			return $this->result;
		}
		function query($q){
			$this->result = $this->con->query($q);
			
			return $this->result;
		}
		public function login($username='', $password=''){
			$pass = md5($password);
			$u = $username;
			$filter = "WHERE username= '{$u}' AND password='{$pass}'";
			$data = "SELECT * FROM user {$filter}";
			
			$this->result = $this->con->query($data);
			
			if($this->result->num_rows > 0){
				$array = @mysqli_fetch_array($this->result);
				// session_save_path('../session');
				session_start();
				$_SESSION['username'] = $username;
				$_SESSION['level'] = $array['level'];
				$this->result = $this->con->query($data);
				return true;
			}
			
			return false;
		}
		public function logout(){
			// session_save_path('../session');
			session_start();
			session_unset('nim');
			session_unset('level');
			session_destroy();

			return true;
		}
		function notif(){
			$q = $this->query("SELECT * FROM notif WHERE status = 0");
			if($q->num_rows > 0){
				return '<span class="notice notice-yellow">'.$q->num_rows.'</span>';
			}else{
				return '';
			}
		}
		function cek_gambar(){
			$q = $this->query("SELECT * FROM mahasiswa WHERE NIM = '".$_SESSION['username']."'");
			$data = @mysqli_fetch_array($q);
			$file = "foto/".$data['foto'];
			if($data['foto'] == ""){
				return "450x450.png";
			}
			else if(file_exists($file)) {
				return $data['foto'];
			}else{
				return "450x450.png";
			}
		}
		function rubah_tgl($date){
			if($date != ""){
				$pecah = explode('-',$date);
				$bln = $pecah[1];
				$thn = $pecah[0];
				$tgl = $pecah[2];
				
				if($bln == "01"){$bln = "January";}elseif($bln == "02"){$bln = "February";}elseif($bln == "03"){$bln = "March";}elseif($bln == "04"){$bln = "April";}
				elseif($bln == "05"){$bln = "May";}elseif($bln == "06"){$bln = "June";}elseif($bln == "07"){$bln = "July";}elseif($bln == "08"){$bln = "August";}
				elseif($bln == "09"){$bln = "September";}elseif($bln == "10"){$bln = "October";}elseif($bln == "11"){$bln = "November";}
				elseif($bln == "12"){$bln = "December";}
				
				return $this->result = "$tgl $bln $thn";
			}
			else{
				return "-";
			}
		}

		function get_info($nim, $field){
			$q = $this->query("SELECT  $field FROM mahasiswa WHERE NIM = '".$nim."'");
			if($q->num_rows > 0){
				$data = @mysqli_fetch_array($q);
				return $data[$field];
			}else{
				return "Data mahasiswa tidak ditemukan";
			}
		}
	}
	$objek = new dash('localhost', 'root', '', 'ijazah');
?>