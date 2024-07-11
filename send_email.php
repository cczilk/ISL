<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gather form fields into variables
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Set up email parameters
    $to = "your_email@example.com"; // Replace with your email address
    $email_subject = "New Inquiry: " . $subject;
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone: $phone\n";
    $email_body .= "Message:\n$message";
    
    // Headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "Message could not be sent.";
    }
} else {
    echo "Error: Invalid request method.";
}
?>
