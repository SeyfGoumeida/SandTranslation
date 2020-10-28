<?php 

require_once('Views/EditProfilView.php');

class EditProfilControler 
{
    public $V1;
    function __construct()
    {
        $this->V1=new EditProfilView();   
    }
    function Showpage()
    {
        $this->V1->Header();
        $this->V1->Title();
        $this->V1->Logo();
        $this->V1->NAV();
        $this->V1->Articles();
        $this->V1->Footer();
    }
}
?>