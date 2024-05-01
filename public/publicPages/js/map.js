if (document.getElementById("map")) {
  // Initialize the map centered on Cairo, Egypt
  var map = L.map("map").setView([30.0444, 31.2357], 15);

  // Add a tile layer
  L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    scrollWheelZoom: "center", // Disable scroll wheel zoom, but keep the ability to zoom via buttons
    dragging: false, // Disable dragging
    touchZoom: false, // Disable touch zoom
    doubleClickZoom: false, // Disable double click zoom
    boxZoom: false, // Disable box zoom
    keyboard: false, // Disable keyboard navigation
    tap: false, // Disable tap
  }).addTo(map);

  // var marker = L.marker([30.0444, 31.2357]).addTo(map);

  //Define a custom icon with the desired color

  //Add a marker to Cairo, Egypt with the custom icon
  var marker = L.marker([30.0444, 31.2357]).addTo(map);

  //// Add a popup to the marker
  marker
    .bindPopup("<b>Welcome to Cairo, Egypt!</b><br>This is a beautiful city.")
    .openPopup();
}
