<div class="flex flex-col lg:flex-row space-y-10 lg:space-y-0 lg:space-x-10">
    <div class="flex-grow">

        <article>
            <header class="mb-12">
                <h1 class="text-5xl font-black uppercase"><?php the_title(); ?></h1>
            </header>

            <main class="text-xl">
                <?php the_content(); ?>
            </main>
        </article>

    </div>
</div>
