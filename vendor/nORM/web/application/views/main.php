

<html>
    <head>

    </head>

    <body>
    <?php
    require_once('../vendor/xamin/handlebars.php/src/Handlebars/Autoloader.php');

    use Handlebars\Handlebars;

    \Handlebars\Autoloader::register();

    $engine = new Handlebars(array(
        'loader' => new \Handlebars\Loader\FilesystemLoader(__DIR__.'/templates/')
    ));

    echo $engine->render('main', $content);


    ?>
    content: abc<?php echo $content['content'] ?>
    </body>
</html>