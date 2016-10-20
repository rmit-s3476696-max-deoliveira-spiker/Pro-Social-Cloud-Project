<?php
   session_start();
   if(isset($_POST["getUserByEmail"]) && isset($_POST["getUserByPassword"])){
	   $_SESSION["getUserByEmail"] = $_POST["getUserByEmail"];
	   $_SESSION["getUserByPassword"] = $_POST["getUserByPassword"];
       $msg = $_POST["getUserByEmail"] . ", Log In Success.";
	   header( 'Location: http://pro-soc-client.appspot.com/loginvalidation.php' ) ; 
   }
?>

<!DOCTYPE html>
<html class="html" lang="en-US">
 <head>
  <!-- JS includes
  <script type="text/javascript">
        function init() {
                //Parameters are APIName,APIVersion,CallBack function,API Root 
        //do not forget to modify the URL below that contain your Project ID
                gapi.client.load('userendpoint', 'v1', null, 'https://pro-soc.appspot.com/_ah/api');
                
                document.getElementById('getUser').onclick = function() {
                        loginUser();
                }
        }
		function loginUser() {
                 //Task 2 of Lab Test 2, Assignment 1
         //Validate the entries
                var _Email = document.getElementById('getUserByEmail').value;
				var _Password = document.getElementById('getUserByPassword').value;
                //Build the Request Object
                var requestData = {};
				requestData.email = _Email;
				requestData.password = _Password;
				
                gapi.client.userendpoint.loginUser(requestData).execute(function(resp) {
                  if (!resp.code) {            
						resp.items = resp.items || [];
                        for (var i=0;i<resp.items.length;i++) {
							alert(resp.items[i].name + ", " + resp.items[i].username + ", " + resp.items[i].email);
                        }		
						document.getElementById('getUserByEmail').value = "";
						document.getElementById('getUserByPassword').value = "";
						//alert(resp);
						//document.getElementById('updateUsersResult').value = 'Welcome to Pro Soc !';
						
						//var phpname = resp.name;
						var phpemail = resp.email;
						//var phppassword = resp.password;
						//var phpusername = resp.username;
						//var phpgender = resp.gender;
						//var phpphone = resp.phone;
						//var phpdob = resp.dob;
						//var check = phpemail.localeCompare("undefined");
						//alert('Welcome to Pro Soc, ' + phpemail + ' !');
						//alert("User: " + phpname + ", " + phpemail + ", " + php.username );
						//alert('Welcome to Pro Soc, ' + phpemail + ' !');
									
                  }
                });   
		}
      </script>
    <script src="https://apis.google.com/js/client.js?onload=init"></script>-->
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2015.0.2.310"/>
  <title>Log In</title>
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
     <nav class="MenuBar clearfix grpelem" id="menuu637"><!-- horizontal box -->
      <div class="MenuItemContainer clearfix grpelem" id="u638"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem" id="u639" href="index.html"><!-- horizontal box --><img class="MenuItemLabel NoWrap grpelem" id="u640" alt="Home" src="images/blank.gif"/><!-- state-based BG images --></a>
      </div>
      <div class="MenuItemContainer clearfix grpelem" id="u659"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem" id="u662" href="user.php"><!-- horizontal box --><img class="MenuItemLabel NoWrap grpelem" id="u664" alt="User" src="images/blank.gif"/><!-- state-based BG images --></a>
      </div>
      <div class="MenuItemContainer clearfix grpelem" id="u1087"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem" id="u1088" href="sign-up.html"><!-- horizontal box --><img class="MenuItemLabel NoWrap grpelem" id="u1089" alt="Sign Up" src="images/blank.gif"/><!-- state-based BG images --></a>
      </div>
      <div class="MenuItemContainer clearfix grpelem" id="u724"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu MuseMenuActive clearfix colelem" id="u727" href="log-in.php"><!-- horizontal box --><div class="MenuItemLabel NoWrap grpelem" id="u729-4"><!-- rasterized frame --><div id="u729-4_clip"><img id="u729-4_img" alt="Log In" width="76" height="13" src="images/u729-4-a.png"/></div></div></a>
      </div>
     </nav>
    </div>
    <div class="colelem" id="u700"><!-- simple frame --></div>
    <div class="clearfix colelem" id="u701-4"><!-- content -->
     <p id="u701-2">Log In</p>
    </div>
    <div class="clearfix colelem" id="pu1006"><!-- group -->
     <div class="clearfix grpelem" id="u1006"><!-- group -->
      <div class="clearfix grpelem" id="u1002-7"><!-- content action=javascript:void(0);-->
	  
	  <form method="post"> 
	  <p>Username: <input id="getUserByEmail" name="getUserByEmail" placeholder="Username"></input></p> <!-- NEED TO CHANGE for username/email -->
       <p>&nbsp;</p>
       <p>Password: <input id="getUserByPassword" name="getUserByPassword" type="password" placeholder="Password"></input></p> <!-- Validate password -->
	   <p>&nbsp;</p>
	   <p>&nbsp;</p>
	   <p>&nbsp;</p>
       <p><input id="getUser" type="submit" value="Log In" ></p>
	  </form>
	  <!-- group -->
	  <div id="updateUsersResult"><?php echo $msg; ?></div>
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
  
  <!-- JS includes -->
  <script type="text/javascript">
   if (document.location.protocol != 'https:') document.write('\x3Cscript src="http://musecdn2.businesscatalyst.com/scripts/4.0/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script type="text/javascript">
   window.jQuery || document.write('\x3Cscript src="scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script src="scripts/museutils.js?275725342" type="text/javascript"></script>
  <script src="scripts/jquery.musemenu.js?4042164668" type="text/javascript"></script>
  <script src="scripts/jquery.watch.js?3999102769" type="text/javascript"></script>
  <!-- Other scripts -->
  <script type="text/javascript">
   $(document).ready(function() { try {
(function(){var a={},b=function(a){if(a.match(/^rgb/))return a=a.replace(/\s+/g,"").match(/([\d\,]+)/gi)[0].split(","),(parseInt(a[0])<<16)+(parseInt(a[1])<<8)+parseInt(a[2]);if(a.match(/^\#/))return parseInt(a.substr(1),16);return 0};(function(){$('link[type="text/css"]').each(function(){var b=($(this).attr("href")||"").match(/\/?css\/([\w\-]+\.css)\?(\d+)/);b&&b[1]&&b[2]&&(a[b[1]]=b[2])})})();(function(){$("body").append('<div class="version" style="display:none; width:1px; height:1px;"></div>');
for(var c=$(".version"),d=0;d<Muse.assets.required.length;){var f=Muse.assets.required[d],g=f.match(/([\w\-\.]+)\.(\w+)$/),k=g&&g[1]?g[1]:null,g=g&&g[2]?g[2]:null;switch(g.toLowerCase()){case "css":k=k.replace(/\W/gi,"_").replace(/^([^a-z])/gi,"_$1");c.addClass(k);var g=b(c.css("color")),h=b(c.css("background-color"));g!=0||h!=0?(Muse.assets.required.splice(d,1),"undefined"!=typeof a[f]&&(g!=a[f]>>>24||h!=(a[f]&16777215))&&Muse.assets.outOfDate.push(f)):d++;c.removeClass(k);break;case "js":k.match(/^jquery-[\d\.]+/gi)&&
typeof $!="undefined"?Muse.assets.required.splice(d,1):d++;break;default:throw Error("Unsupported file type: "+g);}}c.remove();if(Muse.assets.outOfDate.length||Muse.assets.required.length)c="Some files on the server may be missing or incorrect. Clear browser cache and try again. If the problem persists please contact website author.",(d=location&&location.search&&location.search.match&&location.search.match(/muse_debug/gi))&&Muse.assets.outOfDate.length&&(c+="\nOut of date: "+Muse.assets.outOfDate.join(",")),d&&Muse.assets.required.length&&(c+="\nMissing: "+Muse.assets.required.join(",")),alert(c)})()})();
/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.initWidget('.MenuBar', function(elem) { return $(elem).museMenu(); });/* unifiedNavBar */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
} catch(e) { if (e && 'function' == typeof e.notify) e.notify(); else Muse.Assert.fail('Error calling selector function:' + e); }});
</script>
   </body>
</html>
