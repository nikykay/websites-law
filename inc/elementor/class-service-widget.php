<?php

use Elementor\Controls_Manager;
use Elementor\Utils;

class Service_Widget extends \Elementor\Widget_Base {
    /**
     * Get widget name.
     *
     * Retrieve widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name() {
        return 'service_widget';
    }

    /**
     * Get widget title.
     *
     * Retrieve widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title() {
        return __( 'Service Widget', 'default' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon() {
        return 'fas fa-dice-d20';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_categories() {
        return [ 'general' ];
    }

    /**
     * Register widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @see https://code.elementor.com/classes/elementor-controls_manager/
     * @see https://developers.elementor.com/elementor-controls/
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _register_controls() {

        $this->start_controls_section( 'section_nav', [
            'label' => __( 'Settings', 'default' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );


        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings       = $this->get_settings();
        $custom_setting = $settings['setting_name']; ?>





        <div class="custom-widget our-blog-slider-2">

            <?php
            $args = array(
                'post_type' => 'services',
                'post_status' => 'publish',
                'posts_per_page' => 8,
                'orderby' => 'date',
                'order' => 'ASC',
            );

            $loop = new WP_Query($args);
            while ($loop->have_posts()):
                $loop->the_post();
                ?>

                <div class="cont">
                    <div class="service-image-box">
                            <?php echo get_the_post_thumbnail();?>
                            <h1 class="service-title"><?php echo get_the_title();?></h1>
                    </div>
                    <div class="content-box">
                        <p class="blog-content"><?php echo get_the_content();?></p>
                        <a class="blog-btn" href="<?php the_permalink();?>">READ MORE</a>
                    </div>
                </div>

            <?php endwhile;
            wp_reset_postdata();
            ?>

        </div>





        <?php
    }
}
