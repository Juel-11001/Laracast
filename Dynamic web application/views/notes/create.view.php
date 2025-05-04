<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/header.php') ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="post">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="note_body" class="block text-sm/6 font-medium text-gray-900">Note Body</label>
                            <div class="mt-2">
                                <textarea name="note_body" id="note_body" cols="60" rows="5"
                                          placeholder="Here's an idea for your notes..."><?=  $_POST['note_body'] ?? '' ?></textarea>
								<?php if (isset($errors['note_body'])) : ?>
                                    <p class="mt-3 text-red-500 text-xs"><?= $errors['note_body'] ?></p>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save
                </button>
            </div>
        </form>
    </div>

</main>
<?php require base_path('views/partials/footer.php') ?>
