<?php

if ( ! isset( $certificate ) ) {
	global $post;
	$certificate = new LP_Certificate( $post->ID );
}

if ( ! $layer = $certificate->get_layer( $layer_id ) ) {
	return;
}

$options = $layer->get_options();

?>

<div class="cert-layer-options">
    <button class="button remove-layer" type="button"
            onclick="$LP_Certificates.deleteLayer();"><?php _e( 'Delete layer', 'ecademy-toolkit' ); ?></button>

    <ul>
		<?php foreach ( $options as $option ) { ?>
            <li>
                <label><?php echo $option['title']; ?></label>
				<?php
				$type = preg_replace( '!_!', '-', $option['type'] );
				include 'layer-options/'.$type.'.php';
				?>
            </li>
		<?php } ?>
    </ul>

    <button type="button" class="button layer-center"
            data-center="center"><?php _e( 'Center', 'ecademy-toolkit' ); ?></button>
    <button type="button" class="button layer-center"
            data-center="center-h"><?php _e( 'Center Horizontal', 'ecademy-toolkit' ); ?></button>
    <button type="button" class="button layer-center"
            data-center="center-v"><?php _e( 'Center Vertical', 'ecademy-toolkit' ); ?></button>

</div>