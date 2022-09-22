       
        <div class="header">
			<h1>Bottom-Sheet</h1>
			<button id="country-select-button">Bottom ?</button>
		</div>
		<!-- bottom sheet
		<div id="country-selector" class="c-bottom-sheet c-bottom-sheet--list">
			<div class="c-bottom-sheet__scrim"></div>
			<div class="c-bottom-sheet__sheet">

				<div class="c-bottom-sheet__handle">
					<span></span>
					<span></span>
				</div>

				<ul class="c-bottom-sheet__list">
					<li class="c-bottom-sheet__item active">
						<a class="c-bottom-sheet__link" href="/" class="d-flex justify-content-between">Indonesia
							<i class="c-bottom-sheet__tick gi gi-tick"></i>
						</a>
					</li>
					<li class="c-bottom-sheet__item"><a class="c-bottom-sheet__link" href="">Singapore</a></li>
					<li class="c-bottom-sheet__item"><a class="c-bottom-sheet__link" href="">India</a></li>
					<li class="c-bottom-sheet__item"><a class="c-bottom-sheet__link" href="">Thailand</a></li>
					<li class="c-bottom-sheet__item"><a class="c-bottom-sheet__link" href="">Vietnam</a></li>
				</ul>

			</div>
			<div class="c-bottom-sheet__container">

			</div>
		</div> -->
<script>
var bottomSheet = new BottomSheet("country-selector");
document.getElementById("country-select-button").addEventListener("click", bottomSheet.activate);
window.bottomSheet = bottomSheet;
</script>
