<?php



	function testiominal_code(){

		$Path=$_SERVER['REQUEST_URI'];
		$cur_url =  home_url().$Path;

			echo '<div class="testimonials_form"> <div class="container"> <div class="row">';
			echo '<div class="col-md-12"> <div class="testimonials_form_container"> <div class="col-md-6">';
			echo '<h4><strong>Customer Testimonials</strong></h4>';
			echo '<div id="testimonial-slider">';
	    		$args = array(
	    			'post_type' => 'testimonial',
	    			'post_status' => 'publish',
	    			'posts_per_page' => -1,
	    			'order'   => 'DESC'
	    		);
	    		$the_queryy = new WP_Query( $args );
				if ( $the_queryy->have_posts() ) {
	    			while ( $the_queryy->have_posts() ) {
	    				$the_queryy->the_post(); 
				        echo '<div class="item"> <div class="testimonial">';
				        echo  '<p>'.the_content().'</p>';
				        echo '<strong>'.the_title().' </strong></div></div>';
	    			}
	    		} 
	    		wp_reset_postdata(); 
			echo ' </div></div>';
			echo "<div class='col-md-6 left_shadow'> <h4><strong>Need Help? We'll Call You...</strong></h4>";
			//echo do_shortcode('[contact-form-7 id="262" title="Contact Us"]'); 
			echo "<div id='crmWebToEntityForm'>
				   <META HTTP-EQUIV ='content-type' CONTENT='text/html;charset=UTF-8'>
				  <form action='https://crm.zoho.com/crm/WebToLeadForm' name='WebToLeads1429722000001420005' method='POST' onSubmit='javascript: return checkMandatory()' accept-charset='UTF-8'>		   
			
					 <!-- Do not remove this code. -->
					<input type='text' style='display:none;' name='xnQsjsdp' value='f6675da4f5b64b7c54aeb859879a87ea594e8fefd20d5f521a0288b1f64c3ca9'/>
					<input type='hidden' name='zc_gad' id='zc_gad' value=''/>
					<input type='text' style='display:none;' name='xmIwtLD' value='9d3bc3a95b188bcc05de1fdd4794542ade839b2419e115abacdb1b7352749957'/>
					<input type='text' style='display:none;'  name='actionType' value='TGVhZHM='/>
			
					<input type='text' style='display:none;' name='returnURL' value='https&#x3a;&#x2f;&#x2f;www.framelessshowerdoors.com&#x2f;thankyou-forms' /> 

					
					 <!-- Do not remove this code. -->
					

					<div class='row'> 
						<div class='col-md-6'> 
							<div class='custom-input-group'> 
								<input type='text' class='form-control' maxlength='40' name='First Name' placeholder='First Name' required='required' />
							</div> 
						</div>
						<div class='col-md-6'>
							<div class='custom-input-group'> 
								<input type='text' class='form-control' maxlength='80' name='Last Name' placeholder='Last Name' required='required' />
							</div>
						</div> 
					</div>

					<div class='row'>
						<div class='col-md-6'>
							<div class='custom-input-group'> <input type='text' class='form-control' maxlength='30' name='Phone' placeholder='Phone' required='required' /></div>
						</div> 
						<div class='col-md-6'>
							<div class='custom-input-group'> <input type='email' class='form-control' maxlength='100' name='Email' placeholder='Email' required='required' /> </div>
						</div>
					</div> 

					<div class='row'>
						<div class='col-md-12'>
							<div class='custom-input-group'>
								<input type='text'  maxlength='255' class='form-control' name='LEADCF1' placeholder='message' required='required' />
							</div>
						</div>
					</div> 

					<div class='row'>
						<div class='col-md-12'>
							<div class='custom-input-group'>
								<select name='Lead Source' id='state' class='form-control'>	
									<option value='al'>AL</option>
									<option value='ak'>AK</option>
									<option value='az'>AZ</option>
									<option value='ar'>AR</option>
									<option value='ca'>CA</option>
									<option value='co'>CO</option>
									<option value='ct'>CT</option>
									<option value='de'>DE</option>
									<option value='fl'>FL</option>
									<option value='ga'>GA</option>
									<option value='hi'>HI</option>
									<option value='id'>ID</option>
									<option value='il'>IL</option>
									<option value='in'>IN</option>
									<option value='ia'>IA</option>
									<option value='ks'>KS</option>
									<option value='ky'>KY</option>
									<option value='la'>LA</option>
									<option value='me'>ME</option>
									<option value='md'>MD</option>
									<option value='ma'>MA</option>
									<option value='mi'>MI</option>
									<option value='mn'>MN</option>
									<option value='ms'>MS</option>
									<option value='mo'>MO</option>
									<option value='mt'>MT</option>
									<option value='ne'>NE</option>
									<option value='nv'>NV</option>
									<option value='nh'>NH</option>
									<option value='nj'>NJ</option>
									<option value='nm'>NM</option>
									<option value='ny'>NY</option>
									<option value='nc'>NC</option>
									<option value='nd'>ND</option>
									<option value='oh'>OH</option>
									<option value='ok'>OK</option>
									<option value='or'>OR</option>
									<option value='pa'>PA</option>
									<option value='ri'>RI</option>
									<option value='sc'>SC</option>
									<option value='sd'>SD</option>
									<option value='tn'>TN</option>
									<option value='tx'>TX</option>
									<option value='ut'>UT</option>
									<option value='vt'>VT</option>
									<option value='va'>VA</option>
									<option value='wa'>WA</option>
									<option value='wv'>WV</option>
									<option value='wi'>WI</option>
									<option value='wy'>WY</option>
									<option value='as'>AS</option>
									<option value='dc'>DC</option>
									<option value='fm'>FM</option>
									<option value='gu'>GU</option>
									<option value='mh'>MH</option>
									<option value='mp'>MP</option>
									<option value='pw'>PW</option>
									<option value='pr'>PR</option>
									<option value='vi'>VI</option>
									<option value='ae'>AE</option>
									<option value='aa'>AA</option>
									<option value='ap'>AP</option>
								</select>
							</div>
						</div>
					</div>

					<div class='row'>
						<div class='col-md-6'>
							<div class='custom-input-group'>
								
								    <input type='text' maxlength='80' name='enterdigest' class='form-control' placeholder='Enter the Captcha' required='required'/>
								
									<!-- Do not remove this code. -->
								    <td><img id='imgid' src='https://crm.zoho.com/crm/CaptchaServlet?formId=9d3bc3a95b188bcc05de1fdd4794542ade839b2419e115abacdb1b7352749957&grpid=f6675da4f5b64b7c54aeb859879a87ea594e8fefd20d5f521a0288b1f64c3ca9'>
								    <a href='javascript:;' onclick='reloadImg()'>Reload</a>			
							</div>
						</div>
					</div>

					<div class='row'>
						<div class='col-md-8'> 
							<div class='checkbox'> 
							<input type='text' name='Website' value='".$cur_url."' style='display:none;'/>
								<label><input type='checkbox' name='LEADCF109'/>Yes, send me the latest news and offers!</label>
								
							</div> 
						</div>
						<div class='col-md-4'>
							<div class='custom-int-grp'>
								<input type='submit' value='Send Message' class='form-btn pull-right' />
							</div> 
						</div> 
					</div>

				



					    
			   	</form>
			     <!-- Do not remove this code. -->
			        <iframe name='captchaFrame' style='display:none;'></iframe>
			   </div>";

			echo '</div> </div>';
			echo '<div class="bottom_shadow"><img src="'.get_template_directory_uri().'/images/shadow_bottom.png"> </div>';
			echo '</div> </div> </div> </div>';

			?>
			<script>
				var mndFileds=new Array('First Name','Last Name','Email','Phone','LEADCF1','enterdigest');
				var fldLangVal=new Array('First Name','Last Name','Email','Phone','LEADCF1','enterdigest');
				var name='';
				var email='';

			/* Do not remove this code. */
				  function reloadImg() {
				if(document.getElementById('imgid').src.indexOf('&d') !== -1 ) {
				  	  document.getElementById('imgid').src=document.getElementById('imgid').src.substring(0,document.getElementById('imgid').src.indexOf('&d'))+'&d'+new Date().getTime();
				}  else {
				  	  document.getElementById('imgid').src = document.getElementById('imgid').src+'&d'+new Date().getTime();
				 } 
				 }

				  function checkMandatory() {
				for(i=0;i<mndFileds.length;i++) {
				  var fieldObj=document.forms['WebToLeads1429722000001420005'][mndFileds[i]];
				  if(fieldObj) {
					if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length==0) {
					 if(fieldObj.type =='file')
						{ 
						 alert('Please select a file to upload'); 
						 fieldObj.focus(); 
						 return false;
						} 
					alert(fldLangVal[i] +' cannot be empty'); 
				   	  	  fieldObj.focus();
				   	  	  return false;
					}  else if(fieldObj.nodeName=='SELECT') {
				   	   	 if(fieldObj.options[fieldObj.selectedIndex].value=='-None-') {
						alert(fldLangVal[i] +' cannot be none'); 
						fieldObj.focus();
						return false;
					   }
					} else if(fieldObj.type =='checkbox'){
				 	 	 if(fieldObj.checked == false){
						alert('Please accept  '+fldLangVal[i]);
						fieldObj.focus();
						return false;
					   } 
					 } 
					 try {
					     if(fieldObj.name == 'Last Name') {
						name = fieldObj.value;
				 	 	    }
					} catch (e) {}
				    }
				}
			}
			</script>
			<?php
			
	}

	function meta_bxx_section2(){
		if(have_posts()) : 
			while(have_posts()) : the_post();
				if( get_field('_meta_bxx_section2',get_the_id()) ): 
					 while( has_sub_field('_meta_bxx_section2',get_the_id()) ):	
						$_image_bxxx_sect 		= get_sub_field('_image_bxxx_sect');
						$_content_bxxx_sect 	= get_sub_field('_content_bxxx_sect');
						$_buuton_text_bxxx_sect = get_sub_field('_buuton_text_bxxx_sect');
						$_buutun_href_bxxx_sect = get_sub_field('_buutun_href_bxxx_sect');
						$content = get_sub_field('_content');
						echo '<img src="'.$_image_bxxx_sect['url'].'" alt="" /><p>'.$_content_bxxx_sect.'</p>';
						echo '<div class="inline margin-top-40"> <a class="btn-v1 pull-center font-weight-700" href="'.$_buutun_href_bxxx_sect.'">'.$_buuton_text_bxxx_sect.'</a></div>';
					endwhile;
				endif;
			endwhile;
		endif;
	}


	function meta_bxx_section1(){
		if(have_posts()) : 
			while(have_posts()) : the_post();
				if( get_field('_meta_bxx_section1',get_the_id()) ): 
					 while( has_sub_field('_meta_bxx_section1',get_the_id()) ): 
							if( get_sub_field('_cont_blk') ):
								while( has_sub_field('_cont_blk') ): 
									
									$img_url = get_sub_field('_image_bxxx');
								//	print_r($img_url );
									$content = get_sub_field('_content');
									
									echo '<div class="col-md-3 col-sm-3 margin-bottom-20 align-center">

										<a href="'.get_sub_field('_href_bxxx').'"> <img src="'.$img_url['url'].'"/>
											<h4><strong>'.get_sub_field('_titel_bxxx').'</strong></h4>
										</a>
							
										

									</div>';
								endwhile; 
							endif; 
							
							echo '<div class="col-md-12"> <p>'.get_sub_field('_content_block_bxx').' </p> </div>';
					endwhile;
				endif;
			endwhile;
		endif;
	}

	function pages_link_section(){
		$html = "<div class='three-boxes'>
		  <div class='container'>
		    <div class='row'>
		      <div class='col-md-4'> <a href='". get_site_url()."/why-fsd'>
		        <div class='one'>
		          <h4>Buy Direct &amp; Save!</h4>
		          <p>Buy direct from the manufacturer!</p>
		        </div>
		        </a> </div>
		      <div class='col-md-4'> <a href='". get_site_url()."/services/installation'>
		        <div class='two'>
		          <h4>Lifetime Warranty</h4>
		          <p>When we install your glass. Learn More</p>
		        </div>
		        </a> </div>
		      <div class='col-md-4'> <a href='". get_site_url()."/diy-center'>
		        <div class='three'>
		          <h4> Do It Yourselfers Welcome. </h4>
		          <p>DIY type, ey? You're going to love us.</p>
		        </div>
		        </a> </div>
		    </div>
		    <div class='row'>
		      <div class='col-md-4'> <a href='". get_site_url()."/services/installation'>
		        <div class='one one-one'>
		          <h4>Certified Installers</h4>
		          <p>Installation Direct from the Manufacturer</p>
		        </div>
		        </a> </div>
		      <div class='col-md-4'> <a href='". get_site_url()."/store-coming-soon'>
		        <div class='two two-two'>
		          <h4>Frameless Shower Doors</h4>
		          <p>Parts &amp; Accessories</p>
		        </div>
		        </a> </div>
		      <div class='col-md-4'> <a href='". get_site_url()."/contractor-signup-form'>
		        <div class='three three-three'>
		          <h4>Contractors Loyalty Program</h4>
		          <p>Learn About Our Contractors Loyalty Program</p>
		        </div>
		        </a> </div>
		    </div>
		  </div>
		</div>";

		echo $html;
	}


	function category_listing(){
		$wcatTerms = get_terms(
			'product_cat',
			array(
				'hide_empty' => 0,
				'orderby'	 => 'name',
				'order'   => 'ASC',
				'parent'	 => 0,
				'include'	 => array(66, 99, 98, 102, 92, 100, 93, 101)
			)
		);

		foreach($wcatTerms as $wcatTerm){
			$args = array(
				'post_type' => 'product',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'orderby' => 'term_order',
				'order' => 'ASC',
				//'orderby' => 'title',
				//'order'   => 'ASC',
				'tax_query' => array(
				    array(
				    'taxonomy' => 'product_cat',
				    'field' => 'id',
				    'terms' => $wcatTerm->term_id,
				     )
				  )
			);
			$count = 0;
			$the_queryy = new WP_Query( $args );
			if ( $the_queryy->have_posts() ) {
				while ( $the_queryy->have_posts() ) {
					$the_queryy->the_post(); 
					$count++;
				}

			} 
			wp_reset_postdata(); 
			$t_id = $wcatTerm->term_id;
			$variable = get_field('_category_image', 'product_cat_'.$t_id);
			$thumbnail_id = get_woocommerce_term_meta( $wcatTerm->term_id, 'thumbnail_id', true );
			$image = wp_get_attachment_url( $thumbnail_id );

				echo '<div class="c_col_8">';
					echo '<div class="img">';
					
						echo '<img src="'.$image.'" />';
						//echo '<img src="'.z_taxonomy_image_url($wcatTerm->term_id).'" />';
						//echo '<img src="'.$meta_image.'" data-animated="'.$meta_image.'">';
						
					echo '</div>';
					echo '<strong class="door-title">'.$wcatTerm->name.'</strong>';
					if($wcatTerm->term_id == 101){
						echo '<a id="cat-id-'.$wcatTerm->term_id.'" href="'.site_url().'/contact/" class="btn-v4 fullwidth inline align-center">Contact Us</a>';	
					}
					else if($wcatTerm->term_id == 66){
						?>
					<!-- 	<a id="cat-id-<?php echo $wcatTerm->term_id; ?>" href="<?php echo get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ); ?>" onClick="_gaq.push(['_trackEvent', 'View All 6 Layouts', 'Single Shower Door', 'Single Layout 1']);" class="btn-v4 fullwidth inline align-center">View All <?php echo $count; ?> Layouts</a> -->

						<a class="btn-v4 fullwidth inline align-center" id="cat-id-<?php echo $wcatTerm->term_id; ?>" href="<?php echo get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ); ?>" onclick="_gaq.push(['_trackEvent', 'Single-Shower-Door', 'View-All-6-Layouts', 'Single-Shower-Door-Complete']);">View All 6 Layouts</a>
						<?php
					}
					
					else{
						?>
						<a id="cat-id-<?php echo $wcatTerm->term_id; ?>" href="<?php echo get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ); ?>" class="btn-v4 fullwidth inline align-center">View All <?php echo $count; ?> Layouts</a>
						<?php
					}
					
				echo '</div>';
		
		}
	}
