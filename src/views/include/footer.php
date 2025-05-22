</div>
<footer class="footer mt-auto">
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="footer-copyright-text">
						<p class="mb-0">© <?= date('Y') ?>, <strong>Victoria University</strong>. All rights reserved</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Footer End-->


<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/OwlCarousel/owl.carousel.js"></script>
<script src="/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/assets/vendor/mixitup/dist/mixitup.min.js"></script>
<script src="/assets/js/custom.js"></script>
<script src="/assets/js/night-mode.js"></script>
<script>
	var containerEl = document.querySelector('[data-ref~="event-filter-content"]');

	var mixer = mixitup(containerEl, {
		selectors: {
			target: '[data-ref~="mixitup-target"]'
		}
	});
</script>
</body>

</html>