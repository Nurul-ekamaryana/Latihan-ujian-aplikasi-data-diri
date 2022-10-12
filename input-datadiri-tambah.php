<div class="container">
<h1>Tambah Data</h1>
<form action="input-datadiri-tambah.php" method="POST">
      <label for="nis">Nomor Induk Siswa :</label><br>
      <input class='form-control' type="number" name="nis" placeholder="Ex. 12003102" /><br>

      <label for="namalengkap">Nama Lengkap :</label><br>
      <input class='form-control' type="text" name="namalengkap" placeholder="Ex. Firdaus" /><br>

      <label for="jeniskelamin">Jenis Kelamin :</label><br>
      <form action="" method="post">  
 <input type="radio" name="jeniskelamin" value="perempuan" checked>perempuan<br/>  
 <input type="radio" name="jeniskelamin" value="lakilaki">lakilaki<br/>  



 <label for="kelas">Kelas :</label><br>
      <input class='form-control' type="text" name="kelas" placeholder="Ex. Firdaus" /><br>

      <label for="nilaikehadiran">Nilai Kehadiran :</label><br>
      <input class='form-control' type="number" name="nilaikehadiran" placeholder="Ex. 80.56" /><br>

      <label for="nilaitugas">Nilai Tugas :</label><br>
      <input class='form-control' type="number" name="nilaitugas" placeholder="Ex. 80.56" /><br>

      <label for="nilaipts">Nilai PTS :</label><br>
      <input class='form-control' type="number" name="nilaipts" placeholder="Ex. 80.56" /><br>

      <label for="nilaipas">Nilai PAS :</label><br>
      <input class='form-control' type="number" name="nilaipas" placeholder="Ex. 80.56" /><br>
      <br>
      <input class='btn btn-sm btn-primary' type="submit" name="simpan" value="Simpan Data" />
      <a class='btn btn-sm btn-secondary' href="input-datadiri.php">Kembali</a>
</form>

<?php
      include ('./input-config.php');
      if( $_SESSION["login"] !=TRUE) {
            header('location:login.php');
      }
      if( $_SESSION["role"] !="ADMIN") {
            echo "
                  <script>
                        alert('Akses tidak diberikan, kamu bukan admin');
                        window.location='input-datadiri.php';
                  </script>
                  ";
      }

      if( isset($_POST["simpan"]) ){
            $nis = $_POST["nis"];
            $nama = $_POST["namalengkap"];
            $jeniskelamin = $_POST["jeniskelamin"];
            $kelas = $_POST["kelas"];
            $nilaik = $_POST["nilaikehadiran"];
            $nilait = $_POST["nilaitugas"];
            $nilaipts = $_POST["nilaipts"];
            $nilaipas = $_POST["nilaipas"];

            // CREATE - Menambahkan Data ke Database
            $query = "
                  INSERT INTO datanilai VALUES
                  ('$nis', '$nama', '$jeniskelamin', '$kelas', '$nilaik', '$nilait', '$nilaipts', '$nilaipas');
            ";

           
            $insert = mysqli_query($mysqli, $query);

            if ($insert){
                  echo "
                        <script>
                              alert('Data berhasil ditambahkan');
                              window.location='input-datadiri.php';
                        </script>
                  ";
            }

      }
?>