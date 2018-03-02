<?php

require __DIR__ . '/database_connection.php';

/**
 * Class Acc
 */
class Acc
{

    /**
     * @var mysqli|PDO|string
     */
    protected $db;

    /**
     * Acc constructor.
     */
    public function __construct()
    {
        $this->db = DB();
    }

    /**
     * Add new Acc
     *
     * @param $acc_name
     * @param $acc_desc
     * @param $acc_user
     * @param $acc_passwd
     *
     * @return string
     */
    public function Create($acc_name, $acc_desc, $acc_user, $acc_passwd)
    {
        $query = $this->db->prepare("INSERT INTO accounts(acc_name, acc_desc, acc_user, acc_passwd) VALUES (:acc_name,:acc_desc,:acc_user,:acc_passwd)");
        $query->bindParam("acc_name", $acc_name, PDO::PARAM_STR);
        $query->bindParam("acc_desc", $acc_desc, PDO::PARAM_STR);
        $query->bindParam("acc_user", $acc_user, PDO::PARAM_STR);
        $query->bindParam("acc_passwd", $acc_passwd, PDO::PARAM_STR);
        $query->execute();

        return json_encode(['acc' => [
            'id'          => $this->db->lastInsertId(),
            'acc_name'        => $acc_name,
            'acc_desc' => $acc_desc,
            'acc_user' => $acc_user,
            'acc_passwd' => $acc_passwd
        ]]);
    }

    /**
     * List accs
     *
     * @return string
     */
    public function Read()
    {
        $query = $this->db->prepare("SELECT * FROM accs");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return json_encode(['accs' => $data]);
    }


    /**
     * Update Acc
     *
     * @param $acc_name
     * @param $acc_desc
     * @param $acc_user
     * @param $acc_passwd
     * @param $acc_id
     */
    public function Update($acc_name, $acc_desc, $acc_user, $acc_passwd, $acc_id)
    {
        $query = $this->db->prepare("UPDATE accounts SET acc_name = :acc_name, acc_desc = :acc_user, acc_user = :acc_passwd, acc_passwd = :acc_desc WHERE id = :id");
        $query->bindParam("acc_name", $acc_name, PDO::PARAM_STR);
        $query->bindParam("acc_desc", $acc_desc, PDO::PARAM_STR);
        $query->bindParam("acc_user", $acc_user, PDO::PARAM_STR);
        $query->bindParam("acc_passwd", $acc_passwd, PDO::PARAM_STR);
        $query->bindParam("id", $acc_id, PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * Delete Acc
     *
     * @param $acc_id
     */
    public function Delete($acc_id)
    {
        $query = $this->db->prepare("DELETE FROM accounts WHERE id = :id");
        $query->bindParam("id", $acc_id, PDO::PARAM_STR);
        $query->execute();
    }
}
