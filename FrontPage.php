<!DOCTYPE html>
<html>

<head>

    <?php include(APPPATH.'views/login/admin/CryptoJsAes.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <base target="_top">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">

    <script src="<?php echo base_url('/assets/CryptoJS/AES.js');?>"></script>


<?php include(APPPATH.'views/login/admin/css.html'); ?>
<?php include(APPPATH.'views/login/admin/css-inline.html'); ?>
    


   
</head>

<body onload="runOnLoad()">

<div class="row lastrow">
<!-- <?!= includenew('Header'); ?>  -->
<?php include(APPPATH.'views/login/admin/header.php'); ?>
</div>


<!--Initial error modal -->
<div id="init_modal" class="modal">  
  <div class="modal-content">
    <div class="modal-header right-align">
     <button id="btn_close_modal_init" type="button" class="modal-close"></button>
    </div>
    <div id="mbody1" class="modal-body center-align">
      <p id="modal_body_p1" class="blue-text "></p>
      </div>
  </div>
</div>

  <div id="messageBox" class="modal" style="margin-top:8%;">  
  <div class="modal-dialog  modal-sm"  >
  <div class="modal-content">
    <div id="mheaderId" class="modal-header center-align">
    <!--<div>
     <button id="btn_close_modal_init" type="button" class="modal-close"></button>
    </div> -->
    <div style="margin:auto; padding-top:20px;">
      <div id="loaderId" class="loader1";></div><br>
      <div><h4 id="messageHeader"></h4></div>
    </div>
    </div>
    <div id="mbodyId" class="modal-body">
      <p id="messageBody"></p>
      </div>
    <div id="mfooterId" >
      <p id="messageFooter"></p>
    </div>
  </div>
  </div>
</div>

<!-- FAQ modal -->

<div id="modal_FAQ" class="modal fade " role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <div class="FAQ_close right">
          <div class="outer modal-close">
            <div class="inner">
              <label>Back</label>
            </div>
          </div>
        </div>
        <h5 class="modal-title grey-text text-darken-4">Frequently Asked Questions (FAQs)</h5>
        <!-- <i class="material-icons"> help_outline</i> -->
      </div>
      <div class="modal-body">    
        <table id="faq_tbl">
          <thead>
            <tr>
              <th class="col-1">
              </th>
              <th class="col-11">
              </th> 
            </tr>
          </thead>
          <tbody id="faq_tble_body">
          </tbody>
        </table>

      </div>
     
    </div>

  </div>
</div>
<!-- End of FAQ modal -->
<div id="page_main_body">
<div id= "maindiv" class=" col s12  m6 l4 offset-m3 offset-l4 center "  >

<form onsubmit="validateUser(event)"  class="col s12  m6 l4 offset-m3 offset-l4" id="formMain" autocomplete="off">
              <div class="row">
                <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
    <input id="username" type="text" class = "center"  style='text-transform:uppercase;'  title="Enter your provided username"  required>
                    <label  for="username">  User Name</label>
                </div>
              </div>
            <div class="row">
                <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                    
                    <input id="passwordLogin" type="password"  class = "center form-control" required>
                    <label for="passwordLogin">  Password</label>
      <span id="eye_span" toggle="#passwordLogin" class="field-icon toggle-password"><span class="material-icons eyeopen ">visibility</span></span>
                </div>
            </div>
            <div class="row lastrow firstrow" id="login_btn" >
                <div class="col s12 m6 center l4 offset-m3 offset-l4">
                    <button class="waves-light btn" type="submit" >Login</button> 
                    <br><br>
              </div>                  
          </div>  
          <div class="row lastrow firstrow">
            <a style="font-size:10pt;cursor:pointer;"  onclick="showhideDiv();">I forgot my Password </a>
          </div>

          <div class="row lastrow firstrow">
            <a style="font-size:10pt;cursor:pointer;"  onclick="redirectTest();">direct to  </a>
          </div>

    </form>
       
    </div>
    
<div id="passreset_div" class=" col s12  m6 l4 offset-m3 offset-l4 center " style="display:none;" >
 
<form onsubmit="resetUser(event)"  class="col s12  m6 l4 offset-m3 offset-l4" id="formReset" >
  <div >
              <div class="row">
                <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
    <input id="username_reset" type="text" class = "center"   title="Enter your provided username"  style='text-transform:uppercase;' onclick="hideNdisplay()" required>
                    <label  for="username_reset">  User Name</label>
                </div>
              </div>
            <div class="row lastrow" id="reset_infodiv"  >
              <p id= "reset_title" class="helper-text offset-m3 offset-l4 green-text text-darken-2" style="font-size: 11pt;">
              <span id="r_title_span1">
                A link to reset your password will be sent to the system registered email address of this user account. </span>
              <span id="r_title_span2" style="display:none;">
                A link to reset your password has been sent to the system registered email address of this user account.<br>
                Please <a href="https://mail.google.com/mail/u/0/#inbox"> log in to that Gmail account</a> and follow instructions. </span>
                  
                </p>
            </div>
            <div class="row" id="reset_btn" >
                <div class="col s12 m6 center l4 offset-m3 offset-l4">
                    <button class="waves-light btn" type="submit" >Submit</button> 
                </div>                  
            </div>  
      </div>
    </form>
      <div class="row" >
        <a style="font-size:10pt;cursor:pointer;"  onclick="showhideDiv();"><<< Back to Login page </a>
      </div>
  </div>

  <div class="row lastrow firstrow center">
    <a class="modal-title" onclick="showFAQ()" style="font-size:10pt;cursor:pointer;" >Frequently Asked Questions <span class="material-icons ">help_outline</span></a>
  </div>
  <div class="row center">
       <p id= "passTitle" class="helper-text offset-m3 offset-l4 green-text text-darken-2" style="font-size: 12pt;">
    <b>Note: </b> It is recommended to use <a href="https://www.google.com/chrome/?brand=BNSD&gclid=Cj0KCQjw_8mHBhClARIsABfFgphnbn7JL09I6UxXxvICUs8Yzk81AKX9Si_K4OYf0y4j_qZqHwedncoaApQlEALw_wcB&gclsrc=aw.ds" target="_blank" title="Download Google Chrome">Google Chrome browser. <span class="material-icons ">download</span></a></p>
  </div>
  </div>

<!-- Script filse-->   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<?php include(APPPATH.'views/login/admin/js.html'); ?>


</body>
</html>


