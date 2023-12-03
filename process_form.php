if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Check if the email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set the recipient email address
        $to = "stayinggreenlawncare@gmail.com";

        // Set the email subject
        $subject = "Contact Form Submission from $name";

        // Compose the email message
        $email_message = "Name: $name\n";
        $email_message .= "Email: $email\n\n";
        $email_message .= "Message:\n$message";

        // Set additional headers
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Send email
        if (mail($to, $subject, $email_message, $headers)) {
            echo "Thank you! Your message has been sent.";
        } else {
            echo "Oops! Something went wrong and we couldn't send your message.";
        }
    } else {
        echo "Invalid email address. Please provide a valid email.";
    }
} else {
    echo "Oops! Access denied.";
}
?>