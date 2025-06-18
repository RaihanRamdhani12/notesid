<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <style>
        .footer {
            position: absolute;
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
        <div class="container-lg mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading" align="center">Peringatan</h4>
                        <hr>
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                    <?php endif; ?>
                    <div class="card shadow-lg">
                        <!-- Menambahkan bayangan menggunakan shadow-lg -->
                        <div class="card-header bg-dark text-white text-center">
                            <!-- Mengubah warna latar belakang dan teks header -->
                            Formulir Pendaftaran
                        </div>
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <form method="post" action="<?= base_url() ?>proses_register_user">
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap"
                                        value="<?= old('email'); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>
                                <div class="mb-3">
                                    <label for="no_telpon" class="form-label">No Handphone</label>
                                    <input type="tel" name="no_telpon" class="form-control" id="no_telpon"
                                        placeholder="08******">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>
                                <div class="mb-3">
                                    <label>Belum punya akun? <a href="<?= base_url(); ?>login">Login</a></label>
                                </div>
                                <button type="submit" class="btn btn-dark">Daftar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <!-- <div class="footer"> -->
        <footer class="py-3 bg-dark mt-4">
            <div class="container">
                <ul class="nav justify-content-center pb-3 mb-3">
                    <li class="nav-item"><a href="<?= base_url() ?>" class="nav-link px-2 text-white">Beranda</a>
                    </li>
                    <li class="nav-item"><a
                            href="https://rhnrmdhn.vercel.app/?fbclid=PAZXh0bgNhZW0CMTEAAac1OOVGtger7FIfsb6dY3wMXFLNbWZCk7uYZ4OrEg2gc_lsZ4wEy5aDhei1rg_aem_dwMDe0aK_9q3wuxLL3wvCw"
                            class="nav-link px-2 text-white">Tentang</a>
                    </li>
                </ul>
                <p class="text-center text-white">© 2024 Raihan Ramdhani</p>
                <!-- </div> -->
        </footer>
        </div>



        <!-- Script -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>

    </body>

</html>