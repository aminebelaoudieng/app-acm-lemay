<div class="cover-page page">
    <img class="cover-background" src="{{ $ficheMaster->streetviewPDF }}" />
    <div class="cover-shade"></div>

    <img class="cover-logo" src="{{ $user->logoHeaderPath }}" />

    <div class="cover-content">
        <span class="cover-kicker">{{ __('pdf.front.title') }}</span>
        <h1 class="cover-title">{{ __('pdf.market_analysis_title') }}</h1>
        <div class="cover-rule"></div>
        <p class="cover-address">
            {{ $ficheMaster->numero_civic }} {{ $ficheMaster->rue }}{{ ($ficheMaster->appartement) ? ' #'.$ficheMaster->appartement : '' }}<br />
            {{ $ficheMaster->ville }}, {{ $ficheMaster->province }} {{ $ficheMaster->code_postal }}
        </p>
        <p class="cover-slogan {{ (!$user->design_sans_plus) ? 'title-with-style' : '' }}">{{ $user->slogan }}</p>
    </div>

    <table class="cover-meta" cellpadding="0" cellspacing="0">
        <tr>
            <td width="31%">
                <span class="cover-meta-label">{{ __('pdf.prepared_by') }}</span><br />
                <span class="cover-meta-value">{{ $user->name }}</span><br />
                <span>{{ $user->poste }}{{ $user->compagnie ? ' · '.$user->compagnie : '' }}</span>
            </td>
            <td width="23%">
                <span class="cover-meta-label">{{ __('pdf.front.analysis_date') }}</span><br />
                <span class="cover-meta-value">{{ $ficheMaster->dateFormat }}</span><br />
                <span>{{ $ficheMaster->periodeMois }}</span>
            </td>
            <td width="27%">
                <span class="cover-meta-label">Contact</span><br />
                <span>{{ $user->adresse }}</span><br />
                <span>{{ $user->ville }} {{ $user->province }} {{ $user->code_postal }}</span><br />
                <span>{{ $user->telephone }}</span><br />
                <span>{{ $user->email }}</span><br />
                <span>{{ $user->siteweb }}</span>
            </td>
            <td width="19%" align="right">
                @if($user->imageHeaderPath)
                    <img class="cover-brand-image" src="{{ $user->imageHeaderPath }}" />
                @else
                    <img class="cover-brand-image" src="{{ $user->logoFooterPath }}" />
                @endif
            </td>
        </tr>
    </table>
</div>
