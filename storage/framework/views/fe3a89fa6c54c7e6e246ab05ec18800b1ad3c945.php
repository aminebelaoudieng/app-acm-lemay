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

    .sujet-page .caracteristiques tr td,
    .sujet-page .caracteristiques tr {
        font-size: 11.5px;
        height: 25px;
        padding: 0px !important;
        padding-top: 3px !important;
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

    .sujet-page table.first.no-margin-top {
        margin-top: 10px;
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

    .sujet-page .rendement-title {
        margin-top: 22px;
        position: relative;
        z-index: 2;
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
        height: 220px;
        overflow: hidden;
        border: 2px solid black;
        z-index: 1;
        margin-top: 10px;
    }

    .sujet-page .geolocalisation .img.map img {
        max-width: 340px;
        margin-top: -20px;
        transform: scale(1.75);
    }

    .sujet-page .bg-grey.no-padding-top {
        padding-top: 0px;
    }
</style>
<div class="sujet-page">
    <h1 class="txt-center upper page-title"><?php echo e(__('pdf.subject_description')); ?></h1>
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
                            <p class="table-title rendement-title">
                                <?php echo e(__('pdf.returns')); ?>

                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="bg-grey no-padding-top caracteristiques" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.gross_income')); ?></td>
                                    <td class="valeur"><?php echo e(money($fiche->rendement_revenus_brut)); ?></td>
                                </tr>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.expenses')); ?></td>
                                    <td class="valeur"><?php echo e(money($fiche->rendement_depense)); ?></td>
                                </tr>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.net_income')); ?></td>
                                    <td class="valeur"><?php echo e(money(($fiche->rendement_revenus_brut-$fiche->rendement_depense))); ?></td>
                                </tr>

                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="table-title geo-title">
                                <?php echo e(__('pdf.geolocation')); ?>

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
                                <?php echo e(__('pdf.municipal_evaluation')); ?>

                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="bg-grey caracteristiques" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.role_year')); ?></td>
                                    <td class="valeur"><?php echo e($fiche->annee_role); ?></td>
                                </tr>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.land_evaluation')); ?></td>
                                    <td class="valeur"><?php echo e(money($fiche->evaluation_terrain)); ?></td>
                                </tr>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.building_evaluation')); ?></td>
                                    <td class="valeur"><?php echo e(money($fiche->evaluation_batiment)); ?></td>
                                </tr>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.total_evaluation')); ?></td>
                                    <td class="valeur"><?php echo e(money($fiche->evaluationTotale)); ?></td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                    <tr class="tr-top">
                        <td>
                            <p class="table-title center">
                                <?php echo e(__('pdf.characteristics')); ?>

                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="bg-grey caracteristiques" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.property_type')); ?></td>
                                    <td class="valeur"><?php echo e(__('datas.type_propriete.' . $fiche->caracteristique_type_propriete)); ?></td>
                                </tr>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.building_type')); ?></td>
                                    <td class="valeur"><?php echo e(__('datas.type_batiment.' . $fiche->caracteristique_type_batiment)); ?></td>
                                </tr>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.year_built')); ?></td>
                                    <td class="valeur"><?php echo e($fiche->caracteristique_annee_construction); ?></td>
                                </tr>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.land_area_sqft')); ?></td>
                                    <td class="valeur"><?php echo e($fiche->caracteristique_superficie_terrain); ?></td>
                                </tr>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.living_area')); ?></td>
                                    <td class="valeur"><?php echo e($fiche->caracteristique_superficie_habitable); ?></td>
                                </tr>


                                <?php if($fiche->caracteristique_stationnement>0): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.parking')); ?></td>
                                    <td class="valeur">
                                        <?php echo e($fiche->caracteristique_stationnement); ?>

                                    </td>
                                </tr>
                                <?php endif; ?>

                                <?php if($fiche->caracteristique_garage>0): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.garage')); ?></td>
                                    <td class="valeur">
                                        <?php echo e($fiche->caracteristique_garage); ?>

                                    </td>
                                </tr>
                                <?php endif; ?>

                                <?php if($fiche->categorie=="commercial" || $fiche->categorie=="mixte"): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.commercial_unit')); ?></td>
                                    <td class="valeur"><?php echo e($fiche->unites_commercial); ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if($fiche->categorie=="residentiel" || $fiche->categorie=="mixte" || $fiche->categorie=="residentiel"): ?>
                                <?php if($fiche->unites_residentiel_studio): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.studio_count')); ?></td>
                                    <td class="valeur"><?php echo e($fiche->unites_residentiel_studio); ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if($fiche->unites_residentiel_1): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.one_half_count')); ?></td>
                                    <td class="valeur"><?php echo e($fiche->unites_residentiel_1); ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if($fiche->unites_residentiel_2): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.two_half_count')); ?></td>
                                    <td class="valeur"><?php echo e($fiche->unites_residentiel_2); ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if($fiche->unites_residentiel_3): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.three_half_count')); ?></td>
                                    <td class="valeur"><?php echo e($fiche->unites_residentiel_3); ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if($fiche->unites_residentiel_4): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.four_half_count')); ?></td>
                                    <td class="valeur"><?php echo e($fiche->unites_residentiel_4); ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if($fiche->unites_residentiel_5): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.five_half_count')); ?></td>
                                    <td class="valeur"><?php echo e($fiche->unites_residentiel_5); ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if($fiche->unites_residentiel_6): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.six_half_count')); ?></td>
                                    <td class="valeur"><?php echo e($fiche->unites_residentiel_6); ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if($fiche->unites_residentiel_7): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.seven_half_count')); ?></td>
                                    <td class="valeur"><?php echo e($fiche->unites_residentiel_7); ?></td>
                                </tr>
                                <?php endif; ?>


                                <?php if($fiche->unites_residentiel_8): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.eight_half_count')); ?></td>
                                    <td class="valeur"><?php echo e($fiche->unites_residentiel_8); ?></td>
                                </tr>
                                <?php endif; ?>
                                <?php endif; ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.floor_count')); ?></td>
                                    <td class="valeur"><?php echo e($fiche->caracteristique_etage); ?></td>
                                </tr>

                                <?php if($fiche->type_finition): ?>
                                <tr>
                                    <td class="label"><?php echo e(__('pdf.interior_finish_quality')); ?></td>
                                    <td class="valeur"><?php echo e(__('datas.type_finition.' . $fiche->type_finition)); ?></td>
                                </tr>
                                <?php endif; ?>

                            </table>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/pdf/pages-plex/sujet.blade.php ENDPATH**/ ?>