// <a class="flat-button orange" href="https://www.framelessshowerdoors.com/newwpsite/product_cat/single-shower-door/" onClick="_gaq.push(['_trackEvent', 'newwpsite', 'SingleShowerDoor', 'SingleLayout 1', 'SingleLayout 2','SingleLayout 3', 'SingleLayout 4', 'SingleLayout 5', 'SingleLayout 6']);" target="_blank">Start Building</a>

	function testiominal_full_history(){
		echo '<div id="mwrapbg">';
		  echo '<div id="mbar">';
		    echo '<div id="mwrap">';
		     echo ' <div id="main">';
		       echo ' <div id="main-header">';
		          echo '<h2> Testimonials </h2>';
		         echo '<div id="buying-guide"><a href=" '.get_site_url().'/installation/">Buying Guide</a></div>';
				 echo '<div id="need-help"><a href=" '. get_site_url() . '/contact/">Need Help?</a></div>';
				echo '</div>';
		       echo '<div class="main50">';
		    		$args = array(
		              			'post_type' => 'testimonial',
		              			'post_status' => 'publish',
		              			'posts_per_page' => -1,
		              			'order'   => 'ASC'
		              		);
		              		$the_queryy = new WP_Query( $args );
		          			if ( $the_queryy->have_posts() ) {
		              			while ( $the_queryy->have_posts() ) {
		              				$the_queryy->the_post(); 
		              				echo '<div class="testimonial">';
		              				echo '<p>'.the_content().'</p>';
		              				echo '<h2>- '.get_the_title().' </h2>';
		              				echo '</div>';
		              			}
		              		} 
		              		wp_reset_postdata(); 
				 echo '</div>';
		      echo '</div>';
		   echo ' </div>';
		echo '  </div>';
		echo '</div>';
	}


	function inner_footer(){
	echo '<div id="fbulk" class="tesimonial_getintch">';
		  echo '<div class="fwrap">';
		  echo ' <div id="ftop">';
		       echo '<div id="f-tstm">';
		         echo '<h4><strong>Customer Testimonials</strong></h4>';
			echo '<div id="testimonial-slider">';
	    		$args = array(
	    			'post_type' => 'testimonial',
	    			'post_status' => 'publish',
	    			'posts_per_page' => -1,
	    			'order'   => 'DESC'
	    		);
	    		$the_queryy = new WP_Query( $args );
				if ( $the_queryy->have_posts() ) {
	    			while ( $the_queryy->have_posts() ) {
	    				$the_queryy->the_post(); 
				        echo '<div class="item"> <div class="testimonial">';
				        echo  '<p>'.the_content().'</p>';
				        echo '<strong>'.the_title().' </strong></div></div>';
	    			}
	    		} 
	    		wp_reset_postdata(); 
			echo ' </div></div>';
			echo "<div class='col-md-6 left_shadow'> <h4><strong>Need Help? We'll Call You...</strong></h4>";
			//echo do_shortcode('[contact-form-7 id="262" title="Contact Us"]'); 
			echo "<div id='crmWebToEntityForm'>
				   <META HTTP-EQUIV ='content-type' CONTENT='text/html;charset=UTF-8'>
				  <form action='https://crm.zoho.com/crm/WebToLeadForm' name='WebToLeads1429722000001420005' method='POST' onSubmit='javascript: return checkMandatory()' accept-charset='UTF-8'>		   
			
					 <!-- Do not remove this code. -->
					<input type='text' style='display:none;' name='xnQsjsdp' value='f6675da4f5b64b7c54aeb859879a87ea594e8fefd20d5f521a0288b1f64c3ca9'/>
					<input type='hidden' name='zc_gad' id='zc_gad' value=''/>
					<input type='text' style='display:none;' name='xmIwtLD' value='9d3bc3a95b188bcc05de1fdd4794542ade839b2419e115abacdb1b7352749957'/>
					<input type='text' style='display:none;'  name='actionType' value='TGVhZHM='/>
			
					<input type='text' style='display:none;' name='returnURL' value='https&#x3a;&#x2f;&#x2f;www.framelessshowerdoors.com&#x2f;thankyou-forms' /> 

					
					 <!-- Do not remove this code. -->
					

					<div class='row'> 
						<div class='col-md-6'> 
							<div class='custom-input-group'> 
								<input type='text' class='form-control' maxlength='40' name='First Name' placeholder='First Name' required='required' />
							</div> 
						</div>
						<div class='col-md-6'>
							<div class='custom-input-group'> 
								<input type='text' class='form-control' maxlength='80' name='Last Name' placeholder='Last Name' required='required' />
							</div>
						</div> 
					</div>

					<div class='row'>
						<div class='col-md-6'>
							<div class='custom-input-group'> <input type='text' class='form-control' maxlength='30' name='Phone' placeholder='Phone' required='required' /></div>
						</div> 
						<div class='col-md-6'>
							<div class='custom-input-group'> <input type='email' class='form-control' maxlength='100' name='Email' placeholder='Email' required='required' /> </div>
						</div>
					</div> 

					<div class='row'>
						<div class='col-md-12'>
							<div class='custom-input-group'>
								<input type='text'  maxlength='255' class='form-control' name='LEADCF1' placeholder='message' required='required' />
							</div>
						</div>
					</div> 

					<div class='row'>
						<div class='col-md-12'>
							<div class='custom-input-group'>
								<select name='Lead Source' id='state' class='form-control' required='required'>	
									<option value='al'>AL</option>
									<option value='ak'>AK</option>
									<option value='az'>AZ</option>
									<option value='ar'>AR</option>
									<option value='ca'>CA</option>
									<option value='co'>CO</option>
									<option value='ct'>CT</option>
									<option value='de'>DE</option>
									<option value='fl'>FL</option>
									<option value='ga'>GA</option>
									<option value='hi'>HI</option>
									<option value='id'>ID</option>
									<option value='il'>IL</option>
									<option value='in'>IN</option>
									<option value='ia'>IA</option>
									<option value='ks'>KS</option>
									<option value='ky'>KY</option>
									<option value='la'>LA</option>
									<option value='me'>ME</option>
									<option value='md'>MD</option>
									<option value='ma'>MA</option>
									<option value='mi'>MI</option>
									<option value='mn'>MN</option>
									<option value='ms'>MS</option>
									<option value='mo'>MO</option>
									<option value='mt'>MT</option>
									<option value='ne'>NE</option>
									<option value='nv'>NV</option>
									<option value='nh'>NH</option>
									<option value='nj'>NJ</option>
									<option value='nm'>NM</option>
									<option value='ny'>NY</option>
									<option value='nc'>NC</option>
									<option value='nd'>ND</option>
									<option value='oh'>OH</option>
									<option value='ok'>OK</option>
									<option value='or'>OR</option>
									<option value='pa'>PA</option>
									<option value='ri'>RI</option>
									<option value='sc'>SC</option>
									<option value='sd'>SD</option>
									<option value='tn'>TN</option>
									<option value='tx'>TX</option>
									<option value='ut'>UT</option>
									<option value='vt'>VT</option>
									<option value='va'>VA</option>
									<option value='wa'>WA</option>
									<option value='wv'>WV</option>
									<option value='wi'>WI</option>
									<option value='wy'>WY</option>
									<option value='as'>AS</option>
									<option value='dc'>DC</option>
									<option value='fm'>FM</option>
									<option value='gu'>GU</option>
									<option value='mh'>MH</option>
									<option value='mp'>MP</option>
									<option value='pw'>PW</option>
									<option value='pr'>PR</option>
									<option value='vi'>VI</option>
									<option value='ae'>AE</option>
									<option value='aa'>AA</option>
									<option value='ap'>AP</option>
								</select>
							</div>
						</div>
					</div>

					<div class='row'>
						<div class='col-md-6'>
							<div class='custom-input-group'>
								
								    <input type='text' maxlength='80' name='enterdigest' class='form-control' placeholder='Enter the Captcha' required='required'/>
								
									<!-- Do not remove this code. -->
								    <td><img id='imgid' src='https://crm.zoho.com/crm/CaptchaServlet?formId=9d3bc3a95b188bcc05de1fdd4794542ade839b2419e115abacdb1b7352749957&grpid=f6675da4f5b64b7c54aeb859879a87ea594e8fefd20d5f521a0288b1f64c3ca9'>
								    <a href='javascript:;' onclick='reloadImg()'>Reload</a>			
							</div>
						</div>
					</div>

					<div class='row'>
						<div class='col-md-8'> 
							<div class='checkbox'> 
							<input type='text' name='Website' value='".$cur_url."' style='display:none;'/>
								<label><input type='checkbox' name='LEADCF109'/> &nbsp;&nbsp;Yes, send me the latest news and offers!</label>
								
							</div> 
						</div>
						<div class='col-md-4'>
							<div class='custom-int-grp'>
								<input type='submit' value='Send Message' class='form-btn pull-right' />
							</div> 
						</div> 
					</div>

				



					    
			   	</form>
			     <!-- Do not remove this code. -->
			        <iframe name='captchaFrame' style='display:none;'></iframe>
			   </div></div> </div>";
			echo '<div class="bottom_shadow"><img src="'.get_template_directory_uri().'/images/shadow_bottom.png"> </div>
				<div class="fboxes">
			   <div class="fbox fb1">
			       <a href="'. get_site_url().'/why-fsd">
			          <img height="200" width="257" alt="Buy Direct &amp; Save!" src="'.get_template_directory_uri().'/images/buy-direct.jpg">
			          <span style="color: rgb(18, 127, 132);"><strong style="color: rgb(7, 102, 107);">
			            Buy Direct &amp; Save!</strong>Buy direct from the manufacturer!</span>
			      </a>
			   </div>
			   <div class="fbox fb2">
			        <a href="'. get_site_url().'/services/installation">
			        	<img height="200" width="257" alt="Lifetime Warranty" src="'.get_template_directory_uri().'/images/lifetime-warranty.jpg">
			        <span style="color: rgb(20, 130, 136);"><strong style="color: rgb(5, 98, 104);">Lifetime Warranty</strong>When we install your glass. Learn More</span>
			      </a>
			  </div>
			    <div class="fbox fb3">
			       <a href="'. get_site_url().'/diy-center">
			           <img height="200" width="257" alt="Do It Yourselfers Welcome" src="'.get_template_directory_uri().'/images/do-it-yourself.jpg">
			            <span style="color: rgb(20, 131, 137);"><strong style="color: rgb(5, 98, 103);"> Do It Yourselfers Welcome. </strong> DIY type, ey? You’re going to love us. </span>
			       </a>
			   </div>
			</div>


			<div class="fboxes">

				<div class="fbox fb1">
					<a href="'. get_site_url().'/why-fsd">
						<img height="200" width="257" alt="Buy Direct &amp; Save!" src="'.get_template_directory_uri().'/images/certified-installers.jpg">
						<span><strong>Certified Installers</strong>Installation Direct from the Manufacturer</span>
					</a>
				</div>

				<div class="fbox fb2">
					<a href="'. get_site_url().'/services/installation">
						<img height="200" width="257" alt="Lifetime Warranty" src="'.get_template_directory_uri().'/images/frameless-shower-doors.jpg">
						<span><strong>Frameless Shower Doors</strong>Parts &amp; Accessories</span>
					</a>
				</div>

				<div class="fbox fb3">
					<a href="'. get_site_url().'/diy-center">
						<img height="200" width="257" alt="Do It Yourselfers Welcome" src="'.get_template_directory_uri().'/images/contractors-loyalty-program.jpg">
						<span><strong>Contractors Loyalty Program</strong>Learn About Our Contractors Loyalty Program</span>
					</a>
				</div>
			</div></div></div></div>';
?>
			<script>
				var mndFileds=new Array('First Name','Last Name','Email','Phone','LEADCF1','enterdigest');
				var fldLangVal=new Array('First Name','Last Name','Email','Phone','LEADCF1','enterdigest');
				var name='';
				var email='';

			/* Do not remove this code. */
				  function reloadImg() {
				if(document.getElementById('imgid').src.indexOf('&d') !== -1 ) {
				  	  document.getElementById('imgid').src=document.getElementById('imgid').src.substring(0,document.getElementById('imgid').src.indexOf('&d'))+'&d'+new Date().getTime();
				}  else {
				  	  document.getElementById('imgid').src = document.getElementById('imgid').src+'&d'+new Date().getTime();
				 } 
				 }

				  function checkMandatory() {
				for(i=0;i<mndFileds.length;i++) {
				  var fieldObj=document.forms['WebToLeads1429722000001420005'][mndFileds[i]];
				  if(fieldObj) {
					if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length==0) {
					 if(fieldObj.type =='file')
						{ 
						 alert('Please select a file to upload'); 
						 fieldObj.focus(); 
						 return false;
						} 
					alert(fldLangVal[i] +' cannot be empty'); 
				   	  	  fieldObj.focus();
				   	  	  return false;
					}  else if(fieldObj.nodeName=='SELECT') {
				   	   	 if(fieldObj.options[fieldObj.selectedIndex].value=='-None-') {
						alert(fldLangVal[i] +' cannot be none'); 
						fieldObj.focus();
						return false;
					   }
					} else if(fieldObj.type =='checkbox'){
				 	 	 if(fieldObj.checked == false){
						alert('Please accept  '+fldLangVal[i]);
						fieldObj.focus();
						return false;
					   } 
					 } 
					 try {
					     if(fieldObj.name == 'Last Name') {
						name = fieldObj.value;
				 	 	    }
					} catch (e) {}
				    }
				}
			}
			</script>
          
			<?php
	}


