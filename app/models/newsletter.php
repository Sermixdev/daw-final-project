<?php
require '../../config/database.php';
require '../../config/parameters.php';

$response = array('success' => false, 'message' => '');

$email = $_POST['email'];
$con = Database::connect();
mysqli_select_db($con, $GLOBALS["db_name"]);

// Check if the email already exists in the database
$query = "SELECT * FROM newsletter WHERE email = '$email'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // The email already exists in the database.
    $response['message'] = "Este correo electrónico ya está registrado.";
} else {
    // The email does not exist in the database, so we insert it
    insert_email_newsletter($con, $email);
    $response['success'] = true;
    $response['message'] = "¡Suscripción exitosa!";
}

mysqli_close($con);

echo json_encode($response);
?>