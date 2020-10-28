<?php 
require_once('Models/BlogModel.php');
require_once('Views/BlogView.php');
class BlogControler 
{
    public $V1;
    public $blog_model;
    function __construct()
    {
        $this->V1=new BlogView();  
        $this->blog_model=new BlogModel();   
    }
    function Showpage()
    {
        $this->V1->Header();
        $this->V1->Title();
        $this->V1->Logo();
        $this->V1->NAV();
        $this->V1->Articles($this->blog_model->get_articles());
        $this->V1->Footer();
    }
}
?>