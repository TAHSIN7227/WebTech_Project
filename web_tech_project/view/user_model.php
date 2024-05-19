<?php
class UserModel {
    private $data;
    
    public function __construct($data) {
        $this->data = $data;
    }
    
    public function getUserInfo($username) {
        $sql = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($this->data, $sql);
        return mysqli_fetch_assoc($result);
    }
    
    public function updateProfile($name, $phone, $email, $password, $sessionUsername) {
        $update_sql = "UPDATE user SET username='$name', phone='$phone', email='$email', password='$password' WHERE username='$sessionUsername'";
        
        if (mysqli_query($this->data, $update_sql)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getUserBalance($username) {
        $balance_sql = "SELECT balance FROM user WHERE username='$username'";
        $balance_result = mysqli_query($this->data, $balance_sql);
        $balance_row = mysqli_fetch_assoc($balance_result);
        return $balance_row['balance'];
    }
}
?>