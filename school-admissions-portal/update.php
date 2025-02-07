<?php
include 'header.php';
include 'db.php'; // Ensure the database connection is included

// Load PHPMailer
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM applications WHERE id = $id";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST['status'];
    $message = $_POST['message'];
    $email = $row['email']; // Get applicant's email from database
    $name = $row['name'];   // Get applicant's name

    // Update status in the database
    $updateQuery = "UPDATE applications SET status='$status', message='$message' WHERE id=$id";
    if ($conn->query($updateQuery) === TRUE) {
        echo "<p>Application updated successfully!</p>";

        // Send Email Notification
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Your SMTP server (Gmail, Outlook, etc.)
            $mail->SMTPAuth = true;
            $mail->Username = 'jefflionel40@gmail.com'; // Your email
            $mail->Password = 'qiqnwzrftxzewdmq'; // Your email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Email settings
            $mail->setFrom('your-email@gmail.com', 'Admin');
            $mail->addAddress($email, $name); // Send email to applicant
            $mail->Subject = "Application Status Update";
            $mail->Body = "Dear $name,\n\nYour application status has been  $status.\n\nMessage: $message\n\nBest regards,\nAdmissions Office";

            $mail->send();
            echo "<p>Email notification sent to applicant!</p>";
        } catch (Exception $e) {
            echo "<p>Email could not be sent. Mailer Error: {$mail->ErrorInfo}</p>";
        }
    } else {
        echo "<p>Error updating application: " . $conn->error . "</p>";
    }
}
?>

<h2>Update Application Status</h2>
<form method="POST">
    Status:
    <select name="status">
        <option value="Pending" <?php if ($row['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
        <option value="Accepted" <?php if ($row['status'] == 'Accepted') echo 'selected'; ?>>Accepted</option>
        <option value="Rejected" <?php if ($row['status'] == 'Rejected') echo 'selected'; ?>>Rejected</option>
    </select>
    <br>
    Custom Message: <textarea name="message"><?php echo $row['message']; ?></textarea><br>
    <button type="submit">Update</button>
</form>

<?php include 'footer.php'; ?>
