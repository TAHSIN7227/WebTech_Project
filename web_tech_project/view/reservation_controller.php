<?php
require_once 'ticket_model.php';

class ReservationController {
    private $model;

    public function __construct($servername, $username, $password, $dbname) {
        $this->model = new TicketModel($servername, $username, $password, $dbname);
    }

    public function reserveSeat($start, $end, $class, $quantity, $reserve, $username) {
        return $this->model->reserveSeat($start, $end, $class, $quantity, $reserve, $username);
    }
}
?>