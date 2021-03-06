<?php
class clubstiftung_Widget_Project extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct( 'clubstiftung_project', __( '[clubstiftung] - Project', 'clubstiftung' ), array( 'description' => __( 'Add this widget in "Front page - Projects Sidebar".', 'clubstiftung' ), ) );

        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
    }

    /**
     *  Enqueue Scripts
     */
    public function enqueue_scripts() {
        wp_enqueue_media();
        wp_enqueue_script( 'clubstiftung-widget-upload-image', get_template_directory_uri() . '/layout/js/widget-upload-image/widget-upload-image.js', false, '1.0', true);
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        $title = ( !empty( $instance['title'] ) ? esc_html( $instance['title'] ) : '' );
        $image = !empty( $instance['image'] ) ? esc_url( $instance['image'] ) : '';
        $url = !empty( $instance['url'] ) ? sanitize_text_field( $instance['url'] ) : esc_url( '#' );
        $content = !empty( $instance['content'] ) ? sanitize_text_field( $instance['content'] ) : '';

        $image_id = clubstiftung_get_image_id_from_image_url( $image );
        $get_attachment_image_src = wp_get_attachment_image_src( $image_id, 'clubstiftung-front-page-projects' );

        $output = '<figure><a href="'. $url .'" title="'. $title .'" class="project">';
        $output .= '<img src="/wp-includes/images/blank.gif" style="background-image: url(' . ( $image_id ? esc_url( $get_attachment_image_src[0] ) : $image ) . ');"></a>';
        $output .= '<span class="project-overlay"></span><figcaption><div class="info"><h2 class="project-title">'.$title.'</h2><p>'.$content.'</p></div><a href="'. $url .'" title="'. $title .'" class="project">';
        $output .= '<i class="bouncing fa-2x fa fa-arrow-circle-right" aria-hidden="true"></i></a></figcaption>';
        $output .= '</figure>';


        echo $output;

        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = !empty( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : __( '[clubstiftung] - Project', 'clubstiftung' );
        $image = !empty( $instance['image'] ) ? esc_url( $instance['image'] ) : '';
        $url = !empty( $instance['url'] ) ? sanitize_text_field( $instance['url'] ) : esc_url( '#' );
        $content = !empty( $instance['content'] ) ? sanitize_text_field( $instance['content'] ) : __( 'Description', 'clubstiftung' );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'clubstiftung' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e( 'Content:', 'clubstiftung' ); ?></label>
            <textarea class="widefat"  cols="20" id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>"><?php echo esc_textarea( $content ); ?></textarea></p>

        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:', 'clubstiftung' ); ?></label>
            <input type="text" class="widefat custom_media_url_<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" value="<?php if( !empty( $instance['image'] ) ): echo $instance['image']; else: get_template_directory_uri() . '/layout/images/front-page/front-page-project-1.jpg'; endif; ?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button" id="custom_media_button_service" data-fieldid="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php _e( 'Upload Image','clubstiftung' ); ?>" style="margin-top: 5px;">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'URL:', 'clubstiftung' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>">
        </p>
        <?php 
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? esc_html( $new_instance['title'] ) : '';
        $instance['image'] = !empty( $new_instance['image'] ) ? esc_url( $new_instance['image'] ) : '';
        $instance['url'] = ( !empty( $new_instance['url'] ) ? esc_url( $new_instance['url'] ) : '' );
        $instance['content'] = ( !empty( $new_instance['content'] ) ? esc_textarea( $new_instance['content'] ) : '' );

        return $instance;
    }

}

function clubstiftung_register_widget_project () {
    register_widget( 'clubstiftung_Widget_Project' );
}
add_action( 'widgets_init', 'clubstiftung_register_widget_project' );
