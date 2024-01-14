<?php
class Contact
{
    private $id;
    private $nombre;
    private $email;
    private $telefono;
    private $mensaje;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function insert_contacto($nombre, $email, $telefono, $mensaje)
    {
        $result = false;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->mensaje = $mensaje;
        $result = $this->db->query("INSERT INTO ecommercedb.contacto (Nombre, Email, Telefono, Mensaje) 
        VALUES ('$nombre', '$email', '$telefono', '$mensaje');");
        if (!$result) {
            die('Error: ' . mysqli_error($this->db));
        }
        return $result;
    }

    public function insertContact($nombre, $correo, $telefono, $mensaje)
    {
        $errors = [];

        // Validate the data before insert it into the database
        if (empty($nombre)) {
            $errors[] = "El nombre es obligatorio.";
        }

        if (strlen($telefono) != 9) {
            $errors[] = "El teléfono debe tener 9 caracteres.";
        }

        if (empty($mensaje)) {
            $errors[] = "Escribe tu pregunta o comentario.";
        }

        if (empty($errors)) {
            // Insert the data into the database
            if ($this->insert_contacto($nombre, $correo, $telefono, $mensaje) == true) {
                return ["success" => "Los datos se han enviado correctamente."];
            } else {
                return ["errors" => $errors];
            }
        } else {
            return ["errors" => $errors];
        }
    }
}