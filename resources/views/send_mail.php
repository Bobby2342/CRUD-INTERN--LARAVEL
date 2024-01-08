<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $to = "bgoogly0@gmail.com"; // Replace with your email address
  $subject = "New Contact Form Submission";
  $body = "Name: $name\nEmail: $email\nMessage: $message";

  $headers = "From: $email";

  if (mail($to, $subject, $body, $headers)) {
    echo "Email sent successfully!";
  } else {
    echo "Failed to send email. Please try again.";
  }
}
?>
