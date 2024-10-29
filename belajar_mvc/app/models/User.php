<?php

class User
{
    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    public function getUserById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllUsers()
    {
        $stmt = $this->db->prepare("SELECT * FROM users ORDER BY id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUser($data)
    {
        $stmt = $this->db->prepare("INSERT INTO users (name, email, alamat, no_hp, foto) VALUES (:name, :email, :alamat, :no_hp, :foto)");
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':alamat', $data['alamat']);
        $stmt->bindParam(':no_hp', $data['no_hp']);
        $stmt->bindParam(':foto', $data['foto'], PDO::PARAM_LOB);
        $stmt->execute();
    }

    public function updateUser($id, $data)
    {
        if (isset($data['foto'])) {
            $stmt = $this->db->prepare("UPDATE users SET name = :name, email = :email, alamat = :alamat, no_hp = :no_hp, foto = :foto WHERE id = :id");
            $stmt->bindParam(':foto', $data['foto'], PDO::PARAM_LOB);
        } else {
            $stmt = $this->db->prepare("UPDATE users SET name = :name, email = :email, alamat = :alamat, no_hp = :no_hp WHERE id = :id");
        }

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':alamat', $data['alamat']);
        $stmt->bindParam(':no_hp', $data['no_hp']);
        $stmt->execute();
    }

    public function deleteUser($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
