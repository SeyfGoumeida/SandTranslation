<?php 
require_once('Models/ProposModel.php');
require_once('Views/ProposView.php');
class ProposControler 
{
    public $V1;
    private $propos_model ;
    function __construct()
    {
        $this->V1=new ProposView();   
        $this->propos_model=new ProposModel(); 

    }
    function Showpage()
    {
        $this->V1->Header();
        $this->V1->Title();
        $this->V1->Logo();
        $this->V1->NAV();
        $this->V1->Articles($this->propos_model->get_propos());
        $this->V1->Footer();
    }
}
?>