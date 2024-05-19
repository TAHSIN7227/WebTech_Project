
<?php
class TicketModel {
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    public function getTicketInfo() {
        return array(
            'start' => 'Dhaka',
            'end' => 'Chittagong',
            'class' => 'AC',
            'quantity' => '1'
        );
    }


    public function reserveSeat($start, $end, $class, $quantity, $reserve, $username) {
        
        $sql = "SELECT balance FROM user WHERE username = '$username'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $currentBalance = $row["balance"];
        } else {
            return "Error: User not found";
        }

        
        $reservationCost = $this->calculateReservationCost($start, $end, $class, $quantity, $reserve);

        
        if ($currentBalance >= $reservationCost) {
            $newBalance = $currentBalance - $reservationCost;
            $sql = "UPDATE user SET balance = '$newBalance' WHERE username = '$username'";
            if ($this->conn->query($sql) === FALSE) {
                return "Error updating user's balance: " . $this->conn->error;
            }

            $sql = "UPDATE user 
                    SET start = '$start', end = '$end', class = '$class', quantity = '$quantity', reserve = '$reserve'
                    WHERE username = '$username'";

            if ($this->conn->query($sql) === TRUE) {
                return "Reservation updated successfully!";
            } else {
                return "Error updating reservation: " . $this->conn->error;
            }
        } else {
            return "Error: Insufficient balance";
        }
    }

    private function calculateReservationCost($start, $end, $class, $quantity, $reserve) {
        
        $baseCost = 50; 
        $totalCost = $baseCost * $quantity; 
        return $totalCost;
    }
}
?>