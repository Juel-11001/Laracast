<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/header.php') ?>
<main>
	<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
		<!-- Your content -->
		<p class="ml-2 text-red-400 mx-auto"><?=  $note['body'] ?></p>
        <p class="text-blue-500 underline mt-5"><a href="/notes">Go Back To Notes -></a></p>
	</div>
</main>
<?php require('partials/footer.php') ?>
