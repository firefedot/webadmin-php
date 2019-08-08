$(document).ready(function(){
    $('#select_on').DataTable();
    $('#select_off').DataTable();
    $('#select_all').DataTable();
    $('#select_none').DataTable();
    $('#select').DataTable();
});

function revoke_vpn(names) 
        {
            if (confirm("Вы действительно хотите отозвать сертификат у пользователя "+names+" ?"))
            {
                location.href="revoked.php?uname="+names;   
 
            }
        }

function deleted_user(names) 
        {
            if (confirm("Вы действительно хотите полностью удалть пользователя "+names+" из базы?"))
            {
                location.href="deleted.php?uname="+names;   
 
            }
        }

function blocked_ip_user(names) 
        {
            if (confirm("Вы действительно блокировать доступ пользователя "+names+" по ip?"))
            {
                location.href="blocked.php?uname="+names;   
 
            }
        }
        
function revoked_zim_user(names) 
        {
            if (confirm("Вы действительно блокировать/активировать учетную запись пользователя "+names+" в zimbra?"))
            {
                location.href="zim_revoked.php?uname="+names;   
 
            }
        }
 