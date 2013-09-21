<?php wp_footer(); ?>

</div><!-- #page -->
</div> <!-- #wrapper -->
<footer id="footer">
	<div class="grass">	</div> <!-- .grass -->

<?php /* Show partners on home page */
	if ( is_home() ) : ?>
	<div class="partners clearfix">
		<div class="container">
			<?php include 'template-partner-logos.php'; ?>
		</div> <!-- .container -->
	</div> <!-- .partners -->
	<?php endif; ?>

	<div class="footer-contact clearfix">
		<div class="container">
			<?php dynamic_sidebar('Footer'); ?>
		</div> <!-- .container -->
	</div> <!-- .footer-contact -->
	<div class="social-icons container">
		<a class="icon facebook" href="https://www.facebook.com/campkinderland" title="Friend us on Facebook">Facebook</a>
		<a class="icon twitter" href="https://twitter.com/CampKinderland" title="Follow us on Twitter">Twitter</a>
	</div> <!-- .social-icons -->

	<span class="copyright">Camp Kinderland &copy; 2007 - <?php echo date("Y"); ?> </span>
</footer>
</body>
</html>