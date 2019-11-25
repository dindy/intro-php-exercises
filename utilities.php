<?php 
    function calcul_prix_ttc($prix_ht, $tx_tva) {
        return $prix_ht * (1 + $tx_tva / 100);
    }

    function number_format_fr($prix_ttc) {
        return number_format($prix_ttc, 2, ',', ' ');
    }

    function afficher_stock($qtt_stock) {
                    
        if ($qtt_stock == 0 ) {
            echo 'Pas de stock disponible';
        } else {
            echo 'Stock disponible : ' . $qtt_stock;
            if ($qtt_stock < 10 ) {
                echo ' (dépêchez-vous de commander !)';
            } 
        }
    }

    function afficher_mensualites($prix_ttc, $prix_ttc_formate) {

        if ($prix_ttc > 500) {
            echo '<h2>Paiement en plusieurs fois :</h2>';
            
            $num_mois = 2;
            $reste = $prix_ttc;

            echo '<table>';
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
                        echo '<td>' . $prix_ttc_formate . ' €</td>';                        
                    echo '</tr>';                    
                echo '</tbody>';
            echo '</table>';
        }
    }