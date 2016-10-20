<?php 
	session_start();
    require_once 'google/appengine/api/cloud_storage/CloudStorageTools.php';
    use google\appengine\api\cloud_storage\CloudStorageTools;
    $options = ['gs_bucket_name' => 'pro-soc.appspot.com'];
    $upload_url = CloudStorageTools::createUploadUrl('http://pro-soc-client.appspot.com/upload_handler.php', $options);
	  mkdir("gs://pro-soc.appspot.com/" . $_SESSION['getUserByEmail'] . "/");
    $_SESSION['userStore'] = "gs://pro-soc.appspot.com/" . $_SESSION['getUserByEmail'] . "/";
    $store = $_SESSION['getUserByEmail'];
    //echo $_SESSION['userStore'];
    echo "gs://pro-soc.appspot.com/${store}/";
   // mkdir($_SESSION['userStore']);
	if(isset($_POST['eventTitle']) && isset($_POST['eventDate']) && isset($_POST['eventLocation'])){
		$events = fopen('gs://prosoc-storage/UserEvents/'. $_SESSION['getUserByEmail'] . '.csv','w') or die("Can't open file");
		
		$getEvents = explode("\n",file_get_contents('gs://prosoc-storage/UserEvents/'. $_SESSION['getUserByEmail'] . '.csv'));
		$arrlength=count($getEvents);
		
		fwrite($events, "Title" .",". "Date" .",". "Location" );
		for($x=1;$x<$arrlength;$x++)
		{
			$msg2 = $getEvents[$x];
			fwrite($events, "\n" . $msg2);
		}
		fwrite($events, "\n" . $_POST['eventTitle'] . "," . $_POST['eventDate'] .",". $_POST['eventLocation'] );
		$msg = "New Event Added, Details: " . $_POST['eventTitle'].",".$_POST['eventDate'].",".$_POST['eventLocation'];
		fclose($events);
	}
?>
<!DOCTYPE html>
<html class="html" lang="en-US">
 <head>
  <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
  </style>
  <!--<script type="text/javascript">
   if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["jquery-1.8.3.min.js", "museutils.js", "jquery.watch.js", "jquery.musemenu.js", "user.css"], "outOfDate":[]};
