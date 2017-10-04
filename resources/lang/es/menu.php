<?php

return [
    'main' => [
        'list' => [
            'title' => 'Lista de Libros',
            'route' => 'books.index',
        ],
        'create' => [
            'title' => 'Agregar Libro',
            'route' => 'books.create',
            'roles' => 'admin'
        ],
        'Administracion' =>[
            'submenu' => [
                'users'     => [
                    'title' => 'Usuarios',
                    'route' => 'users.index',
                ],
                'category'   => [
                    'title' => 'Categorias',
                    'route' => 'categories.index',
                ]
            ],
            'roles' => 'admin'
        ],
    ],
    'filters' => [
        'all' => [
            'title' => 'Libros',
            'route' => 'books.index',
        ],
        'pending' => [
            'title' => 'Libros pendientes',
            'route' => 'books.pending',
        ],
        'completed' => [
            'title' => 'Libros completados',
            'route' => 'books.completed',
        ],
        'mine' => [
            'title' => 'Mis Libros',
            'route' => 'books.mine',
            'logged' => true,
        ]
    ],
];