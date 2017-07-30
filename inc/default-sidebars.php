<?php
/**
 * Sets up default widgets in sidebars and footer.
 *
 * @package Positor
 */

add_action( 'widgets_init', 'positor_default_widgets' );

/**
 * Sets up default widgets in sidebars and footer.
 */
function positor_default_widgets() {
	// Register our own widget.
	register_widget( 'T5_Demo_Widget' );

	// We don't want to undo user changes, so we look for changes first.
	$active_widgets = get_option( 'sidebars_widgets' );

	if ( ! empty( $active_widgets['footer-1'] )
		|| ! empty( $active_widgets['footer-2'] )
		|| ! empty( $active_widgets['footer-3'] )
	) {
		return;
	}

    // The sidebars are empty, let's put something into them.
    // How about a RSS widget and two instances of our demo widget?

    // Note that widgets are numbered. We need a counter:
    $counter = 1;

    // Add a 'demo' widget to the top sidebar …
    $active_widgets[ $sidebars['a'] ][0] = 't5_demo_widget-' . $counter;
    // … and write some text into it:
    $demo_widget_content[ $counter ] = array ( 'text' => "This works!\n\nAmazing!" );
    #update_option( 'widget_t5_demo_widget', $demo_widget_content );

    $counter++;

    // That was easy. Now a RSS widget. More fields, more fun!
    $active_widgets[ $sidebars['a'] ][] = 'rss-' . $counter;
    // The latest 15 questions from WordPress Stack Exchange.
    $rss_content[ $counter ] = array (
        'title'        => 'WordPress Stack Exchange',
        'url'          => 'http://wordpress.stackexchange.com/feeds',
        'link'         => 'http://wordpress.stackexchange.com/questions',
        'items'        => 15,
        'show_summary' => 0,
        'show_author'  => 1,
        'show_date'    => 1,
    );
    update_option( 'widget_rss', $rss_content );

    $counter++;

    // Okay, now to our second sidebar. We make it short.
    $active_widgets[ $sidebars['b'] ][] = 't5_demo_widget-' . $counter;
    #$demo_widget_content = get_option( 'widget_t5_demo_widget', array() );
    $demo_widget_content[ $counter ] = array ( 'text' => 'The second instance of our amazing demo widget.' );
    update_option( 'widget_t5_demo_widget', $demo_widget_content );

    // Now save the $active_widgets array.
    update_option( 'sidebars_widgets', $active_widgets );
}

/**
 * Super simple widget.
 */
class T5_Demo_Widget extends WP_Widget
{
    public function __construct()
    {                      // id_base        ,  visible name
        parent::__construct( 't5_demo_widget', 'T5 Demo Widget' );
    }

    public function widget( $args, $instance )
    {
        echo $args['before_widget'], wpautop( $instance['text'] ), $args['after_widget'];
    }

    public function form( $instance )
    {
        $text = isset ( $instance['text'] )
            ? esc_textarea( $instance['text'] ) : '';
        printf(
            '<textarea class="widefat" rows="7" cols="20" id="%1$s" name="%2$s">%3$s</textarea>',
            $this->get_field_id( 'text' ),
            $this->get_field_name( 'text' ),
            $text
        );
    }
}