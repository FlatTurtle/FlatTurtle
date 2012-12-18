<?php $this->load->view('site_includes/header'); ?>
	<header role="banner" id="intro">
		<hgroup>
		<h1><img src="<?php echo base_url(); ?>themes/site/img/logo_320_2x.gif" alt="FlatTurtle" /></h1>
		</hgroup>
		<nav role="navigation" data-position="fixed" >
			<ul>
			<li><a href="#slideshow">The product</a></li>
			<li><a href="flatTurtle_presspack.zip">Press Pack</a></li>
			<li><a href="#employees">Contact</a></li>
			</ul>
		</nav>
	</header>
	<div id='main' role='main'>
		<article id="elevator_pitch">
			<header>
			<p>Having difficulties selling or leasing a building? We can help.</p>
			<br />
			<p>FlatTurtle provides interactive screens to persuade potential customers of your property's value. We visualise the key benefits of your property, 24/7, even when you are not around.</p>
			<br />
			<p>Sounds interesting? Read on.</p>
			</header>

			<section id="slideshow">
			<div id="slide_holder">
				<img id="screen" src="<?php echo base_url(); ?>themes/site/img/slider_back_large.png" alt="" />
				<img class="slide" id="slide_1" src="<?php echo base_url(); ?>themes/site/img/FlatScreenTraffic.jpg" alt="traffic info" />
			</div>
			</section>
			<section class="elevator_text">
				<h2>Location, location, location</h2><!--Knowledge is in the eye of the beholder-->
					<p>The one thing that makes a property interesting to potential clients is <em>location</em>. FlatTurtle can help you visualise the <em>accessibility</em> of a property and reveal its potential in one quick glance.</p>

				<h2>How do we do it?</h2>
					<p>We install a display in a notable location, where we visualise relevant information about the area. Examples are public transport, traffic, social media and even the weather. The data is bundled into what we call <em>Turtles</em>, making it easy to customise the product to your needs.</p>
					<p>Because the data is real-time, you will always be up-to-date, without having to put any effort into it.</p>
					<p>We have a wide range of Turtles, that can be customized to suit your business' needs. If you would like to know more about our services, please <a href="#contact_form">contact</a> us or to try the limited live <a href="http://demo.flatturtle.com/" target="_blank">demo</a>!</p>
			</section>
		</article>

		<section id="contact_form">
			<header>
			<h1>Contact form</h1>
			</header>
			<p>Would you like to know more about FlatTurtle or about what we can do for you? Please complete the form and we will contact you as soon as possible.</p>
			<p>For urgent questions or ordering, we are glad to help you. You can reach us by phone: +32 (0)2 669 10 01 or by <a class="whitelink" href="mailto:sales@FlatTurtle.com">email</a>.</p>
			<?php
			if($form_submitted) {
				echo "<div class=\"messages\"><p class=\"message\">Thanks for contacting us. We will get back to you as soon as possible.</p></div>";
			} else {
				if($form_errors) {
					echo "<div class=\"messages\"><p class=\"message error\">Please correct the errors in the form.</p></div>";
				}
			?>
			<?php echo form_open('site/form'); ?>
			<fieldset id="company_details">
			<legend>Company Details</legend>
			<p>
			<label for="company_name">Your company</label>
			<input id="company_name" name="company_name" type="text" placeholder="Your company" value="<?php echo set_value('company_name') ?>" <?php if(form_error('company_name')) echo ' class="error" '; ?> />
			<?php if(form_error('company_name')) echo '<span class="inline_error_message">!</span>'; ?>
			</p>
			<p>
			<label for="company_country">Country</label>
			<input type="text" id="company_country" name="company_country" placeholder="Country" value="<?php echo set_value('company_country') ?>" <?php if(form_error('company_country')) echo ' class="error" '; ?> />
			<?php if(form_error('company_country')) echo '<span class="inline_error_message">!</span>'; ?>
			</p>
			<p>
			<label for="company_city">City</label>
			<input type="text" id="company_city" name="company_city" placeholder="City" value="<?php echo set_value('company_city') ?>" <?php if(form_error('company_city')) echo ' class="error" '; ?> />
			<?php if(form_error('company_city')) echo '<span class="inline_error_message">!</span>'; ?>
			</p>
			<p>
			<label for="company_application">Application</label>
			<select id="company_application" class="select" name="company_application">
				<?php
					$options = array(
						'Private space' => 'Private space',
						'Public space' => 'Public space',
						'Both public and private' => 'Both public and private'
					);
					foreach($options as $option) {
				?>
				<option value="<?php echo $option ?>" <?php if($this->input->post('company_application') == $option) { echo " selected=\"selected\""; } ?>><?php echo $option ?></option>
				<?php
					}
				?>
			</select>
			</p>
			<p>
			<label for="company_nr_of_screens">Number of screens</label>
			<input type="text" id="company_nr_of_screens" name="company_nr_of_screens" placeholder="Number of screens" value="<?php echo set_value('company_nr_of_screens') ?>" <?php if(form_error('company_nr_of_screens')) echo ' class="error" '; ?> />
			<?php if(form_error('company_nr_of_screens')) echo '<span class="inline_error_message">!</span>'; ?>
			</p>
			</fieldset>
			<fieldset id="personal_details">
			<legend>Personal Details</legend>
			<p>
			<label for="personal_first_name">First name</label>
			<input type="text" id="personal_first_name" name="personal_first_name" placeholder="First name" value="<?php echo set_value('personal_first_name') ?>" <?php if(form_error('personal_first_name')) echo ' class="error" '; ?> />
			<?php if(form_error('personal_first_name')) echo '<span class="inline_error_message">!</span>'; ?>
			</p>
			<p>
			<label for="personal_last_name">Last name</label>
			<input type="text" id="personal_last_name" name="personal_last_name" placeholder="Last name" value="<?php echo set_value('personal_last_name') ?>" <?php if(form_error('personal_last_name')) echo ' class="error" '; ?> />
			<?php if(form_error('personal_last_name')) echo '<span class="inline_error_message">!</span>'; ?>
			</p>
			<p>
			<label for="personal_email">Email</label>
			<input type="email" id="personal_email" name="personal_email" placeholder="Email" value="<?php echo set_value('personal_email') ?>" <?php if(form_error('personal_email')) echo ' class="error" '; ?> />
			<?php if(form_error('personal_email')) echo '<span class="inline_error_message">!</span>'; ?>
			</p>
			<p>
			<label for="personal_phone">Phone number</label>
			<input type="tel" id="personal_phone" name="personal_phone" placeholder="Phone number" value="<?php echo set_value('personal_phone') ?>" <?php if(form_error('personal_phone')) echo ' class="error" '; ?> />
			<?php if(form_error('personal_phone')) echo '<span class="inline_error_message">!</span>'; ?>
			</p>
			</fieldset>
			<fieldset id="message">
			<legend>Your message</legend>
			<p><label for="personal_message">Your message</label></p>
			<textarea id="personal_message" name="personal_message" placeholder="Your message…"  <?php if(form_error('personal_message')) echo ' class="error" '; ?>><?php echo set_value('personal_message') ?></textarea>
			<?php if(form_error('personal_message')) echo '<span class="inline_error_message">!</span>'; ?>
			</fieldset>
			<fieldset id="actions_and_messages">
			<input class="gradient" type="submit" id="send_button" value="Send" />
			<!--<p class="message error">The message could not be delivered at this moment.<br />Please try again.</p>-->
			</fieldset>
			</form>
			<?php
			}
			?>
		</section><!-- section#contact_form -->
		<section id="employees">
			<ul>
			<li class="vcard">
				<img src="<?php echo base_url(); ?>themes/site/img/yeri_960_1x.png" alt="Yeri Tiete" />
					<header>
						<hgroup>
							<h1 class="fn n"><span class="given-name">Yeri</span> <span class="family-name">Tiete</span></h1>
							<h2><span class="role">General Manager</span> <span class="org">Flat Turtle</span></h2>
						</hgroup>
					</header>
					<p class="tel"><span class="type">work</span> Tel <span class="value">+32 (0)2 669 09 99</span></p>
					<p class="tel"><span class="type">cell</span> Mobile <span class="value">+32 (0)474 610 139</span></p>
					<p class="email"><a class="value" href="mailto:yeri@FlatTurtle.com">yeri@FlatTurtle.com</a></p>
					<p class="download_vcard"><a class="gradient" href="https://who.flatturtle.com/yeri_tiete.vcf">Download vCard <span class="icon">!</span></a></p>
			</li>
			<li class="vcard">
				<img src="<?php echo base_url(); ?>themes/site/img/pieter_960_1x.png" alt="Pieter Colpaert" />
				<header>
					<hgroup>
						<h1 class="fn n"><span class="given-name">Pieter</span> <span class="family-name">Colpaert</span></h1>
						<h2><span class="role">Project Manager</span> <span class="org">Flat Turtle</span></h2>
					</hgroup>
				</header>
				<p class="tel"><span class="type">cell</span> Mobile <span class="value">+32 (0)486 747 122</span></p>
				<p class="email"><a class="value" href="mailto:pieter@FlatTurtle.com">pieter@FlatTurtle.com</a></p>
				<p class="download_vcard"><a class="gradient" href="https://who.flatturtle.com/pieter_colpaert.vcf">Download vCard <span class="icon">!</span></a></p>
			</li>
			<li class="vcard">
				<img src="<?php echo base_url(); ?>themes/site/img/christophe_960_1x.png" alt="Cristophe Petitjean" />
				<header>
					<hgroup>
					<h1 class="fn n"><span class="given-name">Christophe</span> <span class="family-name">Petitjean</span></h1>
					</hgroup>
				</header>
				<p class="email"><a class="value" href="mailto:christophe@FlatTurtle.com">christophe@FlatTurtle.com</a></p>
				<p class="download_vcard"><a class="gradient" href="https://who.flatturtle.com/christophe_petitjean.vcf">Download vCard <span class="icon">!</span></a></p>
			</li>

			<li class="vcard">
				<img src="<?php echo base_url(); ?>themes/site/img/stefanie_960_1x.png" alt="Stefanie Lisabeth" />
				<header>
					<hgroup>
					<h1 class="fn n"><span class="given-name">Stefanie</span> <span class="family-name">Lisabeth</span></h1>
						<h2><span class="role">Sales Executive</span> <span class="org">Flat Turtle</span></h2>
					</hgroup>
				</header>
				<p class="tel"><span class="type">work</span> Tel <span class="value">+32 (0)2 669 10 01</span></p>
				<p class="tel"><span class="type">cell</span> Mobile <span class="value">+32 (0)474 239 019</span></p>
				<p class="email"><a class="value" href="mailto:stefanie@FlatTurtle.com">Stefanie@FlatTurtle.com</a></p>
				<p class="download_vcard"><a class="gradient" href="https://who.flatturtle.com/stefanie_lisabeth.vcf">Download vCard <span class="icon">!</span></a></p>
			</li>
			</ul>
		</section>
		<article id="about_us">
		<h1>About us</h1>
			<p>Together, we believe that we can improve people's lives by providing them the right information when they need it. In a rapidly moving society, time is important and can not be wasted. In an increasingly more mobile society, speedy solutions are required!</p>

			<p>Thanks to our partners: <a href="http://hello.irail.be/about/">iRail</a>, <a href="http://thedatatank.com/">The DataTank</a> and <a href="http://www.rentalvalue.be/">RentalVALUE</a>. Many thanks for giving us the support when we need it, for providing us with the right tools and for guiding us with your knowledge and expertise.</p>
		</article><!-- article#about_us -->

		</section><!-- section#employees -->
	</div><!-- #main -->

<?php $this->load->view('site_includes/footer'); ?>
