<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Catatan</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <style>
        .footer {
            position: justify;
            bottom: 0;
            left: 0;
            width: 100%;
        }
        </style>

    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg  bg-dark">
            <div class="container-fluid ">
                <a class="navbar-brand text-white" href="<?= base_url() ?>">Kembali</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Container -->
        <div class="container mt-5 mb-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mt-5 shadow-lg">
                        <!-- Menambahkan bayangan menggunakan shadow-lg -->
                        <div class="card-header text-center bg-dark text-white">
                            <!-- Mengubah warna latar belakang dan teks header -->
                            Tambah Catatan
                        </div>
                        <div class="card-body">
                            <form class="container mt-5 m-lg-4" method="post"
                                action="<?= base_url() ?>proses_tambah_notes">
                                <div class="row">
                                    <div class="col-md-8 mx-auto">
                                        <div class="mb-4">
                                            <label for="judul" class="form-label">Judul Catatan</label>
                                            <input type="text" name="judul" class="form-control" id="judul"
                                                placeholder="Judul Catatan" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="isi" class="form-label">Isi Catatan</label>
                                            <textarea name="isi" class="form-control" id="isi" rows="4"
                                                placeholder="Isi Catatan" required></textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" name="tanggal" class="form-control" id="tanggal"
                                                required>
                                        </div>
                                        <button type="submit" class="btn btn-dark">Tambahkan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>

        <!-- Footer -->
        <div class="footer">
            <footer class="py-3 bg-dark mt-5">
                <div class="container">
                    <ul class="nav justify-content-center pb-3 mb-3">
                        <li class="nav-item"><a href="<?= base_url() ?>" class="nav-link px-2 text-white">Beranda</a>
                        </li>
                        <li class="nav-item"><a href="<?= base_url() ?>#tentang"
                                class="nav-link px-2 text-white">Tentang</a>
                        </li>
                    </ul>
                    <p class="text-center text-white">© 2024 Raihan Ramdhani</p>
                </div>
            </footer>
        </div>


        <!-- Script -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>

    </body>

</html>