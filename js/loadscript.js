$(document).ready(function(){
  $.blockUI({message:'Немного подождите,идет построение страницы...<br>\n\
<img src="http://szenprogs.ru/img/sys/wait.gif" border="0" width="48" height="48" alt=""><br>\n\
<a href="javascript://" onclick="$.unblockUI();return false;" style="font-size:7pt;">Разблокировать<\/a>',
        css:{background:'#fff',border:'5px solid #e0e0e0',padding:'3px'},
        overlayCSS:{background:'#000',opacity:.9}});
  $(window).load(function(){
    _uWnd.close('codeAlert');
    $.unblockUI();
  });
});