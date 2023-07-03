<!DOCTYPE html>
<html lang="en">
<?php
// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'klasemen';
$koneksi = mysqli_connect($host, $username, $password, $database);


if (isset($_POST["simpan"])) {
    // Ambil data dari form
    $team1 = $_POST['team1'];
    $team2 = $_POST['team2'];
    $score1 = $_POST['score1'];
    $score2 = $_POST['score2'];

    if ($team1 == $team2) {
        echo "
        <script>
            alert ('Data tim tidak boleh sama!');
            document.location.href ='update_skor.php';
        </script>
        ";
    } else {
        // Perbarui skor pertandingan dan klasemen tim
        $query1 = "UPDATE bola SET jml_bermain = jml_bermain + 1 WHERE nama_tim = '$team1'";
        $query2 = "UPDATE bola SET jml_bermain = jml_bermain + 1 WHERE nama_tim = '$team2'";
        $query3 = "UPDATE bola SET gol_menang = gol_menang + $score1, gol_kalah = gol_kalah + $score2 WHERE nama_tim = '$team1'";
        $query4 = "UPDATE bola SET gol_menang = gol_menang + $score2, gol_kalah = gol_kalah + $score1 WHERE nama_tim = '$team2'";

        if ($score1 > $score2) {
            // Jika Tim 1 menang
            $query5 = "UPDATE bola SET menang = menang + 1, poin = poin + 3 WHERE nama_tim = '$team1'";
            $query6 = "UPDATE bola SET kalah = kalah + 1 WHERE nama_tim = '$team2'";
        } elseif ($score1 < $score2) {
            // Jika Tim 2 menang
            $query5 = "UPDATE bola SET menang = menang + 1, poin = poin + 3 WHERE nama_tim = '$team2'";
            $query6 = "UPDATE bola SET kalah = kalah + 1 WHERE nama_tim = '$team1'";
        } else {
            // Jika seri
            $query5 = "UPDATE bola SET seri = seri + 1, poin = poin + 1 WHERE nama_tim = '$team1' OR nama_tim = '$team2'";
            $query6 = "";
        }

        // Jalankan query
        mysqli_query($koneksi, $query1);
        mysqli_query($koneksi, $query2);
        mysqli_query($koneksi, $query3);
        mysqli_query($koneksi, $query4);
        mysqli_query($koneksi, $query5);

        echo "
    <script>
        alert ('Berhasil di perbaharui');
        document.location.href ='index.php';
    </script>
    ";
    }

    if (!empty($query6)) {
        mysqli_query($koneksi, $query6);
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Load file CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Load file library jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Load file library Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Load file library JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Update Skor</title>
</head>

<body>
    <div class="container">
        <h3 class="text-center">Update Data Skor</h3>
        <form action="" method="POST">
            <div class="form-group">
                <select name="team1" class="form-control">
                    <option selected>Pilih Tim...</option>
                    <?php
                    // Ambil daftar tim dari database
                    $query = "SELECT nama_tim FROM bola";
                    $result = mysqli_query($koneksi, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['nama_tim'] . '">' . $row['nama_tim'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <select name="team2" class="form-control">
                    <option selected>Pilih Tim...</option>
                    <?php
                    // Ambil daftar tim dari database
                    $query = "SELECT nama_tim FROM bola";
                    $result = mysqli_query($koneksi, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['nama_tim'] . '">' . $row['nama_tim'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="number" name="score1" placeholder="Skor Tim 1">
            </div>
            <div class="form-group">
                <input type="number" name="score2" placeholder="Skor Tim 2">
            </div>
            <input type="submit" name="simpan" value="Simpan">
        </form>

</body>
</div>

</html>