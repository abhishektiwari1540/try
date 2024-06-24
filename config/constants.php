<?php
$WEBSITE_URL				=	env("APP_URL");
$NODE_WEB_URL 				= env('NODE_APP_URL');
return [
	'ALLOWED_TAGS_XSS'   	=> '<iframe><a><strong><b><p><br><i><font><img><h1><h2><h3><h4><h5><h6><span><div><em><table><ul><li><section><thead><tbody><tr><td><figure><article>',
	'DS'     				=> '/',
	'ROOT'     				=> base_path(),
	'APP_PATH'     			=> app_path(),

	'NODE_WEBSITE_URL'                      => $NODE_WEB_URL,

	"IMAGE_PATH"							=>	$WEBSITE_URL.'img/',
	"IMAGE_ROOT_PATH"						=>	"img/",

    "EVENTS_PATH"							=>	$WEBSITE_URL.'admin/Events/',
	"EVENTS_ROOT_PATH"						=>	"admin/Events/",


    "CLASS_PATH"							=>	$WEBSITE_URL.'admin/Class/',
	"CLASS_ROOT_PATH"						=>	"admin/Class/",


    "CMS_PAGE_IMAGE_PATH"							=>	$WEBSITE_URL.'admin/cms/',
	"CMS_PAGE_IMAGE_ROOT_PATH"						=>	"admin/cms/",

	"USER_IMAGE_PATH"						=>	$WEBSITE_URL.'users-image/',
	"USER_IMAGE_ROOT_PATH"					=>	"users-image/",

	"SECURITY_IMAGE_PATH"				    =>	$WEBSITE_URL.'security-image/',
	"SECURITY_IMAGE_ROOT_PATH"				=>	"security-image/",

	"LANGUAGE_IMAGE_PATH"					=>	$WEBSITE_URL.'uploads/language_image/',
	"LANGUAGE_IMAGE_ROOT_PATH"				=>	"uploads/language_image/",

	"SYSTEM_DOCUMENT_IMAGE_IMAGE_PATH"		 		=>	$WEBSITE_URL.'admin/system-document/',
	"SYSTEM_DOCUMENT_IMAGE_ROOT_PATH"				=>	"admin/system-document/",

    "SEO_PAGE_IMAGE_IMAGE_PATH"		 		=>	$WEBSITE_URL.'uploads/sep-image/',
	"SEO_PAGE_IMAGE_ROOT_PATH"				=>	"uploads/sep-image/",

	"CK_EDITOR_URL"		 				    =>	$WEBSITE_URL . 'uploads/ck_editor_images/',
	"CK_EDITOR_ROOT_PATH"				    =>	"uploads/ck_editor_images/",


	'MESSAGE' => [
		'INACTIVE_MEMBER_STAFF' => "You can't login in site panel, please contact to site admin!",
	],

	'GENDER' => [
		'1' 	=> "Men",
		'2' 	=> "Women",
		'0' 	=> "Other",
	],

	'CUSTOMER' => [
		'INDIVIDUAL_TITLES' 	=> "Individual",
		'ORGANIXATION_TITLES' 	=> "Organization",
	],

	'INDIVIDUAL' => [
		'INDIVIDUAL_TITLE' 	    => " User",
		'INDIVIDUAL_TITLES' 	=> " User",
	],



	'EVENTS' => [
		'EVENTS_TITLE' 	    => "Event",
		'EVENTS_TITLES' 	=> "Event",
	],


	'SEO' => [
		'SEO_TITLE' 	=> "Seo pages",
	],

	'CMS_MANAGER' => [
		'CMS_PAGES_TITLE' 	=> "Cms Pages",
		'CMS_PAGE_TITLE' 	=> "Cms Page",
		'VIEW_PAGE' 		=> "View Page",
	],

	'FAQ' => [
		'FAQ_TITLE'	 => "Faq",
		'FAQS_TITLE' => "Faq's",
		'VIEW_PAGE'  => "Faq View",
	],
    'CONTACT' => [
		'CONTACT_TITLE'	 => "Contact",
		// 'FAQS_TITLE' => "Faq's",
		'VIEW_PAGE'  => "Contact View",
	],
    'SYSTEM_DOCUMENT' => [
		'SYSTEM_DOCUMENT_TITLE'	 => "System Document",
		'SYSTEM_DOCUMENT_TITLE'  => "System Document",
	],
    'TESTIMONIALS' => [
		'TESTIMONIALS_TITLE' => "Testimonials",
		'TESTIMONIALS_UPDATE' => "Testimonials Update",
		'VIEW_PAGE' => "Testimonials View",
	],

	'EMAIL_TEMPLATES' => [
		'EMAIL_TEMPLATES_TITLE' => "Email Templates",
		'EMAIL_TEMPLATE_TITLE' 	=> "Email Template",
	],

	'EMAIL_LOGS' => [
		'EMAIL_LOGS_TITLE' 		=> "Email Logs",
		'EMAIL_DETAIL_TITLE' 	=> "Email Detail",
	],

	'LANGUAGE_SETTING' => [
		'LANGUAGE_SETTINGS_TITLE' 	=> "Language Setting",
		'LANGUAGE_SETTING_TITLE' 	=> "Language Setting",
	],

	'LANGUAGES' => [
		'LANGUAGE_TITLE' => "Language",
		'LANGUAGE_TITLES' => "Languages",
	],

    'WEBSITE_SETTING' => [
		'EMAIL' => "Lava@gmail.com",
		'LANGUAGE_TITLES' => "Languages",
	],

	'ACL' => [
		'ACLS_TITLE' => "Acl",
		'ACL_TITLE' => "Acl Management",
	],

	'SETTING' => [
		'SETTINGS_TITLE' 	=> "Settings",
		'SETTING_TITLE' 	=> "Setting",
	],

	'DESIGNATION' => [
		'DESIGNATIONS_TITLE' 	=> "Roles",
		'DESIGNATION_TITLE' 	=> "Role",
	],

    'CLASS' => [
		'CLASS' 	=> "Class",
		'CLASS_TITLE' 	=> "Class Details",
	],

	'STAFF' => [
		'STAFFS_TITLE' 		=> "Staff's",
		'STAFF_TITLE' 		=> "Staff",
	],

	'ROLE_ID' => [
		'ADMIN_ID' 					=> 1,
		'SUPER_ADMIN_ROLE_ID' 		=> 1,
		'STAFF_ROLE_ID' 			=> 2,
		'INDIVIDUAL_ROLE_ID' 		=> 1,
		'ORGANIXATION_ROLE_ID' 	    => 1,
	],

	'DEFAULT_LANGUAGE' => [
		'FOLDER_CODE' 	=> 'eng',
		'LANGUAGE_CODE' => 1,
		'LANGUAGE_NAME' => 'English'
	],

	'SECURITY' => [
		'SECURITY_TITLE' 	=> "Security",
		'SECURITY_TITLES' 	=> "Securities",
	],

	'SETTING_FILE_PATH'	=> base_path() . "/" .'config'."/". 'settings.php',

	'WEBSITE_ADMIN_URL' => base_path() . "/" .'adminpnlx',

];
