<?php include '../view/header.php'; ?>
<main>
    <h1>Select Incident</h1>

    <!-- display a table of incidents -->
    <table>
        <tr>
            <th>Customer</th>
            <th>Product</th>
            <th>Date Opened</th>
            <th>Title</th>
			<th>Description</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($incidents as $incident) : ?>
        <tr>
            <td><?php echo htmlspecialchars($incident['firstName'].' '.$incident['lastName']); ?></td>
            <td><?php echo htmlspecialchars($incident['productCode']); ?></td>
            <td><?php echo htmlspecialchars($incident['dateOpened']); ?></td>
			<td><?php echo htmlspecialchars($incident['title']); ?></td>
			<td><?php echo htmlspecialchars($incident['description']); ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action"
                       value="select_incident">
					   <?php /* enter code here to store incidentID in session array */ ?>
                <input type="hidden" name="incident_id"
                       value="<?php echo htmlspecialchars($incident['incidentID']); ?>">
                <input type="submit" value="Select">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>

</main>
<?php include '../view/footer.php'; ?>