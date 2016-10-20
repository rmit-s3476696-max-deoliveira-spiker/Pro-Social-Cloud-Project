<?php 
	session_start();
?>
	
<!DOCTYPE html>
<html class="html" lang="en-US">
 <head>
 <style>
#myProgress {
  position: relative;
  width: 100%;
  height: 30px;
  background-color: #ddd;
}

#myBar {
  position: absolute;
  width: 1%;
  height: 100%;
  background-color: #FFC300;
}
</style>
  <!-- JS includes -->
  <script type="text/javascript">
        function init() {
                //Parameters are APIName,APIVersion,CallBack function,API Root 
				//do not forget to modify the URL below that contain your Project ID
                gapi.client.load('userendpoint', 'v1', null, 'https://pro-soc.appspot.com/_ah/api');
				move(10);
        }
		function move(time) {
								var elem = document.getElementById("myBar");
								var width = 1;
								var id = setInterval(frame, time);
								function frame() {
									if (width >= 100) {
										clearInterval(id);
										//Build the Request Object
										var emailsession = "<?php echo $_SESSION["getUserByEmail"]; ?>";
										var passsession = "<?php echo $_SESSION['getUserByPassword']; ?>";
										var requestData = {};
										requestData.username = emailsession;
										requestData.password = passsession;
										gapi.client.userendpoint.loginUser(requestData).execute(function(resp) {
											if (!resp.code) {   
												if(resp.username == null || resp.name == null || resp.password == null){
													document.getElementById('result').innerHTML = "Invalid username or password!";
													setTimeout(function(){ window.location = "http://pro-soc-client.appspot.com/log-in.php" }, 2000);
												}
												else{
													document.getElementById('result').innerHTML = "Login Success! Directing to user page..";
													document.getElementById('name').innerHTML = "Full Name: " ;
													document.getElementById('username').innerHTML = "User Name: " ;
													document.getElementById('email').innerHTML = "Email: " ;
													document.getElementById('phone').innerHTML = "Phone: " ;
													document.getElementById('rsltName').innerHTML = resp.name ;
													document.getElementById('rsltUserName').innerHTML = resp.username ;
													document.getElementById('rsltEmail').innerHTML = resp.email ;
													document.getElementById('rsltPhone').innerHTML = resp.phone ;
                                                    document.getElementById('resultName').value = resp.name ;
                                                    document.getElementById('resultUserName').value = resp.username ;
                                                    document.getElementById('resultEmail').value = resp.email ;
                                                    document.getElementById('resultPhone').value = resp.phone ;
													setTimeout(function(){ document.formdata.submit(); }, 2000);
													//setTimeout(function(){ window.location = "http://pro-soc-client.appspot.com/user.php" }, 2000);
												}		
											}
										});   
									} else {
										width++;
										elem.style.width = width + '%';
									}
								}
							}
      </script>
    <script src="https://apis.google.com/js/client.js?onload=init"></script>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2015.0.2.310"/>
  <title>Loading..</title>
  <link rel="shortcut icon" href="images/titlePS.png">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?4052507572"/>
  <link rel="stylesheet" type="text/css" href="css/log-in.css?4208358011" id="pagesheet"/>
   </head>
 <body>
  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu682-6"><!-- group -->
     <img class="grpelem" id="u682-6" alt="Pro Social" width="340" height="90" src="images/u682-6.png"/><!-- rasterized frame -->
    </div>
    <div class="colelem" id="u700"><!-- simple frame --></div>
    <div class="clearfix colelem" id="u701-4"><!-- content -->
    </div>
    <div class="clearfix colelem" id="pu1006"><!-- group -->
     <div class="clearfix grpelem" id="u1006"><!-- group <p id="u701-2">Loading..</p> -->
	 <div class="clearfix grpelem" id="u1002-7">
      <p id="result">Loading...</p>
	  <div id="myProgress">
		<div id="myBar"></div>
	  </div>
	  <br>
	  <br>
	  <form id="formdata" name="formdata" action="user.php" method="POST">  
	  <p id="name"></p><p id="rsltName" name="rsltName"></p><br>
	  <p id="username"></p><p id="rsltUserName" name="rsltUserName"></p><br>
	  <p id="email"></p><p id="rsltEmail" name="rsltEmail"></p><br>
	  <p id="phone"></p><p id="rsltPhone" name="rsltPhone"></p><br>
      <input id="resultName" name="resultName" type="hidden" value="" />
      <input id="resultUserName" name="resultUserName" type="hidden" value="" />
      <input id="resultEmail" name="resultEmail" type="hidden" value="" />
      <input id="resultPhone" name="resultPhone" type="hidden" value="" />
      <!-- <p>Full Name: <input type="text" id="resultName" name="resultName" value="" readonly></input> </p>
      <p>User Name: <input type="text" id="resultUserName" name="resultUserName" value="" value="" readonly></input></p>
      <p>Email: <input type="text" id="resultEmail" name="resultEmail" value="" readonly></input></p>
      <p>Phone: <input type="text" id="resultPhone" name="resultPhone" value="" readonly></input></p> -->
	  </form>
	  </div>
     </div>
    </div>
    <div class="verticalspacer"></div>
    <div class="clearfix colelem" id="u921-4"><!-- content -->
     <p>©Pro Soc Unlimited</p>
    </div>
   </div>
  </div>
  <div class="preload_images">
   <img class="preload" src="images/u640-a.png" alt=""/>
   <img class="preload" src="images/u664-a.png" alt=""/>
   <img class="preload" src="images/u1089-a.png" alt=""/>
  </div>
   </body>
</html>
