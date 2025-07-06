<?php
function dcs_fetch_user_contact($contact_id) {
    $token = dcs_get_dynamics_access_token();
    $url = get_option('dcs_resource_url') . '/api/data/v9.2/contacts(' . $contact_id . ')';

    $response = wp_remote_get($url, [
        'headers' => [
            'Authorization' => 'Bearer ' . $token,
            'Accept'        => 'application/json',
        ],
    ]);

    return json_decode(wp_remote_retrieve_body($response), true);
}

function dcs_update_user_contact($contact_id, $data) {
    $token = dcs_get_dynamics_access_token();
    $url = get_option('dcs_resource_url') . "/api/data/v9.2/contacts($contact_id)";

    return wp_remote_request($url, [
        'method'  => 'PATCH',
        'headers' => [
            'Authorization' => 'Bearer ' . $token,
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json',
        ],
        'body' => json_encode($data),
    ]);
}
