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
                    <span class='title'><?php echo Auth::user()->usrs_alias; ?>, these are the users that you have blocked... <i class='glyphicon glyphicon-ban-circle'></i></span>
                    <hr>
                </div>
                <ul class='list-group' id='contact-list' >
<?php

    foreach ($usuario as $row) {
                        echo"<li class='list-group-item'>";
                        echo"<div class='col-xs-12 col-sm-3'>";
                            echo"<img class='circular2'r src='images/$row->avatar' />";
                        echo"</div>";
                        echo"<div class='col-xs-12 col-sm-9'>";
                            echo"<span class='name'>$row->nombre $row->apellido</span><br/>";
                            echo"<span class='name'>$row->alias</span><br/>";
                            echo"<span class='glyphicon glyphicon-map-marker text-muted c-info' data-toggle='tooltip' title='$row->direccion'></span>";
                            echo"<span class='visible-xs'> <span class='text-muted'>$row->direccion</span><br/></span>";
                            echo"<span class='glyphicon glyphicon-earphone text-muted c-info' data-toggle='tooltip' title='$row->telefono'></span>";
                            echo"<span class='visible-xs'> <span class='text-muted'>$row->telefono</span><br/></span>";
                            echo"<span class='glyphicon glyphicon-envelope text-muted c-info' data-toggle='tooltip' title='$row->email'></span>";
                            echo"<span class='visible-xs'> <span class='text-muted'>$row->email</span><br/></span>";
                        echo"</div>";
                        echo"<form action='unlock' method='post' enctype='multipart/form-data'role='form'>";
                          echo"<input name='aliasDest' type='hidden' value='$row->alias'/>";
                          echo"<div class='action'>";
                          echo"<button type='submit' class='btn btn-success btn-xs  pull-right'>";
                          echo"unlock <span class='glyphicon glyphicon-ok-circle'>  </span>";
                          echo"</button>";
                          echo"</form>";
                        echo"<div class='clearfix'></div>";
                    echo"</li>";
    }
?>
    </ul>
   </div>



<script type="text/javascript">
    $(document).ready(function () {
        $('#lockedUsers').removeClass("lockedUsers");
        $('#lockedUsers').addClass("active");
    });
</script>