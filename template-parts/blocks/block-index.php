<?php

/**
 * Lists all blocks to be registered.
 */

        // Register a slider block.
        $slider = array(
            'name'              => 'slider',
            'title'             => __('Slider'),
            'description'       => __('A custom slider block.'),
            'render_template'   => 'template-parts/blocks/slider/slider.php',
            'category'          => 'formatting',
			'icon' 				=> 'images-alt2',
			'align'				=> 'full',
			'enqueue_assets' => function(){
				wp_enqueue_style('slick', 'https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css', array(), '1.8.1');
				wp_enqueue_style('slick-theme', 'https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css', array(), '1.8.1');
				wp_enqueue_script('slick', 'https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );
				wp_enqueue_style( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.min.css', array(), '1.0.0' );
				wp_enqueue_style( 'block-slider-custom', get_template_directory_uri() . '/template-parts/blocks/slider/slider-customize.css', array(), '1.0.0' );
				wp_enqueue_script( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.min.js', array(), '1.0.0', true );
			},
        );
		// Register a slider of prviolege template block.
        // $templateslider = array(
        //     'name'              => 'Templateslider',
        //     'title'             => __('Templateslider'),
        //     'description'       => __('A custom templateslider block.'),
        //     'render_template'   => 'template-parts/blocks/template-slider/template-slider.php',
        //     'category'          => 'formatting',
		// 	'icon' 				=> 'format-gallery',
		// 	'align'				=> 'full',
		// 	'enqueue_assets' => function(){
		// 		wp_enqueue_style('slick', 'https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css', array(), '1.8.1');
		// 		wp_enqueue_style('slick-theme', 'https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css', array(), '1.8.1');
		// 		wp_enqueue_script('slick', 'https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );
		// 		wp_enqueue_style( 'block-template-slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.min.css', array(), '1.0.0' );
		// 		wp_enqueue_style( 'block-template-slider-custom', get_template_directory_uri() . '/template-parts/blocks/slider/slider-customize.css', array(), '1.0.0' );
		// 		wp_enqueue_script( 'block-template-slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.min.js', array(), '1.0.0', true );
		// 	},
        // );