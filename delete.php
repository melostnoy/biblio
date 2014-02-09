<?php

    $host = 'localhost'; 
    $login = 'a5shopru_dkey';
    $pass = '7894561230';
    $db_name = 'a5shopru_dkey';
    // Подключение к базе данных
    mysql_connect($host,$login,$pass) or die('Нет соединения с базой данных');
    mysql_query('SET NAMES utf-8');
    mysql_select_db($db_name) or die ('База данных не найдена');


    // Если была нажата ссылка удаления, удаляем запись 
    if(isset($_GET['del'])) {
         $del = (int) $_GET['del'];
         $query = "DELETE FROM books WHERE `code` = $del";
    // Выполняем запрос. Если произойдет ошибка - вывести ее. 
    mysql_query($query) or die($query . '<br />' . mysql_error());
    }
    mysql_close();
?>
   
   <meta http-equiv="refresh" content="0; url=index.php">