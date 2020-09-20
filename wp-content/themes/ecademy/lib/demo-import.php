<?php
/**
 * One Click Demo Import
 * @package WordPress
 * @subpackage ecademy
 * 
 */
if ( ! function_exists( 'ecademy_import_files' ) ) {
    function ecademy_import_files() {
        return array(
            array(
                'import_file_name'             => esc_html__('eCademy Demo Data', 'ecademy'),
                'local_import_file'            => trailingslashit( get_template_directory() ) . '/lib/demo-data/ecademy-demo.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/lib/demo-data/ecademy-widgets.json',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/lib/demo-data/ecademy-export.dat',
                'local_import_redux'           => array(
                    array(
                        'file_path'   => trailingslashit( get_template_directory() ) . '/lib/demo-data/redux-options.json',
                        'option_name' => 'ecademy_opt',
                    ),
                ),
                'import_notice'        => wp_kses_post( 'After import demo, just set static homepage from settings>reading and check widgets & menus. <br></br> Go to LearnPress > Settings and choose the page you like to be your Logout Redirect, Course, Profile, and Checkout page.', 'ecademy' ),
            ),
        );
    }
}
add_filter( 'pt-ocdi/import_files', 'ecademy_import_files' );

if ( ! function_exists( 'ecademy_after_import_files' ) ) {
    function ecademy_after_import_files() {
        if ( class_exists( 'RevSlider' ) ) {
            $slider_array = array(
            get_template_directory()."/lib/demo-data/revslider/banner-slider.zip",
            );

            $slider = new RevSlider();
        
            foreach($slider_array as $filepath){
            $slider->importSliderFromPost(true,true,$filepath);  
            }
        
            echo esc_html__('Slider processed', 'ecademy');
        }
    }
}
add_filter( 'pt-ocdi/after_import', 'ecademy_after_import_files' );