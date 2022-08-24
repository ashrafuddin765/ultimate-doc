<?php

namespace UltimateDoc;

use ErrorException;

if ( !class_exists( 'UltimateDoc\License' ) ) {

    /**
     * License Manager for WooCommerce SDK to let communication with the API
     *
     * Defines basic functionality to connect with the API
     *
     * @since      1.0.0
     * @package    Pahp/SDK
     * @subpackage License
     * @author     Pablo Hernández (OtakuPahp) <pablo@otakupahp.com>
     */
    class License {

        /**
         * @since 1.0.0
         * @access private
         * @var string
         */
        private $plugin_name;

        /**
         * @since 1.0.0
         * @access private
         * @var string $api_url
         */
        private $api_url;

        /**
         * @since 1.0.0
         * @access private
         * @var string $customer_key
         */
        private $customer_key;

        /**
         * @since 1.0.0
         * @access private
         * @var string $customer_secret
         */
        private $customer_secret;

        /**
         * @since 1.0.0
         * @access private
         * @var array $valid_status
         */
        private $valid_status;

        /**
         * @since 1.0.0
         * @access private
         * @var array
         */
        private $product_ids;

        /**
         * @since 1.0.0
         * @access private
         * @var string
         */
        private $stored_license;

        /**
         * @since 1.0.0
         * @access private
         * @var string
         */
        private $valid_object;

        /**
         * @since 1.0.0
         * @access private
         * @var int
         */
        private $ttl;

        /**
         * License constructor
         *
         * @param string $plugin_name
         * @param string $server_url
         * @param string $customer_key
         * @param string $customer_secret
         * @param mixed $product_ids
         * @param array $license_options
         * @param string $valid_object
         * @param int $ttl
         * @since 1.0.0
         *
         */
        public function __construct(
            $plugin_name,
            $server_url,
            $customer_key,
            $customer_secret,
            $product_ids,
            $license_options,
            $valid_object,
            $ttl
        ) {
            add_action( 'admin_menu', [$this, 'create_license_menu'] );
            # Set plugin name for internationalization
            $this->plugin_name = $plugin_name;

            # Connection variables
            $this->api_url         = "{$server_url}/wp-json/lmfwc/v2/";
            $this->customer_key    = $customer_key;
            $this->customer_secret = $customer_secret;

            # Product IDs
            $this->product_ids = is_array( $product_ids ) ? $product_ids : [$product_ids];

            # Get license key stored in the database
            $this->stored_license = null;
            if ( isset( $license_options['settings_key'] ) ) {
                // Check if WP Settings are used to store the license key
                $license = get_option( $license_options['settings_key'] );
                if ( $license !== false && isset( $license[$license_options['option_key']] ) ) {
                    $this->stored_license = $license[$license_options['option_key']];
                }
            } elseif ( isset( $license_options['option_key'] ) ) {
                // If no WP Settings are used to store the license key
                $this->stored_license = get_option( $license_options['option_key'] );
            }

            # License variables
            $this->valid_object = $valid_object;
            $this->ttl          = $ttl;
            $this->valid_status = get_option( $valid_object, [] );

        }

        public static function init(
            $plugin_name,
            $server_url,
            $customer_key,
            $customer_secret,
            $product_ids,
            $license_options,
            $valid_object,
            $ttl ) {
            return new self( $plugin_name,
                $server_url,
                $customer_key,
                $customer_secret,
                $product_ids,
                $license_options,
                $valid_object,
                $ttl 
            );
        }
        /**
         * HTTP Request call
         *
         * @param string $endpoint
         * @param string $method
         * @param string $args
         *
         * @return array
         * @throws ErrorException
         * @since 1.0.0
         *
         */
        private function call( $endpoint, $method = 'GET', $args = '' ) {

            # Populate the correct endpoint for the API request
            $client_url =  urlencode(home_url());
            $url = "{$this->api_url}{$endpoint}?consumer_key={$this->customer_key}&consumer_secret={$this->customer_secret}&url={$client_url}";

            # Create header
            $headers = [
                'Accept'       => 'application/json',
                'Content-Type' => 'application/json; charset=UTF-8',
            ];

            # Initialize wp_args
            $wp_args = [
                'headers' => $headers,
                'method'  => $method,
                'timeout' => 5,
            ];

            # Populate the args for use in the wp_remote_request call
            if ( !empty( $args ) ) {
                $wp_args['body'] = $args;
            }
            

            # Make the call and store the response in $res
            $res = wp_remote_request( $url, $wp_args );

            # Check for success
            if ( !is_wp_error( $res ) && ( $res['response']['code'] == 200 || $res['response']['code'] == 201 ) ) {
                return json_decode( $res['body'], TRUE );
            } elseif ( is_wp_error( $res ) ) {
                return (array) $res;
            } else {
                $response = json_decode( $res['body'], TRUE );
                return $response;
            }
        }

        /**
         * Activate license
         *
         * @param $license_key
         * @return array|null
         * @throws ErrorException
         *
         * @since 1.0.0
         *
         */
        public function activate( $license_key ) {
            $license = null;
            if ( !empty( $license_key ) ) {
                $response = $this->call( "licenses/activate/{$license_key}" );
                if ( is_array($response) && isset( $response['success'] ) && $response['success'] === true ) {
                    $license                           = $response['data'];
                    $this->valid_status['is_valid']    = true;
                    $this->valid_status['license_key'] = $license_key;
                    update_option( $this->valid_object, $this->valid_status );

                } else {

                    $this->valid_status['is_valid']       = false;
                    $this->valid_status['error']          = $response['message'];
                    $this->valid_status['nextValidation'] = time();
                    $this->valid_status['license_key']    = $license_key;
                    // update_option( $this->valid_object, $this->valid_status );
                    // throw new ErrorException($response['message']);
                    return $response['message'];
                }
            }

            return $license;
        }

        /**
         * Deactivate license
         *
         * @param $license_key
         * @throws ErrorException
         * @since 1.0.0
         */
        public function deactivate( $license_key ) {
            if ( !empty( $license_key ) ) {
                $this->call( "licenses/deactivate/{$license_key}" );
            }
            $this->valid_status['is_valid']    = false;
            $this->valid_status['license_key'] = '';
            delete_option( $this->valid_object );

        }

        /**
         * Verify if the license is valid
         *
         * @param $license_key
         * @return array
         *
         * @since 1.0.0
         *
         */
        public function validate_status( $license_key ) {

            # Generic valid result
            $valid_result = [
                'is_valid' => false,
                'error'    => __( 'Invalid License Keys', $this->plugin_name ),
            ];

            $current_time = time();
            $ttl          = 0;

            # Use validation object if not force to validate
            if ( empty( $license_key ) && isset( $this->valid_status['nextValidation'] ) && $this->valid_status['nextValidation'] > $current_time ) {
                $valid_result['is_valid'] = $this->valid_status['is_valid'];
                $valid_result['error']    = $this->valid_status['error'];
            } else {

                # If no license send, look for the one stored in database
                if ( empty( $license_key ) ) {
                    $license_key = $this->stored_license;
                }

                # If there is no license
                if ( empty( $license_key ) ) {
                    $valid_result['error'] = __( 'A license has not been submitted', $this->plugin_name );
                } else {
                    try {
                        $response = $this->call( "licenses/{$license_key}" );
                        if (is_array($response) && isset( $response['success'] ) && $response['success'] === true ) {
                            # Calculate license expiration date
                            $this->valid_status['valid_until'] = ( $response['data']['expiresAt'] !== null ) ? strtotime( $response['data']['expiresAt'] ) : null;

                            # If license key does not belongs to the Product id.
                            # if not Product id is defined, then this validation is omitted
                            if ( !empty( $this->product_ids ) && !in_array( $response['data']['productId'], $this->product_ids ) ) {
                                $valid_result['error'] = __( 'The license entered does not belong to this plugin', $this->plugin_name );
                            }
                            # Check that the license has not reached the expiration date
                            # if no expiration date is set, omit this
                            elseif ( $this->valid_status['valid_until'] !== null && $this->valid_status['valid_until'] < $current_time ) {
                                $valid_result['error'] = __( 'The license expired', $this->plugin_name );
                            } else {
                                $valid_result['is_valid'] = true;
                                $valid_result['error']    = '';
                                $ttl                      = $this->ttl;
                            }
                            
                        }elseif(is_array($response) && 'fdl_rest_domain_error' == $response['code']){
                            $valid_result['error'] = __( $response['message'], $this->plugin_name );
                        }
                        
                    } catch ( ErrorException $exception ) {
                        $valid_result['error'] = $exception->getMessage();
                    }
                }

                # Update validation object
                $this->valid_status['nextValidation'] = strtotime( date( 'Y-m-d' ) . "+ {$ttl} days" );
                $this->valid_status['is_valid']       = $valid_result['is_valid'];
                $this->valid_status['error']          = $valid_result['error'];
                update_option( $this->valid_object, $this->valid_status );

            }

            return $valid_result;

        }

        /**
         * Returns time of license validity
         *
         * @return int|null
         * @since 1.0.0
         */
        public function valid_until() {
            return isset( $this->valid_status['valid_until'] ) ? $this->valid_status['valid_until'] : null;
        }

        // create custom plugin settings menu
        function create_license_menu( $parent_menu = '' ) {
            if ( !empty( $parent_menu ) ) {
                add_submenu_page( $parent_menu, __( 'Finest License', ultimate-doc-pro' ), __( 'Finest License', ultimate-doc-pro' ), 'manage_options', 'ultd--license', [$this, 'license_settings_page'] );
            } else {
                // create new top-level menu
                // add_menu_page( $this->plugin_name, 'Finest License', 'administrator', __FILE__, [$this, 'license_settings_page'] );

            }
        }

        function license_settings_page() {
            $license = isset( $this->valid_status['license_key'] ) ? $this->valid_status['license_key'] : '';

            if ( isset( $_POST['activate'] ) && isset( $_POST[$this->valid_object] ) ) {
                $license = trim( sanitize_text_field( $_POST[$this->valid_object] ) );
                $this->activate( $license );

            }

            if ( isset( $_POST['deactivate'] ) && isset( $_POST[$this->valid_object] ) ) {

                $license = trim( sanitize_text_field( $_POST[$this->valid_object] ) );
                $this->deactivate( $license );
                $license = '';
            }

            ?>
            <div class="wrap">

            <h1><?php esc_html_e( $this->plugin_name, ultimate-doc-pro' )?></h1>
            <?php if ( $this->is_activated() ): ?>
                <strong style='color:green'><?php echo esc_html_e( 'License Activated', $this->plugin_name ) ?></strong>
                <?php else: ?>
                    <strong style='color:red'><?php esc_html_e( $this->validate_status( $license )['error'], $this->plugin_name )?></strong>
            <?php endif;?>
            <form method="post" action="">
                    <input type="text" name="<?php echo esc_attr( $this->valid_object ) ?>" value="<?php echo esc_attr( $license ); ?>" required />
                    <?php if ( !$this->is_activated() ): ?>
                    <button type="submit" name="activate"><?php esc_html_e( 'Activate', ultimate-doc-pro' )?></button>
                    <?php else: ?>
                    <button type="submit" name="deactivate"><?php esc_html_e( 'Deactivate', ultimate-doc-pro' )?></button>
                    <?php endif;?>

            </form>
            </div>
            <?php

        }

        function is_activated() {
            if ( !isset( $this->valid_status['license_key'] ) ) {
                return false;
            }
            return $this->validate_status( $this->valid_status['license_key'] )['is_valid'];
        }

    }

}
