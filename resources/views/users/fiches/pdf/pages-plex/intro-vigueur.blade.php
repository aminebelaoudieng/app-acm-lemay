<style>
      
    .title-with-style.intro{
        font-size:17px!important;
        font-family: "lato";
    }
  
</style>

    <div class="first-page page">
        <h1 class="slogan {{ (!$user->design_sans_plus)?'title-with-style':'' }} intro upper">
        {{ __('pdf.active_comparables_analysis') }}
        </h1>
    </div>

<div class="background-dots"><img src="{{ public_path('images/pdf/background-dots.png') }}" /></div>