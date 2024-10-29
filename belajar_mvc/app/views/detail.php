<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/128/15466/15466052.png" type="image/x-icon">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 15px;
        }
        .img-fluid {
            border-radius: 15px;
        }
        .user-info h5 {
            margin-bottom: 0.5rem;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="row p-4">
                <!-- Display User Photo -->
                <div class="col-md-4 text-center mb-3">
                    <?php if ($data['foto']): ?>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($data['foto']); ?>" class="img-fluid" alt="User Photo">
                    <?php else: ?>
                        <div class="bg-light rounded p-3">
                            <p>No photo available</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Display User Data -->
                <div class="col-md-8 user-info">
                    <h3>Detail Pengguna</h3>
                    <h5>ID: <?php echo htmlspecialchars($data['id']); ?></h5>
                    <h5>Name: <?php echo htmlspecialchars($data['name']); ?></h5>
                    <h5>Email: <?php echo htmlspecialchars($data['email']); ?></h5>
                    <h5>Address: <?php echo htmlspecialchars($data['alamat']); ?></h5>
                    <h5>Phone Number: <?php echo htmlspecialchars($data['no_hp']); ?></h5>
                    <a href="edit_user.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-custom mt-3">Edit User</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>