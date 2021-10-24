
<div id="content" class="p-4 p-md-5 pt-5">
    <div id="label-page"><h3><b>Arsip Surat</b></h3></div>
    <p style="color: black">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
        Klik "lihat" pada kolom aksi untuk menampilkan surat.
    </p>

    <div>
        <form method=post>Cari Surat
            <input type="text" name="pencarian">
            <input type="submit" name="search" value="Cari" class="tombol">
        </form>
    </div>
    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">No Surat</th>
        <th scope="col">Kategori</th>
        <th scope="col">Judul</th>
        <th scope="col">Waktu Pengarsipan</th>
        <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $batas = 5;
            extract ($_GET);
            if(empty($hal)){
                $posisi = 0;
                $hal = 1;
                $nomor = 1;
            }else{
                $posisi = ($hal-1)*$batas;
                $nomor = $posisi+1;
            }
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
                if($pencarian != ""){
                    $sql = "SELECT * FROM tbarsip WHERE kategori LIKE '%$pencarian%'
                    OR no_surat LIKE '%$pencarian%'
                    OR judul LIKE '%$pencarian%'
                    OR tgl_arsip LIKE '%$pencarian%'";
                    $query = $sql;
                    $queryJml = $sql;
                } else{
                    $query= "SELECT * FROM tbarsip LIMIT $posisi, $batas";
                    $queryJml = "SELECT * FROM tbarsip";
                    $no = $posisi * 1;
                }
            }
            else{
                $query = "SELECT *FROM tbarsip LIMIT $posisi, $batas";
                $queryJml = "SELECT *FROM tbarsip";
                $no = $posisi*1;
            }
            $q_tampil_arsip = mysqli_query($db, $query);
            if(mysqli_num_rows($q_tampil_arsip)>0){
                while($r_tampil_arsip=mysqli_fetch_array($q_tampil_arsip)){
                    if(empty($r_tampil_arsip['data_surat']) or ($r_tampil_arsip['data_surat']=='-')){
                        $file = "-";
                    }
                    else{
                        $file = $r_tampil_arsip['data_surat'];
                    }
        ?>
            <tr>
                <td><?php echo $r_tampil_arsip['no_surat'];?></td>
                <td><?php echo $r_tampil_arsip['kategori'];?></td>
                <td><?php echo $r_tampil_arsip['judul'];?></td>
                <td><?php echo $r_tampil_arsip['tgl_arsip'];?></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm"><a href="pages/delete.php?id=<?php echo $r_tampil_arsip['id'];?>" onclick="return confirm('Apakah anda yakin akan menghapus arsip surat ini?')" class="tombol" style="color:white">Hapus</a></button>
                    <button type="button" class="btn btn-warning btn-sm"><a target="_blank" href="http://localhost/Arsip/arsip/<?php echo $file?>" class="tombol" style="color:white">Unduh</a></div>
                    <button type="button" class="btn btn-primary btn-sm"><a href="index.php?p=read&id=<?php echo $r_tampil_arsip['id'];?>" class="tombol" style="color:white">Lihat>>></a></div>
                </td>
            </tr>
            <?php
            }
        }
        else{
            echo "<tr><td colspan=6>Data tidak ditemukan</td></tr>";
        }
        ?>
    </tbody>
</table>
    <button type="button" class="tombol"><a href="index.php?p=add" style="color:black">Arsipkan Surat</a>
</div>
