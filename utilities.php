<?php 

    function number_format_fr($prix_ttc) {
        return number_format($prix_ttc, 2, ',', ' ');
    }
    
    function nb_jours_entre_timestamps($t1, $t2):int {
        return (((($t1 - $t2) / 60) / 60) / 24);
    }