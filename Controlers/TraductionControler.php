<?php
require_once 'Models/TraductionModel.php';
require_once 'Views/TraductionView.php';

class TraductionControler
{

    public function __construct()
    {
        $this->traduction_model = new TraductionModel();
        $this->V1 = new TraductionView();

    }

    public function Showpage()
    {
        $this->V1->Header();
        $this->V1->Title();
        $this->V1->Logo();
        $this->V1->NAV();
        $this->V1->Diaporama();
        $this->V1->traduction($this->traduction_model->get_traduction());

        $this->V1->Footer();
    }
}