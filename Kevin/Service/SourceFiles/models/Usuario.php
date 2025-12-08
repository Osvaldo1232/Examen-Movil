<?php
class Usuario {
    private $conn;
    private $table_name = "usuarios";

    public $id;
    public $nombre;
    public $email;
    public $password;
    public $fecha_registro;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Registrar usuario
    public function registrar() {
        $query = "INSERT INTO " . $this->table_name . "
                SET nombre=:nombre,
                    email=:email,
                    password=:password";

        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $password_hash);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Verificar si el email ya existe
    public function emailExiste() {
        $query = "SELECT id, nombre, email, password 
                FROM " . $this->table_name . "
                WHERE email = ?
                LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->email);
        $stmt->execute();

        $num = $stmt->rowCount();

        if($num > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->nombre = $row['nombre'];
            $this->email = $row['email'];
            $this->password = $row['password'];
            return true;
        }

        return false;
    }

    // Verificar password
    public function verificarPassword($password_ingresado) {
        return password_verify($password_ingresado, $this->password);
    }
}
?>