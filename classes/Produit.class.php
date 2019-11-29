<?php

class Produit {
    
    public $id;

    public $nom;

    public $prix_ht;

    public $qtt_stock;

    public $tx_tva;

    public $date_dispo;

    public $categorie_id;

    public function __construct($data_product) {
        $this->id = $data_product['id']; 
        $this->nom = $data_product['nom_produit']; 
        $this->prix_ht = $data_product['prix_ht'];
        $this->qtt_stock = $data_product['qtt_stock']; 
        $this->tx_tva = $data_product['tx_tva']; 
        $this->date_dispo = $data_product['date_dispo']; 
        $this->categorie_id = $data_product['categorie_id']; 
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function afficherBlocDateDispo() {
        $timestamp_courant = time();
        $timestamp = $this->getDateDispoTimestamp();

        if($timestamp_courant - $timestamp > 0) {
            echo 'Disponible depuis le ' . $this->getDateDispo();
        } else {
            echo 'Mise à disposition dans '. nb_jours_entre_timestamps($timestamp, $timestamp_courant) . ' jours.';
        }
    }

    public function getDateDispo() {
        $timestamp = $this->getDateDispoTimestamp();
        return strftime('%x', $timestamp);        
    }
    
    public function getDateDispoTimestamp() {
        return strtotime($this->date_dispo);
    }

    public function getPrixTtc() {
        return $this->prix_ht * (1 + $this->tx_tva / 100);
    }    

    public function getPrixTtcFr() {
        return number_format_fr($this->getPrixTtc());
    }    

    public function afficherStock() {
        if ($this->qtt_stock == 0 ) {
            echo 'Pas de stock disponible';
        } else {
            echo 'Stock disponible : ' . $this->qtt_stock;
            if ($this->qtt_stock < 10 ) {
                echo ' (dépêchez-vous de commander !)';
            } 
        }        
    }    

    public function afficherEcheancier() {
        if ($this->getPrixTtc() > 500) {
            echo '<h2>Paiement en plusieurs fois :</h2>';
            
            $num_mois = 2;
            $reste = $this->getPrixTtc();
    
            echo '<table class="paiement">';
                echo '<thead>';
                    echo '<tr>';
                        echo '<th>Mois</th>';
                        echo '<th>Montant TTC</th>';
                    echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                    while ($reste > 500) {
                        $reste = $reste - 500;
                        $ligne_classe = ($num_mois / 2) % 2 == 0 ? 'sombre' : '';
                        echo "<tr class=$ligne_classe>";
                        echo "<td>$num_mois</td>";
                        echo '<td>500,00 €</td>';
                        echo '</tr>';
                        $num_mois = $num_mois + 2; 
                    }
                    $ligne_classe = ($num_mois / 2) % 2 == 0 ? 'sombre' : '';
                    echo "<tr class=$ligne_classe>";
                        echo "<td>$num_mois</td>";
                        echo '<td>' . number_format($reste, 2, ',', ' ') . ' €</td>';
                    echo '</tr>';                    
                    echo '<tr>';
                        echo "<td><bold>Total</bold></td>";
                        echo '<td>' . $this->getPrixTtcFr() . ' €</td>';                        
                    echo '</tr>';                    
                echo '</tbody>';
            echo '</table>';
        }    
    }

    public function getCategoryName() {
        return $this->category_name;
    }
}