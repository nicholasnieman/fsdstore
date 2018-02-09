<?php
/*Template Name: Custom Shower Doors*/

	//get_header();

	get_header( 'inner' );

?>	
<?php global $frame_breadcumb;?>
		<div id="mwrapbg">
		  <div id="mbar">
		    <div id="mwrap">
		      <div id="main">
		      	<div id="main-header">
					<h2> <?php the_title();?> </h2>
					<div id="buying-guide"><a href=" <?php bloginfo('url'); ?>/buying-guide/">Buying Guide</a></div>
					<div id="need-help"><a href=" <?php bloginfo('url'); ?>/contact/">Need Help?</a></div> 
		      	</div>
	            <div class="breadcrumbs">
					<ul>
						<li class="cms_page">
							<?php 
								if ((class_exists('frame_breadcrumb_class'))) {$frame_breadcumb->custom_breadcrumb();}
							?>
						</li>
					</ul>
				</div>
					 
		        <div class="main50 cms-shower-doors-custom">
		       
		        	
				


					    	<!-- <div id="galslider1" class="b4afterWrap"> -->

								<div class=" worked left">

						    		<?php
						    			echo '<div id="custom-shower-slider">';
							    			if( get_field('_image_upload',get_the_ID()) ): 
							    				while( has_sub_field('_image_upload',get_the_ID()) ): 

				    								$img_url = get_sub_field('_image_boxx');
				    							//echo '<pre>'.print_r($img_url).'</pre>';
				    								echo '<div class="item">
				    									<a href="'.$img_url['url'].'"> <img src="'.$img_url['url'].'"/>
				    									</a>
				    								</div>';

							    				endwhile;
							    			endif;
						    			echo ' </div>';
							    	?>
							    	
							    </div>

						<!-- 	    <div class="right"> -->
							    	<div class="right">
							    	    <div style="padding-bottom:0px" id="oftxt1">
							    	        <h2>Building Your Custom Shower</h2>

							    	        <p>

							    	        </p><div class="category-description">
							    	        Over the last two decades&mdash;we've seen it all. From the smallest single door, to a nine panel custom angled frameless steam room enclosure or an all glass wine cellar. Nothing is too small, large, or too technical for our expert manufactures or installers. Simply find one of our posted designs, print it, and make the changes that best describe your opening. We will take what you provide us and use it as a starting point to get your design where it needs to be so you can begin to visualize your dream, and make it come true. 

							    	We feel the best way for us design you the perfect custom shower enclosure is to simply attach a photo of your opening and let us do what we do best. If you have any questions feel free to send us a message or give us a call at 954-757-2114.

							    	        </div>
							    	        <p></p>
							    	        <p style="margin:0px !important">
							    	            If you would like assistance or have any questions please contact us at: 954-757-2114, or you can <a href="mailto:quotes@fsdae.com">email us</a>.
							    	        </p>
							    	    </div>
							    	    <div id="oftxt2">
							    	        <div id="fform">
							    	          <form action='https://crm.zoho.com/crm/WebToLeadForm' name=WebToLeads1429722000001420012 method='POST' enctype='multipart/form-data' onSubmit='javascript:document.charset="UTF-8"; return checkMandatory()' accept-charset='UTF-8'>

	 <!-- Do not remove this code. -->
	<input type='text' style='display:none;' name='xnQsjsdp' value='f6675da4f5b64b7c54aeb859879a87ea594e8fefd20d5f521a0288b1f64c3ca9'/>
	<input type='hidden' name='zc_gad' id='zc_gad' value=''/>
	<input type='text' style='display:none;' name='xmIwtLD' value='9d3bc3a95b188bcc05de1fdd4794542ae896994a433dbef4fb2489b63147756f'/>
	<input type='text' style='display:none;'  name='actionType' value='TGVhZHM='/>

	<input type='text' style='display:none;' name='returnURL' value='https&#x3a;&#x2f;&#x2f;www.framelessshowerdoors.com&#x2f;thankyou-steamunit' /> 
	 <!-- Do not remove this code. -->

							    	                <fieldset>
							    	       
							    	                    <ol>
							    	                        <li>
							    	                            <label>First Name</label>
							    	                            <input type='text' class='form-control' maxlength='40' name='First Name' />
							    	                        </li>
							    	                        <li>
							    	                            <label>Last Name</label>
							    	                            <input type='text' class='form-control' maxlength='80' name='Last Name' />
							    	                        </li>
							    	                        <li>
							    	                            <label>Email</label>
							    	                            <input type='text' class='form-control' maxlength='100' name='Email' />
							    	                        </li>
							    	                        <li>
							    	                            <label>Phone </label>
							    	                            <input type='text' class='form-control' maxlength='30' name='Phone'  />
							    	                        </li>
							    	                        <li>
							    	                            <label>Upload Photo </label>
							    	                            <input type='file' class='form-control' name='theFile' id='theFile' multiple/>
							    	                        </li>
							    	                        <li class="wide ">
							    	                            <label>Message</label>
							    	                            <input type="text"   class="required-entry input" name="LEADCF1" id="message">
							    	                        </li>
							    	                        <li class="wide submit">							    	                           
							    	                            <input type='submit' id="gobtn" value='Build My Custom Shower' class='form-btn pull-left'/>
							    	                        </li>
							    	                    </ol>
							    	                    <div id="btn-submit"></div>
							    	                </fieldset>
                                                    <script>
 	  var mndFileds=new Array('Last Name','Email','Phone');
 	  var fldLangVal=new Array('Last Name','Email','Phone');
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
							    	            </form>
							    	        </div>
							    	    </div>
							    	    <div class="ofshadow"></div>
							    	</div>
							    <!-- </div> -->
							<!-- </div> -->
						
						
						
			         	<div class="clear"></div>
		        	</div>
		        </div>
		      </div>
		    </div>
		  </div>

		

<?php

get_footer();

?>