<?php
// Get the filter values from the AJAX request
$location = $_POST["location"];
$budget = $_POST["budget"];
$seatingCapacity = $_POST["seating_capacity"];

// Connect to the database
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "car_rental";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Build the SQL query based on the filter values
$sql = "SELECT * FROM cars WHERE 1=1";
if ($location != "anywhere") {
  $sql .= " AND location='$location'";
}
if ($budget > 0) {
  $sql .= " AND price_per_day<=$budget";
}
if ($seatingCapacity != "any") {
  $sql .= " AND seating_capacity=$seatingCapacity";
}

// Execute the query and retrieve the results
$result = mysqli_query($conn, $sql);

// Display the results as an HTML table
echo "<table>";
echo "<tr><th>Make</th><th>Model</th><th>Year</th><th>Location</th><th>Seating Capacity</th><th>Price per Day</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr><td>" . $row["make"] . "</td><td>" . $row["model"] . "</td><td>" . $row["year"] . "</td><td>" . $row["location"] . "</td><td>" . $row["seating_capacity"] . "</td><td>" . $row["price_per_day"] . "</td></tr>";
}
echo "</table>";

// Close the database connection
mysqli_close($conn);
?>
