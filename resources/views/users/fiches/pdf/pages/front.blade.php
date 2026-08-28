<style>
    .first-page .logo {
        max-width:150px;
        margin-top:-60px;
        margin-left:-20px;
    }
    .first-page .slogan{
        font-size:26px;
        font-family: "lato-bold";
        font-weight:"bold";
        letter-spacing:5px;
        text-align:center;
        margin-top:400px!important;
    }
    .first-page .image-header{
        margin-top:200px;
        margin-left:auto;
        margin-right:auto;
        position:relative;
        z-index:100000000;
        margin-bottom:100px;
        text-align:center;
    }
    .first-page .slogan.title-with-image-header{
 
        margin-top:0px!important;
    }
    .first-page .courtier{
        padding:0px;
        width:280px;
        position:absolute;
        right:0px;
        top:900px;
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
       border-left:1px solid {{ $user->color }};
    }

</style>

    <div class="first-page page">
        <img class="logo" src="{{  $user->logoHeaderPath }}" />
        @if($user->imageHeaderPath)
        <div class="image-header"><img  src="{{  $user->imageHeaderPath }}" height="300" />
        <h1 class="slogan  {{ ($user->imageHeaderPath)?'title-with-image-header':'' }} {{ (!$user->design_sans_plus)?'title-with-style':'' }}">
        {{ $user->slogan }}
        </h1>
        </div>
        @else
        <h1 class="slogan {{ (!$user->design_sans_plus)?'title-with-style':'' }}">
        {{ $user->slogan }}
        </h1>
        @endif
        <table class="courtier">
            <tr>
                <td class="adresse">
                    <div>
                    <p>
                        <b>
                        {{ $user->adresse }}<br/>
                        {{ $user->ville }} {{ $user->province }}<br/>
                        {{ $user->code_postal }}
                        </b>
                    </p>
                </div>
                </td>
                <td class="infos"> 
                    <div>
                         <p>
                            {{ $user->email }}
                            <br />
                            {{ $user->telephone }}
                            <br />
                            {{ $user->siteweb }}
                        </p>
                    </div>
                </td>
            </tr>

        </table>
    </div>
    <div class="background-dots"><img src="{{ public_path('images/pdf/background-dots.png') }}" /></div>