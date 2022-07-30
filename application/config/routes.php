<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/



// Admin routes start
$route['default_controller'] = 'home';
$route['admin/offers'] = 'admin/Offers/offers';
$route['admin'] = 'admin/Auth/loginView';
$route['admin/campaigns'] = 'admin/Campaigns/campaigns';
$route['admin/users'] = 'admin/Users/users';
$route['admin/add/user'] = 'admin/Users/create_user';
$route['admin/user/delete'] = 'admin/Users/delete_user';
$route['admin/user/getedit'] = 'admin/Users/getedit';
$route['admin/users/edituser'] = 'admin/Users/editUser';
$route['admin/logout'] = 'admin/auth/logout';


$route['admin/showoffers'] = 'admin/offers/view';
 $route['admin/editpackages'] = 'admin/offers/edit';
$route['admin/orders'] = 'admin/Orders';
$route['orders/list'] = 'admin/Orders/orders_list';
// Admin routes end

// Frontend routes end
$route['showcart'] = 'home/showcart';

$route['services'] = 'home/services';
$route['aboutus'] = 'home/aboutus';
$route['contactus'] = 'home/contactus';
$route['ourteam'] = 'home/ourteam';
$route['portfolio'] = 'home/portfolio';
$route['pricingtable'] = 'home/pricingtable';
$route['blog'] = 'home/blog';
$route['logodesign'] = 'home/logodesign';
$route['bannerdesign'] = 'home/bannerdesign';
$route['businesscard'] = 'home/businesscard';
$route['signagedesign'] = 'home/signagedesign';
$route['tshirtdesign'] = 'home/tshirtdesign';
$route['stationarydesign'] = 'home/stationarydesign';
$route['socialmediadesign'] = 'home/socialmediadesign';
$route['bookcover'] = 'home/bookcover';
$route['labledesign'] = 'home/labledesign';
$route['faq'] = 'home/faq';
$route['howitworks'] = 'home/howitworks';
$route['blogdetails'] = 'home/blogdetails';
$route['useragreement'] = 'home/useragreement';
$route['privacypolicy'] = 'home/privacypolicy';
//End routes
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
