<?php


/**
 *
 *
 * @since   1.0.0
 *
 */
if(!function_exists('clubstiftung_CallEntryMetaClass')) {
    /**
     *
     */
    function clubstiftung_CallEntryMetaClass()
    {

        // instantiate the class & load everything else
        clubstiftung_Entry_Meta_Output::getInstance();

    }
    add_action('wp_loaded', 'clubstiftung_CallEntryMetaClass');
}



if( !class_exists( 'clubstiftung_Entry_Meta_Output' ) ) {

    class clubstiftung_Entry_Meta_Output
    {

        /**
         * @var Singleton The reference to *Singleton* instance of this class
         */
        private static $instance;


        protected function __construct() {
            add_action( 'clubstiftung_single_entry_meta', array( $this, 'single_entry_meta_output' ), 1 );
            add_action( 'clubstiftung_archive_meta_content', array( $this, 'archive_entry_meta_output' ), 1 );
            add_action( 'clubstiftung_single_after_content', array( $this, 'single_content_tags' ), 1 );
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
         *  Prints HTML with meta information for the current post-date/time and author on single post.
         */
        public function single_entry_meta_output() {
            global $post;

            $categories_list = get_the_category_list( esc_html__( ', ', 'clubstiftung' ) );
            $number_comments = get_comments_number();

            $display_post_posted_on_meta = get_theme_mod( 'clubstiftung_enable_post_posted_on_blog_posts', 1 );
            $display_number_comments = get_theme_mod( 'clubstiftung_enable_post_comments_blog_posts', 1 );

            if( $display_post_posted_on_meta == 1 ) {
                $output = '';

                 $output .= '<div class="blog-post-meta">';
                    $output .= '<span class="post-meta-author"><i class="fa fa-user"></i>'. esc_html( get_the_author() ) .'</span>';
                    $output .= '<span class="post-meta-time"><i class="fa fa-calendar"></i><time datetime="'. sprintf( '%s-%s-%s', get_the_date( 'Y' ), get_the_date( 'm' ), get_the_date( 'd' ) ) .'">'. sprintf( '%s %s, %s', get_the_date( 'F' ), get_the_date( 'd' ), get_the_date( 'Y' ) ) .'</time></span>';
                    $output .= '<span class="post-meta-categories"><i class="fa fa-folder-o" aria-hidden="true"></i>'.$categories_list.'</span>';
                $output .= '</div><!--/.blog-post-meta-->';

                echo $output;
            }
        }

        /**
         *  Prints HTML with meta information for the current post-date/time and author on archive.
         */
        public function archive_entry_meta_output() {
            global $post;

            $number_comments = get_comments_number();
            $categories_list = get_the_category_list( esc_html__( ', ', 'clubstiftung' ) );
            $post_standard_enable_author = get_theme_mod( 'clubstiftung_post_standard_enable_author', 1 );

            $output = '';

            $output .= '<div class="blog-post-meta">';
                $output .= ( ( $post_standard_enable_author == 1 ) ? '<span class="post-meta-author"><i class="fa fa-user"></i>'. esc_html( get_the_author() ) .'</span>' : '' );
                $output .= '<span class="post-meta-time"><i class="fa fa-calendar"></i><time datetime="'. sprintf( '%s-%s-%s', get_the_date( 'Y' ), get_the_date( 'm' ), get_the_date( 'd' ) ) .'">'. sprintf( '%s %s, %s', get_the_date( 'F' ), get_the_date( 'd' ), get_the_date( 'Y' ) ) .'</time></span>';
                $output .= '<span class="post-meta-categories"><i class="fa fa-folder-o" aria-hidden="true"></i>'.$categories_list.'</span>';
            $output .= '</div><!--/.blog-post-meta-->';

            echo $output;
        }

        /**
         *  Prints HTML with tags on single post.
         */
        public function single_content_tags() {
            $display_tags_post_meta  = get_theme_mod( 'clubstiftung_enable_post_tags_blog_posts', 1 );

            $output = '';

            if( $display_tags_post_meta == 1 ) {
                if( get_the_tag_list() ) {
                    $output .= '<ul class="blog-post-tags">';
                        $output .= '<li>'. __( 'Tags: ', 'clubstiftung' ) .'</li>';
                        $output .= get_the_tag_list( '<li>','</li>, <li>','</li>' );
                    $output .= '</ul><!--/.blog-post-tags-->';
                }
            }

            echo $output;
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
    }
}
