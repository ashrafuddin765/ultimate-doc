<?php
new \Kirki\Section( 'docs_global', array(
	'title'          => esc_html__( 'Global Option', 'ultimate-doc' ),
	'panel'          => 'ultd__panel',
	'priority'       => 160,
) );


Kirki::add_field( 'ultd__panel', [
	'type'        => 'slider',
	'settings'    => 'docs_page_width',
	'label'       => esc_html__( 'Container Width', 'ultimate-doc' ),
	'section'     => 'docs_global',
	'default'     => 1300,
	'choices'     => [
		'min'  => 1170,
		'max'  => 2500,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ultd--container',
			'function' => 'css',
			'property' => 'max-width',
			'units'    => 'px',
		],
	],	

] );

Kirki::add_field( 'ultd__panel', [
	'type'        => 'color',
	'settings'    => 'ultd__body_bg_color',
	'label'       => __( 'Body Background Color', 'ultimate-doc' ),
	'section'     => 'docs_global',
	'default'     => '#FFFFFF',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => 'body.ultd--body',
			'function' => 'css',
			'property' => 'background-color',
		],
	],
	
] );

// Typography 

Kirki::add_field( 'ultd__panel', [
	'type'        => 'typography',
	'settings'    => 'ultd__typhography',
	'label'       => esc_html__( 'Typography', 'ultimate-doc' ),
	'section'     => 'docs_global',
	'default'     => [
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '13px',
		'line-height'    => '1.5em',
		'text-transform' => 'capitalize',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'body',
		],
	],
] );

Kirki::add_field( 'ultd__panel', [
	'type'        => 'color',
	'settings'    => 'body_primary_color',
	'label'       => __( 'Color', 'ultimate-doc' ),
	'section'     => 'docs_global',
	'default'     => 'rgba(0, 0, 0, 0.7)',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => 'body.ultd--body',
			'function' => 'css',
			'property' => 'color',
		],
	],
	
] );


