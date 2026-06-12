<!DOCTYPE html>
<html lang="id">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>SantriInventory</title>
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">SantriInventory</h2>
    
    <div class="card p-4 shadow-sm mb-4">
        <form action="/santri/simpan" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4"><input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required></div>
                <div class="col-md-4"><input type="file" name="foto" class="form-control" required></div>
                <div class="col-md-2"><button type="submit" class="btn btn-primary w-100">Simpan</button></div>
            </div>
        </form>
    </div>

    <table class="table table-bordered table-hover shadow-sm bg-white">
        <thead class="table-dark">
            <tr><th>Foto</th><th>Nama</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            <?php foreach($barang as $index => $b): ?>
            <tr>
                <td class="align-middle"><img src="/assets/img/upload/<?= $b['foto'] ?>" width="80" class="rounded"></td>
                <td class="align-middle"><?= $b['nama'] ?></td>
                <td class="align-middle">
                    <a href="/santri/edit/<?= $index ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/santri/hapus/<?= $index ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>