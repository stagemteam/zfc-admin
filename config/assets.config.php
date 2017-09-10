<?php
namespace Popov\ZfcLayout;

return [
    //'assetic_configuration' => [
    // Use on development environment
        'debug' => false,
        'buildOnRequest' => false,

        // This is optional fla// This is optional flag, by default set to `true`.
        // In debug mode allow you to combine all assets to one file.
        // 'combine' => false,
        // this is specific to this project
        'webPath' => realpath('public') . '/assets',
        'basePath' => 'assets',

        'default' => [
            'assets' => [
                '@core_css',
                '@core_js',
            ],
            'options' => [
                'mixin' => true,
            ],
        ],

        'modules' => [
            __NAMESPACE__ => [
                'root_path' => __DIR__ . '/../view/assets',
                'collections' => [
                    'core_css' => [
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
                            //'scss/spare-view.scss',
                            'scss/_media.scss',
                             // все що відноситься до layout проекту ви зберігаєте в папці sccs, воно по шаблону підтягнеться і трансформується у css. Тому не потрібно заморочуватись з підключенням
                            // вам це все нове, тому краще ви задавайте запитання
                            
                        ],
                        'filters' => ['scss' => ['name' => \Assetic\Filter\ScssphpFilter::class]],
                        'options' => ['output' => 'core_css.css'],
                    ],
                    'core_js' => [
                        'assets' => [
                            'js/main.js',
                            'js/modal.js',
                            'js/refresh.js',
                            'js/ajax.js',
                        ],
                    ],

                    'core_fonts' => [
                        'assets' => [
                            'fonts/*',
                        ],
                        'options' => [
                            'disable_source_path' => true,
                            'move_raw' => true,
                            'targetPath' => 'fonts',
                        ],
                    ],
                    'core_images' => [
                          'assets' => [
                            'images/*.png',
                            'images/*.jpg',
                            'images/*.gif',
                          ],
                          'options' => [
                            'move_raw' => true,
                          ]
                    ],
                ],
            ],
        ],
    //],
];