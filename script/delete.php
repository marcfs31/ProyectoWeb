<?php

$data = json_decode(file_get_contents('php://input'), TRUE);

if (isset($data['acc'])) {

    require __DIR__ . '/library.php';

    $acc_id = (isset($data['acc']['id']) ? $data['acc']['id'] : NULL);

    // Delete the Acc
    $acc = new Acc();

    $acc->Delete($acc_id);
}

?>
