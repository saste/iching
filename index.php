<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>I Ching</title>
  <link rel="stylesheet" href="css/master.css" type="text/css" charset="utf-8">

  <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="js/jquery.form.js"></script>
  <script type="text/javascript" src="js/iching.js"></script>
</head>

<body onload="init()" >
  <div id="page-container">

  <div id="loginbar">
    <form id="loginForm" method="POST">
      Nickname<input id="nickname" name="nickname" type="text">
      Password<input id="password" name="password" type="password">
      <input type="submit" value="Login">
    </form>
  </div>

  <div id="main-nav"></div>

  <div id="header">
  <h1 class="fontface">I Ching</h1>
  </div>

  <div id="sidebar">
    <ul id="navitems">
      <li name="new-question"><a href="#" onclick="getQuestionForm()"><span>New question</span></a>
      <li name="how-it-works"><a href="#" onclick="getPageContent('how-it-works')"><span>How it works</span></a></li>
      <li name="resources"><a href="#" onclick="getPageContent('resources')"><span>I Ching resources</span></a></li>
      <li name="my-view"><a href="#"      onclick="getPageContent('my-view')"><span>My view on why it does work</span></a></li>
      <li name="references"><a href="#"    onclick="getPageContent('references')"><span>Random references</span></li>
      <li name="about"><a href="#" id="about"         onclick="getPageContent('about')"><span>About this website</span></a></li>
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
