<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>IChing</title>
  <link rel="stylesheet" href="css/master.css" type="text/css" charset="utf-8">
  <link rel="stylesheet" href="css/font.css" type="text/css" charset="utf-8">

  <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="login.js"></script>
</head>

<body>
  <div id="page-container">

  <div id="main-nav" class="hidden">Main Nav</div>
  
  <div id="header">
  <h1 class="fontface">IChing</h1>	     
  </div>

  <div id="sidebar" class="hidden">Sidebar</div>
  
  <div id="content">
    <form name="loginForm" id="formLogin" action="checkLogin.php" method="POST">
      <p class="style2">    
        Username<input name="user" id="usr" type="text">
        Password<input name="pass" id="psw" type="password">
        <input onclick="checkLogin();" type="button" value="Login">
      </p>
    </form>

    <form name="questionForm" id="questionForm" action="getAnswer.php" method="post">
      <div class="style2">
        Type your question here<br>
        <textarea cols="40" rows="5" id="questionTextArea">
        </textarea>
        <br>

        <input type="submit" value="Get answer">
        <input type="button" value="Clear question"
               onclick="$('#questionTextArea').val('');">

        <!-- see which IChing systems are available -->
        <div>
        <?php include "get_iching_radio.php" ?>
        </div>
      </div>
    </form>
  </div>

  <div id="footer">
    <p>Copyright � Stefano Sabatini 2012</p>

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
