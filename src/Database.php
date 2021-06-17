<?php
declare(strict_types=1);

namespace Staark\Chat;
use PDO;
use Staark\Chat\Constants;

class Database {
    public static $instance;
    public $dbh;
    public $rows = 0;
    public $result = [];
    protected $query_string;
    public $query;

    public function __construct()
    {
        try {
            $this->dbh = new PDO("mysql:host=". Constants::DB_HOST .";dbname=". Constants::DB_TABLE .";port=" . Constants::DB_PORT, Constants::DB_USER, Constants::DB_PASSWORD);
        } catch (\PDOException $e) {
            die($e->getMessage());
            exit;
        }

        return $this->dbh;
    }

    public static function get_instance() {
        if(!self::$instance) {
            return self::$instance = new Database();
        }
    }

    public function _conversations(int $from = 0, int $to = 0) {

    }

    public function _chats() {
        try {
            if($this->query = $this->dbh->prepare("SELECT * FROM users")) {
                // Execute the query and return results
                $this->query->execute();

                $this->rows = $this->query->rowCount();
                $this->result = $this->query->fetchAll(PDO::FETCH_OBJ);

                return $this->result;
            }
        } catch (\PDOException $e) {
            die($e->getMessage());
            exit;
        }

        return $this;
    }

    public function getUser() {
        try {
            if($this->query = $this->dbh->prepare("SELECT name FROM users WHERE id = :id LIMIT 0,1")) {
                // Bind Param from query
                $this->query->bindParam('id', $_GET['id']);
                
                // Execute the query and return results
                $this->query->execute();

                $this->rows = $this->query->rowCount();
                $this->result = $this->query->fetch(PDO::FETCH_OBJ);

                return $this->result->name;
            }
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function fromUser() {
        try {
            if($this->query = $this->dbh->prepare("SELECT name FROM users WHERE id = :id LIMIT 0,1")) {
                // Bind Param from query
                $this->query->bindParam('id', $_SESSION['user']);
                
                // Execute the query and return results
                $this->query->execute();

                $this->rows = $this->query->rowCount();
                $this->result = $this->query->fetch(PDO::FETCH_OBJ);

                return $this->result->name;
            }
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function toUser() {
        try {
            if($this->query = $this->dbh->prepare("SELECT name FROM users WHERE id = :id LIMIT 0,1")) {
                // Bind Param from query
                $this->query->bindParam('id', $_GET['to']);
                
                // Execute the query and return results
                $this->query->execute();

                $this->rows = $this->query->rowCount();
                $this->result = $this->query->fetch(PDO::FETCH_OBJ);

                return $this->result->name;
            }
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getAvatar(int $id = 0) {
        try {
            if($this->query = $this->dbh->prepare("SELECT avatar FROM users WHERE id = :id LIMIT 0,1")) {
                // Bind Param from query
                $this->query->bindParam(':id', $id);
                
                // Execute the query and return results
                $this->query->execute();

                $this->rows = $this->query->rowCount();
                $this->result = $this->query->fetch(PDO::FETCH_OBJ);

                return $this->result->avatar;
            }
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function _send($from = NULL, $to = NULL, $content = NULL) {
        try {
            // Prepare sql
            $content = "'". htmlspecialchars_decode(trim($content)) . "'";
            $sql = "INSERT INTO conversation(`from`, `to`, `content`) VALUES ($from, $to, $content)";

            if($this->query = $this->dbh->prepare($sql)) {
                if($this->query->execute()) {
                    $this->result = [];
                    $id = $this->dbh->lastInsertId();

                    return $id;
                } else {
                    echo "failed" . $sql;
                }
            }
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }
}