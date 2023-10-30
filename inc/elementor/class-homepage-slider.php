<?php

use Elementor\Controls_Manager;
use Elementor\Utils;

class Homepage_Slider extends \Elementor\Widget_Base
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
        return 'homepage_slider';
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
        return __('Homepage Slider', 'default');
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

        $this->start_controls_section('homepage_slider', [
            'label' => __('Homepage Slider', 'default'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('bg_image', [
            'label' => __('Bg Image', 'default'),
            'type' => \Elementor\Controls_Manager::MEDIA,
        ]);


        $repeater_name = new \Elementor\Repeater();

        $repeater_name->add_control('main_title', [
            'label' => __('Title', 'default'),
            'type' => Controls_Manager::WYSIWYG,
        ]);

        $repeater_name->add_control('btn_title', [
            'label' => __('Button Title', 'default'),
            'type' => Controls_Manager::TEXT,
        ]);

        $repeater_name->add_control('btn_url', [
            'type' => Controls_Manager::URL,
            'label' => __('URL Button', 'default'),
        ]);


        $this->add_control('repeater', [
            'label' => __('Repeater', 'default'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater_name->get_controls(),
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
        $repeater = $settings['repeater'];
        $bg_image = $settings['bg_image'];
        ?>
        <div class="homepage-container" style="background-image: url('<?= $bg_image['url'] ?>')">
            <!--            <h1 class="homepage-main-title">Integrating Profound Government-->
            <!--                Experience with Advanced-->
            <!--                Business Insight.</h1>-->
            <!--            <a class="homepage-main-btn" href="#">ABOUT THE FirM</a>-->
            <!--            --><?php //if (have_rows($repeater)):
            ?>
            <!--            --><?php //while (have_rows($repeater)): the_row();
            ?>
            <!--                <h2>--><?php //echo $repeater['main_title'];
            ?><!--</h2>-->
            <!--            --><?php //endwhile;
            ?>
            <!--            --><?php //endif;
            ?>

            <div class="homepage-container-inner">
                <div class="slider-mother ">
                    <?php foreach ($repeater as $item): ?>
                        <div class="slicker-div">
                            <?php echo $item['main_title'] ?>
                            <a class="slider-btn"
                               href="<?php echo $item['btn_url']['url'] ?>"><i class="material-symbols-outlined">trending_flat</i> <?php echo $item['btn_title']; ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="slicker-arrows">
                    <button class="prev-btn"><span class="material-symbols-outlined">arrow_back</span></button>
                    <button class="next-btn"><span class="material-symbols-outlined">arrow_forward</span></button>
                </div>
            </div>
        </div>
        <?php
    }
}
