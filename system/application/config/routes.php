<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
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
| 	www.your-site.com/class/method/id/
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
| There are two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['scaffolding_trigger'] = 'scaffolding';
|
| This route lets you set a "secret" word that will trigger the
| scaffolding feature for added security. Note: Scaffolding must be
| enabled in the controller in which you intend to use it.   The reserved 
| routes must come before any wildcard or regular expression routes.
|
*/

$route['default_controller'] = "id/home";
$route['scaffolding_trigger'] = "";
$route['profile'] = "profil/view";
$route['excel-high-tech'] = "profil/view1";
$route['size-tepat'] = "profil/view2";
$route['product-reference'] = "profil/view3";
$route['kenali-bahan'] = "profil/view4";

$route['english/home'] = "home_n/view";
$route['english/profile'] = "profile/view";
$route['english/excel-high-tech'] = "profile/view1";
$route['english/knowing-the-right-size'] = "profile/view2";
$route['english/product-reference'] = "profile/view3";
$route['english/materials-info'] = "profile/view4";

?>