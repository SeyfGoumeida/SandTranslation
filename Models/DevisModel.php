<?php
class DevisModel
{
    
    

    public function db_article_query($first_try)
    {
        if ($first_try) {
            $sql = "SELECT * FROM `articles` ORDER BY `Date` ASC ";
            $this->result = $this->conn->query($sql);
        };

        $row = $this->result->fetch_assoc();
        return $row;
    }

   

}