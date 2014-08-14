<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
      <title>Microblogging</title>
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
  {{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
  {{ HTML::style('assets/css/timeline.css', array('media' => 'screen')) }}
  {{ HTML::style('assets/css/menu2.css', array('media' => 'screen')) }}
  {{ HTML::style('assets/css/profile.css', array('media' => 'screen')) }}
  {{HTML::script('js/jquery.js');}}
  {{HTML::script('js/contacts.js');}}
</head>
<body>
 <style type="text/css"> 
      body{ 
      background-image: url('images/microblogging.gif'); no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
          } 

    </style>

    <ul class="nav navbar-default navbar-static-top nav-justified navbar-fixed-top navbar-inverse" role="navigation">
    <li id="home" class="home"><a href="/microblogging" class="flip"><span class="glyphicon glyphicon-home"></span> Home</a></li>
    <li id="profile" class="profile"><a href="/profile" class="flip"> <span class="glyphicon glyphicon-user"></span> Profile</a></li>
    <li id="people" class="people"><a href="/people" class="flip"><span class="glyphicon glyphicon-globe"></span> People</a></li>
    <li id="search" class="search">
    <form  action="hashtags" method="post" accept-charset="utf-8" role="form">
    <input type="text" class="input-large search-query" placeholder="Search hashtag" style="width:550px;  margin-left: 15px;" name="hashtag">
    <button type="submit" class="btn-small"><span class="glyphicon glyphicon-search"></span></button>
    </form>
    </li>
    <li id="requests" class="requests"><a href="/requests" class="flip"><span class="glyphicon glyphicon-bell"></span> Requests</a></li>
    <li id="lockedUsers" class="lockedUsers"><a href="/lockedUsers" class="flip"><span class="glyphicon glyphicon-ban-circle"></span> Blocked</a></li>
    <li id="logout" class="logout"><a href="/logout" class="flip"><span class="glyphicon glyphicon-log-out"></span> Exit</a></li>
    </ul>
</body>
</html>
