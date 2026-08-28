<style>
    .courtier-page.resume h1 {
        line-height: 30px;
        font-family: "lato";
        font-size: 18px;
        letter-spacing: 5px;
    }

    .courtier-page .img img {
        width: 100px;
    }

    .courtier-page.resume .texte {
        font-size: 14px;
    }

    .courtier-page.resume .texte b {
        margin-bottom: 0px;
        display: block;
    }

    .courtier-page .resume-table {
        margin-top: 10x;
        width: 100%;
        font-size: 16px;
    }

    .courtier-page .resume-table .txt-color {
        font-size: 16.2px;
    }

    .courtier-page .resume-table .bg-grey {
        width: 100%;
        margin-top: 0px;
        margin-top: -20px;
        margin-bottom: -20px;
    }

    .courtier-page .resume-table .bg-grey td {
        height: 30px;
        padding-right: 0px;
        vertical-align: middle;
    }

    .courtier-page .resume-table td:first-child {
        padding-right: 0px;
    }

    .courtier-page .resume-table .prix-moyen {
        font-size: 50px !important;
        text-align: center;
        vertical-align: middle;
        padding-top: 40px;
        padding-bottom: 40px;
        width: 40%;
    }
</style>
<div class="courtier-page resume">
    <h1 class="upper">Faits saillants et prix de vente probable</h1>
    <br />
    <div class="texte">
        <p>
            <b>Moyenne du ratios du prix de vente / prix demandé</b>
            <br />
            Les propriétés comparables choisies ce sont vendues en moyenne à <span class="txt-color"><?php echo e($ficheMaster->moyenneRatioVenteDemande); ?>%</span> du prix demandés.
        </p>
        <p>
            <b>Moyenne du ratios du prix de vente / évaluation municipale</b><br />
            Les propriétés comparables ce sont vendues en moyenne à <span class="txt-color"><?php echo e($ficheMaster->moyenneRatioVenteEvaluation); ?>%</span> du prix de l’évaluation municipales.
        </p>
        <p>
            <b>Prix moyen / pi2 habitable</b><br />
            En moyenne, les propriétés comparables ce sont vendues à <span class="txt-color"><?php echo e($ficheMaster->moyenneRatioPrixHabitableVendu); ?>$ / pi2 habitable.</span>
        </p>
        <p>
            <b>Prix moyen / pi2 de terrain</b><br />
            En moyenne, les propriétés comparables ce sont vendues à <span class="txt-color"><?php echo e($ficheMaster->moyenneRatioPrixTerrainVendu); ?>$ / pi2 de terrain.</span>
        </p>
        <p>
            <b>Délais de vente moyen</b><br />
            Le délais de vente moyen des propriétés comparables est de <span class="txt-color"><?php echo e($ficheMaster->moyenneJoursVente); ?> jours.</span>
        </p>
        <p>
            <b>Prix moyen</b><br />
            Le prix ajusté moyen est de <span class="txt-color"><?php echo e(money($ficheMaster->moyennePrixVente)); ?></span>
        </p>
    </div>
    <br /><br /><br />
    <p class="table-title full-width">Moyennes et calculs de valeur</p>
    <table class="resume-table" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <table class="bg-grey" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>Selon l’évaluation municipales:</td>
                        <td style="text-align:right;"><?php echo e(money($ficheMaster->prixSelonEvaluation)); ?></td>
                    </tr>
                    <tr>
                        <td>Selon le prix au pied carré habitable:</td>
                        <td style="text-align:right;"><?php echo e(money($ficheMaster->prixSelonSuperficieHabitable)); ?></td>
                    </tr>
                    <tr>
                        <td>Selon le prix au pied carré de terrain:</td>
                        <td style="text-align:right;"><?php echo e(money($ficheMaster->prixSelonSuperficieTerrain)); ?></td>
                    </tr>
                    <tr>
                        <td>Selon la moyenne des prix de vente:</td>
                        <td style="text-align:right;"><?php echo e(money($ficheMaster->moyennePrixVente)); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        
    </table>
</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/pdf/pages/resume-vendu.blade.php ENDPATH**/ ?>