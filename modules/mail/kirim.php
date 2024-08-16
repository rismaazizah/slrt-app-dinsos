<?php 
	include '../../mail/head.php';
	$mail->Subject = $opsi." Surat ".$surat." Berhasil ".$jenis; //subject
    $mail->Body    = "
    <p>Yth ".$data['nama_penduduk'].", Permintaan Surat dengan keterangan :</p>
    <p>NIK                : ".$data['nik_penduduk']."</p>
    <p>Nama Lengkap       : ".$data['nama_penduduk']."</p>
    <p>Tanggal Registrasi : ".$tanggal."</p>
    <p>Jenis Surat        : ".$surat."</p>
    Berhasil di Verifikasi, Silahkan <a href='http://".$halaman."'>Masuk akun Anda</a> dan Cek Permintaan Surat Anda.
    <p>TERIMAKASIH TELAH MENGGUNAKAN LAYANAN MALL PELAYANAN PUBLIK</p>"; //isi email
	include '../../mail/foot.php';

 ?>