<?php
/**
 * Partner Logo Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Partner_Logo extends Widget_Base {

	public function get_name() {
        return 'Partner_Logo';
    }

	public function get_title() {
        return __( 'Partner Logo', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-logo';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function _register_controls() {

        $this->start_controls_section(
			'partner_section',
			[
				'label' => __( 'Partner Logo Control', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'logos',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'label'   => esc_html__( 'Add Partner Logo', 'ecademy-toolkit' ),			                 
                    'fields'  => array(				
                        array(
                            'type'    => Controls_Manager::MEDIA,
                            'name'    => 'logo',
                            'label'   => esc_html__( 'Logo', 'ecademy-toolkit' ),
                        ),
                    ),	
                ]			
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'partner_styling',
			[
				'label' => __( 'Style', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
            ]
        );	

            $this->add_responsive_control(
				'padding_top',
				[
					'label' => __( 'Padding Top', 'ecademy-toolkit' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 100,
							'step' => 1,
						],
					],
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'selectors' => [
						'{{WRAPPER}} .partner-area.border-bottom' => 'padding-top: {{SIZE}}px;',
					],
				]
            );
            
            $this->add_responsive_control(
				'padding_bottom',
				[
					'label' => __( 'Padding Bottom', 'ecademy-toolkit' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 100,
							'step' => 1,
						],
					],
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'selectors' => [
						'{{WRAPPER}} .partner-area.border-bottom' => 'padding-bottom: {{SIZE}}px;',
					],
				]
			);

			$this->add_control(
				'border_color',
				[
					'label' => esc_html__( 'Border Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .partner-area.border-bottom' => 'border-bottom-color: {{VALUE}} !important',
					],
				]
			);
			
        $this->end_controls_section();

    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        ?>
        <div class="partner-area pt-100 pb-70 border-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <?php foreach( $settings['logos'] as $item ): ?>
                        <div class="col-lg-2 col-6 col-sm-3 col-md-3">
                            <div class="single-partner-item">
                                <img src="<?php echo esc_url( $item['logo']['url'] ); ?>" alt="<?php echo esc_attr__( 'Partner Logo', 'ecademy-toolkit' ); ?>">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>        
        <?php
	}
	protected function _content_template() {}

}

Plugin::instance()->widgets_manager->register_widget_type( new eCademy_Partner_Logo );