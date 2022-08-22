<?php

Kirki::add_section( 'docs_page', array(
	'title'          => esc_html__( 'Docs Page', 'ultimate-doc' ),
	'panel'          => 'ud_panel',
	'priority'       => 100,
) );

Kirki::add_field( 'ud_panel', [
	'type'        => 'radio-buttonset',
	'settings'    => 'docs_design_template',
	'label'       => esc_html__( ' ', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 'general',
	'priority'    => 10,
	'choices'     => [
		'design' => esc_html__( 'template', 'ultimate-doc' ),
		'general'   => esc_html__( 'Design', 'ultimate-doc' ),
	],
] );


// docs template

Kirki::add_field( 'ud_panel', [
	'type'        => 'radio-image',
	'settings'    => 'docs_template_design',
	'label'       => esc_html__( 'Select Single Doc template', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 'docs-template-01',
	'priority'    => 10,
	'choices'     => [
		'docs-template-01'   => UD_ASSETS_ASSETS . 'docs-template-01.png',
		// 'docs-template-02' => UD_ASSETS_ASSETS . 'docs-template-02.png',
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'design',
		],
	]
] );
if(!is_plugin_active( 'ultimatedoc-pro/ultimate-doc-pro.php' )){

	Kirki::add_field( 'ud_panel', [
		'type'        => 'custom',
		'settings'    => 'doc_template_locked',
		// 'label'       => esc_html__( 'This is the label', 'kirki' ), // optional
		'section'     => 'docs_page',
			'default'         => '
			<img style="opacity:.6" src="'.UD_ASSETS_ASSETS . 'docs-template-02.png" alt="">
			',
		'priority'    => 10,
	] );
}

Kirki::add_field( 'ud_panel', [
	'type'        => 'custom',
	'settings'    => 'header_top',
	'section'     => 'docs_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Doc Text', 'ud-mini-cart' ) . '</h3>',
	'priority'    => 10,
	'active_callback'  => [
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'design',
		],
	]
] );

Kirki::add_field( 'ud_panel', [
	'type'     => 'text',
	'settings' => 'fd_docs_tilte',
	'label'    => esc_html__( 'Doc Title', 'ultimate-doc' ),
	'section'  => 'docs_page',
	'default'  => esc_html__( 'FinestDevs Products', 'ultimate-doc' ),
	'priority' => 10,
    'active_callback' => [
        [
            'setting'  => 'docs_design_template',
            'operator' => '===',
            'value'    => 'design',
        ],
    ],
] );

Kirki::add_field( 'ud_panel', [
	'type'     => 'textarea',
	'settings' => 'docs_description',
	'label'    => esc_html__( 'Doc Description', 'ultimate-doc' ),
	'section'  => 'docs_page',
	'default'  => esc_html__( 'You Can Search For A Question Here. It Will Help You Get The Most Common Anwers Easily..', 'ultimate-doc' ),
	'priority' => 10,
    'active_callback' => [
        [
            'setting'  => 'docs_design_template',
            'operator' => '===',
            'value'    => 'design',
        ],
    ],
] );



