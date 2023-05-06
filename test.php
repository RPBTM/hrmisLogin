<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <base target="_top">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('/css/css.css');?>"/> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/login/css/css.css');?>"/>
    <!-- <link href="<?php echo base_url('/assets/login/html/Header.html');?>"/> -->
    

<style>
  a:hover {
    text-decoration:underline;
  }
#passMsg_a {
  animation: blinker2 0.6s cubic-bezier(1, 0, 0, 1) infinite alternate;  
  }
@keyframes blinker2 { to { opacity: 0; } 
  }
.input-field label{
  color:#000000;
}
.input-field input:focus + label {
  @extend color: #26a69a;
  font-weight:bold;
}
#passreset_div, #maindiv{
  margin-top:60px;
}
#btn_close_modal_init {
  position: absolute;
  top: 10px;
  right: 10px;
  display:block;
  box-sizing:border-box;
  width:20px;
  height:20px;
  border-width:3px;
  border-style: solid;
  border-color:#e60000;
  border-radius:100%;
  background: -webkit-linear-gradient(-45deg, transparent 0%, transparent 46%, white 46%,  white 56%,transparent 56%, transparent 100%), -webkit-linear-gradient(45deg, transparent 0%, transparent 46%, white 46%,  white 56%,transparent 56%, transparent 100%);
  background-color:red;
  box-shadow:0px 0px 5px 2px rgba(0,0,0,0.5);
  transition: all 0.3s ease;
  opacity: 0.5;
}

#btn_close_modal_init:hover {
  opacity: 01;
}
.modal {
//  background-color : #ffffff;
 // opacity:1;
  z-index:1000;
}
#maindiv {
  z-index:1;
}
.FAQ_close * {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
.FAQ_close {
  background: transparent;
  font-family: Helvetica, Arial, sans-serif; 
  position: relative;
  top: -20px;
  width: 35px;
}

.outer {
  position: relative;
  margin: auto;
  width: 30px;
  margin-top: 0;
  margin-right: 0;
  cursor: pointer;
}

.inner {
  width: inherit;
  text-align: center;
}

.inner label { 
  font-size: .6em; 
  line-height: 3em;
  text-transform: uppercase;
  color: #0033cc;
  transition: all .3s ease-in;
  opacity: 0;
  cursor: pointer;
}

.inner:before, .inner:after {
  position: absolute;
  content: '';
  height: 1px;
  width: inherit;
  background: #ff0729;
  left: 0;
  transition: all .3s ease-in;
}

.inner:before {
  top: 50%; 
  transform: rotate(45deg);  
}

.inner:after {  
  bottom: 50%;
  transform: rotate(-45deg);  
}

.outer:hover label {
  opacity: 1;
}

.outer:hover .inner:before,
.outer:hover .inner:after {
  transform: rotate(0);
}

.outer:hover .inner:before {
  top: 0;
}

.outer:hover .inner:after {
  bottom: 0;
}

::-webkit-scrollbar {
  width: 7px;
}
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
::-webkit-scrollbar-thumb {
  background: #888; 
}
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
#modal_FAQ  {
  overflow:hidden;
}
#modal_FAQ .modal-body {
  max-height:300px;
  overflow-y:scroll;
}
#modal_FAQ td {
  padding:5px;
}
#modal_FAQ a {
  cursor: pointer;
}

</style> 



   
</head>

<body onload="runOnLoad()">

<div class="row lastrow">
<!-- <?!= includenew('Header'); ?>  -->
<?php include(APPPATH.'views/header.php'); ?>
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

 <?!= includenew('js'); ?>

<script>
  $(document).ready(function(){
//Modal functions(open/close)
    $('.modal').modal();
//    $('#messageBox').modal({endingTop: '180px'});

    //togglePW();
    processFAQs();
  });

