var map = L.map("map").setView([30.0444, 31.2357], 13);
L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
}).addTo(map);

var marker = L.marker([30.0444, 31.2357]).addTo(map);

map.dragging.disable();

const latInput = document.getElementById("lat");
const longInput = document.getElementById("long");
const mapSearch = document.getElementById("mapSearch");

let editButton = document.getElementById("edit_user_button");
if (editButton) {
  editButton.addEventListener("click", function () {
    if (!form_edit) {
      mapSearch.classList.add("invisible");
    } else {
      mapSearch.classList.remove("invisible");
    }
  });
}

latInput.addEventListener("change", function () {
  map.setView([latInput.value, marker.getLatLng().lng]);
  marker.setLatLng([latInput.value, marker.getLatLng().lng]);
});

longInput.addEventListener("change", function () {
  map.setView([marker.getLatLng().lat, longInput.value]);
  marker.setLatLng([marker.getLatLng().lat, longInput.value]);
});

// Function to search for place and set map center
function searchPlace(searchText) {
  let xhr = new XMLHttpRequest();
  let url =
    "https://nominatim.openstreetmap.org/search.php?q=" +
    searchText +
    "&format=jsonv2";
  xhr.open("GET", url, true);

  xhr.send();

  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.response)[0];
      let latLng = [res.lat, res.lon];
      map.setView(latLng);
      marker.setLatLng(latLng);
      latInput.value = latLng[0];
      longInput.value = latLng[1];
    }
  };
}

document.getElementById("searchButton").addEventListener("click", function () {
  if (!latInput.disable) {
    text = document.getElementById("searchInput").value;
    console.log(text);
    searchPlace(text);
  }
});
