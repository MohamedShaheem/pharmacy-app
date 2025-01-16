<?php
include('conn.php'); // Include your database connection

// Fetch drugs from the database
$sql = "SELECT id, drugname, price FROM drugs";
$result = mysqli_query($conn, $sql);

// Check if any drugs are found
if (mysqli_num_rows($result) > 0) {
    echo '<table class="table table-bordered">';
    echo '<thead><tr><th>ID</th><th>Drug Name</th><th>Price</th></tr></thead>';
    echo '<tbody>';
    
    // Loop through each drug and display it in the table
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['drugname']) . '</td>';
        echo '<td>' . htmlspecialchars($row['price']) . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p>No drugs available.</p>';
}

mysqli_close($conn);
?>
