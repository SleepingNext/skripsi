<?php
session_start();
require "koneksi.php";
cekLogin('Pelanggan');
$judul = 'Daftar Transaksi';
include "template/components.php";
include "template/head.php";
?>
<body>
<div id="all">
<?php
include "template/header.php";

$tableConf = array(
	array(
		"name"		=>	"nama_pemesan",
		"caption"	=>	"Nama Pemesan"
	),
	array(
		"name"		=>	"total_harga",
		"caption"	=>	"Total Harga"
	),
	array(
		"name"		=>	"tgl_pesan",
		"caption"	=>	"Tanggal Pesan"
	),
	array(
		"name"		=>	"status_pembayaran",
		"caption"	=>	"Status Pembayaran"
	)
);
if(isset($_GET['id_pemesanan'])){
	$detail = $db->from('tbl_pemesanan')
	    ->leftJoin('tbl_pembayaran', array('tbl_pemesanan.id_pemesanan' => 'tbl_pembayaran.id_pemesanan'))
	    ->join('tbl_produk', array('tbl_pemesanan.id_produk' => 'tbl_produk.id_produk'))
	    ->select(array('tbl_pemesanan.*','tbl_pembayaran.status_pembayaran','tbl_produk.harga'))
	    ->where('tbl_pemesanan.id_pemesanan',$_GET['id_pemesanan'])
	    ->where('id_user',$_SESSION['id_user'])
	    ->one();
}else $dataTable = $db->from('tbl_pemesanan')
		->distinct()
	    ->leftJoin('tbl_pembayaran', array('tbl_pemesanan.id_pemesanan' => 'tbl_pembayaran.id_pemesanan'))
	    ->where('id_user',$_SESSION['id_user'])
	    ->select(array('tbl_pemesanan.*','tbl_pembayaran.status_pembayaran'))
	    ->many();
?>
<div id="content">
<div class="container">
	
	
	

<!-- START OF CONTENT -->
<div class="row bar mb-0">
<div class="col-md-12">
<?php $msg->display(); ?>
<?php
if(isset($_GET['id_pemesanan'])){
$foto = $db->from('tbl_foto_produk')->where('id_produk',$detail['id_produk'])->select()->many();
?>
<h2>Produk Yang Dipesan</h2>
<div class="products-big">
<div class="row products">
<?php
foreach($foto as $f){
?>
	<div class="col-md-4 col-xs-12">
	<div class="product">
	  <div class="image"><img src="<?php echo $base_url; ?>/produk/<?php echo $f['foto_produk']; ?>" alt="" class="img-fluid image1"></div>
	</div>
  </div>
<?php
}
?>
</div>
</div>	
<h2>Detail Transaksi</h2>
<?php
//detail transaksi
	if(empty($detail)){
		alert('danger','Transaksi tidak ditemukan');
	}else{
		$detailForm = array(
				array(
					"name"	=>	"input_group",
					"list"	=>	array(
						array(
							"name"	=>	"nama_pemesan",
							"label"	=>	"Nama Pemesan",
							"type"	=>	"input",
							"inputType"	=>	"text",
							"col"	=>	"12",
							"value"	=>  $detail['nama_pemesan'],
							"readonly"	=> true
						),
						array(
							"name"	=>	"alamat_pemesan",
							"label"	=>	"Alamat Pemesan",
							"type"	=>	"textarea",
							"inputType"	=>	"text",
							"col"	=> "12",
							"value"	=>  $detail['alamat_pemesan'],
							"readonly"	=> true
						),
						array(
							"name"	=>	"no_telp",
							"label"	=>	"Nomor Telpon",
							"type"	=>	"input",
							"inputType"	=>	"text",
							"col"	=> "6",
							"value"	=>  $detail['no_telp'],
							"readonly"	=> true
						),
						array(
							"name"	=>	"harga",
							"label"	=>	"Harga Produk",
							"type"	=>	"input",
							"inputType"	=>	"number",
							"readonly"	=> true,
							"col"	=> "3",
							"value"	=>  $detail['harga'],
							"readonly"	=> true
						),
						array(
							"name"	=>	"jumlah_pesan",
							"label"	=>	"Jumlah Pesan",
							"type"	=>	"input",
							"inputType"	=>	"number",
							"readonly"	=> true,
							"col"	=> "3",
							"value"	=>  $detail['jumlah_pesan'],
							"readonly"	=> true
						),
						array(
							"name"	=>	"total_harga",
							"label"	=>	"Total Harga",
							"type"	=>	"input",
							"inputType"	=>	"number",
							"value"	=> $detail['total_harga'],
							"readonly"	=> true,
							"col"	=> "12",
							"readonly"	=> true
						)
					)
				)
			);
		formGenerator($detailForm);
		echo '<a class="btn btn-success" href="daftar-transaksi.php">Kembali >></a>';
	}
}else{
?>
<h2>Daftar Transaksi</h2>
<div class="table-responsive">
<table class="table table-hover">
<thead>
<tr>
<th>No</th>
<?php
foreach($tableConf as $t){
	echo "<th>".$t['caption']."</th>";
}
?>
<th colspan=2>Aksi</th>
</tr>
</thead>
<tbody>
<?php
$no = 1;
if(count($dataTable) == 0){
	echo "<tr><td colspan=".(count($tableConf)+2).">Data Kosong</td></tr>";
}else{
	foreach($dataTable as $r){
		echo "
			<tr>
				<td>".$no."</td>";
		foreach($tableConf as $t){
			if($t['name'] == 'status_pembayaran'){
				if($r['status_pembayaran'] == null){
					echo "<td><span class='badge badge-danger'>Belum Bayar</span></td>";
				}else if($r['status_pembayaran'] == 'Diterima'){
					echo "<td><span class='badge badge-success'>".$r['status_pembayaran']."</span></td>";
				}else if($r['status_pembayaran'] == 'Diproses'){
					echo "<td><span class='badge badge-info'>".$r['status_pembayaran']."</span></td>";
				}else if($r['status_pembayaran'] == 'Ditolak'){
					echo "<td><span class='badge badge-danger'>".$r['status_pembayaran']."</span></td>";
				}
			}
			else echo "<td>".$r[$t['name']]."</td>";
			if($t['name'] == 'status_pembayaran'){
				if($r['status_pembayaran'] == null){
					echo "<td><a class='btn btn-info btn-sm' href='konfirmasi-pembayaran.php?id_pemesanan=".$r['id_pemesanan']."'>Konfirmasi Pembayaran</a></td>";
				}else if($r['status_pembayaran'] == 'Diproses') echo "<td><span class='badge badge-warning'>Menunggu Verifikasi</span></td>";
				else if($r['status_pembayaran'] == 'Diterima') echo "<td><a class='btn btn-template-main btn-sm' href='cetak-bukti.php?id_pemesanan=".$r['id_pemesanan']."'>Cetak Bukti</a></td>";
				else echo "<td><a class='btn btn-info btn-sm' href='konfirmasi-pembayaran.php?id_pemesanan=".$r['id_pemesanan']."&ulang=ya'>Konfirmasi Ulang</a></td>";
			}
		}
		$no++;
		echo "<td><a class='btn btn-sm btn-primary' href='daftar-transaksi.php?id_pemesanan=".$r['id_pemesanan']."'>Detail Pesanan</a></td>";
	}
}
?>
</tbody>	
</table>
</div>
<?php
	}
?>
</div>
</div>
<!-- END OF CONTENT -->

<!-- FOOTER -->
</div>
<?php include "template/footer.php"; ?>
</div>
<!-- Javascript files-->
<?php include "template/javascript.php"; ?>
</body>
</html>
