<?php
require "connectionData.php";

function conectar(){
    $con = mysqli_connect($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"])
    or die("Error al conectar con la base de datos");
    crear_bdd($con);
    return $con;
}
function crear_bdd($con){
    try{
        mysqli_query($con, "CREATE DATABASE EcommerceDB;");
        mysqli_select_db($con, $GLOBALS["db_name"]);
        crear_tabla_clientes($con);
        rellenar_tabla_clientes($con);
        crear_tabla_productos($con);
        rellenar_tabla_productos($con);
        crear_tabla_pedidos($con);
        crear_tabla_detalles($con);
        crear_tabla_devoluciones($con);
    }catch(Exception $e){
        mysqli_select_db($con, $GLOBALS["db_name"]);
    }
}

function crear_tabla_clientes($con){
    $result = mysqli_query($con,"
    CREATE TABLE IF NOT EXISTS Clientes (
        ID_Cliente INT PRIMARY KEY auto_increment,
        NombreApellidos VARCHAR(50),
        Usuario VARCHAR(15) UNIQUE, 
        Password VARCHAR(12),
        Email VARCHAR(50) UNIQUE,
        DireccionEnvio VARCHAR(255)
    );");
    if (!$result){
        die('Error: '. mysqli_error($con));
    }
}

function rellenar_tabla_clientes($con){
    $result = mysqli_query($con,'INSERT INTO Clientes (NombreApellidos, Usuario,  Password, Email, DireccionEnvio)
            VALUES ("Nombre Prueba","prueba", "1234", "prueba@correo.com", "calle Alcala 1, 3ºD");');
    if (!$result){
        die('Error: '. mysqli_error($con));
    }
}

function crear_tabla_productos($con){
    $result = mysqli_query($con,"CREATE TABLE IF NOT EXISTS Productos (
            ID_Producto INT PRIMARY KEY auto_increment,
            NombreProducto VARCHAR(100) UNIQUE,
            Descripcion VARCHAR(5000),
            Editorial VARCHAR(30),
            Precio DECIMAL(10, 2),
            AnoPublicacion INTEGER(4),
            EdadMinima INTEGER(3),
            JugadoresMinimos INTEGER(2),
            JugadoresMaximos INTEGER(2),
            Ean VARCHAR (13) UNIQUE,
            RutaImagen VARCHAR (500) UNIQUE,
            Stock INTEGER(3)
        );");
if (!$result){
    die('Error: '. mysqli_error($con));
}}

function rellenar_tabla_productos($con){
    $query='INSERT INTO Productos (nombreProducto, Descripcion, Editorial, Precio, AnoPublicacion, EdadMinima, JugadoresMinimos,
                       JugadoresMaximos, Ean,RutaImagen, Stock)
            VALUES ("Mansiones de la locura","La puerta está abierta. En los sórdidos callejones y las ominosas mansiones de Arkham se ocultan fuerzas arcanas, secretos aterradores y monstruos indescriptibles. Sectarios y demás lunáticos conspiran en el interior de estos antiguos edificios para convocar a los Primigenios, y bajo la luz de la luna acechan bestias desconocidas por los eruditos mortales. Esta noche, un puñado de valerosos investigadores se aventuran tras las puertas cerradas de Arkham para presentar batalla contra la locura que encierran en su interior... Las Mansiones de la Locura es un juego de tablero de horror y misterio totalmente cooperativo. De 1 a 5 jugadores asumen el papel de los investigadores que se adentran en las oscuras estancias de las mansiones embrujadas de Arkham y en otros lugaresigualmente siniestros para desvelar secretos extraños, resolver ingeniosos rompecabezas y enfrentarse a peligros surgidos de otros mundos. Las Mansiones de la Locura también incluye un kit de conversión para que los propietarios de la primera edición del juego puedan utilizar sus investigadores, monstruos y módulos de tablero en esta nueva edición." , "FANTASY FLIGHT GAMES", "99.99",2016,14,1,5,8435407610705, "mansionesdelalocura.jpg",20);';
    mysqli_query($con,$query);

}

function crear_tabla_pedidos($con){
    $query="CREATE TABLE IF NOT EXISTS Pedidos (
        ID_Pedido INT PRIMARY KEY auto_increment,
        FechaPedido DATE,
        ID_Cliente INT,
        EstadoPago ENUM('por pagar', 'pagado') DEFAULT 'por pagar',
        DireccionEnvio VARCHAR(255),
        FOREIGN KEY (ID_Cliente) REFERENCES Clientes(ID_Cliente)
    );";
    mysqli_query($con,$query);
}

function crear_tabla_detalles($con){
    $query="CREATE TABLE IF NOT EXISTS DetallesPedido (
        ID_Detalle INT PRIMARY KEY auto_increment,
        ID_Pedido INT,
        ID_Producto INT,
        Cantidad INT,
        Devuelto ENUM('no', 'en proceso', 'devuelto') DEFAULT 'no',
        PrecioUnitario DECIMAL(10, 2),
        Subtotal DECIMAL(10, 2),
        FOREIGN KEY (ID_Pedido) REFERENCES Pedidos(ID_Pedido),
        FOREIGN KEY (ID_Producto) REFERENCES Productos(ID_Producto)
    );";
    mysqli_query($con,$query);
}

function crear_tabla_devoluciones($con){
    $query="CREATE TABLE IF NOT EXISTS Devoluciones (
        ID_Devolucion INT PRIMARY KEY auto_increment,
        ID_DetallePedido INT,
        FechaDevolucion DATE,
        Motivo VARCHAR(50),
        Completada ENUM('no', 'devuelto') DEFAULT 'no',
        FOREIGN KEY (ID_DetallePedido) REFERENCES DetallesPedido(ID_Detalle)
);";
    mysqli_query($con,$query);
}

?>

