<!DOCTYPE html>
<html lang="id">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 500px;">
    <div class="card p-4 shadow">
        <h3>Edit Barang</h3>
        <form action="/santri/update/<?= $index ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="text" name="nama_barang" class="form-control" value="<?= $data['nama'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Foto Baru (kosongkan jika tetap):</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <button type="submit" class="btn btn-success w-100">Update Data</button>
            <a href="/santri" class="btn btn-secondary w-100 mt-2">Kembali</a>
        </form>
    </div>
</div>
</body>
</html>