<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){

//Theme Shortname
$shortname = "med";

//Populate the options array
global $tt_options;
$tt_options = get_option('of_options');


//Access the WordPress Pages via an Array
$tt_pages = array();
$tt_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($tt_pages_obj as $tt_page) {
$tt_pages[$tt_page->ID] = $tt_page->post_name; }
$tt_pages_tmp = array_unshift($tt_pages, "Select a page:"); 


//Access the WordPress Categories via an Array
$tt_categories = array();  
$tt_categories_obj = get_categories('hide_empty=0');
foreach ($tt_categories_obj as $tt_cat) {
$tt_categories[$tt_cat->cat_ID] = $tt_cat->cat_name;}
$categories_tmp = array_unshift($tt_categories, "Select a category:");


//Sample Array for demo purposes
$sample_array = array("1","2","3","4","5");

//Sample Advanced Array - The actual value differs from what the user sees
$sample_advanced_array = array("image" => "The Image","post" => "The Post"); 

//Folder Paths for "type" => "images"
$sampleurl =  get_template_directory_uri() . '/admin/images/sample-layouts/';

/*-----------------------------------------------------------------------------------*/
/* Create The Custom Site Options Panel
/*-----------------------------------------------------------------------------------*/
$options = array(); // do not delete this line - sky will fall

/* Option Page 1 - Options */	
$options[] = array( "name" => __('Site Options','framework_localize'),
			"type" => "heading");

$options[] = array( "name" => __('Logo Upload','framework_localize'),
			"desc" => __('This is an Logo upload field.','framework_localize'),
			"id" => $shortname."_Logo",
			"std" => "",
			"type" => "upload");
$options[] = array( "name" => __('Favicon','framework_localize'),
			"desc" => __('Upload a 16px x 16px image that will represent your website\'s favicon.<br /><br /><em>To ensure cross-browser compatibility, we recommend converting the favicon into .ico format before uploading. (<a href="http://www.favicon.cc/">www.favicon.cc</a>)</em>','framework_localize'),
			"id" => $shortname."_favicon",
			"std" => "",
			"type" => "upload");

$options[] = array( "name" => __('Footer Logo Upload','framework_localize'),
			"desc" => __('This is an Footer Logo upload field.','framework_localize'),
			"id" => $shortname."_footer_Logo",
			"std" => "",
			"type" => "upload");

$options[] = array( "name" => __('Instagram Link','framework_localize'),
			"desc" => "",
			"id" => $shortname."_insta_link",
			"std" => "",
			"type" => "text");
$options[] = array( "name" => __('Facebook Link','framework_localize'),
			"desc" => "Copyright Text Area.",
			"id" => $shortname."_fb_link",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => __('Twitter Link','framework_localize'),
			"desc" => "",
			"id" => $shortname."_twitter_link",
			"std" => "",
			"type" => "text");
$options[] = array( "name" => __('Email','framework_localize'),
			"desc" => "",
			"id" => $shortname."_email",
			"std" => "",
			"type" => "text");
$options[] = array( "name" => __('Contact Number','framework_localize'),
			"desc" => ".",
			"id" => $shortname."_call",
			"std" => "",
			"type" => "text");
$options[] = array( "name" => __('Fax Line','framework_localize'),
			"desc" => ".",
			"id" => $shortname."_fax",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => __('Copyright Text','framework_localize'),
			"desc" => "Copyright Text Area.",
			"id" => $shortname."_copyright_text",
			"std" => "",
			"type" => "text");


$options[] = array( "name" => __('About','framework_localize'),
			"type" => "heading");

$options[] = array( "name" => __('Title Text','framework_localize'),
			"desc" => "Title Text.",
			"id" => $shortname."_about_title_text",
			"std" => "",
			"type" => "text");


update_option('of_template',$options); 					  
update_option('of_themename',$themename);   
update_option('of_shortname',$shortname);

}
}
?>