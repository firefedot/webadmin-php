<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript">

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

</script>

<table>
    <caption>Ручное создание пользователя</caption>
<form action="inf.php" method="post" enctype="multipart/form-data" accept-charset="uft-8">
    <tr>
        <td> Фамилия </td><td><input type="text" name="familiya" id="familiya"  onkeyup="translit()" required /></td>
    </tr>    
    
    <tr>
        <td>Имя</td><td> <input type="text" name="surname" id="surname"  onkeyup="translit()" required /></td>
    </tr>
    <tr>
        <td>Отчество</td><td> <input type="text" name="otchestvo" id="otchestvo"  onkeyup="translit()" required /></td>
    </tr>
    <tr>
        <td> Логин</td><td> <input type="text" name="username" id="username" /></td>
           <input name="alias" type="text" id="alias" disabled hidden/>
           <input name="alias3" type="text" id="alias3" disabled hidden/>
    </tr>


    <tr>
        <td>Страна</td><td><select name="country" >
        <option value='RU'>RU</option>
        <option value='UA'>UA</option>
        </select></td>
    </tr>
    <tr></td>
        <td>Область</td> <td>  <select name="oblast">
        <option value='Adygeya'>Адыгея</option>
        <option value='Altajskij-kraj'>Алтайский край</option>
        <option value='Amurskaya-oblast'>Амурская область</option>
        <option value='Arhangelskaya-oblast'>Архангельская область</option>
        <option value='Astrahanskaya-oblast'>Астраханская область</option>
        <option value='Bashkortostan'>Башкортостан</option>
        <option value='Belgorodskaya-oblast'>Белгородская область</option>
        <option value='Bryanskaя-oblast'>Брянская область</option>
        <option value='Buryatiя-Respublika '>Бурятия Республика     </option>
        <option value='Vladimirskaya-oblast'>Владимирская область</option>
        <option value='Volgogradskaya-oblast'>Волгоградская область</option>
        <option value='Vologodskaya-oblast'>Вологодская область</option>
        <option value='Voronejskaya-oblast'>Воронежская область</option>
        <option value='Dagestan'>Дагестан</option>
        <option value='Evrejskaya-AO'>Еврейская АО</option>
        <option value='Ivanovskaya-oblast'>Ивановская область</option>
        <option value='Ingushetiya'>Ингушетия</option>
        <option value='Irkutskaya-oblast'>Иркутская область</option>
        <option value='Kabardino-Balkariya'>Кабардино-Балкария</option>
        <option value='Kaliningradskaya-oblast'>Калининградская область</option>
        <option value='Kalmykiya'>Калмыкия</option>
        <option value='Kalujskaya-oblast'>Калужская область</option>
        <option value='Kamchatka'>Камчатка</option>
        <option value='Karachaevo-Cherkessiya'>Карачаево-Черкессия</option>
        <option value='Kareliya'>Карелия</option>
        <option value='Kemerovskaya-oblast'>Кемеровская область</option>
        <option value='Kirovskaya-oblast'>Кировская область</option>
        <option value='Komi-Respublika'>Коми Республика</option>
        <option value='Komi-Permyackij-AO'>Коми-Пермяцкий АО</option>
        <option value='Kostromskaya-oblast'>Костромская область</option>
        <option value='Krasnodarskij-kraj'>Краснодарский край</option>
        <option value='Krasnoyarskij-kraj'>Красноярский край</option>
        <option value='Kurganskaya-oblast'>Курганская область</option>
        <option value='Kurskaya-oblast'>Курская область</option>
        <option value='Leningradskaya-oblast'>Ленинградская область</option>
        <option value='Lipeckaya-oblast'>Липецкая область</option>
        <option value='Magadanskaya-oblast'>Магаданская область</option>
        <option value='Mari-El'>Мари-Эл</option>
        <option value='Mordoviya'>Мордовия</option>
        <option value='Moskovskaya-oblast'>Московская область</option>
        <option value='Murmanskaya-oblast'>Мурманская область</option>
        <option value='Nijegorodskaya-oblast'>Нижегородская область</option>
        <option value='Novgorodskaya-oblast'>Новгородская область</option>
        <option value='Novosibirskaya-oblast'>Новосибирская область</option>
        <option value='Omskaya-oblast'>Омская область</option>
        <option value='Orenburgskaya-oblast'>Оренбургская область</option>
        <option value='Orlovskaya-oblast'>Орловская область</option>
        <option value='Penzenskaya-oblast'>Пензенская область</option>
        <option value='Permskaya-oblast'>Пермская область</option>
        <option value='Primorskij-kraj'>Приморский край</option>
        <option value='Pskovskaya-oblast'>Псковская область</option>
        <option value='Rostovskaya-oblast'>Ростовская область</option>
        <option value='Ryazanskaя-oblast'>Рязанская область</option>
        <option selected value='Samarskaya-oblast'>Самарская область</option>
        <option value='Saratovskaya-oblast'>Саратовская область</option>
        <option value='Sahalin'>Сахалин</option>
        <option value='Sverdlovskaya-oblast'>Свердловская область</option>
        <option value='Severnaya-Osetiя'>Северная Осетия</option>
        <option value='Smolenskaya-oblast'>Смоленская область</option>
        <option value='Stavropolskij-kraj'>Ставропольский край</option>
        <option value='Tajmyr'>Таймыр</option>
        <option value='Tambovskaya-oblast'>Тамбовская область</option>
        <option value='Tatarstan'>Татарстан</option>
        <option value='Tverskaya-oblast'>Тверская область</option>
        <option value='Tomskaya-oblast'>Томская область</option>
        <option value='Tuva'>Тува</option>
        <option value='Tulskaya-oblast'>Тульская область</option>
        <option value='Tyumenskaya-oblast'>Тюменская область</option>
        <option value='Udmurtiya'>Удмуртия</option>
        <option value='Ulyanovskaя-oblast'>Ульяновская область</option>
        <option value='Ust-Ordynskij-AO'>Усть-Ордынский АО</option>
        <option value='Habarovskij-kraj'>Хабаровский край</option>
        <option value='Hakassiya'>Хакассия</option>
        <option value='Hanty-Mansijsk'>Ханты-Мансийск</option>
        <option value='Chelyabinskaя-oblast'>Челябинская область</option>
        <option value='Chechenskaya-Respublika'>Чеченская Республика</option>
        <option value='Chitinskaya-oblast'>Читинская область</option>
        <option value='Chuvashskaya-Respublika'>Чувашская Республика</option>
        <option value='Yakutiya-(Saha)'>Якутия (Саха)</option>
        <option value='Yamalo-Neneckij-AO'>Ямало-Ненецкий АО</option>
        <option value='Yaroslavskaya-oblast'>Ярославская область</option>
    </select></td>
    </tr>
    <tr>
        <td>Город</td><td> <select name="gorod">
        <option value='Abaza'>Абаза</option>
        <option value='Abakan'>Абакан</option>
        <option value='Abdulino'>Абдулино</option>
        <option value='Abinsk'>Абинск</option>
        <option value='Agidel'>Агидель</option>
        <option alue='Agryz'>Агрыз</option>
        <option value='Adygejsk'>Адыгейск</option>
        <option value='Aznakaevo'>Азнакаево</option>
        <option value='Azov'>Азов</option>
        <option value='Ak-Dovurak'>Ак-Довурак</option>
        <option value='Aksaj'>Аксай</option>
        <option value='Alagir'>Алагир</option>
        <option value='Alapaevsk'>Алапаевск</option>
        <option value='Alatyr'>Алатырь</option>
        <option value='Aldan'>Алдан</option>
        <option value='Alejsk'>Алейск</option>
        <option value='Aleksandrov'>Александров</option>
        <option value='Aleksandrovsk'>Александровск</option>
        <option value='Aleksandrovsk-Sahalinskij'>Александровск-Сахалинский</option>
        <option value='Alekseevka'>Алексеевка</option>
        <option value='Aleksin'>Алексин</option>
        <option value='Alzamaj'>Алзамай</option>
        <option value='Almetevsk'>Альметьевск</option>
        <option value='Amursk'>Амурск</option>
        <option value='Anadyr'>Анадырь</option>
        <option value='Anapa'>Анапа</option>
        <option value='Angarsk'>Ангарск</option>
        <option value='Andreapol'>Андреаполь</option>
        <option value='Anjero-Sudjensk'>Анжеро-Судженск</option>
        <option value='Aniva'>Анива</option>
        <option value='Apatity'>Апатиты</option>
        <option value='Aprelevka'>Апрелевка</option>
        <option value='Apsheronsk'>Апшеронск</option>
        <option value='Aramil'>Арамиль</option>
        <option value='Argun'>Аргун</option>
        <option value='Ardatov'>Ардатов</option>
        <option value='Ardon'>Ардон</option>
        <option value='Arzamas'>Арзамас</option>
        <option value='Arzamas'>Арзамас</option>
        <option value='Arkadak'>Аркадак</option>
        <option value='Armavir'>Армавир</option>
        <option value='Arsenev'>Арсеньев</option>
        <option value='Artyom'>Артём</option>
        <option value='Artyomovsk'>Артёмовск</option>
        <option value='Artyomovskij'>Артёмовский</option>
        <option value='Arhangelsk'>Архангельск</option>
        <option value='Asbest'>Асбест</option>
        <option value='Asino'>Асино</option>
        <option value='Astrahan'>Астрахань</option>
        <option value='Atkarsk'>Аткарск</option>
        <option value='Ahtubinsk'>Ахтубинск</option>
        <option value='Achinsk'>Ачинск</option>
        <option value='Asha'>Аша</option>
        <option value='Babaevo'>Бабаево</option>
        <option value='Babushkin'>Бабушкин</option>
        <option value='Bavly'>Бавлы</option>
        <option value='Bagrationovsk'>Багратионовск</option>
        <option value='Bajkalsk'>Байкальск</option>
        <option value='Bajmak'>Баймак</option>
        <option value='Bakal'>Бакал</option>
        <option value='Baksan'>Баксан</option>
        <option value='Balabanovo'>Балабаново</option>
        <option value='Balakovo'>Балаково</option>
        <option value='Balahna'>Балахна</option>
        <option value='Balahna'>Балахна</option>
        <option value='Balashiha'>Балашиха</option>
        <option value='Balashov'>Балашов</option>
        <option value='Balej'>Балей</option>
        <option value='Baltijsk'>Балтийск</option>
        <option value='Barabinsk'>Барабинск</option>
        <option value='Barnaul'>Барнаул</option>
        <option value='Barysh'>Барыш</option>
        <option value='Batajsk'>Батайск</option>
        <option value='Bejeck'>Бежецк</option>
        <option value='Belaya'>Белая</option>
        <option value='Belaya'>Белая</option>
        <option value='Belgorod'>Белгород</option>
        <option value='Belebej'>Белебей</option>
        <option value='Belyov'>Белёв</option>
        <option value='Belinskij'>Белинский</option>
        <option value='Belovo'>Белово</option>
        <option value='Belogorsk'>Белогорск</option>
        <option value='Belozersk'>Белозерск</option>
        <option value='Belokuriha'>Белокуриха</option>
        <option value='Belomorsk'>Беломорск</option>
        <option value='Beloreck'>Белорецк</option>
        <option value='Belorechensk'>Белореченск</option>
        <option value='Belousovo'>Белоусово</option>
        <option value='Beloyarskij'>Белоярский</option>
        <option value='Belyj'>Белый</option>
        <option value='Berdsk'>Бердск</option>
        <option value='Berezniki'>Березники</option>
        <option value='Beryozovskij'>Берёзовский</option>
        <option value='Beryozovskij'>Берёзовский</option>
        <option value='Beslan'>Беслан</option>
        <option value='Bijsk'>Бийск</option>
        <option value='Bikin'>Бикин</option>
        <option value='Bilibino'>Билибино</option>
        <option value='Birobidjan'>Биробиджан</option>
        <option value='Birsk'>Бирск</option>
        <option value='Biryusinsk'>Бирюсинск</option>
        <option value='Biryuch'>Бирюч</option>
        <option value='Blagoveshensk'>Благовещенск</option>
        <option value='Blagoveshensk'>Благовещенск</option>
        <option value='Blagodarnyj'>Благодарный</option>
        <option value='Bobrov'>Бобров</option>
        <option value='Bogdanovich'>Богданович</option>
        <option value='Bogorodick'>Богородицк</option>
        <option value='Bogorodsk'>Богородск</option>
        <option value='Bogorodsk'>Богородск</option>
        <option value='Bogotol'>Боготол</option>
        <option value='Boguchar'>Богучар</option>
        <option value='Bodajbo'>Бодайбо</option>
        <option value='Boksitogorsk'>Бокситогорск</option>
        <option value='Bolgar'>Болгар</option>
        <option value='Bologoe'>Бологое</option>
        <option value='Bolotnoe'>Болотное</option>
        <option value='Bolohovo'>Болохово</option>
        <option value='Bolhov'>Болхов</option>
        <option value='Bolshoj'>Большой</option>
        <option value='Bor'>Бор</option>
        <option value='Bor'>Бор</option>
        <option value='Borzya'>Борзя</option>
        <option value='Borisoglebsk'>Борисоглебск</option>
        <option value='Borovichi'>Боровичи</option>
        <option value='Borovsk'>Боровск</option>
        <option value='Borodino'>Бородино</option>
        <option value='Bratsk'>Братск</option>
        <option value='Bronnicy'>Бронницы</option>
        <option value='Bryansk'>Брянск</option>
        <option value='Bugulma'>Бугульма</option>
        <option value='Buguruslan'>Бугуруслан</option>
        <option value='Budyonnovsk'>Будённовск</option>
        <option value='Buzuluk'>Бузулук</option>
        <option value='Buinsk'>Буинск</option>
        <option value='Buj'>Буй</option>
        <option value='Bujnaksk'>Буйнакск</option>
        <option value='Buturlinovka'>Бутурлиновка</option>
        <option value='Valdaj'>Валдай</option>
        <option value='Valujki'>Валуйки</option>
        <option value='Velij'>Велиж</option>
        <option value='Velikie'>Великие</option>
        <option value='Velikij'>Великий</option>
        <option value='Velikij'>Великий</option>
        <option value='Velsk'>Вельск</option>
        <option value='Venyov'>Венёв</option>
        <option value='Vereshagino'>Верещагино</option>
        <option value='Vereya'>Верея</option>
        <option value='Verhneuralsk'>Верхнеуральск</option>
        <option value='Verhnij'>Верхний</option>
        <option value='Verhnij'>Верхний</option>
        <option value='Verhnyaя'>Верхняя</option>
        <option value='Verhnyaя'>Верхняя</option>
        <option value='Verhnyaя'>Верхняя</option>
        <option value='Verhoture'>Верхотурье</option>
        <option value='Verhoyansk'>Верхоянск</option>
        <option value='Vesegonsk'>Весьегонск</option>
        <option value='Vetluga'>Ветлуга</option>
        <option value='Vetluga'>Ветлуга</option>
        <option value='Vidnoe'>Видное</option>
        <option value='Vilyujsk'>Вилюйск</option>
        <option value='Vilyuchinsk'>Вилючинск</option>
        <option value='Vihorevka'>Вихоревка</option>
        <option value='Vichuga'>Вичуга</option>
        <option value='Vladivostok'>Владивосток</option>
        <option value='Vladikavkaz'>Владикавказ</option>
        <option value='Vladimir'>Владимир</option>
        <option value='Volgograd'>Волгоград</option>
        <option value='Volgodonsk'>Волгодонск</option>
        <option value='Volgorechensk'>Волгореченск</option>
        <option value='Voljsk'>Волжск</option>
        <option value='Voljskij'>Волжский</option>
        <option value='Vologda'>Вологда</option>
        <option value='Volodarsk'>Володарск</option>
        <option value='Volodarsk'>Володарск</option>
        <option value='Volokolamsk'>Волоколамск</option>
        <option value='Volosovo'>Волосово</option>
        <option value='Volhov'>Волхов</option>
        <option value='Volchansk'>Волчанск</option>
        <option value='Volsk'>Вольск</option>
        <option value='Vorkuta'>Воркута</option>
        <option value='Voronej'>Воронеж</option>
        <option value='Vorsma'>Ворсма</option>
        <option value='Vorsma'>Ворсма</option>
        <option value='Voskresensk'>Воскресенск</option>
        <option value='Votkinsk'>Воткинск</option>
        <option value='Vsevolojsk'>Всеволожск</option>
        <option value='Vuktyl'>Вуктыл</option>
        <option value='Vyborg'>Выборг</option>
        <option value='Vyksa'>Выкса</option>
        <option value='Vyksa'>Выкса</option>
        <option value='Vysokovsk'>Высоковск</option>
        <option value='Vysock'>Высоцк</option>
        <option value='Vytegra'>Вытегра</option>
        <option value='Vyshnij'>Вышний</option>
        <option value='Vyazemskij'>Вяземский</option>
        <option value='Vyazniki'>Вязники</option>
        <option value='Vyazma'>Вязьма</option>
        <option value='Vyatskie'>Вятские</option>
        <option value='Gavrilov'>Гаврилов</option>
        <option value='Gavrilov-Yam'>Гаврилов-Ям</option>
        <option value='Gagarin'>Гагарин</option>
        <option value='Gadjievo'>Гаджиево</option>
        <option value='Gaj'>Гай</option>
        <option value='Galich'>Галич</option>
        <option value='Gatchina'>Гатчина</option>
        <option value='Gvardejsk'>Гвардейск</option>
        <option value='Gdov'>Гдов</option>
        <option value='Gelendjik'>Геленджик</option>
        <option value='Georgievsk'>Георгиевск</option>
        <option value='Glazov'>Глазов</option>
        <option value='Gorbatov'>Горбатов</option>
        <option value='Gorbatov'>Горбатов</option>
        <option value='Gorno-Altajsk'>Горно-Алтайск</option>
        <option value='Gornozavodsk'>Горнозаводск</option>
        <option value='Gornozavodsk'>Горнозаводск</option>
        <option value='Gornyak'>Горняк</option>
        <option value='Gorodec'>Городец</option>
        <option value='Gorodec'>Городец</option>
        <option value='Gorodishe'>Городище</option>
        <option value='Gorodovikovsk'>Городовиковск</option>
        <option value='Gorohovec'>Гороховец</option>
        <option value='Goryachij'>Горячий</option>
        <option value='Grajvoron'>Грайворон</option>
        <option value='Gremyachinsk'>Гремячинск</option>
        <option value='Groznyj'>Грозный</option>
        <option value='Gryazi'>Грязи</option>
        <option value='Gryazovec'>Грязовец</option>
        <option value='Gubaha'>Губаха</option>
        <option value='Gubkin'>Губкин</option>
        <option value='Gubkinskij'>Губкинский</option>
        <option value='Gudermes'>Гудермес</option>
        <option value='Gukovo'>Гуково</option>
        <option value='Gulkevichi'>Гулькевичи</option>
        <option value='Gurevsk'>Гурьевск</option>
        <option value='Gurevsk'>Гурьевск</option>
        <option value='Gusev'>Гусев</option>
        <option value='Gusinoozyorsk'>Гусиноозёрск</option>
        <option value='Gus-Hrustalnyj'>Гусь-Хрустальный</option>
        <option value='Davlekanovo'>Давлеканово</option>
        <option value='Dagestanskie'>Дагестанские</option>
        <option value='Dalmatovo'>Далматово</option>
        <option value='Dalnegorsk'>Дальнегорск</option>
        <option value='Dalnerechensk'>Дальнереченск</option>
        <option value='Danilov'>Данилов</option>
        <option value='Dankov'>Данков</option>
        <option value='Degtyarsk'>Дегтярск</option>
        <option value='Dedovsk'>Дедовск</option>
        <option value='Demidov'>Демидов</option>
        <option value='Derbent'>Дербент</option>
        <option value='Desnogorsk'>Десногорск</option>
        <option value='Dzerjinsk'>Дзержинск</option>
        <option value='Dzerjinsk'>Дзержинск</option>
        <option value='Dzerjinskij'>Дзержинский</option>
        <option value='Divnogorsk'>Дивногорск</option>
        <option value='Digora'>Дигора</option>
        <option value='Dimitrovgrad'>Димитровград</option>
        <option value='Dmitriev-Lgovskij'>Дмитриев-Льговский</option>
        <option value='Dmitrov'>Дмитров</option>
        <option value='Dmitrovsk'>Дмитровск</option>
        <option value='Dno'>Дно</option>
        <option value='Dobryanka'>Добрянка</option>
        <option value='Dolgoprudnyj'>Долгопрудный</option>
        <option value='Dolinsk'>Долинск</option>
        <option value='Domodedovo'>Домодедово</option>
        <option value='Doneck'>Донецк</option>
        <option value='Donskoj'>Донской</option>
        <option value='Dorogobuj'>Дорогобуж</option>
        <option value='Drezna'>Дрезна</option>
        <option value='Dubna'>Дубна</option>
        <option value='Dubovka'>Дубовка</option>
        <option value='Dudinka'>Дудинка</option>
        <option value='Duhovshina'>Духовщина</option>
        <option value='Dyurtyuli'>Дюртюли</option>
        <option value='Dyatkovo'>Дятьково</option>
        <option value='Egorevsk'>Егорьевск</option>
        <option value='Ejsk'>Ейск</option>
        <option value='Ekaterinburg'>Екатеринбург</option>
        <option value='Elabuga'>Елабуга</option>
        <option value='Elec'>Елец</option>
        <option value='Elizovo'>Елизово</option>
        <option value='Elnya'>Ельня</option>
        <option value='Emanjelinsk'>Еманжелинск</option>
        <option value='Emva'>Емва</option>
        <option value='Enisejsk'>Енисейск</option>
        <option value='Ermolino'>Ермолино</option>
        <option value='Ershov'>Ершов</option>
        <option value='Essentuki'>Ессентуки</option>
        <option value='Efremov'>Ефремов</option>
        <option value='Jeleznovodsk'>Железноводск</option>
        <option value='Jeleznogorsk'>Железногорск</option>
        <option value='Jeleznogorsk'>Железногорск</option>
        <option value='Jeleznogorsk-Ilimskij'>Железногорск-Илимский</option>
        <option value='Jeleznodorojnyj'>Железнодорожный</option>
        <option value='Jerdevka'>Жердевка</option>
        <option value='Jigulyovsk'>Жигулёвск</option>
        <option value='Jizdra'>Жиздра</option>
        <option value='Jirnovsk'>Жирновск</option>
        <option value='Jukov'>Жуков</option>
        <option value='Jukovka'>Жуковка</option>
        <option value='Jukovskij'>Жуковский</option>
        <option value='Zavitinsk'>Завитинск</option>
        <option value='Zavodoukovsk'>Заводоуковск</option>
        <option value='Zavoljsk'>Заволжск</option>
        <option value='Zavolje'>Заволжье</option>
        <option value='Zavolje'>Заволжье</option>
        <option value='Zadonsk'>Задонск</option>
        <option value='Zainsk'>Заинск</option>
        <option value='Zakamensk'>Закаменск</option>
        <option value='Zaozyornyj'>Заозёрный</option>
        <option value='Zaozyorsk'>Заозёрск</option>
        <option value='Zapadnaya'>Западная</option>
        <option value='Zapolyarnyj'>Заполярный</option>
        <option value='Zarajsk'>Зарайск</option>
        <option value='Zarechnyj'>Заречный</option>
        <option value='Zarechnyj'>Заречный</option>
        <option value='Zarinsk'>Заринск</option>
        <option value='Zvenigovo'>Звенигово</option>
        <option value='Zvenigorod'>Звенигород</option>
        <option value='Zverevo'>Зверево</option>
        <option value='Zelenogorsk'>Зеленогорск</option>
        <option value='Zelenogradsk'>Зеленоградск</option>
        <option value='Zelenodolsk'>Зеленодольск</option>
        <option value='Zelenokumsk'>Зеленокумск</option>
        <option value='Zernograd'>Зерноград</option>
        <option value='Zeya'>Зея</option>
        <option value='Zima'>Зима</option>
        <option value='Zlatoust'>Златоуст</option>
        <option value='Zlynka'>Злынка</option>
        <option value='Zmeinogorsk'>Змеиногорск</option>
        <option value='Znamensk'>Знаменск</option>
        <option value='Zubcov'>Зубцов</option>
        <option value='Zuevka'>Зуевка</option>
        <option value='Ivangorod'>Ивангород</option>
        <option value='Ivanovo'>Иваново</option>
        <option value='Ivanteevka'>Ивантеевка</option>
        <option value='Ivdel'>Ивдель</option>
        <option value='Igarka'>Игарка</option>
        <option value='Ijevsk'>Ижевск</option>
        <option value='Izberbash'>Избербаш</option>
        <option value='Izobilnyj'>Изобильный</option>
        <option value='Ilanskij'>Иланский</option>
        <option value='Inza'>Инза</option>
        <option value='Insar'>Инсар</option>
        <option value='Inta'>Инта</option>
        <option value='Ipatovo'>Ипатово</option>
        <option value='Irbit'>Ирбит</option>
        <option value='Irkutsk'>Иркутск</option>
        <option value='Isilkul'>Исилькуль</option>
        <option value='Iskitim'>Искитим</option>
        <option value='Istra'>Истра</option>
        <option value='Ishim'>Ишим</option>
        <option value='Ishimbaj'>Ишимбай</option>
        <option value='Joshkar-Ola'>Йошкар-Ола</option>
        <option value='Kadnikov'>Кадников</option>
        <option value='Kazan'>Казань</option>
        <option value='Kalach'>Калач</option>
        <option value='Kalachinsk'>Калачинск</option>
        <option value='Kalach-na-Donu'>Калач-на-Дону</option>
        <option value='Kaliningrad'>Калининград</option>
        <option value='Kalininsk'>Калининск</option>
        <option value='Kaltan'>Калтан</option>
        <option value='Kaluga'>Калуга</option>
        <option value='Kalyazin'>Калязин</option>
        <option value='Kambarka'>Камбарка</option>
        <option value='Kamenka'>Каменка</option>
        <option value='Kamennogorsk'>Каменногорск</option>
        <option value='Kamensk-Uralskij'>Каменск-Уральский</option>
        <option value='Kamensk-Shahtinskij'>Каменск-Шахтинский</option>
        <option value='Kamen-na-Obi'>Камень-на-Оби</option>
        <option value='Kameshkovo'>Камешково</option>
        <option value='Kamyzyak'>Камызяк</option>
        <option value='Kamyshin'>Камышин</option>
        <option value='Kamyshlov'>Камышлов</option>
        <option value='Kanash'>Канаш</option>
        <option value='Kandalaksha'>Кандалакша</option>
        <option value='Kansk'>Канск</option>
        <option value='Karabanovo'>Карабаново</option>
        <option value='Karabash'>Карабаш</option>
        <option value='Karabulak'>Карабулак</option>
        <option value='Karasuk'>Карасук</option>
        <option value='Karachaevsk'>Карачаевск</option>
        <option value='Karachev'>Карачев</option>
        <option value='Kargat'>Каргат</option>
        <option value='Kargopol'>Каргополь</option>
        <option value='Karpinsk'>Карпинск</option>
        <option value='Kartaly'>Карталы</option>
        <option value='Kasimov'>Касимов</option>
        <option value='Kasli'>Касли</option>
        <option value='Kaspijsk'>Каспийск</option>
        <option value='Katav-Ivanovsk'>Катав-Ивановск</option>
        <option value='Katajsk'>Катайск</option>
        <option value='Kachkanar'>Качканар</option>
        <option value='Kashin'>Кашин</option>
        <option value='Kashira'>Кашира</option>
        <option value='Kedrovyj'>Кедровый</option>
        <option value='Kemerovo'>Кемерово</option>
        <option value='Kem'>Кемь</option>
        <option value='Kizel'>Кизел</option>
        <option value='Kizilyurt'>Кизилюрт</option>
        <option value='Kizlyar'>Кизляр</option>
        <option value='Kimovsk'>Кимовск</option>
        <option value='Kimry'>Кимры</option>
        <option value='Kingisepp'>Кингисепп</option>
        <option value='Kinel'>Кинель</option>
        <option value='Kineshma'>Кинешма</option>
        <option value='Kireevsk'>Киреевск</option>
        <option value='Kirensk'>Киренск</option>
        <option value='Kirjach'>Киржач</option>
        <option value='Kirillov'>Кириллов</option>
        <option value='Kirishi'>Кириши</option>
        <option value='Kirov'>Киров</option>
        <option value='Kirov'>Киров</option>
        <option value='Kirovgrad'>Кировград</option>
        <option value='Kirovo-Chepeck'>Кирово-Чепецк</option>
        <option value='Kirovsk'>Кировск</option>
        <option value='Kirovsk'>Кировск</option>
        <option value='Kirs'>Кирс</option>
        <option value='Kirsanov'>Кирсанов</option>
        <option value='Kiselyovsk'>Киселёвск</option>
        <option value='Kislovodsk'>Кисловодск</option>
        <option value='Klimovsk'>Климовск</option>
        <option value='Klin'>Клин</option>
        <option value='Klincy'>Клинцы</option>
        <option value='Knyaginino'>Княгинино</option>
        <option value='Knyaginino'>Княгинино</option>
        <option value='Kovdor'>Ковдор</option>
        <option value='Kovrov'>Ковров</option>
        <option value='Kovylkino'>Ковылкино</option>
        <option value='Kogalym'>Когалым</option>
        <option value='Kodinsk'>Кодинск</option>
        <option value='Kozelsk'>Козельск</option>
        <option value='Kozlovka'>Козловка</option>
        <option value='Kozmodemyansk'>Козьмодемьянск</option>
        <option value='Kola'>Кола</option>
        <option value='Kologriv'>Кологрив</option>
        <option value='Kolomna'>Коломна</option>
        <option value='Kolpashevo'>Колпашево</option>
        <option value='Kolchugino'>Кольчугино</option>
        <option value='Kommunar'>Коммунар</option>
        <option value='Komsomolsk'>Комсомольск</option>
        <option value='Komsomolsk-na-Amure'>Комсомольск-на-Амуре</option>
        <option value='Konakovo'>Конаково</option>
        <option value='Kondopoga'>Кондопога</option>
        <option value='Kondrovo'>Кондрово</option>
        <option value='Konstantinovsk'>Константиновск</option>
        <option value='Kopejsk'>Копейск</option>
        <option value='Korablino'>Кораблино</option>
        <option value='Korenovsk'>Кореновск</option>
        <option value='Korkino'>Коркино</option>
        <option value='Korolyov'>Королёв</option>
        <option value='Korocha'>Короча</option>
        <option value='Korsakov'>Корсаков</option>
        <option value='Koryajma'>Коряжма</option>
        <option value='Kosterevo'>Костерево</option>
        <option value='Kostomuksha'>Костомукша</option>
        <option value='Kostroma'>Кострома</option>
        <option value='Kotelnikovo'>Котельниково</option>
        <option value='Kotelnich'>Котельнич</option>
        <option value='Kotlas'>Котлас</option>
        <option value='Kotovo'>Котово</option>
        <option value='Kotovsk'>Котовск</option>
        <option value='Kohma'>Кохма</option>
        <option value='Krasavino'>Красавино</option>
        <option value='Krasnoarmejsk'>Красноармейск</option>
        <option value='Krasnoarmejsk'>Красноармейск</option>
        <option value='Krasnovishersk'>Красновишерск</option>
        <option value='Krasnogorsk'>Красногорск</option>
        <option value='Krasnodar'>Краснодар</option>
        <option value='Krasnozavodsk'>Краснозаводск</option>
        <option value='Krasnoznamensk'>Краснознаменск</option>
        <option value='Krasnoznamensk'>Краснознаменск</option>
        <option value='Krasnokamensk'>Краснокаменск</option>
        <option value='Krasnokamsk'>Краснокамск</option>
        <option value='Krasnoslobodsk'>Краснослободск</option>
        <option value='Krasnoslobodsk'>Краснослободск</option>
        <option value='Krasnoturinsk'>Краснотурьинск</option>
        <option value='Krasnouralsk'>Красноуральск</option>
        <option value='Krasnoufimsk'>Красноуфимск</option>
        <option value='Krasnoyarsk'>Красноярск</option>
        <option value='Krasnyj'>Красный</option>
        <option value='Krasnyj'>Красный</option>
        <option value='Krasnyj'>Красный</option>
        <option value='Kremyonki'>Кремёнки</option>
        <option value='Kropotkin'>Кропоткин</option>
        <option value='Krymsk'>Крымск</option>
        <option value='Kstovo'>Кстово</option>
        <option value='Kstovo'>Кстово</option>
        <option value='Kuvandyk'>Кувандык</option>
        <option value='Kuvshinovo'>Кувшиново</option>
        <option value='Kudymkar'>Кудымкар</option>
        <option value='Kuzneck'>Кузнецк</option>
        <option value='Kujbyshev'>Куйбышев</option>
        <option value='Kulebaki'>Кулебаки</option>
        <option value='Kulebaki'>Кулебаки</option>
        <option value='Kumertau'>Кумертау</option>
        <option value='Kungur'>Кунгур</option>
        <option value='Kupino'>Купино</option>
        <option value='Kurgan'>Курган</option>
        <option value='Kurganinsk'>Курганинск</option>
        <option value='Kurilsk'>Курильск</option>
        <option value='Kurlovo'>Курлово</option>
        <option value='Kurovskoe'>Куровское</option>
        <option value='Kursk'>Курск</option>
        <option value='Kurtamysh'>Куртамыш</option>
        <option value='Kurchatov'>Курчатов</option>
        <option value='Kusa'>Куса</option>
        <option value='Kushva'>Кушва</option>
        <option value='Kyzyl'>Кызыл</option>
        <option value='Kyshtym'>Кыштым</option>
        <option value='Kyahta'>Кяхта</option>
        <option value='Labinsk'>Лабинск</option>
        <option value='Labytnangi'>Лабытнанги</option>
        <option value='Lagan'>Лагань</option>
        <option value='Ladushkin'>Ладушкин</option>
        <option value='Lakinsk'>Лакинск</option>
        <option value='Langepas'>Лангепас</option>
        <option value='Lahdenpohya'>Лахденпохья</option>
        <option value='Lebedyan'>Лебедянь</option>
        <option value='Leninogorsk'>Лениногорск</option>
        <option value='Leninsk'>Ленинск</option>
        <option value='Leninsk-Kuzneckij'>Ленинск-Кузнецкий</option>
        <option value='Lensk'>Ленск</option>
        <option value='Lermontov'>Лермонтов</option>
        <option value='Lesnoj'>Лесной</option>
        <option value='Lesozavodsk'>Лесозаводск</option>
        <option value='Lesosibirsk'>Лесосибирск</option>
        <option value='Livny'>Ливны</option>
        <option value='Likino-Dulyovo'>Ликино-Дулёво</option>
        <option value='Lipeck'>Липецк</option>
        <option value='Lipki'>Липки</option>
        <option value='Liski'>Лиски</option>
        <option value='Lihoslavl'>Лихославль</option>
        <option value='Lobnya'>Лобня</option>
        <option value='Lodejnoe'>Лодейное</option>
        <option value='Losino-Petrovskij'>Лосино-Петровский</option>
        <option value='Luga'>Луга</option>
        <option value='Luza'>Луза</option>
        <option value='Lukoyanov'>Лукоянов</option>
        <option value='Lukoyanov'>Лукоянов</option>
        <option value='Luhovicy'>Луховицы</option>
        <option value='Lyskovo'>Лысково</option>
        <option value='Lyskovo'>Лысково</option>
        <option value='Lysva'>Лысьва</option>
        <option value='Lytkarino'>Лыткарино</option>
        <option value='Lgov'>Льгов</option>
        <option value='Lyuban'>Любань</option>
        <option value='Lyubercy'>Люберцы</option>
        <option value='Lyubim'>Любим</option>
        <option value='Lyudinovo'>Людиново</option>
        <option value='Lyantor'>Лянтор</option>
        <option value='Magadan'>Магадан</option>
        <option value='Magas'>Магас</option>
        <option value='Magnitogorsk'>Магнитогорск</option>
        <option value='Majkop'>Майкоп</option>
        <option value='Majskij'>Майский</option>
        <option value='Makarov'>Макаров</option>
        <option value='Makarev'>Макарьев</option>
        <option value='Makushino'>Макушино</option>
        <option value='Malaya'>Малая</option>
        <option value='Malgobek'>Малгобек</option>
        <option value='Malmyj'>Малмыж</option>
        <option value='Maloarhangelsk'>Малоархангельск</option>
        <option value='Maloyaroslavec'>Малоярославец</option>
        <option value='Mamadysh'>Мамадыш</option>
        <option value='Mamonovo'>Мамоново</option>
        <option value='Manturovo'>Мантурово</option>
        <option value='Mariinsk'>Мариинск</option>
        <option value='Mariinskij'>Мариинский</option>
        <option value='Marks'>Маркс</option>
        <option value='Mahachkala'>Махачкала</option>
        <option value='Mglin'>Мглин</option>
        <option value='Megion'>Мегион</option>
        <option value='Medvejegorsk'>Медвежьегорск</option>
        <option value='Mednogorsk'>Медногорск</option>
        <option value='Medyn'>Медынь</option>
        <option value='Mejgore'>Межгорье</option>
        <option value='Mejdurechensk'>Междуреченск</option>
        <option value='Mezen'>Мезень</option>
        <option value='Melenki'>Меленки</option>
        <option value='Meleuz'>Мелеуз</option>
        <option value='Mendeleevsk'>Менделеевск</option>
        <option value='Menzelinsk'>Мензелинск</option>
        <option value='Meshovsk'>Мещовск</option>
        <option value='Miass'>Миасс</option>
        <option value='Mikun'>Микунь</option>
        <option value='Millerovo'>Миллерово</option>
        <option value='Mineralnye'>Минеральные</option>
        <option value='Minusinsk'>Минусинск</option>
        <option value='Minyar'>Миньяр</option>
        <option value='Mirnyj'>Мирный</option>
        <option value='Mirnyj'>Мирный</option>
        <option value='Mihajlov'>Михайлов</option>
        <option value='Mihajlovka'>Михайловка</option>
        <option value='Mihajlovsk'>Михайловск</option>
        <option value='Mihajlovsk'>Михайловск</option>
        <option value='Michurinsk'>Мичуринск</option>
        <option value='Mogocha'>Могоча</option>
        <option value='Mojajsk'>Можайск</option>
        <option value='Mojga'>Можга</option>
        <option value='Mozdok'>Моздок</option>
        <option value='Monchegorsk'>Мончегорск</option>
        <option value='Morozovsk'>Морозовск</option>
        <option value='Morshansk'>Моршанск</option>
        <option value='Mosalsk'>Мосальск</option>
        <option value='Moskva'>Москва</option>
        <option value='Muravlenko'>Муравленко</option>
        <option value='Murashi'>Мураши</option>
        <option value='Murmansk'>Мурманск</option>
        <option value='Murom'>Муром</option>
        <option value='Mcensk'>Мценск</option>
        <option value='Myski'>Мыски</option>
        <option value='Mytishi'>Мытищи</option>
        <option value='Myshkin'>Мышкин</option>
        <option value='Naberejnye'>Набережные</option>
        <option value='Navashino'>Навашино</option>
        <option value='Navashino'>Навашино</option>
        <option value='Navoloki'>Наволоки</option>
        <option value='Nadym'>Надым</option>
        <option value='Nazarovo'>Назарово</option>
        <option value='Nazran'>Назрань</option>
        <option value='Nazyvaevsk'>Называевск</option>
        <option value='Nalchik'>Нальчик</option>
        <option value='Narimanov'>Нариманов</option>
        <option value='Naro-Fominsk'>Наро-Фоминск</option>
        <option value='Nartkala'>Нарткала</option>
        <option value='Naryan-Mar'>Нарьян-Мар</option>
        <option value='Nahodka'>Находка</option>
        <option value='Nevel'>Невель</option>
        <option value='Nevelsk'>Невельск</option>
        <option value='Nevinnomyssk'>Невинномысск</option>
        <option value='Nevyansk'>Невьянск</option>
        <option value='Nelidovo'>Нелидово</option>
        <option value='Neman'>Неман</option>
        <option value='Nerehta'>Нерехта</option>
        <option value='Nerchinsk'>Нерчинск</option>
        <option value='Neryungri'>Нерюнгри</option>
        <option value='Nesterov'>Нестеров</option>
        <option value='Neftegorsk'>Нефтегорск</option>
        <option value='Neftekamsk'>Нефтекамск</option>
        <option value='Neftekumsk'>Нефтекумск</option>
        <option value='Nefteyugansk'>Нефтеюганск</option>
        <option value='Neya'>Нея</option>
        <option value='Nijnevartovsk'>Нижневартовск</option>
        <option value='Nijnekamsk'>Нижнекамск</option>
        <option value='Nijneudinsk'>Нижнеудинск</option>
        <option value='Nijnie'>Нижние</option>
        <option value='Nijnij'>Нижний</option>
        <option value='Nijnij'>Нижний</option>
        <option value='Nijnij'>Нижний</option>
        <option value='Nijnij'>Нижний</option>
        <option value='Nijnyaя'>Нижняя</option>
        <option value='Nijnyaя'>Нижняя</option>
        <option value='Nikolaevsk'>Николаевск</option>
        <option value='Nikolaevsk-na-Amure'>Николаевск-на-Амуре</option>
        <option value='Nikolsk'>Никольск</option>
        <option value='Nikolsk'>Никольск</option>
        <option value='Nikolskoe'>Никольское</option>
        <option value='Novaya'>Новая</option>
        <option value='Novaya'>Новая</option>
        <option value='Novoaleksandrovsk'>Новоалександровск</option>
        <option value='Novoaltajsk'>Новоалтайск</option>
        <option value='Novoanninskij'>Новоаннинский</option>
        <option value='Novovoronej'>Нововоронеж</option>
        <option value='Novodvinsk'>Новодвинск</option>
        <option value='Novozybkov'>Новозыбков</option>
        <option value='Novokubansk'>Новокубанск</option>
        <option value='Novokuzneck'>Новокузнецк</option>
        <option value='Novokujbyshevsk'>Новокуйбышевск</option>
        <option value='Novomichurinsk'>Новомичуринск</option>
        <option value='Novomoskovsk'>Новомосковск</option>
        <option value='Novopavlovsk'>Новопавловск</option>
        <option value='Novorjev'>Новоржев</option>
        <option value='Novorossijsk'>Новороссийск</option>
        <option value='Novosibirsk'>Новосибирск</option>
        <option value='Novosil'>Новосиль</option>
        <option value='Novosokolniki'>Новосокольники</option>
        <option value='Novotroick'>Новотроицк</option>
        <option value='Novouzensk'>Новоузенск</option>
        <option value='Novoulyanovsk'>Новоульяновск</option>
        <option value='Novouralsk'>Новоуральск</option>
        <option value='Novohopersk'>Новохоперск</option>
        <option value='Novocheboksarsk'>Новочебоксарск</option>
        <option value='Novocherkassk'>Новочеркасск</option>
        <option value='Novoshahtinsk'>Новошахтинск</option>
        <option value='Novyj'>Новый</option>
        <option value='Novyj'>Новый</option>
        <option value='Noginsk'>Ногинск</option>
        <option value='Nolinsk'>Нолинск</option>
        <option value='Norilsk'>Норильск</option>
        <option value='Noyabrsk'>Ноябрьск</option>
        <option value='Nurlat'>Нурлат</option>
        <option value='Nytva'>Нытва</option>
        <option value='Nyurba'>Нюрба</option>
        <option value='Nyagan'>Нягань</option>
        <option value='Nyazepetrovsk'>Нязепетровск</option>
        <option value='Nyandoma'>Няндома</option>
        <option value='Obluche'>Облучье</option>
        <option value='Obninsk'>Обнинск</option>
        <option value='Oboyan'>Обоянь</option>
        <option value='Ob'>Обь</option>
        <option value='Odincovo'>Одинцово</option>
        <option value='Ojerele'>Ожерелье</option>
        <option value='Ozyorsk'>Озёрск</option>
        <option value='Ozyorsk'>Озёрск</option>
        <option value='Ozyory'>Озёры</option>
        <option value='Oktyabrsk'>Октябрьск</option>
        <option value='Oktyabrskij'>Октябрьский</option>
        <option value='Okulovka'>Окуловка</option>
        <option value='Olyokminsk'>Олёкминск</option>
        <option value='Olenegorsk'>Оленегорск</option>
        <option value='Olonec'>Олонец</option>
        <option value='Omsk'>Омск</option>
        <option value='Omutninsk'>Омутнинск</option>
        <option value='Onega'>Онега</option>
        <option value='Opochka'>Опочка</option>
        <option value='Oryol'>Орёл</option>
        <option value='Orenburg'>Оренбург</option>
        <option value='Orehovo-Zuevo'>Орехово-Зуево</option>
        <option value='Orlov'>Орлов</option>
        <option value='Orsk'>Орск</option>
        <option value='Osa'>Оса</option>
        <option value='Osinniki'>Осинники</option>
        <option value='Ostashkov'>Осташков</option>
        <option value='Ostrov'>Остров</option>
        <option value='Ostrovnoj'>Островной</option>
        <option value='Ostrogojsk'>Острогожск</option>
        <option value='Otradnoe'>Отрадное</option>
        <option value='Otradnyj'>Отрадный</option>
        <option value='Oha'>Оха</option>
        <option value='Ohansk'>Оханск</option>
        <option value='Ochyor'>Очёр</option>
        <option value='Pavlovo'>Павлово</option>
        <option value='Pavlovo'>Павлово</option>
        <option value='Pavlovsk'>Павловск</option>
        <option value='Pavlovskij'>Павловский</option>
        <option value='Pallasovka'>Палласовка</option>
        <option value='Partizansk'>Партизанск</option>
        <option value='Pevek'>Певек</option>
        <option value='Penza'>Пенза</option>
        <option value='Pervomajsk'>Первомайск</option>
        <option value='Pervomajsk'>Первомайск</option>
        <option value='Pervouralsk'>Первоуральск</option>
        <option value='Perevoz'>Перевоз</option>
        <option value='Perevoz'>Перевоз</option>
        <option value='Peresvet'>Пересвет</option>
        <option value='Pereslavl-Zalesskij'>Переславль-Залесский</option>
        <option value='Perm'>Пермь</option>
        <option value='Pestovo'>Пестово</option>
        <option value='Petrov'>Петров</option>
        <option value='Petrovsk'>Петровск</option>
        <option value='Petrovsk-Zabajkalskij'>Петровск-Забайкальский</option>
        <option value='Petrozavodsk'>Петрозаводск</option>
        <option value='Petropavlovsk-Kamchatskij'>Петропавловск-Камчатский</option>
        <option value='Petuhovo'>Петухово</option>
        <option value='Petushki'>Петушки</option>
        <option value='Pechora'>Печора</option>
        <option value='Pechory'>Печоры</option>
        <option value='Pikalyovo'>Пикалёво</option>
        <option value='Pionerskij'>Пионерский</option>
        <option value='Pitkyaranta'>Питкяранта</option>
        <option value='Plavsk'>Плавск</option>
        <option value='Plast'>Пласт</option>
        <option value='Plyos'>Плёс</option>
        <option value='Povorino'>Поворино</option>
        <option value='Podolsk'>Подольск</option>
        <option value='Podporoje'>Подпорожье</option>
        <option value='Pokachi'>Покачи</option>
        <option value='Pokrov'>Покров</option>
        <option value='Pokrovsk'>Покровск</option>
        <option value='Polevskoj'>Полевской</option>
        <option value='Polessk'>Полесск</option>
        <option value='Polysaevo'>Полысаево</option>
        <option value='Polyarnye'>Полярные</option>
        <option value='Polyarnyj'>Полярный</option>
        <option value='Poronajsk'>Поронайск</option>
        <option value='Porhov'>Порхов</option>
        <option value='Pohvistnevo'>Похвистнево</option>
        <option value='Pochep'>Почеп</option>
        <option value='Pochinok'>Починок</option>
        <option value='Poshehone'>Пошехонье</option>
        <option value='Pravdinsk'>Правдинск</option>
        <option value='Privoljsk'>Приволжск</option>
        <option value='Primorsk'>Приморск</option>
        <option value='Primorsko-Ahtarsk'>Приморско-Ахтарск</option>
        <option value='Priozersk'>Приозерск</option>
        <option value='Prokopevsk'>Прокопьевск</option>
        <option value='Proletarsk'>Пролетарск</option>
        <option value='Protvino'>Протвино</option>
        <option value='Prohladnyj'>Прохладный</option>
        <option value='Pskov'>Псков</option>
        <option value='Pugachyov'>Пугачёв</option>
        <option value='Pudoj'>Пудож</option>
        <option value='Pustoshka'>Пустошка</option>
        <option value='Puchej'>Пучеж</option>
        <option value='Pushkino'>Пушкино</option>
        <option value='Pushino'>Пущино</option>
        <option value='Pytalovo'>Пыталово</option>
        <option value='Pyt-Yah'>Пыть-Ях</option>
        <option value='Pyatigorsk'>Пятигорск</option>
        <option value='Radujnyj'>Радужный</option>
        <option value='Radujnyj'>Радужный</option>
        <option value='Rajchihinsk'>Райчихинск</option>
        <option value='Ramenskoe'>Раменское</option>
        <option value='Rasskazovo'>Рассказово</option>
        <option value='Revda'>Ревда</option>
        <option value='Rej'>Реж</option>
        <option value='Reutov'>Реутов</option>
        <option value='Rjev'>Ржев</option>
        <option value='Rodniki'>Родники</option>
        <option value='Roslavl'>Рославль</option>
        <option value='Rossosh'>Россошь</option>
        <option value='Rostov'>Ростов</option>
        <option value='Rostov-na-Donu'>Ростов-на-Дону</option>
        <option value='Roshal'>Рошаль</option>
        <option value='Rtishevo'>Ртищево</option>
        <option value='Rubcovsk'>Рубцовск</option>
        <option value='Rudnya'>Рудня</option>
        <option value='Ruza'>Руза</option>
        <option value='Ruzaevka'>Рузаевка</option>
        <option value='Rybinsk'>Рыбинск</option>
        <option value='Rybnoe'>Рыбное</option>
        <option value='Rylsk'>Рыльск</option>
        <option value='Ryajsk'>Ряжск</option>
        <option value='Ryazan'>Рязань</option>
        <option value='Salavat'>Салават</option>
        <option value='Salair'>Салаир</option>
        <option value='Salehard'>Салехард</option>
        <option value='Salsk'>Сальск</option>
        <option selected value='Samara'>Самара</option>
        <option value='Sankt-Peterburg'>Санкт-Петербург</option>
        <option value='Saransk'>Саранск</option>
        <option value='Sarapul'>Сарапул</option>
        <option value='Saratov'>Саратов</option>
        <option value='Sarov'>Саров</option>
        <option value='Sarov'>Саров</option>
        <option value='Sasovo'>Сасово</option>
        <option value='Satka'>Сатка</option>
        <option value='Safonovo'>Сафоново</option>
        <option value='Sayanogorsk'>Саяногорск</option>
        <option value='Sayansk'>Саянск</option>
        <option value='Svetlogorsk'>Светлогорск</option>
        <option value='Svetlograd'>Светлоград</option>
        <option value='Svetlyj'>Светлый</option>
        <option value='Svetogorsk'>Светогорск</option>
        <option value='Svirsk'>Свирск</option>
        <option value='Svobodnyj'>Свободный</option>
        <option value='Sebej'>Себеж</option>
        <option value='Severobajkalsk'>Северобайкальск</option>
        <option value='Severodvinsk'>Северодвинск</option>
        <option value='Severo-Kurilsk'>Северо-Курильск</option>
        <option value='Severomorsk'>Североморск</option>
        <option value='Severouralsk'>Североуральск</option>
        <option value='Seversk'>Северск</option>
        <option value='Sevsk'>Севск</option>
        <option value='Segeja'>Сегежа</option>
        <option value='Selco'>Сельцо</option>
        <option value='Semyonov'>Семёнов</option>
        <option value='Semyonov'>Семёнов</option>
        <option value='Semikarakorsk'>Семикаракорск</option>
        <option value='Semiluki'>Семилуки</option>
        <option value='Sengilej'>Сенгилей</option>
        <option value='Serafimovich'>Серафимович</option>
        <option value='Sergach'>Сергач</option>
        <option value='Sergach'>Сергач</option>
        <option value='Sergiev'>Сергиев</option>
        <option value='Serdobsk'>Сердобск</option>
        <option value='Serov'>Серов</option>
        <option value='Serpuhov'>Серпухов</option>
        <option value='Sertolovo'>Сертолово</option>
        <option value='Sibaj'>Сибай</option>
        <option value='Sim'>Сим</option>
        <option value='Skovorodino'>Сковородино</option>
        <option value='Skopin'>Скопин</option>
        <option value='Slavgorod'>Славгород</option>
        <option value='Slavsk'>Славск</option>
        <option value='Slavyansk-na-Kubani'>Славянск-на-Кубани</option>
        <option value='Slancy'>Сланцы</option>
        <option value='Slobodskoj'>Слободской</option>
        <option value='Slyudyanka'>Слюдянка</option>
        <option value='Smolensk'>Смоленск</option>
        <option value='Snejinsk'>Снежинск</option>
        <option value='Snejnogorsk'>Снежногорск</option>
        <option value='Sobinka'>Собинка</option>
        <option value='Sovetsk'>Советск</option>
        <option value='Sovetsk'>Советск</option>
        <option value='Sovetsk'>Советск</option>
        <option value='Sovetskaya'>Советская</option>
        <option value='Sovetskij'>Советский</option>
        <option value='Sokol'>Сокол</option>
        <option value='Soligalich'>Солигалич</option>
        <option value='Solikamsk'>Соликамск</option>
        <option value='Solnechnogorsk'>Солнечногорск</option>
        <option value='Solvychegodsk'>Сольвычегодск</option>
        <option value='Sol-Ileck'>Соль-Илецк</option>
        <option value='Solcy'>Сольцы</option>
        <option value='Sorochinsk'>Сорочинск</option>
        <option value='Sorsk'>Сорск</option>
        <option value='Sortavala'>Сортавала</option>
        <option value='Sosenskij'>Сосенский</option>
        <option value='Sosnovka'>Сосновка</option>
        <option value='Sosnovoborsk'>Сосновоборск</option>
        <option value='Sosnovyj'>Сосновый</option>
        <option value='Sosnogorsk'>Сосногорск</option>
        <option value='Sochi'>Сочи</option>
        <option value='Spas-Demensk'>Спас-Деменск</option>
        <option value='Spas-Klepiki'>Спас-Клепики</option>
        <option value='Spassk'>Спасск</option>
        <option value='Spassk-Dalnij'>Спасск-Дальний</option>
        <option value='Spassk-Ryazanskij'>Спасск-Рязанский</option>
        <option value='Srednekolymsk'>Среднеколымск</option>
        <option value='Sredneuralsk'>Среднеуральск</option>
        <option value='Sretensk'>Сретенск</option>
        <option value='Stavropol'>Ставрополь</option>
        <option value='Staraya'>Старая</option>
        <option value='Starica'>Старица</option>
        <option value='Starodub'>Стародуб</option>
        <option value='Staryj'>Старый</option>
        <option value='Sterlitamak'>Стерлитамак</option>
        <option value='Strejevoj'>Стрежевой</option>
        <option value='Stroitel'>Строитель</option>
        <option value='Strunino'>Струнино</option>
        <option value='Stupino'>Ступино</option>
        <option value='Suvorov'>Суворов</option>
        <option value='Sudja'>Суджа</option>
        <option value='Sudogda'>Судогда</option>
        <option value='Suzdal'>Суздаль</option>
        <option value='Suoyarvi'>Суоярви</option>
        <option value='Suraj'>Сураж</option>
        <option value='Surgut'>Сургут</option>
        <option value='Surovikino'>Суровикино</option>
        <option value='Sursk'>Сурск</option>
        <option value='Susuman'>Сусуман</option>
        <option value='Suhinichi'>Сухиничи</option>
        <option value='Suhoj'>Сухой</option>
        <option value='Shodnya'>Сходня</option>
        <option value='Syzran'>Сызрань</option>
        <option value='Syktyvkar'>Сыктывкар</option>
        <option value='Sysert'>Сысерть</option>
        <option value='Sychevka'>Сычевка</option>
        <option value='Syasstroj'>Сясьстрой</option>
        <option value='Tavda'>Тавда</option>
        <option value='Taganrog'>Таганрог</option>
        <option value='Tajga'>Тайга</option>
        <option value='Tajshet'>Тайшет</option>
        <option value='Taldom'>Талдом</option>
        <option value='Talica'>Талица</option>
        <option value='Tambov'>Тамбов</option>
        <option value='Tara'>Тара</option>
        <option value='Tarusa'>Таруса</option>
        <option value='Tatarsk'>Татарск</option>
        <option value='Tashtagol'>Таштагол</option>
        <option value='Tver'>Тверь</option>
        <option value='Teberda'>Теберда</option>
        <option value='Tejkovo'>Тейково</option>
        <option value='Temnikov'>Темников</option>
        <option value='Temryuk'>Темрюк</option>
        <option value='Terek'>Терек</option>
        <option value='Tetyushi'>Тетюши</option>
        <option value='Timashevsk'>Тимашевск</option>
        <option value='Tihvin'>Тихвин</option>
        <option value='Tihoreck'>Тихорецк</option>
        <option value='Tobolsk'>Тобольск</option>
        <option value='Toguchin'>Тогучин</option>
        <option value='Tolyatti'>Тольятти</option>
        <option value='Tomari'>Томари</option>
        <option value='Tommot'>Томмот</option>
        <option value='Tomsk'>Томск</option>
        <option value='Topki'>Топки</option>
        <option value='Torjok'>Торжок</option>
        <option value='Toropec'>Торопец</option>
        <option value='Tosno'>Тосно</option>
        <option value='Totma'>Тотьма</option>
        <option value='Trehgornyj'>Трехгорный</option>
        <option value='Troick'>Троицк</option>
        <option value='Troick'>Троицк</option>
        <option value='Trubchevsk'>Трубчевск</option>
        <option value='Tuapse'>Туапсе</option>
        <option value='Tujmazy'>Туймазы</option>
        <option value='Tula'>Тула</option>
        <option value='Tulun'>Тулун</option>
        <option value='Turan'>Туран</option>
        <option value='Turinsk'>Туринск</option>
        <option value='Tutaev'>Тутаев</option>
        <option value='Tynda'>Тында</option>
        <option value='Tyrnyauz'>Тырныауз</option>
        <option value='Tyukalinsk'>Тюкалинск</option>
        <option value='Tyumen'>Тюмень</option>
        <option value='Uvarovo'>Уварово</option>
        <option value='Uglegorsk'>Углегорск</option>
        <option value='Uglich'>Углич</option>
        <option value='Udachnyj'>Удачный</option>
        <option value='Udomlya'>Удомля</option>
        <option value='Ujur'>Ужур</option>
        <option value='Uzlovaya'>Узловая</option>
        <option value='Ulan-Ude'>Улан-Удэ</option>
        <option value='Ulyanovsk'>Ульяновск</option>
        <option value='Unecha'>Унеча</option>
        <option value='Uraj'>Урай</option>
        <option value='Uren'>Урень</option>
        <option value='Uren'>Урень</option>
        <option value='Urjum'>Уржум</option>
        <option value='Urus-Martan'>Урус-Мартан</option>
        <option value='Uryupinsk'>Урюпинск</option>
        <option value='Usinsk'>Усинск</option>
        <option value='Usman'>Усмань</option>
        <option value='Usole'>Усолье</option>
        <option value='Usole-Sibirskoe'>Усолье-Сибирское</option>
        <option value='Ussurijsk'>Уссурийск</option>
        <option value='Ust-Djeguta'>Усть-Джегута</option>
        <option value='Ust-Ilimsk'>Усть-Илимск</option>
        <option value='Ust-Katav'>Усть-Катав</option>
        <option value='Ust-Kut'>Усть-Кут</option>
        <option value='Ust-Labinsk'>Усть-Лабинск</option>
        <option value='Ustyujna'>Устюжна</option>
        <option value='Ufa'>Уфа</option>
        <option value='Uhta'>Ухта</option>
        <option value='Uchaly'>Учалы</option>
        <option value='Uyar'>Уяр</option>
        <option value='Fatej'>Фатеж</option>
        <option value='Fokino'>Фокино</option>
        <option value='Fokino'>Фокино</option>
        <option value='Frolovo'>Фролово</option>
        <option value='Fryazino'>Фрязино</option>
        <option value='Furmanov'>Фурманов</option>
        <option value='Habarovsk'>Хабаровск</option>
        <option value='Hadyjensk'>Хадыженск</option>
        <option value='Hanty-Mansijsk'>Ханты-Мансийск</option>
        <option value='Harabali'>Харабали</option>
        <option value='Harovsk'>Харовск</option>
        <option value='Hasavyurt'>Хасавюрт</option>
        <option value='Hvalynsk'>Хвалынск</option>
        <option value='Hilok'>Хилок</option>
        <option value='Himki'>Химки</option>
        <option value='Holm'>Холм</option>
        <option value='Holmsk'>Холмск</option>
        <option value='Hotkovo'>Хотьково</option>
        <option value='Civilsk'>Цивильск</option>
        <option value='Cimlyansk'>Цимлянск</option>
        <option value='Chadan'>Чадан</option>
        <option value='Chajkovskij'>Чайковский</option>
        <option value='Chapaevsk'>Чапаевск</option>
        <option value='Chaplygin'>Чаплыгин</option>
        <option value='Chebarkul'>Чебаркуль</option>
        <option value='Cheboksary'>Чебоксары</option>
        <option value='Chegem'>Чегем</option>
        <option value='Chekalin'>Чекалин</option>
        <option value='Chelyabinsk'>Челябинск</option>
        <option value='Cherdyn'>Чердынь</option>
        <option value='Cheremhovo'>Черемхово</option>
        <option value='Cherepanovo'>Черепаново</option>
        <option value='Cherepovec'>Череповец</option>
        <option value='Cherkessk'>Черкесск</option>
        <option value='Chyormoz'>Чёрмоз</option>
        <option value='Chernogolovka'>Черноголовка</option>
        <option value='Chernogorsk'>Черногорск</option>
        <option value='Chernushka'>Чернушка</option>
        <option value='Chernyahovsk'>Черняховск</option>
        <option value='Chehov'>Чехов</option>
        <option value='Chistopol'>Чистополь</option>
        <option value='Chita'>Чита</option>
        <option value='Chkalovsk'>Чкаловск</option>
        <option value='Chkalovsk'>Чкаловск</option>
        <option value='Chudovo'>Чудово</option>
        <option value='Chulym'>Чулым</option>
        <option value='Chusovoj'>Чусовой</option>
        <option value='Chuhloma'>Чухлома</option>
        <option value='Shagonar'>Шагонар</option>
        <option value='Shadrinsk'>Шадринск</option>
        <option value='Shali'>Шали</option>
        <option value='Sharypovo'>Шарыпово</option>
        <option value='Sharya'>Шарья</option>
        <option value='Shatura'>Шатура</option>
        <option value='Shahtyorsk'>Шахтёрск</option>
        <option value='Shahty'>Шахты</option>
        <option value='Shahunya'>Шахунья</option>
        <option value='Shahunya'>Шахунья</option>
        <option value='Shack'>Шацк</option>
        <option value='Shebekino'>Шебекино</option>
        <option value='Shelehov'>Шелехов</option>
        <option value='Shenkursk'>Шенкурск</option>
        <option value='Shilka'>Шилка</option>
        <option value='Shimanovsk'>Шимановск</option>
        <option value='Shihany'>Шиханы</option>
        <option value='Shlisselburg'>Шлиссельбург</option>
        <option value='Shumerlya'>Шумерля</option>
        <option value='Shumiha'>Шумиха</option>
        <option value='Shuya'>Шуя</option>
        <option value='Shyokino'>Щёкино</option>
        <option value='Shyolkovo'>Щёлково</option>
        <option value='Sherbinka'>Щербинка</option>
        <option value='Shigry'>Щигры</option>
        <option value='Shuche'>Щучье</option>
        <option value='Elektrogorsk'>Электрогорск</option>
        <option value='Elektrostal'>Электросталь</option>
        <option value='Elektrougli'>Электроугли</option>
        <option value='Elista'>Элиста</option>
        <option value='Engels'>Энгельс</option>
        <option value='Ertil'>Эртиль</option>
        <option value='Yubilejnyj'>Юбилейный</option>
        <option value='Yugorsk'>Югорск</option>
        <option value='Yuja'>Южа</option>
        <option value='Yujno-Sahalinsk'>Южно-Сахалинск</option>
        <option value='Yujno-Suhokumsk'>Южно-Сухокумск</option>
        <option value='Yujnouralsk'>Южноуральск</option>
        <option value='Yurga'>Юрга</option>
        <option value='Yurevec'>Юрьевец</option>
        <option value='Yurev-Polskij'>Юрьев-Польский</option>
        <option value='Yuryuzan'>Юрюзань</option>
        <option value='Yuhnov'>Юхнов</option>
        <option value='Yadrin'>Ядрин</option>
        <option value='Yakutsk'>Якутск</option>
        <option value='Yalutorovsk'>Ялуторовск</option>
        <option value='Yanaul'>Янаул</option>
        <option value='Yaransk'>Яранск</option>
        <option value='Yarovoe'>Яровое</option>
        <option value='Yaroslavl'>Ярославль</option>
        <option value='Yarcevo'>Ярцево</option>
        <option value='Yasnogorsk'>Ясногорск</option>
        <option value='Yasnyj'>Ясный</option>
        <option value='Yahroma'>Яхрома</option>
