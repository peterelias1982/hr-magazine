/*  document.addEventListener('DOMContentLoaded', function() {
    const fromDateInput = document.getElementById('fromDate');
    const toDateInput = document.getElementById('toDate');

    // Function to trigger agenda update only when both dates are selected
    function tryUpdateAgenda() {
        console.log('tryUpdateAgenda called');
        if (fromDateInput.value && toDateInput.value) {
            updateAgenda();
        }
    }

    fromDateInput.addEventListener('change', tryUpdateAgenda);
    toDateInput.addEventListener('change', tryUpdateAgenda);

    function updateAgenda() {
        const fromDate = new Date(fromDateInput.value);
        const toDate = new Date(toDateInput.value);
        const eventAgenda = document.getElementById('event-agenda');

        // Validate dates: 'From' date must be before 'To' date, and neither can be in the past
        const today = new Date();
        today.setHours(0, 0, 0, 0); // Reset today's date to midnight for comparison

        if (fromDate < today) {
            alert("The 'From' date cannot be in the past.");
            return;
        }

        if (toDate < fromDate) {
            alert("The 'To' date cannot be before the 'From' date.");
            return;
        }

        // Calculate the difference in days and generate the agenda
        const dayDifference = Math.floor((toDate - fromDate) / (1000 * 60 * 60 * 24)) + 1;
        eventAgenda.innerHTML = ''; // Clear existing agenda before generating a new one

        for (let day = 0; day < dayDifference; day++) {
            const currentDay = new Date(fromDate);
            currentDay.setDate(fromDate.getDate() + day);
            
            const dayFormatted = currentDay.toISOString().split('T')[0]; // Format day for display
            createDayAgenda(day + 1, dayFormatted); // Create agenda for each day
        }
    }

    // Revised function to include the date in each day's header
    function createDayAgenda(dayNumber, dayDate) {
        
        const formattedDate = formatDate(new Date(dayDate)); // Use the formatDate function
        const eventAgenda = document.getElementById('event-agenda');
        const dayBoxHtml = `
            <div class="day-box" style="background-color: white; border-radius: 10px; margin-bottom: 20px; padding: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <h4 class="day-header" style="background-color: #e9ecef; padding: 10px; border-radius: 10px;">Day ${dayNumber} - ${dayDate}</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Topic</th>
                            <th>From (Time)</th>
                            <th>To (Time)</th>
                            <th>Speaker</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="topic_day_${dayNumber}[]" placeholder="Topic"></td>
                            <td><input type="time" class="form-control" name="from_time_day_${dayNumber}[]"></td>
                            <td><input type="time" class="form-control" name="to_time_day_${dayNumber}[]"></td>
                            <td><input type="text" class="form-control" name="speaker_day_${dayNumber}[]" placeholder="Speaker"></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm remove-row" onclick="removeRow(this)">-</button>
                                <button type="button" class="btn btn-info btn-sm
                                " onclick="addRowToDay(${dayNumber}, this)">+</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `;
    
            // Append the new day box to the event agenda container
            eventAgenda.insertAdjacentHTML('beforeend', dayBoxHtml);
        }
    
        window.addRowToDay = function(dayNumber, addButton) {
            const dayBox = addButton.closest('.day-box');
            const tableBody = dayBox.querySelector('tbody');
            const newRowHTML = `
                <tr>
                    <td><input type="text" class="form-control" name="topic_day_${dayNumber}[]" placeholder="Topic"></td>
                    <td><input type="time" class="form-control" name="from_time_day_${dayNumber}[]"></td>
                    <td><input type="time" class="form-control" name="to_time_day_${dayNumber}[]"></td>
                    <td><input type="text" class="form-control" name="speaker_day_${dayNumber}[]" placeholder="Speaker"></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm remove-row" onclick="removeRow(this)">-</button>
                        <button type="button" class="btn btn-info btn-sm" onclick="addRowToDay(${dayNumber}, this)">+</button>
                    </td>
                </tr>
            `;
            tableBody.insertAdjacentHTML('beforeend', newRowHTML);
        };
    
        window.removeRow = function(removeButton) {
            const row = removeButton.closest('tr');
            const tbody = row.closest('tbody');
            if (tbody.rows.length > 1) {
                row.remove();
            } else {
                alert("You must have at least one row.");
            }
        };
    });
    
//formatting dates//
function formatDate(date) {
    const day = date.getDate();
    const month = date.getMonth() + 1; // getMonth() returns 0-11
    const year = date.getFullYear();
    return `${day}/${month}/${year}`;
}*/
////////////////////////////////////
document.addEventListener("DOMContentLoaded", function () {
  // Attach change event listeners to the date inputs
  const fromDateInput = document.getElementById("fromDate");
  const toDateInput = document.getElementById("toDate");

  updateAgenda()

  fromDateInput.addEventListener("change", updateAgenda);
  toDateInput.addEventListener("change", updateAgenda);

  // This function tries to update the agenda if both dates are selected
  function updateAgenda() {
    if (fromDateInput.value && toDateInput.value) {
      generateAgenda();
    }
  }

  // Generates the agenda based on the selected dates
  function generateAgenda() {
    const fromDate = new Date(fromDateInput.value);
    const toDate = new Date(toDateInput.value);
    const eventAgenda = document.getElementById("event-agenda");

    // Validate the dates
    if (toDate < fromDate) {
      alert("The 'To' date cannot be before the 'From' date.");
      return;
    }

    // Calculate the difference in days between the dates
    const dayDifference =
      Math.floor((toDate - fromDate) / (1000 * 60 * 60 * 24)) + 1;

    eventAgenda.innerHTML = '';

    // Generate an agenda for each day
    for (let day = 0; day < dayDifference; day++) {
      const dayDate = new Date(fromDate);
      dayDate.setDate(fromDate.getDate() + day);
      createDayAgenda(day + 1, dayDate, eventAgenda);
    }
  }

  // Creates the agenda for a given day
  function createDayAgenda(dayNumber, dayDate, eventAgenda) {
    const formattedDate = formatDate(dayDate); // Format the day's date

    let dayBoxHtml = `
            <div class="day-box" style="background-color: white; border-radius: 10px; margin-bottom: 20px; padding: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <h4 class="day-header" style="background-color: #e9ecef; padding: 10px; border-radius: 10px; position: sticky; left: 0;">Day ${dayNumber} (${formattedDate})</h4>
                <div class="table-responsive"> <!-- Make the table responsive -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Topic</th>
                                <th>From (Time)</th>
                                <th>To (Time)</th>
                                <th>Speaker</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>`;

    let dayBoxFoot = `</tbody>
                      </table>
                    </div>
                  </div>`;

    if(agendaValues[`${dayNumber}`]) {
      agendaValues[`${dayNumber}`]['data'].forEach((item) => {
        dayBoxHtml += `
        <tr class="day_${dayNumber}">
        <td><input type="text" class="form-control" name="topic[${dayNumber}][]" placeholder="Topic" value="${item[0]}"></td>
        <td><input type="time" class="form-control" name="from_time[${dayNumber}][]" value="${item[1]}"></td>
        <td><input type="time" class="form-control" name="to_time[${dayNumber}][]" value="${item[2]}"></td>
        <td><input type="text" class="form-control" name="speaker[${dayNumber}][]" placeholder="Speaker" value="${item[3]}"></td>
        <td>
            <button type="button" class="btn btn-danger btn-sm remove-row" onclick="removeRow(this)">-</button>
            <button type="button" class="btn btn-info btn-sm" onclick="addRowToDay(${dayNumber}, this)">+</button>
        </td>
        </tr>`;
      })
    } else {
      dayBoxHtml += `
      <tr class="day_${dayNumber}">
      <td><input type="text" class="form-control" name="topic[${dayNumber}][]" placeholder="Topic"></td>
      <td><input type="time" class="form-control" name="from_time[${dayNumber}][]"></td>
      <td><input type="time" class="form-control" name="to_time[${dayNumber}][]"></td>
      <td><input type="text" class="form-control" name="speaker[${dayNumber}][]" placeholder="Speaker"></td>
      <td>
          <button type="button" class="btn btn-danger btn-sm remove-row" onclick="removeRow(this)">-</button>
          <button type="button" class="btn btn-info btn-sm" onclick="addRowToDay(${dayNumber}, this)">+</button>
      </td>
      </tr>`;
    }

    dayBoxHtml += dayBoxFoot;
    eventAgenda.insertAdjacentHTML("beforeend", dayBoxHtml);
  }

  // Function to format a date object into a day/month/year string
  function formatDate(date) {
    const day = date.getDate();
    const month = date.getMonth() + 1; // Months are 0-indexed
    const year = date.getFullYear();
    return `${day}/${month}/${year}`; // Return the formatted date
  }

  // Function to add a new row to a specific day's agenda table
  window.addRowToDay = function (dayNumber, button) {
    const dayBox = button.closest(".day-box");
    const tableBody = dayBox.querySelector("tbody");
    const newRowHTML = `
            <tr class="day_${dayNumber}">
                <td><input type="text" class="form-control" name="topic_day[${dayNumber}][]" placeholder="Topic"></td>
                <td><input type="time" class="form-control" name="from_time_day[${dayNumber}][]"></td>
                <td><input type="time" class="form-control" name="to_time_day[${dayNumber}][]"></td>
                <td><input type="text" class="form-control" name="speaker_day[${dayNumber}][]" placeholder="Speaker"></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-row" onclick="removeRow(this)">-</button>
                    <button type="button" class="btn btn-info btn-sm" onclick="addRowToDay(${dayNumber}, this)">+</button>
                </td>
            </tr>
        `;
    tableBody.insertAdjacentHTML("beforeend", newRowHTML);
  };

  // Function to remove a specific row from a day's agenda table
  window.removeRow = function (button) {
    const row = button.closest("tr");
    // Check if it's the last row in the table, optionally prevent removing the last row
    if (row.parentNode.rows.length > 1) {
      row.remove();
    } else {
      alert("At least one agenda item is required.");
    }
  };
});
