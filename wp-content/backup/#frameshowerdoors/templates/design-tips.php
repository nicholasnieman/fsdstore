<?php
/*Template Name: Design Tips*/

	//get_header();

	get_header( 'inner' );

?>	

<?php global $frame_breadcumb;?>

		<div id="mwrapbg">
		  <div id="mbar">
		    <div id="mwrap">
		      <div id="main">
		      	<div id="main-header" class="relative">
					<h2> <?php the_title();?> </h2>
					<div id="dtpw"><div id="dtpager"><a class="my_li activeSlide" id="li_0"  id="startbtn" href="javascript:void(0)">S<span></span></a><a href="javascript:void(0)" class="my_li" id="li_1">1<span></span></a><a href="javascript:void(0)" id="li_2" class="my_li">2<span></span></a><a href="javascript:void(0)" id="li_3" class="my_li">3<span></span></a><a href="javascript:void(0)" id="li_4" class="my_li">4<span></span></a><a href="javascript:void(0)" id="li_5" class="my_li">5<span></span></a><a href="javascript:void(0)" class="my_li" id="li_6">6<span></span></a><a href="javascript:void(0)" class="my_li" id="li_7">7<span></span></a><a href="javascript:void(0)" class="my_li" id="li_8">8<span></span></a><a href="javascript:void(0)" class="my_li" id="li_9">9<span></span></a><a href="javascript:void(0)" class="my_li" id="li_10">10<span></span></a><a href="javascript:void(0)" class="my_li" id="li_11">11<span></span></a><a href="javascript:void(0)" class="my_li" id="li_12">12<span></span></a><a href="javascript:void(0)" class="my_li" id="li_13">13<span></span></a><a href="javascript:void(0)" class="my_li" id="li_14">14<span></span></a><a href="javascript:void(0)" class="my_li" id="li_15">15<span></span></a><a href="javascript:void(0)" class="my_li" id="li_16">16<span></span></a><a href="javascript:void(0)" class="my_li" id="li_17">17<span></span></a></div>
						<a class="prev" href="javascript:void(0)">Previous</a> <a class="next" href="javascript:void(0)">Next</a> 
					</div>
		      	</div>	           
		        <div class="main50">
		         <div id="designTips">
		         <ul>
		         		
   						<?php $value = get_field( "design_tips_detail" );?>
						<?php 
						$i = 0;
						foreach( $value as $values )
						{	
						?>
						<?php 
						if($values['heading'] == 'Tips') {
						?>
						<li class="li_<?php echo $i ?> common_class" >
							<div id="start">							
								<div class="dt-header">
									<h2>Design<strong><?php echo $values['heading']; ?></strong></h2>
								</div>
							</div>
							<div class="dtStart">
								<p><?php echo $values['description']; ?></p>
								<img onload="pagespeed.CriticalImages.checkImageForCriticality(this);" data-pagespeed-url-hash="1090589008" class="shadBot" alt="Shower Door Design Tip" src="<?php echo $values['image']?>">
							</div>
						</li>

						<?php }  else { ?>
							<li class="li_<?php echo $i ?> common_class">
							<div id="start">							
							<div class="dt-header">
								<h2>
								Design
								<strong><?php echo $values['heading']; ?></strong>
								</h2>
								<a class="btn-sm blank" href="<?php echo  $values['pdf_link']; ?>">Print This Tip</a>
							</div>

							</div>
							<div class="dtShad">								
								<div class="dtText">
									<p><?php echo $values['description']; ?></p>

								</div>
								</div>
								<img width="100%" height="100%" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" data-pagespeed-url-hash="1090589008" class="shadBot" alt="Shower Door Design Tip" src="<?php echo $values['image']?>">
								<!-- <img width="100%" height="100%" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" data-pagespeed-url-hash="1090589008" class="shadBot" alt="" src="<?php echo $values['image1']?>"> -->
							</li>

						<?php } ?>

						<?php $i++; } ?>
						</div>
		            <div class="clear"></div>
		         </div>
		         </ul>					
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
		
<?php

get_footer();

?>