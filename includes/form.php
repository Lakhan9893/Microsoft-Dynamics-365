<?php
function dcs_render_contact_form() {
    if (!is_user_logged_in()) return '<p>You must be logged in.</p>';

    $user_id = get_current_user_id();
    $contact_id = get_user_meta($user_id, 'dynamics_contact_id', true);
    if (!$contact_id) return '<p>No linked Dynamics contact.</p>';

    $data = dcs_fetch_user_contact($contact_id);

    ob_start();
    if (isset($_GET['updated'])) echo '<p class="success">Updated successfully.</p>';
    if (isset($_GET['error'])) echo '<p class="error">Update failed.</p>';
    ?>
    <form method="post">
        <?php wp_nonce_field('dcs_update_contact', 'dcs_nonce'); ?>
        <label>Name: <input type="text" name="fullname" value="<?= esc_attr($data['fullname']) ?>"></label><br>
        <label>Email: <input type="email" name="email" value="<?= esc_attr($data['emailaddress1']) ?>"></label><br>
        <label>Phone: <input type="text" name="phone" value="<?= esc_attr($data['telephone1']) ?>"></label><br>
        <label>Address: <input type="text" name="address" value="<?= esc_attr($data['address1_line1']) ?>"></label><br>
        <input type="submit" value="Update Info">
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode('dcs_contact_form', 'dcs_render_contact_form');

add_action('init', function() {
    if (isset($_POST['dcs_nonce']) && wp_verify_nonce($_POST['dcs_nonce'], 'dcs_update_contact')) {
        $user_id = get_current_user_id();
        $contact_id = get_user_meta($user_id, 'dynamics_contact_id', true);
        $data = [
            'fullname'      => sanitize_text_field($_POST['fullname']),
            'emailaddress1' => sanitize_email($_POST['email']),
            'telephone1'    => sanitize_text_field($_POST['phone']),
            'address1_line1'=> sanitize_text_field($_POST['address']),
        ];
        $response = dcs_update_user_contact($contact_id, $data);
        if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 204) {
            wp_redirect(add_query_arg('updated', '1'));
        } else {
            wp_redirect(add_query_arg('error', '1'));
        }
        exit;
    }
});
