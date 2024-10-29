<?php
require_once 'config/database.php';
require_once 'app/controllers/UserController.php';

$dbConnection = getDBConnection();
$controller = new UserController($dbConnection);

$action = isset($_GET['action']) ? $_GET['action'] : 'show';
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

switch ($action) {
    case 'show':
        $controller->show();
        break;
    case 'add':
        $controller->add();
        break;
    case 'store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'alamat' => $_POST['alamat'],
                'no_hp' => $_POST['no_hp'],
                'foto' => file_get_contents($_FILES['foto']['tmp_name'])
            ];
            $controller->store($data);
        }
        break;
    case 'view':
        if ($id) {
            $controller->view($id);
        }
        break;
    case 'edit':
        $controller->edit($id);
        break;
    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'alamat' => $_POST['alamat'],
                'no_hp' => $_POST['no_hp'],
            ];

            // Cek apakah ada foto baru yang diunggah
            if (!empty($_FILES['foto']['tmp_name'])) {
                $data['foto'] = file_get_contents($_FILES['foto']['tmp_name']);
            } else {
                // Jika tidak ada foto baru, ambil foto lama dari database
                $existingUser = $controller->getUserById($id); // Memastikan menggunakan controller
                $data['foto'] = $existingUser['foto'];
            }

            $controller->update($id, $data);
        }
        break;
    case 'delete':
        $controller->delete($id);
        break;
    default:
        $controller->show();
        break;
}
