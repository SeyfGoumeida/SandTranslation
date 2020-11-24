<?php
require_once 'Models/DevisModel.php';
require_once 'Views/DevisView.php';

class DevisControler
{

    public function __construct()
    {
        $this->devis_model = new DevisModel();
        $this->V1 = new DevisView();

    }

    public function Showpage()
    {
        $this->V1->Header();
        $this->V1->Title();
        $this->V1->Logo();
        $this->V1->NAV();
        $this->V1->Diaporama();
        $this->V1->Devis($this->devis_model->get_devis(), $this->devis_model->get_devis_client());

        $this->V1->Footer();
    }
}