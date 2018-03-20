<?php
require_once('../util/secure_conn.php');  // require a secure connection
include '../view/header.php';
?>
   <main>
    <div id="main">
        <div id="content">
            <!-- display a login field -->
            <h2>Admin Login</h2>
            <form action="." method="post" id="aligned">
                <input type="hidden" name="action" value="login_administrator" />
                
				<label>Username:</label>
				<input type="text" name="username"><br>
		
				<label>Password:</label>
				<input type="text" name="password"><br>

				<label>&nbsp;</label>
				<input type="submit" value="Login">
            </form>
        </div>
    </div>
	</main>
<?php include '../view/footer.php'; ?>
