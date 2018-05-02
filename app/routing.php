<?php
/**
* This file hold all routes definitions.
*
* PHP version 7
*
* @author   WCS <contact@wildcodeschool.fr>
*
* @link     https://github.com/WildCodeSchool/simple-mvc
*/

$routes = [
  'Wine' => [ // Controller
    ['listing', '/wines', 'GET'], // action, url, method
    ['create', '/wine/ajout', ['POST', 'GET']], // action, url, method
    ['create', '/wine/create', ['POST', 'GET']], // action, url, method
    ['create', '/wine/crear', ['POST', 'GET']], // action, url, method
    ['update', '/wine/modif/{id:\d+}', ['POST', 'GET']], // action, url, method
    ['details', '/wine/{id:\d+}', 'GET'], // action, url, method
  ],
  'Producer' => [ // Controller
    ['listing', '/producers', 'GET'], // action, url, method
    ['create', '/producer/ajout', 'GET'], // action, url, method
    ['update', '/producer/modif/{id:\d+}', 'GET'], // action, url, method
    ['details', '/producer/{id:\d+}', 'GET'], // action, url, method
  ],
  'Variety' => [ // Controller
    ['listing', '/varieties', 'GET'], // action, url, method
    ['create', '/variety/ajout', 'GET'], // action, url, method
    ['update', '/variety/modif/{id:\d+}', 'GET'], // action, url, method
    ['details', '/variety/{id:\d+}', 'GET'], // action, url, method
  ],
  'Designation' => [ // Controller
    ['listing', '/designations', 'GET'], // action, url, method
    ['create', '/designation/ajout', 'GET'], // action, url, method
    ['update', '/designation/modif/{id:\d+}', 'GET'], // action, url, method
    ['details', '/designation/{id:\d+}', 'GET'], // action, url, method
  ],
];
