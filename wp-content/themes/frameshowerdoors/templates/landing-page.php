<?php
 /*
 	Template Name: Kiosk Landing
 */
	get_header('landing');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">

jQuery(document).ready(function(){	
                jQuery('.bar').hide();
			
     jQuery('#bluecir').click(function() {
		 (function ($){
       $('.bar').show(); 
	   $('.bluewords').hide();
    return true;
   }(jQuery));
     });
});

 </script>
 

<style type="text/css">
html {
	-ms-content-zooming: none;
	
	touch-action: none; 
	 
      
    
    	
}
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
	
	/*.content { zoom: 0.8;
    -moz-transform: scale(0.8);
    -webkit-transform: scale(0.8);
    transform: scale(0.8);}	*/
	
	
	
	
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
    width: 425px;color: #ffffff;
    font-family: "Roboto Condensed",sans-serif;
    font-size: 64px;
    font-weight: 700;
    line-height: 65px;
    text-decoration: none;
}

.button a {
    
}

.bar {
	display:none;
	position:absolute;
	z-index:100000;
	top: 1350px;
width: 395px;
left: 344px;
height: 35px;
  border: 1px solid #2980b9;
  border-radius: 3px;
   background-image: 
    repeating-linear-gradient(
      -45deg,
      #229895,
      #27A19F 11px,
      #2CAAAA 10px,
      #37BABC 20px /* determines size */
    );
  background-size: 28px 28px;
  animation: move .5s linear infinite;
}

.bartext {position:absolute; top:-50px; text-align:center; font-size:30px; font-weight:bold; color:#ffffff; width:100%}

@keyframes move {
  0% {
    background-position: 0 0;
  }
  100% {
    background-position: 28px 0;
  }
}
	
	#browserInfo{
		padding:8px;
		border:1px solid blue;
		width:300px;
</style>

<?php 

$cityname = $_REQUEST['FDLocation'];
$discount_kiosk =   $_REQUEST['56_temp'];

?>
<!-- #Container Area -->

<!--<div id="browserInfo">-->
<!--  </div>-->

  
<script type="text/javascript">
	
	//$('#browserInfo').text('Browser (Width : ' + $(document).width() + ' , Height :' + $(window).height() + ' )');
	
    $(window).resize(function () {
		//$('#browserInfo').text('Browser (Width : ' + $(window).width() + ' , Height :' + $(window).height() + ' )');
    });
	
	//jQuery(document).ready(function(){
		//var w = jQuery(window).width();
		//jQuery(".content").css("width",w);
//	});
	
	
</script>


<div id="container">

<div class="bar"><div class="bartext">LOADING...</div></div>
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
              <a href="/fdkiosk/kiosk/?FDLocation=<?php if($cityname){ echo $cityname; } ?>&56_temp=<?php echo $discount_kiosk; ?>" id="bluecir">  <div class="button">
                  
                       <div class="bluewords"> <span style="font-size:45px;">Touch Here</span><br /><i class="fa fa-hand-o-right"></i> GET AN INSTANT QUOTE    
                    
           </div>     </div></a>
            </div>
        </div>
        <div class="blackoverlay"></div>
</div>

