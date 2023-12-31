<?php
require "connectionData.php";

class Database{

    public static function connect(){

        $db = mysqli_connect($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"])
        or die("Error al conectar con la base de datos");
        return $db;

    }

    public static function create_db(){
        try{
            $db=self::connect();
            mysqli_query($db, "CREATE DATABASE EcommerceDB;");
            mysqli_select_db($db, $GLOBALS["db_name"]);
            crear_tabla_clientes($db);
            rellenar_tabla_clientes($db);
            crear_tabla_productos($db);
            rellenar_tabla_productos($db);
            crear_tabla_pedidos($db);
            crear_tabla_detalles($db);
            crear_tabla_devoluciones($db);
            crear_tabla_newsletter($db);
            rellenar_tabla_newsletter($db);
        }catch(Exception $e){
            mysqli_select_db($db, $GLOBALS["db_name"]);
        }
    }

}

function crear_tabla_clientes($db){
    $result = mysqli_query($db,"
    CREATE TABLE IF NOT EXISTS Clientes (
        ID_Cliente INT PRIMARY KEY auto_increment,
        NombreApellidos VARCHAR(50),
        Usuario VARCHAR(15) UNIQUE, 
        Password VARCHAR(12),
        Email VARCHAR(50) UNIQUE,
        DireccionEnvio VARCHAR(255)
    );");
    if (!$result){
        die('Error: '. mysqli_error($db));
    }
}

function rellenar_tabla_clientes($db){
    $result = mysqli_query($db,'INSERT INTO Clientes (NombreApellidos, Usuario,  Password, Email, DireccionEnvio)
            VALUES ("Nombre Prueba","prueba", "1234", "prueba@correo.com", "calle Alcala 1, 3ºD");');
    if (!$result){
        die('Error: '. mysqli_error($db));
    }
}

function crear_tabla_productos($db){
    $result = mysqli_query($db,"CREATE TABLE IF NOT EXISTS Productos (
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
    die('Error: '. mysqli_error($db));
}}

function rellenar_tabla_productos($db){
    $query='INSERT INTO Productos (nombreProducto, Descripcion, Editorial, Precio, AnoPublicacion, EdadMinima, JugadoresMinimos, JugadoresMaximos, Ean, RutaImagen, Stock)

            VALUES ("Mansiones de la locura","La puerta está abierta. En los sórdidos callejones y las ominosas mansiones de Arkham se ocultan fuerzas arcanas, secretos aterradores y monstruos indescriptibles. Sectarios y demás lunáticos conspiran en el interior de estos antiguos edificios para convocar a los Primigenios, y bajo la luz de la luna acechan bestias desconocidas por los eruditos mortales. Esta noche, un puñado de valerosos investigadores se aventuran tras las puertas cerradas de Arkham para presentar batalla contra la locura que encierran en su interior... Las Mansiones de la Locura es un juego de tablero de horror y misterio totalmente cooperativo. De 1 a 5 jugadores asumen el papel de los investigadores que se adentran en las oscuras estancias de las mansiones embrujadas de Arkham y en otros lugaresigualmente siniestros para desvelar secretos extraños, resolver ingeniosos rompecabezas y enfrentarse a peligros surgidos de otros mundos. Las Mansiones de la Locura también incluye un kit de conversión para que los propietarios de la primera edición del juego puedan utilizar sus investigadores, monstruos y módulos de tablero en esta nueva edición." , "FANTASY FLIGHT GAMES", 99.99, 2016, 14, 1, 5, 8435407610705, "mansionesdelalocura.jpg", 20),
                   ("Risk", "Risk es un clásico juego de estrategia mundial que te permite conquistar territorios y continentens para alcanzar la dominación global. Enfrenta a tus oponentes, despliega tus ejércitos estratégicamente, forma alianzas y toma decisiones tácticas para controlar el tablero y alcanzar la victoria. Con su combinación de suerte y habilidad, Risk ofrece horas de diversión estratégica para jugadores de todas las edades. ¡Prepárate para la batalla y conquista el mundo en Risk!", "HASBRO", 49.99, 2004, 10, 2, 6, 5010993324460, "risk.jpg", 15),
                   ("Zombicide Green Horde: Tiles Set", "La plaga zombi se extiende más allá de las ciudades! En las fronteras y aldeas más remotas también se libra una guerra contra las hordas no muertas. Suerte que tus compañeros y tú seáis duchos en estas lides! Mismas reglas, diferentes tácticas: usad el terreno en vuestro beneficio y coordinaos para resistir el brutal e inexorable avance del enemigo! Este producto contiene todo lo necesario para expandir el tablero de cualquier Zombicide ambientado en un mundo de fantasía medieval, añadiendo un sinfín de posibilidades para vivir nuevas aventuras. Incluye módulos de tablero de Zombicide: Green Horde y la expansión Friends and Foes.", "EDGE", 26.59, 2019, 14, 1, 6, 8435407625594, "zombicide.jpg", 15),
                   ("Orleans La Plaga", "Los habitantes de ORLÉANS han sido duramente golpeados: la plaga se ha extendido entre ellos, trayendo sufrimiento y miseria a la población. Hay muchas víctimas que lamentar. Ni siquiera el clero parece capaz de ayudarlos. Solo el médico de la plaga puede dar algo de alivio y esperanza a las personas en su sufrimiento, pero al final cada uno de vosotros está solo en su tarea de proteger a sus seguidores de la mejor manera posible Esta tercera expansión propone partidas llenas de nuevos retos para los amantes de Orleans, que tendrán que lidiar con las fichas de cadáver que invaden su bolsa y su mercado con tantas víctimas realizar las acciones necesarias será cada vez más complicado. Por suerte nuevas mecánicas como las carta de Indulgencia y el Médico de la Plaga nos darán las herramientas necesarias para lidiar con ellas. Nuevos eventos y un nuevo tablero de Acciones Benéficas completan la expansión, aportando el necesario componente temático a este nuevo desafío.", "ARRAKIS", 37.95, 2023, 12, 2, 5, 8421005001564, "orleans_la_plaga.jpg", 8),
                   ("Captain Flip", "Izad la bandera, enrolad piratas y llenad la bodega de brillantes monedas de oro. Convertíos en temibles Capitanes pirata, enrola Navegantes, Loros, Vigías o incluso Monos y gana Monedas, pero ten cuidado con las explosiones! Al final de la partida ganará quién consiga más Monedas.", "ASMODEE", 26.99, 2023, 8, 2, 5, 0911202389551, "captain_flip.jpg", 5),
                   ("Decisiones de Mierda", "¿Crees que tus amigos toman malas decisiones? Espera a jugar Decisiones de Mierda... De paso, vas a conocer nuevos aspectos (oscuros, muy oscuros) de tus amigos. A lo mejor te enteras de que en el fondo son bastante mierdas, o a lo mejor, simplemente lo confirmas!","BURO DE JUEGOS", 14.24, 2023, 18, 3, 30, 8436564813695, "decisiones_de_mierda.jpg", 10),
                   ("Skull", "COLOCA, APUESTA, MIENTE ¿A cuántos discos les puedes dar la vuelta antes de revelar una calavera? Skull es un juego de faroles y riesgos. En tu turno, debes colocar un disco bocabajo sobre tu tablero o apostar a cuántos discos piensas que puedes darles la vuelta sin revelar una Calavera.","ASMODEE", 19.99, 2023, 10, 3, 6, 3558380117803, "skull.jpg", 6),
                   ("Rey Cactus", "Un juego de bazas para principiantes. Los jugadores/as intentan jugar sus cartas con inteligencia y se llevan bazas. Gana quien obtenga más tiritas para curar sus pinchazos.","HABA JUEGOS DE MESA", 18.99, 2023, 8, 2, 4, 4010168265773, "rey_cactus.jpg", 10),
                   ("Pulpito Calmario", "Pulpito Calmario es un juego de mesa para niños con el que los más pequeños de la casa se divertirán haciendo crecer los tentáculos de su amigo el Pulpito. Con un poco de suerte, habilidad y buena memoria, podrás ganar la partida.", "HABA JUEGOS DE MESA", 16.14, 2023, 4, 2, 4, 4010168265384, "pulpito_calmario.jpg", 4),
                   ("Logic! Case - Vacaciones y Viajes", "77 acertijos por set: ¡diversión inteligente individual! Fomenta el pensamiento lógico y la concentración. Mecanismo de resolución emocionante: juego autocorrectivo. Juego de viaje ideal para llevar.", "HABA JUEGOS DE MESA", 10.44, 2023, 7, 1, 1, 4010168265711, "logic_case.jpg", 5),
                   ("Marvel Champions + Spider-Ham Pack de Héroe", "El juego de cartas es un Living Card Game cooperativo que os invita a encarnar a los superhéroes más emblemáticos del mundo. Con el contenido de esta caja básica, hasta cuatro jugadores podréis combinar vuestros esfuerzos para frustrar los perversos planes de tres Villanos diferentes! Usad vuestros extraordinarios poderes para combatir a las fuerzas del mal y vivir la experiencia del Universo Marvel como nunca antes. Además, al ser un Living Card Game, se publicarán con regularidad nuevos personajes, desafíos y aventuras que pondrán a prueba vuestra madera de héroes!","FANTASY FLIGHT GAMES", 69.99, 2020, 14, 1, 4, 8435407628373, "marvel_champions.jpg", 5),
                   ("Arkham Horror: La Fiesta del Valle de la Cicuta - Investigadores", "Cuándo la Dra. Rosa Márquez, una reputada botánica, recibe una extraña muestra de la aislada y misteriosa Isla de la Cicuta, su instinto le dice que algo no cuadra. Siguiendo la recomendación de un antiguo colega, os invita a acompañarla en su estudio de la isla, pero nada podría haberos preparado para lo que encontráis allí: una fauna letal y mutada y una maligna presencia alienígena que invade la enigmática isla; por su parte, los lugareños se preparan para un festival, aparentemente ignorantes del peligro. Disponéis de tres días para descubrir lo que acecha bajo el Valle de la Cicuta antes de que sus gentes sufran un terrible destino.", "FANTASY FLIGHT GAMES", 44.99, 2023, 14, 1, 4, 841333124021, "arkham_horror.jpg", 10),
                   ("El Señor de los Anillos: Cazador de Sueños - Expansión de Campaña", "Desde hace milenios, los elfos han partido de los Puertos Grises para surcar el océano occidental de la Tierra Media en hermosos navíos blancos, a menudo para no volver jamás. Sin embargo, se avecina una tormenta en el horizonte y algo perverso aguarda en una isla olvidada de Númenor. En la expansión de campaña Cazador de Sueños, de 1 a 4 jugadores navegan por los océanos de la Tierra Media, combaten contra corsarios en alta mar, exploran las ruinas ignotas de Númenor y defienden los Puertos Grises frente a feroces asaltantes. A lo largo de nueve escenarios que pueden jugarse por separado o como parte de una campaña, se las verán con piratas, espectros, monstruos marinos y un carismático villano al mando de una flota de poderosos barcos. Esta expansión incluye todos los escenarios que originalmente aparecían en la expansión Los Puertos Grises y el ciclo Cazador de Sueños unidos ahora en una sola caja, junto con contenido de campaña totalmente nuevo.", "FANTASY FLIGHT GAMES", 69.99, 2023, 14, 1, 4, 841333122034, "senor_anillos.jpg", 6),
                   ("Arquitectos del Reino del Oeste: Maravillas de la Construcción", "En esta expansión para Arquitectos del Reino del Oeste se añade una nueva extensión de tablero para albergar las nuevas cartas de Contribución y llevar la cuenta de la Influencia de los jugadores. Los jugadores compiten para construir las 5 Maravillas, mientras obtienen el apoyo de las nuevas fichas de Princesa y Usurero que se mueven por el tablero principal. También se incluye un sistema individual completamente nuevo con 6 oponentes únicos contra los que competir.", "EDICIONES PRIMIGENIO", 23.74, 2023, 12, 1, 5, 793618295813, "arquitectos.jpg", 8),
                   ("Dobble Anarchy Pancake", "Un juego de cartas para personas que opinan que el caos es dulce y delicioso. LA ANARQUÍA MOLA Tienes un montón de cartas de tortitas adornados con todo tipo de toppings. Empareja tus toppings con los de otro participante para que se lleve tus tortitas. Pero cuidado! Cuántas menos tortitas tengas, más complicado será que emparejes sus toppings. Y por cierto, todo el mundo tratará de hacer esto a la vez y a toda leche! La primera persona en deshacerse de sus tortitas gana la partida.", "ASMODEE", 16.99, 2023, 7, 2, 8, 3558380117551, "dobble_anarchy.jpg", 10),
                   ("Cangaceiros", "La zona desértica de Sertão, en la región Nordeste de Brasil, fue escenario de las hazañas de los Cangaceiros, hombres que abrazaron el camino del Cangaço, de canga, que significa yugo. Así como un toro lleva un yugo, el Cangaceiro llevaba armas y las consecuencias de portarlas, dejando atrás a sus seres queridos, viviendo entre un territorio hostil, O Sertão, el abrasador interior repleto de áridas zarzas, la Caatinga, y los desolados acantilados, las Serras.","MASQUEOCA", 52.24, 2023, 14, 2, 5, 8437024216049, "cangaceiros.jpg", 5),
                   ("Tambores de Guerra", "Ambientado en un mundo de fantasía, Tambores de Guerra pone a cada jugador al frente de un ejército representado por un mazo de cartas asimétrico, comandado por un héroe al mando. En partidas para dos jugadores o en solitario, Tambores de Guerra ofrece partidas rápidas y tácticas de 30 minutos de duración. Elige a tu mejor líder y dirige a tus tropas más valientes a la batalla. Marcha para aplastar a tus enemigos en épicas batallas de fantasía! Los humanos, creados como un arma para enfrentarse a los enemigos de los dioses, hacen la guerra a los orcos en su lucha por su territorio. Los orcos, una vez privados de su libertad, nunca más serán subyugados por nadie. Elige un bando y lleva a tu ejército a la victoria en juegos dinámicos y tácticos, enfrentándote a ejércitos asimétricos cuyas unidades están representadas por cartas en el campo de batalla. El tiempo corre, tus tropas te están esperando... Los Tambores de Guerra están latiendo!", "ECLIPSE", 22.50, 2023, 10, 1, 2, 0634438377528, "tambores_de_guerra.jpg", 8),
                   ("BOOP", "Un juego de estrategia abstracto para dos jugadores, engañosamente adorable y engañosamente desafiante. Cada vez que colocas un gatito en la cama, hace «boop». Es decir, empuja a todos los demás gatitos del tablero un espacio más lejos. Alinea tres gatitos seguidos para graduarlos en gatos gordos! y luego, alinea tres gatos gordos para ganar.", "DELIRIUM GAMES", 23.70, 2023, 10, 2, 2, 8435163900270, "boop.jpg", 10),
                   ("MY ISLAND", "My Island es un juego de mesa en el que, mediante un sistema legacy competitivo, desarrollarás tu propia isla a partir de losetas interconectadas, siguiendo las mecánicas introducidas por el juego My City. ¡Crea tu isla partida a partida y vive una historia única!\n\nA lo largo de veinticuatro partidas, vivirás la historia de tu isla y descubrirás sus secretos. Cada una de las partidas incluye nuevas reglas y materiales de juego con los que cambiarás tu isla de forma permanente. Disfruta partida a partida del crecimiento y desarrollo de tu creación.", "DEVIR", 47.50, 2023, 10, 2, 4, 2710202389169, "my_island.jpg", 6),
                   ("EL GRANDE", "Vuelve El Grande Por la puerta grande! Esta edición especial, con arte renovado en la caja, el tablero y las cartas, también contiene un libro de reglas revisadas, nuevos componentes y dos miniexpansiones, La nueva regencia y Cambio de poder. Aprovecha esta ocasión única de redescubrir el clásico de mayorías por excelencia, que nos transporta a la España del siglo XV para tratar de dominar el máximo de regiones posibles con nuestros caballeros.", "DEVIR", 47.50, 2023, 12, 2, 5, 8436607941859, "el_grande.jpg", 8),
                   ("ESTRELLAS FUGACES", "Los niños/as intentan, con un poco suerte y memoria, encontrar las estrellas que faltan en sus respectivos tableros. El jugador quien recoge más estrellas gana.", "HABA JUEGOS DE MESA", 33.24, 2023, 4, 2, 4, 4010168265445, "estrellas_fugaces.jpg", 10),
                   ("ISLET JUEGO DE MESA", "Sumérgete en el mundo de las aves tropicales en este emocionante juego de mesa. Explora el islote, recolecta recursos y compite para crear los nidos perfectos para tus huevos. Los jugadores se turnan para expandir el islote colocando fichas y avanzando estratégicamente sus aves para poner huevos. El juego termina cuando un jugador pone su último huevo o cuando se agotan las fichas del islote. El jugador con más huevos puestos es el ganador. Experimenta la emoción de Islet ahora mismo!", "2TOMATOES", 33.25, 2023, 8, 1, 4, 8437022321707, "islet.jpg", 9),
                   ("Claro", "Claro es un filler de cartas en el que el objetivo es ser la última persona en colocar carta y ganar 3 estrellas. Lo más difícil de Claro es encontrar un juego más sencillo. Las reglas son tan claras como la luz del día: 1. Juega siempre una carta más alta o una carta con una estrella del mismo color. 2. Sé la última persona en jugar carta y gana una estrella. Cuando una persona consiga 3 estrellas, ganará la partida y será proclamada como la nueva gran superestrella de Claro. Contenido: 55 cartas y 13 estrellas.", "ROCKET LEMON", 11.35, 2023, 7, 2, 6, 8425402835623, "claro.jpg", 15),
                   ("Pequeñas Grandes Galaxias Beyond the Black", "Vuestras galaxias se han expandido hasta la extensión del espacio conocido. Os solapáis con vuestros rivales y lucháis a brazo partido por los planetas fértiles. Ahora es el momento de ampliar los horizontes. Ahora es el momento de mejorar tus naves hasta los límites de la tecnología actual, y prepararlas con los valientes pilotos. Ahora es el momento de ir más allá de la profunda negrura del espacio, hacia el universo verdaderamente desconocido... Tiny Epic Galaxies: Beyond the Black también viene con planetas adicionales y nuevas y emocionantes misiones secretas para explorar!", "DEVIR", 23.75, 2023, 14, 1, 5, 0210202388565, "pequenas_grandes_galaxias.jpg", 12),
                   ("Pequeños Grandes Zombies", "Los zombis invaden el centro comercial e intentan acabar con todos los supervivientes. Ármate de valor (y de equipo) e intenta cumplir los tres objetivos de la partida. Con una buena variedad de objetivos y modos de juego cooperativo, competitivo, asimétrico y solitario, esta pequeña gran caja te dará horas y horas de juego.", "DEVIR", 28.50, 2023, 14, 1, 5, 8436017227246, "pequenos_grandes_zombies.jpg", 15),
                   ("Thebes Lies", "Thebes lies es un juego de cartas ambientado en el antiguo Egipto en el que los participantes tendrán que tirar de faroleo y engaño para colar sus mentiras a los demás jugadores. Ahmet, un anciano embustero por naturaleza, tenía terminantemente prohibido contar cualquier tipo de trola de puertas para adentro. Es por eso que, para no desperdiciar sus grandes dotes contando bulos y engaños, pasaba las tardes en su bazar jugándose la compra de la semana echándose unas partidas a «Thebes Lies» con sus clientes.","IBEYIS GAMES", 14.95, 2023, 7, 4, 8, 8425402874868, "thebes_lies.jpg", 20),
                   ("Las Torres Errantes", "Año tras año, las promociones de la Escuela de Magia de Ravenland compiten en sus artes mágicas. Cada clase intenta ser la primera en alcanzar la meta del gran examen final, el legendario Castillo del Cuervo. Pero el camino hacia el Castillo del Cuervo está lleno de trampas y desafíos. Sólo la clase que utilice correctamente sus habilidades mágicas y domine el arte de las torres errantes saldrá de la escuela como maestros magos.", "PIF GAMES", 37.95, 2023, 8, 2, 6, 8425402874844, "torres_errantes.jpg", 15),
                   ("Mecanisburgo", "En este juego de mesa, Mecanisburgo es la capital de La Unión, la Europa de un mundo paralelo donde las predicciones de la ciencia ficción clásica para el siglo XXI se han cumplido: robots, cyborgs, humanos e inteligencias artificiales conviven en un mundo donde la fuente de energía extraterrestre cavorita ha potenciado la ciencia y la tecnología durante gran parte del siglo XIX y XX. Las grandes familias nobiliarias, las megacorporaciones y las propias naciones se han fusionado sorprendentemente, creando luchas de poder en un entramado extraño y fascinante. Los jugadores representan a algunas de estas familias/megacorporaciones en un momento de crisis económica y política que todos quieren aprovechar para reconducir el mundo futuro un poco más a su favor. Como líder de tu megacorporación, deberás utilizar tus agentes, propiedades y poderosas I.A. para ir escalando peldaños en el juego del poder. Pero no todo es fácil. El terrorismo, las amenazas interdimensionales y las fricciones sociales de un mundo complejo pueden hacer que todos los grandes proyectos de estas megacorporaciones se vayan al traste. Incluso es posible que una de las megacorporaciones declare la guerra al mundo y pretenda establecer una dictadura corporativa barriendo los últimos rastros de democracia. Una época de grandes logros y grandes riesgos espera a la humanidad. ¿Deberán colaborar los viejos rivales? ¿O vencerán los aspectos más sórdidos y violentos de una civilización de tiempos más primitivos?", "GENX GAMES", 27.50, 2008, 14, 2, 6, 8437001765270, "mecanisburgo.jpg", 10),
                   ("Twilight Struggle, La Guerra Fría 1945-1989", "La guerra fría, 1945-1989 representa la lucha que duró 45 años entre las dos grandes superpotencias de Estados Unidos y la Unión Soviética. Twilight Struggle es un juego de tablero para dos jugadores en la que se refleja de forma fiel los acontecimientos históricos ocurridos entre estas dos naciones desde el final de la segunda guerra mundial hasta el año 1989.", "DEVIR", 52.25, 2005, 13, 2, 2, 8436017220780, "twilight_struggle.jpg", 10),
                   ("Guerra del Anillo", "La Guerra del Anillo es un aclamado juego de estrategia competitivo para 2-4 personas, diseñado por Roberto Di Meglio, Marco Maggi y Francesco Nepitello, que permite a sus jugadores sumergirse en el fantástico mundo de El Señor de los Anillos de J.R.R. Tolkien y experimentar su acción épica, conflicto dramático y personajes memorables. Como jugador de los Pueblos Libres, estás al mando de las orgullosas huestes de los reinos más importantes de la Tercera Edad. Desde los señores de los caballos de Rohan hasta los soldados de Gondor y los señores elfos de Rivendel, lideras la defensa de los últimos reinos libres de la Tierra Media. Enfréntate a los malvados esbirros de Sauron en el campo de batalla en un intento desesperado por retrasar su ataque, mientras conduces a la Comunidad del Anillo en la misión al monte del Destino. Como jugador de la Sombra, lideras las hordas del Señor Oscuro y sus secuaces más poderosos mientras intentan llevar la oscuridad a la Tierra Media. Legiones de orcos, troles, jinetes de lobos y los temibles Espectros del Anillo esperan tus órdenes. Encuentra al Portador del Anillo y lleva el precioso objeto a su amo, o aplasta a los enemigos con tus poderosos ejércitos. Esta es tu oportunidad de forjar el destino de una época. En La Guerra del Anillo, un grupo de jugadores toma el control de los Pueblos Libres, mientras que otro controla los ejércitos de la Sombra. Inicialmente, las naciones de los Pueblos Libres son reacias a alzarse en armas contra Sauron, por lo que deben sufrir un ataque o ser persuadidas por Gandalf u otros Compañeros para que comiencen a luchar: esto está representado por el Marcador Político, que muestra si una nación está lista para luchar en la Guerra del Anillo o no. El juego se puede ganar mediante una victoria militar si Sauron conquista un cierto número de ciudades y fortalezas de los Pueblos Libres, o viceversa. Pero la verdadera esperanza de los Pueblos Libres radica en la misión del Portador del Anillo: mientras los ejércitos se enfrentan en la Tierra Media, la Comunidad del Anillo está tratando de llegar en secreto al monte del Destino para destruir el Anillo Único. Sauron no es consciente de la intención real de sus enemigos, pero está buscando el precioso Anillo en la Tierra Media, por lo que la Comunidad se enfrentará a numerosos peligros, representados por las reglas de la Búsqueda del anillo. Aun así, la Comunidad puede impulsar a los Pueblos Libres a la lucha contra Sauron, por lo que el jugador que los representa debe equilibrar la necesidad de proteger al Portador del Anillo de cualquier daño con la de armar una defensa adecuada contra los ejércitos de la Sombra, para que no invadan la Tierra Media antes de que el Portador del Anillo complete su misión. Cada turno de juego gira en torno al lanzamiento de dados de acción: cada dado corresponde a una acción que un jugador puede realizar durante el turno. Dependiendo de la cara que aparezca en cada dado, son posibles diferentes acciones (mover ejércitos o personajes, reclutar tropas, avanzar en una pista política). Los dados de acción también se pueden usar para robar o jugar cartas de evento. Las cartas de evento se juegan para representar acontecimientos específicos de la historia (o que posiblemente podrían haber sucedido) que no se pueden representar a través del juego normal. Cada carta de evento también puede crear un turno inesperado en el juego, permitiendo acciones especiales o alterando el curso de una batalla. La Guerra del Anillo Segunda Edición es un juego estratégico y táctico de guerra de fantasía que brinda una experiencia de juego única e inolvidable. La hermosa asimetría del juego lo hace más creíble y orgánico. Puedes intentar jugar en ambos bandos y disfrutar de la sensación totalmente diferente que obtienes al luchar por el Bien o por el Mal. Si eres fanático de El señor de los anillos, este es un juego que no querrás perderte.", "DEVIR", 85.50, 2012, 13, 2, 4, 8436017220797, "guerra_del_anillo.jpg", 35),
                   ("Dixit Quest", "Dixit ... un juego sorprendente, encantador y sugerente para disfrutar con los amigos y la familia por igual. Este galardonado juego regresa con una expansión de 84 cartas: Dixit Quest.", "ASMODEE", 21.99, 2010, 6, 3, 6, 3558380086116, "dixit_quest.jpg", 20),
                   ("Catan: Ciudades y Caballeros", " La expansión de Ciudades y Caballeros de Catán se aplica sobre el juego básico, y también se puede jugar conjuntamente con la 1ª expansión (Navegantes). Con esta expansión se añaden monumentos a ciudades y ataques de piratas. Incluye 90 cartas de juego.", "DEVIR", 42.75, 2019, 12, 2, 4, 8436017220124, "catan_ciudades_caballeros.jpg", 15),
                   ("Catan, El Juego Edición 25 Aniversario", "Descubre el gran universo de Catan! Esta edición conmemorativa contiene el juego básico, la aclamada expansión Navegantes y dos escenarios que te ofrecerán más variedad todavía. Catan lleva ya 25 años cautivando a millones de personas en todo el mundo. Un juego siempre sorprendente y siempre distinto. Pon rumbo a Catan! Incluye Catan, Catan Navegantes y dos mapas exclusivos.", "DEVIR", 66.50, 2020, 12, 2, 4, 8436589620469, "catan_25_aniversario.jpg", 20),
                   ("!Aventureros al Tren! USA", "¡Aventureros al Tren! es un juego de aventuras en tren donde los jugadores acumulan cartas de vagones para conectar diferentes ciudades de Norteamérica. Gana puntos construyendo rutas largas y cumpliendo Billetes de Destino.", "Days of Wonder", 47.99, 2014, 8, 2, 5, 824968717110, "aventureros_al_tren_usa.jpg", 10),
                   ("La Isla Prohibida", "Juego colaborativo en el que los jugadores tratan de hacerse con los tesoros de una mítica isla antes de que las aguas la cubran por completo. Incluye 58 cartas de juego.", "DEVIR", 23.75, 2010, 10, 1, 4, 8436017220285, "isla_prohibida.jpg", 15),
                   ("Black Stories: Edición Marrones Mortales", "Advertencia: Los marrones ocurren, amigos! Estas historias negras lo demuestran... porque, por increíble que parezca, son reales. Sucedieron de verdad. 50 misterios negros como la noche, 50 historias escritas por la vida misma, simplemente absurdas, repugnantes y totalmente sorprendentes. Y algunas veces, con resultados letales! Desentraña los misterios mediante una inteligente reconstrucción de los hechos. Pero ten cuidado: también podrían sucederte a ti! ¿Has probado la sangre?", "GENX GAMES", 12.30, 2013, 12, 2, 15, 8437010181795, "black_stories_marrones_mortales.jpg", 20),
                   ("Scape", "Scape es un juego rápido donde cada jugador decide si juega sus cartas en la construcción del túnel o realizando acciones que apoyen su estrategia. Partidas cortas y llenas de acción, deducción e interacción entre jugadores que crean adicción.", "GDM", 6.00, 2020, 8, 3, 14, 6527331727092, "scape.jpg", 10),
                   ("Virus!", "En el hospital Nuestra Señora de Tranjis, saltan las alarmas cuando los novatos del laboratorio se dan cuenta demasiado tarde de que los contenedores de muestras no estaban vacíos como pensaban. En su interior contienen brotes de virus experimentales que ahora campan a sus anchas por todo el centro y sólo tú puedes detenerlos.", "TRANJIS GAMES", 14.25, 2015, 8, 2, 6, 9788460659662, "virus.jpg", 20),
                   ("Combat Commander Europa", "Juego de tablero que cubre combates de infantería en la Europa de la Segunda Guerra Mundial. Un jugador toma el mando de las tropas alemanas y otro juega dirigiendo a los aliados (Rusia o EEUU). Se alternan turnos jugando cartas para mover sus unidades o abrir fuego contra el enemigo. Cada hexágono de Combat Commander representa unos 30 metros, y cada unidad representa desde un oficial al mando hasta una escuadra de combate de 10 soldados.", "DEVIR", 60.80, 2015, 12, 2, 2, 8436017221923, "combat_commander.jpg", 10),
                   ("Carcassonne Junior, Edición 2020", "Carcassonne Junior es una variante simplificada de Carcassonne, un juego que ha vendido millones de ejemplares, para que tanto los pequeños como los mayores puedan disfrutar de la partida. Pero aquí no se cuentan puntos, sino que el primero que consiga colocar todas sus figuras sobre el terreno será el ganador de esta entretenida competición.", "DEVIR", 23.75, 2020, 4, 2, 4, 8436017223644, "carcassonne_junior.jpg", 10);';
    mysqli_query($db,$query);

}

function crear_tabla_pedidos($db){
    $query="CREATE TABLE IF NOT EXISTS Pedidos (
        ID_Pedido INT PRIMARY KEY auto_increment,
        FechaPedido DATE,
        ID_Cliente INT,
        EstadoPago ENUM('por pagar', 'pagado') DEFAULT 'por pagar',
        DireccionEnvio VARCHAR(255),
        FOREIGN KEY (ID_Cliente) REFERENCES Clientes(ID_Cliente)
    );";
    mysqli_query($db,$query);
}

function crear_tabla_detalles($db){
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
    mysqli_query($db,$query);
}

function crear_tabla_devoluciones($db){
    $query="CREATE TABLE IF NOT EXISTS Devoluciones (
        ID_Devolucion INT PRIMARY KEY auto_increment,
        ID_DetallePedido INT,
        FechaDevolucion DATE,
        Motivo VARCHAR(50),
        Completada ENUM('no', 'devuelto') DEFAULT 'no',
        FOREIGN KEY (ID_DetallePedido) REFERENCES DetallesPedido(ID_Detalle)
    );";
    mysqli_query($db,$query);
}

function crear_tabla_newsletter($db){
    $query="CREATE TABLE IF NOT EXISTS Newsletter (
        ID_Newsletter INT PRIMARY KEY auto_increment,
        Email VARCHAR(50) unique
    );";
    mysqli_query($db,$query);
}

function rellenar_tabla_newsletter($db){
    $query="INSERT INTO Newsletter (Email) VALUES ('prueba@correo.com');";
    mysqli_query($db,$query);
}

?>

