<?php

if( ! class_exists( 'AcidOption' ) ) {
    
    class AcidOption implements AcidComponent {
        
        
        const TRANSPORT = 'refresh';
        
        private $section;
        
        private $id;
        
        private $option;
        
        private $setting_args = array();
        
        private $control_args = array();
        
        
        public function __get( $name ) {
            return isset( $this->option[ $name ] ) ? $this->option[ $name ] : false;
        }
        
        public function __construct( $section, $id, $option ) {
            
            $this->section = $section;
            $this->id = $id;
            $this->option = $option;

            $this->set_args();
            $this->render();
            
            
        }
        
        public static function get_types() {
            
            return array(
                'text'              => 'Text',
                'checkbox'          => 'Checkbox',
                'radio'             => 'Radio',
                'select'            => 'Select',
                'textarea'          => 'Text area',
                'dropdown-pages'    => 'Dropdown Pages',
                'email'             => 'Email',    
                'url'               => 'URL',
                'number'            => 'Number',
                'hidden'            => 'Hidden',
                'date'              => 'Date',
                'image'             => 'Image',
            );
            
        }
        
        private function set_type() {
            
            if( ! in_array( $this->type, self::get_types() ) ) {
                
                _doing_it_wrong( 'AcidOption->set_type', __( 'You used a non valid option type', 'acid' ), '0.0.1' );
                
            }
            
        }
        
        private function has_default() {
            return $this->default ? true : false;
        }
        
        private function has_transport() {
            return $this->transport ? true : false;
        }
        
        private function has_sanitize_callback() {
            return $this->sanitize_callback ? true : false;
        }
        
        private function has_label() {
            return $this->label ? true : false;
        }
        
        private function has_type() {
            return $this->type ? true : false;
        }
        
        private function has_choices() {
            
            return $this->choices ? true : false;
            
        }
        
        public function render() {
            
            global $wp_customize;
            
            $wp_customize->add_setting( $this->id, $this->setting_args );
            
            switch( $this->type ) {
                
                case 'image' : 
                    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $this->id, $this->control_args ) );
                    break;
                case 'color' :
                    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $this->id, $this->control_args ) );
                    break;
                default :
                    $wp_customize->add_control( $this->id, $this->control_args );
                    break;
            }
            
        }
        
        private function set_args() {
            
            
            if( $this->has_sanitize_callback() ) {
                $this->setting_args[ 'sanitize_callback' ] = $this->sanitize_callback;
            }else {
                $this->set_sanitization();
            }
            
            if( $this->has_default() ) {
                $this->setting_args[ 'default' ] = $this->default;
            }
            
            if( $this->has_transport() ) {
                $this->setting_args[ 'transport' ] = $this->default;
            }else {
                $this->setting_args[ 'transport' ] = self::TRANSPORT;
            }
            
            if( $this->has_label() ) {
                $this->control_args[ 'label' ] = $this->label;
            }
            
            if( $this->has_choices() ) {
                $this->control_args[ 'choices' ] = $this->choices;
            }
            
            if( $this->has_type() ) {
                $this->control_args[ 'type' ] = $this->type;
            }
            
            $this->control_args[ 'section' ] = $this->section;
            
        }
        
        private function set_sanitization() {
            
            $callback = null;

            switch( $this->type ) {
                
                case 'text' :
                    $callback = 'sanitize_text_field';
                    break;
                case 'url' :
                    $callback = 'esc_url_raw';
                    break;
                case 'number' :
                    $callback = 'absint';
                    break;
                case 'textarea' :
                    $callback = 'sanitize_textarea';
                    break;
                case 'date' :
                    $callback = 'acid_sanitize_date';
                    break;
                case 'checkbox' :
                    $callback = 'acid_sanitize_checkbox';
                    break;
                case 'radio' :
                    $callback = 'acid_sanitize_radio';
                    break;
                case 'select' :
                    $callback = 'acid_sanitize_select';
                    break;
                case 'dropdown-pages' :
                    $callback = 'absint';
                    break;
                case 'email' : 
                    $callback = 'sanitize_email';
                    break;
                case 'color' : 
                    $callback = 'sanitize_hex_color';
                    break;
                case 'image' : 
                    $callback = 'esc_url_raw';
                    break;
                
                
                default :
                    $callback = 'sanitize_text_field';
                    break;
                
            }
            
            $this->setting_args[ 'sanitize_callback' ] = $callback;
            
        }

    
    }
    
    
}