<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/128/15466/15466052.png" type="image/x-icon">
</head>

<body>
    <div class="container mt-5">
        <h2>Add New User</h2>
        <form action="index.php?action=store" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="foto" class="form-label">Photo</label>
                <input type="file" class="form-control" id="foto" name="foto" required onchange="previewImage(event)">
            </div>

            <!-- Pratinjau gambar -->
            <div class="mb-3">
                <label>Preview:</label><br>
                <img id="imagePreview" src="" alt="Image Preview" class="img-fluid" style="display: none; max-width: 200px;">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Address</label>
                <textarea class="form-control" id="alamat" name="alamat" required></textarea>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="no_hp" name="no_hp" required>
            </div>
            <button type="submit" class="btn btn-primary">Add User</button>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const image = document.getElementById('imagePreview');
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                image.src = e.target.result;
                image.style.display = 'block'; 
            }

            if (file) {
                reader.readAsDataURL(file); 
            } else {
                image.src = ""; 
                image.style.display = 'none'; 
            }
        }
    </script>
</body>

</html>