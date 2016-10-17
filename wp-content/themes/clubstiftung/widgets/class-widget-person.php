<?php
class clubstiftung_Widget_Person extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct( 'clubstiftung_person', __( '[clubstiftung] - Person', 'clubstiftung' ), array( 'description' => __( 'Add this widget in "Front page - Team Sidebar".', 'clubstiftung' ), ) );

        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ), 9999 );
    }

    /**
     *  Enqueue Scripts
     */
    public function enqueue_scripts() {
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_script( 'underscore' );
        wp_enqueue_media();
        wp_enqueue_script( 'clubstiftung-widget-upload-image', get_template_directory_uri() . '/layout/js/widget-upload-image/widget-upload-image.min.js', false, '1.0', true);
    }

    /**
     * Print scripts.
     *
     * @since 1.0
     */
    public function print_scripts() {
        ?>
        <script>
            ( function( $ ){
                function initColorPicker( widget ) {
                    widget.find( '.color-picker' ).wpColorPicker( {
                        change: _.throttle( function() { // For Customizer
                            $(this).trigger( 'change' );
                        }, 3000 )
                    });
                }

                function onFormUpdate( event, widget ) {
                    initColorPicker( widget );
                }

                $( document ).on( 'widget-added widget-updated', onFormUpdate );

                $( document ).ready( function() {
                    $( '#widgets-right .widget:has(.color-picker)' ).each( function () {
                        initColorPicker( $( this ) );
                    } );
                } );
            }( jQuery ) );
        </script>
        <?php
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
        $position = ( !empty( $instance['position'] ) ? esc_html( $instance['position'] ) : '' );
        $entry = ( !empty( $instance['entry'] ) ? esc_html( $instance['entry'] ) : '' );
        $phone_url = !empty( $instance['phone_url'] ) ? sanitize_text_field( $instance['phone_url'] ) : '';
        $mail_url = !empty( $instance['mail_url'] ) ? is_email( $instance['mail_url'] ) : '';
        $color = ( !empty( $instance['color'] ) ? esc_attr( $instance['color'] ) : '#000000' );

        $image_id = clubstiftung_get_image_id_from_image_url( $image );
        $get_attachment_image_src = wp_get_attachment_image_src( $image_id, 'clubstiftung-front-page-person' );

        $output = '';

        $output .= '<div class="fader person clearfix" data-person-color="'. $color .'">';
            $output .= '<div class="person-image">';
                $output .= ( $image_id ? '<img src="'. $get_attachment_image_src[0] .'" alt="'. $title .'" title="'. $title .'" />' : ( $image ? '<img src="'. get_template_directory_uri() . $image .'" alt="'. $title .'" title="'. $title .'" />' : '' ) );
            $output .= '</div><!--/.person-image-->';
            $output .= '<div class="person-content">';
                $output .= '<h4>'. $title .'</h4>';
                $output .= '<h5>'. $position .'</h5>';
                $output .= '<p>'. $entry .'</p>';
                $output .= '<ul class="person-content-social clearfix">';
                    $output .= ( $phone_url ) ? '<li><i class="fa fa-phone"></i><span>'.$phone_url.'</span></li>' : '';
                    $output .= ( $mail_url ) ? '<li><a href="mailto:'. $mail_url .'" title="'. __( 'mail', 'clubstiftung' ) .'"><i class="fa fa-envelope" target="_blank" rel="nofollow"></i><span>'.$mail_url.'</span></a></li>' : '';
                $output .= '</ul><!--/.person-content-social.clearfix-->';
            $output .= '</div><!--/.person-content-->';
        $output .= '</div><!--/.person.clearfix-->';

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
        $title = ! empty( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : __( '[clubstiftung] - Person', 'clubstiftung' );
        $image = !empty( $instance['image'] ) ? esc_url( $instance['image'] ) : esc_url( get_template_directory_uri() . '/layout/images/front-page/front-page-project-1.jpg' );
        $position = ! empty( $instance['position'] ) ? sanitize_text_field( $instance['position'] ) : '';
        $entry = ! empty( $instance['entry'] ) ? sanitize_text_field( $instance['entry'] ) : '';
        $phone_url = !empty( $instance['phone_url'] ) ? sanitize_text_field( $instance['phone_url'] ) : '';
        $mail_url = !empty( $instance['mail_url'] ) ? is_email( $instance['mail_url'] ) : '';
        $color = !empty( $instance['color'] ) ? esc_attr( $instance['color'] ) : '';
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'clubstiftung' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:', 'clubstiftung' ); ?></label>
            <input type="text" class="widefat custom_media_url_<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" value="<?php if( !empty( $instance['image'] ) ): echo $instance['image']; else: get_template_directory_uri() . '/layout/images/front-page/front-page-project-1.jpg'; endif; ?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button" id="custom_media_button_service" data-fieldid="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php _e( 'Upload Image','clubstiftung' ); ?>" style="margin-top: 5px;">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'position' ); ?>"><?php _e( 'Position:', 'clubstiftung' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'position' ); ?>" name="<?php echo $this->get_field_name( 'position' ); ?>" type="text" value="<?php echo esc_attr( $position ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'entry' ); ?>"><?php _e( 'Entry:', 'clubstiftung' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'entry' ); ?>" name="<?php echo $this->get_field_name( 'entry' ); ?>" type="text" value="<?php echo esc_attr( $entry ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'phone_url' ); ?>"><?php _e( 'phone', 'clubstiftung' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'phone_url' ); ?>" name="<?php echo $this->get_field_name( 'phone_url' ); ?>" type="text" value="<?php echo esc_attr( $phone_url ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'mail_url' ); ?>"><?php _e( 'mail', 'clubstiftung' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'mail_url' ); ?>" name="<?php echo $this->get_field_name( 'mail_url' ); ?>" type="email" value="<?php echo esc_attr( $mail_url ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'color' ); ?>"><?php _e( 'Color:', 'clubstiftung' ); ?></label><br>
            <input type="text" name="<?php echo $this->get_field_name( 'color' ); ?>" class="color-picker" id="<?php echo $this->get_field_id( 'color' ); ?>" value="<?php echo $color; ?>" data-default-color="#000000" />
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
        $instance['position'] = ( !empty( $new_instance['position'] ) ) ? esc_html( $new_instance['position'] ) : '';
        $instance['entry'] = ( !empty( $new_instance['entry'] ) ) ? esc_html( $new_instance['entry'] ) : '';
        $instance['phone_url'] = ( !empty( $new_instance['phone_url'] ) ? sanitize_text_field( $new_instance['phone_url'] ) : '' );
        $instance['mail_url'] = ( !empty( $new_instance['mail_url'] ) ? is_email( $new_instance['mail_url'] ) : '' );
        $instance['color'] = ( !empty( $new_instance['color'] ) ? esc_html( $new_instance['color'] ) : '' );

        return $instance;
    }

}

function clubstiftung_register_widget_person () {
    register_widget( 'clubstiftung_Widget_Person' );
}
add_action( 'widgets_init', 'clubstiftung_register_widget_person' );
