<?php

?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type='text/javascript' src='js/jquery-1.11.2.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/basic.js'></script>
<title> SimpleModal Basic Modal Dialog </title>
<!-- Contact Form CSS files -->
<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />

<!-- IE6 "fix" for the close png image -->
<!--[if lt IE 7]>
<link type='text/css' href='css/basic_ie.css' rel='stylesheet' media='screen' />
<![endif]-->

<!-- JS files are loaded at the bottom of the page -->
</head>
<body>
<div id='container'>
	
	<div id='content'>
		<div id='revoke-modal'>
			<h3>Заголовок</h3>
			<p>Пройтой текст</p>
			<input type='button' name='basic' value='Demo' class='basic'/>
		</div>
		
		<!-- modal content -->
		<div id="basic-modal-content">
			<h3>Текст модпльного окна</h3>
			<p>For this demo, SimpleModal is using this "hidden" data for its content. You can also populate the modal dialog with an AJAX response, standard HTML or DOM element(s).</p>
			<p>Examples:</p>
			<p><code>$('#basicModalContent').modal(); // jQuery object - this demo</code></p>
			<p><code>$.modal(document.getElementById('basicModalContent')); // DOM</code></p>
			<p><code>$.modal('&lt;p&gt;&lt;b&gt;HTML&lt;/b&gt; elements&lt;/p&gt;'); // HTML</code></p>
			<p><code>$('&lt;div&gt;&lt;/div&gt;').load('page.html').modal(); // AJAX</code></p>
		
		</div>

		<!-- preload the images -->
		<div style='display:none'>
			<img src='img/basic/x.png' alt='' />
		</div>
	</div>
	
</div>
<!-- Load jQuery, SimpleModal and Basic JS files -->

</body>
</html>