<?php
/*Template Name: Get Started No Builder*/

get_header();

?>
<meta name="googlebot" content="noindex"/>
<meta name="robots" content="noindex"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script language="javascript">
    $(function () {
        $('a[href*="#"]:not([href="#"])').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });</script>
<!-- #Container Area -->
<style>

    .gstealbox {
        padding: 20px 5px 0px 5px;
        font-size: 14px;
        background: #157c81;
        width: 539px;
        height: 262px !important;
    }

    h3 {
        color: #ffffff;
    }

    .callNum {
        font-size: 1.5em;
    }

    @media only screen and (max-width: 700px) {

        .gstealbox {
            padding: 20px 5px 0px 5px;
            font-size: 14px;
            background: #157c81;
            width: 280px;
            height: 262px;
        }

        .gsheadertxt {
            font-family: "Open Sans", Arial, Helvetica, sans-serif;
            font-size: 30px !important;
            font-weight: 700;
            padding-top: 75px;
            line-height: 35px !important;
            color: #ffffff;
            width: 70%;
            margin: 0px auto;
            text-align: center;
        }

    }

    .gsheadertxt {
        font-family: "Open Sans", Arial, Helvetica, sans-serif;
        font-size: 50px;
        font-weight: 700;
        padding-top: 85px;
        line-height: 55px;
        color: #ffffff;
        width: 70%;
        margin: 0px auto;
        text-align: center;
    }


</style>
<div class="gsheaderbkg">
    <div class="gsheadertxt">We manufacture and install
        custom shower and bathtub enclosures at standard door prices that fit perfectly
        in any opening.
        <strong><a href="#start">
                <!--<div class="gscir"><i class="fa fa-caret-down"></i>
                </div>-->
            </a>
        </strong></div>
</div>


