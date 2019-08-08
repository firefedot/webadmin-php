<?php
session_start();

$array_simpletext=array("Бежать","Быть","Любить","Работать","Желать","Тереть","Модничать","Узурпировать","Косячить","Думать","Мудрить","Бегемотить","Сольвадорить","Далить","Создавать","Колдовать");
$array_simpleon=array("нужно","можно","дважды","научно","опасно","словно","охотно","темно","видно");
$array_simpleoff=array("быстро","долго","замужем","навзничь","сложно","трижды","потому-что","около","кого-нибудь","нет","неужто","всегда","редко","иногда","было");
$array_code=array("tr","qw","bn","vb","df","fg","5t","h","56","ip","se","sx","hu");
$array_needn=array("Сложить","Сорить","Соперничать","Созидать");
$array_needd=array("светло","дробно","дерево","изучено");
$array_needi=array("медлено","мучительно","неужто","часто");
$array_coden=array("ha","ho","hl","hx");
$array_coded=array("da","dm","de","dl");
$array_codei=array("iz","ia","io","ie");
shuffle($array_simpletext);
shuffle($array_simpleon);
shuffle($array_simpleoff);
shuffle($array_code);
shuffle($array_needn);
shuffle($array_needd);
shuffle($array_needi);
shuffle($array_coden);
shuffle($array_coded);
shuffle($array_codei);

$lst_smpltxt = sizeof($array_simpletext)-1;
$lst_smplon = sizeof($array_simpleon)-1;
$lst_smploff = sizeof($array_simpleoff)-1;

$lst_code = sizeof($array_code)-1;

$lst_needn = sizeof($array_needn)-1;
$lst_needd = sizeof($array_needd)-1;
$lst_needi = sizeof($array_needi)-1;

$lst_coden = sizeof($array_coden)-1;
$lst_coded = sizeof($array_coded)-1;
$lst_codei = sizeof($array_codei)-1;

$line_1_1 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpletext[1].'</option>';
$line_1_2 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpletext[0].'</option>';
$line_1_3 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpletext[3].'</option>';
$line_1_4 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpletext[2].'</option>';
$line_1_5 = '<option value='.$array_coden[rand(0, $lst_coden)].'>'.$array_needn[rand(0, $lst_needn)].'</option>';
$line_1_6 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpletext[8].'</option>';
$line_1_7 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpletext[4].'</option>';
$line_1_8 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpletext[5].'</option>';
$line_1_9 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpletext[6].'</option>';

$line_2_1 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpleon[0].'</option>';
$line_2_2 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpleon[1].'</option>';
$line_2_3 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpleon[2].'</option>';
$line_2_4 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpleon[3].'</option>';
$line_2_5 = '<option value='.$array_coded[rand(0, $lst_coded)].'>'.$array_needd[rand(0, $lst_needd)].'</option>';
$line_2_6 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpleon[4].'</option>';
$line_2_7 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpleon[5].'</option>';
$line_2_8 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpleon[6].'</option>';
$line_2_9 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpleon[7].'</option>';
$line_2_10 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpleon[8].'</option>';

$line_3_1 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpleoff[0].'</option>';
$line_3_2 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpleoff[1].'</option>';
$line_3_3 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpleoff[2].'</option>';
$line_3_4 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpleoff[3].'</option>';
$line_3_5 = '<option value='.$array_codei[rand(0, $lst_codei)].'>'.$array_needi[rand(0, $lst_needi)].'</option>';
$line_3_6 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpleoff[4].'</option>';
$line_3_7 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpleoff[5].'</option>';
$line_3_8 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpleoff[6].'</option>';
$line_3_9 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpleoff[7].'</option>';
$line_3_10 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpleoff[8].'</option>';
$line_3_11 = '<option value='.$array_code[rand(0, $lst_code)].'>'.$array_simpleoff[9].'</option>';

$array_linesone=array("$line_1_1","$line_1_2","$line_1_3","$line_1_4","$line_1_5","$line_1_6","$line_1_7","$line_1_8","$line_1_9");
$array_linestwo=array("$line_2_1","$line_2_2","$line_2_3","$line_2_4","$line_2_5","$line_2_6","$line_2_7","$line_2_8","$line_2_9","$line_2_10");
$array_linesthree=array("$line_3_1","$line_3_2","$line_3_3","$line_3_4","$line_3_5","$line_3_6","$line_3_7","$line_3_8","$line_3_9","$line_3_10","$line_3_11");
shuffle($array_linesone);
shuffle($array_linestwo);
shuffle($array_linesthree);

echo 'Составь предолжение:';


echo '<form  action="alarm.php" method="post" enctype="multipart/form-data" accept-charset="uft-8">';
echo '<select name="ine" required>';
    
    echo '<option value="">Выбор сделан?</option>';
    echo $array_linesone[0];
    echo $array_linesone[1];
    echo $array_linesone[2];
    echo $array_linesone[3];
    echo $array_linesone[4];
    echo $array_linesone[5];
    echo $array_linesone[6];
    echo $array_linesone[7];
    echo $array_linesone[8];
echo '</select>';

echo '<select name="dva" required>';
    echo '<option value="">Выбор сделан?</option>';
    echo $array_linestwo[0];
    echo $array_linestwo[1];
    echo $array_linestwo[2];
    echo $array_linestwo[3];
    echo $array_linestwo[4];
    echo $array_linestwo[5];
    echo $array_linestwo[6];
    echo $array_linestwo[7];
    echo $array_linestwo[8];
    echo $array_linestwo[9];
echo '</select>';
echo '<select name="bor" required>';
    echo '<option value="">Выбор сделан?</option>';
    echo $array_linesthree[0];
    echo $array_linesthree[1];
    echo $array_linesthree[2];
    echo $array_linesthree[3];
    echo $array_linesthree[4];
    echo $array_linesthree[5];
    echo $array_linesthree[6];
    echo $array_linesthree[7];
    echo $array_linesthree[8];
    echo $array_linesthree[9];
    echo $array_linesthree[10];
    echo $array_linesthree[11];
echo '</select>';

echo '<input type="submit" name="create" id="create" value="Составить" >';