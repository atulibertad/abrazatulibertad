<?php
/**
 * About Area Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_About_Area extends Widget_Base {

	public function get_name() {
        return 'About_Area';
    }

	public function get_title() {
        return esc_html__( 'About Area', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-info-box';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function _register_controls() {

        $this->start_controls_section(
			'eCademy_About_Area',
			[
				'label' => esc_html__( 'eCademy About Area', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
        
            $this->add_control(
                'top_title',
                [
                    'label' => esc_html__( 'Top Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Distance Learning', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Build Your Project Management Skills Online, Anytime', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'title_tag',
                [
                    'label' => esc_html__( 'Title Tag', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'h1'         => esc_html__( 'h1', 'ecademy-toolkit' ),
                        'h2'         => esc_html__( 'h2', 'ecademy-toolkit' ),
                        'h3'         => esc_html__( 'h3', 'ecademy-toolkit' ),
                        'h4'         => esc_html__( 'h4', 'ecademy-toolkit' ),
                        'h5'         => esc_html__( 'h5', 'ecademy-toolkit' ),
                        'h6'         => esc_html__( 'h6', 'ecademy-toolkit' ),
                    ],
                    'default' => 'h2',
                ]
            );

            $this->add_control(
                'content',
                [
                    'label' => esc_html__( 'Content', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => esc_html__('Want to learn and earn PDUs or CEUs on your schedule — anytime, anywhere? Or, pick up a new skill quickly like, project team leadership or agile? Browse our most popular online courses.', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'strong_content',
                [
                    'label' => esc_html__( 'Bold Content', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => esc_html__('Grow your knowledge and your opportunities with thought leadership, training and tools.', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
				'video_link',
				[
					'label' 	=> esc_html__( 'Video Button Link', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('https://www.youtube.com/watch?v=PWvPbGWVRrU', 'ecademy-toolkit'),
				]
			);  
            
            $this->add_control(
				'button_text',
				[
					'label' 	=> esc_html__( 'Button Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('Explore Learning', 'ecademy-toolkit'),
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

        $this->end_controls_section();

        $this->start_controls_section(
			'section_images',
			[
				'label' => esc_html__( 'Images', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'fimage',
                [
                    'label' => esc_html__( 'About Area Image', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
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

        $this->end_controls_section();

        $this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
            $this->add_control(
                'section_bg_color',
                [
                    'label' => esc_html__( 'Section Background Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about-area-two.bg-fffaf3.pt-70.pb-100, .divider' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'top_title_color',
                [
                    'label' => esc_html__( 'Top Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about-content-box .sub-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'top_title_typography',
                    'label' => __( 'Top Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .about-content-box .sub-title',
                ]
            );
        
            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about-content-box h2, .about-content-box h3, .about-content-box h4, .about-content-box h5, .about-content-box h5, .about-content-box h6, .about-content-box h1' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .about-content-box h2, .about-content-box h3, .about-content-box h4, .about-content-box h5, .about-content-box h5, .about-content-box h6, .about-content-box h1',
                ]
            );

            $this->add_control(
                'content_color',
                [
                    'label' => esc_html__( 'Content Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about-content-box p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .about-content-box p',
                ]

            );
            
        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');
        $this-> add_inline_editing_attributes('content','none');

        // Get Button Link
        if($settings['link_type'] == 1){
            $link = get_page_link( $settings['link_to_page'] ); 
        } else {
            $link = $settings['ex_link'];
        }
        ?>
        <div class="about-area-two bg-fffaf3 pt-70 pb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12">
                        <div class="about-content-box">
                            <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                            <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                            <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
                            <p><strong><?php echo wp_kses_post( $settings['strong_content'] ); ?></strong></p>

                            <?php if( $settings['button_text'] != '' ): ?>
								<a href="<?php echo esc_url( $link ); ?>" class="link-btn"><?php echo esc_html( $settings['button_text'] ); ?><span></span></a>
							<?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-12">
                        <div class="about-video-box">
                        
                            <?php if( $settings['fimage']['url'] != '' ): ?>
                                <div class="image">
                                    <img src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                                </div>
                            <?php endif; ?>

                            <?php if( $settings['video_link'] != '' ): ?>
                                <a href="<?php echo esc_url( $settings['video_link'] ); ?>" class="video-btn popup-youtube"><i class="flaticon-play"></i></a>
                            <?php endif; ?>
                            
                            <?php if( $settings['shape1']['url'] != '' ): ?>
                                <div class="shape10" data-speed="0.06" data-revert="true">
                                    <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="divider"></div>
            <?php if( $settings['shape2']['url'] != '' ): ?>
                <div class="shape3" data-speed="0.06" data-revert="true">
                    <img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                </div>
            <?php endif; ?>
            
            <?php if( $settings['shape3']['url'] != '' ): ?>
                <div class="shape4" data-speed="0.06" data-revert="true">
                    <img src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                </div>
            <?php endif; ?>
            <?php if( $settings['shape4']['url'] != '' ): ?>
                <div class="shape2" data-speed="0.06" data-revert="true">
                    <img src="<?php echo esc_url( $settings['shape4']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                </div>
            <?php endif; ?>
        </div>   
        <?php
	}

	protected function _content_template() {}

}

Plugin::instance()->widgets_manager->register_widget_type( new eCademy_About_Area );