<?php

$siblings = nsi_get_siblings( get_the_ID() );
$children = nsi_get_children( get_the_ID() );

?>

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

    <?php if ( ( ! empty( $children ) ) || ( ! empty( $siblings ) ) ) : ?>

        <div class="flex-shrink-0 w-full lg:w-4/12">
            <div class="border-t lg:border-t-0 lg:border-l border-gray-400 lg:pl-6 py-6">

                <div class="flex flex-col space-y-8">

                    <?php if ( ! empty ( $children ) ) : ?>

                        <ul>
                            <?php foreach ( $children as $child ) : ?>
                                <li><a class="text-primary-blue hover:text-secondary-red" href="<?php echo esc_url_raw( $child->guid ) ?>"><?php echo $child->post_title; ?></a></li>
                            <?php endforeach; ?>
                        </ul>

                    <?php endif; ?>

                    <?php if ( ! empty ( $siblings ) ) : ?>

                        <ul>
                            <?php foreach ( $siblings as $sibling ) : ?>
                                <li><a class="text-primary-blue hover:text-secondary-red" href="<?php echo esc_url_raw( $sibling->guid ) ?>"><?php echo $sibling->post_title; ?></a></li>
                            <?php endforeach; ?>
                        </ul>

                    <?php endif; ?>

                </div>
            </div>
        </div>

    <?php endif; ?>
</div>