</select></td>
    </tr>

    <tr>
        <td>Куратор</td>
        <td>
            <select name="kurator">
                <option value='none'>Выбери куратора</option>
                <option value='СМ'>СМ</option>
                <option value='Тестовый'>Тестовый</option>
                <option value='Самоподпись'>Самоподпись</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>Создатель</td>
        <td>
            <select name="godname">
            <option value="none">Выберите создателя</option>
            <option value="Попыванов.С.Г.">Попыванов Сергей</option>
            <option value="Федотов.А.А.">Федотов Александр</option>
            </select>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" name="create" id="create" value="Создать пользователя" />
        </td>
    </tr>
    </form>
</table>

<hr color="red"></hr>
<table>
    <caption>Создание пользователей списком</caption>
    <form action="list.php" method="post" enctype="multipart/form-data" accept-charset="uft-8">
        <tr>
            <td><input name="userlist" type="file" ></td>
            <td><input type="submit" value="Создать из списка" /></td>
        </tr>    
    </form>
</table>

<hr color="red"></hr></br>

<form action="tab.php" method="post" enctype="multipart/form-data" accept-charset="uft-8">
<input type="submit" value="Посмотреть таблицу пользователей" />
</form>
<form action='alarm_revoked.php' method='post' enctype='multipart/form-data' accept-charset='uft-8'>
<input type='submit' value='Список попыток доступа с заблокированных аккаунтов' />
</form>
