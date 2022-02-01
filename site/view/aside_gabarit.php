<?php
if(isset($_SESSION['pseudo'])) {
?>        
         <li><a href="deconnexion.html">Quitter</a></li>
         <li><a href="creer-article.html">Créer</a></li>
         <li><a href="admin-home.html">Modifier</a></li>
         <li><a href="admin-home.html">Supprimer</a></li>
<?php
} else {
?>         
         <li><a href="accueil.html">Accueil</a></li>
         <li><a href="admin.html">Admin</a></li> 
<?php
}
?>          