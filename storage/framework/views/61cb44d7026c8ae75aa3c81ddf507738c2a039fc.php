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
                    <tr class="tr-top ">
                        <td>
                            <p class="table-title no-border">
                                <?php echo e(__('pdf.geolocation')); ?>

                            </p>
                        </td>
                    </tr>
                    <tr class="geolocalisation">
                        <td>
                            <div class="img map map-sided">
                                <img class="map" src="<?php echo e($fiche->mapPDF); ?>">
                            </div>
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
                                                <td class="valeur sujet header">Sujet</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.property_type')); ?></td>
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
                                    <td class="label"><?php echo e(__('pdf.building_type')); ?></td>
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
                                    <td class="label"><?php echo e(__('pdf.land_area_sqft')); ?></td>
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


                                <?php if($ficheMaster->categorie=="commercial" || $ficheMaster->categorie=="mixte"): ?>
                                <?php if($fiche->unites_commercial || $ficheMaster->unites_commercial): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.commercial_unit')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->unites_commercial); ?></td>
                                                <td class="valeur sujet"> <?php echo e($ficheMaster->unites_commercial); ?> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php if($ficheMaster->categorie=="residentiel" || $ficheMaster->categorie=="mixte" || $ficheMaster->categorie=="residentiel"): ?>
                                <?php if($fiche->unites_residentiel_studio || $ficheMaster->unites_residentiel_studio): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.studio_count')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->unites_residentiel_studio); ?></td>
                                                <td class="valeur sujet"> <?php echo e($ficheMaster->unites_residentiel_studio); ?> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php endif; ?>

                                <?php if($fiche->unites_residentiel_1 || $ficheMaster->unites_residentiel_1): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.one_half_count')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->unites_residentiel_1); ?></td>
                                                <td class="valeur sujet"> <?php echo e($ficheMaster->unites_residentiel_1); ?> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php endif; ?>

                                <?php if($fiche->unites_residentiel_2 || $ficheMaster->unites_residentiel_2): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.two_half_count')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->unites_residentiel_2); ?></td>
                                                <td class="valeur sujet"> <?php echo e($ficheMaster->unites_residentiel_2); ?> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php endif; ?>


                                <?php if($fiche->unites_residentiel_3 || $ficheMaster->unites_residentiel_3): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.three_half_count')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->unites_residentiel_3); ?></td>
                                                <td class="valeur sujet"> <?php echo e($ficheMaster->unites_residentiel_3); ?> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php endif; ?>

                                <?php if($fiche->unites_residentiel_4 || $ficheMaster->unites_residentiel_4): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.four_half_count')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->unites_residentiel_4); ?></td>
                                                <td class="valeur sujet"> <?php echo e($ficheMaster->unites_residentiel_4); ?> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php endif; ?>

                                <?php if($fiche->unites_residentiel_5 || $ficheMaster->unites_residentiel_5): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.five_half_count')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->unites_residentiel_5); ?></td>
                                                <td class="valeur sujet"> <?php echo e($ficheMaster->unites_residentiel_5); ?> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php endif; ?>


                                <?php if($fiche->unites_residentiel_6 || $ficheMaster->unites_residentiel_6): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.six_half_count')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->unites_residentiel_6); ?></td>
                                                <td class="valeur sujet"> <?php echo e($ficheMaster->unites_residentiel_6); ?> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php endif; ?>

                                <?php if($fiche->unites_residentiel_7 || $ficheMaster->unites_residentiel_7): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.seven_half_count')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->unites_residentiel_7); ?></td>
                                                <td class="valeur sujet"> <?php echo e($ficheMaster->unites_residentiel_7); ?> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php endif; ?>

                                <?php if($fiche->unites_residentiel_8 || $ficheMaster->unites_residentiel_8): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.eight_half_count')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->unites_residentiel_8); ?></td>
                                                <td class="valeur sujet"> <?php echo e($ficheMaster->unites_residentiel_8); ?> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <?php endif; ?>

                                <tr>
                                    <td class="label"><?php echo e(__('pdf.floor_count')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e($fiche->caracteristique_etage); ?></td>
                                                <td class="valeur sujet"><?php echo e($ficheMaster->caracteristique_etage); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>







                            </table>

                        </td>
                    </tr>

                    <tr class="tr-top">
                        <td>
                            <p class="table-title center">
                                <?php echo e(__('pdf.returns')); ?>

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
                                    <td class="label"><?php echo e(__('pdf.gross_income')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e(money($fiche->rendement_revenus_brut)); ?></td>
                                                <td class="valeur sujet"><?php echo e(money($ficheMaster->rendement_revenus_brut)); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.expenses')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e(money($fiche->rendement_depense)); ?></td>
                                                <td class="valeur sujet"><?php echo e(money($ficheMaster->rendement_depense)); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="label"><?php echo e(__('pdf.net_income')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e(money(($fiche->rendement_revenus_brut-$fiche->rendement_depense))); ?></td>
                                                <td class="valeur sujet"><?php echo e(money(($ficheMaster->rendement_revenus_brut-$ficheMaster->rendement_depense))); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="label"><?php echo e(__('pdf.mrb')); ?></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e((($fiche->MRB))); ?></td>
                                                <td class="valeur sujet">-</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="label">MRN:</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e((($fiche->MRN))); ?></td>
                                                <td class="valeur sujet">-</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>



                                <tr>
                                    <td class="label">Cap Rate:</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur"><?php echo e((($fiche->CAP))); ?>%</td>
                                                <td class="valeur sujet">-</td>
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
                        <td class="middle">
                            <?php echo e(__('pdf.requested_vs_municipal_evaluation')); ?>

                        </td>
                        <td>
                            <?php echo e(__('pdf.requested_vs_sqft')); ?>

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

</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/pdf/pages-plex/vigueur.blade.php ENDPATH**/ ?>