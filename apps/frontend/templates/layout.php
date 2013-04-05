<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php //include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_component('components', 'style'); ?>
        <?php include_component('components', 'title'); ?>
        <link rel="shortcut icon" href="<?php echo url_for('@homepage')."images/favicon.ico"?>" />
        <?php include_javascripts() ?>
        <?php if (!include_slot('rss')): ?>
            <?php include_slot('rss') ?>
        <?php endif; ?>

        <meta charset="UTF-8" />   
    </head>
    <body>
        <div id="pagewidth" >
            <div id="header">
                <a id="title" href="<?php echo url_for('@homepage') ?>" >Podcast</a>
                <div class="search">
                    <form action="<?php echo url_for(array('action' => 'search', 'module' => 'home', 'sort' => $sf_request->getParameter('sort'))) ?>" method="get">
                        <h2><label for="search_keywords">Search:</label></h2>
                        <input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords" />
                        <input type="hidden" name="sort" value="<?php echo $sf_request->getParameter('sort') ?>" id="sort" />
                        <input type="submit" value="search" />
                    </form>
                </div>
            </div>
            <div id="leftcol">
                <?php include_component('components', 'categoryMenu'); ?>
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
