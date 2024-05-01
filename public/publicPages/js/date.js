document.addEventListener("DOMContentLoaded", function () {
  //Set Today's date
  const currentDate = document.getElementById("currentDate");
  const today = new Date();

  const month = today.toLocaleDateString("en-US", { month: "long" });
  const day = today.getDate().toString().padStart(2, "0"); // Ensure two digits for day
  const year = today.getFullYear();
  currentDate.textContent = `Tuesday, ${day} ${month} ${year}`;

});
