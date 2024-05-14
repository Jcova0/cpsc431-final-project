<?php

// Add list item to the to-do list

require("helpers/server_response.php");

$request = new ClientRequest();
$data_source = new DataSource("data.json");
$response = new ServerResponse($request, $data_source);

$response->process();

function post_list_item(ClientRequest $request, DataSource $data_source, ServerResponse $response)
{
    $data = $data_source->JSON(true);
    $new_task = $request->post['task'] ?? false;

    $highest_task_index = 0;
    foreach ($data as $task) {
        $task_index = (int)$task['idx'];
        if ($task_index > $highest_task_index) {
            $highest_task_index = $task_index;
        }
    }

    $new_task_index = $highest_task_index + 1;

    $new_task_item = array(
        "idx" => $new_task_index,
        "text" => $new_task,
        "checked" => false,
        "list_idx" => null, // This needs to be set according to the list the item belongs to
        "created" => date("Y-m-d H:i:s")
    );

    array_push($data, $new_task_item);

    // Save the updated data to the JSON file
    $new_json = json_encode($data);
    file_put_contents($data_source->write_path, $new_json);

    $response->status = "OK";
    $response->outputJSON($new_task_item);
}
?>