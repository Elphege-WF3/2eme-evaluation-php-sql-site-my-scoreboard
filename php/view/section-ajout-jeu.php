<section>
    <h2>Voici le formulaire pour ajouter un jeu</h2>
</section>

<section>
    <h3>Vous devez le compléter et cliquez sur le bouton</h3>
    <form method="POST" action="#form-create" id="form-create">
        <label>
            <span>Titre</span>
            <input type="text" name="title" required placeholder="TITRE" maxlength="160">
        </label>
        <label>
            <span>Nombre de joueurs minimum</span>
            <input type="text" name="min_players" required placeholder="NOMBRE DE JOUEURS MINIMUM" maxlength="160">
        </label>
        <label>
            <span>Nombre de joueurs maximum</span>
            <input type="text" name="max_players" required placeholder="NOMBRE DE JOUEURS MAXIMUM" maxlength="160">
        </label>
        <div><button type="submit">AJOUTER CE JEU</button></div>
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="formIdentifiant" value="ajout-jeu">
        <div>
        <?php require_once "php/controller/traitement-jeu.php" ?> 
        </div>
    </form>
</section>
