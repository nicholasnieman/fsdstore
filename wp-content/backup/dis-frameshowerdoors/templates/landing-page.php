<?php
 /*
 	Template Name: Kiosk Landing
 */
	get_header('landing');
?>



<style type="text/css">
body {
	background-position: right;
	background: url(https://www.framelessshowerdoors.com/wp-content/uploads/2016/06/kioskBG.jpg) no-repeat!important;
	background-size: cover!important;
	width: 100wh;
	height: 100vh;
	text-align: center;
	margin:0px;
	padding:0px
}
.blackoverlay {
	position: absolute;
	top: 0;
	left: 0;
	height: 100%;
	width: 100%;
	background-color: rgba(0,0,0,0.5);
	z-index: -1;
}
.content {
	z-index: 999;
	position: relative;
	top: 110px;
}
.presents {
    color: #ffffff;
    font-family: "Roboto Condensed",sans-serif;
    font-size: 50px;
    font-style: italic;
    margin: 50px 0 8px;
}
.made {
    color: #ffffff;
    font-family: "Roboto Condensed",sans-serif;
    font-size: 40px;
    line-height: 46px;
    margin: 50px auto;
    width: 91%;
}
.chrome .button {
    background: rgba(0, 0, 0, 0) url("https://www.framelessshowerdoors.com/wp-content/uploads/2016/06/buttonbg.png") no-repeat scroll center center / cover;
    border-radius: 200px;
    height: 425px;
    margin: 80px auto 0;
    padding: 117px 27px !important;
    width: 425px;
}
.linux .button {
    background: rgba(0, 0, 0, 0) url("https://www.framelessshowerdoors.com/wp-content/uploads/2016/06/buttonbg.png") no-repeat scroll center center / cover ;
    border-radius: 200px;
    height: 400px;
    margin: 80px auto 0;
    padding: 100px 27px !important;
    width: 415px;
}
.chrome .button {
    background: rgba(0, 0, 0, 0) url("https://www.framelessshowerdoors.com/wp-content/uploads/2016/06/buttonbg.png") no-repeat scroll center center / cover;
    border-radius: 200px;
    height: 425px;
    margin: 80px auto 0;
    padding: 76px 27px !important;
    width: 425px;
}

.button a {
    color: #ffffff;
    font-family: "Roboto Condensed",sans-serif;
    font-size: 64px;
    font-weight: 700;
    line-height: 65px;
    text-decoration: none;
}
</style>

<?php 

$cityname = $_REQUEST['FDLocation'];
$discount_kiosk =   $_REQUEST['56_temp'];

?>
<!-- #Container Area -->
<div id="container">
  		<div class="content">
            <p style="margin: 0px 0px 49px;text-align: center;">
                <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/08/FDlogo.png" alt="" width="503" height="191"  />
            </p>
            <p class="presents" style="text-align: center;">PRESENTS</p>
            <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/06/framelessshowerdoors.png" alt="" width="832" height="256" /><br><br><br>
<img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/08/americanmanufacturer.png">
            <div class="made">
               <strong style="text-transform:uppercase"> The finest shower doors available</strong><br>Designed, manufactured, shipped or installed
               <br>
              by the best technicians anywhere.&#8482;
</div>
            <div class="chrome">
                <div class="button">
                    <a href="/index/kiosk/?FDLocation=<?php if($cityname){ echo $cityname; } ?>&56_temp=<?php echo $discount_kiosk; ?>">
                        <span style="font-size:45px;">Touch Here</span><br /><i class="fa fa-hand-o-right"></i> GET AN INSTANT QUOTE    
                    </a>
                </div>
            </div>
        </div>
        <div class="blackoverlay"></div>
</div>

