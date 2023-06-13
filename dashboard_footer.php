
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://abuesa.com/" target="_blank">Abu Esa </a> 2023</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/elephant/dashboard_asset/vendor/global/global.min.js"></script>
	<script src="/elephant/dashboard_asset/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="/elephant/dashboard_asset/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="/elephant/dashboard_asset/js/custom.min.js"></script>
	<script src="/elephant/dashboard_asset/js/deznav-init.js"></script>
	<script src="/elephant/dashboard_asset/vendor/owl-carousel/owl.carousel.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="/elephant/dashboard_asset/vendor/peity/jquery.peity.min.js"></script>

	<!-- Sweeet Alert-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
	<!-- Apex Chart -->
	<script src="/elephant/dashboard_asset/vendor/apexchart/apexchart.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="/elephant/dashboard_asset/js/dashboard/dashboard-1.js"></script>
	    <!-- Datatable -->
	<script src="/elephant/dashboard_asset/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/elephant/dashboard_asset/js/plugins-init/datatables.init.js"></script>

	

	<script>
		function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				autoplay:true,
				margin:30,
				nav:false,
				dots: false,
				left:true,
				navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
				responsive:{
					0:{
						items:1
					},
					484:{
						items:2
					},
					882:{
						items:3
					},	
					1200:{
						items:2
					},			
					
					1540:{
						items:3
					},
					1740:{
						items:4
					}
				}
			})			
		}
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000); 
		});
	</script>
	<script>

$('#show_pass').click(function(){
         var input = document.getElementById('input');
         if(input.type == 'password'){
            input.type = 'text';
         }
         else{
            input.type = 'password';
         }
         
    })

    $('#show_pass2').click(function(){
         var input = document.getElementById('input2');
         if(input.type == 'password'){
            input.type = 'text';
         }
         else{
            input.type = 'password';
         }
         
    })

	function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
}
	function preview2() {
    frame2.src=URL.createObjectURL(event.target.files[0]);
}
	function preview3() {
    frame3.src=URL.createObjectURL(event.target.files[0]);
}

</script>
<script>
  $(function() {
    $('#toggle-two').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
    });
  })
</script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

</body>
</html>