function runOnLoad(){
  //Show info(error) messeges on open
    google.script.url.getLocation(function(location) {
    var paraV = (location.parameters["v"]);
    var paraP = (location.parameters["p"]);

    if(paraP!=null){
   //   $('#init_modal').modal({dismissible: false });
      $('#init_modal').modal('open');
      document.getElementById('modal_body_p1').innerHTML = "Your password reset request is either expired or invalid. <br> Please login or initiate the password reset process again."
    }else
    if(paraV!=null){
   //   $('#init_modal').modal({dismissible: false });
      $('#init_modal').modal('open');
      document.getElementById('modal_body_p1').innerHTML = "Your new user registration request is either expired or invalid. <br> Please login with your password."

    }
  });
}
 var secID = null;

 function resetUser(e){
    e.preventDefault();             
    
$("#messageBox").show('fast');
$('#messageBox').modal('open');
document.getElementById('loaderId').style.display="block";
document.getElementById('messageBody').innerHTML=""; 
document.getElementById('messageFooter').innerHTML="";
document.getElementById('messageHeader').innerHTML="Processing..."; 

    var uName = $("#username_reset").val().toUpperCase();
   google.script.run.withSuccessHandler(function(text) {  
                M.toast({
                   html: text
               });
    
      if (text == 'Reset Link sent') {      
    document.getElementById('r_title_span1').style.display="none";
    document.getElementById('r_title_span2').style.display="block";
    $('#messageBox').modal('close');
  //  main.style.display="block";
  //  reset.style.display='none';    
    document.getElementById("formMain").reset();
    document.getElementById("formReset").reset();
       }  else
       if ( text=='Error...!' ){
        $('#messageBox').modal('open');
        document.getElementById('loaderId').style.display="none";
        document.getElementById('messageBody').innerHTML=""; 
        document.getElementById('messageFooter').innerHTML=""; 
        document.getElementById('messageHeader').innerHTML="<h4 style='color:red;'>-ERROR-</h4>";

        setTimeout(function(){ 
          $('#messageBox').modal('close');
            document.getElementById("formMain").reset();
            document.getElementById("formReset").reset(); }, 5000); 
        }else
        if (text=='Error-Not a Registered user...!'){
        $('#messageBox').modal('open');
        document.getElementById('loaderId').style.display="none";
        document.getElementById('messageBody').innerHTML=""; 
        document.getElementById('messageFooter').innerHTML="<span class='center-align' style='color:red;'>You need to register in the system to reset password...!<br>Please log in the system with your provided password first.</span>"; 
        document.getElementById('messageHeader').innerHTML="<h4 style='color:red;'>-ERROR-</h4>"; 

            document.getElementById("formMain").reset();
            document.getElementById("formReset").reset(); 
        }
        else
        if (text=='Error-No valid email address...!'){
        $('#messageBox').modal('open');
        document.getElementById('loaderId').style.display="none";
        document.getElementById('messageBody').innerHTML=""; 
        document.getElementById('messageFooter').innerHTML="<span class='center-align' style='color:red;'>No valid email address is found for this user...!<br>Please contact system administrator for further assistance.</span>"; 
        document.getElementById('messageHeader').innerHTML="<h4 style='color:red;'>-ERROR-</h4>"; 

            document.getElementById("formMain").reset();
            document.getElementById("formReset").reset(); 
        }
              
      }).resetFirst(uName);

 }

