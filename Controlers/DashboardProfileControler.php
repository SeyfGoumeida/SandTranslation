<?php
require_once 'Models/DashboardProfileModel.php';
require_once 'Views/DashboardProfileView.php';

class DashboardProfileControler
{
    private $V1;
    private $dashboardProfile_model;
    private $client;
    private $traducteur;
    

    public function __construct($cln,$trad)
    {
        $this->V1 = new DashboardProfileView();
        $this->dashboardProfile_model = new DashboardProfileModel();
        $this->client = $cln;
        $this->traducteur = $trad;

    }


    public function Showpage()
    {
       
        $this->V1->Header();
        $this->V1->Title();
        $this->V1->Logo();
        if($this->client!="")
        {$this->V1->Profile($this->dashboardProfile_model->get_client($this->client));}
        else
        {$this->V1->Profile($this->dashboardProfile_model->get_traducteur($this->traducteur));};
        

    }
}