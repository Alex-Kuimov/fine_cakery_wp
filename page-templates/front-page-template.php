<?php
/*
Template Name: Front page
*/

get_header();
echo sp_get_section_slider();
echo sp_get_section_favorite();
echo sp_get_section_blog();
echo sp_get_section_about();
echo sp_get_section_contact();
get_footer();