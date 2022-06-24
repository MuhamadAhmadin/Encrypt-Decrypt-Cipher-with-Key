<?php
include ('cipher.php');
$encrypted = false;
$decrypted = false;

if (isset($_POST['encrypt'])) {
    $kunci = $_POST['kunci'];
    $pesan = $_POST['pesan'];

    $chiperkeyText = enkripsi($pesan, $kunci);
    $encrypted_text = Encipher($chiperkeyText, 3);
    $encrypted = true;
}

if (isset($_POST['decrypt'])) {
    $kunci2 = $_POST['kunci2'];
    $pesan2 = $_POST['pesan2'];

    $chiperkeyText = Decipher($pesan2, 3);
    $decrypted_text = dekripsi($chiperkeyText, $kunci2);
    $decrypted = true;
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Muhamad Ahmadin | Cipher Encrypt Decrypt</title>
</head>

<body>
    <main>
        <div class="container py-4">
            <header class="pb-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" fill="currentColor"
                        class="bi bi-key-fill" viewBox="0 0 16 16">
                        <path
                            d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    </svg>
                    <span class="fs-4">Kriptografi</span>
                </a>
            </header>

            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-2">
                    <h1 class="display-5 fw-bold">Enkripsi & Dekripsi</h1>
                    <p class="col-md-12 fs-4">Enkripsi adalah proses mengamankan suatu informasi dengan membuat
                        informasi tersebut tidak dapat dibaca tanpa bantuan pengetahuan khusus.. Enkripsi pada aplikasi
                        ini adalah Kombinasi Chipper Key dan Caesar Chipper.</p>
                    <p class="col-md-12 fs-4">Deskripsi adalah pengolahan data menjadi sesuatu yang dapat diutarakan
                        secara jelas dan tepat dengan tujuan dimengerti oleh orang yang tidak langsung mengalaminya
                        sendiri. Enkripsi pada aplikasi ini adalah Kombinasi Chipper Key dan Caesar Chipper</p>
                </div>
            </div>

            <div class="row align-items-md-stretch">
                <div class="col-md-6">
                    <div class="h-100 p-5 text-white bg-dark rounded-3">
                        <h2>Enkripsi</h2>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Kunci</label>
                                <input type="text" name="kunci" class="form-control" value="<?= $kunci ?? '' ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pesan</label>
                                <textarea name="pesan" cols="30" rows="4" class="form-control"><?= $pesan ?? '' ?></textarea>
                                <div class="form-text">Masukkan pesan yang akan di enkripsi.</div>
                            </div>
                            <button class="btn btn-outline-light" type="submit" name="encrypt" value="encrypt">Proses</button>
                        </form>

                        <?php if($encrypted): ?>
                            <div class="card mt-5">
                                <div class="card-header text-dark">
                                    Kunci: <?= $kunci ?>
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p class="text-dark">Hasil: <?= $encrypted_text ?></p>
                                        <footer class="blockquote-footer">Pesan: <?= $pesan ?></footer>
                                    </blockquote>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="h-100 p-5 bg-light border rounded-3">
                        <h2>Dekripsi</h2>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Kunci</label>
                                <input type="text" name="kunci2" class="form-control" value="<?= $kunci2 ?? '' ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pesan</label>
                                <textarea name="pesan2" cols="30" rows="4" class="form-control"><?= $pesan2 ?? '' ?></textarea>
                                <div class="form-text">Masukkan pesan yang akan di dekripsi.</div>
                            </div>
                            <button class="btn btn-outline-secondary" type="submit" name="decrypt" value="decrypt">Proses</button>
                        </form>

                        <?php if($decrypted): ?>
                            <div class="card mt-5">
                                <div class="card-header text-dark">
                                    Kunci: <?= $kunci2 ?>
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p class="text-dark">Hasil: <?= $decrypted_text ?></p>
                                        <footer class="blockquote-footer">Pesan: <?= $pesan2 ?></footer>
                                    </blockquote>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <footer class="pt-3 mt-4 text-muted border-top">
                &copy; Muhamad Ahmadin | 190511024 | K1 | Universitas Muhammadiyah Cirebon | 2022
            </footer>
        </div>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>