<!DOCTYPE html>
<html>

<head>
    <title>Page liste des annonces</title>
</head>

<body>
    <header>
        <section>
            <div>
                <h1>picturing</h1>
                <div>logo</div>
            </div>
            <form action="/search" id="searchthis" method="get">
                <input id="search" name="q" type="text" placeholder="Rechercher" />
                <input id="search-btn" type="submit" value="Rechercher" />
            </form>

            <nav class="crumbs">
                <ol>
                    <li class="crumb"><a href="bikes">Appareils</a></li>
                    <li class="crumb"><a href="bikes/bmx">Cours/Formation</a></li>

                </ol>
            </nav>
        </section>
    </header>
    <main>
        <h2>Selection</h2>
        <section>
            <article>
                <img src="images/appareil.png" alt="" height="300px" width="300px" />

                <h3>nom appareil</h3>
                <h4>description</h4>
                <p>prix</p>
            </article>
        </section>>

        <footer>
            <div>
                <div>logo</div>
                <h5>adresse</h5>
            </div>

            <div>
                <a href=" http.www.google.fr">

                    <img src="images/facebook.jpeg" alt="logo Facebook" />

                </a>
            </div>
        </footer>

    </main>

</body>

</html>

<!--------------------------------This is a comment. Comments are not displayed in the browser----------------------------------------->


<!DOCTYPE html>
<html>

<head>
    <title>Page liste des founisseurs/ADMIN</title>
</head>

<body>
    <header>
        <section>
            <div>
                <h1>picturing</h1>
                <div>logo</div>
            </div>
            <img src="images/appareil.png" alt="" height="300px" width="300px" />
        </section>
    </header>
    <main>

        <section>

            <aside>
                <nav class="crumbs">
                    <ol>
                        <li class="crumb"><a href="bikes">Fournisseurs</a></li>
                        <li class="crumb"><a href="bikes">clients</a></li>
                        <li class="crumb"><a href="bikes">Message</a></li>
                        <li class="crumb"><a href="bikes">Catégories</a></li>
                        <li class="crumb"><a href="bikes">Cours/Formation</a></li>

                    </ol>
                </nav>

            </aside>

            <h2>Liste des fournisseurs</h2>

            <table>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse</th>
                    <th>Courriel</th>
                    <th>Statut</th>
                </tr>
                <tr>
                    <td>Giraud</td>
                    <td>Pierre</td>
                    <td>155 rue baldwin Montreal Quebec S3X 2W9</td>
                    <td>pierre.giraud@edhec.com</td>
                    <td>Or</td>
                </tr>
            </table>
        </section>>

        <footer>
            <div>
                <div>logo</div>
                <h5>adresse</h5>
            </div>

            <div>
                <a href=" http.www.google.fr">

                    <img src="images/facebook.jpeg" alt="logo Facebook" />

                </a>
            </div>
        </footer>

    </main>

</body>

</html>

<!--------------------------------------------------------vue login--------------------------------------------------------------------->


<html>

<head>
    <meta charset="utf-8">
    <title>Formulaire d'authentification</title>
    <meta name="author" content="picturing">


</head>

<body>

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

</body>

</html>

<!--------------------------------------------------------vue formulaire d'ìnscription--------------------------------------------------------------------->

<html>

<head>
    <meta charset="utf-8">
    <title>Formulaire d'inscription</title>
    <meta name="author" content="picturing">


</head>

<body>

    <form action="inscription.php" method="post">
        <fieldset class="etat-civil">
            <legend>Etat civil</legend>
            <label for="nom">Nom</label>
            <input id="nom" name="nom" type="text" /><br />
            <label for="prenom">Prénom </label>
            <input id="prenom" name="prenom" type="text" /><br />
            <label for="email">Courriel</label>
            <input id="courriel" name="courriel" type="email" />
            <label for="user_name">Nom d'utilisation</label>
            <input id="user_name" name="user_name" type="text" />
            <label for="password">Mot de passe</label>
            <input id="password" name="password" type="password" />
            <input type="submit" class="submit" value="Valider" />
        </fieldset>

    </form>

</body>

</html>