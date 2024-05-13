<?php
$name = "Home";
?>

<html>

<head>
	<title>
		<?= $name ?> view
	</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
		crossorigin="anonymous"></script>
		<link rel="stylesheet" href="/app/styles.css">
</head>

<body>
	<div class='container'>
		<br>
		<a href='/User/login'>Login</a>
		|
		<a href='/User/register'>Register</a>
		<br>
		<br>
		<form action="/User/search" method="GET">
			<input type="text" name="query" placeholder="Search publications...">
			<button type="submit">Search</button>
		</form>
		<div class="container">
			<?php foreach ($data as $publication): ?>
				<div class="publication-container">
					<table>
						<tr>
							<td>
								<h3>
									<?= $publication->publication_title ?>
								</h3>
							</td>
						</tr>
						<tr>
							<td>
								<?= $publication->publication_text ?>
							</td>
						</tr>
						<tr>
							<td>
								<br>
								<small>
									<?= $publication->timestamp ?>
								</small>
							</td>
						</tr>
						<!-- Display comments for this publication -->
                        <tr>
                            <td><br>
                                <h4 style="margin-left: 25px;">Comments:</h4>
                                <?php
                                // Fetch comments for this publication
                                $publicationCommentModel = new \app\models\PublicationComment();
                                $comments = $publicationCommentModel->getAllCommentsForPublication($publication->publication_id);
                                
                                // Display each comment
                                foreach ($comments as $comment) {
                                    echo "<p style='margin-left: 25px;'>{$comment->publication_comment_text}</p>";
                                }
                                ?>
                            </td>
                        </tr>
					</table>
				</div>
				<br>
			<?php endforeach; ?>
		</div>
	</div>
</body>

</html>