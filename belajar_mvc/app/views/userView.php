<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vicky Maulana S-MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/128/15466/15466052.png" type="image/x-icon">
    <style>
        body {
            background-color: #f8f9fa;
        }

        h1 {
            color: #343a40;
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-info {
            background-color: #17a2b8;
        }

        .btn-warning {
            background-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .alert {
            margin-bottom: 20px;
        }

        /* Custom styles for the table */
        .table th {
            background-color: #007bff;
            color: white;
        }

        .table td {
            background-color: white;
        }

        /* Add some padding to the container */
        .container {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>User Information</h1>
                <!-- Button to Add User -->
                <a href="index.php?action=add" class="btn btn-primary">Add User</a>
            </div>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($user as $data): ?>
                        <tr>
                            <th scope="row"><?php echo $no++; ?></th>
                            <td><?php echo htmlspecialchars($data['name']); ?></td>
                            <td><?php echo htmlspecialchars($data['email']); ?></td>
                            <td>
                                <!-- Buttons with Bootstrap colors -->
                                <a href="index.php?action=view&id=<?php echo $data['id']; ?>" class="btn btn-info btn-sm">View</a>
                                <a href="index.php?action=edit&id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="index.php?action=delete&id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Optional: Add any custom JavaScript here
        document.addEventListener('DOMContentLoaded', function () {
            // Example: Alert when the page is loaded
            console.log("User  Information Page Loaded");
        });
    </script>
</body>

</html>