<?php

return [
    'mode'                    => 'utf-8',
    'format'                  => 'a4',
    'default_font_size'       => '14',
    'default_font'            => 'bangla',
    'margin_left'             => 10,
    'margin_right'            => 10,
    'margin_top'              => 10,
    'margin_bottom'           => 10,
    'margin_header'           => 0,
    'margin_footer'           => 0,
    'orientation'             => 'P',
    'title'                   => 'Tara',
    'author'                  => '',
    'watermark'               => '',
    'show_watermark'          => false,
    'watermark_font'          => 'sans-serif',
    'display_mode'            => 'fullpage',
    'watermark_text_alpha'    => 0.1,
    'custom_font_dir'         => base_path('resources/fonts/'),
    'custom_font_data'        => [
        'bangla' => [
            'R'  => 'SolaimanLipi_22-02-2012.ttf',
            'B'  => 'SolaimanLipi_Bold_10-03-12.ttf', 
            'I'  => 'SolaimanLipi_22-02-2012.ttf',
            'BI' => 'SolaimanLipi_Bold_10-03-12.ttf',
            'useOTL' => 0xFF,    
            'useKashida' => 75, 
        ]
    ],
    
    'auto_language_detection' => false,
    'temp_dir'                => rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR),
    'pdfa'                    => false,
    'pdfaauto'                => false,
];
