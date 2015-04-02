<?php

/*
*	 Template Name: Quick Start Guide
*/

get_header();

?>
<div class="ase-quick-start">

	<div class="ase-section ase-step-one">
		<div class="ase-content clearfix">
			<div class="ase-step-inner">
				<h2>Install Aesop Story Engine</h2>
				<p>Head to the plugins tab within your WordPress administration area. Click on "add new". Once here, search for Aesop Story Engine, and press "search." Install Aesop Story Engine, and you're set! Hint: you can also install through FTP if you know that that is.</p>
			</div>
			<?php echo do_shortcode('[aesop_image img="/wp-content/themes/ase/assets/img/install-aesop.png" align="center" captionposition="left" lightbox="off" imgwidth="100%"]');?>
		</div>
	</div>

	<div class="ase-section ase-step-two">
		<div class="ase-content clearfix">
			<div class="ase-step-inner">
				<h2>Enable Theme Support</h2>
				<p>If your theme does not natively support Aesop Story Engine, add the code snippet below to your functions.php file, or add using <a href="https://wordpress.org/plugins/code-snippets/">Code Snippets</a> plugin to enable Extended Style Support. This will load one CSS file for any of the items that you include in the snippet below.</p>
				<code>add_theme_support("aesop-component-styles", array("parallax", "image", "quote", "gallery", "content", "video", "audio", "collection", "chapter", "document", "character", "map", "timeline" ) );</code>
			</div>
			<?php echo do_shortcode('[aesop_image img="/wp-content/themes/ase/assets/img/theme-support-screenshot.png" align="center" captionposition="left" lightbox="off" imgwidth="100%"]');?>
		</div>
	</div>

	<div class="ase-section ase-step-three">
		<div class="ase-content clearfix">
			<div class="ase-step-inner">
				<h2>Build your Story</h2>
				<p>Go to any post, and locate the "Add Component" button. It sits right above the post editor. Once you toggle this, you'll be able to select the component, adjust any options, and insert it anywhere within your story. Galleries are managed with the "Galleries" tab within WordPress.</p>
			</div>
			<?php echo do_shortcode('[aesop_image img="/wp-content/themes/ase/assets/img/add-component.png" align="center" captionposition="left" lightbox="off" imgwidth="100%"]');?>
		</div>
	</div>

	<div class="ase-section ase-step-four ">
		<div class="ase-content clearfix">
			<div class="ase-step-inner">
				<h2>Check out Resources</h2>
				<p>Search through our WordPress <a href="/library/category/themes">themes for Aesop</a> to get started with a site quickly, or <a href="/library/category/add-ons">browse our available add-ons</a> which enhance our themes and the Aesop Story Engine.</p>
				<p>You can also <a href="/documentation">read our documentation</a> for the Aesop Story Engine, and if you're a developer looking to build themes or add-ons for Aesop Story Engine, we've built a place <a href="/developers">just for you</a>.</p>
			</div>
		</div>
	</div>
</div>

<?php get_footer();


