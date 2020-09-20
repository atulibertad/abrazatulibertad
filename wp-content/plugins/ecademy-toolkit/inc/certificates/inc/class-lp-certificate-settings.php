<?php

class LP_Certificates_Settings extends LP_Abstract_Settings_Page {
	/**
	 * Constructor
	 */
	public function __construct() {
		$this->id   = 'certificates';
		$this->text = __( 'Certificates', 'ecademy-toolkit' );

		parent::__construct();
	}

	public function get_settings( $section = '', $tab = '' ) {
		return array(
			array(
				'title'   => __( 'Google Fonts', 'ecademy-toolkit' ),
				'id'      => 'certificates[google_fonts]',
				'default' => 'no',
				'type'    => 'google-fonts'
			),
			array(
				'name'            => __( 'Social Sharing', 'ecademy-toolkit' ),
				'id'              => 'certificates[socials]',
				'default'         => '',
				'type'            => 'checkbox_list',
				'options'         => array(
					'twitter'  => __( 'Twitter', 'ecademy-toolkit' ),
					'facebook' => __( 'Facebook', 'ecademy-toolkit' ),
					'plusone'  => __( 'Plusone', 'ecademy-toolkit' )
				),
				'select_all_none' => true
			),
			array(
				'name'		=> __( 'Certificate types', 'ecademy-toolkit' ),
				'id'		=> 'certificates[cer_type]',
				'type'		=> 'radio',
				'options'         => array(
						'canvas'  => __( 'Canvas', 'ecademy-toolkit' ),
						'image' => __( 'Image', 'ecademy-toolkit' ),
				),
			),
			array(
				'name'		=> __( 'Fonts directory', 'ecademy-toolkit' ),
				'id'		=> 'certificates[fonts_dir]',
				'type'		=> 'text',
				'desc' => __('Enter path of fonts folder', 'leanpress-certificates'),
			)
		);
	}
}

return new LP_Certificates_Settings();