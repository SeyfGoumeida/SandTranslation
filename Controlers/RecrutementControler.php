<?php 
require_once('Models/RecrutementModel.php');
require_once('Views/RecrutementView.php');
class RecrutementControler 
{
    public $V1;
    public $recrutment_model;
    function __construct()
    {
        $this->V1=new RecrutementView(); 
        $this->recrutment_model = new  RecrutementModel(); 
    }
    function Showpage()
    {
        $this->V1->Header();
        $this->V1->Title();
        $this->V1->Logo();
        $this->V1->NAV();
        $this->V1->Articles($this->recrutment_model->get_languages(),$this->recrutment_model->get_type());
        $this->V1->Footer();
    }
}
?>