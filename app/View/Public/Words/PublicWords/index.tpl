{wrap_template file="plain" title="単語帳"}

{include_js file="jquery.swatchbook.js"}
{include_css file="words"}

<div id="sb-container" class="sb-container">
	<div>
		<!-- インライン要素 -->
		<span class="sb-icon icon-cog"></span>
		<h4><span>All Settings</span></h4>
	</div>
	<div>
		<span class="sb-icon icon-flight"></span>
		<h4><span>User Modes</span></h4>
	</div>
<!-- 	<div>	
		<h4><span>Profile</span></h4>
		<h5><span>We ♥ color</span></h5>
	</div>
 -->
</div>

<script type="text/javascript">
	$(function() {
	
		$( '#sb-container' ).swatchbook( {
			speed : 500,
			easing : 'ease-out',
			// index of initial centered item
			center : 7,
			// number of degrees that is between each item
			angleInc : 14,
			// amount in degrees for the opened item's next sibling
			proximity : 40,
			// amount in degrees between the opened item's next siblings
			neighbor : 2
		});
	
	});
</script>
