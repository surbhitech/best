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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
    $route['Career/(:any)'] = "Category/subcategory/$1";
    $route['Business/(:any)'] = "Category/subcategory/$1";
    $route['Doctors/(:any)'] = "Category/subcategory/$1";
    $route['Purchase/(:any)'] = "Category/subcategory/$1";
    $route['Lawyers/(:any)'] = "Category/subcategory/$1";
    $route['Techies/(:any)'] = "Category/subcategory/$1";
    $route['Spiritual/(:any)'] = "Category/subcategory/$1";
    $route['Wellbeing/(:any)'] = "Category/subcategory/$1";
    $route['Lifestyle/(:any)'] = "Category/subcategory/$1";
    
    $route['Career/view/(:any)'] = "Category/view_list/$1";
    $route['Business/view/(:any)'] = "Category/view_list/$1";
    $route['Doctors/view/(:any)'] = "Category/view_list/$1";
    $route['Purchase/view/(:any)'] = "Category/view_list/$1";
    $route['Lawyers/view/(:any)'] = "Category/view_list/$1";
    $route['Techies/view/(:any)'] = "Category/view_list/$1";
    $route['Spiritual/view/(:any)'] = "Category/view_list/$1";
    $route['Wellbeing/view/(:any)'] = "Category/view_list/$1";
    $route['Lifestyle/view/(:any)'] = "Category/view_list/$1";
   
    $route['Career/(:any)/(:any)'] = "Advicers/Category/$1/$1";
    $route['Business/(:any)/(:any)'] = "Advicers/Category/$1/$1";
    $route['Doctors/(:any)/(:any)'] = "Advicers/Category/$1/$1";
    $route['Purchase/(:any)/(:any)'] = "Advicers/Category/$1/$1";
    $route['Lawyers/(:any)/(:any)'] = "Advicers/Category/$1/$1";
    $route['Techies/(:any)/(:any)'] = "Advicers/Category/$1/$1";
    $route['Spiritual/(:any)/(:any)'] = "Advicers/Category/$1/$1";
    $route['Wellbeing/(:any)/(:any)'] = "Advicers/Category/$1/$1";
    $route['Lifestyle/(:any)/(:any)'] = "Advicers/Category/$1/$1";
    $route['Questionview'] = "Userchat/View_Question";
    
    $route['AdvicerDashboard'] = "Epert/Dashboard"; 
    $route['payment-detail'] = 'Payment/payment_status';
    $route['404_override'] = 'Home/error_404';
	$route['v1/(:any)'] = 'Home/Review';
	$route['Reviewsubmit'] = 'Home/Reviewsubmit';
	$route['reviewlist/(:any)'] = 'Home/reviewlist';
	$route['patrons'] = 'Home/patrons'; 
	$route['Podcast/(:any)/(:any)/(:any)'] = 'Podcast/Viewdetail';
	$route['Prodacst/Career'] = 'Podcast/category';
	//admin route
	
		$route['admin'] = 'Admin/Login';
		$route['Admin/single_chatassign/(:any)'] = 'Admin/Singlechat/single_chatassign';
        $route['Admin/Singlechat/single_chatview/(:any)'] = 'Admin/Singlechat/viewassign';
        $route['admin/Login/logout_subadmin'] = 'Admin/Login/logout';
	
	