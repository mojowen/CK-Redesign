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
	<script type="text/javascript">

	if( typeof WePay != 'undefined' ) {
		WePay.additions = [50,5000];
		WePay.total_callback = function(widget,target) {
			console.log(widget)
		}

		jQuery( document ).on('DOMNodeInserted', function(e) {

			// Code for modifying progress bar divs
			// Will store the amounts in the WePay widgets objects and as totals
			if( e.target.className === 'wepay-donations-progress-widget-wrapper' ) {

				var target = e.target,
					$raised = jQuery('.infos .value:not(.moneys)', target)
					raised = getMoneyValue( $raised ),
					raised += WePay.additions.shift() || 0,
					goal = getMoneyValue( jQuery('.moneys.value', target ) ),
					percentage = Math.round( raised / goal * 100 ) ;


				for (var i = 0; i < WePay.widgets.length; i++) {

					if( typeof WePay.widgets[i].goal === 'undefined' ) {
						WePay.widgets[i].goal = goal;
						WePay.widgets[i].raised = raised;
						WePay.widgets[i].object = target;

						WePay.total_goal = (WePay.total_goal || 0) + goal;
						WePay.total_raised = (WePay.total_goal || 0) + raised;

						( WePay.total_callback || function() {} )( WePay.widgets[i]) // Can register a callback when it's updated, pass the widget that just updated

						break;
					}

				};

				if( (raised + '').split('.').length == 1 ) raised += '.00';
				$raised.text( '$'+raised.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") ); // Adding commas

				var $progress_bar = jQuery('.progressbar .value', target ).width( ( percentage > 100 ? 100 : percentage ) +'%' );
				jQuery('.percent-text', target ).text( percentage +'%' );

				// if( percentage > 100 ) $progress_bar.css('background-color','rgba(208, 217, 145, 1)')
				// Can change the background coloro if more than 100%
			}

			function getMoneyValue(obj) {
				if( ! obj instanceof jQuery ) obj = jQuery(obj);
				return parseFloat( obj.text().trim().replace(/\$|,/g,'') )
			}
		});
	}

	</script>

</body>
</html>