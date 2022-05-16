<?php
require_once "header.php";

if (isConnected()) {



    if (isset($_GET["id"])) {

        if (!empty($_GET["id"]))


            $id = strip_tags(htmlspecialchars($_GET['id']));

        // BDD   
        $edit = $bdd->prepare('SELECT * FROM membre WHERE id = :id');
        $edit->bindValue('id', $id);
        $edit->execute();
        $editMembre = $edit->fetch();

        $specialite = $editMembre['specialite'];



?>
        <section class="containerEdition">
            <div class="containerEdition-1">


                <div class="blocListeEdition">
                    <div class="blocInfoEdition">Sur une mission, la ou les agents ne peuvent pas avoir la même nationalité que le ou les cibles.</br>
                        Sur une mission, il faut assigner au moins 1 agent disposant de la spécialité requise.</br>
                        Sur une mission, les contacts sont obligatoirement de la nationalité du pays de la mission.</br>
                        Sur une mission, la planque est obligatoirement dans le même pays que la mission</div>
                    <div class="blocAdminBasEdition">

                        <div class="tableauListe">

                            <table class="Liste">
                                <tr>
                                    <th>Nom</th>
                                    <th>prenom</th>
                                    <th>Date Naissance</th>
                                    <th>Code</th>
                                    <th>Nationalité</th>
                                    <th>Spécialité</th>
                                    <th>Catégorie</th>
                                    <th>Valider</th>
                                </tr>

                                <tr>
                                    <form method="POST" action="test.php">
                                        <td class="tdStandard"><input class="ClassEdition" type="text" name="nom" value="<?php echo $editMembre['nom']; ?>"></td>
                                        <td class="tdStandard"><input class="ClassEdition" type="text" name="prenom" value="<?php echo $editMembre['prenom']; ?>"></td>
                                        <td class="tdStandard"><input class="ClassEdition" type="date" name="date_naissance" value="<?php echo $editMembre['date_naissance']; ?>"></td>
                                        <td class="tdStandard"><input class="ClassEdition" type="nubmer" name="code" value="<?php echo $editMembre['code']; ?>"></td>
                                        <td class="tdStandard"><input class="ClassEdition" type="text" name="nationalite" value="<?php echo $editMembre['nationalite']; ?>"></td>
                                        <td class="tdStandard">
                                            <select class="ClassEdition" id="specialite" name="specialite">
                                                <option value="discretion" name="discretion" selected>Discretion</option>
                                                <option value="sniper" name="sniper">Sniper</option>
                                                <option value="hack" name="hack">Hack</option>
                                                <option value="surveillance" name="surveillance">Surveillance</option>
                                                <option value="infiltration" name="infiltration">Infiltration</option>
                                            </select>
                                        </td>



                                        <td class="tdStandard">
                                            <select class="ClassEdition" id="ClassEdition" name="categorie">
                                                <option value="agent" name="agent" selected>Agent</option>
                                                <option value="cible" name="cible">Cible</option>
                                                <option value="contact" name="contact">Contact</option>
                                            </select>
                                        </td>
                                        <td class="tdStandard"><input class="ClassEditionBouton" type="submit" value="Valider"></td>
                                    </form>
                                </tr>
                            </table>




                            </br>
                            <table class="Liste">
                                <tr>

                                    <th>Mission disponible pour cet agent</th>
                                    <th>Attribuer</th>
                                </tr>

                                <tr>
                                    <form method="POST" action="testMission.php">
                                        <td class="tdStandard">
                                            <select class="ClassEdition" id="mission" name="mission">
                                                <?php
                                                //LISTE DES MISSIONS
                                                $missM = $bdd->prepare('SELECT * FROM mission WHERE specialite_requis = :specialite_requis');
                                                $missM->bindValue('specialite_requis', $specialite);
                                                $missM->execute();
                                                while ($missionMembre = $missM->fetch()) {

                                                ?>
                                                    <option value="<?php echo $missionMembre['nom']; ?>" name="<?php echo $missionMembre['id']; ?>" selected><?php echo $missionMembre['nom']; ?></option>
                                                <?php  }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="tdStandard"><input class="ClassEditionBouton" type="submit" value="Attribuer Mission"></td>
                                    </form>
                                </tr>
                            </table>

                        </div>

                    </div>
                </div>
            </div>

        </section>
<?php
    }
}
