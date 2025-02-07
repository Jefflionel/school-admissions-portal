<?php include 'header.php'; ?>

<h2>Submit Application</h2>
<form action="submit.php" method="POST">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Program: <input type="text" name="program" required><br>
    <button type="submit">Submit</button>
</form>

<?php include 'footer.php'; ?>
