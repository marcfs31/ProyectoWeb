<?php

$data = json_decode(file_get_contents('php://input'), TRUE);

if (isset($data['acc'])) {

    require __DIR__ . '/library.php';

    $acc_name = (isset($data['acc']['acc_name']) ? $data['acc']['acc_name'] : NULL);
    $acc_desc = (isset($data['acc']['acc_desc']) ? $data['acc']['acc_desc'] : NULL);
    $acc_user = (isset($data['acc']['acc_user']) ? $data['acc']['acc_user'] : NULL);
    $acc_passwd = (isset($data['acc']['acc_passwd']) ? $data['acc']['acc_passwd'] : NULL);
    $acc_id = (isset($data['acc']['id']) ? $data['acc']['id'] : NULL);

    // validations
    if ($acc_name == NULL) {
        http_response_code(400);
        echo json_encode(['errors' => ["Account name field is required"]]);

    } else {

        // Update the Acc
        $acc = new Acc();

        $acc->Update($acc_name, $acc_desc, $acc_user, $acc_passwd, $acc_id);
    }
}

?>
