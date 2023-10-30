<?php

use Elementor\Controls_Manager;
use Elementor\Utils;

class Test_Info extends \Elementor\Widget_Base {
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
        return 'test_info';
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
        return __( 'Test Info', 'default' );
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

        $this->start_controls_section( 'test_info', [
            'label' => __( 'Test Info', 'default' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'first_name', [
            'label'        => __( 'First Name', 'default' ),
            'type'         => \Elementor\Controls_Manager::TEXT,
            'default'      => '',
        ] );

        $this->add_control( 'last_name', [
            'label'        => __( 'Last Name', 'default' ),
            'type'         => \Elementor\Controls_Manager::TEXT,
            'default'      => '',
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
//        $custom_setting = $settings['setting_name'];
        $first_name = $settings['first_name'];
        $last_name = $settings['last_name'];
        ?>
        <div class="custom-widget">
            <?php
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 4,
                'orderby' => 'date',
                'order' => 'ASC',
            );

            $loop = new WP_Query($args);
            while ($loop->have_posts()):
            $loop->the_post();
            ?>
                <div class="image-box">

                </div>
                <div class="content-box">
                    <h1 class="blog-title"><?php echo get_the_title();?></h1>
                    <p class="blog-content"><?php echo the_excerpt();?></p>
                    <div>
                        <?php echo get_the_post_thumbnail();?>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata();
            ?>

        </div>
        <?php
    }
}
