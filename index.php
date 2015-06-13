<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Clicker Heroes Api</title>
	</head>
	<body>
		<div style="display: block;width: 940px;margin: 0 auto;">
			<div style="display: block;width: 100%;float: left;">
				<p>Input your save file here:</p>
				<form id="saveFile">
					<textarea name="save" id="save" cols="100" rows="20"></textarea>
					<input type="submit">
				</form>
			</div>
			<div style="display: block;width: 100%;position: relative;float: left;">
				<div class="output" style="display: block;">
					<pre style="display: block;width: 940px;"></pre>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('form').submit(function(e) {
					$.ajax({
						type 	: 'POST',
						url 	: 'process.php',
						data	: $("#saveFile").serialize(),
						success : function(data) {
							$('.output pre').html(JSON.stringify($.parseJSON(data), null, 4))
						}
					})

					e.preventDefault();
				})
			})
		</script>
	</body>
</html>