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

    public function getInstructeurInfoById($instructeurId)
    {

        $sql = "SELECT  ins.Voornaam,
                        ins.Tussenvoegsel,
                        ins.Achternaam,
                        ins.DatumInDienst,
                        ins.AantalSterren
                from instructeur as ins
                where Id = $instructeurId";
        // echo $sql;exit();
        $this->db->query($sql);
        
        return $this->db->single();
    }

    public function getLizhan(){
        $sql = "SELECT * 
        FROM instructeur
        where Id = 1";

        $this->db->query($sql);

        return $this->db->single();
    }
    public function getAssignedVehiclesToInstructor($instructeurId)
    {
        $sql = "SELECT  tyvo.TypeVoertuig,
                        vo.Type,
                        vo.Kenteken,
                        vo.Bouwjaar,
                        vo.Brandstof,
                        tyvo.RijbewijsCategorie
                
                FROM VoertuigInstructeur as vi

                INNER JOIN voertuig as vo
                ON         vo.Id = vi.VoertuigId

                INNER JOIN TypeVoertuig as tyvo
                ON         tyvo.Id = vo.typeVoertuigId
                
                WHERE vi.InstructeurId = $instructeurId
                ORDER BY tyvo.RijbewijsCategorie ASC";

        $this->db->query($sql);

        return $this->db->resultSet();
    }
}