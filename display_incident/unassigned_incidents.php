<?php

include '../view/header.php';
?>
<main>
    <div id="main">

        <div id="content">
            <!-- display a table of unassigned incidents -->
            <h2>Unassigned Incidents</h2>
            <link rel="stylesheet" media="all" href="../main.css">
            <p><a href="?action=assigned_incidents">View Assigned Incidents</a></p>
            <table>
                <tr>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Incident</th>
                </tr>
                <?php foreach ($incidents as $incident) : ?>
                    <tr>
                        <td><?php echo $incident['firstName']; ?>
                            <?php echo $incident['lastName'] ?></td>
                        <td><?php echo $incident['productName']; ?></td>
                        <td>
                            <table id="no_border">
                                <tr>
                                    <td>ID:</td>
                                    <td><?php echo $incident['incidentID']; ?></td>
                                </tr>
                                <tr>
                                    <td>Opened:</td>
                                    <td><?php $openDate = new DateTime($incident['dateOpened']);
                                        echo $openDate->format('n/j/Y'); ?></td>
                                </tr>
                                <tr>
                                    <td>Title:</td>
                                    <td><?php echo $incident['title']; ?></td>
                                </tr>
                                <tr>
                                    <td>Description:</td>
                                    <td><?php echo $incident['description']; ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</main>
<?php include '../view/footer.php'; ?>
