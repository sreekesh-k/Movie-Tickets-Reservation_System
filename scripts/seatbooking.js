
function showSelectedSeats() {
    var selectedSeats = document.querySelectorAll('.seat-checkbox:checked');
    var selectedSeatsArray = Array.from(selectedSeats).map(seat => seat.value);
    alert("Selected Seats: " + selectedSeatsArray.join(", "));
    // You can also perform other actions with the selected seats here, such as submitting the form
    // document.getElementById("seatForm").submit();
}