Kirki::add_field( 'ud_panel', [
	'type'        => 'custom',
	'settings'    => 'doc_header_top',
	'section'     => 'docs_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Doc Header', 'ud-mini-cart' ) . '</h3>',
	'priority'    => 10,
	'active_callback'  => [
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'ud_panel', [
	'type'        => 'color',
	'settings'    => 'doc_head_title_color',
	'label'       => __( 'Title Color', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => '#161617',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.doc-header-title h1',
			'function' => 'css',
			'property' => 'color',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'ud_panel', [
    'type'            => 'slider',
    'settings'        => 'doc_title_font_size',
    'label'           => esc_html__( 'Title Font Size', 'ultimate-doc' ),
    'section'         => 'docs_page',
    'default'         => 42,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.doc-header-title h1',
            'function' => 'css',
            'property' => 'font-size',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'docs_design_template',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'ud_panel', [
    'type'            => 'slider',
    'settings'        => 'doc_sec_title_gap',
    'label'           => esc_html__( 'Title Gap', 'ultimate-doc' ),
    'section'         => 'docs_page',
    'default'         => 15,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.doc-header-title h1',
            'function' => 'css',
            'property' => 'margin-bottom',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'docs_design_template',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'ud_panel', [
	'type'        => 'color',
	'settings'    => 'doc_head_desc_color',
	'label'       => __( 'Description Color', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => '#161617',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.doc-header-desc p',
			'function' => 'css',
			'property' => 'color',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'ud_panel', [
    'type'            => 'slider',
    'settings'        => 'doc_desc_font_size',
    'label'           => esc_html__( 'Description Font Size', 'ultimate-doc' ),
    'section'         => 'docs_page',
    'default'         => 18,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.doc-header-desc p',
            'function' => 'css',
            'property' => 'font-size',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'docs_design_template',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'ud_panel', [
	'type'        => 'custom',
	'settings'    => 'doc_area_body',
	'section'     => 'docs_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Doc Body', 'ud-mini-cart' ) . '</h3>',
	'priority'    => 10,
	'active_callback'  => [
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

// background color
Kirki::add_field( 'ud_panel', [
	'type'        => 'color',
	'settings'    => 'single_area_backgound',
	'label'       => __( 'Content Area Background Color', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => '#F3F5F7',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-main .ud-site-main',
			'function' => 'css',
			'property' => 'background-color',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	]
	
] );

Kirki::add_field( 'ud_panel', [
	'type'        => 'dimensions',
	'settings'    => 'docs_content_padding',
	'label'       => esc_html__( 'Contnet Area Padding', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => [
		'padding-top'    => '95px',
		'padding-left' => '0px',
		'padding-bottom'   => '115px',
		'padding-right'  => '0px',
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	]
	
] );


Kirki::add_field( 'ud_panel', [
	'type'        => 'custom',
	'settings'    => 'docs_column_settings',
	'section'     => 'docs_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 12px; background:#ddd; color:#222; margin:0;">' . __( 'Item Settings
        ', 'ud-mini-cart' ) . '</h3>',
	'priority'    => 10,
	'active_callback'  => [
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );


// Column hover Background Color
Kirki::add_field( 'ud_panel', [
	'type'        => 'radio-buttonset',
	'settings'    => 'column_hover_normal',
	'label'       => esc_html__( 'Column Normal', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 'normal',
	'priority'    => 10,
	'choices'     => [
		'normal'   => esc_html__( 'Normal', 'ultimate-doc' ),
		'hover' => esc_html__( 'Hover', 'ultimate-doc' ),
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'ud_panel', [
	'type'        => 'color',
	'settings'    => 'column_background_color',
	'label'       => __( 'Item Background Color', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .docs-wraper',
			'function' => 'css',
			'property' => 'background-color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

// column padding
Kirki::add_field( 'ud_panel', [
	'type'        => 'dimensions',
	'settings'    => 'column_normal_padding',
	'label'       => esc_html__( 'Item Padding', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => [
		'padding-top'    => '0px',
		'padding-left' => '0px',
		'padding-bottom'   => '0px',
		'padding-right'  => '0px',
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

// column padding
Kirki::add_field( 'ud_panel', [
	'type'        => 'dimensions',
	'settings'    => 'column_normal_margin',
	'label'       => esc_html__( 'Item Margin', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => [
		'margin-top'    => '',
		'margin-left' => '',
		'margin-bottom'   => '',
		'margin-right'  => '',
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

// column border

Kirki::add_field( 'ud_panel', array(
	'type'        => 'dimensions',
	'settings'    => 'border_width_setting',
	'label'       => esc_attr__( 'Border Width', 'textdomain' ),
	'section'     => 'docs_page',
	'default'     => [
		'top-width'    => '1px',
		'right-width'  => '1px',
		'bottom-width' => '1px',
		'left-width'   => '1px',
	],
	'choices'     => [
		'top-width'    => esc_attr__( 'Top', 'textdomain' ),
		'right-width'  => esc_attr__( 'Bottom', 'textdomain' ),
		'bottom-width' => esc_attr__( 'Left', 'textdomain' ),
		'left-width'   => esc_attr__( 'Right', 'textdomain' ),
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
) );

// border type

Kirki::add_field( 'ud_panel', [
	'type'        => 'select',
	'settings'    => 'select_border_type',
	'label'       => esc_html__( 'Column Border Type', 'kirki' ),
	'section'     => 'docs_page',
	'default'     => 'solid',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'none' => esc_html__( 'none', 'kirki' ),
		'hidden' => esc_html__( 'hidden', 'kirki' ),
		'dotted' => esc_html__( 'dotted', 'kirki' ),
		'dashed' => esc_html__( 'dashed', 'kirki' ),
		'solid' => esc_html__( 'solid', 'kirki' ),
		'double' => esc_html__( 'double', 'kirki' ),
		'groove' => esc_html__( 'groove', 'kirki' ),
		'ridge' => esc_html__( 'ridge', 'kirki' ),
		'inset' => esc_html__( 'inset', 'kirki' ),
		'outset' => esc_html__( 'outset', 'kirki' ),
		'initial' => esc_html__( 'initial', 'kirki' ),
		'inherit' => esc_html__( 'inherit', 'kirki' ),
	],
    'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .docs-wraper',
			'function' => 'css',
			'property' => 'border-style',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

// border-color

Kirki::add_field( 'ud_panel', [
	'type'        => 'color',
	'settings'    => 'column_border_color',
	'label'       => __( 'Column Border Color', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 'rgba(45, 45, 49, 0.12)',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .docs-wraper',
			'function' => 'css',
			'property' => 'border-color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

//colum radius

Kirki::add_field( 'ud_panel', [
	'type'        => 'slider',
	'settings'    => 'column_border_radius',
	'label'       => esc_html__( 'Column Border Radius', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 5,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .docs-wraper',
			'function' => 'css',
			'property' => 'border-radius',
			'units'    => 'px',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );


// column hover

Kirki::add_field( 'ud_panel', [
	'type'        => 'color',
	'settings'    => 'column_hover_bg_color',
	'label'       => __( 'Background Color', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .docs-wraper:hover',
			'function' => 'css',
			'property' => 'background-color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

// column border

Kirki::add_field( 'ud_panel', array(
	'type'        => 'dimensions',
	'settings'    => 'hover_border_width_setting',
	'label'       => esc_attr__( 'Border Width', 'textdomain' ),
	'section'     => 'docs_page',
	'choices'     => [
		'top-width'    => esc_attr__( 'Top', 'textdomain' ),
		'right-width'  => esc_attr__( 'Bottom', 'textdomain' ),
		'bottom-width' => esc_attr__( 'Left', 'textdomain' ),
		'left-width'   => esc_attr__( 'Right', 'textdomain' ),
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
) );

// border type

Kirki::add_field( 'ud_panel', [
	'type'        => 'select',
	'settings'    => 'hover_border_type',
	'label'       => esc_html__( 'Border Type', 'kirki' ),
	'section'     => 'docs_page',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'none' => esc_html__( 'none', 'kirki' ),
		'hidden' => esc_html__( 'hidden', 'kirki' ),
		'dotted' => esc_html__( 'dotted', 'kirki' ),
		'dashed' => esc_html__( 'dashed', 'kirki' ),
		'solid' => esc_html__( 'solid', 'kirki' ),
		'double' => esc_html__( 'double', 'kirki' ),
		'groove' => esc_html__( 'groove', 'kirki' ),
		'ridge' => esc_html__( 'ridge', 'kirki' ),
		'inset' => esc_html__( 'inset', 'kirki' ),
		'outset' => esc_html__( 'outset', 'kirki' ),
		'initial' => esc_html__( 'initial', 'kirki' ),
		'inherit' => esc_html__( 'inherit', 'kirki' ),
	],
    'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .docs-wraper:hover',
			'function' => 'css',
			'property' => 'border-style',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

// border-color

Kirki::add_field( 'ud_panel', [
	'type'        => 'color',
	'settings'    => 'hover_border_color',
	'label'       => __( 'Border Color', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .docs-wraper:hover',
			'function' => 'css',
			'property' => 'border-color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

//colum radius

Kirki::add_field( 'ud_panel', [
	'type'        => 'slider',
	'settings'    => 'hover_border_radius',
	'label'       => esc_html__( 'Border Radius', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .docs-wraper:hover',
			'function' => 'css',
			'property' => 'border-radius',
			'units'    => 'px',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

Kirki::add_field( 'ud_panel', [
	'type'        => 'custom',
	'settings'    => 'docs_content_settings',
	'section'     => 'docs_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 12px; background:#ddd; color:#222; margin:0;">' . __( 'Doc Content', 'ud-mini-cart' ) . '</h3>',
	'priority'    => 10,
	'active_callback'  => [
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

Kirki::add_field( 'ud_panel', [
	'type'        => 'slider',
	'settings'    => 'doc_thumbnail_width',
	'label'       => esc_html__( 'Doc Thumbnail Width', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 100,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .docs-wraper .card-top img',
			'function' => 'css',
			'property' => 'width',
			'units'    => '%',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] ); 

Kirki::add_field( 'ud_panel', [
	'type'        => 'slider',
	'settings'    => 'doc_thumbnail_height',
	'label'       => esc_html__( 'Doc Thumbnail Height', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 190,
	'choices'     => [
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .docs-wraper .card-top img',
			'function' => 'css',
			'property' => 'height',
			'units'    => 'px',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
    
] ); 

// content area
Kirki::add_field( 'ud_panel', [
	'type'        => 'radio-buttonset',
	'settings'    => 'contetn_column_hover_normal',
	'label'       => esc_html__( 'Doc Content', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'priority'    => 10,
	'choices'     => [
		'normal'   => esc_html__( 'Normal', 'ultimate-doc' ),
		'hover' => esc_html__( 'Hover', 'ultimate-doc' ),
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );
// background color
Kirki::add_field( 'ud_panel', [
	'type'        => 'color',
	'settings'    => 'doc_content_area_bg',
	'label'       => __( 'Content Background Color', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom',
			'function' => 'css',
			'property' => 'background-color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
		
	],
] );

Kirki::add_field( 'ud_panel', [
	'type'        => 'dimensions',
	'settings'    => 'text_content_padding',
	'label'       => esc_html__( 'Contnet Padding', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => [
		'padding-top'    => '25px',
		'padding-left' => '35px',
		'padding-bottom'   => '40px',
		'padding-right'  => '35px',
	],
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
	
] );

//doc title font size
Kirki::add_field( 'ud_panel', [
	'type'        => 'slider',
	'settings'    => 'doc_title_font_size',
	'label'       => esc_html__( 'Doc Title Font Size', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 21,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.doc-header-title h1',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] ); 
Kirki::add_field( 'ud_panel', [
	'type'        => 'color',
	'settings'    => 'doc_title_font_color',
	'label'       => __( 'Doc Title Font Color', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => '#161617',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom .card-content-title h1',
			'function' => 'css',
			'property' => 'color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

Kirki::add_field( 'ud_panel', [
	'type'        => 'slider',
	'settings'    => 'doc_title_gap',
	'label'       => esc_html__( 'Title Gap', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 15,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom .card-content-title h1',
			'function' => 'css',
			'property' => 'margin-bottom',
			'units'    => 'px',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );


// Doc Description
Kirki::add_field( 'ud_panel', [
	'type'        => 'slider',
	'settings'    => 'doc_decription_font_size',
	'label'       => esc_html__( 'Doc Description Font Size', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 16,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom .card-content p',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] ); 
Kirki::add_field( 'ud_panel', [
	'type'        => 'color',
	'settings'    => 'doc_description_color',
	'label'       => __( 'Doc Dessciption Color', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 'rgba(0, 0, 0, 0.7)',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom .card-content p',
			'function' => 'css',
			'property' => 'color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );



// contetn hover area
Kirki::add_field( 'ud_panel', [
	'type'        => 'color',
	'settings'    => 'doc_hover_content_area_bg',
	'label'       => __( 'Content Background Color', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom:hover',
			'function' => 'css',
			'property' => 'background-color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

Kirki::add_field( 'ud_panel', [
	'type'        => 'dimensions',
	'settings'    => 'text_hover_padding',
	'label'       => esc_html__( 'Contnet Padding', 'ultimate-doc' ),
	'section'     => 'docs_page',
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
	
] );

Kirki::add_field( 'ud_panel', [
	'type'        => 'color',
	'settings'    => 'hover_title_font_color',
	'label'       => __( 'Hover Title Color', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => '#161617',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom .card-content-title h1:hover',
			'function' => 'css',
			'property' => 'color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );


Kirki::add_field( 'ud_panel', [
	'type'        => 'custom',
	'settings'    => 'docs_button_settings',
	'section'     => 'docs_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 12px; background:#ddd; color:#222; margin:0;">' . __('Doc Button', 'ud-mini-cart' ) . '</h3>',
	'priority'    => 10,
	'active_callback'  => [
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	]
	
] );

Kirki::add_field( 'ud_panel', [
	'type'        => 'radio-buttonset',
	'settings'    => 'doc_button_normal',
	'label'       => esc_html__( 'Doc Button', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 'normal',
	'priority'    => 10,
	'choices'     => [
		'normal'   => esc_html__( 'Normal', 'ultimate-doc' ),
		'hover' => esc_html__( 'Hover', 'ultimate-doc' ),
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'ud_panel', [
	'type'        => 'slider',
	'settings'    => 'doc_button_font_size',
	'label'       => esc_html__( 'Button Font Size', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 16,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom .card-button a',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

Kirki::add_field( 'ud_panel', [
	'type'        => 'color',
	'settings'    => 'doc_font_color',
	'label'       => __( 'Doc Font Color', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => '#161617',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom .card-button a',
			'function' => 'css',
			'property' => 'color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

Kirki::add_field( 'ud_panel', [
	'type'        => 'slider',
	'settings'    => 'doc_button_width',
	'label'       => esc_html__( 'Button Width', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 150,
	'choices'     => [
		'min'  => 0,
		'max'  => 500,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom .card-button a',
			'function' => 'css',
			'property' => 'width',
			'units'    => 'px',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] ); 

Kirki::add_field( 'ud_panel', [
	'type'        => 'slider',
	'settings'    => 'doc_button_height',
	'label'       => esc_html__( 'Button Height', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 50,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom .card-button a',
			'function' => 'css',
			'property' => 'height',
			'units'    => 'px',
		],
		
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] ); 

Kirki::add_field( 'ud_panel', [
	'type'        => 'color',
	'settings'    => 'doc_button_bg_color',
	'label'       => __( 'Background Color', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 'rgba(22, 22, 23, 0.06)',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom .card-button a',
			'function' => 'css',
			'property' => 'background-color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );
Kirki::add_field( 'ud_panel', array(
	'type'        => 'dimensions',
	'settings'    => 'button_width_setting',
	'label'       => esc_attr__( 'Button Border Width', 'textdomain' ),
	'section'     => 'docs_page',
	'default'     => [
		'top-width'    => '0px',
		'right-width'  => '0px',
		'bottom-width' => '0px',
		'left-width'   => '0px',
	],
	'choices'     => [
		'top-width'    => esc_attr__( 'Top', 'textdomain' ),
		'right-width'  => esc_attr__( 'Bottom', 'textdomain' ),
		'bottom-width' => esc_attr__( 'Left', 'textdomain' ),
		'left-width'   => esc_attr__( 'Right', 'textdomain' ),
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
) );

// border type

Kirki::add_field( 'ud_panel', [
	'type'        => 'select',
	'settings'    => 'button_border_type',
	'label'       => esc_html__( 'Button Border Type', 'kirki' ),
	'section'     => 'docs_page',
	'default'     => 'solid',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'none' => esc_html__( 'none', 'kirki' ),
		'hidden' => esc_html__( 'hidden', 'kirki' ),
		'dotted' => esc_html__( 'dotted', 'kirki' ),
		'dashed' => esc_html__( 'dashed', 'kirki' ),
		'solid' => esc_html__( 'solid', 'kirki' ),
		'double' => esc_html__( 'double', 'kirki' ),
		'groove' => esc_html__( 'groove', 'kirki' ),
		'ridge' => esc_html__( 'ridge', 'kirki' ),
		'inset' => esc_html__( 'inset', 'kirki' ),
		'outset' => esc_html__( 'outset', 'kirki' ),
		'initial' => esc_html__( 'initial', 'kirki' ),
		'inherit' => esc_html__( 'inherit', 'kirki' ),
	],
    'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom .card-button a',
			'function' => 'css',
			'property' => 'border-style',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

// border-color

Kirki::add_field( 'ud_panel', [
	'type'        => 'color',
	'settings'    => 'button_border_color',
	'label'       => __( 'Button Border Color', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => '#fffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom .card-button a',
			'function' => 'css',
			'property' => 'border-color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

//colum radius

Kirki::add_field( 'ud_panel', [
	'type'        => 'slider',
	'settings'    => 'button_border_radius',
	'label'       => esc_html__( 'Border Radius', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 5,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom .card-button a',
			'function' => 'css',
			'property' => 'border-radius',
			'units'    => 'px',
		],
	],
    'active_callback'  => [

		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );


// button hover
Kirki::add_field( 'ud_panel', [
	'type'        => 'color',
	'settings'    => 'hover_doc_font_color',
	'label'       => __( 'Doc Font Color', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom .card-button a:hover',
			'function' => 'css',
			'property' => 'color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );
 
Kirki::add_field( 'ud_panel', [
	'type'        => 'color',
	'settings'    => 'hover_button_bg_color',
	'label'       => __( 'Background Color', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => '#161617',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom .card-button a:hover',
			'function' => 'css',
			'property' => 'color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );
Kirki::add_field( 'ud_panel', array(
	'type'        => 'dimensions',
	'settings'    => 'hover_border_button_width',
	'label'       => esc_attr__( 'Button Border Width', 'textdomain' ),
	'section'     => 'docs_page',
	'default'     => [
		'top-width'    => '0px',
		'right-width'  => '0px',
		'bottom-width' => '0px',
		'left-width'   => '0px',
	],
	'choices'     => [
		'top-width'    => esc_attr__( 'Top', 'textdomain' ),
		'right-width'  => esc_attr__( 'Bottom', 'textdomain' ),
		'bottom-width' => esc_attr__( 'Left', 'textdomain' ),
		'left-width'   => esc_attr__( 'Right', 'textdomain' ),
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
) );

// border type

Kirki::add_field( 'ud_panel', [
	'type'        => 'select',
	'settings'    => 'hover_button_border_type',
	'label'       => esc_html__( 'Button Border Type', 'kirki' ),
	'section'     => 'docs_page',
	'default'     => 'solid',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'none' => esc_html__( 'none', 'kirki' ),
		'hidden' => esc_html__( 'hidden', 'kirki' ),
		'dotted' => esc_html__( 'dotted', 'kirki' ),
		'dashed' => esc_html__( 'dashed', 'kirki' ),
		'solid' => esc_html__( 'solid', 'kirki' ),
		'double' => esc_html__( 'double', 'kirki' ),
		'groove' => esc_html__( 'groove', 'kirki' ),
		'ridge' => esc_html__( 'ridge', 'kirki' ),
		'inset' => esc_html__( 'inset', 'kirki' ),
		'outset' => esc_html__( 'outset', 'kirki' ),
		'initial' => esc_html__( 'initial', 'kirki' ),
		'inherit' => esc_html__( 'inherit', 'kirki' ),
	],
    'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom .card-button a:hover',
			'function' => 'css',
			'property' => 'border-style',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

// border-color

Kirki::add_field( 'ud_panel', [
	'type'        => 'color',
	'settings'    => 'hover_button_border_color',
	'label'       => __( 'Button Border Color', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => '#fff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom .card-button a:hover',
			'function' => 'css',
			'property' => 'border-color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

//colum radius
Kirki::add_field( 'ud_panel', [
	'type'        => 'slider',
	'settings'    => 'button_hover_border_radius',
	'label'       => esc_html__( 'Border Radius', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 5,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .card-bottom .card-button a:hover',
			'function' => 'css',
			'property' => 'border-radius',
			'units'    => 'px',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );


Kirki::add_field( 'ud_panel', [
	'type'        => 'custom',
	'settings'    => 'docs_item_counter',
	'section'     => 'docs_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 12px; background:#ddd; color:#222; margin:0;">' . __('Doc Item Counter', 'ud-mini-cart' ) . '</h3>',
	'priority'    => 10,
	'active_callback'  => [
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'ud_panel', [
	'type'        => 'slider',
	'settings'    => 'doc_count_font_size',
	'label'       => esc_html__( 'Font Size', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 16,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .docs-templatetwo .docs-article .docs-article-total',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	]
    
] );

Kirki::add_field( 'ud_panel', [
	'type'        => 'color',
	'settings'    => 'doc_item_count_color',
	'label'       => __( 'Item Count Color', 'ultimate-doc' ),
	'section'     => 'docs_page',
	'default'     => 'rgba(0, 0, 0, 0.7)',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ud-site-main .docs-templatetwo .docs-article .docs-article-total',
			'function' => 'css',
			'property' => 'color',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_template',
			'operator' => '===',
			'value'    => 'general',
		],
	]
    
] );