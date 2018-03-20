<?php include '../view/header.php'; ?>
<main>

    <h2>Assign Incident</h2>
        <form action="" method="post" id="aligned">
            <input type="hidden" name="action" value="register_product">

            <label>Customer:</label>
            <label><?php echo htmlspecialchars(
                    $incidentToAssign['firstName'] . ' ' . 
                    $incidentToAssign['lastName']); ?></label>
            <br>

            <label>Product:</label>
            <label><?php echo htmlspecialchars(
                    $incidentToAssign['productCode']); ?></label>
            <br> 
			
			<label>Technician:</label>
            <label><?php echo htmlspecialchars(
                    $technician['firstName'] . ' ' .
					$technician['lastName']); ?></label>
            <br> 

            <label>&nbsp;</label>
            <input type="submit" value="Assign Incident">
        </form>
</main>
<?php include '../view/footer.php'; ?>