function installation_kit(){
	  global $post;
	  $install_kit =   get_post_meta( get_the_ID(), 'tinfini_install_kit_select', true );
	  $install_kit_html = NULL;
$html = '<div class="installation">              
 <div class="col-xs-12">
    <h1>Installation Kit Details</h1>
    <h3 class="underline-tild-sect">  </h3>
    <ul class="bundle-tild-sect"> 
       <li class="glass-type">
          <label>
             <a data-re_keyname="install_kit" data-show_keyname="Installation Kit" title="no-kit" data_installation="no-installation-kit" data-rel="attribute-option-14" dat-cur-rel="attribute-option-13" rel="no-kit">No Installation Kit<img src="'.get_template_directory_uri().'/images/bundled/no-kit.png" />
             </a>
             <a class="btn-v-tild" data-re_keyname="install_kit" data-show_keyname="Installation Kit" title="no-kit" data_installation="no-installation-kit" data-rel="attribute-option-14" dat-cur-rel="attribute-option-13" rel="no-kit">
             <span class="post-title-sect coName">No Installation Kit</span>
             </a>
          </label>
       </li>';
       if($install_kit){
       	foreach ($install_kit as $key => $value) {
          $src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 

          $install_kit_html .= '<li class="glass-type">
             <label>
                <a data-re_keyname="install_kit" data-show_keyname="Installation Kit" title="'.$value.'" data_installation="'.strtolower($value).'-kit" data-rel="attribute-option-14" dat-cur-rel="attribute-option-13" rel="'.$value.'">'.$value.' Kit <img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
                </a>
                <a class="btn-v-tild" data-re_keyname="install_kit" data-show_keyname="Installation Kit" title="'.$value.'" data_installation="'.strtolower($value).'-kit" data-rel="attribute-option-14" dat-cur-rel="attribute-option-13" rel="'.$value.'">
                	<span class="post-title-sect coName">'.$value.'</span></label></li>
                </a>';

          }
       $html .= $install_kit_html; 
       }
          
   $html .= '</ul><div class="abc">
       <div class="hide-tild-sect" id="no-installation-kit" style="display: none;">
          <div class="col-xs-12" id="NoKit">
             <div class="measurements-text fr-well">
                <h3 style="text-align: center;">No Installation Kit Details</h3>
                <div style="text-align: center;" class="mainDesc">Are you sure you have every thing you need to install one of our frameless shower enclosure?</div>

             </div>
          </div>
       </div>

       <div class="hide-tild-sect" id="basic-kit" style="display: block;">
          <div class="col-xs-12" id="Basic">
             <div class="measurements-text fr-well">
                <h3 style="text-align: center;">Basic Installation Kit Details</h3>
                <div style="text-align: center;"><img alt="" src="'.site_url().'/wp-content/uploads/2016/03/basic-kit-sm.jpg"></div>
                <div style="text-align: center;" class="mainDesc">Our installation kits includes just about everything you will need to drill, anchor and secure.</div>
                <div style="text-align: center;" class="detailDesc"><strong>The Kit Includes:</strong>
                1- tube of high quality clear silicone, 1- spearhead drill bit, 2 razor blades, 1/4" plastic anchors and various clear setting blocks, and 4 wood shims.</div>

             </div>
          </div>
       </div>

       <div class="hide-tild-sect" id="complete-kit" style="display: none;">
          <div class="col-xs-12" id="Complete">
             <div class="measurements-text fr-well">
                <h3 style="text-align: center;">Complete Installation Kit</h3>
                <div style="text-align: center;"><img alt="" src="'.site_url().'/wp-content/uploads/2016/03/complete-kit-sm.jpg"></div>
                <div style="text-align: center;" class="mainDesc">Our installation kits includes just about everything you will need to drill, anchor, secure, and lift your new frameless shower enclosure in place.</div>
                <div style="text-align: center;" class="detailDesc"><strong>The Kit Includes: </strong>
                9- pre cut wood shims pack, 2- drill bits (1 spear head &amp; one masonry), 12- anchors, various clear setting blocks, 5- razor blades, 1- tube of high quality clear silicone, 4- 6" L molding temps with double faced tape applied, 1- suction cup and 2- pairs of gloves.</div>
             </div>
          </div>
       </div>
    </div>
 </div>
</div>';

echo $html;
}



