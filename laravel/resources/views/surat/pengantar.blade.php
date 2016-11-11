<?php
//header("Content-type: application/vnd.ms-word");
//header("Content-Disposition: attaachment; Filename=word.doc");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Surat Pengantar -- RESOURCE </title>
<!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="{{ URL::asset('css/bootstrap.css') }}">
<style>
h3.uppercase {
    text-transform: uppercase;
}
h5 {
	align-content: center;
   width: 100%; 
   text-align: center; 
   border-bottom: 3px solid #000; 
   line-height: 2em;
   margin: 10px 0 10px; 
} 

h5 span { 
    background:#fff; 
    padding:0 10px; 
}

p span { 
    display:inline-block; 
    width: 150px;
}
</style>
</head>
<body>
<div class="container">
@foreach ($ms as $data)
	
	<h3 class="uppercase" style="font-family: arial; text-align: center;"> PENGURUS RT 0{{ $data->rt }} RW 0{{ $data->rw }} <br/>
	KEL. {{ $data->kelurahan }} KEC. {{ $data->kecamatan }}<br />
	KOTA {{ $data->kota }}<br />
	</h3>
	<h5 style="font-family: arial; text-align: center; text-transform: capitalize;">{{ Auth::user()->alamat }} Kec. {{ Auth::user()->kecamatan }}, Kel. {{ Auth::user()->kelurahan }}, Kota/Kabupaten {{ Auth::user()->kota }}  {{ Auth::user()->kd_pos }}</h5>
	<br /><br />
	<P style="font-family: arial; text-align: center;">SURAT KETERANGAN DOMISILI</p>
	<p style="font-family: arial; text-align: center;">Nomor: ................ </p>
	<br />
	<br />
	<p style="font-family: arial;">Yang bertanda tangan di bawah ini, Ketua RT 0{{ $data->rt }}/0{{ $data->rw }} Kelurahan {{ $data->kelurahan }}, Kecamatan {{ $data->kecamatan }}, Kota {{ $data->kota }}, dengan ini menerangkan bahwa:
	<br />
	<br />
	<?php 
	$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu" );
	$bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	?>
	<p>	<span>Nama</span>: {{ $data->nm_lengkap }} <br />
		<span>Tempat, Tgl. Lahir</span>: {{ $data->tmp_lahir}}, 
		<?php $lahir= $data->tgl_lahir;
		$tanggal = substr($lahir, 8, 2);
		$buln = substr($lahir, 5, 2);
		$tahun = substr($lahir, 0, 4);
		
		echo $tanggal," ",$bulan[$buln]," ",$tahun;?>
		<br />
		<span>Status Perkawinan</span>: {{ $data->sts_perkawinan }} <br />
		<span>Jenis Kelamin</span>: {{ ($data->jns_kelamin=='P')? 'Perempuan' : 'Laki-laki' }} <br />
		<span>Agama</span>: {{ $data->agama }} <br />
		<span>Pekerjaan</span>: {{ $data->pekerjaan }} <br />
		<span>KTP Nomor</span>: {{ $data->nik_warga }} <br/>
		<span>KK Nomor</span>: {{ $data->no_kk }} <br />
		<span>Alamat</span>: {{ $data->alm_sekarang }}<br />
	</p>
	<br />
	Untuk mengurus surat / membuat Surat: 
	<br />
	<br />
	Demikian Surat Pengantar ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
	<br />
	<br />
	<br />
	</p>
	<p style="text-align: right; text-transform: capitalize" />
			{{ $data->kota }}, <?php
			$tgl = date('j');
			$thn = date('Y');
			echo $tgl," ",$bulan[date('n')]," " , $thn;?> <br />
			Ketua RT. 0{{ $data->rt }}/0{{ $data->rw }} <br/><br /><br />
			
			{{ Auth::user()->name }}
	@endforeach
</div>
	
</body>
</html>