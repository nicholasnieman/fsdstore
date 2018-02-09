		<?php require_once( 'header.php' ); ?>

		<div id="DBcontainer">
			<img id="DBlogo" src="assets/images/DBLogo.png" alt="">
		</div>
		
		<!-- Content -->
		<div id="main-container">

			<!-- Requests/FAQ -->
			<section id="request-container">
				<h2 id="welcome">WELCOME TO D&amp;B TILE DISTRIBUTORS PORTAL</h2>
				<p><strong>The Original Frameless Shower Doors partners are an extension of our team and we created a partner portal to effectively address your needs.</strong> In this portal you are able to submit a customer referral, learn how to answer customers frequently asked questions, and submit a request for items needed for your store.</p>

				<!-- Tab links -->
				<div id="tab-container">
					<button id="defaultOpen" class="tablinks" onClick="openTab(event, 'faq')">CUSTOMER FAQ'S</button>
					<button id="right-tab" class="tablinks" onClick="openTab(event, 'request-form')">STORE REQUESTS</button>
				</div>

				<!-- FAQ accordian -->
				<div id="faq" class="tabcontent">
					<button id="panelDefault" class="accordion">Who is The Original Frameless Shower Doors?</button>
					<div class="panel">
					  <p class="panel-content">For over 25 years we have designed, manufactured, shipped, and installed custom glass frameless shower door enclosures for homeowners and contractors all over the globe. We provide FREE in-home estimates from our design experts and installation by our highly trained certified installers.</p>
					</div>

					<button class="accordion">What is StayCLEAN&#8482;?</button>
					<div class="panel">
					  <p class="panel-content">Stay<strong>CLEAN&#8482;</strong> is an award winning and patented nanotechnology process which makes glass surfaces easier to clean by making them water and oil repellent.</p>
					  <p class="panel-content paragraph2">Our Stay<strong>CLEAN&#8482;</strong> glass has an ultra thin protective layer of optically clear material, which makes the surface significantly easier to clean and resists weathering. The bond created is a covalent bond, meaning the coating actually shares electrons with molecules in the glass itself, thus becoming part of the glass. Covalent bonds are approximately 10 times stronger than hydrogen-bridge bonds, which are commonly used in most other glass.</p>
					</div>

					<button class="accordion">What is the difference between clear and low iron glass?</button>
					<div class="panel">
					  <p class="panel-content"><strong>Low iron glass</strong> is ultra clear and provides a higher degree of transparency than clear float glass. This optimum clarity is achieved by removing most of the iron oxide content used to produce glass.</p>
					  <p class="panel-content paragraph2">While regular <strong>clear glass</strong> does not have substantially high iron content, it is higher than low iron glass. Due to this higher iron content, clear glass has a greenish tint to it.</p>
					</div>
				</div>
				
				<!-- Request form -->
				<form id="request-form" class="tabcontent" method="post" action="request-email.php" name="request-form">
					<div class="request-field">
						<label for="request-first-name">First Name</label>
						<input type="text" name="request-first-name" id="request-first-name" required>
					</div>

					<div class="request-field">
						<label for="request-last-name">Last Name</label>
						<input type="text" name="request-last-name" id="request-last-name" required>
					</div>	

					<div class="request-field">
						<label for="request-location">Store Location</label>
						<input type="text" name="request-location" id="request-location" required>
					</div>

					<div id="request-message">
						<label for="request-form-message">Message</label>
						<textarea name="request-form-message" id="request-form-message" rows="4" required></textarea>
					</div>

					<input id="request-submit" name="submit" class="submit" type="submit" value="Submit">
				</form>
			</section>

			<!-- Referral form -->
			<section id="referral-container" >
				<div id="crmWebToEntityForm">
					<form action='https://crm.zoho.com/crm/WebToLeadForm' name=WebToLeads1429722000029566825 method='POST' onSubmit='javascript:document.charset="UTF-8"; return checkMandatory()' accept-charset='UTF-8'>
						<!-- Do not remove this code. -->
		                <input type='text' style='display:none;' name='xnQsjsdp' value='f6675da4f5b64b7c54aeb859879a87ea594e8fefd20d5f521a0288b1f64c3ca9'/>
		                <input type='hidden' name='zc_gad' id='zc_gad' value=''/>
		                <input type='text' style='display:none;' name='xmIwtLD' value='9d3bc3a95b188bcc05de1fdd4794542ae1c0bb3f5c00b7bc5ccd13d6449e7eb5'/>
		                <input type='text' style='display:none;'  name='actionType' value='TGVhZHM='/>
		                <input type='text' style='display:none;' name='returnURL' value='https&#x3a;&#x2f;&#x2f;www.framelessshowerdoors.com&#x2f;thankyou-forms' /> 
		                <div style="display:none;" ><input type="text" style="width:250px;"  maxlength="255" name="LEADCF200" value="D&amp;B&#x20;Tile"></input></div>

						<div id="employee-info">
							<h3>Customer Referral</h3>
							<label for="referral-sales-rep">D&amp;B Sales Representative Name</label>
							<input class="referral-field" type="text" name="LEADCF201" id="referral-sales-rep" required>
							<label for="referral-location">Branch/Location</label>
							<input class="referral-field" type="text" name="LEADCF202" id="referral-location" required>
						</div>
						
						<div id="customer-info">
							<h3>Customer Information</h3>

							<div class="customer-field">
								<label for="referral-first-name">First Name</label>
								<input type="text" name="First Name" id="referral-first-name" required>
							</div>						

							<div class="customer-field">
								<label for="referral-last-name">Last Name</label>
								<input type="text" name="Last Name" id="referral-last-name" required>
							</div>						

							<div class="customer-field">
								<label for="referral-phone">Phone</label>
								<input type="tel" name="Phone" id="referral-phone" required>
							</div>						

							<div class="customer-field">
								<label for="referral-email">Email</label>
								<input type="email" name="Email" id="referral-email" required>
							</div>						
							
							<div id="referral-message">
								<label for="referral-form-message">Message</label>
								<textarea name="LEADCF1" id="referral-form-message" rows="4"></textarea>
							</div>

							<input id="referral-submit" name="submit2" class="submit" type="submit" value="Submit">
						</div>
					</form>
					<img id="form-graphic" src="assets/images/webformBG.png" alt="">
				</div>
			</section>
		</div>

		<script type="text/javascript" src="assets/javascript/logic.js"></script>
	</body>
</html>