function installation_kit_kiosk(){
	
$html = '<div class="installation">              
 <div class="col-xs-12">
    <h1>Installation Kit Details</h1>

    <ul class="bundle-tild-sect" style="margin-top:25px;"> 
       <li class="glass-type" style="width:100% !important; text-align:left !important;">
          <label>
            
			<div class="table-responsive"> 
			 
			 <table width="635" border="0" cellspacing="0" cellpadding="5">
  <tbody>
    <tr>
      <td valign="top" width="230" style="text-align:left !important" > <a data-re_keyname="install_kit" data-show_keyname="Installation Kit" title="no-kit" data_installation="no-installation-kit"  data-rel="attribute-option-14" dat-cur-rel="attribute-option-13" rel="no-kit">No Installation Kit<img src="'.get_template_directory_uri().'/images/bundled/no-kit.png" />
             </a>
             <a class="btn-v-tild" data-re_keyname="install_kit" data-show_keyname="Installation Kit" title="no-kit" data_installation="no-installation-kit" data-rel="attribute-option-14" dat-cur-rel="attribute-option-13" rel="no-kit">
             <span class="post-title-sect coName">No Installation Kit</span>
             </a></td>
			 <td width="15" style="width:15px;"></td>
      <td valign="top" style="text-align: left;" width="390"><h3 style="margin-left:-23px;">No Installation Kit Details</h3>
                <div class="detailDesc" style="color:#000000 !important; font-weight:normal !important">Are you sure you have every thing you need to install one of our frameless shower enclosure?</div></td>
    </tr>
	<tr><td colspan="3" style="padding:35px 0px 35px; 0px;"><hr width="100%"></td></tr>
	
	<tr>
	
	<td valign="top" style="text-align:left !important; " > <a data-re_keyname="install_kit"  title="basic-kit" data_installation="basic-installation-kit" data-rel="attribute-option-14" dat-cur-rel="attribute-option-13" rel="no-kit">basic Installation Kit<img src="'.get_template_directory_uri().'/images/bundled/basic.png" />
             </a>
             <a class="btn-v-tild" data-re_keyname="install_kit" title="basic-kit" data_installation="basic-installation-kit" data-rel="attribute-option-14" dat-cur-rel="attribute-option-13" rel="Basic">
             <span class="post-title-sect coName">Basic Installation Kit</span>
             </a></td>
			 <td></td>
      <td style="text-align: left; "><h3 style="margin-left:-23px;">Basic Installation Kit Details</h3>
               
                <div style="text-align: left; color:#000000 !important; font-weight:normal !important" class="mainDesc">Our installation kits includes just about everything you will need to drill, anchor and secure.</div> <br><br>
				
				<div style="background:#a9aeaf; padding:8px; border:1px solid #333333; width:350px !important">
				<img src="/wp-content/uploads/2016/08/basicinstallkitGray.jpg" style="width:300px !important" /></div>
              <br><br>  <div style="text-align: left; color:#000000 !important; font-weight:normal !important" class="detailDesc"><strong>The Kit Includes:</strong>
                1 - tube of high quality clear silicone <br> 1 - spearhead drill bit <br> 2 - razor blades <br> 1/4" plastic anchors<br/>clear setting blocks various thickness <br/> 4 - wood shims.</div></td>
	
	
	</tr>
	
	<tr><td colspan="3" style="padding:35px 0px 35px; 0px;"><hr width="100%"></td></tr>
	<tr>
	
	<td valign="top" style="text-align:left !important; " id="Complete" > <a data-re_keyname="install_kit"  title="complete-kit" data_installation="complete-installation-kit" data-rel="attribute-option-14" dat-cur-rel="attribute-option-13" rel="no-kit">complete Installation Kit<img src="'.get_template_directory_uri().'/images/bundled/complete.png" />
             </a>
             <a class="btn-v-tild" data-re_keyname="install_kit" title="complete-kit" data_installation="basic-installation-kit" data-rel="attribute-option-14" dat-cur-rel="attribute-option-13" rel="complete">
             <span class="post-title-sect coName">Complete Installation Kit</span>
             </a></td>
			 <td valign="top" ></td>
      <td style="text-align: left; "><h3 style="margin-left:-23px; line-height:0px !important">Complete Installation Kit Details</h3>
                 
               
                <div style="text-align: left; color:#000000 !important; font-weight:normal !important" class="mainDesc">Our installation kits includes just about everything you will need to drill, anchor, secure, and lift your new frameless shower enclosure in place.</div> <br><br>
				<div style="background:#b6bcbc; padding:8px; border:1px solid #333333; width:350px !important"><img src="/wp-content/uploads/2016/08/completeInstallKitGray.jpg" width="300" />
				</div>
             <br><br>   <div style="text-align: left; color:#000000 !important; font-weight:normal !important" class="detailDesc"><strong>The Kit Includes: </strong>
                9 - pre cut wood shims pack <br /> 2 - drill bits (1 spear head &amp; one masonry)<br /> 12 - anchors<br /> clear setting blocks various thickness <br/> 2 - razor blades<br /> 1 - tube of high quality clear silicone<br /> 4 - 6" L molding temps with double faced tape applied<br /> 1 - suction cup and 2 - pairs of gloves.</div></td>
	
	
	</tr>
	
  </tbody>
</table>
</div>
          </label>
       </li>
	   </ul>
      
 </div>
</div>';

echo $html;
}




