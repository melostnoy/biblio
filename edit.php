<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
    <title>Библиотека</title>
    <meta name="description" content="Описание" />
    <meta name="keywords" content="ключевые слова" />
    <link rel="stylesheet" href="main.css" charset="utf-8" />
</head>
 
<body>
    <div id="header">
         <h2>ПОЛЕЗНАЯ БИБЛИОТЕКА</h2>
    </div>
    <hr />

<?

    if(isset($_GET['edit'])) {
         $edit = (int) $_GET['edit'];
    }

$host = 'localhost'; 
    $login = 'a5shopru_dkey';
    $pass = '7894561230';
    $db_name = 'a5shopru_dkey';
    // Подключение к базе данных
    mysql_connect($host,$login,$pass) or die('Нет соединения с базой данных');
    mysql_query('SET NAMES utf-8');
    mysql_select_db($db_name) or die ('База данных не найдена');

    $result = mysql_query("SELECT * FROM books WHERE code='$edit'");

    echo "<table border=0 align=center>";
    echo "<tr><td align=center><B>Код</B></td>";
    echo "<td align=center><B>Название</B></td>";
    echo "<td align=center><B>Автор</B></td>";
    echo "<td align=center><B>Жанр</B></td>";
    echo "<td align=center><B>Действие</B></td></tr>";

    $arr_guest=mysql_fetch_array($result);

    echo "<form method=get action='save.php'>";
    echo "<input type=hidden name='update' value='".$arr_guest["id"]."'>";
 
    echo "<td><input type=text name='code' value='".$arr_guest["code"]."'></td>";
    echo "<td><input type=text name='title' value='".$arr_guest["title"]."'></td>";
    echo "<td><input type=text name='autor' value='".$arr_guest["autor"]."'></td>";
    echo "<td><input type=text name='genre' value='".$arr_guest["genre"]."'></td>";
    echo "<td><input type=submit name='save_books' value='Сохранить изменения'></td></tr>";
  
    echo "</form>";
    echo "</table>";
    mysql_close();
?>

</body>
</html>