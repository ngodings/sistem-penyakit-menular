
</br>
<div id="solo" style="width: 1400px; height: 500px;"></div>
<script src="<?php echo base_url("assets/leaflet/leaflet.js"); ?>"></script>
<script type="text/javascript">

// var map = L.map('mapid').setView([ -7.5758447,110.8259892], 18); // ketinggian peta (13)

// L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
// }).addTo(map);

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
	$.getJSON(base_url+"assets/geojson/detail-solo-color.geojson", function(data){
		//untuk konfigurasi tampilan map mark atau multi polygon
		getLayer = L.geoJson(data, {
			style: function(feature, layer) {

				

				
			},
			//untuk setiap bidang menambahkan layer
			onEachFeature: function(feature, layer){
				// mendapatkan kode
		
				//var id_kec = parseFloat(feature.properties.id_kec);

				var id_kel = parseFloat(feature.properties.id_kel);

				$.getJSON(`http://localhost:81/spm-new/home/getAllPenyakit/${id_kel}`, function(data){
				
					var info_bidang ="<h4 style='text-align:center'>Akumulasi Data Pasien di Seluruh Penyakit Menular</h4>"
					info_bidang+="<h5 style='text-align:center'>Data Kelurahan " + data.nama_kelurahan + "</h5>"
					info_bidang+="<hr size = '1px'> "
					info_bidang+="<h6>Jumlah Pasien di seluruh Kasus : " + data.data_all + "</h6>"
					info_bidang+="<h6>Jumlah Pasien Aktif : " + data.data_aktif + "</h6>"
					info_bidang+="<h6>Jumlah Pasien Sembuh : " + data.data_sembuh + "</h6>"
					info_bidang+="<h6>Jumlah Pasien Meninggal : " + data.data_die + "</h6>"
					
					
				
					layer.bindPopup(info_bidang, {
						maxHeight : 360,
						maxWidth : 460,
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
