<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BukuKu - Inventaris Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color: #FFF8FA; font-family: Arial, sans-serif; }
        .navbar { background-color: #C77F99; }
        .navbar-brand { color: white; font-weight: bold; font-size: 23px; }
        .card { border: none; border-radius: 15px; }
        .btn-pink { background-color: #C77F99; color: white; border: none; }
        .btn-pink:hover { background-color: #AD6681; color: white; }
        .page-title { color: #704354; }
        .table thead th { background-color: #F4DCE5; color: #704354; }
        footer { color: #A47B8B; }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/buku') ?>">📚 BukuKu</a>
        <span class="text-white">Sistem Inventaris Buku Aisyah</span>
    </div>
</nav>

<div class="container py-5">

    <h2 class="fw-bold page-title">Daftar Buku</h2>
    <p class="text-secondary">Kelola koleksi buku dengan mudah dan praktis.</p>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm mt-4">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold page-title mb-0">Koleksi Buku</h5>

                <a href="<?= base_url('/buku/tambah') ?>" class="btn btn-pink">
                    + Tambah Buku
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Kategori</th>
                            <th>Tahun Terbit</th>
                            <th>Penerbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($buku)) : ?>
                            <?php $no = 1; ?>

                            <?php foreach ($buku as $item) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($item['judul_buku']) ?></td>
                                    <td><?= esc($item['penulis']) ?></td>
                                    <td><?= esc($item['kategori']) ?></td>
                                    <td><?= esc($item['tahun_terbit']) ?></td>
                                    <td><?= esc($item['penerbit']) ?></td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="<?= base_url('/buku/edit/' . $item['id_buku']) ?>"
                                               class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <form action="<?= base_url('/buku/hapus/' . $item['id_buku']) ?>"
                                                  method="post"
                                                  onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        <?php else : ?>
                            <tr>
                                <td colspan="7" class="text-center text-secondary py-4">
                                    Belum ada data buku.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <footer class="text-center mt-4 small">
        © 2026 BukuKu - Sistem Inventaris Buku Aisyah
    </footer>

</div>

</body>
</html>
