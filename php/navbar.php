<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="apple-touch-icon" type="image/png" href="https://static.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
<meta name="apple-mobile-web-app-title" content="CodePen">
<link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />
<link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
<title>CodePen - Minimal Bootstrap Navbar</title>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<style>
@import url("https://fonts.googleapis.com/css?family=Roboto");
body {
  margin: 10%;
  color: white;
  background: #111111;
  font-family: 'Roboto', sans-serif;
}

#nav-colors, #font-colors, #edges {
  margin-top: 10px;
}
#nav-colors .btn, #font-colors .btn, #edges .btn {
  display: inline-block;
  padding: 10px;
  margin: 0 5px;
  border: 2px solid #111111;
  -webkit-transition: 0.2s ease;
  transition: 0.2s ease;
}
#nav-colors .btn:hover, #font-colors .btn:hover, #edges .btn:hover {
  border: 2px solid white;
}

#nav-colors #pink {
  background: -webkit-gradient(linear, left top, right top, from(#ff5858), to(#f857a6));
  background: linear-gradient(to right, #ff5858, #f857a6);
}
#nav-colors #red {
  background: -webkit-gradient(linear, left top, right top, from(#d31027), to(#ea384d));
  background: linear-gradient(to right, #d31027, #ea384d);
}
#nav-colors #purple {
  background: -webkit-gradient(linear, left top, right top, from(#41295a), to(#2f0743));
  background: linear-gradient(to right, #41295a, #2f0743);
}
#nav-colors #blue {
  background: -webkit-gradient(linear, left top, right top, from(#396afc), to(#2948ff));
  background: linear-gradient(to right, #396afc, #2948ff);
}
#nav-colors #green {
  background: -webkit-gradient(linear, left top, right top, from(#add100), to(#7b920a));
  background: linear-gradient(to right, #add100, #7b920a);
}
#nav-colors #yellow {
  background: -webkit-gradient(linear, left top, right top, from(#f7971e), to(#ffd200));
  background: linear-gradient(to right, #f7971e, #ffd200);
}
#nav-colors #orange {
  background: -webkit-gradient(linear, left top, right top, from(#e43a15), to(#e65245));
  background: linear-gradient(to right, #e43a15, #e65245);
}

#font-colors #white {
  background: white;
}
#font-colors #black {
  background: black;
}

#edges #rounded {
  background: black;
}
#edges #square {
  background: black;
  border-radius: 0px;
}
#edges #rounded:hover, #edges #square:hover {
  color: white;
}

.navbar {
  border: 0;
  border-radius: 0;
  background: -webkit-gradient(linear, left top, right top, from(#ff5858), to(#f857a6));
  background: linear-gradient(to right, #ff5858, #f857a6);
}
.navbar .nav li > a, .navbar .navbar-brand {
  max-height: 50px;
  width: auto;
  background: transparent !important;
  font-size: 18px;
  -webkit-transition: 0.2s ease-in-out;
  transition: 0.2s ease-in-out;
}
.navbar .nav li > a:hover, .navbar .navbar-brand:hover {
  background-color: rgba(255, 255, 255, 0.2);
  font-size: 14px;
}
.navbar .nav li > a:hover .link, .navbar .navbar-brand:hover .link {
  width: 100%;
  padding: 0 5px 0 5px;
  visibility: visible;
  font-size: 14px;
}
.navbar .link {
  width: 0;
  font-family: 'Roboto', sans-serif;
  -webkit-transition: 0.2s ease-in-out;
  transition: 0.2s ease-in-out;
  visibility: hidden;
  font-size: 0px;
}
.navbar span {
  color: white;
}
.navbar .navbar-toggle {
  padding-right: 0;
}
.navbar .navbar-toggle .icon-bar {
  background: white;
}
.navbar .navbar-collapse {
  display: none;
}
.navbar button {
  background: transparent;
}
.navbar button[type=submit] {
  padding-right: 0;
}
.navbar button[type=submit] span {
  -webkit-transition: 0.3s ease-in-out;
  transition: 0.3s ease-in-out;
}
.navbar button[type=submit]:hover span {
  -webkit-transform: scale(1.3) rotate(90deg);
          transform: scale(1.3) rotate(90deg);
}
.navbar form {
  padding: 0;
}
.navbar form .form-control {
  border: 0;
  border-radius: 0;
  color: black;
  font-weight: bold;
  background: rgba(255, 255, 255, 0.7);
  -webkit-transition: 0.2s ease-in-out;
  transition: 0.2s ease-in-out;
}
.navbar form .form-control:hover {
  background: white;
}
.navbar .dropdown .fa-caret-down {
  padding-left: 3px;
  font-size: 18px;
  -webkit-transition: 0.4s ease;
  transition: 0.4s ease;
}
.navbar .dropdown.open {
  background-color: rgba(255, 255, 255, 0.2);
  font-size: 14px;
}
.navbar .dropdown.open .link {
  width: 100%;
  visibility: visible;
  font-size: 14px;
  padding: 0 5px 0 5px;
}
.navbar .dropdown.open .dropdown-toggle {
  font-size: 14px;
}
.navbar .dropdown.open .fa-caret-down {
  -webkit-transform: rotate(180deg);
          transform: rotate(180deg);
}
.navbar .dropdown .dropdown-menu {
  min-width: 0px !important;
  width: 100%;
  background: #ff5858;
  text-align: center;
  border-radius: 0;
}
.navbar .dropdown .dropdown-menu li, .navbar .dropdown .dropdown-menu a {
  color: white;
  font-size: 14px;
  line-height: 30px;
}
.navbar .dropdown .dropdown-menu li:hover, .navbar .dropdown .dropdown-menu a:hover {
  color: white;
  letter-spacing: 1px;
  background: transparent;
}
.navbar .dropdown .dropdown-menu a {
  padding: 0 15px 0 15px;
}

@media (max-width: 769px) {
  .navbar .link {
    padding-left: 10px;
    visibility: visible;
    width: 100%;
    font-size: 14px;
  }
  .navbar .navbar-brand .link {
    visibility: hidden;
  }

  .dropdown .dropdown-menu {
    text-align: left !important;
  }

  button[type=submit] {
    width: 50%;
    float: left;
  }

  .navbar-form {
    border: 0;
  }

  .form-group {
    padding: 0;
    margin: 0;
  }
  .form-group input {
    width: 50%;
    float: left;
  }
}
</style>
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
</head>

<nav class="navbar">


<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-1" aria-expanded="false">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#"><span class="fa fa-home"></span><span class="link"> Home</span></a>
</div>

<div class="navbar-collapse collapse" id="collapse-1">

<ul class="nav navbar-nav">

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
<span class="fa fa-tags"></span><span class="link"> Products</span> <span class="fa fa-caret-down"></span></a>
<ul class="dropdown-menu">
<li><a href="#"><span class="fa fa-tag"></span> Catalogue 1</a></li>
<li><a href="#"><span class="fa fa-tag"></span> Catalogue 2</a></li>
</ul>
</li>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
<span class="fa fa-gears"></span><span class="link"> Services</span> <span class="fa fa-caret-down"></span></a>
<ul class="dropdown-menu">
<li><a href="#"><span class="fa fa-gear" /></span> Service 1</a></li>
<li><a href="#"><span class="fa fa-gear" /></span> Service 2</a></li>
<li><a href="#"><span class="fa fa-gear" /></span> Service 3</a></li>
</ul>
</li>

<li><a href="#"><span class="fa fa-info-circle"></span><span class="link"> About</span></a></li>

<li><a href="#"><span class="fa fa-phone"></span><span class="link"> Contact</span></a></li>
</ul>

<form class="navbar-form navbar-right">
<div class="form-group">
<input type="text" class="form-control" placeholder="Search">
</div>
<button type="submit" class="btn"><span class="fa fa-search"></span></button>
</form>
</div>
</div>
</nav>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'></script>
<script id="rendered-js">
// Open close dropdown on click
$("li.dropdown").click(function () {
  if ($(this).hasClass("open")) {
    $(this).find(".dropdown-menu").slideUp("fast");
    $(this).removeClass("open");
  } else
  {
    $(this).find(".dropdown-menu").slideDown("fast");
    $(this).toggleClass("open");
  }
});

// Close dropdown on mouseleave
$("li.dropdown").mouseleave(function () {
  $(this).find(".dropdown-menu").slideUp("fast");
  $(this).removeClass("open");
});

// Navbar toggle
$(".navbar-toggle").click(function () {
  $(".navbar-collapse").toggleClass("collapse").slideToggle("fast");
});

// Navbar colors
$("#nav-colors > .btn").click(function () {
  if ($(this).is("#pink")) {
    $(".navbar").css("background", "linear-gradient(to right, #ff5858, #f857a6)");
    $(".dropdown-menu").css("background", "#ff5858");
  } else
  if ($(this).is("#red")) {
    $(".navbar").css("background", "linear-gradient(to right, #d31027, #ea384d)");
    $(".dropdown-menu").css("background", "#d31027");
  } else
  if ($(this).is("#purple")) {
    $(".navbar").css("background", "linear-gradient(to right, #41295a, #2f0743)");
    $(".dropdown-menu").css("background", "#41295a");
  } else
  if ($(this).is("#blue")) {
    $(".navbar").css("background", "linear-gradient(to right, #396afc, #2948ff)");
    $(".dropdown-menu").css("background", "#396afc");
  } else
  if ($(this).is("#green")) {
    $(".navbar").css("background", "linear-gradient(to right, #add100, #7b920a)");
    $(".dropdown-menu").css("background", "#add100");
  } else
  if ($(this).is("#yellow")) {
    $(".navbar").css("background", "linear-gradient(to right, #f7971e, #ffd200)");
    $(".dropdown-menu").css("background", "#f7971e");
  } else
  if ($(this).is("#orange")) {
    $(".navbar").css("background", "linear-gradient(to right, #e43a15, #e65245)");
    $(".dropdown-menu").css("background", "#e43a15");
  }
});

// Font colors
$("#font-colors > .btn").click(function () {
  if ($(this).is("#white")) {
    $(".navbar .fa, .link, a").css("color", "white");
    $(".icon-bar").css("background", "white");
  } else
  if ($(this).is("#black")) {
    $(".navbar .fa, .link, a").css("color", "black");
    $(".icon-bar").css("background", "black");
  }
});

// edges
$("#edges > .btn").click(function () {
  if ($(this).is("#rounded")) {
    $(".navbar, .form-control").css("border-radius", "8px");
    if ($(window).width() > 768) {
      $(".dropdown-menu").css({
        "border-bottom-right-radius": "8px",
        "border-bottom-left-radius": "8px" });

    }
  } else
  if ($(this).is("#square")) {
    $(".navbar, .form-control").css("border-radius", "0");
    $(".dropdown-menu").css({
      "border-bottom-right-radius": "0",
      "border-bottom-left-radius": "0" });

  }
});
//# sourceURL=pen.js
    </script>
</body>
</html>