<div class="list-page">
    <h1 class="txt-center upper page-title">Analyse des prix de ventes</h1>
    <h2 class="txt-center upper page-sub-title vigueur">Pour les inscriptions en vigueur sélectionnés</h2>
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
            <td class="line-color txt-white">Adresse</td>
            <td class="line-color txt-white info-fiche"><?php echo e($ficheMaster->numero_civic); ?><?php echo e(($ficheMaster->appartement)?" #".$ficheMaster->appartement:""); ?><br /><?php echo e($ficheMaster->rue); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="line-color txt-white info-fiche"><?php echo e($fiche->numero_civic); ?><?php echo e(($fiche->appartement)?" #".$fiche->appartement:""); ?><br /><?php echo e($fiche->rue); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>

        <tr>
            <td class="main-label">Ville</td>
            <td class="info-fiche"><?php echo e($ficheMaster->ville); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e($fiche->ville); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label">Évaluation municipale</td>
            <td class="info-fiche"><?php echo e(money($ficheMaster->evaluationTotale)); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e(money($fiche->comparable_vigueur_prix_evaluation)); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label">Genre de propriété</td>
            <td class="info-fiche"><?php echo e(Config::get('datas.type_propriete')[$ficheMaster->caracteristique_type_propriete]['name']); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e(Config::get('datas.type_propriete')[$fiche->caracteristique_type_propriete]['name']); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label">Type de bâtiment</td>
            <td class="info-fiche"><?php echo e(Config::get('datas.type_batiment')[$ficheMaster->caracteristique_type_batiment]['name']); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e(Config::get('datas.type_batiment')[$fiche->caracteristique_type_batiment]['name']); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label">Année construction</td>
            <td class="info-fiche"><?php echo e($ficheMaster->caracteristique_annee_construction); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e($fiche->caracteristique_annee_construction); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label">Superficie hors-sol</td>
            <td class="info-fiche"><?php echo e($ficheMaster->caracteristique_superficie_habitable); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e($fiche->caracteristique_superficie_habitable); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label">Nombre de chambre</td>
            <td class="info-fiche"><?php echo e($ficheMaster->caracteristique_nombre_chambre); ?></td>
            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e($fiche->caracteristique_nombre_chambre); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label">Nombre de jours en vente</td>
            <td class="info-fiche">-</td>
            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e($fiche->jourSurLeMarche); ?> jours </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="main-label">Prix au pi² selon<br />le prix de demandé*</td>
            <td class="info-fiche">-</td>
            <?php $__currentLoopData = $ficheMaster->fichesVigueur()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="info-fiche"><?php echo e($fiche->ratioPiedCarreHabitableVigueur); ?> $ /pi²</td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
    </table>
    <sup class="txt-center" style="margin-top:-20px;">* Le taux au pieds carrés est déterminé en fonction de la superficie hors-sol de la propriété comparable</sup>
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
                            <p class="txt-center txt-grey">Tendance centrale</p>
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <br /><br />
                <?php if($ficheMaster->use_moyenne_prix_pi2): ?>
                <p class="table-title" style="font-size:12px;">PRIX D'INSCRIPTION PROBABLE SELON LES PRIX PI<sup style="display:inline;">2</sup></p>
                <p class="probablite">Pour 7 acheteurs sur 10, le prix de vente probable de<br />
                    cette propriété se situe entre <?php echo e(money($ficheMaster->moyenneRatioPrixHabitableVigueur*0.95)); ?> et <?php echo e(money($ficheMaster->moyenneRatioPrixHabitableVigueur*1.05)); ?>.</p>

                <?php else: ?>
                <p class="table-title" style="font-size:12px;">PRIX D'INSCRIPTION PROBABLE SELON LES PRIX DE VENTE</p>
                <p class="probablite">Pour 7 acheteurs sur 10, le prix de vente probable de<br />
                    cette propriété se situe entre <?php echo e(money($ficheMaster->moyennePrixDemande*0.95)); ?> et <?php echo e(money($ficheMaster->moyennePrixDemande*1.05)); ?>.</p>

                <?php endif; ?>
            </td>
        </tr>
    </table>
</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/pdf/pages/list-vigueur.blade.php ENDPATH**/ ?>