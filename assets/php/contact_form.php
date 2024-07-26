<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Format data
    $data = "Name: " . $name . "\nEmail: " . $email . "\nSubject: " . $subject . "\nMessage: " . $message . "\n\n";

    // Define the path to the text file
    $file_path = "contacts.txt";

    // Open the file in append mode
    $file = fopen($file_path, "a");

    if ($file) {
        // Write data to the file
        fwrite($file, $data);

        // Close the file
        fclose($file);

        // Redirect to a thank you page or wherever you want
        header("Location: index.html");
        exit();
    } else {
        // Print an error message if unable to open the file
        die("Error: Unable to open the file for writing.");
    }
}
?>