/*Zoo CRM Froms*/



/*Contact Contractor Form*/

function contact_contractor(){
	$contact_html = '';
	$contact_html = "<div id='crmWebToEntityForm'>
	   <META HTTP-EQUIV ='content-type' CONTENT='text/html;charset=UTF-8'>
	   <form action='https://crm.zoho.com/crm/WebToLeadForm' name='WebToLeads1429722000001420019' method='POST' >

		 <!-- Do not remove this code. -->
		<input type='text' style='display:none;' name='xnQsjsdp' value='f6675da4f5b64b7c54aeb859879a87ea594e8fefd20d5f521a0288b1f64c3ca9'/>
		<input type='hidden' name='zc_gad' id='zc_gad' value=''/>
		<input type='text' style='display:none;' name='xmIwtLD' value='9d3bc3a95b188bcc05de1fdd4794542adf88e5d4a8e6ddfba8ab44c36d2b1ffe'/>
		<input type='text' style='display:none;'  name='actionType' value='TGVhZHM='/>

		<input type='text' style='display:none;' name='returnURL' value='https&#x3a;&#x2f;&#x2f;www.framelessshowerdoors.com&#x2f;thankyou-forms' /> 
		 <!-- Do not remove this code. -->
		
		<div class='row'>
			<div class='col-md-6'>
				<div class='custom-input-group'>
					<input type='text'  maxlength='40' name='First Name' class='form-control landing-form input' placeholder='First Name' required='required'/>
				</div>
			</div>
			<div class='col-md-6'> 
				<div class='custom-input-group'>
					<input type='text'  maxlength='80' name='Last Name' class='form-control landing-form input' placeholder='Last Name' required='required'/>
				</div> 
			</div>
		</div>

		<div class='row'>
			<div class='col-md-12'> 
				<div class='custom-input-group'>
					<input type='text'  maxlength='100' name='Company' placeholder ='Company Name' class='form-control landing-form input' required='required'/>
				</div> 
			</div> 
		</div> 

		<div class='row'>
			<div class='col-md-6'>
				<div class='custom-input-group'>
					<input type='text'  maxlength='30' name='Phone' placeholder='Phone' class='form-control landing-form input' required='required'/>
				</div> 
			</div>
			<div class='col-md-6'> 
				<div class='custom-input-group'>
					<select name='Lead Source'>
						<option value='al'>AL</option>
						<option value='ak'>AK</option>
						<option value='az'>AZ</option>
						<option value='ar'>AR</option>
						<option value='ca'>CA</option>
						<option value='co'>CO</option>
						<option value='ct'>CT</option>
						<option value='de'>DE</option>
						<option value='fl'>FL</option>
						<option value='ga'>GA</option>
						<option value='hi'>HI</option>
						<option value='id'>ID</option>
						<option value='il'>IL</option>
						<option value='in'>IN</option>
						<option value='ia'>IA</option>
						<option value='ks'>KS</option>
						<option value='ky'>KY</option>
						<option value='la'>LA</option>
						<option value='me'>ME</option>
						<option value='md'>MD</option>
						<option value='ma'>MA</option>
						<option value='mi'>MI</option>
						<option value='mn'>MN</option>
						<option value='ms'>MS</option>
						<option value='mo'>MO</option>
						<option value='mt'>MT</option>
						<option value='ne'>NE</option>
						<option value='nv'>NV</option>
						<option value='nh'>NH</option>
						<option value='nj'>NJ</option>
						<option value='nm'>NM</option>
						<option value='ny'>NY</option>
						<option value='nc'>NC</option>
						<option value='nd'>ND</option>
						<option value='oh'>OH</option>
						<option value='ok'>OK</option>
						<option value='or'>OR</option>
						<option value='pa'>PA</option>
						<option value='ri'>RI</option>
						<option value='sc'>SC</option>
						<option value='sd'>SD</option>
						<option value='tn'>TN</option>
						<option value='tx'>TX</option>
						<option value='ut'>UT</option>
						<option value='vt'>VT</option>
						<option value='va'>VA</option>
						<option value='wa'>WA</option>
						<option value='wv'>WV</option>
						<option value='wi'>WI</option>
						<option value='wy'>WY</option>
						<option value='as'>AS</option>
						<option value='dc'>DC</option>
						<option value='fm'>FM</option>
						<option value='gu'>GU</option>
						<option value='mh'>MH</option>
						<option value='mp'>MP</option>
						<option value='pw'>PW</option>
						<option value='pr'>PR</option>
						<option value='vi'>VI</option>
						<option value='ae'>AE</option>
						<option value='aa'>AA</option>
						<option value='ap'>AP</option>
					</select>
				</div>
			</div> 
		</div>

		 <div class='row'>
		 <div class='col-md-12'> 
		<div class='custom-input-group'><input type='email'  maxlength='100' name='Email' placeholder='Email' required='required' /> </div> 
		</div> 
		</div>

		<div class='row'>
			<div class='col-md-8'>
				<div class='checkbox'> 
					<input type='checkbox'  name='LEADCF109' />
					<label><input type='checkbox' name='LEADCF109' required='required' />I agree to received information and offers about the Contractor Loyalty program.</label>
				</div>
			</div>
			<div class='col-md-4'>
				<div class='custom-int-grp'>
					<input type='submit' value='Submit' />
				</div>
			</div> 
		</div>
		</form>
	</div>";
?>
	<script>
	 	  var mndFileds=new Array('First Name','Last Name','Email','Phone','Company');
	 	  var fldLangVal=new Array('First Name','Last Name','Email','Phone','Company');
			var name='';
			var email='';

	 	  function checkMandatory() {
			for(i=0;i<mndFileds.length;i++) {
			  var fieldObj=document.forms['WebToLeads1429722000001420019'][mndFileds[i]];
			  if(fieldObj) {
				if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length==0) {
				 if(fieldObj.type =='file')
					{ 
					 alert('Please select a file to upload'); 
					 fieldObj.focus(); 
					 return false;
					} 
				alert(fldLangVal[i] +' cannot be empty'); 
	   	   	  	  fieldObj.focus();
	   	   	  	  return false;
				}  else if(fieldObj.nodeName=='SELECT') {
	  	   	   	 if(fieldObj.options[fieldObj.selectedIndex].value=='-None-') {
					alert(fldLangVal[i] +' cannot be none'); 
					fieldObj.focus();
					return false;
				   }
				} else if(fieldObj.type =='checkbox'){
	 	 	 	 if(fieldObj.checked == false){
					alert('Please accept  '+fldLangVal[i]);
					fieldObj.focus();
					return false;
				   } 
				 } 
				 try {
				     if(fieldObj.name == 'Last Name') {
					name = fieldObj.value;
	 	 	 	    }
				} catch (e) {}
			    }
			}
		     }
		   
	</script>
    <?php return $contact_html;
}
add_shortcode( 'wp_contact_contractor', 'contact_contractor' );


