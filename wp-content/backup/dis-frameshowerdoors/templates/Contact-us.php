<?php
/*Template Name: Contact Us*/

	//get_header();

	get_header( 'inner' );

?>	

<?php global $frame_breadcumb;?>
<div id="mwrapbg">
	<div id="mbar">
		<div id="mwrap">
		    <div id="main">
		      	<!-- div id="main-header" class="relative">
					<h2> Contact Us </h2>
					<div id="locddc">
						<div><a id="locddbtn" class="ddopen">Select an FSD Florida Satellite Location</a></div>
						<div id="locdd">
							<ul>
							<li><a href="<?php bloginfo('url'); ?>/contact/" target="_blank">Coral Springs, FL - World HQ</a></li>
							<li><a href="<?php bloginfo('url'); ?>/hollywood" target="_blank">Hollywood, FL</a></li>
							<li><a href="<?php bloginfo('url'); ?>/pompano-beach" target="_blank">Pompano Beach, FL</a></li>
							<li><a href="<?php bloginfo('url'); ?>/sunrise" target="_blank">Sunrise, FL</a></li>
							<li><a href="<?php bloginfo('url'); ?>/delray-beach" target="_blank">Delray Beach, FL</a></li>
							<li><a href="<?php bloginfo('url'); ?>/west-palm-beach" target="_blank">West Palm Beach, FL</a></li>
							<li><a href="<?php bloginfo('url'); ?>/port-st-lucie" target="_blank">Port ST Lucie, FL</a></li>
							<li><a href="<?php bloginfo('url'); ?>/doral" target="_blank">Doral, FL</a></li>
							<li><a href="<?php bloginfo('url'); ?>/palmetto-bay" target="_blank">Palmetto Bay, FL</a></li>
							<li><a href="<?php bloginfo('url'); ?>/lake-worth" target="_blank">Lake Worth, FL</a></li>
							</ul>
						</div>
					</div>
		      	</div> -->
		      	      	<div id="main-header">
		      	      		<?php  $page_title=get_field('_page_title');
		      	      			if($page_title!=''){
		      	      				echo '<h2>'. $page_title.'</h2>';
		      	      			}
		      	      			else{
		      	      				if(get_the_title() == 'hialeah'){

		      	      				}{
		      	      					echo '<h2>'. get_the_title().'</h2>';	
		      	      				}
		      	      				
		      	      			}
		      	      		 ?>
		      				
		      				<div id="buying-guide"><a href="<?php bloginfo('url'); ?>/buying-guide/">Buying Guide</a></div>
		      				<div id="need-help"><a href="<?php bloginfo('url'); ?>/contact/">Need Help?</a></div> 
		      	      	</div>
		        <div class="main">
		        	<?php if(have_posts()) : ?>
   						<?php while(have_posts()) : the_post(); ?>
   						
   								<?php the_content(); ?>
   							
   						<?php endwhile; ?>
					<?php endif; ?>
					<div class="popup" id="send-msg">
						<div class="pwin">
						    <div id="contactPopup">
						  		<a class="b-close close">Close</a>
								<?php //echo do_shortcode('[send_us_msg_form]'); ?>

								<div id='crmWebToEntityForm'>
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
										<div class='col-md-12'> 
											<div class='custom-input-group'> 
												<input type='text' class='form-control' maxlength='40' name='First Name' placeholder='First Name' />
											</div> 
										</div>
									</div>
									<div class='row'> 
										<div class='col-md-12'>
											<div class='custom-input-group'> 
												<input type='text' class='form-control' maxlength='80' name='Last Name' placeholder='Last Name' />
											</div>
										</div> 
									</div>

									<div class='row'>
										<div class='col-md-12'>
											<div class='custom-input-group'> <input type='text' class='form-control' maxlength='30' name='Phone' placeholder='Phone' /></div>
										</div> 
									</div>
									<div class='row'> 
										<div class='col-md-12'>
											<div class='custom-input-group'> <input type='text' class='form-control' maxlength='100' name='Email' placeholder='Email' /> </div>
										</div>
									</div> 

									<div class='row'>
										<div class='col-md-12'>
											<div class='custom-input-group'>
												<input type='text'  maxlength='255' class='form-control' name='LEADCF1' placeholder='message' />
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
											<div id="captcha-cnt" class='custom-input-group'>
												
												    <input type='text' maxlength='80' name='enterdigest' class='form-control' placeholder='Enter the Captcha'/>
												
													<!-- Do not remove this code. -->
												    <td><img id='imgid' src='https://crm.zoho.com/crm/CaptchaServlet?formId=9d3bc3a95b188bcc05de1fdd4794542ade839b2419e115abacdb1b7352749957&grpid=f6675da4f5b64b7c54aeb859879a87ea594e8fefd20d5f521a0288b1f64c3ca9'>
												    <a href='javascript:;' onclick='reloadImg()'>Reload</a>			
											</div>
										</div>
									</div>

									<div class='row'>
										<div class='col-md-8'> 
											<div class='checkbox'> 
												<label><input type='checkbox' name='LEADCF109' />Yes, send me the latest news and offers!</label>
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
								</div>
								<script>
				var mndFileds=new Array('First Name','Last Name','Email','Phone');
				var fldLangVal=new Array('First Name','Last Name','Email','Phone');
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
					  		</div>
					   </div>
					</div>
			    </div>  
			</div>
		</div>
	</div>
</div>

<?php

get_footer();

?>