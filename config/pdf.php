<?php
require('fpdf.php');
require('my_class.php');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        $this->SetFont('Times','B',15);
        $this->Text(10,10,'Number : Un.05/10271');
        $this->Text(440,10,'Number : Un.05/10271');
        // Logo
        $this->Image('garuda.png',245,6,35);
        // Arial bold 15
        // Move to the right
        $this->Cell(80);
        // Title
        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'IJAZAH ISLAMIC STATE OF UNIVERSITY SUNAN GUNUNG DJATI BANDUNG');
    }
}
$objek->query("UPDATE notif SET status = '1' WHERE nim = '".$_GET['id']."'");
$q = $objek->query("SELECT * FROM mahasiswa WHERE NIM = '".$_GET['id']."'");
$data = @mysqli_fetch_array($q);
$dekan = $objek->dekan($data["Nama_Fakultas"]);
// Instanciation of inherited class
$pdf = new PDF('L','mm',array(250,500));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetFont('Times','B',14);
$pdf->Text(223, 50, "MINISTRY OF RELIGIOUS AFFAIRS");
$pdf->Text(227, 56, "STATE ISLAMIC OF UNIVERSITY");
$pdf->Text(223, 62, "SUNAN GUNUNG DJATI BANDUNG");
$pdf->SetFont('Times','',14);
$pdf->Text(235, 70, "herewith has declared that :");
$pdf->SetFont('Times','B',16);
$pdf->Text(235, 77, $data['Nama_Mahasiswa']);
$pdf->SetFont('Times','',14);
$pdf->Text(230, 84, "Student ID Number ".$data['NIM']);
$pdf->Text(80, 92, "Born in Bandung, Mei 29, 1995, has finished and fullfilled all the requirements at Study Program of Physics, therefore the University has conferred upon his the degree of :");
$pdf->SetFont('Times','B',16);
$pdf->Text(230, 104, $objek->gelar($data["Nama_Jurusan"], $data["Jenjang"]));
$pdf->SetFont('Times','',14);
$pdf->Text(206, 114, "along with rights and obligations attached to the degree.");
$pdf->Text(226, 120, "Given in Bandung, ".$objek->rubah_tgl(date('Y-m-d')));
$pdf->SetFont('Times','',16);
$pdf->Text(110, 128, "DEAN,");
$pdf->SetFont('Times','',14);
$pdf->Text(85, 136, "Faculty  Of  ".$dekan["fakultas"]);
$pdf->SetFont('Times','',14);
$pdf->Text(110, 148, "Signed");
$pdf->SetFont('Times','B',14);
$pdf->Text(85, 160, $dekan["nama"]);
$pdf->SetFont('Times','',14);
$pdf->Text(90, 166, "NIP : ".$dekan["nip"]);
$pdf->Text(250, 140, "Student's");
$pdf->Text(247, 150, "photograph");
$pdf->Text(244, 160, "and signature");
$pdf->Text(235, 173, "Date : ".$objek->rubah_tgl(date('Y-m-d')));

$pdf->Text(196, 179, "This is an authorized English Translation of the original diploma");
$pdf->Text(194, 185, "issued by Islamic State University Sunan Gunung Djati Bandung");
$pdf->Text(225, 195, "Faculty Of ".$dekan["fakultas"]);
$pdf->Text(251, 202, "Dean,");
$pdf->SetFont('Times','B',14);
$pdf->Text(228, 213, $dekan['nama']);
$pdf->SetFont('Times','',14);
$pdf->Text(228, 219, "NIP : ".$dekan["nip"]);
$pdf->SetFont('Times','',16);
$pdf->Text(410, 128, "RECTOR,");
$pdf->SetFont('Times','',14);
$pdf->Text(390, 136, "Faculty  Of ".$dekan["fakultas"]);
$pdf->SetFont('Times','',14);
$pdf->Text(415, 148, "Signed");
$pdf->SetFont('Times','B',14);
$pdf->Text(395, 160, "Prof. Dr. H. Mahmud, M.Si.");
$pdf->SetFont('Times','',14);
$pdf->Text(395, 166, "NIP : 196204101988031001");

$pdf->Output();
?>