<?php
include_once 'class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $problem = isset($_POST['probléme']) ? $_POST['probléme'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $selectedDevelopers = isset($_POST['developpeur']) ? $_POST['developpeur'] : [];

    // Process the data and insert into the "tickets" table
    $connection = new Conn();

    // Sanitize and escape input data (to prevent SQL injection)
    $problem = mysqli_real_escape_string($connection->conn, $problem);
    $description = mysqli_real_escape_string($connection->conn, $description);

    // Assuming "tickets" table has columns: probleme, description
    $insertQuery = "INSERT INTO tickets (probléme, description) VALUES ('$problem', '$description')";





        foreach ($selectedDevelopers as $developerName) {
            $developerName = mysqli_real_escape_string($connection->conn, $developerName);
            $insertDeveloperQuery = "INSERT INTO ticket (ticket, developpeur) VALUES ('$ticketId', '$developerName')";
            $connection->conn->query($insertDeveloperQuery);
        }

        echo "Ticket submitted successfully!";
    } else {
        echo "Error submitting ticket. Please try again.";
    }

?>
