<?php

use Elementor\Controls_Manager;
use Elementor\Utils;

class Blogs_Widget extends \Elementor\Widget_Base {
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
        return 'blogs_widget';
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
        return __( 'Blogs Widget', 'default' );
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

        $this->start_controls_section( 'blogs_widget', [
            'label' => __( 'Blogs widget', 'default' ),
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
        <div class="blog-card-section">


            <?php
            $args = array(
                'post_type' => 'blog',
                'post_status' => 'publish',
                'posts_per_page' => 12,
                'orderby' => 'date',
                'order' => 'ASC',
            );

            $loop = new WP_Query($args);
            while ($loop->have_posts()):
                $loop->the_post();
                ?>

                <div class="card-box">
                    <p class="blog-card-date"><?php echo get_the_date('d M Y'); ?></p>
                    <h2 class="blog-card-title"><?php echo get_the_title();?></h2>
                    <div class="blog-card-line">
                    </div>
                    <p class="blog-card-content"><?php echo get_the_content();?></p>
                    <a class="blog-card-btn" href="<?php the_permalink();?>">READ MORE</a>
                </div>

            <?php endwhile;
            wp_reset_postdata();
            ?>


        </div>
        <?php
    }
}