/*Steam Units Form*/
function steam_units(){
	$steam_units_html = '';
	$steam_units_html = "<div id='crmWebToEntityForm'>
	   <META HTTP-EQUIV ='content-type' CONTENT='text/html;charset=UTF-8'>
	   <form action='https://crm.zoho.com/crm/WebToLeadForm' name='WebToLeads1429722000001420012' method='POST' enctype='multipart/form-data'>

		 <!-- Do not remove this code. -->
		<input type='text' style='display:none;' name='xnQsjsdp' value='f6675da4f5b64b7c54aeb859879a87ea594e8fefd20d5f521a0288b1f64c3ca9'/>
		<input type='hidden' name='zc_gad' id='zc_gad' value=''/>
		<input type='text' style='display:none;' name='xmIwtLD' value='9d3bc3a95b188bcc05de1fdd4794542ae896994a433dbef4fb2489b63147756f'/>
		<input type='text' style='display:none;'  name='actionType' value='TGVhZHM='/>

		<input type='text' style='display:none;' name='returnURL' value='https&#x3a;&#x2f;&#x2f;www.framelessshowerdoors.com&#x2f;thankyou-forms' /> 
		 <!-- Do not remove this code. -->
			<h4 class='align-center margin-bottom-30'>
			<strong>Information Request Form</strong>
			</h4>
				<div class='row'>
						<div class='col-md-6 margin-bottom-10'>
							<div class='custom-input-group'>
								<label>First Name</label>
								<input type='text' class='form-control' maxlength='40' name='First Name' placeholder='First Name' required='required' />
							</div>
						</div>
						<div class='col-md-6 margin-bottom-10'>
							<div class='custom-input-group'>
								<label>Last Name</label>
								<input type='text' class='form-control' maxlength='80' name='Last Name' placeholder='Last Name' required='required' />
							</div>
						</div>



						<div class='col-md-6 margin-bottom-10'>
							<div class='custom-input-group'>
								<label>Email</label>
								<input type='email' class='form-control' maxlength='100' required='required' name='Email' placeholder='Email' />
							</div>
						</div>
						<div class='col-md-6 margin-bottom-10'>
							<div class='custom-input-group'>
								<label>Phone</label>
								<input type='text' class='form-control' maxlength='30' required='required' name='Phone' placeholder='Phone' />
							</div>
						</div>



						<div class='col-md-12 margin-bottom-10'>
							<div class='custom-input-group'>
								<label>Upload Photo</label>
								<input type='file' class='form-control' name='theFile' required='required' id='theFile' multiple/>
							</div>
						</div>



						<div class='col-md-12 margin-bottom-10'>
							<div class='custom-input-group'>
								<label>Message</label>
								<textarea class='form-control' placeholder='Message' name='LEADCF1'></textarea>
							</div>
						</div>



						<div class='col-md-12 margin-bottom-10'>
							<div class='custom-input-group'>
								<label>State</label>
								<select name='Lead Source'>
									<option value='al'>AL</option>
									<option value='ak'>AK</option>
									<option value='az'>AZ</option>
									<option value='ar'>AR</option>
									<option value='ca'>CA</option>
									<option value='co'>CO</option>
									<option value='ct'>CT</option>
									<option value='de'>DE</option>
									<option value='fl'>FL</option>
									<option value='ga'>GA</option>
									<option value='hi'>HI</option>
									<option value='id'>ID</option>
									<option value='il'>IL</option>
									<option value='in'>IN</option>
									<option value='ia'>IA</option>
									<option value='ks'>KS</option>
									<option value='ky'>KY</option>
									<option value='la'>LA</option>
									<option value='me'>ME</option>
									<option value='md'>MD</option>
									<option value='ma'>MA</option>
									<option value='mi'>MI</option>
									<option value='mn'>MN</option>
									<option value='ms'>MS</option>
									<option value='mo'>MO</option>
									<option value='mt'>MT</option>
									<option value='ne'>NE</option>
									<option value='nv'>NV</option>
									<option value='nh'>NH</option>
									<option value='nj'>NJ</option>
									<option value='nm'>NM</option>
									<option value='ny'>NY</option>
									<option value='nc'>NC</option>
									<option value='nd'>ND</option>
									<option value='oh'>OH</option>
									<option value='ok'>OK</option>
									<option value='or'>OR</option>
									<option value='pa'>PA</option>
									<option value='ri'>RI</option>
									<option value='sc'>SC</option>
									<option value='sd'>SD</option>
									<option value='tn'>TN</option>
									<option value='tx'>TX</option>
									<option value='ut'>UT</option>
									<option value='vt'>VT</option>
									<option value='va'>VA</option>
									<option value='wa'>WA</option>
									<option value='wv'>WV</option>
									<option value='wi'>WI</option>
									<option value='wy'>WY</option>
									<option value='as'>AS</option>
									<option value='dc'>DC</option>
									<option value='fm'>FM</option>
									<option value='gu'>GU</option>
									<option value='mh'>MH</option>
									<option value='mp'>MP</option>
									<option value='pw'>PW</option>
									<option value='pr'>PR</option>
									<option value='vi'>VI</option>
									<option value='ae'>AE</option>
									<option value='aa'>AA</option>
									<option value='ap'>AP</option>
								</select>
							</div>
						</div>


					
						<div class='col-md-12'>
							<div class='custom-input-group'>
								<input type='submit' value='Send Message' class='doorreturn btn dark-btn custom_orange_btn  btn-v4 inline align-center'/>
							</div>
						</div>
					
				</div>			
		</form>
	</div>";


?>
		<script>
	 	  var mndFileds=new Array('First Name','Last Name','Email','Phone','LEADCF1');
	 	  var fldLangVal=new Array('First Name','Last Name','Email','Phone','LEADCF1');
			var name='';
			var email='';

		function checkMandatory() {
			for(i=0;i<mndFileds.length;i++) {
				var fieldObj=document.forms['WebToLeads1429722000001420012'][mndFileds[i]];
				if(fieldObj) {
					if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length==0) {
					 	if(fieldObj.type =='file')
						{ 
							alert('Please select a file to upload'); 
							fieldObj.focus(); 
							return false;
						} 
						alert(fldLangVal[i] +' cannot be empty'); 
				  	    fieldObj.focus();
				  	    return false;
					}else if(fieldObj.nodeName=='SELECT') {
					 	if(fieldObj.options[fieldObj.selectedIndex].value=='-None-') {
							alert(fldLangVal[i] +' cannot be none'); 
							fieldObj.focus();
							return false;
					    }
					}else if(fieldObj.type =='checkbox'){
						if(fieldObj.checked == false){
							alert('Please accept  '+fldLangVal[i]);
							fieldObj.focus();
							return false;
					    } 
					} 
					try {
					    if(fieldObj.name == 'Last Name') {
							name = fieldObj.value;    }
					} catch (e) {}
				}
			}
			return validateFileUpload();
		}
		function validateFileUpload(){
		 var uploadedFiles = document.getElementById('theFile'); 
		 var totalFileSize =0; 
		 if(uploadedFiles.files.length >3){ 
			 alert('You can upload a maximum of 3 files at a time.'); 
			 return false; 
		 } 
		 if ('files' in uploadedFiles) { 
			 if (uploadedFiles.files.length != 0) { 
				 for (var i = 0; i < uploadedFiles.files.length; i++) { 
					 var file = uploadedFiles.files[i]; 
					 if ('size' in file) { 
						 totalFileSize = totalFileSize + file.size; 
					 } 
				 } 
				 if(totalFileSize > 20971520){ 
					 alert('Total File(s) size should not exceed 20 MB.'); 
					 return false; 
				 } 
			 } 
		 } 
		}
	</script>	
    <?php return $steam_units_html;
}
add_shortcode( 'wp_steam_units', 'steam_units' );



