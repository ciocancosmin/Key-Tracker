<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Key Tracker">
  <meta name="author" content="">
  <meta http-equiv="Cache-control" content="public">
    <?php
    header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	header("Pragma: no-cache");
	include_once('config.php');
	?>
  <link rel="shortcut icon" type="image/x-icon" href='img/favicon.png'>
	<title>Key Tracker Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/login.js" ></script>
	<script type="text/javascript" src="js/redirect.js" ></script>
</head>
<body>

<!-- <div id="test_div">
	

	<div id="main_login_div">
		
	</div>

</div>  -->

<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div id="main_login_div">
				<input type="text" id="username_inp" class="login_input" placeholder="Nume de utilizator" onclick="open_keyboard(0);">
				<input type="password" id="password_inp" class="login_input" placeholder="Parola" onclick="open_keyboard(1)">
				<p id="login_div_error">Introduceti datele sau cardul.</p>
				<button type="button" class="btn btn-info" id="login_btn" style="width: 100%;font-size:24px;" onclick="login()">Autentificare</button>
				<div class="loader"></div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>

<div id="keyboard">
	<div class="tab" onclick="click_keyboard('0')">0</div>
	<div class="tab" onclick="click_keyboard('1')">1</div>
	<div class="tab" onclick="click_keyboard('2')">2</div>
	<div class="tab" onclick="click_keyboard('3')">3</div>
	<div class="tab" onclick="click_keyboard('4')">4</div>
	<div class="tab" onclick="click_keyboard('5')">5</div>
	<div class="tab" onclick="click_keyboard('6')">6</div>
	<div class="tab" onclick="click_keyboard('7')">7</div>
	<div class="tab" onclick="click_keyboard('8')">8</div>
	<div class="tab" onclick="click_keyboard('9')">9</div>
	<div class="tab" onclick="click_keyboard('q')" id="keyboard1-1">q</div>
	<div class="tab" onclick="click_keyboard('w')" id="keyboard1-2">w</div>
	<div class="tab" onclick="click_keyboard('e')" id="keyboard1-3">e</div>
	<div class="tab" onclick="click_keyboard('r')" id="keyboard1-4">r</div>
	<div class="tab" onclick="click_keyboard('t')" id="keyboard1-5">t</div>
	<div class="tab" onclick="click_keyboard('y')" id="keyboard1-6">y</div>
	<div class="tab" onclick="click_keyboard('u')" id="keyboard1-7">u</div>
	<div class="tab" onclick="click_keyboard('i')" id="keyboard1-8">i</div>
	<div class="tab" onclick="click_keyboard('o')" id="keyboard1-9">o</div>
	<div class="tab" onclick="click_keyboard('p')" id="keyboard1-10">p</div>
	<div class="tab" onclick="click_keyboard('a')" id="keyboard1-11">a</div>
	<div class="tab" onclick="click_keyboard('s')" id="keyboard1-12">s</div>
	<div class="tab" onclick="click_keyboard('d')" id="keyboard1-13">d</div>
	<div class="tab" onclick="click_keyboard('f')" id="keyboard1-14">f</div>
	<div class="tab" onclick="click_keyboard('g')" id="keyboard1-15">g</div>
	<div class="tab" onclick="click_keyboard('h')" id="keyboard1-16">h</div>
	<div class="tab" onclick="click_keyboard('i')" id="keyboard1-17">i</div>
	<div class="tab" onclick="click_keyboard('j')" id="keyboard1-18">j</div>
	<div class="tab" onclick="click_keyboard('k')" id="keyboard1-19">k</div>
	<div class="tab" onclick="click_keyboard('l')" id="keyboard1-20">l</div>
	<div class="tab" onclick="click_keyboard('z')" id="keyboard1-21">z</div>
	<div class="tab" onclick="click_keyboard('x')" id="keyboard1-22">x</div>
	<div class="tab" onclick="click_keyboard('c')" id="keyboard1-23">c</div>
	<div class="tab" onclick="click_keyboard('v')" id="keyboard1-24">v</div>
	<div class="tab" onclick="click_keyboard('b')" id="keyboard1-25">b</div>
	<div class="tab" onclick="click_keyboard('n')" id="keyboard1-26">n</div>
	<div class="tab" onclick="click_keyboard('m')" id="keyboard1-27">m</div>
	<div class="tab" onclick="delete_from_keyboard()"><img src="img/delete32.png"></div>
	<div class="tab" onclick="caps_lock();"><img src="img/caps2.png" /></div>
	<div class="tab" onclick="enter_btn_login();">OK</div>
</div>

<div id="keyboard2">
	<div class="tab" onclick="click_keyboard('0')">0</div>
	<div class="tab" onclick="click_keyboard('1')">1</div>
	<div class="tab" onclick="click_keyboard('2')">2</div>
	<div class="tab" onclick="click_keyboard('3')">3</div>
	<div class="tab" onclick="click_keyboard('4')">4</div>
	<div class="tab" onclick="click_keyboard('5')">5</div>
	<div class="tab" onclick="click_keyboard('6')">6</div>
	<div class="tab" onclick="click_keyboard('7')">7</div>
	<div class="tab" onclick="click_keyboard('8')">8</div>
	<div class="tab" onclick="click_keyboard('9')">9</div>
	<div class="tab" onclick="click_keyboard('(')">(</div>
	<div class="tab" onclick="click_keyboard(')')">)</div>
	<div class="tab" onclick="click_keyboard('+')">+</div>
	<div class="tab" onclick="click_keyboard(',')">,</div>
	<div class="tab" onclick="click_keyboard('-')">-</div>
	<div class="tab" onclick="click_keyboard('_')">_</div>
	<div class="tab" onclick="click_keyboard('.')">.</div>
	<div class="tab" onclick="click_keyboard('!')">!</div>
	<div class="tab" onclick="click_keyboard(';')">;</div>
	<div class="tab" onclick="click_keyboard(':')">:</div>
	<div class="tab" onclick="click_keyboard('<')"><</div>
	<div class="tab" onclick="click_keyboard('>')">></div>
	<div class="tab" onclick="click_keyboard('?')">?</div>
	<div class="tab" onclick="click_keyboard('@')">@</div>
	<div class="tab" onclick="click_keyboard('[')">[</div>
	<div class="tab" onclick="click_keyboard(']')">]</div>
	<div class="tab" onclick="click_keyboard('{')">{</div>
	<div class="tab" onclick="click_keyboard('}')">}</div>
	<div class="tab" onclick="click_keyboard('|')">|</div>
	<div class="tab" onclick="click_keyboard('~')">~</div>
	<div class="tab" onclick="click_keyboard('$')">$</div>
	<div class="tab" onclick="click_keyboard('#')">#</div>
	<div class="tab" onclick="click_keyboard('%')">%</div>
	<div class="tab" onclick="click_keyboard('&')">&</div>
	<div class="tab" onclick="click_keyboard('=')">=</div>
	<div class="tab" onclick="click_keyboard('`')">`</div>
	<div class="tab" onclick="click_keyboard('*')">*</div>
	<div class="tab" onclick="delete_from_keyboard()"><img src="img/delete32.png"></div>
	<div class="tab" onclick="caps_lock();"><img src="img/caps1.png" /></div>
	<div class="tab" onclick="enter_btn_login();">OK</div>
</div>

</body>
</html>