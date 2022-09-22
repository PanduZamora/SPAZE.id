<?php

defined( 'ABSPATH' ) || die();


function dnxte_svg_icon() {
    return 'data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgZGF0YS1uYW1lPSJMYXllciAxIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNTAgMTUwIj48cGF0aCBkPSJNMTAyLjksMjIuMzhIMTcuNDJWLjE1SDEwMi45QTExLjExLDExLjExLDAsMCwxLDExNCwxMS4yNmgwQTExLjEyLDExLjEyLDAsMCwxLDEwMi45LDIyLjM4WiIgc3R5bGU9ImZpbGw6I2EwYTVhYSIvPjxwYXRoIGQ9Ik0xMDIuOSwxNDkuODVIMTcuNDJWMTI3LjYySDEwMi45QTExLjEyLDExLjEyLDAsMCwxLDExNCwxMzguNzRoMEExMS4xMSwxMS4xMSwwLDAsMSwxMDIuOSwxNDkuODVaIiBzdHlsZT0iZmlsbDojYTBhNWFhIi8+PHBhdGggZD0iTTc4LjQ5LDg2LjEySDE3LjQyVjYzLjg4SDc4LjQ5QTExLjEyLDExLjEyLDAsMCwxLDg5LjYxLDc1aDBBMTEuMTIsMTEuMTIsMCwwLDEsNzguNDksODYuMTJaIiBzdHlsZT0iZmlsbDojYTBhNWFhIi8+PHBhdGggZD0iTTg3LjY0LDMwLjA2SDQ0LjRWNTIuMjlIODcuNjRhMjIuNzEsMjIuNzEsMCwwLDEsMCw0NS40Mkg0NC40djIyLjIzSDg3LjY0YTQ0Ljk0LDQ0Ljk0LDAsMSwwLDAtODkuODhaIiBzdHlsZT0iZmlsbDojYTBhNWFhIi8+PC9zdmc+';
}

// Masonry Gallary Image
add_action('wp_ajax_dnxte_get_images', 'dnxte_get_images');

function dnxte_get_images() {
    wp_verify_nonce(dnxte_get_images);
    $images_id = isset($_POST['images_id']) ? sanitize_text_field(wp_unslash( $_POST['images_id'] )) : '';
    
    $array_of_images_id = explode(",", $images_id);

    $array = array();

    for ($i = 0; $i < count($array_of_images_id); $i++) {
        $array_chunk = array(
            wp_get_attachment_url($array_of_images_id[$i]), 
            get_the_title( $array_of_images_id[$i] ), 
            get_the_excerpt( $array_of_images_id[$i] )
        );

        array_push($array, $array_chunk);
    }
    
    wp_send_json($array);
}

// Json File Uploading Permission
add_filter('image_downsize', 'dnxte_image_downsize', 10, 3);

function dnxte_image_downsize($out, $id) {
    $image_url = wp_get_attachment_url($id);
    $file_ext = pathinfo($image_url, PATHINFO_EXTENSION);

    if (!is_admin() || 'svg' !== $file_ext) {
        return false;
    }

    return array($image_url, null, null, false);
}

add_filter('upload_mimes', 'dnxte_upload_mimes');

function dnxte_upload_mimes($mimes){
    return allow_svg_types($mimes);
}

function allow_svg_types($mimes){
    
    $mimes['svg'] = 'image/svg+xml';

    $mimes['json'] = 'application/json';

    return $mimes;
}


add_filter('wp_check_filetype_and_ext', 'dnxte_check_filetype_and_ext', 10, 4);

function dnxte_check_filetype_and_ext($checked, $file, $filename, $mimes){
    if (!$checked['type']) {
        $wp_filetype = wp_check_filetype($filename, $mimes);
        $ext = $wp_filetype['ext'];
        $type = $wp_filetype['type'];
        $proper_filename = $filename;

        if ($type && 0 === strpos($type, 'image/') && $ext !== 'svg') {
            $ext = $type = false;
        }

        $checked = compact('ext', 'type', 'proper_filename');
    }
    
    if (true && !$checked['type']) {
        $wp_filetype = wp_check_filetype($filename, $mimes);
        $ext = $wp_filetype['ext'];
        $type = $wp_filetype['type'];
        $proper_filename = $filename;

        if ($type && $ext !== 'json') {
            $ext = $type = false;
        }

        $checked = compact('ext', 'type', 'proper_filename');
    }

    return $checked;
}