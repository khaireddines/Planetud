<?php
session_start();
//unset() d�truit la ou les variables dont le nom a �t� pass� en argument
//unset() Supprime uniquement les donn�es relatives aux noms
unset($_SESSION);
unset($_COOKIE);
//efface TOUTES les donn�es associ�es � cet utilisateur.
session_destroy();
header ('Location: index.php');
?>
