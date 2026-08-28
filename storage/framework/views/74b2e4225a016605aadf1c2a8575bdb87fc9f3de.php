<style>
    .resume-vigueur {width:100%;}
    .resume-vigueur td{ width:33%;border:1px solid black;text-align:center;}
    .resume-vigueur .header td{
        padding:10px;
        font-family:"lato-bold";
        font-size:14px;
    }
    .resume-vigueur .description td{
        padding:20px 50px;
        font-size:13px;
    }
    .resume-vigueur .prices td{
        background-color:#ccc;
        font-size:25px;
        padding:10px;
    }
</style>
<div class="courtier-page resume">
    
    <?php if(!$ficheMaster->ne_pas_afficher_les_vigueurs): ?>      
     <h1 class="upper">Analyse sommaire des comparables en vigueur</h1>
  
    <br /> 
    <div class="texte">
        <p>
            <b>Moyenne des prix demandés</b>
            <br />
            Le prix demandé moyen est de <span class="txt-color"><?php echo e(money($ficheMaster->moyennePrixDemande)); ?></span>
        </p>
        <p>
            <b>Moyenne du ratios du prix demandé / évaluation municipale</b><br />
            En moyenne, les propriétés comparables en vigueurs sont affichées à <span class="txt-color"><?php echo e($ficheMaster->moyenneRatioDemandeEvaluation); ?>%</span> du prix de l’évaluation municipales.
        </p>
        <p>
            <b>Prix demandé moyen / pi2 habitable</b><br />
            En moyenne, les propriétés en vigueurs sont affichées à <span class="txt-color"><?php echo e($ficheMaster->moyenneRatioPrixHabitableVigueur); ?>$ / pi2 habitable.</span>
        </p>
        <p>
            <b>Prix demandé moyen / pi2 de terrain</b><br />
            En moyenne, les propriétés en vigueurs sont affichées à <span class="txt-color"><?php echo e($ficheMaster->moyenneRatioPrixTerrainVigueur); ?>$ / pi2 de terrain.</span>
        </p>
        <p>
            <b>Délais de mise en marché moyen</b><br />
            En moyenne, les propriétés comparables en vigueur sont sur le marché depuis <span class="txt-color"> <?php echo e($ficheMaster->moyenneJoursVigueur); ?> jours.</span>
        </p>

    </div>
    <br /><br /><br />
    <?php endif; ?>
    <?php if($ficheMaster->ne_pas_afficher_les_vigueurs): ?>      
    <h2 class="table-title no-padding full-width">Prix d’inscription suggéré selon les comparables vendu</h2>
    <?php else: ?>  
    <h2 class="table-title no-padding full-width">Prix d’inscription suggéré selon les comparables en vigueur</h2>
    <?php endif; ?>

   
    <br />
    <table class="resume-vigueur" cellpadding="0" cellspacing="0">
         <tr class="header line-color">
            <td class="txt-white upper">
                Motivé
            </td>
            <td class="txt-white upper">
               Réaliste
            </td>
            <td class="txt-white upper">
                Optimiste
            </td>
        </tr>
        <tr class="description">
            <td>
                Marge de négociation très mince.<br><br>
                Vente rapide pour vendeurs motivés.<br><br>
                Possibilité d’offres multiples<br><br>
            </td>
            <td>
                Marge de négociation modéré.<br><br>
                Prix plus près de la valeur réel de la propriété.<br><br>
                Vente dans les délais moyens.<br><br>
            </td>
            <td>
                Marge de négociation maximal.<br><br>
                Risque de brûler la propriété sur le marché.<br><br>
                Acheteurs motivés<br><br>
            </td>
        </tr>
        <tr class="prices">
            <td>
                <?php if($ficheMaster->prix_offensif): ?>
               <?php echo e(money($ficheMaster->prix_offensif)); ?>

               <?php else: ?>
               <br/>
               <?php endif; ?>
            </td>
            <td>
                <?php if($ficheMaster->prix_realiste): ?>
               <?php echo e(money($ficheMaster->prix_realiste)); ?>

               <?php else: ?>
               <br/>
               <?php endif; ?>
            </td>
            <td>
                <?php if($ficheMaster->prix_optimiste): ?>
               <?php echo e(money($ficheMaster->prix_optimiste)); ?>

               <?php else: ?>
               <br/>
               <?php endif; ?>
            </td>
        </tr>
    </table>
</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/pdf/pages/resume-vigueur.blade.php ENDPATH**/ ?>