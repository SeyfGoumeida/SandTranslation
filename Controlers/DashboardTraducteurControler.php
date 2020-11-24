<?php
require_once 'Models/DashboardTraducteurModel.php';
require_once 'Views/DashboardTraducteurView.php';

class DashboardTraducteurControler
{
    private $V1;
    private $dashboardtraducteur_model;
    

    public function __construct()
    {
        $this->V1 = new DashboardTraducteurView();
        $this->dashboardtraducteur_model = new DashboardTraducteurModel();
    }


    public function Showpage()
    {
        $this->V1->Header();
        $this->V1->Title();
        $this->V1->Logo();
        $this->V1->Traducteur($this->dashboardtraducteur_model->get_traducteur());
    }
}