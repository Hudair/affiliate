<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2021 <a href="#" target="_blank">API Theme</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	
	<script src="<?=base_url();?>assets/document_vendor/jquery/jquery.min.js"></script>
	<script src="<?=base_url();?>assets/document_vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url();?>assets/document_vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?=base_url();?>assets/document_scripts/klorofil-common.js"></script>
	<!-- Javascript -->
	<script>
	var jQrs = jQuery.noConflict();
	jQrs(document).ready(function(){ 
	 //  jQrs('pre code').each(function(i, block) {
		// hljs.highlightBlock(block);
	 //  });
	  // Add smooth scrolling to all links
		jQrs('a[href*="#"]').on('click', function (e) {
		  e.preventDefault()

		jQrs('html, body').animate(
		{
		  scrollTop: jQrs(jQrs(this).attr('href')).offset().top - 100,
		},
		800,
		'linear'
	  )
})
	});


// function copycode(val) {
	
//   const copyText = document.getElementById("regi").textContent;
//   const textArea = document.createElement('textarea');
//   textArea.textContent = copyText;
//   document.body.append(textArea);
//   textArea.select();
//   document.execCommand("copy");
// }


	</script>
</body>

</html>
