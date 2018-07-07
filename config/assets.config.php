<?php
namespace Stagem\ZfcAdmin;

return [

    'routes' => [
        'admin(.*)' => [
            '@admin_css',
            '@admin_js',
        ],
    ],

    'modules' => [
        __NAMESPACE__ => [
            'root_path' => __DIR__ . '/../view/assets',
            'collections' => [
                'admin_css' => [
                    'assets' => [
                        'scss/_custom-variables.scss',
                        'scss/_reset.scss',
                        'scss/_fonts.scss',
                        'scss/_default-clases.scss',
                        'scss/_table.scss',
                        'scss/_table-striped.scss',
                        'scss/_nav-tab.scss',
                        'scss/_layout.scss',
                        'scss/_preloader.scss',
                        'scss/_media.scss',
                    ],
                    'filters' => ['scss' => ['name' => \Assetic\Filter\ScssphpFilter::class]],
                    'options' => ['output' => 'layout.css'],
                ],
                'admin_js' => [
                    'assets' => [
                        'js/main.js',
                        'js/modal.js',
                        'js/refresh.js',
                        'js/ajax.js',
                        'js/preloader.js',
                    ],
                ],

                'admin_fonts' => [
                    'assets' => [
                        'fonts/*',
                    ],
                    'options' => [
                        'move_raw' => true,
                        'disable_source_path' => true,
                        'targetPath' => 'fonts',
                    ],
                ],
                'admin_images' => [
                    'assets' => [
                        'images/*.png',
                        'images/*.jpg',
                        'images/*.gif',
                    ],
                    'options' => [
                        'move_raw' => true,
                        'disable_source_path' => true,
                        'targetPath' => 'images',
                    ],
                ],
            ],
        ],
    ],
];