<?php include '../view/header.php'; ?>
<main>
    <h1>Select Technician</h1>

    <!-- display a table of incidents -->
    <table>
        <tr>
            <th>Name</th>
            <th>Open Incidents</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($techIncidents as $techIncident) : ?>
        <tr>
            <td><?php echo htmlspecialchars($techIncident['firstName'].' '.$techIncident['lastName']); ?></td>
            <td><?php echo htmlspecialchars($techIncident['open_incidents']); ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action"
                       value="assign_incident">
                <input type="hidden" name="tech_id"
                       value="<?php echo htmlspecialchars($techIncident['techID']); ?>">
                <input type="submit" value="Select">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>

</main>
<?php include '../view/footer.php'; ?>