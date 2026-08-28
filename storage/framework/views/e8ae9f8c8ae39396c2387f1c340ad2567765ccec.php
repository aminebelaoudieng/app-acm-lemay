<style>
.list-page .img div {
    max-width: 100px;
    margin: auto;
}

.list-page .img img {
    max-width: 100px;
}

.list-page .img span {
    position: absolute;
    width: 20px;
    height: 20px;
    color: #fff;
    display: block;
    text-align: center;
    line-height: 20px;
    font-size: 11px;
}

.list-page .img span img {
    max-width: 90%;
    display: inline;
    margin-top: 5px;
}


.list-page table.bg-grey {
    width: 100%;
    max-width: 100%;
}

.list-page table.bg-grey tr td {
    text-align: center;

    line-height: 13px;
    vertical-align: middle;
    border: 2px solid #ccc;
}

.list-page table.bg-grey {
    border-bottom: 2px solid #ccc;
    font-size: 11px;
}

.list-page table.bg-grey tr td.no-border {
    border: 0px !important;
}

.list-page sup {
    width: 100%;
    display: block;
    margin-bottom: 30px;
}

.list-page .page-title {
    margin-top: -10px;
    margin-bottom: 0px !important;
}

.list-page .page-sub-title {
    letter-spacing: 4px;
    font-family: "lato";
    font-weight: "normal";
    padding-bottom: 5px;
}

.list-page .graph {
    width: 280px;
    margin-right: 40px;
}

.list-page .graph img {
    width: 100%;
}

.list-page .graph p {
    margin-top: 0px;
    margin-bottom: 0px;
}

.list-page .prix-moyen {
    margin-left: 40px;
    margin-right: 40px;
}

.list-page .graph .infos {
    border: 2px solid #ccc;
    padding: 3px 0px;
    ;
}

.list-page .probablite {
    font-size: 12px;
}

.list-page td.txt-white.main-label {
    width: 170px !important;
    padding: 28px 0px;
    font-size: 12px;
}

.list-page td.txt-white {
    font-family: "lato-bold";
    font-size: 11px;
}

