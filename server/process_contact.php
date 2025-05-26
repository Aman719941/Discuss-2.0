<?php
/**
 * process_contact.php
 * This script handles the submission of the contact form.
 */

// Check if the form was submitted using the POST method and the 'send_message' button.
if (isset($_POST['send_message'])) {

    // Retrieve form data directly from $_POST.
    // For a production application, ALWAYS perform robust validation and sanitization
    // to prevent vulnerabilities like XSS and email header injection.
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Basic validation for required fields.
    if (empty($name) || empty($email) || empty($message)) {
        // Redirect back to the client contact page with a 'missing_fields' status.
        header("Location: ../client/contact.php?status=missing_fields");
        exit(); // Always exit after a header redirect.
    }

    // Basic email format validation.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Redirect with an 'invalid_email' status if the email format is not valid.
        header("Location: ../client/contact.php?status=invalid_email");
        exit(); // Always exit after a header redirect.
    }

    // --- Email Sending Logic ---

    // Your email address where you want to receive messages.
    // <<< IMPORTANT: CHANGE THIS TO YOUR ACTUAL EMAIL ADDRESS >>>
    $to_email = 'Aman719941@gmail.com';

    // Subject for the email you will receive.
    $email_subject = "New Contact Message from Discuss_2.0: " . $subject;

    // The content of the email, formatted for readability.
    $email_body = "You have received a new message from the Discuss_2.0 contact form.\n\n";
    $email_body .= "Name: " . $name . "\n";
    $email_body .= "Email: " . $email . "\n";
    $email_body .= "Subject: " . $subject . "\n";
    $email_body .= "Message:\n" . $message . "\n";

    // Email headers.
    $headers = "From: " . $email . "\r\n"; // Sets the sender's email to the user's email.
    $headers .= "Reply-To: " . $email . "\r\n"; // Allows you to reply directly to the sender.
    $headers .= "X-Mailer: PHP/" . phpversion(); // Optional: Add PHP version.

    // Attempt to send the email.
    // Note: For reliable email sending, especially in production, consider using PHPMailer or a similar library/service.
    if (mail($to_email, $email_subject, $email_body, $headers)) {
        // If email sent successfully, redirect back to the client contact page with a success message.
        header("Location: ../client/contact.php?status=success");
        exit(); // Always exit after a header redirect.
    } else {
        // If email sending failed, redirect with an error message.
        header("Location: ../client/contact.php?status=error");
        exit(); // Always exit after a header redirect.
    }

} else {
    // If someone tries to access this script directly without submitting the form,
    // redirect them back to the contact page.
    header("Location: ../client/contact.php");
    exit(); // Always exit after a header redirect.
}
?>
