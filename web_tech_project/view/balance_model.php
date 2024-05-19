<?php
class BalanceModel {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "webtech_project";

    public function getBalance($username) {
        $data = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "SELECT balance FROM user WHERE username='$username'";
        $result = mysqli_query($data, $sql);
        $info = mysqli_fetch_assoc($result);
        return $info['balance'];
    }
}
?>