<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="mt-5 md:col-span-2 md:mt-0">
                        <form method="POST" action="/note">
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="id" value="<?= $note['id'] ?>">

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="col-span-full">
                                    <label for="body" class="block text-sm/6 font-medium text-gray-900">Body</label>
                                    <div class="mt-2">
                                        <textarea
                                                  name="body" id="body" rows="3"
                                                  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        ><?= $note['body'] ?></textarea>

                                        <?php if (isset($errors['body'])): ?>
                                            <ul>
                                                <li class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></li>
                                            </ul>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6 flex gap-x-4 justify-end">
                                <a class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                   href="/notes">Cancel</a>
                                <button type="submit"
                                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                >Update</button>
                            </div>
                        </form>

                        <form id="delete-form" class="hidden" method="post" action="/note">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" value="<?= $note['id'] ?>" name="id">
                            <button class="text-sm text-red-500">Delete</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </main>

<?php require base_path('views/partials/footer.php') ?>