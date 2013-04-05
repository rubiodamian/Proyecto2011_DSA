<?php

class Util {

    static public function slugify($cadena) {
// Código copiado de http://cubiq.org/the-perfect-php-clean-url-generator
        $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $cadena);
        $slug = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $slug);
        $slug = strtolower(trim($slug, '-'));
        $slug = preg_replace("/[\/_|+ -]+/", '-', $slug);
        return $slug;
    }

    static public function shortURL($url) {
        $apiurl = "http://tinyurl.com/api-create.php?url=" . $url;
        $shortURL = file_get_contents($apiurl);

        return $shortURL;
    }

}