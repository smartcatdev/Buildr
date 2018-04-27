<?php

if( !function_exists( 'buildr_fonts' ) ) {

    function buildr_fonts(){

        $font_family_array = array(

            'Abel, sans-serif'                                  => 'Abel',
            'Arvo, serif'                                       => 'Arvo:400,400i,700',
            'Courgette, handwriting'                            => 'Courgette',
            'Domine, serif'                                     => 'Domine',
            'Dosis, sans-serif'                                 => 'Dosis:200,300,400',
            'Droid Sans, sans-serif'                            => 'Droid+Sans:400,700',
            'Economica, sans-serif'                             => 'Economica:400,700',
            'Josefin Sans, sans-serif'                          => 'Josefin+Sans:300,400,600,700',
            'Itim, handwriting'                                 => 'Itim',
            'Lato, sans-serif'                                  => 'Lato:100,300,400,700,900,300italic,400italic',
            'Lora, serif'                                       => 'Lora',
            'Lilita One, display'                               => 'Lilita+One',
            'Montserrat, sans-serif'                            => 'Montserrat:400,700',
            'Noto Serif, serif'                                 => 'Noto+Serif',
            'Old Standard TT, serif'                            => 'Old+Standard+TT:400,400i,700',
            'Open Sans, sans-serif'                             => 'Open Sans',
            'Open Sans Condensed, sans-serif'                   => 'Open+Sans+Condensed:300,300i,700',
            'Orbitron, sans-serif'                              => 'Orbitron',
            'Oswald, sans-serif'                                => 'Oswald:300,400',
            'Poiret One, display'                               => 'Poiret+One',
            'PT Sans Narrow, sans-serif'                        => 'PT+Sans+Narrow',
            'Rajdhani, sans-serif'                              => 'Rajdhani:300,400,500,600',
            'Raleway, sans-serif'                               => 'Raleway:200,300,400,500,700',
            'Roboto, sans-serif'                                => 'Roboto:100,300,400,500',
            'Roboto Condensed, sans-serif'                      => 'Roboto+Condensed:400,300,700',
            'Shadows Into Light, handwriting'                   => 'Shadows+Into+Light',
            'Shrikhand, display'                                => 'Shrikhand',
            'Source Sans Pro, sans-serif'                       => 'Source+Sans+Pro:200,400,600',
            'Teko, sans-serif'                                  => 'Teko:300,400,600',
            'Titillium Web, sans-serif'                         => 'Titillium+Web:400,200,300,600,700,200italic,300italic,400italic,600italic,700italic',
            'Trirong, serif'                                    => 'Trirong:400,700',
            'Ubuntu, sans-serif'                                => 'Ubuntu',
            'Vollkorn, serif'                                   => 'Vollkorn:400,400i,700',
            'Voltaire, sans-serif'                              => 'Voltaire',

        );

        return apply_filters( 'buildr_fonts', $font_family_array );

    }
    
}