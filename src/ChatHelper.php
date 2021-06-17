<?php
declare(strict_types=1);

namespace Staark\Chat;

use PDO;
use Staark\Chat\Database as DB;

class ChatHelper {
    public $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function __send() {
        if(isset($_POST['data_send'])) {
            return $this->db->_send($_POST['data_send']['from'], $_POST['data_send']['to'], $_POST['data_send']['content']);
        }
    }

    public function __retrive($from = NULL, $to = NULL) {
        try {
            if($this->db->query = $this->db->dbh->prepare("SELECT * FROM conversation WHERE `from`={$from} AND `to`={$to} OR `from`={$to} AND `to`={$from} ORDER BY id ASC")) {

                if($this->db->query->execute()) {
                    $this->db->rows = $this->db->query->rowCount();
                    $this->db->result = $this->db->query->fetchAll(PDO::FETCH_ASSOC);

                    return $this->db->result;
                }
            }
        } catch (\PDOException $e) {
            die($e->getMessage());
            exit;
        }
        
        return $this;
    }
}