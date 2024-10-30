<style>

	.loader_css3_overlay {
		background: <?php echo $bg_color ?>;
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 999999;
	}

	.loader_css3 {
		width: 200px;
		left: calc(50% - 100px);
		color: <?php echo $color ?>;
		text-align: center;
		position: absolute;
		top: 40%;
	}

	.loader_css3 .square {
		width: 20px;
		height: 20px;
		background-color: <?php echo $color ?>;
		padding: 20px;
		border-radius: 5px;
		animation: square 2s linear infinite;
		text-align: center;
		margin: 0px auto 0px auto;
	}

	.loader_css3 .text {
		font-size: 20px;
		color: <?php echo $color ?>;
		text-align: center;
		margin-top: 20px;
	}

	@keyframes square {
		0%{
			transform: rotate(0deg);
		}
		50%{
			transform: rotate(180deg);
		}
		100%{
			transform: rotate(360deg);
		}
	}

</style>
<div class="loader_css3_overlay">
	<div class="loader_css3">
      <div class="square"></div>
      <div class="text"><?php echo $text ?></div>
	</div>
</div>