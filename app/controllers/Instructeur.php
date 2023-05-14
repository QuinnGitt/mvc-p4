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
        $data = [
            'title' => 'Door instructeur gebruikte voertuigen'
        ];
        $this->view('Instructeur/gebruikteVoertuigen', $data);
    }
}