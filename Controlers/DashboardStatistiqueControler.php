<?php
require_once 'Models/DashboardStatistiqueModel.php';
require_once 'Views/DashboardStatistiqueView.php';

class DashboardStatistiqueControler
{
    private $V1;
    private $dashboardStatistique_model;


    public function __construct()
    {
        $this->V1 = new DashboardStatistiqueView();
        $this->dashboardStatistique_model = new DashboardStatistiqueModel();
    }


    public function Showpage($id_traducteur,$id_client)
    {
        if (isset($_SESSION['username'])) {
        $this->V1->Header($this->dashboardStatistique_model->get_devis(),$this->dashboardStatistique_model->get_traduction(),
                          $this->dashboardStatistique_model->get_devis_client($id_client),$this->dashboardStatistique_model->get_traduction_client($id_client)
                          ,$this->dashboardStatistique_model->get_devis_traducteur($id_traducteur),$this->dashboardStatistique_model->get_traduction_traducteur($id_traducteur));
        $this->V1->Title();
        $this->V1->Logo();
        $this->V1->Statistique($this->dashboardStatistique_model->get_devis(),$this->dashboardStatistique_model->get_traduction(),
                               $this->dashboardStatistique_model->get_traducteur(),$this->dashboardStatistique_model->get_devis_traducteur($id_traducteur)
                               ,$this->dashboardStatistique_model->get_traduction_traducteur($id_traducteur),$this->dashboardStatistique_model->get_client()
                               ,$this->dashboardStatistique_model->get_devis_client($id_client),$this->dashboardStatistique_model->get_traduction_client($id_client));
        }else header("Location: Admin.php");
    }
}