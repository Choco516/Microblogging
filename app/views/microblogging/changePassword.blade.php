@extends('layouts.default3')
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
          width:60%;
          height: auto;
          display: none;
          position: absolute;
          top: 50%; 
          left: 50%; 
          margin-top: -290px; 
          margin-left: -400px;
          color: white;
      }
      h1 {font-family: "Rockwell", serif;font-weight: bold;font-size: 100pt;
      }
    </style>

<div class="panel">
            <form action="changePassword" method="post" accept-charset="utf-8" class="form" role="form">   
              <legend><strong style="color:white;">Remaking your password</strong></legend>
                    <label style="color:white">Email</label>
                    <input type="email" name="email"  id="email" value="" class="form-control input-sm" placeholder="Write your Email" required />

                    <label style="color:white">Password</label>
                    <input type="password" name="password" id="password" value="" class="form-control input-sm" placeholder="Write your new password" required />
                    
                    <label style="color:white">Password Confirmation </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" value="" class="form-control input-sm" placeholder="Confirm your new password" required/>
                    <br />
                 <div style="text-align: center;">
               		<input class="btn btn-sm btn-primary signup-btn" type="submit" value="Reset my password">
               		<a href='/' type='button'class='btn btn-sm btn-danger signup-btn'>Cancel this operation</a>
               </div>
            </form>
</div>