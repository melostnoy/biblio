<?php

function startup()
{
    $host = 'localhost'; 
    $login = 'a5shopru_dkey';
    $pass = '7894561230';
    $db_name = 'a5shopru_dkey';
    // Подключение к базе данных
    mysql_connect($host,$login,$pass) or die('Нет соединения с базой данных');
    mysql_query('SET NAMES utf-8');
    mysql_select_db($db_name) or die ('База данных не найдена');
}

// показ книг
function books_view()
{
    $query = "SELECT * FROM books";
    $result = mysql_query($query);
    if (!$result)
         die(mysql_error());

    $n = mysql_num_rows($result);
    $bookss = array();
    for ($i = 0; $i < $n; $i++)
    {
         $row = mysql_fetch_assoc($result);
	 $bookss[] = $row;

     }
     return $bookss;
}

// добавляем новую книгу
function add_new_books($code, $title, $autor, $genre)
{
    $code = trim($code);
    $title = trim($title);
    $autor = trim($autor);
    $genre = trim($genre);

    $t = "INSERT INTO books (code,title,autor,genre) VALUES ('%d','%s','%s','%s')";
    $query = sprintf($t,
                     mysql_real_escape_string($code),
                     mysql_real_escape_string($title),
                     mysql_real_escape_string($autor),
                     mysql_real_escape_string($genre));
    $result = mysql_quer($query);
    if (!$result)
         die(mysql_error());
    return true;
}

?>