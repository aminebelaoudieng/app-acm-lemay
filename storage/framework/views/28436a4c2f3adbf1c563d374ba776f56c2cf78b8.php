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
    <h1 class="upper"><span class="index line-color txt-white"><?php echo e($nb); ?> </span><?php echo e(__('pdf.detailed_analysis_active')); ?></h1>

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
                                <?php if($fiche->type_copropriete=="divise"): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.municipal_evaluation')); ?></td>
                                    <td><?php echo e(money($fiche->comparable_vigueur_prix_evaluation)); ?></td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.requested_price')); ?></td>
                                    <td><?php echo e(money($fiche->comparable_vigueur_prix_demande)); ?></td>
                                </tr>

                                <tr>
                                    <td class="label"><?php echo e(__('pdf.sale_listing_date')); ?></td>
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
                                <?php echo e(__('pdf.characteristics')); ?>

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
                                                <td class="valeur sujet header"><?php echo e(__('pdf.subject')); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="label"><?php echo e(__('pdf.condo_type')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e(Config::get('datas.type_copropriete')[$fiche->type_copropriete]['name']); ?></td>
                                                <td class="valeur sujet"><?php echo e(Config::get('datas.type_copropriete')[$ficheMaster->type_copropriete]['name']); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="label"><?php echo e(__('pdf.year_built')); ?></td>
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
                                    <td class="label"><?php echo e(__('pdf.living_area')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php if( $fiche->caracteristique_superficie_habitable): ?> <?php echo e($fiche->caracteristique_superficie_habitable); ?> <?php else: ?> - <?php endif; ?></td>
                                                <td class="valeur sujet"><?php if( $ficheMaster->caracteristique_superficie_habitable): ?> <?php echo e($ficheMaster->caracteristique_superficie_habitable); ?> <?php else: ?> - <?php endif; ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <?php if($fiche->caracteristique_stationnement>0 || $ficheMaster->caracteristique_stationnement>0): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.parking')); ?></td>

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
                                    <td class="label"><?php echo e(__('pdf.garage')); ?></td>

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


                                
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.room_count')); ?></td>
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
                                    <td class="label"><?php echo e(__('pdf.bedroom_count')); ?></td>
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
                                    <td class="label"><?php echo e(__('pdf.bathroom_count')); ?></td>
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
                                    <td class="label"><?php echo e(__('pdf.powder_room_count')); ?></td>
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
                                    <td class="label"><?php echo e(($ficheMaster->caracteristique_type_propriete=="condo")?__('pdf.floor'):__('pdf.floors')); ?>: </td>
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
                                    <td class="label"><?php echo e(__('pdf.view')); ?> </td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">
                                                    <?php if($fiche->type_vue): ?>
                                                    <?php echo e(__('datas.type_vue.' . $fiche->type_vue)); ?>

                                                    <?php else: ?>
                                                    <?php echo e(__('pdf.no_view')); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td class="valeur sujet">
                                                    <?php if($ficheMaster->type_vue): ?>
                                                    <?php echo e(__('datas.type_vue.' . $ficheMaster->type_vue)); ?>

                                                    <?php else: ?>
                                                    <?php echo e(__('pdf.no_view')); ?>

                                                    <?php endif; ?>
                                                </td>
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
                    <?php echo e(__('pdf.requested_price_ratios')); ?>

                </p>
            </td>
        </tr>
        <tr>
            <td>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <?php echo e(__('pdf.days_on_market')); ?>

                        </td>
                        <?php if($fiche->type_copropriete=="divise"): ?>
                        <td class="middle">
                            <?php echo e(__('pdf.requested_vs_municipal_evaluation')); ?>

                        </td>
                        <?php endif; ?>
                        <td>
                            <?php echo e(__('pdf.requested_vs_sqft')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="txt-color"><?php echo e($fiche->jourSurLeMarche); ?> jours</span>
                        </td>
                        <?php if($fiche->type_copropriete=="divise"): ?>
                        <td class="middle">
                            <span class="txt-color"><?php echo e($fiche->ratioVenteVsEvaluation); ?> %</span>
                        </td>
                        <?php endif; ?>
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
                    <?php echo e(__('pdf.geolocation')); ?>

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
</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/pdf/pages-condo/vigueur.blade.php ENDPATH**/ ?>