/*Tour Form*/
function tour_form(){
	$tour_form_html = '';
	$tour_form_html = "<div id='crmWebToEntityForm'>
		   <META HTTP-EQUIV ='content-type' CONTENT='text/html;charset=UTF-8'>
		   <form action='https://crm.zoho.com/crm/WebToLeadForm' name='WebToLeads1429722000002041873' method='POST' 
		   onSubmit ='javascript: return checkMandatory();' accept-charset='UTF-8'>

			 <!-- Do not remove this code. -->
			<input type='text' style='display:none;' name='xnQsjsdp' value='f6675da4f5b64b7c54aeb859879a87ea594e8fefd20d5f521a0288b1f64c3ca9'/>
			<input type='hidden' name='zc_gad' id='zc_gad' value=''/>
			<input type='text' style='display:none;' name='xmIwtLD' value='9d3bc3a95b188bcc05de1fdd4794542aa6906036b9aca9c9711f7136498b2fbb'/>
			<input type='text' style='display:none;'  name='actionType' value='TGVhZHM='/>

			<input type='text' style='display:none;' name='returnURL' value='https&#x3a;&#x2f;&#x2f;www.framelessshowerdoors.com&#x2f;thankyou-forms' /> 
			 <!-- Do not remove this code. -->
			
			
			<p style='padding: 14px 0px 10px;'><strong>Tour Form</strong></p>
			<div class='row'>
				<div class='col-md-6'>
					<div class='custom-input-group'>
						<input type='text'  maxlength='40' name='First Name' placeholder='First Name' class='input' required='required'/>
					</div>
				</div>
				<div class='col-md-6'>
					<div class='custom-input-group'>
						<input type='text'  maxlength='80' name='Last Name' placeholder='Last Name' class='input' required='required'/>
					</div>
				</div>
			</div>

			<div class='row'>
				<div class='col-md-6'>
					<div class='custom-input-group'>
						<input type='text'  maxlength='30' name='Phone' placeholder='Phone' class='input' required='required'/>
					</div>
				</div>
				<div class='col-md-6'>
					<div class='custom-input-group'>
						<input type='email'  maxlength='100' name='Email' placeholder='Email' class='input' required='required'/>
					</div>
				</div>
			</div>

			<div class='row'>
				<div class='col-md-6'>
					<div class='custom-input-group'>
						<input type='text'  maxlength='255' name='LEADCF11' placeholder='No. Of Guests' class='input' required='required' />
					</div>
				</div>
				<div class='col-md-6'>
					<div class='custom-input-group'>
						<select name='Lead Source' id='state' class='form-control'>
							<option value='al'>AL</option>
							<option value='ak'>AK</option>
							<option value='az'>AZ</option>
							<option value='ar'>AR</option>
							<option value='ca'>CA</option>
							<option value='co'>CO</option>
							<option value='ct'>CT</option>
							<option value='de'>DE</option>
							<option value='fl'>FL</option>
							<option value='ga'>GA</option>
							<option value='hi'>HI</option>
							<option value='id'>ID</option>
							<option value='il'>IL</option>
							<option value='in'>IN</option>
							<option value='ia'>IA</option>
							<option value='ks'>KS</option>
							<option value='ky'>KY</option>
							<option value='la'>LA</option>
							<option value='me'>ME</option>
							<option value='md'>MD</option>
							<option value='ma'>MA</option>
							<option value='mi'>MI</option>
							<option value='mn'>MN</option>
							<option value='ms'>MS</option>
							<option value='mo'>MO</option>
							<option value='mt'>MT</option>
							<option value='ne'>NE</option>
							<option value='nv'>NV</option>
							<option value='nh'>NH</option>
							<option value='nj'>NJ</option>
							<option value='nm'>NM</option>
							<option value='ny'>NY</option>
							<option value='nc'>NC</option>
							<option value='nd'>ND</option>
							<option value='oh'>OH</option>
							<option value='ok'>OK</option>
							<option value='or'>OR</option>
							<option value='pa'>PA</option>
							<option value='ri'>RI</option>
							<option value='sc'>SC</option>
							<option value='sd'>SD</option>
							<option value='tn'>TN</option>
							<option value='tx'>TX</option>
							<option value='ut'>UT</option>
							<option value='vt'>VT</option>
							<option value='va'>VA</option>
							<option value='wa'>WA</option>
							<option value='wv'>WV</option>
							<option value='wi'>WI</option>
							<option value='wy'>WY</option>
							<option value='as'>AS</option>
							<option value='dc'>DC</option>
							<option value='fm'>FM</option>
							<option value='gu'>GU</option>
							<option value='mh'>MH</option>
							<option value='mp'>MP</option>
							<option value='pw'>PW</option>
							<option value='pr'>PR</option>
							<option value='vi'>VI</option>
							<option value='ae'>AE</option>
							<option value='aa'>AA</option>
							<option value='ap'>AP</option>
						</select>
					</div>
				</div>
			</div>

			<div class='row'>
				<div class='col-md-12'>
					<div class='custom-input-group'>
						<input type='submit' value='Submit' class='formButton custom-send'/>
					</div>
				</div>
			</div>
			</form>
		</div>";
?>
		<script type="text/javascript">
 	  var mndFileds=new Array('Last Name');
 	  var fldLangVal=new Array('Last Name');
		var name='';
		var email='';

 	  function checkMandatory() {
 	  	//alert('hi');
		for(i=0;i<mndFileds.length;i++) {
		  var fieldObj=document.forms['WebToLeads1429722000002041873'][mndFileds[i]];
		  if(fieldObj) {
			if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length==0) {
			 if(fieldObj.type =='file')
				{ 
				 alert('Please select a file to upload'); 
				 fieldObj.focus(); 
				 return false;
				} 
			alert(fldLangVal[i] +' cannot be empty'); 
   	   	  	  fieldObj.focus();
   	   	  	  return false;
			}  else if(fieldObj.nodeName=='SELECT') {
  	   	   	 if(fieldObj.options[fieldObj.selectedIndex].value=='-None-') {
				alert(fldLangVal[i] +' cannot be none'); 
				fieldObj.focus();
				return false;
			   }
			} else if(fieldObj.type =='checkbox'){
 	 	 	 if(fieldObj.checked == false){
				alert('Please accept  '+fldLangVal[i]);
				fieldObj.focus();
				return false;
			   } 
			 } 
			 try {
			     if(fieldObj.name == 'Last Name') {
				name = fieldObj.value;
 	 	 	    }
			} catch (e) {}
		    }
		}
	     }
	   
