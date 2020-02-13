<?php
/*
Plugin Name: Willios Widget Plugin
Plugin URI: http:/www.willios.com
Description: I don't like to create widget plugin
Version: 1.0.0
Author : William " Willios " Vilela
License: GPLv2
Text-domain: willios-weather
*/

if ( ! defined ('ABSPATH')) {
    die;
}

// class WilliosPlugin {

//     function __construct() {

//         add_action( 'init', array($this,'custom_post_type'));
//     }
//     function register_admin_scripts() {

//         add_action('admin_enqueue_scripts' , array($this, 'enqueue'));

//     }
//     function register_scripts() {

//         add_action('wp_enqueue_scripts' , array($this, 'enqueue'));

//     }
//     function activate() {

//         $this->custom_post_type();
//         flush_rewrite_rules();
//     }

//     function deactivate() {

//         flush_rewrite_rules();
//     }

//     function uninstall() {
        
//     }
//     function enqueue() {

//         wp_enqueue_style('cssStyle', plugins_url('/css/weathertest.css',__FILE__));
//         wp_enqueue_script('preGeo', plugins_url('/js/displayinfo.js',__FILE__));
//         wp_enqueue_script('postGeo', plugins_url('/js/usergeolocalisation.js',__FILE__));
//     }
// }

// if ( class_exists( 'WilliosPlugin')) {
//     $williosPlugin = new WilliosPlugin();
//     $williosPlugin->register_admin_scripts();
// }

// register_activation_hook( __FILE__, array($williosPlugin, 'activate'));

// register_deactivation_hook( __FILE__, array($williosPlugin, 'deactivate'));

// register_uninstall_hook( __FILE__, array($williosPlugin, 'uninstall'));


// widget_mycustomwidget

if(!class_exists("MyCustomWidget")) {

    class MyCustomWidget extends WP_Widget{

        public function __construct() {
            parent::WP_Widget(false,"I like Snow");
        }

        // UI for admin section 
        public function form($instance) {
            
            if(!empty($instance)) {
                $title = $instance['title'];
                // $description = $instance['description'];
                $type = $instance['type'];
            } else {
                $title = '';
                // $description = '';
                $type = '';
            }

            ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Default city:</label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $title; ?>"/>
        </p>
        <!-- <p>
            <label for="<?php echo $this->get_field_id('description'); ?>">Description:</label>
            <textarea name="<?php echo $this->get_field_name('description'); ?>" id="<?php echo $this->get_field_id('description'); ?>"><?php echo $description; ?></textarea>
        </p> -->
        <p>
            <label for="<?php echo $this->get_field_id("type"); ?>">Unit</label>
            <select id="<?php echo $this->get_field_id("type"); ?>" name="<?php echo $this->get_field_name("type"); ?>">
                <option value="select">Select type</option>
                <?php
                    $arraydata = ["Celsius","fahrenheit","Auto"];
                foreach($arraydata as $data) {
                    $selected = "";
                    if ($data == $type) {
                        $selected = "selected";
                    }
                    ?>
                <option value="<?php echo $data?>"<?php echo $selected; ?>><?php echo $data?></option>
                    <?php

                }
                ?>
            </select>
        </p>
        <?php
        }

        public function update($new_instance, $old_instance) {

            $instance = $old_instance;
            $instance['title'] = $new_instance['title'];
            // $instance['description'] = $new_instance['description'];
            $instance['type'] = $new_instance['type'];
            return $instance;
        }

        // UI for frontend
        public function widget($args, $instance) {
            require('APItest.php');
            // extract($args);
            // echo $before_widget; // <aside>
            // echo $before_title; // <h2>
            // // echo "<h1>".$instance['title']."</h1>";
            // echo $instance['title'];
            // echo $after_title; // </h2>
            // // echo $instance['description'];
            // echo "<p>".$instance['type']."</p>";
            // echo $after_widget; // </aside>
        }
    }
    
    function register_my_widget() {

        register_widget("MyCustomWidget");

    }

    add_action("widgets_init","register_my_widget");
}