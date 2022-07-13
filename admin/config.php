<?php
define('DIR_BASE', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
/* Detaliile de conectare la baza de date */
define('DB_HOST', 'localhost');
define('DB_NAME', 'db_proiect');
define('DB_USER', 'admin');
define('DB_PASS', 'admin');
/*Se reporteaza toate erorrile cu exceptia celor de tip NOTICE si DEPRECATED */
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

?>