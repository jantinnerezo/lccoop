<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// User routes
$route['login'] = 'user/login';
$route['register'] = 'user/register';
$route['profile'] = 'user/index';
$route['profile/update_account'] = 'user/edit';
$route['logout'] = 'user/logout';
$route['approve_user'] = 'user/approve';
$route['profile/notifications/(:any)'] = 'user/user_notifications/$1';
$route['read'] = 'user/mark_read';
$route['loan/application'] = 'user/loan_application';
$route['loan/view_loan/(:any)/(:any)'] = 'user/view_loan/$1/$2';



// Admin routes
$route['login_admin'] = 'administrator/login_admin';
$route['admin'] = 'administrator/admin';
$route['withdrawal'] = 'administrator/withdraw';
$route['deposit'] = 'administrator/deposit';
$route['transactions'] = 'administrator/transactions';
$route['send_notifications'] = 'administrator/send_notifications';
$route['request'] = 'administrator/request';
$route['grant_loan'] = 'administrator/grant_loan';
$route['reject_loan'] = 'administrator/reject_loan';
$route['loans'] = 'administrator/all_loans';
$route['loans/loan_transaction'] = 'administrator/loan_transactions';
$route['loans/paid'] = 'administrator/paid';
$route['loans/undo'] = 'administrator/undo';
$route['loans/loan_records/(:any)/(:any)'] = 'administrator/member_loan/$1/$2';

// Admin Prints
$route['admin/clients/print_view'] = 'administrator/member_print';
$route['admin/loans/print_view'] = 'administrator/loans_print';
$route['admin/transactions/print_view'] = 'administrator/transactions_print';
$route['admin/member_loan/print_view/(:any)/(:any)'] = 'administrator/member_loan_print/$1/$2';
$route['admin/loan_transactions/print_view'] = 'administrator/loan_transactions_print';


$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
