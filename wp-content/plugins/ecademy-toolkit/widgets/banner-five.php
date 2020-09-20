<?php
/**
 * Banner Five Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Banner_Five extends Widget_Base {

	public function get_name() {
        return 'eCademy_Banner_Five';
    }

	public function get_title() {
        return esc_html__( 'Banner Five', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-banner';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function _register_controls() {

        $this->start_controls_section(
			'eCademy_Banner_Five_Area',
			[
				'label' => esc_html__( 'Banner Controls', 'ecademy-toolkit' ),
				'tab' 	=> Controls_Manager::TAB_CONTENT,
			]
		);
            
            $this->add_control(
				'bg_color',
				[
					'label' => esc_html__( 'Background Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .main-banner-wrapper' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'title',
				[
					'label' 	=> esc_html__( 'Title', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__('Achieve the Best Results With eCademy', 'ecademy-toolkit'),
				]
			);

			$this->add_control(
                'title_tag',
                [
                    'label' 	=> esc_html__( 'Title Tag', 'ecademy-toolkit' ),
                    'type' 		=> Controls_Manager::SELECT,
                    'options' 	=> [
                        'h1'         => esc_html__( 'h1', 'ecademy-toolkit' ),
                        'h2'         => esc_html__( 'h2', 'ecademy-toolkit' ),
                        'h3'         => esc_html__( 'h3', 'ecademy-toolkit' ),
                        'h4'         => esc_html__( 'h4', 'ecademy-toolkit' ),
                        'h5'         => esc_html__( 'h5', 'ecademy-toolkit' ),
                        'h6'         => esc_html__( 'h6', 'ecademy-toolkit' ),
                    ],
                    'default' => 'h1',
                ]
            );

			$this->add_control(
				'content',
				[
					'label' 	=> esc_html__( 'Content', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'ecademy-toolkit'),
				]
			);

			$this->add_control(
				'button_text',
				[
					'label' 	=> esc_html__( 'Button Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__('Join For Free', 'ecademy-toolkit'),
				]
            ); 
            
            $this->add_control(
				'user_button_text',
				[
					'label' 	=> esc_html__( 'User Logged in Button Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__('Profile', 'ecademy-toolkit'),
				]
			);

            $this->add_control(
				'button_icon',
				[
					'label' => esc_html__( 'Button Icon', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'options' => ecademy_flaticons(),
				]
            );

            $this->add_control(
                'link_type',
                [
                    'label' 		=> esc_html__( 'Button Link Type', 'ecademy-toolkit' ),
                    'type' 			=> Controls_Manager::SELECT,
                    'label_block' 	=> true,
                    'options' => [
                        '1'  	=> esc_html__( 'Link To Page', 'ecademy-toolkit' ),
                        '2' 	=> esc_html__( 'External Link', 'ecademy-toolkit' ),
                    ], 
                ]
            );
    
            $this->add_control(
                'link_to_page',
                [
                    'label' 		=> esc_html__( 'Button Link Page', 'ecademy-toolkit' ),
                    'type' 			=> Controls_Manager::SELECT,
                    'label_block' 	=> true,
                    'options' 		=> ecademy_toolkit_get_page_as_list(),
                    'condition' => [
                        'link_type' => '1',
                    ]
                ]
            );
    
            $this->add_control(
                'ex_link',
                [
                    'label'		=> esc_html__('Button External Link', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type' => '2',
                    ]
                ]
            );

            $this->add_control(
                'fimage',
                [
                    'label'		=> esc_html__('Feature Image', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
			);

			$this->add_control(
                'shape1',
                [
                    'label'		=> esc_html__('Shape Image One', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
			);

			$this->add_control(
                'shape2',
                [
                    'label'		=> esc_html__('Shape Image Two', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
			);

			$this->add_control(
                'shape3',
                [
                    'label'		=> esc_html__('Shape Image Three', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
            );
            $this->add_control(
                'shape4',
                [
                    'label'		=> esc_html__('Shape Image Four', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
            );
            $this->add_control(
                'shape5',
                [
                    'label'		=> esc_html__('Shape Image Five', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
            );
        
        $this->end_controls_section();

        $this->start_controls_section(
			'banner_style',
			[
				'label' => esc_html__( 'Style', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Title Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .main-banner-wrapper-content h1, .main-banner-wrapper-content h2, .main-banner-wrapper-content h3, .main-banner-wrapper-content h4, .main-banner-wrapper-content h5, .main-banner-wrapper-content h6' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .main-banner-wrapper-content h1, .main-banner-wrapper-content h2, .main-banner-wrapper-content h3, .main-banner-wrapper-content h4, .main-banner-wrapper-content h5, .main-banner-wrapper-content h6',
                ]
            );
			
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Content Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .main-banner-wrapper-content p' => 'color: {{VALUE}}',
					],
				]
			);
			
			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .main-banner-wrapper-content p',
                ]
            );

        $this->end_controls_section();

    }

	protected function render() {

		$settings = $this->get_settings_for_display();
		
        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');
        $this-> add_inline_editing_attributes('content','none');

		// Button Icon
        if( $settings['button_icon'] != '' ):
            $icon = $settings['button_icon'];
        else:
            $icon = 'flaticon-user';
        endif;

        // Get Button Link
        if($settings['link_type'] == 1){
            $link = get_page_link( $settings['link_to_page'] ); 
        } else {
            $link = $settings['ex_link'];
        }

        if ( is_user_logged_in() ):
            $button_text = $settings['user_button_text'];
        else:
            $button_text = $settings['button_text'];
        endif;
		?>
        
        <div class="main-banner-wrapper">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12">
                        <div class="main-banner-wrapper-content">
							<<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>>
								<?php echo esc_html( $settings['title'] ); ?>
							</<?php echo esc_attr( $settings['title_tag'] ); ?>>
                            <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo esc_html( $settings['content'] ); ?></p>
                            <?php if( $button_text != '' ): ?>
								<a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
							<?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-12">
                        <div class="main-banner-wrapper-image text-center">
                            <?php if( $settings['fimage']['url'] != '' ): ?>
                                <img src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if( $settings['shape1']['url'] != '' ): ?>
                <div class="banner-shape14">
                    <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                </div>
            <?php endif; ?>

            <?php if( $settings['shape2']['url'] != '' ): ?>
                <div class="banner-shape15">
                    <img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                </div>
            <?php endif; ?>

            <?php if( $settings['shape3']['url'] != '' ): ?>
                <div class="banner-shape16">
                    <img src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                </div>
            <?php endif; ?>

            <?php if( $settings['shape4']['url'] != '' ): ?>
                <div class="banner-shape17">
                    <img src="<?php echo esc_url( $settings['shape4']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                </div>
            <?php endif; ?>

            <?php if( $settings['shape5']['url'] != '' ): ?>
                <div class="banner-shape18">
                    <img src="<?php echo esc_url( $settings['shape5']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                </div>
            <?php endif; ?>
        </div>	
        <?php
	}

	protected function _content_template() {}

}

Plugin::instance()->widgets_manager->register_widget_type( new eCademy_Banner_Five );