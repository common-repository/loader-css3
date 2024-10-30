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

	.loader_css3 .round {
		margin: 0px auto 0px auto;
		color: <?php echo $bg_color ?>;
		text-align: center;
		width: 80px;
		height: 80px;
		border-radius: 50%;
		border-top: 5px solid <?php echo $color ?>;
		border-right: 5px solid<?php echo $color ?>;
		animation: round 2s linear infinite;
	}

	.loader_css3 .text {
		margin-top: 15px;
		color: <?php echo $color ?>;
		font-size: 18px;
	}

	@keyframes round {
		0%{
			transform: rotate(0deg);
			opacity: 1;
		}
		50%{
			transform: rotate(180deg);
			opacity: 0.4;
		}
		100%{
			transform: rotate(360deg);
			opacity: 1;
		}
	}

</style>
<div class="loader_css3_overlay">
	<div class="loader_css3">
     	<div class="round"></div>
     	<div class="text"><?php echo $text ?></div>
	</div>
</div>