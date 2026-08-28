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
    <h1 class="upper"><span class="index line-color txt-white"><?php echo e($nb); ?> </span><?php echo e(__('pdf.vigueur.title')); ?></h1>

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
                                    <td class="label"><?php echo e(__('pdf.vigueur.asked_price')); ?></td>
                                    <td><?php echo e(money($fiche->comparable_vigueur_prix_demande)); ?></td>
                                </tr>

                                <tr>
                                    <td class="label"><?php echo e(__('pdf.vigueur.sale_date')); ?></td>
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
                                <?php echo e(__('pdf.vigueur.characteristics')); ?>

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
                                    <td class="label"><?php echo e(__('pdf.vigueur.property_type')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e(__('datas.type_propriete.' . $fiche->caracteristique_type_propriete)); ?></td>
                                                <td class="valeur sujet"><?php echo e(__('datas.type_propriete.' . $ficheMaster->caracteristique_type_propriete)); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.vigueur.building_type')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e(__('datas.type_batiment.' . $fiche->caracteristique_type_batiment)); ?></td>
                                                <td class="valeur sujet"><?php echo e(__('datas.type_batiment.' . $ficheMaster->caracteristique_type_batiment)); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.vigueur.construction_year')); ?></td>
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
                                    <td class="label"><?php echo e(__('pdf.vigueur.land_area')); ?></td>
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
                                    <td class="label"><?php echo e(__('pdf.vigueur.living_area')); ?></td>
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
                                    <td class="label"><?php echo e(__('pdf.vigueur.num_rooms')); ?></td>
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
                                    <td class="label"><?php echo e(__('pdf.vigueur.num_bedrooms')); ?></td>
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
                                    <td class="label"><?php echo e(__('pdf.vigueur.num_bathrooms')); ?></td>
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
                                    <td class="label"><?php echo e(__('pdf.vigueur.num_powder_rooms')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                             <tr>
                                                <td class="valeur"><?php echo e($fiche->caracteristique_nombre_salle_eau ? $fiche->caracteristique_nombre_salle_eau : "Non"); ?></td>
                                                <td class="valeur sujet"><?php echo e($ficheMaster->caracteristique_nombre_salle_eau ?  $ficheMaster->caracteristique_nombre_salle_eau : "Non"); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="label"><?php echo e(($ficheMaster->caracteristique_type_propriete=="condo")?__('pdf.vigueur.floor'):__('pdf.vigueur.floors')); ?>: </td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->caracteristique_etage); ?></td>
                                                <td class="valeur sujet"><?php echo e($ficheMaster->caracteristique_etage); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                
                                <?php if($fiche->caracteristique_stationnement>0 || $ficheMaster->caracteristique_stationnement>0): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.vigueur.parking')); ?></td>

                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">
                                                    <?php if($fiche->caracteristique_stationnement>0): ?>
                                                      <?php echo e($fiche->caracteristique_stationnement); ?>

                                                    <?php else: ?>
                                                    -
                                                    <?php endif; ?>
                                                </td>
                                                <td class="valeur sujet">
                                                    <?php if($ficheMaster->caracteristique_stationnement>0): ?>
                                                      <?php echo e($ficheMaster->caracteristique_stationnement); ?>

                                                    <?php else: ?>
                                                    -
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php endif; ?>


                                <?php if($fiche->caracteristique_garage>0 || $ficheMaster->caracteristique_garage>0): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.vigueur.garage')); ?></td>

                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">
                                                    <?php if($fiche->caracteristique_garage>0): ?>
                                                      <?php echo e($fiche->caracteristique_garage); ?>

                                                    <?php else: ?>
                                                    -
                                                    <?php endif; ?>
                                                </td>
                                                <td class="valeur sujet">
                                                    <?php if($ficheMaster->caracteristique_garage>0): ?>
                                                      <?php echo e($ficheMaster->caracteristique_garage); ?>

                                                    <?php else: ?>
                                                    -
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php endif; ?>

                                
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
                    <?php echo e(__('pdf.vigueur.asked_price_ratios')); ?>

                </p>
            </td>
        </tr>
        <tr>
            <td>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <?php echo e(__('pdf.vigueur.days_on_market')); ?>

                        </td>
                        <td class="middle">
                            <?php echo e(__('pdf.vigueur.ratio_asked_eval')); ?>

                        </td>
                        <td>
                            <?php echo e(__('pdf.vigueur.ratio_asked_sqft')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="txt-color"><?php echo e($fiche->jourSurLeMarche); ?> <?php echo e(__('pdf.vigueur.days')); ?></span>
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
                                <?php echo e(__('pdf.vigueur.geolocation')); ?>

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
</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/pdf/pages-unifamiliale/vigueur.blade.php ENDPATH**/ ?>