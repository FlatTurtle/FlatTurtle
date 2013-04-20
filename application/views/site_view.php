<?php $this->load->view('site_includes/header'); ?>
<header role="banner" id="intro">
  <nav role="navigation" data-position="fixed" >
    <ul>
    <li><form action="http://flatturtle.us6.list-manage1.com/subscribe/post?u=d82ed07d6d647a768b87d3e8d&amp;id=8de65c1467" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
      <label for="mce-EMAIL">Subscribe to our mailing list</label>
      <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
      <input type="submit" value="subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
    </form></li>
      <li><a href="http://blog.flatturtle.com/">Blog</a></li>

      <li><a href="https://twitter.com/FlatTurtle_">Twitter</a></li>
</ul>
  </nav>
</header>

<div id='main' role='main'>
  <article id="elevator_pitch">

    <section id="slideshow">
      <div id="slide_holder">
	<img id="screen" src="<?php echo base_url(); ?>themes/site/img/slider_back_large.png" alt="" />
	<img class="slide" id="slide_1" src="<?php echo base_url(); ?>themes/site/img/FlatScreenTraffic.jpg" alt="traffic info" />
      </div>
    </section>
    <!-- more text here if wanted:
    <section class="elevator_text">
				
    </section>
    -->
  </article>

<!--  <section id="contact_form">
  </section>
-->

  <section id="employees">
    <ul>
      <li class="vcard">
        <img src="<?php echo base_url(); ?>themes/site/img/yeri_960_1x.png" alt="Yeri Tiete" />
        <header>
	  <hgroup>
	    <h1 class="fn n"><span class="given-name">Yeri</span> <span class="family-name">Tiete</span></h1>
	    <h2><span class="role">General Manager</span> <span class="org">FlatTurtle</span></h2>
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
	    <h2><span class="role">Project Manager</span> <span class="org">FlatTurtle</span></h2>
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
    </ul>
  </section>


  <article id="about_us">
    <header>
      <h1>Hello, we're open!</h1>
    </header>
    <p>
      We are open to any of your ideas. Our programmers are all ears to write Turtles for your display.
    </p>
    <p>
      We are open to your own developers as well! Writing a Turtle is easy enough for any developer with some knowledge of Javascript and HTML to get started. This is perfect for organisations who want to have a display connected to their internal ERP, BI, CRM, fleet-management... system without having third party developers snooping around. <a href="http://dev.flatturtle.com">Read more...</a>
    </p>
    
  </article>


</section>
</div>

<?php $this->load->view('site_includes/footer'); ?>
