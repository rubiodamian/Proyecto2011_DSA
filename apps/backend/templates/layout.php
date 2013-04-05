<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta charset="UTF-8" /> 
        <?php include_metas() ?>
        <?php include_component('components', 'style'); ?>
        <?php include_component('components', 'title'); ?>
        <link rel="shortcut icon" href="<?php echo url_for('@homepage')."images/favicon.ico"?>" />
        <?php include_javascripts() ?>
        <?php include_stylesheets() ?>
        
    </head>
    <body>
        <div id="pagewidth" >
            <div id="header">
                <a id="title" href="<?php  echo url_for('@homepage') ?> ">Podcast</a>
                <div class="logbutton" id="logbutton">
                    <a id="logoutbuton" href="<?php  echo url_for('@sf_guard_signout') ?>" >Log out</a>                   
                </div>
            </div>
            <div id="leftcol">
                <div class="menu-div" id="menu-div">
                    <ul id="menu-list">
                        <li class="active"><a href="<?php  echo url_for('@podcast') ?>" onclick="menu()">Podcast</a></li>
                        <li><a href="<?php  echo url_for('@episode') ?>">Episodes</a></li>
                        <?php include_component('components', 'isAdmin'); ?>                        
                    </ul>
                </div>
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