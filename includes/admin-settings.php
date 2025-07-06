<?php
add_action('admin_menu', function() {
    add_options_page('Dynamics Sync Settings', 'Dynamics Sync', 'manage_options', 'dcs-settings', 'dcs_settings_page');
});

function dcs_settings_page() {
    ?>
    <div class="wrap">
        <h1>Dynamics Contact Sync Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('dcs_settings');
            do_settings_sections('dcs-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

add_action('admin_init', function() {
    register_setting('dcs_settings', 'dcs_tenant_id');
    register_setting('dcs_settings', 'dcs_client_id');
    register_setting('dcs_settings', 'dcs_client_secret');
    register_setting('dcs_settings', 'dcs_resource_url');

    add_settings_section('dcs_main', 'Main Settings', null, 'dcs-settings');

    add_settings_field('dcs_tenant_id', 'Azure Tenant ID', function() {
        echo '<input type="text" name="dcs_tenant_id" value="' . esc_attr(get_option('dcs_tenant_id')) . '" size="50" />';
    }, 'dcs-settings', 'dcs_main');

    add_settings_field('dcs_client_id', 'Client ID', function() {
        echo '<input type="text" name="dcs_client_id" value="' . esc_attr(get_option('dcs_client_id')) . '" size="50" />';
    }, 'dcs-settings', 'dcs_main');

    add_settings_field('dcs_client_secret', 'Client Secret', function() {
        echo '<input type="password" name="dcs_client_secret" value="' . esc_attr(get_option('dcs_client_secret')) . '" size="50" />';
    }, 'dcs-settings', 'dcs_main');

    add_settings_field('dcs_resource_url', 'Dynamics Resource URL', function() {
        echo '<input type="text" name="dcs_resource_url" value="' . esc_attr(get_option('dcs_resource_url')) . '" size="50" />';
    }, 'dcs-settings', 'dcs_main');
});
