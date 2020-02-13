<h1>Authentifiez vous</h1>
<form id="login" method="POST">

    <label> Username : <br><input type="text" name="username" /></label><br>
    <label>Mot de passe : <br><input type="password" name="motPasse" /></label><br>
    <input type="hidden" name="action" value="" /><br>
    <input id="bouton" type="submit" value="" />

    <?php
        if(isset($_GET['erreur'])){
            $err = $_GET['erreur'];
            if($err==1 || $err==2)
                echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
        }
        ?>

</form>