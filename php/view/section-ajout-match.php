<section>
    <h2>Voici le formulaire pour ajouter un match</h2>
</section>

<section>
    <h3>Vous devez le compléter et cliquez sur le bouton</h3>
    <form method="POST" action="#form-create" id="form-create">
        <label>
            <span>Numéro du jeu</span>
            <input type="text" name="game_id" required placeholder="NUMERO DU JEU" maxlength="160">
        </label>
        <div><button type="submit">AJOUTER CE MATCH</button></div>
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="formIdentifiant" value="ajout-match">
        <div>
        <?php require_once "php/controller/traitement-match.php" ?> 
        </div>
    </form>
</section>
