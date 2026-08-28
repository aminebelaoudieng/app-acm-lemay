<style>
    .sub-sujet-page.vigueur .details-vente .label {
        display: inline-block;
        width: 140px !important;
    }

    .sub-sujet-page.vigueur .ratios table td {
        font-size: 12px;
    }

    .sub-sujet-page.fix-vigueur .details-vente {
        margin-top: 9px !important;
    }
</style>
<div class="sub-sujet-page  fix-vigueur sujet-page">
    <h1 class="upper"><span class="index line-color txt-white"><?php echo e($nb); ?> </span>Analyse détaillée du comparable vigueur</h1>

    <table class="details" cellpadding="0" cellspacing="0">
        <tr>
            <td class="left">
                <table class="first" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="adresse">
                          <p><?php echo e($fiche->numero_civic); ?><?php echo e(($fiche->appartement)?" #".$fiche->appartement:""); ?> <?php echo e($fiche->rue); ?>, <?php echo e($fiche->ville); ?>, <?php echo e($fiche->province); ?>, Canada, <?php echo e($fiche->code_postal); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="<?php echo e($fiche->streetviewPDF); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="details-vente bg-grey" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="label">Prix demandé</td>
                                    <td><?php echo e(money($fiche->comparable_vigueur_prix_demande)); ?></td>
                                </tr>

                                <tr>
                                    <td class="label">Date de mise en vente</td>
                                    <td><?php echo e(($fiche->comparable_vigueur_date_vente)); ?></td>
                                </tr>

                            </table>

                        </td>
                    </tr>
                </table>
            </td>
            <td class="right">
                <table class="first caracteristiques" cellpadding="0" cellspacing="0">
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
                                <tr class="thead bg-color">
                                    <td class="label"></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur header">Comparable</td>
                                                <td class="valeur sujet header">Sujet</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="label">Type de propriété:</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e(Config::get('datas.type_propriete')[$fiche->caracteristique_type_propriete]['name']); ?></td>
                                                <td class="valeur sujet"><?php echo e(Config::get('datas.type_propriete')[$ficheMaster->caracteristique_type_propriete]['name']); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">Type de bâtiment:</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e(Config::get('datas.type_batiment')[$fiche->caracteristique_type_batiment]['name']); ?></td>
                                                <td class="valeur sujet"><?php echo e(Config::get('datas.type_batiment')[$ficheMaster->caracteristique_type_batiment]['name']); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">Année de construction:</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->caracteristique_annee_construction); ?></td>
                                                <td class="valeur sujet"><?php echo e($ficheMaster->caracteristique_annee_construction); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"> Superficie du terrain (pi2):</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php if( $fiche->caracteristique_superficie_terrain): ?> <?php echo e($fiche->caracteristique_superficie_terrain); ?> <?php else: ?> - <?php endif; ?></td>
                                                <td class="valeur sujet"><?php if( $ficheMaster->caracteristique_superficie_terrain): ?> <?php echo e($ficheMaster->caracteristique_superficie_terrain); ?> <?php else: ?> - <?php endif; ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">Superficie habitable:</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php if( $fiche->caracteristique_superficie_habitable): ?> <?php echo e($fiche->caracteristique_superficie_habitable); ?> <?php else: ?> - <?php endif; ?></td>
                                                <td class="valeur sujet"><?php if( $ficheMaster->caracteristique_superficie_habitable): ?> <?php echo e($ficheMaster->caracteristique_superficie_habitable); ?> <?php else: ?> - <?php endif; ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">Nombre de pièces:</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->caracteristique_nombre_piece); ?></td>
                                                <td class="valeur sujet"><?php echo e($ficheMaster->caracteristique_nombre_piece); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">Nombre de chambres:</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->caracteristique_nombre_chambre); ?></td>
                                                <td class="valeur sujet"><?php echo e($ficheMaster->caracteristique_nombre_chambre); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">Nombre de salles de bain:</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->caracteristique_nombre_salle_de_bain); ?></td>
                                                <td class="valeur sujet"><?php echo e($ficheMaster->caracteristique_nombre_salle_de_bain); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">Nombre de salles d'eau:</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->caracteristique_nombre_salle_eau); ?></td>
                                                <td class="valeur sujet"><?php echo e($ficheMaster->caracteristique_nombre_salle_eau); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="label"><?php echo e(($ficheMaster->caracteristique_type_propriete=="condo")?"Étage":"Étages"); ?>: </td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->caracteristique_etage); ?></td>
                                                <td class="valeur sujet"><?php echo e($ficheMaster->caracteristique_etage); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">Garage:</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->caracteristique_garage); ?></td>
                                                <td class="valeur sujet"><?php echo e($ficheMaster->caracteristique_garage); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">Stationnement:</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->caracteristique_stationnement); ?></td>
                                                <td class="valeur sujet"><?php echo e($ficheMaster->caracteristique_stationnement); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table class="ratios" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <p class="table-title no-border">
                    Ratios du prix demandé
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            Nombre de jour sur le marché
                        </td>
                        <td class="middle">
                            Prix de demandé / Évaluation municipale
                        </td>
                        <td>
                            Prix demandé / pi<sup>2</sup>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="txt-color"><?php echo e($fiche->jourSurLeMarche); ?> jours</span>
                        </td>
                        <td class="middle">
                            <span class="txt-color"><?php echo e($fiche->ratioVenteVsEvaluation); ?> %</span>
                        </td>
                        <td>
                            <span class="txt-color"><?php echo e($fiche->ratioPiedCarreHabitableVigueur); ?> $</span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table class="" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <table class="geolocalisation full-width" cellpadding="0" cellspacing="0">
                    <tr class="tr-top">
                        <td>
                            <p class="table-title no-border">
                                Géolocalisation
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="img map">
                                <img class="map" src="<?php echo e($fiche->mapPDF); ?>">
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/pdf/pages/vigueur.blade.php ENDPATH**/ ?>