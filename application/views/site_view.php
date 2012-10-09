
<?php $this->load->view('site_includes/header'); ?>
	<header role="banner" id="intro">
		<hgroup>
		<h1><img src="<?php echo base_url(); ?>themes/site/img/logo_320_2x.gif" alt="FlatTurtle" /></h1>
		</hgroup>
		<nav role="navigation" data-position="fixed" >
			<ul>
			<li><a href="#slideshow">The product</a></li>
			<li><a href="#pricing">Pricing</a></li>
			<li><a href="#about_us">About us</a></li>
			</ul>
		</nav>
	</header>
	<div id='main' role='main'>
		<article id="elevator_pitch">
			<header>
			<h1>Hi, we are FlatTurtle.<br /> We do <em>real-time digital signage for your company</em>.</h1>
			</header>
			<nav id="call_to_action">
				<ul>
				<li><a class="gradient" href="#slideshow">Sounds great. Tell me more.</a></li>
				<li><a class="gradient" href="#contact_form">Sounds fantastic! Get me some.</a></li>
				</ul>
			</nav>
			<section id="slideshow">
			<div id="slide_holder">
				<img id="screen" src="<?php echo base_url(); ?>themes/site/img/slider_back_large.png" alt="" />
				<img class="slide" id="slide_1" src="<?php echo base_url(); ?>themes/site/img/FlatScreenTraffic.jpg" alt="traffic info" />
			</div>
			</section>
			<section id="elevator_text">
			<p>Together with our partner we install displays <strong>at any given location.</strong></p>
			<p>But we can also plug into your existing system and transform your current digital signage solution into a <strong>FlatTurtle.</strong></p>
			<p>We specialize in <strong>real-time data.</strong><br/> All our displays are <strong>connected to the Internet.</strong> An update concerning a certain Turtle will be pushed towards each screen which is, at that moment, visualizing the data.</p>
			<p>Our screens are unique as they can be <strong>remotely controlled</strong> by any internet-connected device.</p>
			</section>
		</article><!-- article#elevator_pitch -->
		
		<section id="pricing">
			<div id="price_list">
			<ul>
			<li id="standard_turtle" class="hproduct">
			<h2 class="fn">Standard Turtle</h2>
				<div class="description">
					<ul>
					<li>Mobility pack <br /> (More Turtles on request)</li>
					<li>Access to MyTurtle Panel</li>
					<li>Rent of our micro-controller</li>
					</ul>
				</div>
				<p class="price">
				<span class="starting_at">Starting at</span>
				<span class="currency">€</span><span class="amount">100</span> <span class="period">per month</span>
				</p>
			<p class="button"><a class="gradient" href="#contact_form">Contact us</a></p>
			</li>
			<li id="custom_turtle" class="hproduct">
			<h2 class="fn">Custom Turtle</h2>
			<div class="description">
				<ul>
				<li>Full installation, including displays</li>
				<li>Interactivity touch panel</li>
				<li>…</li>
				</ul>
			</div>
			<p class="button"><a class="gradient" href="#contact_form">Request an offer</a></p>
			</li>
			</ul>
		</div><!-- div#pice_list -->
		</section><!-- section#pricing -->

		<section id="contact_form">
			<header>
			<h1>Contact form</h1>
			</header>
			<p>Ready to order? Or still got a couple of questions? Don't hesitate to get in touch and we'll get back at you in no time!</p>
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
			<legend>A personal message</legend>
			<p><label for="personal_message">A personal message</label></p>
			<textarea id="personal_message" name="personal_message" placeholder="A personal message…"  <?php if(form_error('personal_message')) echo ' class="error" '; ?>><?php echo set_value('personal_message') ?></textarea>
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
			<p class="to_top_link"><a href="#intro">To top</a></p>
		</section><!-- section#contact_form -->
		<article id="about_us">
		<h1>About us</h1>
		<p>FlatTurtle started as a spin-off from <a href="http://hello.irail.be/about/">iRail</a>, a living lab for supporting digital creativity concerning transport data. After the open-source project <a href="http://thedatatank.com/">The DataTank</a>, which flattens data to become directly usable in web-applications, came to exist as part of iRail, several community members started creating visualizations using this data, leading to more ideas and possibilities.</p>
		<p>We are  an early adopter of the Web Of Things and Linked Open Data as a way to interconnect all data on the Internet to get the most relevant information, providing your audience the best comfort.</p>
		<p>Christophe Petitjean, a performance leasing professional at <a href="http://www.rentalvalue.be/">RentalVALUE</a> and an early member of iRail, launched the idea of putting all this information on digital displays to inform users. One of the challenges that we came across, once we were executing the idea, is that a lot of these data are non-schedulable, meaning you can’t program a display a day in advance to show this information to an audience. To the contrary: you need a real-time interface to allow alerts to be published immediately. This made us come up with a simple solution: a set-top box which provides a constant stream of dynamic data, with an extra layer of real-time alerts. The set-top box itself only consumes 5W and when a non-schedulable event occurs, the display will update itself immediately, giving your users the right information in real-time. For the presentation of the information we use HTML5, the same upcoming technology used by the iRail community since 2010.</p>
		<p>Non-scheduled events are not only mobility information like train delays, traffic jams or crowd-control instructions, but also user-interactions like you changing configuration of the screen using your smartphone, tablet or computer, or someone in front of the screen requesting to see more about a certain information panel.</p>
		<p>Together, we believe <a href="http://en.wikipedia.org/wiki/The_World_Is_Flat">the world is flat</a>.</p>
		<p class="to_top_link"><a href="#intro">To top</a></p>
		</article><!-- article#about_us -->
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
			<p class="download_vcard"><a class="gradient" href="http://who.flatturtle.com/yeri_tiete.vcf">Download vCard <span class="icon">!</span></a></p>
			</li>
			<li class="vcard">
			<img src="<?php echo base_url(); ?>themes/site/img/pieter_960_1x.png" alt="Pieter Colpaert" />
			<header>
				<hgroup>
				<h1 class="fn n"><span class="given-name">Pieter</span> <span class="family-name">Colpaert</span></h1>
				<h2><span class="role">Project Manager</span> <span class="org">Flat Turtle</span></h2>
				</hgroup>
			</header>
			<p class="tel"><span class="type">work</span> Tel <span class="value">+32 (0)2 669 10 01</span></p>
			<p class="tel"><span class="type">cell</span> Mobile <span class="value">+32 (0)486 747 122</span></p>
			<p class="email"><a class="value" href="mailto:pieter@FlatTurtle.com">pieter@FlatTurtle.com</a></p>
			<p class="download_vcard"><a class="gradient" href="http://who.flatturtle.com/pieter_colpaert.vcf">Download vCard <span class="icon">!</span></a></p>
			</li>
			<li class="vcard">
			<img src="<?php echo base_url(); ?>themes/site/img/christophe_960_1x.png" alt="Cristophe Petitjean" />
			<header>
				<hgroup>
				<h1 class="fn n"><span class="given-name">Christophe</span> <span class="family-name">Petitjean</span></h1>
				</hgroup>
			</header>
			<p class="tel"><span class="type">cell</span> Mobile <span class="value">+32 (0)475 513 224</span></p>
			<p class="email"><a class="value" href="mailto:christophe@FlatTurtle.com">christophe@FlatTurtle.com</a></p>
			<p class="download_vcard"><a class="gradient" href="http://who.flatturtle.com/christophe_petitjean.vcf">Download vCard <span class="icon">!</span></a></p>
			</li>
			</ul>
			<p class="to_top_link"><a href="#intro">To top</a></p>
		</section><!-- section#employees -->
	</div><!-- #main -->


<?php $this->load->view('site_includes/footer'); ?>
