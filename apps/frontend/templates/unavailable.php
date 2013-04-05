<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_component('components', 'style'); ?>
        <?php include_component('components', 'title'); ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_javascripts() ?>
    </head>
    <body>
        <div id="pagewidth" >
            <div id="header">
                <a id="title" href="../front-end" >Podcast</a>
            </div>
            <div id="maincol">
                <?php echo $sf_content ?>
            </div>
            <div id="footer">
                <h2>Footer</h2>
            </div>
        </div>
    </body>
</html>