<h1>This is home page</h1>
</br>
<div id="mapid" style="width: 1400px; height: 500px;"></div>
<script>

var map = L.map('mapid').setView([ -7.5758447,110.8259892], 18); // ketinggian peta (13)

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);



</script>
