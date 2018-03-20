<?php
require_once('../util/secure_conn.php');  // require a secure connection
require_once('../util/valid_admin.php');  // require a valid admin user
include '../view/header.php';
?>

    <main>
        <nav>
        <h2>Admin Menu</h2>
        <ul>
            <li><a href="../product_manager">Manage Products</a></li>
            <li><a href="../technician_manager">Manage Technicians</a></li>
            <li><a href="../customer_manager">Manage Customers</a></li>
            <li><a href="../incident_create">Create Incident</a></li>
            <li><a href="../incident_assign">Assign Incident</a></li>
            <li><a href="../display_incident">Display Incidents</a></li>
        </ul>
        </nav>
        <?php include '../view/admin_login_status.php'?>
    </main>
<?php include '../view/footer.php'; ?>
