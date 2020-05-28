<?php
function xx_custom_roles() {
    $result = add_role(
	    'coach',
	    __( 'Coach', 'coaches' ),
	    array(
	        'read'         => true,
	        'edit_posts'   => true,
	        'delete_posts' => false,
	    )
	);
}
add_action( 'init', 'xx_custom_roles' );