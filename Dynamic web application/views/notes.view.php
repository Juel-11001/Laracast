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
        <p class=" mt-4">
            <a href="/note/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full transition ease-in ">Create Notes</a>
        </p>
    </div>
</main>
<?php require('partials/footer.php') ?>