</script>
		
    <?php return $tour_form_html;
}
add_shortcode( 'wp_tour_form', 'tour_form' );


/*Send us massage Form*/
function send_us_msg_form(){
	$return_string ='<div id="crmWebToEntityFor" style="margin:auto;">
   <META HTTP-EQUIV ="content-type" CONTENT="ext/html;charset=UTF-8">
   <form action="https://crm.zoho.com/crm/WebToLeadForm" name="WebToLeads1429722000002827799" method="POST" onSubmit="javascript:document.charset="UTF-8"; return checkMandatory()" accept-charset="UTF-8">

	 <!-- Do not remove this code. -->
	<input type="te" style="display:none;" name="xnQsjsdp" value="f6675da4f5b64b7c54aeb859879a87ea594e8fefd20d5f521a0288b1f64c3ca9"/>
	<input type="hidden" name="zc_gad" id="zc_gad" value=""/>
	<input type="text" style="display:none;" name="xmIwtLD" value="9d3bc3a95b188bcc05de1fdd4794542ad57108199fdf1ed19a790e4b07fe22db"/>
	<input type="text" style="display:none;"  name="actionType" value="TGVhZHM="/>

	<input type="text" style="display:none;"" name="returnURL" value="https&#x3a;&#x2f;&#x2f;www.framelessshowerdoors.com&#x2f;thankyou-contact" /> 
	 <!-- Do not remove this code. -->
	<div class="row"> 
			<div class="col-md-12"> 
				<input type="text"  maxlength="40" name="First Name"  placeholder="First Name" required="required" />
			</div> 
		</div>
		<div class="row"> 
			<div class="col-md-12"> 
				<input type="text" maxlength="80" name="Last Name"  placeholder="Last Name" required="required"/>
			</div> 
		</div>
		<div class="row"> 
			<div class="col-md-12"> 
				<input type="text"  maxlength="30" name="Phone" placeholder="Your Phone Number" required="required" />
			</div> 
		</div>
		<div class="row"> 
			<div class="col-md-12"> 
				<input type="email"  maxlength="100" name="Email" placeholder="Your Email Address" required="required"  />
			</div> 
		</div>
		<div class="row"> 
			<div class="col-md-12"> 
				<select id="state"  name="Lead Source">
					<option value="AL">AL</option>
					<option value="AK">AK</option>
					<option value="AZ">AZ</option>
					<option value="AR">AR</option>
					<option value="CA">CA</option>
					<option value="CO">CO</option>
					<option value="CT">CT</option>
					<option value="DE">DE</option>
					<option value="FL">FL</option>
					<option value="GA">GA</option>
					<option value="HI">HI</option>
					<option value="ID">ID</option>
					<option value="IL">IL</option>
					<option value="IN">IN</option>
					<option value="IA">IA</option>
					<option value="KS">KS</option>
					<option value="KY">KY</option>
					<option value="LA">LA</option>
					<option value="ME">ME</option>
					<option value="MD">MD</option>
					<option value="MA">MA</option>
					<option value="MI">MI</option>
					<option value="MN">MN</option>
					<option value="MS">MS</option>
					<option value="MO">MO</option>
					<option value="MT">MT</option>
					<option value="NE">NE</option>
					<option value="NV">NV</option>
					<option value="NH">NH</option>
					<option value="NJ">NJ</option>
					<option value="NM">NM</option>
					<option value="NY">NY</option>
					<option value="NC">NC</option>
					<option value="ND">ND</option>
					<option value="OH">OH</option>
					<option value="OK">OK</option>
					<option value="OR">OR</option>
					<option value="PA">PA</option>
					<option value="RI">RI</option>
					<option value="SC">SC</option>
					<option value="SD">SD</option>
					<option value="TN">TN</option>
					<option value="TX">TX</option>
					<option value="UT">UT</option>
					<option value="VT">VT</option>
					<option value="VA">VA</option>
					<option value="WA">WA</option>
					<option value="WV">WV</option>
					<option value="WI">WI</option>
					<option value="WY">WY</option>
					<option value="AS">AS</option>
					<option value="DC">DC</option>
					<option value="FM">FM</option>
					<option value="GU">GU</option>
					<option value="MH">MH</option>
					<option value="MP">MP</option>
					<option value="PW">PW</option>
					<option value="PR">PR</option>
					<option value="VI">VI</option>
					<option value="AE">AE</option>
					<option value="AA">AA</option>
					<option value="AP">AP</option>
				</select>
			</div> 
		</div>
		<div class="row">
			<div id="captcha-cnt" class="col-md-6">
				<!-- Do not remove this code. -->
			    <img src="https://crm.zoho.com/crm/CaptchaServlet?formId=9d3bc3a95b188bcc05de1fdd4794542ade839b2419e115abacdb1b7352749957&amp;grpid=f6675da4f5b64b7c54aeb859879a87ea594e8fefd20d5f521a0288b1f64c3ca9" id="imgid">
			    <a onclick="reloadImg()" href="javascript:;">Reload</a>	
			    <input  style="margin-top: 12px;" type="text" placeholder="Enter the Captcha" name="enterdigest" maxlength="80" required="required">		
			</div>
		</div>
		<div class="row"> 
			<div class="col-md-12"> 
				<input  type="submit" value="Send Message" />
			</div> 
		</div>
		<div class="row"> 
			<div class="col-md-12"> 
				<div class="checkbox">
					<label><input type="checkbox" name="LEADCF109">Yes, send me the latest news and offers!</label>
				</div>
			</div> 
		</div>
	</form>
  <!-- Do not remove this code. -->
     <iframe name="captchaFrame" style="display:none;"></iframe>
</div>'; ?>
<script>
 	  var mndFileds=new Array('Last Name');
 	  var fldLangVal=new Array('Last Name');
		var name='';
		var email='';

  /* Do not remove this code. */
 	  function reloadImg() {
		if(document.getElementById('imgid').src.indexOf('&d') !== -1 ) {
  	  	  document.getElementById('imgid').src=document.getElementById('imgid').src.substring(0,document.getElementById('imgid').src.indexOf('&d'))+'&d'+new Date().getTime();
		}  else {
  	  	  document.getElementById('imgid').src = document.getElementById('imgid').src+'&d'+new Date().getTime();
		 } 
 	 }

 	  function checkMandatory() {
		for(i=0;i<mndFileds.length;i++) {
		  var fieldObj=document.forms['WebToLeads1429722000002827799'][mndFileds[i]];
		  if(fieldObj) {
			if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length==0) {
			 if(fieldObj.type =='file')
				{ 
				 alert('Please select a file to upload'); 
				 fieldObj.focus(); 
				 return false;
				} 
			alert(fldLangVal[i] +' cannot be empty'); 
   	   	  	  fieldObj.focus();
   	   	  	  return false;
			}  else if(fieldObj.nodeName=='SELECT') {
  	   	   	 if(fieldObj.options[fieldObj.selectedIndex].value=='-None-') {
				alert(fldLangVal[i] +' cannot be none'); 
				fieldObj.focus();
				return false;
			   }
			} else if(fieldObj.type =='checkbox'){
 	 	 	 if(fieldObj.checked == false){
				alert('Please accept  '+fldLangVal[i]);
				fieldObj.focus();
				return false;
			   } 
			 } 
			 try {
			     if(fieldObj.name == 'Last Name') {
				name = fieldObj.value;
 	 	 	    }
			} catch (e) {}
		    }
		}
	     }
	   
</script>
<?php 
	return $return_string;
}
add_shortcode( 'send_us_msg_form','send_us_msg_form' );


/*Check if category has sub category or not*/
function has_term_have_children( $term_id = '', $taxonomy = 'product_cat' )
{
    // Check if we have a term value, if not, return false
    if ( !$term_id ) 
        return false;

    // Get term children
    $term_children = get_term_children( filter_var( $term_id, FILTER_VALIDATE_INT ), filter_var( $taxonomy, FILTER_SANITIZE_STRING ) );

    // Return false if we have an empty array or WP_Error object
    if ( empty( $term_children ) || is_wp_error( $term_children ) )
    return false;

    return true;
}