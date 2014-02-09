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

<?php

    $sql="select * from books";

    $result=mysql_query($sql);
    // Узнаем кол-во записей в таблице books
    $rows=mysql_num_rows($result);

    echo "<form method=get action='add_book.php'>";
    echo "<table border=0 align=center>";
    echo "<tr><td align=center><B>Код</B></td>";
    echo "<td align=center><B>Название</B></td>";
    echo "<td align=center><B>Автор</B></td>";
    echo "<td align=center><B>Жанр</B></td>";
    echo "<td align=center><B>Действие1</B></td>";
    echo "<td align=center><B>Действие2</B></td></tr>";

    for($i=0;$i<$rows;$i++) {
    // Устанавливаем курсор на соответствующую позицию
    mysql_data_seek($result,$i);
    // Записываем в ассоциативный массив <I>$arr_guest</I>
    // значения полей таблицы books
    $arr_guest=mysql_fetch_array($result);
    echo "<td>".$arr_guest["code"]."</td>";
    echo "<td>".$arr_guest["title"]."</td>";
    echo "<td>".$arr_guest["autor"]."</td>";
    echo "<td>".$arr_guest["genre"]."</td>";
    echo "<td><a name=\"del\" href=\"delete.php?del=".$arr_guest['code']."\">Удалить</a></td>";
    echo "<td><a name=\"edit\" href=\"edit.php?edit=".$arr_guest['code']."\">Редактировать</a></td></tr>";
    };

    echo "<tr><td colspan=5 align=center>";
    echo "<input type=submit value='Добавить книгу'>";
    echo "</td></tr>";
    echo "</table>";
    echo "</form>";
?>

</body>

</html>