<?php 
require_once('Models/TypeTraductionModel.php');
require_once('Views/TypeTraductionView.php');
class TypeTraductionControler 
{
    public $V1;
    public $listModel;
    function __construct()
    {
        $this->V1=new TypeTraductionView();   
        $this->listModel = new TypeTraductionModel();
    }
    function Showpage()
    {
        $this->V1->Header();
        $this->V1->Title();
        $this->V1->Logo();
        $this->V1->NAV();
        $this->V1->Articles($this->listModel->get_type());
        $this->V1->Footer();
    }
}
?>