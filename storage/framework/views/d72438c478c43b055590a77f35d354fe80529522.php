<div class="list-page">
    <h1 class="txt-center upper page-title"><?php echo e(__('pdf.list_vigueur_title')); ?></h1>
    <h2 class="txt-center upper page-sub-title vigueur"><?php echo e(__('pdf.list_vigueur_subtitle')); ?></h2>
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

            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
            <td class="line-color txt-white"><?php echo e(__('pdf.address')); ?></td>
            <td class="line-color txt-white info-fiche"><?php echo e($ficheMaster->numero_civic); ?><?php echo e(($ficheMaster->appartement)?" #".$ficheMaster->appartement:""); ?><br /><?php echo e($ficheMaster->rue); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="line-color txt-white info-fiche"><?php echo e($fiche->numero_civic); ?><?php echo e(($fiche->appartement)?" #".$fiche->appartement:""); ?><br /><?php echo e($fiche->rue); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>

        <tr>
            <td class="main-label"><?php echo e(__('pdf.city')); ?></td>
            <td class="info-fiche"><?php echo e($ficheMaster->ville); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e($fiche->ville); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>

        <?php
        $hasDivise=false;
        ?>
        <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(($fiche->type_copropriete=="divise")): ?>
        <?php
        $hasDivise=true;
        ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($ficheMaster->type_copropriete=="divise" || $hasDivise): ?>
        <tr>
            <td class="main-label"><?php echo e(__('pdf.municipal_evaluation')); ?></td>
            <td class="info-fiche"><?php if($ficheMaster->type_copropriete=="divise"): ?> <?php echo e(money($ficheMaster->evaluationTotale)); ?> <?php endif; ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php if(($fiche->type_copropriete=="divise")): ?> <?php echo e(money($fiche->comparable_vigueur_prix_evaluation)); ?> <?php endif; ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <?php endif; ?>

        <tr>
            <td class="main-label"><?php echo e(__('pdf.condo_type')); ?></td>
            <td class="info-fiche"><?php echo e(Config::get('datas.type_copropriete')[$ficheMaster->type_copropriete]['name']); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e(Config::get('datas.type_copropriete')[$fiche->type_copropriete]['name']); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label"><?php echo e(__('pdf.construction_year')); ?></td>
            <td class="info-fiche"><?php echo e($ficheMaster->caracteristique_annee_construction); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e($fiche->caracteristique_annee_construction); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label"><?php echo e(__('pdf.vigueur.living_area')); ?></td>
            <td class="info-fiche"><?php echo e($ficheMaster->caracteristique_superficie_habitable); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e($fiche->caracteristique_superficie_habitable); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label"><?php echo e(__('pdf.num_bedrooms')); ?></td>
            <td class="info-fiche"><?php echo e($ficheMaster->caracteristique_nombre_chambre); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e($fiche->caracteristique_nombre_chambre); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label"><?php echo e(__('pdf.list_vigueur_days_on_market')); ?></td>
            <td class="info-fiche">-</td>
            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e($fiche->jourSurLeMarche); ?> <?php echo e(__('pdf.days')); ?> </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label"><?php echo __('pdf.list_vigueur_price_sqft'); ?></td>
            <td class="info-fiche">-</td>
            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e($fiche->ratioPiedCarreHabitableVigueur); ?> $ /pi²</td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
    </table>
    <sup class="txt-center" style="margin-top:-20px;"><?php echo e(__('pdf.list_vigueur_note')); ?></sup>
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
                                <?php echo e(money($ficheMaster->moyenneRatioPrixHabitableVigueur*0.95)); ?> <span class="prix-moyen"><?php echo e(money($ficheMaster->moyenneRatioPrixHabitableVigueur)); ?></span><?php echo e(money($ficheMaster->moyenneRatioPrixHabitableVigueur*1.05)); ?>

                                <?php else: ?>
                                <?php echo e(money($ficheMaster->moyennePrixDemande*0.95)); ?> <span class="prix-moyen"><?php echo e(money($ficheMaster->moyennePrixDemande)); ?></span><?php echo e(money($ficheMaster->moyennePrixDemande*1.05)); ?>

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
                <p class="table-title" style="font-size:12px;"><?php echo __('pdf.likely_price_sqft'); ?></p>
                <p class="probablite"><?php echo __('pdf.probability_text_sqft', ['min' => money($ficheMaster->moyenneRatioPrixHabitableVigueur*0.95), 'max' => money($ficheMaster->moyenneRatioPrixHabitableVigueur*1.05)]); ?></p>

                <?php else: ?>
                <p class="table-title" style="font-size:12px;"><?php echo e(__('pdf.likely_price_sale')); ?></p>
                <p class="probablite"><?php echo __('pdf.probability_text_asked', ['min' => money($ficheMaster->moyennePrixDemande*0.95), 'max' => money($ficheMaster->moyennePrixDemande*1.05)]); ?></p>

                <?php endif; ?>
            </td>
        </tr>
    </table>
</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/pdf/pages-condo/list-vigueur.blade.php ENDPATH**/ ?>