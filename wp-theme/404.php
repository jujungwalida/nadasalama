<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body class="bg-gray-100">
    <?php wp_body_open(); ?>

    <div class="flex items-center w-6/12 h-screen mx-auto">
        <div>
            <h1 class="text-9xl font-black uppercase">404</h1>
            <p class="text-xl mt-4 mb-8"><?php echo esc_html( 'Sorry but the page you are looking for does not exist, have been removed, name changed or is temporarily unavailable.' ); ?></p>
            <a class="text-sm font-black uppercase text-gray-100 bg-primary-red rounded shadow inline-block px-6 py-4 hover:text-white hover:bg-secondary-red focus:outline-none" href="<?php echo esc_url( home_url( '/' ) ); ?>">Go to Home Page</a>
        </div>
    </div>

    <?php wp_footer(); ?>
</body>
</html>