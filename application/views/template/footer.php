<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Dinas Kesehatan Surakarta</h3>
              <p>
								Jln.Jendral Sudirman No:2;<br>
								Telp. (0271) 632202 Fax. (0271) 632202<br>
								SURAKARTA 57111<br>
								Hubungi kami: dinaskesehatan@surakarta.go.id
              </p>
              <div class="social-links mt-3">
                <a href="https://twitter.com/DkkSurakarta" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="https://www.facebook.com/dinkessurakarta" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/dinkessurakarta/" class="instagram"><i class="bx bxl-instagram"></i></a>
                
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>

    <div class="container">
     
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medicio-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url()?>template/front/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url()?>template/front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url()?>template/front/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?= base_url()?>template/front/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url()?>template/front/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?= base_url()?>template/front/assets/vendor/counterup/counterup.min.js"></script>
  <script src="<?= base_url()?>template/front/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?= base_url()?>template/front/assets/vendor/venobox/venobox.min.js"></script>
  <script src="<?= base_url()?>template/front/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url()?>template/front/assets/js/main.js"></script>

  <script src="<?php echo base_url("assets/leaflet/leaflet.js"); ?>"></script>
  
  

  <script type="text/javascript">
	
	
	//menampilkan map
	var map = L.map('solo').setView([-7.5595759, 110.8541984], 13);
	var base_url ="<?= base_url() ?>";
	

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	//marker manual
	var myFeatureGroup = L.featureGroup().addTo(map).on("click", groupClick);
	var bangunanMarker;

	
	  
	function groupClick(event){
		
		alert("Clicked on marker" + event.layer.id);

	}
	//menggunakan geojson untuk menandai suatu daerah
	$.getJSON(base_url+"assets/geojson/solo.geojson", function(data){
		//untuk konfigurasi tampilan map mark atau multi polygon
		getLayer = L.geoJson(data, {
			style: function(feature, layer) {

				//membedakan multi polygon
				var id = feature.properties.id;
				if (id == 1){
					return { //daerah satu
						
							fillOpacity: 0.1,
							weight: 1,
							opacity: 1,
							color: "#f44242"
						};
				}else if(id == 2){
					return { //daerah dua
							fillOpacity: 0.5,
							weight: 1,
							opacity: 1,
							color: "#6d96f7"
						};

				}else if(id == 3){
					return { //daerah dua
							fillOpacity: 0.5,
							weight: 1,
							opacity: 1,
							color: "#faebd7"
						};
				}else if(id == 4){
					return { //daerah dua
							fillOpacity: 0.5,
							weight: 1,
							opacity: 1,
							color: "#deb887"
						};
				}else if(id == 5){
					return { //daerah dua
							fillOpacity: 0.5,
							weight: 1,
							opacity: 1,
							color: "#ff7f50"
						};
					}

				
			},
			//untuk setiap bidang menambahkan layer
			onEachFeature: function(feature, layer){
				// mendapatkan kode
		
				var id_kec = parseFloat(feature.properties.id_kec);

				$.getJSON(base_url+"peta/corona/"+id_kec, function(data){
				
					var info_bidang ="<h4 style='text-align:center'>Akumulasi Data Pasien COVID-19</h4>";
					info_bidang+="<h6 style='text-align:center'>Data Kecamatan " + data.nama_kecamatan + "</h6>"
					
					info_bidang+="<h6><br>Jumlah Seluruh Kasus 		: " + data.jumlah_pasien + "</h6>";
					info_bidang+="<h6>Jumlah Pasien Aktif 	: " + data.aktif + "</h6>";
					info_bidang+="<h6>Jumlah Pasien Sembuh 	: " + data.sembuh + "</h6>";
					info_bidang+="<h6>Jumlah Pasien Meninggal	: " + data.die + "</h6>";
					info_bidang+="<a href='<?=base_url()?>peta/bidang_detail/'"+id_kec+"'></a>";
					info_bidang+="<div style='width:100%;text-align:center;margin-top:10px;'><a href='<?=base_url()?>peta/bidang_detail/"+id_kec+"'> Detail </a></div>";
					layer.bindPopup(info_bidang, {
						maxWidth : 360,
						closeButton : true,
						offset : L.point(0, -20)
					});

					layer.on('click', function(){
						layer.openPopup();
					});

				});

				

				
			}

		}).addTo(map);
    });




	

	
    
  </script>


</body>

</html>
