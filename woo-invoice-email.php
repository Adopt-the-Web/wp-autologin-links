<?php
  // this snippet adds a button to auto-login from unpaid invoice emails
	$user_id = $order->get_customer_id();
	$user = get_user_by( 'ID', $user_id );
	$auto_login = $user->pkg_autologin_code;	
	printf(
		wp_kses(
			/* translators: %1$s Site title, %2$s Order pay link */
			__( 'An order has been created for you on %1$s. Your invoice is below, with a link to make payment when you’re ready: %2$s', 'woocommerce' ),
			array(
				'a' => array(
					'href' => array(),
				),
			)
		),
		esc_html( get_bloginfo( 'name', 'display' ) ),
		'<br/><br/><br/><br/><a style="color: #fff;font-weight: normal;font-size: 1.5em;text-decoration: none;background: #1e85be;padding: 10px 15px;border-radius: 2px;" href="' . esc_url( $order->get_checkout_payment_url() ) . '&autologin_code=' . $auto_login . '">' . esc_html__( 'Pay for this order', 'woocommerce' ) . '</a><br/><br/><br/><br/>'
	);
	?>	
