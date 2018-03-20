<?php include '../view/header.php'; ?>
<main>
    <h1>Technician Login</h1>
    
        <p class="title">You must log in before you can update an incident.</p>
        <form action="." method="post" id="aligned">
            <input type="hidden" name="action" value="login">

            <label>Email:</label>
            <input type="text" name="email"><br>

            <label>Password:</label>
            <input type="password" name="password"><br>

			<label>&nbsp;</label>
			<input type="submit" value="Login"><br>
            
		</form>
			
            <?php if (!empty($error_message)) : ?>         
            <span class="error"><?php echo htmlspecialchars($error_message); ?></span><br>
            <?php endif; ?>
   
</main>
<?php include '../view/footer.php'; ?>
