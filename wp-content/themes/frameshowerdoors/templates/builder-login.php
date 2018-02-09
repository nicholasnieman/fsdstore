<?php
 /*
 	Template Name: Builder Login
 */
	get_header('landing');    
	      
?>

<!-- #Container Area -->
<div class="builder-login">
	<img src="<?php echo get_template_directory_uri(); ?>/images/FramelessShowerDoors_logo.gif" width="306" height="94"/>
	<h2>Login</h2> 
	<div class = "form-signin">

		<section class="aa_loginForm">
			<?php 
				global $user_login;

				// In case of a login error.
				if ( isset( $_GET['login'] ) && $_GET['login'] == 'failed' ) : ?>
					<div class="aa_error">
						<p><?php _e( 'Wrong Username or Password. Please Retry', 'woocommerce' ); ?></p>
					</div>
					<?php 
				endif;

				// If user is already logged in.
				if ( is_user_logged_in() ) : ?>

					<div class="aa_logout"> 
						<?php 
						_e( 'Hello', 'woocommerce' ); 
						echo $user_login; 
						?>

						</br>

						<?php _e( 'You are already logged in.', 'woocommerce' ); ?>
					</div>

					<a id="wp-submit" href="<?php echo wp_logout_url(); ?>" title="Logout">
						<?php _e( 'Logout', 'woocommerce' ); ?>
					</a>

                <script>
                    jQuery(document).ready(function(){
                        setTimeout(function(){ go_to_builder(); }, 3000);
                    });

                    function go_to_builder(){
                        location.assign("/builder");
                    }
                </script>

					<?php 
					// If user is not logged in.
				else: 

					// Login form arguments.
					$args = array(
						'echo'           => true,
						'redirect'       => home_url( '/builder-login/' ), 
						'form_id'        => 'loginform',
						'label_username' => __( 'Username' ),
						'label_password' => __( 'Password' ),
						'label_remember' => __( 'Remember Me' ),
						'label_log_in'   => __( 'Log In' ),
						'id_username'    => 'user_login',
						'id_password'    => 'user_pass',
						'id_remember'    => 'rememberme',
						'id_submit'      => 'wp-submit',
						'remember'       => true,
						'value_username' => NULL,
						'value_remember' => true
					); 

					// Calling the login form.
					wp_login_form( $args );

				endif;
			?> 

		</section>
	<!-- /section -->
	</div>
</div>
<?php
	get_footer('landing');
?>