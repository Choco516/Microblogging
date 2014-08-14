@extends('layouts.default')


<script type="text/javascript"
    src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
                $(".panel").fadeIn('slow');
        });
    </script>

<style type="text/css">

        div.panel,p.flip {
          padding: 5px;
          background-color: rgba(7, 3, 3, 0.27);
          border: solid 1px #fff;
          width:75%;
          height: auto;
          display: none;
          position: absolute;
          top: 50%; 
          left: 50%; 
          margin-top: -185px; 
          margin-left: -495px;
          color: white;
      }
      h1 {font-family: "Rockwell", serif;font-weight: bold;font-size: 100pt;
      }
    </style>

<div class="panel">
  <br>
    <br>
    <br>
           <?php
              foreach ($usuario as $row) {
            echo"<form action='deleteUser' method='post' enctype='multipart/form-data'role='form'>";
            echo"<div class='panel-heading'>";
              echo"<h2 class='panel-title'>$row->nombre $row->apellido</h2>";
            echo"</div>";

              echo"<div class='panel-body'>";
                echo"<div class='row'>";
                  echo"<div class='col-md-3 col-lg-3 ' align='center'> ";
                    echo"<img alt='User Pic' src='images/$row->avatar' class='circular2'> ";
                  echo"</div>";
                  echo"<div class=' col-md-9 col-lg-9 '> ";
                    echo"<table class='table table-user-information' style='color:white;'>";
                      echo"<tbody>";
                        echo"<tr>";
                          echo"<td>Nickname</td>";
                          echo"<td>$row->alias</td>";
                        echo"</tr>";
                        echo"<tr>";
                        echo"<tr>";
                          echo"<td>Home Address</td>";
                          echo"<td>$row->direccion</td>";
                        echo"</tr>";
                        echo"<tr>";
                          echo"<td>Email</td>";
                          echo"<td><a href='mailto:$row->email'>$row->email</a></td>";
                        echo"</tr>";
                          echo"<td>Phone Number</td>";
                          echo"<td>$row->telefono </td>";
                        echo"</tr>";
                        echo"<tr>";
                          echo"<td>Biography</td>";
                          echo"<td>$row->biografia</td>";
                        echo"</tr>";
                      echo"</tbody>";
                    echo"</table>";
                  echo"</div>";
                echo"</div>";
              echo"</div>";
                          echo"<div class='panel-footer' style='background-color: #3355FE;'>";
                          echo"<i class='glyphicon glyphicon-edit'></i><a href='/edit' type='button'class='btn btn-sm btn-warning'>Edit your profile</a>";
                        echo"<span class='pull-right'>";
                            
                        echo"<input type='submit' value='Delete Your account' <a  type='submit' class='btn btn-sm btn-danger'><i class='glyphicon glyphicon-trash'></i></a>";
                        echo"</span>";
                  echo"</div>";
                        echo"</form>";
                  echo"</div>";
                }
                ?>

</div>


<script type="text/javascript">
    $(document).ready(function () {
        $('#profile').removeClass("profile");
        $('#profile').addClass("active");
    });

</script>
