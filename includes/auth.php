<?php
function dcs_get_dynamics_access_token() {
    $tenant_id = get_option('dcs_tenant_id');
    $client_id = get_option('dcs_client_id');
    $client_secret = get_option('dcs_client_secret');
    $resource = get_option('dcs_resource_url');

    $response = wp_remote_post("https://login.microsoftonline.com/$tenant_id/oauth2/token", [
        'body' => [
            'grant_type'    => 'client_credentials',
            'client_id'     => $client_id,
            'client_secret' => $client_secret,
            'resource'      => $resource,
        ],
    ]);

    $body = json_decode(wp_remote_retrieve_body($response), true);
    return $body['access_token'] ?? null;
}
