<style>
    .sujet-page h1 {
        font-size: 26px;
    }

    .sujet-page .line {
        width: 100%;
        height: 1px;
        margin: auto;
        margin: 20px auto;
        clear: both;
    }

    .sujet-page table {
        width: 100%;
    }

    .sujet-page table td.left,
    .sujet-page table td.right {
        width: 50%;
    }

    .sujet-page table td.left {
        padding-right: 20px;
    }

    .sujet-page table td.right {
        padding-left: 20px;
    }

    h1,
    h2 {
        margin-top: 0px !important;
        margin-bottom: 0px !important;
    }

    .sujet-page table img {
        max-width: 350px;
    }

    .sujet-page table.first {
        margin-top: 60px;
    }

    .sujet-page .right table.first {
        margin-top: 44px;
    }

    .sujet-page .left .table-title {
        margin-bottom: -4px;
    }

    .sujet-page .adresse p {
        font-size: 18px;
        padding: 0px;
        line-height: 14px;
        margin-bottom: 25px;
        font-weight: bold;
    }

    .sujet-page .label {
        width: 55% !important;
    }


    .sujet-page .adresse .line {
        max-width: 40%;
    }

    .sujet-page .geo-title {
        margin-top: 45px;
        position: relative;
        z-index: 2;
    }

    .sujet-page .geolocalisation {
        margin-top: 10px;
    }

    .sujet-page .geolocalisation .img.map {
        max-width: 345px;
        height: 360px;
        overflow: hidden;
        border: 2px solid black;
        z-index: 1;
        margin-top: 10px;
    }

    .sujet-page .geolocalisation .img.map img {
        max-width: 340px;
        transform: scale(1.75);
    }
</style>
<div class="sujet-page">
    <h1 class="txt-center upper page-title">Description du sujet</h1>
    <div class="clearfix"></div>
    <table>
        <tr>
            <td class="left">
                <table class="first">
                    <tr>
                        <td>
                            <img src="<?php echo e($fiche->streetviewPDF); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="table-title geo-title">
                                Géolocalisation
                            </p>
                        </td>
                    </tr>
                    <tr class="geolocalisation">
                        <td class="">
                            <div class="img map">
                                <img class="mapPDF" src="<?php echo e($fiche->mapPDF); ?>">
                            </div>
                        </td>
                    </tr>
                </table>

            </td>
            <td class="right">
                <table class="first">
                    <tr>
                        <td class="adresse border-bottom">
                            <p class="upper"><?php echo e($fiche->numero_civic); ?> <?php echo e($fiche->rue); ?><?php echo e(($fiche->appartement)?" #".$fiche->appartement:""); ?>, <?php echo e($fiche->ville); ?>, <?php echo e($fiche->province); ?>, Canada, <?php echo e($fiche->code_postal); ?></p>
                        </td>
                    </tr>
                    <tr class="tr-top">
                        <td>
                            <p class="table-title center mt">
                                Évaluation municipale
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="bg-grey" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="label">Année du rôle:</td>
                                    <td class="valeur"><?php echo e($fiche->annee_role); ?></td>
                                </tr>
                                <tr>
                                    <td class="label">Évaluation du terrain:</td>
                                    <td class="valeur"><?php echo e(money($fiche->evaluation_terrain)); ?></td>
                                </tr>
                                <tr>
                                    <td class="label">Évaluation du bâtiment:</td>
                                    <td class="valeur"><?php echo e(money($fiche->evaluation_batiment)); ?></td>
                                </tr>
                                <tr>
                                    <td class="label">Évaluation totale:</td>
                                    <td class="valeur"><?php echo e(money($fiche->evaluationTotale)); ?></td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                    <tr class="tr-top">
                        <td>
                            <p class="table-title center">
                                Caractéristiques
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="bg-grey" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="label">Type de propriété:</td>
                                    <td class="valeur"><?php echo e(Config::get('datas.type_propriete')[$fiche->caracteristique_type_propriete]['name']); ?></td>
                                </tr>
                                <tr>
                                    <td class="label">Type de bâtiment:</td>
                                    <td class="valeur"><?php echo e(Config::get('datas.type_batiment')[$fiche->caracteristique_type_batiment]['name']); ?></td>
                                </tr>
                                <tr>
                                    <td class="label">Année de construction:</td>
                                    <td class="valeur"><?php echo e($fiche->caracteristique_annee_construction); ?></td>
                                </tr>
                                <tr>
                                    <td class="label"> Superficie du terrain (pi<sup>2</sup>):</td>
                                    <td class="valeur"><?php echo e($fiche->caracteristique_superficie_terrain); ?></td>
                                </tr>
                                <tr>
                                    <td class="label">Superficie habitable:</td>
                                    <td class="valeur"><?php echo e($fiche->caracteristique_superficie_habitable); ?></td>
                                </tr>

                                <tr>
                                    <td class="label">Nombre de pièces:</td>
                                    <td class="valeur"><?php echo e($fiche->caracteristique_nombre_piece); ?></td>
                                </tr>
                                <tr>
                                    <td class="label">Nombre de chambres:</td>
                                    <td class="valeur"><?php echo e($fiche->caracteristique_nombre_chambre); ?></td>
                                </tr>
                                <tr>
                                    <td class="label">Nombre de salles de bain:</td>
                                    <td class="valeur"><?php echo e($fiche->caracteristique_nombre_salle_de_bain); ?></td>
                                </tr>
                                <tr>
                                    <td class="label">Nombre de salles d'eau:</td>
                                    <td class="valeur"><?php echo e($fiche->caracteristique_nombre_salle_eau); ?></td>
                                </tr>
                                <tr>
                                    <td class="label"><?php echo e(($fiche->caracteristique_type_propriete=="condo")?"Étage":"Étages"); ?>:</td>
                                    <td class="valeur"><?php echo e($fiche->caracteristique_etage); ?></td>
                                </tr>
                                <tr>
                                    <td class="label">Garage:</td>
                                    <td class="valeur"><?php echo e($fiche->caracteristique_garage); ?></td>
                                </tr>
                                <tr>
                                    <td class="label">Stationnement:</td>
                                    <td class="valeur"><?php echo e($fiche->caracteristique_stationnement); ?></td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/pdf/pages/sujet.blade.php ENDPATH**/ ?>