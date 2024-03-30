function initMap() {
  // The location of egypt
  const egypt = { lat: 26.8206, lng: 30.8025 };
  // The map, centered at egypt
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 5,
    center: egypt,
    icon: "https://i.postimg.cc/63KLTQ0g/marker.png",
    mapTypeId: google.maps.MapTypeId.ROADMAP,
  });
  // The marker, positioned at egypt
  const marker = new google.maps.Marker({
    position: egypt,
    map: map,
  });

  // two input hidden for longitude and latitude
  google.maps.event.addListener(map, "click", function (event) {
    document.getElementById("latitude").value = event.latLng.lat();
    document.getElementById("longitude").value = event.latLng.lng();
  });
}

function loadScript(src, callback) {
  const script = document.createElement("script");
  script.setAttribute("src", src);
  script.addEventListener("load", callback);
  document.head.appendChild(script);
}
loadScript("https://maps.googleapis.com/maps/api/js", initMap);

const bsCollapse = new bootstrap.Collapse("#head-middle", {
  toggle: false,
});
