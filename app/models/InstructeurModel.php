<?php

class InstructeurModel 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getInstructeurs()
    {
        $sql = "SELECT * 
                FROM instructeur 
                ORDER BY AantalSterren DESC ";

        $this->db->query($sql);
        
        return $this->db->resultSet();
    }

    public function getGegevensInstructeur()
    {
        $sql = "SELECT ty.typeVoertuig, vo.Type, vo.Kenteken, vo.Bouwjaar, vo.Brandstof, ty.RijbewijsCategorie
                FROM voertuig vo
                INNER JOIN typeVoertuig ty
                ON vo.Id = ty.Id";
        
        $this->db->query($sql);
        
        return $this->db->resultSet();
    }
}