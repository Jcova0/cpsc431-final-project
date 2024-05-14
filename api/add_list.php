<?php

// Add list to the to-do list

require("helpers/server_response.php");

$request = new ClientRequest();
$data_source = new DataSource("data.json");
$response = new ServerResponse($request, $data_source);

$response->process();

function post_list(ClientRequest $request, DataSource $data_source, ServerResponse $response)
{
    $data = $data_source->JSON(true);
    $new_list_name = $request->post['name'] ?? false; // Renamed to $new_list_name for clarity

    $highest_list_index = 0;
    foreach ($data as $list) {
        $list_index = (int)$list['idx'];
        if ($list_index > $highest_list_index) {
            $highest_list_index = $list_index;
        }
    }

    $new_list_index = $highest_list_index + 1;

    $new_list = array(
        "idx" => $new_list_index,
        "name" => $new_list_name,
        "created" => date("Y-m-d H:i:s")
    );
    
    array_push($data, $new_list);

    // Save the updated data to the JSON file
    $new_json = json_encode($data);
    file_put_contents($data_source->write_path, $new_json);

    $response->status = "OK";
    $response->outputJSON($new_list);

}