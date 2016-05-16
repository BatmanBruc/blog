<!DOCTYPE html>
<html>
<?php
GetLayouts::layouts("head");
?>
<body>
	<div class="container">
		<?php
		GetLayouts::layouts("header");
		?>

		<div class="cont">
			<?php
			$i = 0;
			foreach($a as $Item):?>
			<div class="post_item" data-id="<?php echo $Item['id']; ?>">
			<div class="post">
				<h1><?php echo $Item['title']; ?></h1>
				<img src="/img/content/<?php echo $Item['img']; ?>.jpg" style="width: 250px;height: 250px; float: left;margin-right: 15px;">				
				<p><?php echo $Item['text']; ?></p>
				<i class="date"><?php echo $Item['date']; ?></i>
				<?php if(isset($_SESSION['user'])): ?>
				<div class='lucas'>
					<img class='img-luc' src="/img/lucas.png" data-id="<?php echo $Item['id']; ?>">
					<?php $i++; ?>
					<div class='count-luc'>
						<div class='count-luc<?php echo $i; ?>' data-id="<?php echo $Item['id']; ?>" id="count_luc<?php echo $Item['id']; ?>"><?php echo $Item['lucs']; ?></div>
					</div>
				</div>
			<?php endif; ?>
			</div>
						<div class="comments">
				<div class="comment_block" id="comment_block">

					</div>
					<?php if(isset($_SESSION['user'])): ?>
							<div class="form">
							<textarea class="text" name="text" rows="6" cols="160" id="first" ></textarea>
							<input type="submit" name="submit" value="Отправить" style="float: right;" class="submit_com"  data-id="<?php echo $Item['id']; ?>">
							</div>
					<?php else: ?>
						<div><p>Зарегистрируйтесь и войдите,что бы коменнтировать! </p></div>
						<?php endif; ?>
				</div>
			</div>
		<?php endforeach;?>
		
	</div>
</body>
</html>
