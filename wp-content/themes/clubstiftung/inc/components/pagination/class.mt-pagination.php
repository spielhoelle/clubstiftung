<?php

/**
 * Class clubstiftung_Pagination_Output
 *
 * This file does the handling of the pagination on the site
 *
 */


if( !function_exists('clubstiftung_CallPaginationClass' ) ) {
    /**
     *
     */
    function clubstiftung_CallPaginationClass()
    {
        // instantiate the class & load everything else
        clubstiftung_Pagination_Output::getInstance();
    }
    add_action( 'wp_loaded', 'clubstiftung_CallPaginationClass' );
}

if( !class_exists( 'clubstiftung_Pagination_Output' ) ) {

    class clubstiftung_Pagination_Output
    {

        /**
         * @var Singleton The reference to *Singleton* instance of this class
         */
        private static $instance;


        protected function __construct()
        {

            // add the action hook to generate the HTML output
            add_action( 'clubstiftung_after_content_above_footer', array( $this, 'pagination_output' ), 1);
        }

        /**
         * Returns the *Singleton* instance of this class.
         *
         * @return Singleton The *Singleton* instance.
         */
        public static function getInstance()
        {
            if (null === static::$instance) {
                static::$instance = new static();
            }

            return static::$instance;
        }

        /**
         * Custom pagination function
         *
         * clubstiftung 1.09
         */

        function pagination_output() {

            $prev_arrow = is_rtl() ? '&rarr;' : '<i class="fa fa-angle-left"></i>';
            $next_arrow = is_rtl() ? '&larr;' : '<i class="fa fa-angle-right"></i>';

            global $wp_query;
            $total = $wp_query->max_num_pages;
            $big = 999999999; // need an unlikely integer
            if( $total > 1 )  {
                if( !$current_page = get_query_var('paged') )
                    $current_page = 1;
                if( get_option('permalink_structure') ) {
                    $format = 'page/%#%/';
                } else {
                    $format = '&paged=%#%';
                }

                echo '<nav class="paginate-links">';
                    echo paginate_links(array(
                        'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format'		=> $format,
                        'current'		=> max( 1, get_query_var('paged') ),
                        'total' 		=> $total,
                        'mid_size'		=> 3,
                        'type' 			=> 'plain',
                        'prev_text'		=> $prev_arrow,
                        'next_text'		=> $next_arrow,
                    ) );
                echo '</nav><!--/.paginate-links-->';

            }
        }


        /**
         * Private clone method to prevent cloning of the instance of the
         * *Singleton* instance.
         *
         * @return void
         */
        private function __clone()
        {
        }

        /**
         * Private unserialize method to prevent unserializing of the *Singleton*
         * instance.
         *
         * @return void
         */
        private function __wakeup()
        {
        }

    } // actual class
} // class_exists