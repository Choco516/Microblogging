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
          text-align: center;
          padding: 5px;
          background-color: rgba(7, 3, 3, 0.27);
          border: solid 1px #fff;
          width:75%;
          height: auto;
          display: none;
          position: absolute;
          top: 50%; 
          left: 50%; 
          margin-top: -140px; 
          margin-left: -490px;
          color: white;
      }
      h1 {font-family: "Rockwell", serif;font-weight: bold;font-size: 50pt;
      }
    </style>
    <br>
    <br>
    <br>
    <form action='hum' method='post' enctype='multipart/form-data'role='form'>
            <input name="fecha" type="hidden" id="fecha" value="<?php echo date("Y/m/d"); ?>" size="10" />
            <label style=" margin-left: 335px; color:white" > Make a hum, and share with your friends <span class="glyphicon glyphicon-pencil"></span> </label>
            <div class="controls">
              <textarea id="message" class="textarea" name="mensage" placeholder="Write your hum" style="width:550px;  margin-left: 345px;" required></textarea>
              </div>
              <div class="controls">
              <button id="contact-submit" type="submit" class="btn btn-primary input-medium" style="margin-left: 735px; width:150px;">Hum</button>
              </div>
    </form>
    

  <div class="panel">
        <h1 id="timeline" >HUMS</h1>
        <hr>
    <ul class="timeline">
        <?php
        $estado=0;
              foreach ($comentarios as $row) {
              if($estado==0){
                if($row->alias==Auth::user()->usrs_alias){
                  echo"<li>";
                  echo "<div class='timeline-badge'><i class='glyphicon glyphicon glyphicon glyphicon-chevron-down'></i></div>";
                  echo"<div class='timeline-panel'>";
                  echo"<div class='timeline-heading'>";
                  echo"<img class='circular' src='images/$row->avatar'/>";
                  echo"<br>";
                  echo"<h4 class='timeline-title'>$row->alias</h4>";
                  echo"</div>";
                  echo"<div class='timeline-body'>";
                  echo"<p>$row->commentario</p>";
                  echo"</div>";
                  echo"<p><small class='text-muted'><i class='glyphicon glyphicon-time'></i>$row->fecha</small></p>";
                  echo"<hr>";
                  echo"<form action='deletecomment' method='post' enctype='multipart/form-data'role='form'>";
                  echo"<input name='comment' type='hidden' value='$row->commentario'/>";
                  echo"<div class='action'>";
                  echo"<button type='submit' class='btn btn-danger btn-sm ' title='Delete Comment'>";
                  echo"<span class='glyphicon glyphicon-remove-circle'> Delete comment</span>";
                  echo"</button>";
                  echo"</form>";
                  echo"</div>";
                  echo"</div>";
                  echo"</li>";
                  $estado=1;
                }else{
                  echo"<li>";
                  echo "<div class='timeline-badge'><i class='glyphicon glyphicon glyphicon glyphicon-chevron-down'></i></div>";
                  echo"<div class='timeline-panel'>";
                  echo"<div class='timeline-heading'>";
                  echo"<img class='circular' src='images/$row->avatar'/>";
                  echo"<br>";
                  echo"<h4 class='timeline-title'>$row->alias</h4>";
                  echo"</div>";
                  echo"<div class='timeline-body'>";
                  echo"<p>$row->commentario</p>";
                  echo"</div>";
                  echo"<p><small class='text-muted'><i class='glyphicon glyphicon-time'></i>$row->fecha</small></p>";
                  echo"<hr>";
                  echo"<form action='unfollow' method='post' enctype='multipart/form-data'role='form'>";
                  echo"<input name='aliasDest' type='hidden' value='$row->alias'/>";
                  echo"<div class='action'>";
                  echo"<button type='submit' class='btn btn-danger btn-sm' title='unfollow'>";
                  echo"<span class='glyphicon glyphicon-remove-circle'> unfollow</span>";
                  echo"</button>";
                  echo"</form>";
                  echo"<br>";
                  echo"<br>";
                  echo"<form action='blockade' method='post' enctype='multipart/form-data'role='form'>";
                  echo"<input name='aliasDest' type='hidden' value='$row->alias'/>";
                  echo"<button type='submit' class='btn btn-warning btn-sm' title='blockade'>";
                  echo"<span class='glyphicon glyphicon-ban-circle'> blockade</span>";
                  echo"</button>";
                  echo"</form>";
                  echo"</div>";
                  echo"</div>";
                  echo"</li>";
                $estado=1;
                }
              }else{
                if($row->alias==Auth::user()->usrs_alias){
                  echo"<li class='timeline-inverted'>";
                echo"<div class='timeline-badge' ><i class='glyphicon glyphicon glyphicon-chevron-down'></i></div>";
                echo"<div class='timeline-panel'>";
                echo"<div class='timeline-heading'>";
                echo"<img class='circular' src='images/$row->avatar'/>";
                echo"<br>";
                echo"<input name='alias' type='hidden' value='$row->alias'/>";
                echo"<h4 class='timeline-title'>$row->alias</h4>";
                echo"</div>";
                echo"<div class='timeline-body'>";
                echo"<p>$row->commentario</p>";
                echo"</div>";
                echo"<p><small class='text-muted'><i class='glyphicon glyphicon-time'></i>$row->fecha</small></p>";
                echo"<hr>";
                echo"<form action='deletecomment' method='post' enctype='multipart/form-data'role='form'>";
                  echo"<input name='comment' type='hidden' value='$row->commentario'/>";
                  echo"<div class='action'>";
                  echo"<button type='submit' class='btn btn-danger btn-sm' title='Delete Comment'>";
                  echo"<span class='glyphicon glyphicon-remove-circle'> Delete comment</span>";
                  echo"</button>";
                  echo"</form>";
                echo"</div>";
                echo"</div>";
                echo"</li>";
                $estado=0;
                }else{
                  echo"<li class='timeline-inverted'>";
                echo"<div class='timeline-badge' ><i class='glyphicon glyphicon glyphicon-chevron-down'></i></div>";
                echo"<div class='timeline-panel'>";
                echo"<div class='timeline-heading'>";
                echo"<img class='circular' src='images/$row->avatar'/>";
                echo"<br>";
                echo"<input name='alias' type='hidden' value='$row->alias'/>";
                echo"<h4 class='timeline-title'>$row->alias</h4>";
                echo"</div>";
                echo"<div class='timeline-body'>";
                echo"<p>$row->commentario</p>";
                echo"</div>";
                echo"<p><small class='text-muted'><i class='glyphicon glyphicon-time'></i>$row->fecha</small></p>";
                echo"<hr>";
                echo"<form action='unfollow' method='post' enctype='multipart/form-data'role='form'>";
                echo"<input name='aliasDest' type='hidden' value='$row->alias'/>";
                echo"<div class='action'>";
                echo"<button type='submit' class='btn btn-danger btn-sm' title='unfollow'>";
                echo"<span class='glyphicon glyphicon-remove-circle'> unfollow</span>";
                echo"</button>";
                echo"</form>";
                echo"<br>";
                echo"<br>";
                echo"<form action='blockade' method='post' enctype='multipart/form-data'role='form'>";
                echo"<input name='aliasDest' type='hidden' value='$row->alias'/>";
                echo"<button type='submit' class='btn btn-warning btn-sm' title='blockade'>";
                echo"<span class='glyphicon glyphicon-ban-circle'> blockade</span>";
                echo"</button>";
                echo"</form>";
                echo"</div>";
                echo"</div>";
                echo"</li>";
                $estado=0;
                }
              }
                
              }
        ?>
<a id="back-to-top" href="" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#home').removeClass("home");
        $('#home').addClass("active");
    });
</script>
