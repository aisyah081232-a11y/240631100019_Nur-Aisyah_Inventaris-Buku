<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku - BukuKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color: #FFF8FA; }
        .navbar { background-color: #C77F99; }
        .card { border: none; border-radius: 15px; }
        .btn-pink { background-color: #C77F99; color: white; }
        .btn-pink:hover { background-color: #AD6681; color: white; }
        h3 { color: #704354; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= base_url('/buku') ?>">📚 BukuKu</a>
        <span class="text-white">Sistem Inventaris Buku Aisyah</span>
    </div>
</nav>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h3 class="fw-bold">Tambah Buku</h3>
            <p class="text-secondary">Masukkan informasi buku baru.</p>

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <?php if (session()->getFlashdata('errors')) : ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('/buku/simpan') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label class="form-label">Judul Buku</label>
                            <input type="text" name="judul_buku" class="form-control"
                                   value="<?= esc(old('judul_buku')) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Penulis</label>
                            <input type="text" name="penulis" class="form-control"
                                   value="<?= esc(old('penulis')) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <input type="text" name="kategori" class="form-control"
                                   value="<?= esc(old('kategori')) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tahun Terbit</label>
                            <input type="number" name="tahun_terbit" class="form-control"
                                   min="1901" max="2155"
                                   value="<?= esc(old('tahun_terbit')) ?>" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Penerbit</label>
                            <input type="text" name="penerbit" class="form-control"
                                   value="<?= esc(old('penerbit')) ?>" required>
                        </div>

                        <button type="submit" class="btn btn-pink">Simpan Buku</button>
                        <a href="<?= base_url('/buku') ?>" class="btn btn-secondary">Kembali</a>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
