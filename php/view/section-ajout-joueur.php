
<section>
    <h2>Voici le formulaire pour ajouter un joueur</h2>
</section>

<section>
    <h3>Vous devez le compléter et cliquez sur le bouton</h3>
    <form method="POST" action="#form-create" id="form-create">
        <label>
            <span>Email</span>
            <input type="email" name="email" required placeholder="EMAIL" maxlength="160">
        </label>
        <label>
            <span>Pseudo</span>
            <input type="text" name="nickname" required placeholder="PSEUDO" maxlength="160">
        </label>
        <div><button type="submit">AJOUTER CE JOUEUR</button></div>
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="formIdentifiant" value="ajout-joueur">
        <div>
        <?php require_once "php/controller/traitement-joueur.php" ?> 
        </div>
    </form>
</section>
