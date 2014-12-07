<?php
return array(
    'router' => array(
        'routes' => array(
            'financial.rest.expenses' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/expenses[/:expenses_id]',
                    'defaults' => array(
                        'controller' => 'Financial\\V1\\Rest\\Expenses\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'financial.rest.expenses',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Financial\\V1\\Rest\\Expenses\\ExpensesResource' => 'Financial\\V1\\Rest\\Expenses\\ExpensesResourceFactory',
      //      'Financial\\V1\\Rest\\Expenses\\ExpensesMapper' => 'Financial\\V1\\Rest\\Expenses\\ExpensesMapper',
        ),
    ),
    'zf-rest' => array(
        'Financial\\V1\\Rest\\Expenses\\Controller' => array(
            'listener' => 'Financial\\V1\\Rest\\Expenses\\ExpensesResource',
            'route_name' => 'financial.rest.expenses',
            'route_identifier_name' => 'expenses_id',
            'collection_name' => 'expenses',
            'entity_http_methods' => array(
                0 => 'POST',
                1 => 'GET',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Financial\\V1\\Rest\\Expenses\\ExpensesEntity',
            'collection_class' => 'Financial\\V1\\Rest\\Expenses\\ExpensesCollection',
            'service_name' => 'expenses',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Financial\\V1\\Rest\\Expenses\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Financial\\V1\\Rest\\Expenses\\Controller' => array(
                0 => 'application/vnd.financial.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Financial\\V1\\Rest\\Expenses\\Controller' => array(
                0 => 'application/vnd.financial.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Financial\\V1\\Rest\\Expenses\\ExpensesEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'financial.rest.expenses',
                'route_identifier_name' => 'expenses_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'Financial\\V1\\Rest\\Expenses\\ExpensesCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'financial.rest.expenses',
                'route_identifier_name' => 'expenses_id',
                'is_collection' => true,
            ),
        ),
    ),
);
