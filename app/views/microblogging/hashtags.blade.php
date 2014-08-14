@extends('layouts.default4')

<script type="text/javascript"
    src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
                $(".panel").fadeIn('slow');
        });
    </script>

<style type="text/css">

        div.panel,p.flip {
          padding: 10px;
          background-color: rgba(7, 3, 3, 0.27);
          border: solid 1px #fff;
          width:63%;
          height: auto;
          display: none;
          position: absolute;
          top: 50%; 
          left: 50%; 
          margin-top: -250px; 
          margin-left: -415px;
          color: white;
      }
      h1 {font-family: "Rockwell", serif;font-weight: bold;font-size: 100pt;
      }
    </style>

<div class='panel'>
         <div class='panel-heading c-list'>
                    <span class='title'>Results... <i class='glyphicon glyphicon-thumbs-up'></i></span>
                    <hr>
                </div>
                <ul class='list-group' id='contact-list' >
<?php

    foreach ($hashtagSearched as $row) {
                        echo"<li class='list-group-item'>";
                        echo"<div class='col-xs-12 col-sm-9'>";
                        echo"<span class='name'>$row->alias</span><br/>";
                        echo"<p>$row->commentario</p>";
                        echo"<p><small class='text-muted'><i class='glyphicon glyphicon-time'></i>$row->fecha</small></p>";
                        echo"</div>";
                        echo"<div class='clearfix'></div>";
                        echo"</li>";
    }
?>
    </ul>
   </div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#home').removeClass("home");
        $('#home').addClass("active");
    });
</script>