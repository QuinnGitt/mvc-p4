<?php

class Instructeur extends BaseController 
{
    private $instructeurModel;
    public function __construct()
    {
        $this->instructeurModel = $this->model('InstructeurModel');
    }
    public function index() 
    {
        /**
         * Haal alle instructeurs op uit de database (model)
         */
        $instructeurs = $this->instructeurModel->getInstructeurs();

        // var_dump($instructeurs);
        $aantalInstructeurs = sizeof($instructeurs);

        /**
         * Maak de rows voor de tbody in de view
         */
        $tableRows = '';

        foreach ($instructeurs as $instructeur) {
            $datum = date_create($instructeur->DatumInDienst);
            $datum = date_format($datum, 'd-m-Y'); 
            $tableRows .=  "<tr>
                                <td>$instructeur->Voornaam</td>
                                <td>$instructeur->Tussenvoegsel</td>
                                <td>$instructeur->Achternaam</td>
                                <td>$instructeur->Mobiel</td>
                                <td>$datum</td>
                                <td>$instructeur->AantalSterren</td>
                                <td>
                                    <a href='". URLROOT . "/Instructeur/gebruikteVoertuigen/$instructeur->Id'>
                                    <i class='bi bi-car-front'></i>
                                </td>
                            </tr>";
        }
        
        /**
         * Het $data-array geeft alle belangrijke info door aan de view
         */
        $data = [
            'title' => 'Instructeurs in dienst', 
            'aantalInstructeurs' => $aantalInstructeurs,
            'tableRows' => $tableRows
        ];

        $this->view('Instructeur/index', $data);
    }

    public function gebruikteVoertuigen($instructeurId)
    {
        // $this->instructeurModel->getInstructeurInfoById($instructeurId);        
        $instructeur =   $this->instructeurModel->getInstructeurInfoById($instructeurId);
        // var_dump($instructeur);

        $assignedVehicles = $this->instructeurModel->getAssignedVehiclesToInstructor($instructeurId);
        var_dump($assignedVehicles);

        /**
         * Maak de rows voor de tbody in de view
         */
        $tableRows = '';

        foreach ($assignedVehicles as $vehicles) {
            $date = date_format(date_create($vehicles->Bouwjaar), 'd-m-y');
            $tableRows .= "<tr>
                            <td>$vehicles->TypeVoertuig</td>
                            <td>$vehicles->Type</td>
                            <td>$vehicles->Kenteken</td>
                            <td>$date</td>
                            <td>$vehicles->Brandstof</td>
                            <td>$vehicles->RijbewijsCategorie</td>
                           </tr>";
        }

        $data = [
            'title'         => 'Door instructeur gebruikte voertuigen',
            'voornaam'      => $instructeur->Voornaam,
            'tussenvoegsel' => $instructeur->Tussenvoegsel,
            'achternaam'    => $instructeur->Achternaam,
            'datumInDienst' => $instructeur->DatumInDienst,
            'aantalSterren' => $instructeur->AantalSterren,
            'tableRows'     => $tableRows
        ];
        $this->view('Instructeur/gebruikteVoertuigen', $data);
    }
}