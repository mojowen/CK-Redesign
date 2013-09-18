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

	<div class="contact clearfix">
		<div class="container">
			<?php dynamic_sidebar('Footer'); ?>
		</div> <!-- .container -->
	</div> <!-- .contact -->

	<span class="copyright">Camp Kinderland &copy; 2007 - <?php echo date("Y"); ?> </span>
</footer>
</body>
</html>