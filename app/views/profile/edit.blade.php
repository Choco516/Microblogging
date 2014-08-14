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
          padding: 10px;
          background-color: rgba(7, 3, 3, 0.27);
          border: solid 1px #fff;
          width:75.9%;
          height: auto;
          display: none;
          position: absolute;
          top: 50%; 
          left: 50%; 
          margin-top: -290px; 
          margin-left: -501px;
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
              echo"<div class='panel-body'>";
                echo"<div class='row'>";
                  echo"<div class=' col-md-11 col-lg-11 ' > ";
                  echo"<div class='row'";
    echo"<div class='col-md-4 col-md-offset-4' >";
      echo"<form class='form-horizontal' action='update' method='post' enctype='multipart/form-data'role='form'>";
      echo"<fieldset>";

          echo"<!-- Form Name -->";
          echo"<legend style='color:white'><strong>Your information</strong></legend>";
          echo"<!-- Text input-->";
          echo"<div class='form-group'>";
            echo"<label class='col-sm-2 control-label' for='textinput'>Name</label>";
            echo"<div class='col-sm-4'>";
              echo"<input type='text' name='nombre' value='$row->nombre' class='form-control'>";
            echo"</div>";

            echo"<label class='col-sm-2 control-label' for='textinput'>Middle Name</label>";
            echo"<div class='col-sm-4'>";
              echo"<input type='text' name='apellido' value='$row->apellido'  class='form-control'>";
            echo"</div>";
          echo"</div>";

          echo"<!-- Text input-->";
          echo"<div class='form-group'>";
            
            echo"<div class='col-sm-4'>";
              echo"<input  type='hidden' name='alias' value='$row->alias' class='form-control' >";
            echo"</div>";
          echo"</div>";

          echo"<!-- Text input-->";
          echo"<div class='form-group'>";
            echo"<label class='col-sm-2 control-label' for='textinput'>Home Address</label>";
            echo"<div class='col-sm-10'>";
              echo"<input type='text' name='direccion' value='$row->direccion' class='form-control'>";
            echo"</div>";
          echo"</div>";

          echo"<!-- Text input-->";
          echo"<div class='form-group'>";
            

            echo"<label class='col-sm-2 control-label' for='textinput'>Phone Number</label>";
            echo"<div class='col-sm-4'>";
              echo"<input type='text' name='telefono' value='$row->telefono'  class='form-control'>";
            echo"</div>";
          echo"</div>";



          echo"<!-- Text input-->";
          echo"<div class='form-group'>";
            echo"<label class='col-sm-2 control-label' for='textinput'>Biography</label>";
            echo"<div class='col-sm-10'>";
            echo"<textarea class='form-control textarea' name='biografia'>$row->biografia</textarea>";
            echo"</div>";
          echo"</div>";

          echo"<div class='col-md-12 col-lg-12' align='center'> ";
                    echo"<img alt='User Pic' src='images/$row->avatar' class='circular2'> ";
                    echo"<input id='filename' name='avatar' type='file'/>";
                  echo"</div>";
    echo"</div><!-- /.col-lg-12 -->";
echo"</div><!-- /.row -->";
                  echo"</div>";
                echo"</div>";
                echo"<div class='panel-footer' style='background-color: #3355FE;'>";
                        echo"<input type='submit' value='Save changes' <a  type='submit' class='btn btn-sm btn-success'><i class='glyphicon glyphicon-edit'></i></a>";
                        echo"<span class='pull-right'>";
                            echo"<i class='glyphicon glyphicon-remove'></i><a href='profile' type='button'class='btn btn-sm btn-danger'>Discard changes</a>";
                        echo"</span>";
                  echo"</div>";
              echo"</div>";
              echo"</fieldset>";
                 echo"</form>";

                }
                ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#profile').removeClass("profile");
        $('#profile').addClass("active");
    });
</script>