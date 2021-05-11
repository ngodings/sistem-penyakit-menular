<h3>Data akumulasi Penyakit Menular dari Tahun 2015 - sekarang</h3>
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

				$.getJSON(base_url+"pasien/get_count/"+id_kec, function(data){
				
					var info_bidang ="<h4 style='text-align:center'>Akumulasi Seluruh Data</h4>";
					info_bidang+="<h5 style='text-align:center'>Data Kecamatan " + data.nama_kecamatan + "</h5>"
					
					info_bidang+="<hr> "
					info_bidang+="<h6><i>Data Penyakit COVID-19</i> <br></h6> "
					info_bidang+="<b> Dirawat (Kasus Aktif) : " + data.covid_aktif + "</b><br>"
					info_bidang+="<b> Sembuh : " + data.covid_sembuh + "</b><br>"
					info_bidang+="<b> Telah meninggal : " + data.covid_die + "</b><br>"

					info_bidang+="<hr> "
					info_bidang+="<h6><i>Data Penyakit TBC</i> <br></h6> "
					info_bidang+="<b> Dirawat (Kasus Aktif) : " + data.tbc_aktif + "</b><br>"
					info_bidang+="<b> Sembuh : " + data.tbc_sembuh + "</b><br>"
					info_bidang+="<b> Telah meninggal : " + data.tbc_die + "</b><br>"

					info_bidang+="<hr> "
					info_bidang+="<h6><i>Data Penyakit IMS</i> <br></h6> "
					info_bidang+="<b> Dirawat (Kasus Aktif) : " + data.ims_aktif + "</b><br>"
					info_bidang+="<b> Sembuh : " + data.ims_sembuh + "</b><br>"
					info_bidang+="<b> Telah meninggal : " + data.ims_die + "</b><br>"

					info_bidang+="<hr> "
					info_bidang+="<h6><i>Data Penyakit Diare</i> <br></h6> "
					info_bidang+="<b> Dirawat (Kasus Aktif) : " + data.diare_aktif + "</b><br>"
					info_bidang+="<b> Sembuh : " + data.diare_sembuh + "</b><br>"
					info_bidang+="<b> Telah meninggal : " + data.diare_die + "</b><br>"

					info_bidang+="<hr> "
					info_bidang+="<h6><i>Data Penyakit DBD</i> <br></h6> "
					info_bidang+="<b> Dirawat (Kasus Aktif) : " + data.dbd_aktif + "</b><br>"
					info_bidang+="<b> Sembuh : " + data.dbd_sembuh + "</b><br>"
					info_bidang+="<b> Telah meninggal : " + data.dbd_die + "</b><br>"
					
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
