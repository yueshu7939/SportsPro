<?php include ('../view/header.php')?>
<main>
		<h1>Assign Incident</h1>
				<p><?php if (isset($error)) : ?>
			<p class="valerror"><?php echo $error; ?></p>
			<p><?php elseif (isset($success)) : ?>
			<p class="title"><?php echo $success; ?></p>
			<a class="title" href="?action=list_incidents">Select Another Incident</a>
</main>
<?php

endif;
include ('../view/footer.php')?>
</html>