.list-page td.info-fiche {
    font-size: 11px;
    padding: 5px 0px !important;
}
</style>
<div class="list-page">
    <h1 class="txt-center upper page-title"><?php echo e(__('pdf.sales_price_analysis')); ?></h1>
    <h2 class="txt-center upper page-sub-title"><?php echo e(__('pdf.for_selected_comparables')); ?></h2>
    <div class="clearfix"></div>
    <table class="bg-grey" cellpadding="0" cellspacing="0">
        <tr>
            <td class="first-col no-border main-label">&nbsp;</td>
            <td class="img no-border info-fiche">
                <div>
                    <span class="line-color"> <img src="<?php echo e(public_path('images/pdf/home.png')); ?>" /></span>
                    <img src="<?php echo e($ficheMaster->streetviewPDF); ?>">
                </div>
            </td>
            <?php
            $nb=1;
            ?>

            <?php $__currentLoopData = $ficheMaster->fichesVendu()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="img no-border info-fiche">
                <div>
                    <span class="line-color"><?php echo e($nb); ?></span><img src="<?php echo e($fiche->streetviewPDF); ?>">
                </div>
            </td>
            <?php
            $nb++;
            ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>

        <tr>
            <td class="line-color txt-white main-label"><?php echo e(__('pdf.address')); ?></td>
            <td class="line-color txt-white info-fiche"><?php echo e($ficheMaster->numero_civic); ?><?php echo e(($ficheMaster->appartement)?" #".$ficheMaster->appartement:""); ?><br /><?php echo e($ficheMaster->rue); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVendu()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="line-color txt-white info-fiche"><?php echo e($fiche->numero_civic); ?><?php echo e(($fiche->appartement)?" #".$fiche->appartement:""); ?><br /><?php echo e($fiche->rue); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>

        <tr>
            <td class="main-label"><?php echo e(__('pdf.city')); ?></td>
            <td class="info-fiche"><?php echo e($ficheMaster->ville); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVendu()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e($fiche->ville); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label"><?php echo e(__('pdf.municipal_evaluation')); ?></td>
            <td class="info-fiche"><?php echo e(money($ficheMaster->evaluationTotale)); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVendu()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e(money($fiche->comparable_vendu_prix_evaluation)); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label"><?php echo e(__('pdf.sold_price')); ?></td>
            <td class="info-fiche"><?php echo e(money($ficheMaster->comparable_vendu_prix_vente)); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVendu()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e(money($fiche->comparable_vendu_prix_vente)); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label"><?php echo e(__('pdf.building_type')); ?></td>
            <td class="info-fiche"><?php echo e(__('datas.type_batiment.' . $fiche->caracteristique_type_batiment)); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVendu()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e(__('datas.type_batiment.' . $fiche->caracteristique_type_batiment)); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label"><?php echo e(__('pdf.year_built')); ?></td>
            <td class="info-fiche"><?php echo e($ficheMaster->caracteristique_annee_construction); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVendu()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e($fiche->caracteristique_annee_construction); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label"><?php echo e(__('pdf.living_area')); ?></td>
            <td class="info-fiche"><?php echo e($ficheMaster->caracteristique_superficie_habitable); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVendu()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e($fiche->caracteristique_superficie_habitable); ?> pi²</td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label"><?php echo e(__('pdf.sale_listing')); ?></td>
            <td class="info-fiche">-</td>
            <?php $__currentLoopData = $ficheMaster->fichesVendu()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e($fiche->comparable_vendu_date_vente); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label"><?php echo e(__('pdf.sale_delay')); ?></td>
            <td class="info-fiche">-</td>
            <?php $__currentLoopData = $ficheMaster->fichesVendu()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e($fiche->comparable_vendu_delais_vente); ?> jours </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label"><?php echo e(__('pdf.requested_price')); ?></td>
            <td class="info-fiche">-</td>
            <?php $__currentLoopData = $ficheMaster->fichesVendu()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e(money($fiche->comparable_vendu_prix_demande)); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label"><?php echo e(__('pdf.price_per_sqft_sale')); ?>*</td>
            <td class="info-fiche">-</td>
            <?php $__currentLoopData = $ficheMaster->fichesVendu()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e($fiche->ratioPiedCarreHabitableVendu); ?> $ /pi²</td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>

        <tr>
            <td class="main-label"><?php echo e(__('pdf.gross_income')); ?></td>
            <td class="info-fiche"><?php echo e(money($ficheMaster->rendement_revenus_brut)); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVendu()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e(money($fiche->rendement_revenus_brut)); ?> </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label"><?php echo e(__('pdf.expenses')); ?></td>
            <td class="info-fiche"><?php echo e(money($ficheMaster->rendement_depense)); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVendu()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e(money($fiche->rendement_depense)); ?> </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label"><?php echo e(__('pdf.net_income')); ?></td>
            <td class="info-fiche"><?php echo e(money($ficheMaster->rendement_revenus_brut-$ficheMaster->rendement_depense)); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVendu()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e(money($fiche->rendement_revenus_brut-$fiche->rendement_depense)); ?> </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
    </table>
    <sup class="txt-center" style="margin-top:-20px;"><?php echo e(__('pdf.price_per_sqft_note')); ?></sup>
    <table>
        <tr>
            <td>
                <table class="graph" cellpadding="0" cellspacing="0">
                    <tr>
                        <td><img src="<?php echo e(public_path('images/pdf/graph.png')); ?>" /></td>
                    </tr>
                    <tr>
                        <td class="infos">
                            <p class="txt-center">
                                <?php if($ficheMaster->use_moyenne_prix_pi2): ?>
                                <?php echo e(money($ficheMaster->moyenneRatioPrixHabitableVendu*0.95)); ?> <span class="prix-moyen"><?php echo e(money($ficheMaster->moyenneRatioPrixHabitableVendu)); ?></span><?php echo e(money($ficheMaster->moyenneRatioPrixHabitableVendu*1.05)); ?>


                                <?php else: ?>
                                <?php echo e(money($ficheMaster->moyennePrixVente*0.95)); ?> <span class="prix-moyen"><?php echo e(money($ficheMaster->moyennePrixVente)); ?></span><?php echo e(money($ficheMaster->moyennePrixVente*1.05)); ?>

                                <?php endif; ?>
                            </p>
                            <p class="txt-center txt-grey"><?php echo e(__('pdf.central_tendency')); ?></p>
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <br /><br />
                <?php if($ficheMaster->use_moyenne_prix_pi2): ?>
                <p class="table-title" style="font-size:12px;"><?php echo e(__('pdf.probable_listing_price_sqft')); ?></p>
                <p class="probablite"><?php echo e(__('pdf.probable_sale_price_7_of_10', ['min' => money($ficheMaster->moyenneRatioPrixHabitableVendu*0.95), 'max' => money($ficheMaster->moyenneRatioPrixHabitableVendu*1.05)])); ?></p>

                <?php else: ?>
                <p class="table-title" style="font-size:12px;"><?php echo e(__('pdf.probable_listing_price_requested')); ?></p>
                <p class="probablite"><?php echo e(__('pdf.probable_sale_price_7_of_10', ['min' => money($ficheMaster->moyennePrixVente*0.95), 'max' => money($ficheMaster->moyennePrixVente*1.05)])); ?></p>
                <?php endif; ?>
            </td>
        </tr>
    </table>
</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/pdf/pages-plex/list-vendu.blade.php ENDPATH**/ ?>