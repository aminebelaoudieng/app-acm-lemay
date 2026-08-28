<?php $__env->startSection('content'); ?>
<style>
    html,
    body {
        font-size: 12px;
        font-family: 'opensans', sans-serif;
    }

    * {
        vertical-align: top;
    }

    .page {
        max-width: 80%;
        margin: auto;
    }

    .page-break {
        page-break-after: always;
    }

    .clearfix {
        width: 100%;
        display: block;
        clear: both;
    }

    table {
        font-size: 90%;
    }

    .line {
        width: 100%;
        height: 1px;
        margin: auto;
        background-color: <?php echo e($user->color); ?>;
        margin: 20px auto;
        clear: both;
    }

    .bg-color {
        background-color: <?php echo e($user->color); ?>;
        color: white;
        padding: 5px 10px;
    }

    .txt-color {
        color: <?php echo e($user->color); ?>;
    }

    .line-color {
        background-color: <?php echo e($user->color); ?>;
    }

    .compagnie {
        margin: 300px auto;
    }

    .info {
        padding-top: 40px;
        padding-bottom: 20px;
        text-align: center;

    }

    .info.slogan {
        border-bottom: 1px solid white;
        text-transform: uppercase;
    }

    .info.logo {
        padding-top: 0px;
        padding-bottom: 40px;
    }

    .info.logo img {
        max-width: 100px;
    }
    .first-page {
        
        z-index:10;
    }
    .first-page .logo {
        max-width:150px;
        margin-top:-50px;
        margin-left:-80px;
    }
    .first-page .slogan{
        font-size:30px;
        font-family: "lato-bold";
        font-weight:"bold";
        letter-spacing:5px;
        text-align:center;
        position:absolute;
        top:400px;
        left:0px;
        right:0px;
        border:1px solid transparent;
        width:125%;
        display:block;
    }
  
    .first-page .compagnie{
        padding:0px;
        width:280px;
        position:absolute;
        bottom:300px;
    }
    .first-page .courtier .adresse{
        padding:0px;
        width:120px;
        text-align:right;
    }
    .first-page .courtier .adresse div,
    .first-page .courtier .infos div{
       display:flex;
       line-height:10px;
    }
    .first-page .courtier .adresse div p,
    .first-page .courtier .infos div p{
        padding-top:0px;
        padding-bottom:5px;
    }
  
    .first-page .courtier .infos{
        padding:0px;
        width:160px;
        line-height:10px;
    } 

    .first-page .courtier .infos div p{
       margin-left:20px;
       padding-left:20px;
       border-left:1px solid <?php echo e($user->color); ?>;
    }


    .background-dots{
        height:1150px;
        width:125%;
        position: absolute;
        left: -120px;
        right: -120px;
        top: -140px;
        bottom: -100px;
        padding:80px;
        z-index:-1;
    }
    .background-dots img{
        height:1150px;
        width:125%;
    }
    .title-with-style:before,
    .title-with-style:after{
        content: "+";
        display:inline;
        color: <?php echo e($user->color); ?>;
    }
      .title-with-style:before,
    .title-with-style:after{
        content: "+";
        display:inline;
        color: <?php echo e($user->color); ?>;
    } 
     .title-with-style{
        font-size:18px!important;
    }
    .line{
        margin-top:30px;
        width:80%;
        height:1px;
        background-color:#fff;
        margin-bottom:0px;
    }
</style>


    <div class="first-page page">

        <h1 class="slogan <?php echo e((!$user->design_sans_plus)?'title-with-style':''); ?>">
        <?php echo e($user->slogan); ?>

        </h1>
        
        <table class="bg-color compagnie" cellpadding="0" cellspacing="0">
            <tr>
                <td class="info adresse">
                    <b><?php echo e($user->adresse); ?></b>
                    <br />
                    <b><?php echo e($user->ville); ?></b>
                    <br />
                    <b><?php echo e($user->code_postal); ?></b>
                    <br /> <br />
                    <?php echo e($user->telephone); ?>

                    <br />
                    <?php echo e($user->email); ?>

                    <br />
                    <?php echo e($user->siteweb); ?>

                    <div class="line"></div>
                </td>
            </tr>
            <tr>
                <td class="info logo">
                    <img src="<?php echo e($user->logoFooterPath); ?>" />
                </td>
            </tr>
        </table>
    </div>

<div class="background-dots"><img src="<?php echo e(public_path('images/pdf/background-dots.png')); ?>" /></div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/pdf/pages/last.blade.php ENDPATH**/ ?>