<div class="flex flex-col lg:flex-row space-y-10 lg:space-y-0 lg:space-x-10">
    <div class="flex-grow">

        <article>
            <header class="mb-12">
                <h1 class="text-5xl font-black uppercase"><?php the_title(); ?></h1>
            </header>

            <div class="flex flex-col lg:flex-row space-y-10 lg:space-y-0 lg:space-x-10">
                <div class="flex-grow">
                    <main class="text-xl">
                        <?php the_content(); ?>
                    </main>
                </div>

                <?php
                if (has_post_thumbnail( get_the_ID() ) ):
                    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' );
                    $original  = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                ?>

                    <div class="flex-shrink-0 w-full lg:w-4/12">
                        <div class="lg:pl-6">

                            <img class="hidden lg:block w-full h-auto" src="<?php echo esc_url_raw( $thumbnail[0] ); ?>">
                            <img class="block lg:hidden w-full h-auto" src="<?php echo esc_url_raw( $original[0] ); ?>">

                        </div>
                    </div>

                <?php endif; ?>

            </div>
        </article>

    </div>
</div>
