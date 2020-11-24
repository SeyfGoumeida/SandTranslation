<?php
require_once 'Models/AdminModel.php';
require_once 'Views/AdminView.php';

class AdminControler
{
    private $V1;
    private $admin_model;
 

    public function __construct()
    {
        $this->V1 = new adminView();
        $this->admin_model = new adminModel();
    }


    public function Showpage()
    {
        $this->V1->Header();
        $this->V1->Title();
        $this->V1->Logo();
        $this->V1->SignIn();
    }
}