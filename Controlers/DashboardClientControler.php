<?php
require_once 'Models/DashboardClientModel.php';
require_once 'Views/DashboardClientView.php';

class DashboardClientControler
{
    private $V1;
    private $dashboardclient_model;
    

    public function __construct()
    {
        $this->V1 = new DashboardClientView();
        $this->dashboardclient_model = new DashboardClientModel();
    }


    public function Showpage()
    {
        if (isset($_SESSION['username'])) {
        $this->V1->Header();
        $this->V1->Title();
        $this->V1->Logo();
        $this->V1->Client($this->dashboardclient_model->get_client());
        }else header("Location: Admin.php");
    }
}