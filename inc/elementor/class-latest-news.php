<?php

use Elementor\Controls_Manager;
use Elementor\Utils;

class Latest_News extends \Elementor\Widget_Base
{
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
    public function get_name()
    {
        return 'latest_news';
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
    public function get_title()
    {
        return __('Latest News', 'default');
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
    public function get_icon()
    {
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
    public function get_categories()
    {
        return ['general'];
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
    protected function _register_controls()
    {

        $this->start_controls_section('latest_news', [
            'label' => __('Latest News', 'default'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);


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
    protected function render()
    {

        $settings = $this->get_settings();
//        $custom_setting = $settings['setting_name']; ?>
        <div class="latest-news-section">

            <?php
            $args = array(
                'post_type' => 'news',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'DESC',
            );

            $loop = new WP_Query($args);
            while ($loop->have_posts()):
                $loop->the_post();
                ?>

                <div class="news-card">
                    <a href="<?php echo the_permalink(); ?>">
                        <div class="img-side">
                            <div class="img-overlay"></div>
                            <?php echo get_the_post_thumbnail(); ?>
                            <p class="news-date"><?php echo get_the_date('d M Y'); ?></p>
                            <h2 class="news-title"><?php echo get_the_title(); ?></h2>
                        </div>
                    </a>
                </div>

            <?php endwhile;
            wp_reset_postdata();
            ?>

        </div>
        <?php
    }
}
