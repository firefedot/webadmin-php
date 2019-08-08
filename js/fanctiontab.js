/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


 function tabSwitch(new_tab, new_content) {

            document.getElementById('content_1').style.display = 'none';
            document.getElementById('content_2').style.display = 'none';
            document.getElementById('content_3').style.display = 'none';
            document.getElementById(new_content).style.display = 'block';	

            document.getElementById('tab_1').className = '';
            document.getElementById('tab_2').className = '';
            document.getElementById('tab_3').className = '';
            document.getElementById(new_tab).className = 'active';		

        }