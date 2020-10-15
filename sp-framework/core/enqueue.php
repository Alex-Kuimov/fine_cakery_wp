<?php
/*
* Styles and Scripts 
*/


$spMC = new SP_Framework_Enqueue();
 
$args = array(
 	'css' => array(
 		array(
 			'name' 	=> 'swiper',
			'path' 	=> '/assets/css/swiper.css',
        ),
        array(
            'name' 	=> 'fancybox',
            'path' 	=> '/assets/css/fancybox.css',
        ),
        array(
            'name'  => 'fonts',
            'path'  => '/assets/css/jquery-ui.css',
        ),
        array(
            'name' 	=> 'fonts',
            'path' 	=> '/assets/css/fonts.css',
        ),
        array(
            'name' 	=> 'main',
            'path' 	=> '/assets/css/main.css',
        ),
        array(
            'name' 	=> 'adaptive',
            'path' 	=> '/assets/css/media.css',
        ),
	),	
 	'js' => array(
		array(
 			'name' 	=> 'jquery',
 			'path' 	=> '',
			'jquery' => 'y',
		),
		array(
 			'name' 	=> 'fontawesome',
			'path' 	=> '/assets/js/all.js',
			'localize' => 'n',
        ),
        array(
            'name' 	=> 'swiper',
            'path' 	=> '/assets/js/swiper.js',
            'localize' => 'n',
        ),
        array(
            'name' 	=> 'fancybox',
            'path' 	=> '/assets/js/fancybox.js',
            'localize' => 'n',
        ),
        array(
            'name' 	=> 'script',
            'path' 	=> '/assets/js/script.js',
            'localize' => 'y',
        ),
 	),
);
 
$spMC->create($args);