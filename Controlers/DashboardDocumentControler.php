<?php
require_once 'Models/DashboardDocumentModel.php';
require_once 'Views/DashboardDocumentView.php';

class DashboardDocumentControler
{
    private $V1;
    private $dashboardDocument_model;
    private $document;

    public function __construct($data)
    {
        $this->V1 = new DashboardDocumentView();
        $this->dashboardDocument_model = new DashboardDocumentModel();
        $this->document = $data;
    }


    public function Showpage()
    {
        if (isset($_SESSION['username'])) {
        $this->V1->Header();
        $this->V1->Title();
        $this->V1->Logo();
        $this->V1->Document($this->dashboardDocument_model->get_document());
        $this->dashboardDocument_model->supprimer_document($this->document);
    }else header("Location: Admin.php");


    }
}