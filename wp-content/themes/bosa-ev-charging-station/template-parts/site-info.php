<?php
/**
 * Template part for displaying site info
 *
 * @package Bosa EV Charging Station 1.0.0
 */

?>

<div class="site-info">
	<?php echo wp_kses_post( html_entity_decode( esc_html__( 'Copyright &copy; ' , 'bosa-ev-charging-station' ) ) );
		echo esc_html( date( 'Y' ) . ' ' . get_bloginfo( 'name' ) );
		echo esc_html__( '. Powered by', 'bosa-ev-charging-station' );
	?>
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bosa-ev-charging-station' ) ); ?>" target="_blank">
		<?php
			printf( esc_html__( 'WordPress', 'bosa-ev-charging-station' ) );
		?>
	</a>
</div><!-- .site-info -->