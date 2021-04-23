<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>user_guide/_css/style.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>user_guide/_bootstrap/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>user_guide/_bootstrap/bootstrap-responsive.css">
		<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
		<title>Ajax Notes</title>

		<script>
			$(document).ready(function(){
				$.get("/notes/notes_html", function(notes){
					$(".note-cont").html(notes);
				});
				
				$('#add').submit(function(){
					$.post($(this).attr('action'), $(this).serialize(), function(notes){
						$('.note-cont').html(notes);
					});
					return false;
				});
			});
		</script>
	</head>

	<body>
		<div id="main-container">
			<div class="container-fluid cont">
				<h2>Notes</h2>
				<div class="note-cont">
				</div>
				<div id="container-fluid cont">
					<form action="/notes/add" method="post" id="add">
						<input type="text" name="title" id="new-note" placeholder="Insert Note Title Here"><br>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>