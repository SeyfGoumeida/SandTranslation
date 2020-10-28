<?php 
require_once('Models/ListeTraducteurModel.php');
require_once('Views/ListeTraducteurView.php');
class ListeTraducteurControler 
{
    public $V1;
    public $listModel;
    function __construct()
    {
        $this->V1=new ListeTraducteurView();   
        $this->listModel = new ListeTraducteurModel();
    }
    function Showpage()
    {
        $this->V1->Header();
        $this->V1->Title();
        $this->V1->Logo();
        $this->V1->NAV();
        $this->V1->Articles($this->listModel->get_traducteur());
        $this->V1->Footer();
    }
}
?>