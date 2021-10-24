<div id="content" class="p-4 p-md-5 pt-5">
    <div id="label-page"><h3><b>Arsip Surat >> Lihat</b></h3></div>
    <?php 
        $id = $_GET['id'];
        $q_tampil_arsip = mysqli_query($db, "SELECT * FROM tbarsip WHERE id = '$id'");
        $r_tampil_arsip = mysqli_fetch_array($q_tampil_arsip);
        if(empty($r_tampil_arsip['data_surat']) or ($r_tampil_arsip['data_surat']=='-')){
            $file = "-";
        }
        else{
            $file = $r_tampil_arsip['data_surat'];
        }
    ?>
    <hr>
        <p style="color: black">Nomor: <?php echo $r_tampil_arsip['no_surat'];?></p>
        <p style="color: black">Kategori: <?php echo $r_tampil_arsip['kategori'];?></p>
        <p style="color: black">Judul: <?php echo $r_tampil_arsip['judul'];?></p>
        <p style="color: black">Waktu Unggah: <?php echo $r_tampil_arsip['tgl_arsip'];?></p>
    <hr>
    <iframe src="arsip/<?php echo $r_tampil_arsip['data_surat'];; ?>" style="width: 100%;height: 500px;"></iframe>
    <button type="button" class="tombol"><a href="index.php?p=e-arsip" style="color:black"><< Kembali</a>
    <button type="button" class="tombol"><a href="http://localhost/Arsip/arsip/<?php echo $file?>" style="color:black">Unduh</a>
    <button type="button" class="tombol"><a href="#" style="color:black">Edit/Ganti File</a>
</div>