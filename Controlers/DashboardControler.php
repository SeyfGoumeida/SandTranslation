<?php
require_once 'Models/DashboardModel.php';
require_once 'Views/DashboardView.php';

class DashboardControler
{
    private $V1;
    private $dashboard_model;
    

    public function __construct()
    {
        $this->V1 = new DashboardView();
        $this->dashboard_model = new DashboardModel();
    }


    public function Showpage()
    {
        if (isset($_SESSION['username'])) {
        $this->V1->Header();
        $this->V1->Title();
        $this->V1->Dash();
        }else header("Location: Admin.php");
    }
}