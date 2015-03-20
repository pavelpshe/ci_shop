<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
//products
$route['products'] = "products";//chtob napravlyal na products
$route['products/(:any)'] = "products/index/$1";
//Cart
$route['cart/(:any)'] = "cart/$1";//$1-all
//User
$route['user/(:any)'] = "user/$1";
//CMS
$route['cms/dashboard'] = "cms/dashboard";
$route['cms/dashboard/(:any)'] = "cms/dashboard/$1";

$route['cms/content'] = "cms/content";
$route['cms/content/(:any)'] = "cms/content/$1";

$route['cms/menu'] = "cms/menu";
$route['cms/menu/(:any)'] = "cms/menu/$1";

//Any else to boot

$route['(:any)'] = "boot/index/$1";

$route['default_controller'] = "home";
$route['404_override'] = 'page404';


/* End of file routes.php */
/* Location: ./application/config/routes.php */