<?php

class LateralView extends WP_Widget {

    /** 
     * constructor 
    */
    function __construct() {
		parent::__construct( 'LateralView', "Vista Lateral de herramientas", $widget_options = array(), $control_options = array()
		);
		
		add_action( 'widgets_init', array( $this, 'register_LateralView' ) );
    }
	
	// register Foo_Widget widget
	function register_LateralView() {
	    register_widget( 'LateralView' );
	}

    /** 
     * @see WP_Widget::widget 
    */
    public function widget( $args, $instance ) {
        extract( $args );
		global $wpdb;
		
      	$title = apply_filters( 'widget_title', $instance['title'] );
		$component = ! empty ( $instance['component'] ) ? $instance['component'] : '';
		$ramdom = ! empty( $instance['ramdom'] ) ? $instance['ramdom'] : '';
		$images = ! empty ( $instance['images'] ) ? $instance['images'] : ''; 
		
        echo $before_widget;
        
        if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
        }
		
		if ( ! empty( $component ) && $component == 1 ) { echo "<p>component</p>"; }
		if ( ! empty( $ramdom ) && $ramdom == 1 ) { echo "<p>ramdom</p>"; }
		if ( ! empty( $images ) && $images == 1 ) { echo "<p>Mostrar imagenes</p>"; }

		echo $after_widget;
    }
	
    /** 
     * @see WP_Widget::form 
    */
    public function form( $instance ) {

    	$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$component = isset( $instance['component'] ) ? esc_attr( $instance['component'] ) : '';
		$ramdom = isset( $instance['ramdom'] ) ? esc_attr( $instance['ramdom']) : '';
		$images = isset( $instance['images'] ) ? esc_attr( $instance['images'] ) : '';
        ?>
		<p>
        	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo "Titulo"; ?></label> 
          	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
         	<input id="<?php echo $this->get_field_id( 'ramdom' ); ?>" name="<?php echo $this->get_field_name( 'ramdom' ); ?>" type="checkbox" value="1" <?php checked( '1', $ramdom ); ?>/>
          	<label for="<?php echo $this->get_field_id( 'ramdom' ); ?>"><?php echo "Mostrar por tipo"; ?></label> 
        </p>
		<p>
          	<input id="<?php echo $this->get_field_id( 'component' ); ?>" name="<?php echo $this->get_field_name( 'component' ); ?>" type="checkbox" value="1" <?php checked( '1', $component ); ?>/>
          	<label for="<?php echo $this->get_field_id( 'component' ); ?>"><?php echo "Orden aleatorio"; ?></label> 
        </p>
        <p>
        	<input id="<?php echo $this->get_field_id( 'images' ); ?>" name="<?php echo $this->get_field_name( 'images' ); ?>" type="checkbox" value="1" <?php checked( '1', $images ); ?>/>
        	<label for="<?php echo $this->get_field_id( 'images' ); ?>"><?php echo "Mostrar portadas"; ?></label>
        </p>
        <?php 
    }

	/** 
     * @see WP_Widget::update 
    */
    public function update( $new_instance, $old_instance ) {
    	
		$instance = $old_instance;
		$instance['title'] = isset( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['component'] = isset( $new_instance['component'] ) ? strip_tags( $new_instance['component'] ) : '';
		$instance['ramdom'] = isset( $new_instance['ramdom'] ) ? strip_tags( $new_instance['ramdom'] ) : '';
		$instance['images'] = isset( $new_instance['images'] ) ? strip_tags( $new_instance['images'] ) : '';
		
		return $instance;
    }

} // END of Class LateralView

?>
