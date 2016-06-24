<?php

return [

    'cache' => false,

    'per_page' => 10,

    'youtube_api_key' => 'youtube api key',

    /*
    |--------------------------------------------------------------------------
    | Modules config
    |--------------------------------------------------------------------------
    */
    'modules'         => [

        'photo_gallery' => [

            'thumb_size' => [
                'width'  => 150,
                'height' => 150
            ],

            'image_dir' => '/uploads/dropzone/',
            'per_page' => 10,
        ],

        'slider' => [

            'image_size' => [
                'width'  => null,
                'height' => 600
            ],

            'image_dir' => '/uploads/slider/',
        ],

        'article' => [

             'image_size' => [
                'width'  => 730,
                'height' => 290
            ],
            'in_content_img' => [
                'width'  => 400,
                'height' => 400
            ],
            'thumb_size' => [
                'width'  => 64,
                'height' => 64
            ],

            'image_dir' => '/uploads/article/',

            'per_page' => 20,
        ],
        'product' => [
//frontend
//270 x 360 pixels displayed
//440 x 586 pixels actual
//720 x 960 pixels actual
//100 x 75 pixels

		        'lightbox_size' => [
				        'width'  => 720,
				        'height' => 960
		        ],
				'catalog_size' => [
						'width'  => 440,
						'height' => 586
				],
				'grid_size' => [
						'width'  => 270,
						'height' => 360
				],
				'additional_size' => [
						'width'  => 64,
						'height' => 64
				],
		        'thumb_size' => [
				        'width'  => 100,
				        'height' => 75
		        ],

		        'image_dir' => '/uploads/products/'
        ],
        'news' => [

            'image_size' => [
                'width'  => 240,
                'height' => 150
            ],

            'image_dir' => '/uploads/news/',

            'per_page' => 10,
        ],

        'project' => [

            'image_size' => [
                'width'  => 750,
                'height' => 600
            ],
            'thumb_size' => [
                'width'  => 370,
                'height' => 250
            ],

            'image_dir' => '/uploads/project/',

            'category' => ['Bootstrap', 'HTML', 'CSS'],

            'per_page' => 10,
        ],

        'category' => [
            'per_page' => 10,
        ],
        'faq'      => [],
        'page'     => [],
        'video'    => [
            'per_page' => 12,
        ],
        'menu'     => [],
        'setting'  => [],
        'user'     => [],
        'group'    => [],
    ]
];
