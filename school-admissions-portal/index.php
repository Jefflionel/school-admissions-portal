<?php include 'header.php'; ?>

<h2>Applications</h2>
<form method="GET">
    Filter by Status:
    <select name="status">
        <option value="">All</option>
        <option value="Pending">Pending</option>
        <option value="Accepted">Accepted</option>
        <option value="Rejected">Rejected</option>
    </select>
    <button type="submit">Filter</button>
</form>

<table border="1">
    <tr>
        <th>Name</th><th>Email</th><th>Program</th><th>Status</th><th>Action</th>
    </tr>
    <?php
    $statusFilter = isset($_GET['status']) ? $_GET['status'] : '';
    $query = "SELECT * FROM applications";
    if ($statusFilter) {
        $query .= " WHERE status='$statusFilter'";
    }
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['program']}</td>
                <td>{$row['status']}</td>
                <td><a href='update.php?id={$row['id']}'>Update</a></td>
              </tr>";
    }
    ?>
</table>


