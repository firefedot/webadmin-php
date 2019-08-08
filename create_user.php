<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
echo '<script src="js/for_create_user.js"></script>';
#include 'table_create_user.html';
#include 'table_create_user.php';
?>
<form action="inf.php" method="post" enctype="multipart/form-data" accept-charset="uft-8">
<table>
    <tr>
        <td> Сервер </td><td><select name="country" >
        <option value='RU'>Сервер-1</option>
        <option value='UA'>Сервер-1</option>
        <option value='DE'>Сервер-3</option>
        <option value='RU'>Сервер-4</option>
        <option value='UA'>Сервер-5</option>
        <option value='DE'>Сервер-6</option>
        </select></td>
    </tr>    
    
    <tr>
        <td>Имя новой ВМ</td><td> <input type="text" name="surname" id="surname"  onkeyup="translit()" required /></td>
    </tr>
    <tr>
        <td> Логин</td><td> <input type="text" name="username" id="username" /></td>
           <input name="alias" type="text" id="alias" disabled hidden/>
           <input name="alias3" type="text" id="alias3" disabled hidden/>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" name="create" id="create" value="Создать новую ВМ" />
        </td>
    </tr>
</table>
</form>
     
