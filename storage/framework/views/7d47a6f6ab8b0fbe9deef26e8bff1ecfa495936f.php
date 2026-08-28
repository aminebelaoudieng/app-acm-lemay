<style>

    .courtier-page .note .title {
        font-size:20px;
        margin-bottom: 50px;
        width:100%;
        display:block;
    }

    .courtier-page .note .text {
        line-height: 15px;
        margin-bottom: 20px;
        font-size:15px;
        text-align: justify;
    }

    .courtier-page .note {
        padding-top:0px;
    }
</style>

<div class="courtier-page page">
    <div class="note">
        <p class="title upper txt-center"><?php echo e(__('pdf.courtier_notes')); ?></p>
        <div class="text"><?php echo (($ficheMaster->note)); ?></div>
    </div>
</div>
<?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/pdf/pages/note.blade.php ENDPATH**/ ?>