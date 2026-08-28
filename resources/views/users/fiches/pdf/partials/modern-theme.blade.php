{{--
    Modern visual layer for the ACM PDF.
    This partial intentionally contains CSS only: all Blade variables, calculations,
    conditionals, database queries and normal-distribution graph markup stay in the
    original views.
--}}
<style>
    @font-face {
        font-family: "opensans-modern";
        font-style: normal;
        font-weight: normal;
        src: url({{ public_path('fonts/OpenSans.ttf') }}) format('truetype');
    }

    @font-face {
        font-family: "opensans-modern";
        font-style: normal;
        font-weight: bold;
        src: url({{ public_path('fonts/OpenSans_Bold.ttf') }}) format('truetype');
    }

    html,
    body {
        color: #111111 !important;
        background-color: #f7f5f1 !important;
        font-family: "opensans-modern", "opensans", sans-serif !important;
        font-size: 11px !important;
        line-height: 1.45;
    }

    .page,
    .sujet-page,
    .sub-sujet-page,
    .list-page,
    .courtier-page.resume {
        padding: 28px 34px !important;
    }

    .background-dots {
        display: none !important;
    }

    .modern-pdf-footer {
        position: fixed;
        left: 34px;
        right: 34px;
        bottom: 12px;
        border-top: 1px solid #dedad3;
        color: #76716a;
        font-size: 7px;
        line-height: 14px;
        z-index: 1000;
    }

    .modern-pdf-footer-title {
        float: right;
    }

    .txt-color {
        color: {{ $pdfAccent }} !important;
    }

    .line,
    .line-color {
        background-color: {{ $pdfAccent }} !important;
    }

    .border-bottom {
        border-bottom-color: {{ $pdfAccent }} !important;
    }

    .bg-color {
        background-color: {{ $pdfAccent }} !important;
        color: #ffffff !important;
    }

    h1.page-title,
    .courtier-page.resume h1,
    .sub-sujet-page h1 {
        color: #111111 !important;
        font-family: "opensans-modern", sans-serif !important;
        font-size: 23px !important;
        font-weight: bold !important;
        letter-spacing: -0.4px !important;
        line-height: 1.15 !important;
        text-align: left !important;
        text-transform: none !important;
        margin: 0 0 24px 0 !important;
        padding: 0 0 10px 13px !important;
        border-left: 4px solid {{ $pdfAccent }} !important;
        border-bottom: 1px solid #dedad3 !important;
    }

    .table-title {
        color: #111111 !important;
        border-bottom: 1px solid {{ $pdfAccent }} !important;
        font-family: "opensans-modern", sans-serif !important;
        font-size: 11px !important;
        font-weight: bold !important;
        letter-spacing: .2px !important;
        text-transform: none !important;
    }

    .bg-grey {
        background-color: #ffffff !important;
        border: 1px solid #dedad3 !important;
        border-radius: 8px;
    }

    .bg-grey td {
        border-bottom: 1px solid #ebe7e1 !important;
        padding: 7px 9px !important;
    }

    .bg-grey tr:last-child td {
        border-bottom: 0 !important;
    }

    /* Cover */
    .cover-page {
        position: relative;
        height: 960px;
        margin: -8px;
        padding: 0 !important;
        overflow: hidden;
        color: #ffffff;
        background-color: #111111;
    }

    .cover-page .cover-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        min-height: 960px;
        z-index: 1;
    }

    .cover-page .cover-shade {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, .60);
        z-index: 2;
    }

    .cover-page .cover-logo {
        position: absolute;
        top: 46px;
        left: 48px;
        max-width: 155px;
        max-height: 90px;
        z-index: 3;
    }

    .cover-page .cover-content {
        position: absolute;
        top: 310px;
        left: 50px;
        width: 520px;
        z-index: 3;
    }

    .cover-page .cover-kicker {
        display: inline-block;
        color: #ffffff;
        border: 1px solid {{ $pdfAccent }};
        border-radius: 9px;
        font-size: 8px;
        font-weight: bold;
        letter-spacing: 1px;
        padding: 5px 10px;
        text-transform: uppercase;
    }

    .cover-page .cover-title {
        color: #ffffff;
        font-family: "opensans-modern", sans-serif;
        font-size: 36px;
        font-weight: bold;
        letter-spacing: -1.2px;
        line-height: 1.05;
        margin: 16px 0 12px 0;
        max-width: 450px;
    }

    .cover-page .cover-rule {
        width: 54px;
        height: 5px;
        margin: 0 0 18px 0;
        background-color: {{ $pdfAccent }};
    }

    .cover-page .cover-address {
        color: #ffffff;
        font-size: 13px;
        line-height: 1.35;
        margin: 0;
    }

    .cover-page .cover-slogan {
        color: #ffffff;
        font-size: 10px;
        font-weight: bold;
        letter-spacing: .3px;
        margin: 12px 0 0 0;
    }

    .cover-page .cover-slogan.title-with-style:before,
    .cover-page .cover-slogan.title-with-style:after {
        color: {{ $pdfAccent }};
        content: "+";
        display: inline;
    }

    .cover-page .cover-meta {
        position: absolute;
        left: 50px;
        right: 50px;
        bottom: 48px;
        width: 600px;
        color: #ffffff;
        background-color: rgba(17, 17, 17, .82);
        border-top: 3px solid {{ $pdfAccent }};
        z-index: 3;
    }

    .cover-page .cover-meta td {
        padding: 14px 16px;
        vertical-align: middle;
    }

    .cover-page .cover-meta .cover-meta-label {
        color: {{ $pdfAccent }};
        font-size: 7px;
        font-weight: bold;
        letter-spacing: .5px;
        text-transform: uppercase;
    }

    .cover-page .cover-meta .cover-meta-value {
        font-size: 10px;
        font-weight: bold;
    }

    .cover-page .cover-brand-image {
        max-width: 135px;
        max-height: 62px;
    }

    /* Subject summary */
    .front-page .page-title {
        margin-bottom: 22px !important;
    }

    .front-page .img {
        background-color: #ffffff;
        border: 1px solid #dedad3;
        border-radius: 10px;
        padding: 8px;
    }

    .front-page .img img {
        margin-top: 0 !important;
        width: 100% !important;
        max-height: 450px;
        box-shadow: none !important;
    }

    .front-page .infos {
        margin-top: 18px !important;
        border: 1px solid #dedad3;
        background-color: #ffffff;
    }

    .front-page .infos td {
        border: 0 !important;
        border-right: 1px solid #dedad3 !important;
    }

    .front-page .infos td:last-child {
        border-right: 0 !important;
    }

    .front-page .infos .thead {
        background-color: #111111 !important;
        color: #ffffff !important;
    }

    .front-page .infos .thead td {
        font-size: 11px !important;
        font-weight: bold;
        padding: 11px 14px !important;
        text-align: left !important;
    }

    .front-page .infos .labels td {
        color: #77716b !important;
        font-size: 7px;
        font-weight: bold;
        letter-spacing: .3px;
        padding: 10px 12px 2px 12px !important;
        text-transform: uppercase;
    }

    .front-page .infos .data td {
        color: #111111;
        font-size: 12px !important;
        font-weight: bold;
        padding: 3px 12px 12px 12px !important;
    }

    /* Broker page */
    .broker-page .profile {
        background-color: #111111;
        border-radius: 12px;
        color: #ffffff;
        min-height: 165px;
        padding: 22px;
    }

    .broker-page .profile .img {
        width: 150px !important;
    }

    .broker-page .profile .img img {
        width: 120px !important;
        border: 3px solid {{ $pdfAccent }} !important;
        border-radius: 60px !important;
    }

    .broker-page .profile .infos {
        color: #ffffff;
        line-height: 1.25 !important;
        padding-top: 18px !important;
    }

    .broker-page .profile .infos .preparedby {
        color: {{ $pdfAccent }} !important;
        font-size: 8px;
        letter-spacing: 1px !important;
    }

    .broker-page .profile .infos .name {
        color: #ffffff;
        font-size: 18px;
        letter-spacing: 0 !important;
        line-height: 1.2 !important;
    }

    .broker-page .intro {
        padding-top: 42px !important;
    }

    .broker-page .intro .title {
        color: #111111;
        border-left: 4px solid {{ $pdfAccent }};
        border-bottom: 1px solid #dedad3;
        font-size: 22px !important;
        font-weight: bold;
        line-height: 1.2;
        padding: 0 0 10px 13px !important;
        text-transform: none !important;
    }

    .broker-page .intro .text {
        color: #3f3b37;
        font-size: 12px !important;
        line-height: 1.6 !important;
        margin-top: 24px;
        text-align: left !important;
    }

    .broker-page .signature {
        border-left: 3px solid {{ $pdfAccent }};
        line-height: 1.3 !important;
        margin-top: 24px;
        padding-left: 12px;
    }

    /* Property description */
    .subject-overview-page .page-title {
        margin-bottom: 20px !important;
    }

    .subject-overview-page table.first {
        margin-top: 18px !important;
    }

    .subject-overview-page .right table.first {
        margin-top: 18px !important;
    }

    .subject-overview-page table img {
        border-radius: 8px;
        max-width: 340px !important;
    }

    .subject-overview-page .adresse {
        background-color: #111111;
        border: 0 !important;
        border-radius: 8px;
        padding: 13px !important;
    }

    .subject-overview-page .adresse p {
        color: #ffffff;
        font-size: 13px !important;
        line-height: 1.35 !important;
        margin: 0 !important;
        text-transform: none !important;
    }

    .subject-overview-page .table-title.center,
    .subject-overview-page .geo-title {
        color: #111111;
        margin: 24px 0 0 0 !important;
        padding: 0 0 7px 0;
    }

    .subject-overview-page .geolocalisation .img.map {
        border: 1px solid #dedad3 !important;
        border-radius: 8px;
        height: 330px !important;
        padding: 5px;
    }

    /* Comparable list tables and the normal-law graph.
       The graph image and every Blade formula remain untouched. */
    .list-page .page-title {
        margin-bottom: 5px !important;
    }

    .list-page .page-sub-title {
        color: #77716b;
        font-family: "opensans-modern", sans-serif !important;
        font-size: 9px;
        font-weight: bold !important;
        letter-spacing: .8px !important;
        margin: 0 0 17px 17px !important;
        text-align: left !important;
    }

    .list-page table.bg-grey {
        border: 1px solid #dedad3 !important;
        border-bottom: 1px solid #dedad3 !important;
        font-size: 9px !important;
    }

    .list-page table.bg-grey tr td {
        border: 0 !important;
        border-bottom: 1px solid #ebe7e1 !important;
        border-right: 1px solid #ebe7e1 !important;
        color: #24211f;
        line-height: 1.25 !important;
        padding: 5px 4px !important;
    }

    .list-page table.bg-grey tr td:last-child {
        border-right: 0 !important;
    }

    .list-page table.bg-grey tr:last-child td {
        border-bottom: 0 !important;
    }

    .list-page table.bg-grey td.line-color {
        color: #ffffff !important;
        background-color: #111111 !important;
    }

    .list-page .img span.line-color {
        background-color: {{ $pdfAccent }} !important;
        border-radius: 10px;
    }

    .list-page td.txt-white.main-label {
        padding: 12px 4px !important;
    }

    .list-page .graph {
        width: 300px !important;
        margin: 16px 22px 0 0 !important;
        padding: 12px !important;
        background-color: #ffffff;
        border: 1px solid #dedad3;
        border-radius: 10px;
    }

    .list-page .graph img {
        width: 100% !important;
    }

    .list-page .graph .infos {
        color: #111111;
        border: 0 !important;
        border-top: 1px solid #dedad3 !important;
        padding: 9px 2px 3px 2px !important;
    }

    .list-page .graph .prix-moyen {
        color: {{ $pdfAccent }};
        font-size: 12px;
        font-weight: bold;
        margin-left: 18px !important;
        margin-right: 18px !important;
    }

    .list-page .graph .txt-grey {
        color: #8b857e !important;
        font-size: 8px;
        letter-spacing: .4px;
        text-transform: uppercase;
    }

    .list-page .probablite {
        color: #3f3b37;
        background-color: #ffffff;
        border: 1px solid #dedad3;
        border-left: 4px solid {{ $pdfAccent }};
        border-radius: 8px;
        font-size: 11px !important;
        line-height: 1.5;
        padding: 12px 14px;
    }

    /* Individual comparable pages */
    .sub-sujet-page h1 span.index {
        background-color: {{ $pdfAccent }} !important;
        border-radius: 16px;
        font-size: 11px;
        margin-right: 10px !important;
    }

    .sub-sujet-page .adresse p {
        color: #111111;
        font-family: "opensans-modern", sans-serif !important;
        font-size: 13px !important;
        font-style: normal;
        line-height: 1.3;
        text-transform: none !important;
    }

    .sub-sujet-page .details-vente,
    .sub-sujet-page .caracteristiques .bg-grey {
        background-color: #ffffff !important;
        border: 1px solid #dedad3 !important;
        border-top: 3px solid {{ $pdfAccent }} !important;
        border-radius: 8px;
    }

    .sub-sujet-page .ratios table tr td {
        background-color: #111111;
        border: 1px solid #2e2e2e !important;
        color: #ffffff;
    }

    .sub-sujet-page .ratios .txt-color {
        color: {{ $pdfAccent }} !important;
        font-weight: bold;
    }

    .sub-sujet-page .geolocalisation .img.map {
        border: 1px solid #dedad3 !important;
        border-radius: 8px;
        padding: 5px;
    }

    /* Results and recommendation pages */
    .courtier-page.resume .texte {
        margin-bottom: 18px;
    }

    .courtier-page.resume .texte p {
        background-color: #ffffff;
        border: 1px solid #dedad3;
        border-left: 3px solid {{ $pdfAccent }};
        border-radius: 7px;
        color: #4b4641;
        font-size: 10px;
        line-height: 1.35;
        margin: 0 0 8px 0;
        padding: 9px 12px;
    }

    .courtier-page.resume .texte p b {
        color: #111111;
        font-size: 10px;
    }

    .courtier-page .resume-table {
        background-color: #ffffff;
        border: 1px solid #dedad3;
        border-radius: 9px;
    }

    .courtier-page .resume-table .bg-grey {
        border: 0 !important;
    }

    .resume-vigueur {
        border-collapse: separate !important;
        border-spacing: 8px 0 !important;
        width: 100% !important;
    }

    .resume-vigueur td {
        border: 1px solid #dedad3 !important;
        width: 33% !important;
    }

    .resume-vigueur .header td {
        color: #ffffff !important;
        background-color: #111111 !important;
        border-color: #111111 !important;
        font-size: 10px !important;
        padding: 12px 8px !important;
    }

    .resume-vigueur .header td:nth-child(2) {
        background-color: {{ $pdfAccent }} !important;
        border-color: {{ $pdfAccent }} !important;
    }

    .resume-vigueur .description td {
        background-color: #ffffff;
        color: #4b4641;
        font-size: 10px !important;
        line-height: 1.45;
        padding: 18px 13px !important;
    }

    .resume-vigueur .prices td {
        background-color: #f1eee9 !important;
        color: #111111;
        font-size: 18px !important;
        font-weight: bold;
        padding: 14px 8px !important;
    }

    .resume-vigueur .prices td:nth-child(2),
    .resume-vigueur .prices td:nth-child(2) .txt-color {
        color: {{ $pdfAccent }} !important;
    }

    /* Section dividers, broker notes and annexes */
    .first-page .slogan.intro {
        position: absolute !important;
        top: 390px !important;
        left: 75px !important;
        right: 75px !important;
        width: auto !important;
        margin: 0 !important;
        padding: 30px 25px !important;
        color: #ffffff !important;
        background-color: #111111;
        border-left: 7px solid {{ $pdfAccent }} !important;
        border-radius: 12px;
        font-family: "opensans-modern", sans-serif !important;
        font-size: 25px !important;
        font-weight: bold;
        letter-spacing: -.4px !important;
        line-height: 1.2;
        text-align: left !important;
        text-transform: none !important;
    }

    .courtier-page .note {
        min-height: 760px;
        background-color: #ffffff;
        border: 1px solid #dedad3;
        border-top: 5px solid {{ $pdfAccent }};
        border-radius: 10px;
        padding: 24px 28px;
    }

    .courtier-page .note .title {
        color: #111111;
        border-bottom: 1px solid #dedad3;
        font-size: 22px;
        font-weight: bold;
        padding-bottom: 12px;
        text-align: left !important;
        text-transform: none !important;
    }

    .courtier-page .note .text {
        color: #3f3b37;
        font-size: 12px;
        line-height: 1.6;
        padding-top: 18px;
    }
</style>
