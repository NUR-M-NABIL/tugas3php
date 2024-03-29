<?php
$s1 = ['nama mahasiswa'=>'Eko Wardani', 'nim'=>'0123110200', 'nilai'=>75];
$s2 = ['nama mahasiswa'=>'Ahmad Sidqi', 'nim'=>'0123110211', 'nilai'=>83];
$s3 = ['nama mahasiswa'=>'Rafli Alghifari', 'nim'=>'0123111192', 'nilai'=>60];
$s4 = ['nama mahasiswa'=>'Doyok Alimeri', 'nim'=>'0123111256', 'nilai'=>66];
$s5 = ['nama mahasiswa'=>'Ribut Wahyudi', 'nim'=>'0123112008', 'nilai'=>77];
$s6 = ['nama mahasiswa'=>'Syahroni Saputra', 'nim'=>'0123112092', 'nilai'=>81];
$s7 = ['nama mahasiswa'=>'Rifki Gayoh', 'nim'=>'0123113401', 'nilai'=>70];
$s8 = ['nama mahasiswa'=>'Doughlas Boughlas Bullet', 'nim'=>'0123113007', 'nilai'=>89];
$s9 = ['nama mahasiswa'=>'Uzumaki Suprapto', 'nim'=>'0123114710', 'nilai'=>80];
$s10 = ['nama mahasiswa'=>'Muhammad Sumbul', 'nim'=>'0123114999', 'nilai'=>99];

$ar_mahasiswa = [$s1, $s2, $s3, $s4, $s5, $s6, $s7, $s8, $s9, $s10];


$ar_judul = ['No', 'Nama Mahasiswa', 'NIM', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];

//fungsi agregat di array
$jumlah_nilai = array_column($ar_mahasiswa, 'nilai');
$nilai_total = array_sum($jumlah_nilai);
$nilai_tertinggi = max($jumlah_nilai);
$nilai_terendah = min($jumlah_nilai);
$jumlah_mahasiswa = count($ar_mahasiswa);
$nilai_rata2 = $nilai_total / $jumlah_mahasiswa;

$pernyataan = [
    'Nilai Tertinggi'=>$nilai_tertinggi,
    'Nilai Terendah'=>$nilai_terendah,
    'Nilai Rata-Rata'=>$nilai_rata2,
    'Jumlah Mahasiswa'=>$jumlah_mahasiswa,
    'Jumlah Keseluruhan Nilai'=>$nilai_total
];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 3 PHP</title>
</head>
<body>
    <h1 align="center">DAFTAR MAHASISWA KAMPUS BARCELONA FC</h1>
    <table border="1" cellpadding="10" cellspacing="2" width="100%" >
        <thead>
            <tr>
            <?php
            foreach($ar_judul as $judul){ ?>
                <th><?= $judul ?></th>
            <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach ($ar_mahasiswa as $mahasiswa){
                $keterangan = ($mahasiswa ['nilai'] >=65) ? 'Lulus' : 'Tidak Lulus';

                if ($mahasiswa ['nilai'] >=86 && $mahasiswa ['nilai'] <=100) $grade='A';
                else if ($mahasiswa ['nilai'] >=71 && $mahasiswa ['nilai'] <=85) $grade='B';
                else if ($mahasiswa ['nilai'] >=51 && $mahasiswa ['nilai'] <=70) $grade='C';
                else if ($mahasiswa ['nilai'] >=30 && $mahasiswa ['nilai'] <=50) $grade='D';
                else if ($mahasiswa ['nilai'] >=0 && $mahasiswa ['nilai'] <=29) $grade='E';
                else $grade= '';

                switch($grade){
                    case 'A' :
                        $predikat='Memuaskan';
                        break;
                    case 'B' :
                        $predikat='Bagus';
                        break;
                    case 'C' :
                        $predikat='Cukup';
                        break;
                    case 'D' :
                        $predikat='Kurang';
                        break;
                    case 'E' :
                        $predikat='Buruk';
                        break;
                    default:
                        $predikat='';
                }
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $mahasiswa['nama mahasiswa'] ?></td>
                <td><?= $mahasiswa['nim'] ?></td>
                <td><?= $mahasiswa['nilai'] ?></td>
                <td><?= $keterangan ?></td>
                <td><?= $grade ?></td>
                <td><?= $predikat ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <?php
            foreach($pernyataan as $pern => $hasil) {
            ?>
            <tr>
                <th colspan="3"><?= $pern ?></th>
                <th colspan="5"><?= $hasil ?></th>
            </tr>

            <?php } ?>
        </tfoot>
    </table>
</body>
</html>