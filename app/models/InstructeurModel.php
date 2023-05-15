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
                from instructeur ins
                left join voertuiginstructeur voins
                on ins.Id = voins.Id
                left join voertuig vo
                on vo.Id = ins.Id
                left join typevoertuig ty
                on ty.Id = vo.typevoertuigId
                where ins.Id = 1";
        
        $this->db->query($sql);
        
        return $this->db->resultSet();
    }

    public function getLizhan(){
        $sql = "SELECT * 
        FROM instructeur
        where Id = 1";

        $this->db->query($sql);

        return $this->db->resultSet();
    }
}