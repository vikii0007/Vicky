<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/128/15466/15466052.png" type="image/x-icon">
</head>

<body>
    <div class="container mt-5">
        <h2>Edit User</h2>
        <form action="index.php?action=update&id=<?php echo $data['id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="foto" class="form-label">Photo</label>
                <input type="file" class="form-control" id="foto" name="foto" onchange="previewImage(event)">
                <small>Leave empty if you don't want to change the photo.</small>
                <br>
                <!-- Pratinjau Gambar Lama -->
                <?php if ($data['foto']): ?>
                    <img id="preview" src="data:image/jpeg;base64,<?php echo base64_encode($data['foto']); ?>" alt="User Photo" class="img-fluid mt-3" width="200">
                <?php else: ?>
                    <img id="preview" src="" alt="No Photo" class="img-fluid mt-3" width="200" style="display: none;">
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($data['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Address</label>
                <textarea class="form-control" id="alamat" name="alamat" required><?php echo htmlspecialchars($data['alamat']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?php echo htmlspecialchars($data['no_hp']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];

            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            } else {
                preview.style.display = 'none';
            }
        }
    </script>
</body>

</html>