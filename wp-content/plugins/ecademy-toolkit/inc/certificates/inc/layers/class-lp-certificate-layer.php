<?php

/**
 * Class LP_Certificate_Layer
 */
class LP_Certificate_Layer {
	/**
	 * @var null
	 */
	public $options = null;

	/**
	 * LP_Certificate_Layer constructor.
	 *
	 * @param $options
	 */
	public function __construct( $options ) {
		$this->options = wp_parse_args(
			$options,
			array(
				'name' => uniqid()
			)
		);
	}

	/**
	 * Get name of layer.
	 *
	 * @return string
	 */
	public function get_name() {
		return $this->options['name'];
	}

	public function apply( $data ) {
		$this->options['text'] = ! empty( $this->options['variable'] ) ? $this->options['variable'] : ( isset( $this->options['text'] ) ? $this->options['text'] : '' );
	}

	/**
	 * Default layer's options.
	 *
	 * @return array
	 */
	public function get_options() {
		$font_element = array();
		$font_ttf = array();
		if( 'image' == LP()->settings->get( 'certificates.cer_type' )){
			$fonts = learn_press_certificate_get_font_folders();
			$ttf_fonts = learn_press_certificate_get_font_files();

			$font_element = array(
					'name'        => 'fontFamily',
					'type'        => 'select',
					'title'       => __( 'Font', 'ecademy-toolkit' ),
					'options' => $fonts
			);
			$font_ttf = array(
					'name'        => 'fontFile',
					'type'        => 'select',
					'title'       => __( 'TrueType font file', 'ecademy-toolkit' ),
					'options' => $ttf_fonts
			);
		} else {
			$font_element = array(
				'name'        => 'fontFamily',
				'type'        => 'font',
				'title'       => __( 'Font', 'ecademy-toolkit' ),
				'std'         => '',
				'google_font' => true
			);
		}
		$fields = array($font_element);
		if(!empty($font_ttf)){
			$fields = array_merge($fields, array($font_ttf));
		}
		
		$fields = array_merge($fields,array(
					array(
						'name'  => 'fontSize',
						'type'  => 'slider',
						'title' => __( 'Font size', 'ecademy-toolkit' ),
						'std'   => '',
						'min'   => 8,
						'max'   => 512
					),
					array(
						'name'    => 'fontStyle',
						'type'    => 'select',
						'title'   => __( 'Font style', 'ecademy-toolkit' ),
						'std'     => '',
						'options' => array(
							''        => __( 'Normal', 'ecademy-toolkit' ),
							'italic'  => __( 'Italic', 'ecademy-toolkit' ),
							'oblique' => __( 'Oblique', 'ecademy-toolkit' )
						)
					),
					array(
						'name'    => 'fontWeight',
						'type'    => 'select',
						'title'   => __( 'Font weight', 'ecademy-toolkit' ),
						'std'     => '',
						'options' => array(
							''     => __( 'Normal', 'ecademy-toolkit' ),
							'bold' => __( 'Bold', 'ecademy-toolkit' )
						)
					),
					array(
						'name'    => 'textDecoration',
						'type'    => 'select',
						'title'   => __( 'Text decoration', 'ecademy-toolkit' ),
						'std'     => '',
						'options' => array(
							''             => __( 'Normal', 'ecademy-toolkit' ),
							'underline'    => __( 'Underline', 'ecademy-toolkit' ),
							'overline'     => __( 'Overline', 'ecademy-toolkit' ),
							'line-through' => __( 'Line-through', 'ecademy-toolkit' )
						)
					),
					array(
						'name'  => 'fill',
						'type'  => 'color',
						'title' => __( 'Color', 'ecademy-toolkit' ),
						'std'   => ''
					),
					/*array(
						'name'    => 'originX',
						'type'    => 'select',
						'title'   => __( 'Origin X', 'ecademy-toolkit' ),
						'std'     => 'center',
						'options' => array(
							'center' => __( 'Center', 'learnpress' ),
							'left'   => __( 'Left', 'learnpress' ),
							'right'  => __( 'Right', 'learnpress' ),
						)
					),
					array(
						'name'    => 'originY',
						'type'    => 'select',
						'title'   => __( 'Origin Y', 'ecademy-toolkit' ),
						'std'     => 'center',
						'options' => array(
							'center' => __( 'Center', 'learnpress' ),
							'top'    => __( 'Top', 'learnpress' ),
							'bottom' => __( 'Bottom', 'learnpress' ),
						)
					),*/
					array(
						'name'    => 'originX',
						'type'    => 'select',
						'title'   => __( 'Text align', 'ecademy-toolkit' ),
						'options' => array(
							'left'   => __( 'Left', 'ecademy-toolkit' ),
							'center' => __( 'Center', 'ecademy-toolkit' ),
							'right'  => __( 'Right', 'ecademy-toolkit' )
						),
						'std'     => ''
					),
					array(
						'name'    => 'originY',
						'type'    => 'select',
						'title'   => __( 'Text vertical align', 'ecademy-toolkit' ),
						'options' => array(
							'top'    => __( 'Top', 'ecademy-toolkit' ),
							'center' => __( 'Middle', 'ecademy-toolkit' ),
							'bottom' => __( 'Bottom', 'ecademy-toolkit' )
						),
						'std'     => ''
					),
					array(
						'name'  => 'top',
						'type'  => 'number',
						'title' => __( 'Top', 'ecademy-toolkit' ),
						'std'   => '',
					),
					array(
						'name'  => 'left',
						'type'  => 'number',
						'title' => __( 'Left', 'ecademy-toolkit' ),
						'std'   => '',
					),
					array(
						'name'  => 'angle',
						'type'  => 'slider',
						'title' => __( 'Angle', 'ecademy-toolkit' ),
						'std'   => '',
						'min'   => 0,
						'max'   => 360
					),
					array(
						'name'  => 'scaleX',
						'type'  => 'slider',
						'title' => __( 'Scale X', 'ecademy-toolkit' ),
						'std'   => '',
						'min'   => - 50,
						'max'   => 50,
						'step'  => 0.1
					),
					array(
						'name'  => 'scaleY',
						'type'  => 'slider',
						'title' => __( 'Scale Y', 'ecademy-toolkit' ),
						'std'   => '',
						'min'   => - 50,
						'max'   => 50,
						'step'  => 0.1
					)
				)
		);

		if ( get_class( $this ) === 'LP_Certificate_Layer' ) {
			array_unshift( $fields, array(
				'name'  => 'variable',
				'type'  => 'text',
				'title' => __( 'Custom Text', 'ecademy-toolkit' ),
				'std'   => ''
			) );
		}

		$fields = apply_filters( 'learn-press/certificates/fields', $fields, $this );

		foreach ( $fields as $k => $field ) {
			$name = $field['name'];

			if ( array_key_exists( $name, $this->options ) ) {
				$fields[ $k ]['std'] = $this->options[ $name ];
			}
		}

		return $fields;
	}

	public function __toString() {
		return LP_Helper::json_encode( $this->options );
	}
}