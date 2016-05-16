<!DOCTYPE html>
<html>
<?php
GetLayouts::layouts("head");
?>
<body>
	<div class="container">
		<?php
		Getlayouts::layouts("header");
		?>


		<div class="cont">
			<?php if(!$result == false): ?>
				<p>Вы зарегистрированы!</p>
			<?php else: ?>
				<?php if (isset($errors) && is_array($errors)): ?>
					<ul>
						<?php foreach ($errors as $error): ?>
							<li><?php echo $error ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			<form action = "#" method="POST">
				<input class="field" type="text" name="name" placeholder="Имя" value="<?php echo $name ?>">
				<hr>
				<input class="field" type="email" name="email" placeholder="email" value="<?php echo $email ?>">
				<hr>
				<input class="field" type="password" name="password" placeholder="password" value="<?php echo $password ?>">
				<hr>
				<input type="submit" name="submit" value="Регистрация" class="submit">
			</form>
			<?php endif; ?>
		</div>

		<?php

		?>
	</div>
</body>
</html>
