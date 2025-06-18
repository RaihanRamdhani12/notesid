<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daily Notes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <link rel="stylesheet" href="<?= base_url() ?>/css/notes.css">

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
        <nav class="navbar navbar-expand-large bg-dark justify-content-center ">
            <ul class="nav text-white">
                <?php if ($status_login == TRUE) {
                                echo
                                "
                                <li class='nav-item'>
                                    <a class='nav-link btn btn-danger text-white' aria-current='page' href='keluar'><-</a>
                                </li><li class='nav-item'>
                                    <a class='nav-link text-white' aria-current='page' href='#'> $nama_lengkap</a>
                                </li>
                                <li class='nav-item'>
                                    <a class='nav-link btn btn-primary text-white' aria-current='page' href='tambah_notes'>+</a>
                                </li>

                                ";
                            } else {
                                echo
                                "<li class='nav-item me-2'>
                                    <a class='nav-link btn btn-success text-white' href='login'>LOGIN</a>
                                </li>
                                <li class='nav-item'>
                                    <a class='nav-link btn btn-primary text-white' href='register'>REGISTER</a>
                                </li>

                                ";
                            }
                            ?>
            </ul>
        </nav>

        <?php if ($status_login == FALSE) :?>
        <div class="card-body alert alert-danger text-center mt-5" role="alert">
            <p class="text-center">! Anda Belum Login !</p>
        </div>
        <?php endif; ?>

        <?php if (empty($semua_notes) && $status_login == true) :?>
        <div class="card-body alert alert-danger text-center mt-5" role="alert">
            <p class="text-center">! Catatan Kosong !</p>
        </div>
        <?php endif; ?>

        <div class="sticky-notes-container">
            <?php foreach ($semua_notes as $semua_notes) : ?>
            <div class="sticky-note">
                <h5><?= $semua_notes['judul'] ?></h5>
                <p><?= $semua_notes['isi'] ?></p>
                <p class="text-danger"><b>DEADLINE : <?= $semua_notes['tanggal'] ?></b></p>
                <button class="btn btn-primary expand-btn">Read more</button>
                <button class="btn btn-danger"
                    onclick="hapusnotes('<?= $semua_notes['id_notes'] ?>', '<?= $semua_notes['judul'] ?>')">
                    Hapus
                </button>
            </div>
            <?php endforeach ?>
        </div>





        <!-- Footer -->
        <div class="footer">
            <footer class="py-3 bg-dark mt-5">
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
                </div>
            </footer>
        </div>

        <!-- Script -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
        function hapusnotes(id_notes, judul) {
            Swal.fire({
                title: "Apa anda yakin?",
                text: "Data notes dengan judul : " + judul + " ini akan terhapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url() ?>hapus_notes/' + id_notes;
                }
            });
        }
        </script>
        <script>
        // JavaScript untuk toggle kelas "expanded"
        document.querySelectorAll('.expand-btn').forEach(button => {
            button.addEventListener('click', () => {
                const stickyNote = button.closest('.sticky-note');
                stickyNote.classList.toggle('expanded');

                // Ubah teks tombol ketika diperbesar
                button.textContent = stickyNote.classList.contains('expanded') ? 'Read less' :
                    'Read more';
            });
        });
        </script>
    </body>

</html>