function validateUser(e) {
  
e.preventDefault();          
$("#messageBox").show('fast');
$('#messageBox').modal({dismissible: false }); 
$('#messageBox').modal('open');
document.getElementById('loaderId').style.display="block";
document.getElementById('messageBody').innerHTML=""; 
document.getElementById('messageFooter').innerHTML="";
document.getElementById('messageHeader').innerHTML="Processing..."; 

  var userName1 = $("#username").val();
  var userName = userName1.toUpperCase();
  var passcodeProper = $("#passwordLogin").val();
  // var pasccodeNICLower = passcodeNIC.toLowerCase();
  $("button").attr("disabled", "disabled");
google.script.run.withSuccessHandler(function(text) {
     // console.log(text);
      M.toast({
          html: text["msg"]
      });
      console.log(text);
if (text["msg"] == "Logging you in!") {
    $("#formMain").hide("fast"); 
    $("#regUser").hide("fast"); 
    $('#messageBox').modal({dismissible: false }); 
    $('#messageBox').modal('open');
    document.getElementById('loaderId').style.display="none";
    document.getElementById('messageBody').innerHTML=""; 
    document.getElementById('messageFooter').innerHTML=""; 
    document.getElementById('messageHeader').innerHTML="<h4 style='color:green;'>-LOGIN SUCCESS-</h4>"; 
    document.getElementById('messageBody').innerHTML="Redirecting...  Please wait."; 
    document.getElementById('messageFooter').innerHTML="<h5>If not redirect please click <a href="+text[`url`]+" target='_top' > Here! </a></h5>";  

    window.open(text['url'],'_top');
}
   else  if (text["msg"] == "Incorrect passcode !"){ 
    $('#messageBox').modal('close');
    $('#messageBox').modal({dismissible: true });
    $('#messageBox').modal('open');
    document.getElementById('loaderId').style.display="none";
    document.getElementById('messageBody').innerHTML=""; 
    document.getElementById('messageFooter').innerHTML=""; 
    document.getElementById('messageHeader').innerHTML="<h4 style='color:red;'>-LOGIN ERROR-</h4>"; 
    document.getElementById('messageBody').innerHTML="Entered Username and Password is not matching with database records.<br>Please re-check and try again."; 
    document.getElementById('messageFooter').innerHTML="Please contact System Admin for further information. Tel: 0112685035";

    document.getElementById("formMain").reset();
}
    else  if (text["msg"] == 'Need user registration !'){ 
//$('#messageBox').modal({dismissible: false });
$('#messageBox').modal('open');
    document.getElementById('loaderId').style.display="none";
    document.getElementById('messageBody').innerHTML=""; 
    document.getElementById('messageFooter').innerHTML=""; 
    document.getElementById('messageHeader').innerHTML="<h4 style='color:green;'>-WELCOME NEW USER-</h4>"; 
    document.getElementById('messageBody').innerHTML="<span class='center-align' >You need to register in the system first.</span><br><span class='center-align'>You will be redirected to user registration page...!</span><br>";
    document.getElementById('messageFooter').innerHTML="<h5>If not redirect please click <a href="+text[`url`]+'&v=registration'+" target='_top' > Here! </a></h5>";
      //console.log(window.open(text['url']+"&v=registration"));
    window.open(text["url"]+"&v=registration","_top");
}

  $("button").removeAttr("disabled");
                
  }).validateUser1(userName,passcodeProper);
      
}


function showDiv(){
document.getElementById('formMain').style.display = "block";
document.getElementById('regUser').style.display = "none";
document.getElementById('passMsg_2').style.display = "none";
}        

function showhideDiv(){
  var reset = document.getElementById('passreset_div');
  var main = document.getElementById('maindiv');
  if(reset.style.display==='none'){
    main.style.display="none";
    reset.style.display="block";
  }
 /* if(main.style.display==='block')*/
 else {
    main.style.display="block";
    reset.style.display='none';    
  }
}

function hideNdisplay(){
    document.getElementById('r_title_span1').style.display="block";
    document.getElementById('r_title_span2').style.display="none";
}

//Function to show/hide password
 var clicked = 0;
  $(".toggle-password").click(function (e) {
     e.preventDefault();

    $(this).toggleClass("toggle-password");
      if (clicked == 0) {
        $(this).html('<span class="material-icons eyeclose teal-text">visibility_off</span >');
         clicked = 1;
      } else {
         $(this).html('<span class="material-icons eyeopen">visibility</span >');
          clicked = 0;
       }

    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
       input.attr("type", "text");
    } else {
       input.attr("type", "password");
    }
});     

//Function to show FAQ modal
function showFAQ(){
    $('#modal_FAQ').modal('open');  
}

//Function to get FAQs
function processFAQs(){
  var AllFAQs =  JSON.parse('<?!= FAQs;?>');
  for(var i in AllFAQs){
  var num = (parseInt(i) +1);  
  var tbody = "";
    tbody += "<tr><td><i class='material-icons'> help_outline</i> </td>";
    tbody += "<td><a onclick=\"openGuide('"+AllFAQs[i][2]+"')\">"+num+".  "+AllFAQs[i][1]+"</a></td></tr>";

    document.getElementById('faq_tble_body').innerHTML += tbody;
  }
}
//Function to open guides
function openGuide(link){
  window.open(link, "_blank", "location=no,menubar=no,titlebar=no,toolbar=no,scrollbars=no,resizable=yes,top=100,left=100,width=900,height=800");
}
</script>

</body>
</html>


