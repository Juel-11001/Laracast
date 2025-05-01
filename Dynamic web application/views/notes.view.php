<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/header.php') ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        <p>My Notes</p>
<!--        <p class="text-red-500 text-2xl mt-2">show all notes here form john : </p>-->
		<?php foreach ($notes as $note) : ?>
            <li>
                <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline"><?= $note['body'] ?></a>
            </li>
		<?php endforeach; ?>
    </div>
</main>
<?php require('partials/footer.php') ?>