<div class="gsseconds">
    <div class="container">
		<?php
		$s = $_SERVER["REQUEST_URI"];
		$u = "call-for-quote";
		$x = strpos( $s, $u );
		if ( empty( $x ) ) {
			?>
            <div id="geo_banner" style="display: none;">
                <div width="100%" style="margin-top:15px; text-align:center"><p style="color:#000000;"><em>SHIP OUTS
                            ONLY</em>
                    </p>

                    <h1 style="color:red"><strong>Shower Doors Starting as Low as $649.99</strong></h1>
                    <h2 style="color:blue">TAKE 25% OFF STAY<strong>CLEAN</strong>&#8482; PROTECTIVE GLASS</h2>
                    <p style="font-size:12px; color:#333333; text-align:center">*Shower enclosures up to 48" wide and
                        72" tall starting at $649.99; standard 3/8 glass; standard hardware. Price not include Olexis,
                        90 degree and Neo Angle Doors. Additional upgrades are available upon request. (Does not include
                        crating and shipping)
                        | Offer ends 7/6/2017 </p>
                </div>
            </div>
			<?php
		}
		?>
        <div id="start"></div>

        <h1 style="color:#000000 !important; text-align:center !important;  padding-top:20px;"><strong></strong></h1>


    </div>

    <div class="gscenter">
        <div class="container">
            <div class="row">
                <!-- SINGLE DOOR -->
                <div class="col-md-12 col-lg-6"><img src="/wp-content/uploads/2016/07/GSsingledoor.jpg"
                                                     alt="Single Shower Door"/>
                    <div class="gstealbox">
                        <div class="col-md-4 gshide"><img src="/wp-content/uploads/2016/07/GS_RENDsingledoor.png"
                                                          alt="single shower door"/></div>
                        <div class="col-md-8">
                            <h2 style="color:#ffffff !important">SINGLE</h2>
                            <p>All of our frameless doors swing both in and out and will self center once they pass the
                                “half way” point.</p>
                            <h3>Call for a FREE<br>In-Home Estimate<br><span class="callNum"><a href="tel:18553726537"
                                                                                                style="color:#ffffff !important">855-372-6537</a></span>
                            </h3>
                        </div>
                    </div>
                </div>

                <!-- INLINE DOOR -->

                <div class="col-md-12 col-lg-6"><img src="/wp-content/uploads/2016/07/GSinlinedoor.jpg"
                                                     alt="Inline Shower Door"/>
                    <div class="gstealbox">
                        <div class="col-md-4 gshide"><img src="/wp-content/uploads/2016/07/GS_RENDinline.png"
                                                          alt="Inline shower door"/></div>
                        <div class="col-md-8">
                            <h2 style="color:#ffffff !important">INLINE DOOR & PANEL</h2>
                            <p>"Inline" means that the shower door and panel are touching each other in a straight line
                                at 180 Degrees.</p>
                            <h3>Call for a FREE<br>In-Home Estimate<br><span class="callNum"><a href="tel:18553726537"
                                                                                                style="color:#ffffff !important">855-372-6537</a></span>
                            </h3></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- OLEXIS -->

                <div class="col-md-12 col-lg-6"><img
                            src="/wp-content/themes/frameshowerdoors/images/Olexis/OlexisLP.jpg"
                            alt="Olexis Sliding Door"/>
                    <div class="gstealbox">
                        <div class="col-md-4 gshide"><img
                                    src="/wp-content/themes/frameshowerdoors/images/Olexis/OLEXISRendering.jpg"
                                    alt="Sebastian Single Sliding Door"/></div>
                        <div class="col-md-8">
                            <h2 style="color:#ffffff !important">OLEXIS SINGLE SLIDER</h2>
                            <p>The Olexis sliding shower door creates a luxurious, distinguished look with a modern
                                upscale design. The specially designed rollers create a smooth, quiet gliding
                                operation.</p>
                            <h3>Call for a FREE<br>In-Home Estimate<br><span class="callNum"><a href="tel:18553726537"
                                                                                                style="color:#ffffff !important">855-372-6537</a></span>
                            </h3></div>
                    </div>
                </div>

                <!-- Sebastian DOOR -->

                <div class="col-md-12 col-lg-6"><img
                            src="/wp-content/themes/frameshowerdoors/images/Olexis/sebastianLP.jpg"
                            alt="Sebastian Single Sliding Door"/>
                    <div class="gstealbox">
                        <div class="col-md-4 gshide"><img src="/wp-content/uploads/2016/07/GS_RENDserenity.png"
                                                          alt="Sebastian Single Sliding Door"/></div>
                        <div class="col-md-8">
                            <h2 style="color:#ffffff !important">SEBASTIAN SINGLE SLIDER</h2>
                            <p>This stylish Single Slider Enclosure has exposed rollers that operate above the header
                                support bar. The use of minimal hardware provides a frameless look that gives the
                                enclosure an almost floating appearance. </p>
                            <h3>Call for a FREE<br>In-Home Estimate<br><span class="callNum"><a href="tel:18553726537"
                                                                                                style="color:#ffffff !important">855-372-6537</a></span>
                            </h3></div>
                    </div>
                </div>
            </div>


            <div class="row">

                <!-- HYDROSLIDE DOOR -->
                <div class="col-md-12 col-lg-6"><img src="/wp-content/uploads/2016/07/GShydroslide.jpg"
                                                     alt="Hydroslide Single Sliding door"/>
                    <div class="gstealbox">
                        <div class="col-md-4 gshide"><img src="/wp-content/uploads/2016/07/GS_RENDhydroslide.png"
                                                          alt="Hydroslide Single Sliding door"/></div>
                        <div class="col-md-8">
                            <h2 style="color:#ffffff !important">HYDROSLIDE SINGLE SLIDER</h2>
                            <p>The Hydroslide is a gorgeous Single Sliding Shower Door System that features the latest
                                European “all-glass” look and is designed for full standing showers or above
                                bathtubs.</p>
                            <h3>Call for a FREE<br>In-Home Estimate<br><span class="callNum"><a href="tel:18553726537"
                                                                                                style="color:#ffffff !important">855-372-6537</a></span>
                            </h3></div>
                    </div>
                </div>

                <!-- COTTAGE DOOR -->
                <div class="col-md-12 col-lg-6"><img src="/wp-content/uploads/2016/07/GScottage.jpg"
                                                     alt="Cottage Double Slider"/>
                    <div class="gstealbox">
                        <div class="col-md-4 gshide"><img src="/wp-content/uploads/2016/07/GS_RENDcottage.png"
                                                          alt="Cottage Double Slider"/></div>
                        <div class="col-md-8">
                            <h2 style="color:#ffffff !important">COTTAGE DOUBLE SLIDER</h2>
                            <p>A beautiful heavy duty Frameless Double Slider that’s perfect for tubs and showers.</p>
                            <h3>Call for a FREE<br>In-Home Estimate<br><span class="callNum"><a href="tel:18553726537"
                                                                                                style="color:#ffffff !important">855-372-6537</a></span>
                            </h3></div>
                    </div>
                </div>
            </div>

            <div class="row">


                <!-- 90 DEGREE DOOR -->

                <div class="col-md-12 col-lg-6"><img src="/wp-content/uploads/2016/07/GS90degree.jpg"
                                                     alt="90 Degree Shower Door"/>
                    <div class="gstealbox">
                        <div class="col-md-4 gshide"><img src="/wp-content/uploads/2016/07/GS_REND90degree.png"
                                                          alt="90 Degree Shower Door"/></div>
                        <div class="col-md-8">
                            <h2 style="color:#ffffff !important">90 DEGREE </h2>
                            <p>"90 degree" simply means that your frameless shower door enclosure has one or more square
                                corners.</p>
                            <h3>Call for a FREE<br>In-Home Estimate<br><span class="callNum"><a href="tel:18553726537"
                                                                                                style="color:#ffffff !important">855-372-6537</a></span>
                            </h3></div>
                    </div>
                </div>
                <!-- NEO ANGLE -->
                <div class="col-md-12 col-lg-6"><img src="/wp-content/uploads/2016/07/GSneoangle.jpg"
                                                     alt="Neo Angle Shower Door"/>
                    <div class="gstealbox">
                        <div class="col-md-4 gshide"><img src="/wp-content/uploads/2016/07/GS_RENDneoangle.png"
                                                          alt="Neo Angle Shower Door"/></div>
                        <div class="col-md-8">
                            <h2 style="color:#ffffff !important">NEO ANGLE</h2>
                            <p>A "Neo Angle" frameless shower enclosure has, in most cases, 3 sides with 2 angles that
                                are not at 90° degrees. </p>
                            <h3>Call for a FREE<br>In-Home Estimate<br><span class="callNum"><a href="tel:18553726537"
                                                                                                style="color:#ffffff !important">855-372-6537</a></span>
                            </h3></div>
                    </div>
                </div>
            </div>

            <div class="row">


                <!-- SPLASH GUARD DOOR -->

                <div class="col-md-12 col-lg-6"><img src="/wp-content/uploads/2016/07/GSsplashguard.jpg"
                                                     alt="Fixed Splash Guard"/>
                    <div class="gstealbox">
                        <div class="col-md-4 gshide"><img src="/wp-content/uploads/2016/07/GS_RENDfixed.png"
                                                          alt="Fixed Splash Guard"/></div>
                        <div class="col-md-8">
                            <h2 style="color:#ffffff !important">SPLASH GUARD</h2>
                            <p>A stationary splash guard is an alternative to having a fully enclosed shower or
                            tub area.
                          <h3>Call for a FREE<br>In-Home Estimate<br><span class="callNum"><a href="tel:18553726537"
                                                                                                style="color:#ffffff !important">855-372-6537</a></span>
                            </h3></div>
                    </div>
                </div>
                <!-- STANDARD -->
                <div class="col-md-12 col-lg-6"><img src="/wp-content/uploads/2016/07/GSstandarddoor.jpg"
                                                     alt="Semi-Frameless Standard Door"/>
                    <div class="gstealbox">
                        <div class="col-md-4 gshide"><img src="/wp-content/uploads/2016/07/GS_RENDstandard.png"
                                                          alt="Semi-Frameless Standard Door"/></div>
                        <div class="col-md-8">
                            <h2 style="color:#ffffff !important">SEMI-FRAMELESS <br>
                                STANDARD BYPASS DOOR</h2>
                            <p>Our standard bypass doors fit openings ranging from 54" to 59 1/2" wide and are available
                                in 64", 72" to 76" heights.
                            </p>
                            <h3>Call for a FREE<br>In-Home Estimate<br><span class="callNum"><a href="tel:18553726537"
                                                                                                style="color:#ffffff !important">855-372-6537</a></span>
                            </h3></div>
                    </div>
                </div>

            </div>


            <div class="row">


                <!-- CUSTOM DOOR -->

                <div class="col-md-12 col-lg-6"><img src="/wp-content/uploads/2016/07/GScustom.jpg"
                                                     alt="Steam Units & Custom Doors"/>
                    <div class="gstealbox">

                        <div class="col-md-12">
                            <h2 style="color:#ffffff !important"><strong>STEAM UNITS & CUSTOM</strong> SHOWER DOORS</h2>
                            <p>Over the last two decades we've seen it all; from the smallest single door, to a large
                                custom angled frameless steam enclosure, glass wine cellar or office partition. Nothing
                                is too small, large or technical for our experts.</p>
                            <a href="/shower-door-frameless-steam-units/"
                               class=" btn dark-btn custom_orange_btn  btn-v4 ">Contact us to <strong>Order your custom
                                    design</strong></a></div>
                    </div>
                </div>
            </div>
            <p>&nbsp;</p>

        </div>


    </div>
</div>
</div>
<script>
    jQuery(document).ready(function(){
       jQuery("#menu-item-173").hide();
    });
</script>
<?php get_footer( "home" ); ?>
