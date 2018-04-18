<?php

/**
 * Pro customizer section.
 *
 * @since  1.0.0
 * @access public
 */
class Buildr_Customize_Section_Pro extends WP_Customize_Section {

    /**
     * The type of customize section being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'companion-plugin';

    /**
     * Custom button text to output.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $install_text = '';

    /**
     * Custom pro button URL.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $install_url = '';
    
    public $dismiss_text = '';
    public $confirm_text = '';
    public $confirm_button = '';
    
    public $description = '';

    /**
     * Add custom parameters to pass to the JS via JSON.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function json() {
        $json = parent::json();

        $json[ 'install_text' ] = $this->install_text;
        $json[ 'install_url' ] = esc_url( $this->install_url );
        $json[ 'description' ] = $this->description;
        $json[ 'dismiss_text' ] = $this->dismiss_text;
        $json[ 'confirm_text' ] = $this->confirm_text;
        $json[ 'confirm_button' ] = $this->confirm_button;

        return $json;
    }

    /**
     * Outputs the Underscore.js template.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    protected function render_template() {
        ?>

        <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

            <h3 class="accordion-section-title">{{ data.title }}</h3>
            
            <p class="accordion-section-details">
                {{ data.description }}
            </p>
            
            <div class="accordion-section-buttons">
                
                <# if ( data.install_text && data.install_url ) { #>
                <a href="{{{ data.install_url }}}" class="button button-primary">
                    <span class="dashicons dashicons-admin-appearance buildr-companion-icon"></span>
                    {{ data.install_text }}
                </a>
                
                <a href="#" class="button button-default buildr-initiate-dismiss">{{ data.dismiss_text }}</a>
                
                <# } #>
                
            </div>
            
            <div class="accordion-section-buttons buildr-dismiss-confirm">
                <p>{{ data.confirm_text }}</p>
                <a href="#" class="button button-primary buildr-dismiss-companion">{{data.confirm_button}}</a>
                
                
            </div>
            
        </li>
    <?php
    }

}
