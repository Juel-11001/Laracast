<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/header.php') ?>
<main>
	<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
		<!-- Your content -->
        <p class="text-blue-500 underline mb-5"><a href="/notes">Go Back To Note -></a></p>
		<p class="ml-2 mx-auto"><?=  $note['body'] ?></p>
        <form  method="post" class="mt-4">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <input type="hidden" name="_method" value="DELETE">
            <button  type="submit" class="text-red-500">Delete</button>
        </form>
	</div>
</main>
<?php require base_path('views/partials/footer.php') ?>
