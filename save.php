<?php
    
    $host = 'localhost'; 
    $login = 'a5shopru_dkey';
    $pass = '7894561230';
    $db_name = 'a5shopru_dkey';
    // Подключение к базе данных
    mysql_connect($host,$login,$pass) or die('Нет соединения с базой данных');
    mysql_query('SET NAMES utf-8');
    mysql_select_db($db_name) or die ('База данных не найдена');

    if(isset($_GET['update'])) {
         $id = (int) $_GET['update'];
         $code = (int) $_GET['code'];
         $title = $_GET['title'];
         $autor = $_GET['autor'];
         $genre = $_GET['genre'];
    }

    $result = mysql_query ("UPDATE books SET code='$code', title='$title', autor='$autor', genre='$genre' WHERE id='$id'"); 
    if ($result == 'true')
    {
         echo "Данные по книге были изменены.";
    }
    else
    {
         echo "Данные не были изменены!";
    }
    mysql_close();

?>

 <meta http-equiv="refresh" content="2; url=index.php">
