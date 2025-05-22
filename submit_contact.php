<?php
// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $name = htmlspecialchars(trim($_POST["name"]));
    $company = htmlspecialchars(trim($_POST["company"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST["phone"]));
    $service = htmlspecialchars(trim($_POST["service"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Optional: Save to file (append mode)
    $entry = "Name: $name\nCompany: $company\nEmail: $email\nPhone: $phone\nService: $service\nMessage:\n$message\n--------------------\n";
    file_put_contents("submissions.txt", $entry, FILE_APPEND);

    // Optional: Send an email
    $to = "inukawijerathna210@gmail.com"; // change this to your email
    $subject = "New Contact Form Submission";
    $headers = "From: $email\r\n";
    $email_body = $entry;
    mail($to, $subject, $email_body, $headers);

    // Return a simple response
    echo "success";
} else {
    echo "error";
}
?>
