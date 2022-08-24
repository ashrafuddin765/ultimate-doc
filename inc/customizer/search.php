<?php
new \Kirki\Section( 'docs_serach', array(
	'title'          => esc_html__( 'Search', 'ultimate-doc' ),
	'panel'          => 'ultd__panel',
	'priority'       => 160,
) );

Kirki::add_field( 'ultd__panel', [
	'type'        => 'slider',
	'settings'    => 'search_width',
	'label'       => esc_html__( 'Search Width', 'ultimate-doc' ),
	'section'     => 'docs_serach',
	'default'     => 100,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => 'form.search-form.ultd--search-form input.search-field',
			'function' => 'css',
			'property' => 'width',
			'units'    => '%',
		],
	],
] );

Kirki::add_field( 'ultd__panel', [
	'type'        => 'slider',
	'settings'    => 'search_height',
	'label'       => esc_html__( 'Search Height', 'ultimate-doc' ),
	'section'     => 'docs_serach',
	'default'     => 60,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => 'form.search-form.ultd--search-form input.search-field',
			'function' => 'css',
			'property' => 'height',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'ultd__panel', [
	'type'        => 'color',
	'settings'    => 'search_filed_color',
	'label'       => __( 'Search Text Color', 'ultimate-doc' ),
	'section'     => 'docs_serach',
	'default'     => '#161617',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => 'form.search-form.ultd--search-form input.search-field',
			'function' => 'css',
			'property' => 'color',
			
		],
	],
] );

Kirki::add_field( 'ultd__panel', [
	'type'        => 'slider',
	'settings'    => 'search_field_size',
	'label'       => esc_html__( 'Search Field Font size', 'ultimate-doc' ),
	'section'     => 'docs_serach',
	'default'     => 16,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => 'form.search-form.ultd--search-form input.search-field',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'ultd__panel', [
	'type'        => 'color',
	'settings'    => 'search_bag_color',
	'label'       => __( 'Background Color', 'ultimate-doc' ),
	'section'     => 'docs_serach',
	'default'     => '#FAFAFA',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => 'form.search-form.ultd--search-form input.search-field',
			'function' => 'css',
			'property' => 'background-color',
			
		],
	],
] );

Kirki::add_field( 'ultd__panel', array(
	'type'        => 'dimensions',
	'settings'    => 'search_border_setting',
	'label'       => esc_attr__( 'Search Border Width', 'textdomain' ),
	'section'     => 'docs_serach',
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
) );

// border type

Kirki::add_field( 'ultd__panel', [
	'type'        => 'select',
	'settings'    => 'search_border_type',
	'label'       => esc_html__( 'Border Type', 'kirki' ),
	'section'     => 'docs_serach',
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
			'element'  => 'form.search-form.ultd--search-form input.search-field',
			'function' => 'css',
			'property' => 'border-style',
		],
	],
    
] );

// border-color

Kirki::add_field( 'ultd__panel', [
	'type'        => 'color',
	'settings'    => 'search_border_color',
	'label'       => __( 'Border Color', 'ultimate-doc' ),
	'section'     => 'docs_serach',
	'default'     => 'rgba(22, 22, 23, 0.15)',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => 'form.search-form.ultd--search-form input.search-field',
			'function' => 'css',
			'property' => 'border-color',
		],
	],
    
] );

Kirki::add_field( 'ultd__panel', [
	'type'        => 'slider',
	'settings'    => 'search_text_padding',
	'label'       => esc_html__( 'Padding left', 'ultimate-doc' ),
	'section'     => 'docs_serach',
	'default'     => 50,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => 'form.search-form.ultd--search-form input.search-field',
			'function' => 'css',
			'property' => 'padding-left',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'ultd__panel', [
	'type'        => 'slider',
	'settings'    => 'search_border_radius',
	'label'       => esc_html__( 'Border Radius', 'ultimate-doc' ),
	'section'     => 'docs_serach',
	'default'     => 5,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => 'form.search-form.ultd--search-form input.search-field',
			'function' => 'css',
			'property' => 'border-radius',
			'units'    => 'px',
		],
	],
] );