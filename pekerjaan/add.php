<?php
include '../src/php/config.php';
include '../src/php/auth.php';

$activeTabs = 'addpekerjaan';

$error = "";
$success = "";

if ($acctype == 'user') {
    header('location: ../');
    exit;
}

if (isset($_POST['submit'])) {
    $id = uniqid();
    $company = $_SESSION['user_id'];
    $name = $_POST['nama'];
    $desc = $_POST['desc'];
    $text = $_POST['detail'];
    
    $sql = "INSERT INTO loker (id, company, short_desc, name, detail) VALUES ('$id', '$company', '$desc', '$name', '$text')";
    $result = mysqli_query($conn, $sql);

                if ($result) {
                    $success = "Data berhasil ditambahkan ke database.";
                } else {
                    $error = "Gagal menambahkan data ke database: " . mysqli_error($conn);
                }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Tambah Pekerjaan</title>
    <link rel="stylesheet" href="../navfooter.css">
    <link rel="stylesheet" href="../dist/output.css">
</head>
<body>
    <?php include "../src/components/navbar.php"; ?>
<section style="height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div class="container mx-auto p-4">
    <form method="POST" enctype="multipart/form-data" class="max-w-md mx-auto p-8 bg-white rounded-lg shadow-lg">
        <div class="mb-4">
            <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama Pekerjaan</label>
            <input name="nama" type="text" class="p-3 border border-slate-800 focus:border-blue-950 w-full rounded-lg" id="nama" placeholder="Nama"/>
        </div>
        <div class="mb-4">
            <label for="desc" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Singkat Pekerjaan</label>
            <textarea class="p-3 border border-slate-800 focus:border-blue-950 w-full rounded-lg" name="desc" id="desc" rows="3" placeholder="Deskripsi"></textarea>
        </div>
        <div class="mb-4">
            <label for="detail" class="block text-gray-700 text-sm font-bold mb-2">Detail</label>
            <textarea class="p-3 border border-slate-800 focus:border-blue-950 w-full rounded-lg" name="detail" id="detail" rows="3" placeholder="Detail"></textarea>
        </div>
        <div class="mb-4 flex gap-2">
            <input type="checkbox" class="p-3 form-checkbox text-blue-500" id="checkbox1" required/>
            <label class="block text-gray-700 text-sm font-bold" for="checkbox1">Konfirmasi</label>
        </div>
        <button type="submit" name="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue focus:ring focus:border-blue-300">
            Submit
        </button>
        <?php
        if (!empty($error)) {
            echo "<div class='mt-4 text-red-500 p-5 rounded-lg bg-red-300 border border-red-500'>$error</div>";
        }
        if (!empty($success)) {
            echo "<div class='mt-4 text-green-500 p-5 rounded-lg bg-green-300 border border-green-500'>$success</div>";
        }
        ?>
    </form>
</div>

</section>
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script> -->
    <script src="../script.js"></script>

</body>
</html>
