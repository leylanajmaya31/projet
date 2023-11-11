<?php ob_start()?>
<form action="" method="post" >
        <label for="nom_recette"> Nom de la recette *</label>
        <input type="text" id="nom_recette" name="nom_recette" required>
        <div class="radio-container">
            <label for="niveau_recette"> Niveau de difficulté *</label>
            <div class="radio-group">
                <input type="radio" id="debutant" name="niveau_recette" value="debutant"> <label for="debutant"> Débutant</label>
                <input type="radio" id="intermediaire" name="niveau_recette" value="intermediaire"> <label for="intermediaire">Intermédiaire</label>
                <input type="radio" id="expert" name="niveau_recette" value="expert"> <label for="expert"> Expert</label>
            </div>
        </div>
        <label for="description_recette"> Description de la recette *</label>
        <textarea id="description_recette" name="description_recette" placeholder="Ex: Faire fondre le chocolat" required></textarea>
        <label for="portion_recette"> Nombre de portion </label>
        <input type="number" id="portion" name="portion_recette"></input>
        <label for="temps_recette"> Temps de cuisson </label>
        <input type="time" id="temps" name="temps_recette">
        <button type="submit"> SOUMETTRE LA RECETTE </button>
    </form>
    <p><?=$error?></p>
<?php $content = ob_get_clean()?>