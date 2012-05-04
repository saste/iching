<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>IChing</title>
  <link rel="stylesheet" href="css/master.css" type="text/css" charset="utf-8">
  <link rel="stylesheet" href="css/font.css" type="text/css" charset="utf-8">

  <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="js/jquery.form.js"></script>
  <script type="text/javascript" src="js/iching.js"></script>
</head>

<body onload="init()" >
  <div id="page-container">

  <div id="loginbar">
    <form name="loginForm" id="formLogin" action="checkLogin.php" method="POST">
      Username<input name="user" id="usr" type="text">
      Password<input name="pass" id="psw" type="password">
      <input onclick="checkLogin();" type="button" value="Login">
    </form>
  </div>

  <div id="main-nav" >Main Nav</div>
  
  <div id="header">
  <h1 class="fontface">IChing</h1>	     
  </div>

  <div id="sidebar">
    <ul>
      <li>How does it work</li>
      <li><a href="#" onclick="getPageContent('resources')">IChing resources</a></li>
      <li><a href="#" onclick="getPageContent('my-view')">My view on why it does work</a></li>
      <li>Random references</li>
      <li><a href="#" onclick="getPageContent('about')">About this website</a></li>
    </ul> 
  </div>
  
  <div id="content">
  </div>
  </form>
  </div>

  <div id="footer">
    <p>Copyright © Stefano Sabatini 2012</p>

    <p>Site realized by <a href="mailto:stefasab@gmail.com">Meister Stefano Sabbatin</a>
      for <a href="http://www.unica.it/">Universitas Studiorum
      Kalaritana</a>.
    </p>

    <p>
      Powered by <a href="http://www.emacs.org/">Emacs</a> and
      <a href="http://www.gnu.org/gnu/linux-and-gnu.html.nz/">GNU/Linux</a>.
    </p>
  </div>
</div>
    

</body>

</html>
