<?php

    require_once('model.php'); 
    startup ();// Подключение к базе данных

    // Подключение шаблона страницы.
    include('tpl.php');

    mysql_close();

?>


