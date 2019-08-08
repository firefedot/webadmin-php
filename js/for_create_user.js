
function translit(){
   
// Символ, на который будут заменяться все спецсимволы
var space = '-';
// Берем значение из нужного поля и переводим в нижний регистр

var text = document.getElementById('familiya').value.toLowerCase();  //Фамилия
var text2 = document.getElementById('surname').value.toLowerCase(); //Имя
var text3 = document.getElementById('otchestvo').value.toLowerCase(); //Отчество

// Массив для транслитерации
var transl = {
'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh',
'з': 'z', 'и': 'i', 'й': 'j', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
'о': 'o', 'п': 'p', 'р': 'r','с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h',
'ц': 'c', 'ч': 'ch', 'ш': 'sh', 'щ': 'sh','ъ': space, 'ы': 'y', 'ь': space, 'э': 'e', 'ю': 'yu', 'я': 'ya',
' ': space, '_': space, '`': space, '~': space, '!': space, '@': space,
'#': space, '$': space, '%': space, '^': space, '&': space, '*': space,
'(': space, ')': space,'-': space, '\=': space, '+': space, '[': space,
']': space, '\\': space, '|': space, '/': space,'.': space, ',': space,
'{': space, '}': space, '\'': space, '"': space, ';': space, ':': space,
'?': space, '<': space, '>': space, '№':space, '0':'x', '1':'x', '2':'x', '3':'x',
 '4':'x', '5':'x', '6':'x', '7':'x', '8':'x', '9':'x'
}
               
var result = '';
var result2 = '';
var result3 = '';
var curent_sim = '';
var curent_sim2 = '';  
var curent_sim3 = ''; 

iftext(text);
iftextsingl2();
iftextsingl(text2, curent_sim2);
       
function iftext(text0){
    for(i=0; i < text0.length; i++) {
    // Если символ найден в массиве то меняем его
    if(transl[text0[i]] != undefined) {
         if(curent_sim != transl[text0[i]] || curent_sim != space){
             result += (transl[text0[i]]);
             curent_sim = transl[text0[i]];
         }                                                                            
    }
    // Если нет, то оставляем так как есть
    else {
        result += text0[i];
        curent_sim = text0[i];
    }                             
} 
}      

function iftextsingl2(){  //Отчество
    if(text3[0] == undefined){
        result3='x';
    }else{
    // Если символ найден в массиве то меняем его
    if(transl[text3[0]] != undefined) {
         if(curent_sim3 != transl[text3[0]] || curent_sim3 != space){
             
             result3 = (transl[text3[0]]);
             curent_sim3 = transl[text3[0]];
         
        }                                                                            
    }
    // Если нет, то оставляем так как есть
    else {
        result3 += text3[0];
        curent_sim3 = text3[0];
    }                             
    }
} 

function iftextsingl(textx, curent_simx){
    if((text[0] == undefined) && (text2[0] == undefined) && (text3[0] == undefined)){
        result2='xx--xx--xx';
        
    }else{
        
        if(textx[0] == undefined){
        result2='x'+result3+result;;
        } else{
    // Если символ найден в массиве то меняем его
    if(transl[textx[0]] != undefined) {
         if(curent_simx != transl[textx[0]] || curent_simx != space){
             
             result2 = transl[textx[0]]+result3+result;
             curent_simx = transl[textx[0]];
         
        }                                                                            
    }
    // Если нет, то оставляем так как есть
    else {
        result2 += textx[0]+result3+result;
        curent_simx = textx[0];
    }     
    }
    }
} 



result = TrimStr(result);     //Фамилия         
result2 = TrimStr(result2);  //Имя
result3 = TrimStr(result3);   //Отчество
// Выводим результат
//$('#alias').val(result);
document.getElementById('alias').value = result;
document.getElementById('username').value = result2;
document.getElementById('alias3').value = result3;
}

function TrimStr(s) {
    s = s.replace(/^-/, '');
    return s.replace(/-$/, '');
}
// Выполняем транслитерацию при вводе текста в поле
/*$(function(){
    $('#name').keyup(function(){
         translit();
         return false;
    });
}); 
*/
