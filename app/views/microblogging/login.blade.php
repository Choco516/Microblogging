@extends('layouts.default2')
<script type="text/javascript"
    src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
                $(".panel").fadeIn("slow");
        });
    </script>

<div class="Panel">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-7">
                <div class="panel-footer">
                    <span class="glyphicon glyphicon-lock" style="color:white"></span> <strong style="color:white"> Login </strong>
                </div>
                <div class="panel-body">

                    <form action="login" method="post" accept-charset="utf-8" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label" style="color:white">
                            Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label" style="color:white">
                            Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                    </div>
                    
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-success btn-sm" href="login">
                                Sign in</button>
                                 <button type="reset" class="btn btn-default btn-sm">
                                Clean</button>
                                <a  type='button' href='register' class='btn btn-sm btn-primary'> Register</a>
                        </div>
                    </div>

                    <div class="form-group"> 
                        <div class="col-sm-offset-3 col-sm-9">
                            <div class="checkbox">
                                <label style="color:white;"> Forgot you password? <a href="/changePassword
"> click here</a></label>
                            </div> 
                        </div> 
                    </div>
                    </form>

                    <a class="btn btn-block btn-social btn-facebook " href="loginFb">
                        <i class="fa fa-facebook"></i> Sign in with Facebook
                    </a>

                </div>
       
    </div>
</div>
    </div>
</div>

<?php 
    if ($errors->has()) 
    {
        echo $errors->first('email'); 
        echo $errors->first('password');
        echo $errors->first('invalid_credentials');
    }
?>