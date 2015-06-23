		<footer id="main-footer">
			<div class="container">
				<div class="col-sm-12">
					<img src="<?php bloginfo('template_url'); ?>/img/index/taro_logo_footer.png">
					<h2>Taro Construcciones S.A. de C.V. ® </h2>
				</div><!--.col-sm-12-->
			</div><!--.container-->
		</footer>
		
		<?php // Load styles and scripts from functions.php nw_enqueue_scripts() function ?>
		
		<script>window.twttr = (function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0],
			t = window.twttr || {};
			if (d.getElementById(id)) return t;
			js = d.createElement(s);
			js.id = id;
			js.src = "https://platform.twitter.com/widgets.js";
			fjs.parentNode.insertBefore(js, fjs);

			t._e = [];
			t.ready = function(f) {
			t._e.push(f);
			};

			return t;
			}(document, "script", "twitter-wjs"));
		</script>

		<?php wp_footer(); // wordpress admin-bar functions ?>
</body>
</html>