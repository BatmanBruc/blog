		<div class="head">
			<div class="logo">БЛОГ</div>
			<div class="menu">
				<a href="/">Главная</a>
			</div>
			<div class="menu_users">
				<?php if(isset($_SESSION['user'])): ?>
				<a href="/user/logout">Выход</a>
				<a href="/cabinet/" style="border:none"><?php GetUser::getName($_SESSION['name']) ?></a>
			<?php else: ?>
				<a href="/user/reg">Регистрация</a>
				<a href="/user/login" style="border:none">Вход</a>
			<?php endif; ?>
			</div>
		</div>
