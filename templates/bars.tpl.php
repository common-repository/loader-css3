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
		width: 280px;
		left: calc(50% - 140px);
		color: <?php echo $color ?>;
		text-align: center;
		position: absolute;
		top: 40%;
	}

	.loader_css3 div.bar {
		width: 10px;
		height: 30px;
		background-color: <?php echo $color ?>;
		display: inline-block;
	}

	.loader_css3 div.text {
		display: block;
		font-size: 26px;
	}

	.loader_css3 div.bar1{
		animation: bar_anim 1s linear infinite;
	}
	.loader_css3 div.bar2 {
		animation: bar_anim 1s linear -0.25s infinite;
	}
	.loader_css3 div.bar3 {
		animation: bar_anim 1s linear -0.5s infinite;
	}
	@keyframes bar_anim {
		0%{
			transform: scaleY(0);
			opacity: 1;
		}
		50%{
			transform: scaleY(1);
			opacity: 0.4;
		}
		100%{
			transform: scaleY(0);
			opacity: 1;
		}
	}

</style>
<div class="loader_css3_overlay">
	<div class="loader_css3">
	    <div class="bar bar1"></div>
	    <div class="bar bar2"></div>
	    <div class="bar bar3"></div>
	    <div class="text"><?php echo $text ?></div>
	</div>
</div>