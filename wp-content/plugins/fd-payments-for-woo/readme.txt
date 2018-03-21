=== First Data Payeezy for WooCommerce ===
Contributors: cardpaysolutions
Tags: first data, payeezy, woocommerce, woocommerce first data, woocommerce payeezy, global gateway e4, linkpoint, payment gateway, first data payment gateway, woocommerce payment, woocommerce subscription payment, woocommerc pre order payment
Requires at least: 4.0
Tested up to: 4.5
Stable tag: 1.0.1
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

First Data Payeezy for WooCommerce allows merchants to accept credit cards with support for stored card profiles, subscriptions, and pre-orders.

== Description ==

The First Data Payeezy for WooCommerce plugin adds Payeezy as a payment method to your WooCommerce store. Payeezy makes accepting credit cards simple. 
Accept all major credit cards including Visa, MasterCard, American Express, Discover, JCB, and Diners Club. The First Data Payeezy plugin allows your logged in 
customers to securely store and re-use credit card profiles to speed up the checkout process. We also support all Subscription and Pre-Order features. 

= Features =

* Supports both "Authorize Only" and "Authorize & Capture" transaction types
* Optional automatic capture of "Authorize Only" transactions when order status is changed to "Completed"
* Supports WooCommerce 2.2+ automatic refunds
* Customers can save credit card information to use for future orders
* Customers can Add, Edit, or Delete saved credit cards from the "My Account" menu
* Stored credit cards are securely tokenized using the First Data TransArmor Solution
* Supports all WooCommerce Subscriptions 2.x features
* Supports WooCommerce Pre-Orders
* Uses the WooCommerce built in checkout so the customer never leaves your website
* AVS and CVC responses are shown on Order Detail page to assist with fraud prevention

= Requirements =

A First Data Payeezy Gateway and Merchant Account is required. Your First Data merchant account must have TransArmor
enabled for the stored credit card, subscription, and pre-orders features to work.

You can apply for a properly configured First Data Payeezy account through the link below. There are not set-up fees and we
offer several flexible pricing plans including one with no monthly fee.

[Click Here to Sign Up!](http://www.cardpaysolutions.com/woocommerce?pid=83cf9aa647bc5b4e)

== Installation ==

= Minimum Requirements =

* WordPress 3.8 or greater
* WooCommerce 2.2 or greater
* PHP version 5.2.4 or greater
* MySQL version 5.0 or greater

= Automatic installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don’t need to leave your web browser. To do an automatic install,
follow these directions:

1. Log in to your WordPress dashboard
1. Navigate to the Plugins menu and click Add New
1. Search for "First Data Payeezy for WooCommerce" and click "Install Now"
1. Activate `First Data Payeezy for WooCommerce` from the Plugins page
1. Complete the configuration by navigating to WooCommmerce -> Settings -> Checkout -> First Data Payeezy

= Manual installation =

1. Download and unzip the First Data Payeezy for WooCommerce plugin
1. Upload the plugin folder to the `/wp-content/plugins/` directory
1. Activate `First Data Payeezy for WooCommerce` from the Plugins page
1. Complete the configuration by navigating to WooCommmerce -> Settings -> Checkout -> First Data Payeezy

== Frequently Asked Questions ==

= How do I obtain a First Data Payeezy gateway and merchant account? =

[Click Here](http://www.cardpaysolutions.com/woocommerce?pid=83cf9aa647bc5b4e) to register for a low cost account.

= How do I get my Merchant Token? =

Call sales support at (866) 502-8910 and we can assist you.

= How do I test the plugin before going live? =

The plugin has a built-in test mode. Navigate to the configuration page at WooCommerce -> Settings -> Checkout -> First Data Payeezy
and check the "Use Sandbox" box and then click the "Save Changes" button. The Merchant Token field is
not required in sandbox mode and can be left blank.

The following test cards can be used in Sandbox Mode with any future expiration date:

* Visa 4111111111111111
* MasterCard 5424180279791732
* American Express 373953192351004
* Discover 6510000000001248

= Can I use the plugin without the stored credit card features? =

Yes. Navigate to the configuration page at WooCommerce -> Settings -> Checkout -> First Data Payeezy and uncheck the "Allow Stored Cards"
box and save your changes. Customers will then not see the option to save cards for future use in the checkout and will not see any stored credit
card information on the My Account page.

= What is the difference between the "Authorize Only" and "Authorize & Capture" transaction types? =

The Authorize Only transaction type reserves the amount of the transaction on the customer's credit card but does not start the process of
transferring the funds to your bank account until a separate "Capture" request is sent to the gateway. The capture request can be 
automatically sent when the order status is changed to "Completed" by enabling the "Auto Capture" feature in the configuration or by
logging into your Payeezy gateway account and manually requesting the capture from there.

The Authorize & Capture transaction type authorizes the transaction and then automatically captures it at your designated batch cut-off
time each day. This starts the process of moving the funds to your bank account.

== Screenshots ==

1. Settings
2. Checkout new card
3. Stored card checkout
4. Customer credit card management
5. Admin order management

== Changelog ==

= 1.0.1 =

* Fixed avs and cvv bug
* Tested compatibility with Wordpress 4.4
* Tested compatibility with WooCommerce 2.5

= 1.0.0 =

* Initial release

== Upgrade Notice ==

= 1.0.0 =
This is the initial release
