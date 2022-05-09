<?php


require_once "header.php";
require_once "..\includes/variable.php";

if (isConnected()) {


?>
    <html>

    <body>


        <section class="container3">
            <div class="container3-1">

                <div class="container3-2">
                    <div class="blocMissionHaut">
                        <div class="titreBlocMissionHaut"><?php echo "Mission numero : " . $Miss['nom'] . " ---||--- Code Mission : " . $Miss['code']; ?></div>
                    </div>
                    <div class="blocDetailMission">
                        <div class="blocDescriptionG">
                            <div class="blocDescriptionG-1">
                                <div class="blocTitreDescG-1">
                                    <div class="titreDescG-1">Description de la mission</div>
                                </div>

                                <div class="blocDescG-1">
                                    <div class="DescG-1"><?php echo  $Miss['description']; ?></div>
                                </div>
                            </div>
                        </div>
                        <!-- BLOC DE DROITE --->
                        <div class="blocInfoD">
                            <div class="blocDate">
                                <div class="blocDateDebut">
                                    <div class="date"><?php echo  "Date début contrat : " . $Miss['date_debut']; ?></div>
                                </div>
                                <div class="blocDateFin">
                                    <div class="date"><?php echo  "Date fin contrat : " . $Miss['date_fin']; ?></div>
                                </div>
                            </div>
                            <!-- Pays et specialite --->
                            <div class="blocI-1">
                                <div class="blocI-2">
                                    <div class="info"><?php echo  "Pays Mission : " . $Miss['pays']; ?></div>
                                </div>
                                <div class="blocI-2">
                                    <div class="info"><?php echo  "Spécialité : " . $Miss['specialite_requis']; ?></div>
                                </div>
                            </div>

                            <!--Agents, planque, cible etc.... --->
                            <div class="blocI-3">
                                <div class="blocI-3G">
                                    <div class="blocGeneral">
                                        <div class="titreBC">Agents engagé</div>
                                        <div class="infoBC">
                                            <?php
                                            while ($listeAgent = $LA->fetch()) {

                                                echo  "   " . $listeAgent['nom'] . "  ";
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="blocGeneral">
                                        <div class="titreBC">Cible</div>
                                        <div class="infoBC">
                                            <?php
                                            while ($cible = $C->fetch()) {

                                                echo  "   " . $cible['nom'] . "  ";
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="blocGeneral">
                                        <div class="titreBC">Contact</div>
                                        <div class="infoBC">
                                            <?php
                                            while ($contact = $Contact->fetch()) {

                                                echo  "   " . $contact['nom'] . "  ";
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="blocGeneral">
                                        <div class="titreBC">Planque</div>
                                        <div class="infoBC">
                                            <?php
                                            while ($planque = $P->fetch()) {

                                                echo  "   " . $planque['adresse'] . "  ";
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>

    </body>

    </html>

<?php

} else {
    header("Location: ..\index.php");
}
?>