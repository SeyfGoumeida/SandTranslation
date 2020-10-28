<?php
require_once 'Models/HomeModel.php';
require_once 'Views/HomeView.php';

class HomeControler
{
    private $V1;
    private $home_model;
    private $article, $article1, $article2;

    public function __construct()
    {
        $this->V1 = new HomeView();
        $this->home_model = new HomeModel();
    }

    public function Db_Connection()
    {

        $this->home_model->db_connect();
        $this->article = $this->home_model->db_article_query(true);
        $this->article1 = $this->home_model->db_article_query(false);
        $this->article2 = $this->home_model->db_article_query(false);
        $this->home_model->db_disconnect();
    }

    public function Showpage()
    {
        $this->V1->Header();
        $this->V1->Title();
        $this->V1->Logo();
        $this->V1->NAV();
        $this->V1->Diaporama();
        $this->V1->Articles($this->article, $this->article1, $this->article2);
        $this->V1->Forms();
        $this->V1->Devis($this->home_model->get_languages(),$this->home_model->get_languages(),$this->home_model->get_type());
        $this->V1->SignUp();
        $this->V1->SignIn();
        $this->V1->Footer();
    }
}