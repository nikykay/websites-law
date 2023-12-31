<?php

use Elementor\Controls_Manager;
use Elementor\Utils;

class Custom_Name extends \Elementor\Widget_Base {
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
		return 'custom_name';
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
		return __( 'Custom Name', 'default' );
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

		$this->start_controls_section( 'custom_name_settings', [
			'label' => __( 'Custom Name', 'default' ),
			'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		] );

		$this->add_control( 'setting_name', [
			'label'        => __( 'Setting Name', 'default' ),
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

		$settings = $this->get_settings();
		$custom_setting = $settings['setting_name']; ?>
		<div class="custom-widget">
			<?php var_dump($custom_setting); // Widget markup ?>
		</div>
		<?php
	}
}
