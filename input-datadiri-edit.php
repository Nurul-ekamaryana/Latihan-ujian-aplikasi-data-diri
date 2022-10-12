<?php
      if ( isset($_GET["nis"]) ){
            $nis = $_GET["nis"];
            $check_nis = "SELECT * FROM datanilai WHERE nis = '$nis'; ";
            include('./input-config.php');
            $query = mysqli_query($mysqli, $check_nis);
            $row = mysqli_fetch_array($query);
      }
?>
<div class="container">
<h1>Edit Data</h1>
<form action="input-datadiri-edit.php" method="POST">
      <label for="nis">Nomor Induk Siswa :</label><br>
      <input class='form-control' value="<?php echo $row["nis"]; ?>" type="number" name="nis" placeholder="Ex. 12003102" readonly/><br>
      <br>

      <label for="namalengkap">Nama Lengkap :</label><br>
      <input class='form-control' value="<?php echo $row["namalengkap"]; ?>" type="text" name="namalengkap" placeholder="Ex. Firdaus" /><br>

      <label for="jeniskelamin">Jenis Kelamin :</label><br>
      <form action="" method="post">  
      <input type="radio" name="jeniskelamin" value="perempuan" checked>perempuan<br/>  
      <input type="radio" name="jeniskelamin" value="lakilaki">lakilaki<br/>  
      <br>

      <label for="nilaikehadiran">Nilai Kehadiran:</label><br>
      <input class='form-control' value="<?php echo $row["nilaikehadiran"]; ?>" type="number" name="nilaikehadiran" placeholder="Ex. 80.56" /><br>
      <br>

      <label for="nilaitugas">Nilai Tugas :</label><br>
      <input class='form-control' value="<?php echo $row["nilaitugas"]; ?>" type="number" name="nilaitugas" placeholder="Ex. 80.56" /><br>
      <br>

      <label for="nilaipts">Nilai Pts :</label><br>
      <input class='form-control' value="<?php echo $row["nilaipts"]; ?>" type="number" name="nilaipts" placeholder="Ex. 80.56" /><br>
      <br>

      <label for="nilaipas">Nilai Pas:</label><br>
      <input class='form-control' value="<?php echo $row["nilaipas"]; ?>" type="number" name="nilaipas" placeholder="Ex. 80.56" /><br>
      <br>
      <input class='btn btn-sm btn-primary' type="submit" name="edit" value="Edit Data" />
      <a class='btn btn-sm btn-secondary' href="input-datadiri.php">Kembali</a>
</form>

<?php
      if ( isset($_POST["edit"]) ) {
            $nis = $_POST["nis"];
            $nama = $_POST["namalengkap"];
            $jeniskelamin = $_POST["jeniskelamin"];
            $kelas = $_POST["kelas"];
            $nilaik = $_POST["nilaikehadiran"];
            $nilait = $_POST["nilaitugas"];
            $nilaipts = $_POST["nilaipts"];
            $nilaipas = $_POST["nilaipas"];

            // EDIT - Memperbaharui Data
            $query = "
                  UPDATE datanilai SET namalengkap = '$nama', 
                  jeniskelamin = '$jeniskelamin',
                  kelas = '$kelas',
                  nilaikehadiran = '$nilaik'
                  nilaitugas = '$nilait'
                  nilaipts = '$nilaipts'
                  nilaipas = '$nilaipas'
                  WHERE nis = '$nis';
            ";
            
            include ('./input-config.php');
            $update = mysqli_query($mysqli, $query);

            if($update){
                  echo "
                        <script>
                        alert('Data berhasil diperbaharui');
                        window.location='input-datadiri.php';
                        </script>
                  ";
            }else{
                  echo "
                        <script>
                        alert('Data gagal');
                       
                        </script>
                  ";
            }
      }
?>