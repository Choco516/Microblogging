@extends('layouts.default3')
<script type="text/javascript"
    src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="js/functions.js"></script>
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
            <form action="register" method="post" accept-charset="utf-8" class="form" role="form">   
              <legend><strong style="color:white;">Registering your account</strong></legend>
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <label  style="color:white">First name</label>
                            <input type="text" name="firstname" id="firstname" value="" class="form-control input-sm" placeholder="Write your first Name" required />                        
                          </div>
                        <div class="col-xs-6 col-md-6">
                            <label style="color:white">Last name</label>
                            <input type="text" name="lastname" id="lastname" value="" class="form-control input-sm" placeholder="Write your last Name" required />                       
                             </div>
                    </div>
                    
                    <label style="color:white">Email</label>
                    <input type="email" name="email"  id="email" value="" class="form-control input-sm" placeholder="Write your Email" required />
                    
                    <label style="color:white">Alias</label>
                    <input type="text" name="alias" id="alias" value="" class="form-control input-sm" placeholder="Write a '@' before your nickname @example" required />
                    
                    <label style="color:white">Telephone</label>
                    <input type="text" name="telephone" id="telephone" value="" class="form-control input-sm" placeholder="Write your telephone number" required/>
                    
                    <label style="color:white">Direction</label>
                    <input type="text" name="direction" id="direction" value="" class="form-control input-sm" placeholder="Write your direction"required />
                   
                    <label style="color:white">Biography</label>
                    <input type="text" name="biography" id="biography" value="" class="form-control input-sm" placeholder="Write your biography" required/>
                    
                    <label style="color:white">Password</label>
                    <input type="password" name="password" id="password" value="" class="form-control input-sm" placeholder="Write your password" required />
                    
                    <label style="color:white">Password Confirmation </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" value="" class="form-control input-sm" placeholder="Confirm your password" required/>
                    <div class="row">                        
                    </div>
                    <br />
                    <div style="text-align: center;">
               <input class="btn btn-sm btn-primary signup-btn" type="submit" value="Create my account">
               <a href='/' type='button'class='btn btn-sm btn-danger signup-btn'>Cancel this operation</a>
               </div>
            </form>
          </div>

</div>