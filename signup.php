<?php
	require  "header.php";
?>

	<main>
		<div class="wrapper-main">
			<section class="section-default">
				<h1>Signup</h1>
        <form action="includes/signup.inc.php" method="post">
          <input type="text" name="uid" placeholder="username">
          <input type="text" name="mail" placeholder="E-mail">
          <input type="password" name="pwd" placeholder="Password">
          <input type="password" name="pwd-repaeat" placeholder="Repeat password">
          <button type="submit" name="signup">Signup</button>
				</form>
			</section>
		</div>
	</main>
<?php
	require "footer.php";
?>
