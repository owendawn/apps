<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'register';
?>
<style>

    body {
        background-color: #eee;
    }

    .register-container {
        display: none;
        position: relative;
        margin-top: 8%;
        margin-bottom: 107.906px;
        max-width: 350px;
    }

    .register-container .registerbox {
        position: relative;
        width: 350px !important;
        padding: 0;
        -webkit-box-shadow: 0 0 14px rgba(0, 0, 0, .1);
        -moz-box-shadow: 0 0 14px rgba(0, 0, 0, .1);
        box-shadow: 0 0 14px rgba(0, 0, 0, .1);
        padding-bottom: 80px;
    }

    .register-container .registerbox .registerbox-title {
        position: relative;
        text-align: left;
        width: 100%;
        height: 35px;
        padding: 20px 20px 0;
        font-family: 'Lucida Sans', 'trebuchet MS', Arial, Helvetica;
        font-size: 18px;
        text-transform: uppercase;
        font-weight: normal;
        color: #444;
    }

    .register-container .registerbox .registerbox-caption {
        font-size: 14px;
        font-weight: 500;
        color: #a9a9a9;
        padding: 15px 20px 0;
    }

    .register-container .registerbox .registerbox-textbox {
        padding: 10px 20px;
    }

    .register-container .registerbox .registerbox-textbox .form-control {
        -webkit-border-radius: 3px !important;
        -webkit-background-clip: padding-box !important;
        -moz-border-radius: 3px !important;
        -moz-background-clip: padding !important;
        border-radius: 3px !important;
        background-clip: padding-box !important;
    }

    input[type="text"] {
        font-family: 'Open Sans', 'Segoe UI';
        font-size: 13px;
        font-stretch: normal;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        color: rgb(133, 133, 133);
    }

    .checkbox label, .radio label {
        min-height: 20px;
        padding-left: 20px;
        margin-bottom: 0;
        font-weight: 400;
        cursor: pointer;
    }

    .radio label, .checkbox label {
        padding-left: 20px;
        margin-bottom: 0;
        font-weight: 400;
        cursor: pointer;
    }

    input[type=checkbox]:checked, input[type=radio]:checked, input[type=checkbox]:focus, input[type=radio]:focus {
        outline: none !important;
    }

    .btn-primary, .btn-primary:focus {
        background-color: #427fed !important;
        border-color: #427fed;
        color: #fff;
    }

    .register-container .registerbox .registerbox-submit {
        padding: 0 20px;
    }

    .text a {
        font-family: 'Open Sans', 'Segoe UI';
        font-size: 13px;
        font-weight: normal;
    }

    .register-container .logobox {
        width: 350px !important;
        height: 50px !important;
        padding: 5px;
        margin-top: 15px;
        -webkit-box-shadow: 0 0 14px rgba(0, 0, 0, .1);
        -moz-box-shadow: 0 0 14px rgba(0, 0, 0, .1);
        box-shadow: 0 0 14px rgba(0, 0, 0, .1);
        background-color: #fff;
        text-align: left;
    }

</style>
<div class="register-container animated fadeInDown col-md-3 col-sm-offset-4">
    <div class="registerbox bg-white">
        <div class="registerbox-title">Register</div>
        <div class="registerbox-caption ">Please fill in your <span>personal</span> information</div>
        <div class="registerbox-textbox">
            <span style="margin-left:-100px;position:absolute;right:30px;z-index:9;color: silver;line-height: 27pt;font-size: 11pt;">
                <i id="usernamealert" class="glyphicon glyphicon-zoom-in"></i>
            </span>
            <input type="text" class="form-control" placeholder="username" name="username"/>
        </div>
        <div class="registerbox-textbox">
            <input type="password" class="form-control" placeholder="password" name="pwd"/>
        </div>
        <div class="registerbox-textbox">
            <input type="password" class="form-control" placeholder="password confirm" name="pwdcheck"/>
        </div>
        <div class="registerbox-submit">
            <input type="button" class="btn btn-primary pull-right" value="Register" id="subbtn">
        </div>
    </div>
    <div class="logobox">
    </div>
</div>
</body>

<script src="/apps/views/site/register.js"></script>
<script>
    $(".register-container").fadeIn(1000);
    document.getElementById("menudiv").style.display = "none";
</script>