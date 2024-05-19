<?php
require_once 'ticket_model.php';

class TicketController {
    private $model;

    public function __construct($servername, $username, $password, $dbname) {
        $this->model = new TicketModel($servername, $username, $password, $dbname);
    }

    public function getTicketInfo() {
        return $this->model->getTicketInfo();
    }
}
?>