</script>-->
  
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2015.0.2.310"/>
  <title>User</title>
  <link rel="shortcut icon" href="images/titlePS.png">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?4052507572"/>
  <link rel="stylesheet" type="text/css" href="css/user.css?4218155804" id="pagesheet"/>
   <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: -34.397, lng: 150.644}
        });
        var geocoder = new google.maps.Geocoder();
		
        document.getElementById('submit').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
        });
		var size = document.getElementById('u1118-14').innerText;
		for(i = 1; i <= size; i++){
			var id = 'location'+i;
			var address = document.getElementById(id).innerText;
		    geocodeAddress2(geocoder, map, address);
		}
      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
			  title: address,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
	  function geocodeAddress2(geocoder, resultsMap, locAdress) {
		geocoder.geocode({'address': locAdress}, function(results, status) {
			if (status === 'OK') {
				resultsMap.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: resultsMap,
					icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
					title: locAdress,
					position: results[0].geometry.location
				});
			} else {
				alert('Geocode was not successful for the following reason: ' + status);
			}
		}); 
      }
    </script>
    <script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAELDko0andMpL74ADC58Tv_Xd9YXFm-p8&callback=initMap">
    </script>
  <!-- Other scripts 
  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>-->
  <!-- JS includes -->
  <!--[if lt IE 9]>
  <script src="scripts/html5shiv.js?4241844378" type="text/javascript"></script>
  <![endif]-->
   </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu224-6"><!-- group -->
     <img class="grpelem" id="u224-6" alt="Pro Social" width="340" height="90" src="images/u224-6.png"/><!-- rasterized frame -->
     <nav class="MenuBar clearfix grpelem" id="menuu342"><!-- horizontal box -->
      <div class="MenuItemContainer clearfix grpelem" id="u527"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem" id="u528" href="index.html"><!-- horizontal box --><img class="MenuItemLabel NoWrap grpelem" id="u531" alt="Home" src="images/blank.gif"/><!-- state-based BG images --></a>
      </div>
      <div class="MenuItemContainer clearfix grpelem" id="u343"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu MuseMenuActive clearfix colelem" id="u346" href="user.php"><!-- horizontal box --><div class="MenuItemLabel NoWrap grpelem" id="u348-4"><!-- rasterized frame --><div id="u348-4_clip"><img id="u348-4_img" alt="User" width="75" height="13" src="images/u348-4-a.png"/></div></div></a>
      </div>
      <div class="MenuItemContainer clearfix grpelem" id="u1073"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem" id="u1074" href="sign-up.html"><!-- horizontal box --><img class="MenuItemLabel NoWrap grpelem" id="u1077" alt="Sign Up" src="images/blank.gif"/><!-- state-based BG images --></a>
      </div>
      <div class="MenuItemContainer clearfix grpelem" id="u703"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem" id="u706" href="log-in.php"><!-- horizontal box --><img class="MenuItemLabel NoWrap grpelem" id="u708" alt="Log In" src="images/blank.gif"/><!-- state-based BG images --></a>
      </div>
     </nav>
    </div>
    <div class="colelem" id="u222"><!-- simple frame --></div>
    <div class="Button rounded-corners clearfix colelem" id="buttonu1122"><!-- container box -->
     <div class="clearfix grpelem" id="u1113-4"><!-- content -->
	 <form action="log-out.php">
         <p><input id="logout" type="submit" value="Log Out"></p>
	 </form>
     </div>
    </div>
    <div class="clearfix colelem" id="u223-4"><!-- content -->
     <p id="u223-2">
	 <?php 
		echo "Welcome " . $_SESSION['getUserByEmail'];
	 ?>
	 </p>
    </div>
    <div class="clearfix colelem" id="pu229-4"><!-- group -->
     <div class="clearfix grpelem" id="u229-4"><!-- content -->
      <p>User photo upload.</p>
     </div>
     <div class="clearfix grpelem" id="u230-8"><!-- content -->
		<form action="<?php echo $upload_url ?>" method="post" enctype="multipart/form-data">
			<p>Select file to upload:</p>
			<p><input type="file" name="fileToUpload"></p>
			<p><input id="u331-2122" type="submit" value="Upload File" tabindex="4"/></p>
		</form>
     </div>
    </div>
    <div class="clearfix colelem" id="u231-4"><!-- content -->
     <p id="u231-2">Activity</p>
    </div>
    <div class="clearfix colelem" id="u1115-4"><!-- content -->
     <p>New Event Planner</p>
    </div>
    <div class="clearfix colelem" id="pu1110"><!-- group -->
     <div class="clearfix grpelem" id="u1110"><!-- group -->
      <div class="clearfix grpelem" id="u1111-15"><!-- content -->
	   <form method="post" action="user.php">
       <p id="u1111-2">Event Title: <input type="text" name="eventTitle"></p>
       <p id="u1111-3">&nbsp;</p>
       <p id="u1111-5">Event Date: <input type="text" name="eventDate"></p>
       <p id="u1111-6">&nbsp;</p>
       <p id="u1111-8">Location: <input type="text" name="eventLocation"></p>
       <p id="u1111-9">&nbsp;</p>
       <p id="u1111-13"><?php echo $msg; ?></p>
	   <div class="Button rounded-corners clearfix grpelem" id="buttonu1112"><!-- container box -->
        <div class="clearfix grpelem" id="u1113-4"><!-- content -->
         <p><input id="addEvent" type="submit" value="Add Event"></p>
        </div>
       </div>
	   </form>
      </div>
     </div>
    </div>
    <div class="clearfix colelem" id="u1119-4"><!-- content -->
     <p>Event List</p>
    </div>
    <div class="clearfix colelem" id="u1116"><!-- group -->
     <div class="clearfix grpelem" id="u1118-18"><!-- content 
      <p id="u1118-13">-->
	  <table style="width:100%; border: 1px solid black; padding: 5px;" >
		<tr>
			<th style="border: 1px solid black; padding: 5px;">Title</th>
			<th style="border: 1px solid black; padding: 5px;">Date</th>
			<th style="border: 1px solid black; padding: 5px;">Location</th>
		</tr>
		<?php
		$getEvents = explode("\n",file_get_contents('gs://prosoc-storage/UserEvents/'. $_SESSION['getUserByEmail'] . '.csv'));
		$arrlength=count($getEvents);
		for($x=1;$x<$arrlength;$x++)
		{
			$arr = explode(",", $getEvents[$x]);
			echo "<tr><td style='border: 1px solid black; padding: 5px; font-weight:normal;'>".$arr[0]."</td><td style='border: 1px solid black; padding: 5px; font-weight:normal;'>".$arr[1]."</td><td id='location".$x."' style='border: 1px solid black; padding: 5px; font-weight:normal;'>".$arr[2]."</td></tr>";
		}
	   ?>
	  </table>
	   
      <p id="u1118-15">&nbsp;</p>
	  <p id="u1118-15">&nbsp;</p>
      <p id="u1118-15">Total Events: </p>
	  <p id="u1118-14"><?php echo $arrlength-1; ?></p>
      <p id="u1118-16">&nbsp;</p>
     </div>
    </div>
    <div class="clearfix colelem" id="u1120-4"><!-- content -->
     <p>Event Location</p>
    </div>
    <div class="clearfix colelem" id="u1121-20"><!-- content -->
	 <p id="u1121-14">&nbsp;</p>
     <p id="u1121-3">&nbsp;</p>
	 <p id="u1121-6">&nbsp;</p>
	 <p id="u1121-6">&nbsp;</p>
	 <p id="u1121-12">Google Maps..</p>
	 <p id="u1121-3">&nbsp;</p>
	 <p id="u1121-6">
	 <div id="floating-panel">
      <input id="address" type="textbox" value="Sydney, NSW">
      <input id="submit" type="button" value="Search Location">
    </div>
	</p>
    <p id="u1121-2"><div id="map" style="width: 850px; height: 600px;"></div></p>
    </div>
    <div class="verticalspacer"></div>
    <div class="clearfix colelem" id="u919-4"><!-- content -->
     <p>©Pro Soc Unlimited</p>
    </div>
   </div>
  </div>
  <div class="preload_images">
   <img class="preload" src="images/u531-a.png" alt=""/>
   <img class="preload" src="images/u1077-a.png" alt=""/>
   <img class="preload" src="images/u708-a.png" alt=""/>
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
