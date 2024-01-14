<?php
require_once 'app\models\Contact.php';

class ContactController
{
    private $model;
    public function __construct()
    {
        $this->model = new Contact();
    }

    public function index()
    {
        //we are going to show the contactUs view
        require_once 'app/views/contact/contact.php';
    }

    public function insert()
    {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $mensaje = $_POST['mensaje'];

        $result = $this->model->insertContact($nombre, $correo, $telefono, $mensaje);

        if (isset($result['success'])) {
            // Save the success message in the session and redirect the user to the contact page
            $_SESSION['success'] = $result['success'];
            header('Location: ' . base_url . 'Contact/index');
        } else {
            // Save the errors in the session and redirect the user to the contact page
            $_SESSION['errors'] = $result['errors'];
            header('Location: ' . base_url . 'Contact/index');
        }
    }
}
?>