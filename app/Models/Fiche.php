<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Fiche extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'type',
        'intro',
        'note',
        'but',
        'date',
        'periode',
        'adresse',
        'ville',
        'province',
        'numero_civic',
        'appartement',
        'type_copropriete',
        'rue',
        'code_postal',
        'annee_role',
        'evaluation_terrain',
        'evaluation_batiment',
        'moyenne_prix_vendu',
        'use_moyenne_prix_pi2',
        'ne_pas_afficher_les_vigueurs',
        'caracteristique_type_propriete',
        'caracteristique_type_batiment',
        'caracteristique_annee_construction',
        'caracteristique_superficie_terrain',
        'caracteristique_superficie_habitable',
        'prix_au_pied_carre_terrain',
        'caracteristique_garage',
        'caracteristique_stationnement',
        'caracteristique_type_stationnement',
        'caracteristique_nombre_piece',
        'caracteristique_nombre_chambre',
        'caracteristique_nombre_salle_de_bain',
        'caracteristique_nombre_salle_eau',
        'caracteristique_etage',
        'comparable_vendu_prix_demande',
        'comparable_vendu_prix_vente',
        'comparable_vendu_date_vente',
        'comparable_vendu_delais_vente',
        'comparable_vendu_prix_evaluation',
        'comparable_vigueur_prix_evaluation',
        'comparable_vigueur_prix_demande',
        'comparable_vigueur_date_vente',
        'prix_offensif',
        'prix_realiste',
        'prix_optimiste',
        'map_lat',
        'map_lng',
        'map_zoom',
        'street_heading',
        'street_pitch',
        'street_zoom',
        'street_lat',
        'street_lng',
        'categorie',
        'type_vue',
        'type_finition',
        'unites_commercial',
        'unites_residentiel_studio',
        'unites_residentiel_1',
        'unites_residentiel_2',
        'unites_residentiel_3',
        'unites_residentiel_4',
        'unites_residentiel_5',
        'unites_residentiel_6',
        'unites_residentiel_7',
        'unites_residentiel_8',
        'rendement_revenus_brut',
        'rendement_depense',
    ];

  
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            self::truncateData($model);
        });
        self::updating(function ($model) {
            self::truncateData($model);
        });
    }

    public static function truncateData($model)
    {
        if ($model->moyenne_prix_vendu) {
            $model->moyenne_prix_vendu = preg_replace('/\s/', '', $model->moyenne_prix_vendu);
        }
        if ($model->evaluation_terrain) {
            $model->evaluation_terrain = preg_replace('/\s/', '', $model->evaluation_terrain);
        }
        if ($model->evaluation_batiment) {
            $model->evaluation_batiment = preg_replace('/\s/', '', $model->evaluation_batiment);
        }
        if ($model->comparable_vendu_prix_demande) {
            $model->comparable_vendu_prix_demande = preg_replace('/\s/', '', $model->comparable_vendu_prix_demande);
        }
        if ($model->comparable_vendu_prix_evaluation) {
            $model->comparable_vendu_prix_evaluation = preg_replace('/\s/', '', $model->comparable_vendu_prix_evaluation);
        }
        if ($model->comparable_vendu_prix_vente) {
            $model->comparable_vendu_prix_vente = preg_replace('/\s/', '', $model->comparable_vendu_prix_vente);
        }
        if ($model->comparable_vigueur_prix_demande) {
            $model->comparable_vigueur_prix_demande = preg_replace('/\s/', '', $model->comparable_vigueur_prix_demande);
        }
        if ($model->comparable_vigueur_prix_evaluation) {
            $model->comparable_vigueur_prix_evaluation = preg_replace('/\s/', '', $model->comparable_vigueur_prix_evaluation);
        }
        if ($model->prix_au_pied_carre_terrain) {
            $model->prix_au_pied_carre_terrain = preg_replace('/\s/', '', $model->prix_au_pied_carre_terrain);
        }
        if ($model->prix_offensif) {
            $model->prix_offensif = preg_replace('/\s/', '', $model->prix_offensif);
        }
        if ($model->prix_realiste) {
            $model->prix_realiste = preg_replace('/\s/', '', $model->prix_realiste);
        }
        if ($model->prix_optimiste) {
            $model->prix_optimiste = preg_replace('/\s/', '', $model->prix_optimiste);
        }
        if ($model->caracteristique_superficie_terrain) {
            $model->caracteristique_superficie_terrain = preg_replace('/\s/', '', $model->caracteristique_superficie_terrain);
        }
        if ($model->caracteristique_superficie_habitable) {
            $model->caracteristique_superficie_habitable = preg_replace('/\s/', '', $model->caracteristique_superficie_habitable);
        }

        if ($model->rendement_revenus_brut) {
            $model->rendement_revenus_brut = preg_replace('/\s/', '', $model->rendement_revenus_brut);
        }
        if ($model->rendement_depense) {
            $model->rendement_depense = preg_replace('/\s/', '', $model->rendement_depense);
        }

        return $model;
    }
    /**
     * Get the fiches vigeur for the fiche post.
     */
    public function user()
    {
        return $this->belongsTo('App\User')->first();
    }
    /**
     * Get the fiches vigeur for the fiche post.
     */
    public function annexes()
    {
        return $this->hasMany('App\Annexe', 'fiche_id');
    }

    /**
     * Get the fiches vigeur for the fiche post.
     */
    public function fichesVendu()
    {
        return $this->belongsToMany('App\FicheVendu', 'fiche_relations', 'fiche_master_id', 'fiche_id')->where('type', 'vendu');
    }
    /**
     * Get the fiches vigeur for the fiche post.
     */
    public function fichesVigueur()
    {
        return $this->belongsToMany('App\FicheVigueur', 'fiche_relations', 'fiche_master_id', 'fiche_id')->where('type', 'vigueur');
    }

    public function getMapAttribute()
    {
        return asset('uploads/maps/' . md5($this->id) . ".png?t=" . md5($this->updated_at));
    }
    public function getStreetViewAttribute()
    {
        return asset('uploads/streetview/' . md5($this->id) . ".png?t=" . md5($this->updated_at));
    }

    public function getStreetViewPdfAttribute()
    {
        return public_path('uploads/streetview/' . md5($this->id) . ".png?t=" . md5($this->updated_at));
    }

    public function getMapPdfAttribute()
    {
        return public_path('uploads/maps/' . md5($this->id) . ".png?t=" . md5($this->updated_at));
    }

    public function getPeriodeMoisAttribute()
    {
        // Use Laravel's translation system for the unit
        $unit = __('pdf.months');
        return $this->periode . ' ' . $unit;
    }
    public function getEvaluationTotaleAttribute()
    {
        return $this->evaluation_terrain + $this->evaluation_batiment;
    }

    public function getMoyenneRatioVenteDemandeAttribute()
    {
        $fichesVendu = $this->fichesVendu()->get();
        $ratio = 0;
        foreach ($fichesVendu as $fiche) {
            $ratio += $fiche->ratioVenteVsDemande;
        }
        if ($ratio <= 0) {
            return 1;
        }
        if (!count($fichesVendu)) {
            return 1;
        } else {
            return number_format($ratio / count($fichesVendu), 1,".","");
        }
    }

    public function getMoyennePrixDemandeAttribute()
    {
        $fichesVigueur = $this->fichesVigueur()->get();
        $ratio = 0;
        foreach ($fichesVigueur as $fiche) {
            $ratio += $fiche->comparable_vigueur_prix_demande;
        }
        if ($ratio <= 0) {
            return 1;
        }
        if (!count($fichesVigueur)) {
            return 1;
        } else {
            return round($ratio / count($fichesVigueur));
        }
    }


    public function getMoyenneRatioVenteEvaluationAttribute()
    {
        $fichesVendu = $this->fichesVendu()->get();
        $ratio = 0;
        foreach ($fichesVendu as $fiche) {
            $ratio += $fiche->ratioVenteVsEvaluation;
        }
        if ($ratio <= 0) {
            return 1;
        }
        if (!count($fichesVendu)) {
            return 1;
        } else {
            return number_format($ratio / count($fichesVendu),1,".","");
        }
    }
    public function getMoyenneRatioDemandeEvaluationAttribute()
    {
        $fichesVigueur = $this->fichesVigueur()->get();
        $ratio = 0;
        foreach ($fichesVigueur as $fiche) {
            $ratio += $fiche->ratioVenteVsEvaluation;
        }
        if ($ratio <= 0) {
            return 1;
        }
        if (!count($fichesVigueur)) {
            return 1;
        } else {
            return number_format($ratio / count($fichesVigueur), 1,".","");
        }
    }

    public function getMoyenneRatioPrixHabitableVenduAttribute()
    {
        $fichesVendu = $this->fichesVendu()->get();
        $ratio = 0;
        foreach ($fichesVendu as $fiche) {
            $ratio += $fiche->ratioPiedCarreHabitableVendu;
        }
        if ($ratio <= 0) {
            return 1;
        }
        if (!count($fichesVendu)) {
            return 1;
        } else {
            return round($ratio / count($fichesVendu), 1);
        }
    }

    public function getMoyenneRatioPrixTerrainVenduAttribute()
    {
        $fichesVendu = $this->fichesVendu()->get();
        $ratio = 0;
        foreach ($fichesVendu as $fiche) {
            $ratio += $fiche->ratioPiedCarreTerrainVendu;
        }
        if ($ratio <= 0) {
            return 1;
        }
        if (!count($fichesVendu)) {
            return 1;
        } else {
            return round($ratio / count($fichesVendu));
        }
    }

    public function getMoyenneRatioPrixHabitableVigueurAttribute()
    {
        $fichesVigueur = $this->fichesVigueur()->get();
        $ratio = 0;
        foreach ($fichesVigueur as $fiche) {
            $ratio += $fiche->ratioPiedCarreHabitableVigueur;
        }
        if ($ratio <= 0) {
            return 1;
        }
        if (!count($fichesVigueur)) {
            return 1;
        } else {
            return round($ratio / count($fichesVigueur), 1);
        }
    }

    public function getMoyenneRatioPrixTerrainVigueurAttribute()
    {
        $fichesVigueur = $this->fichesVigueur()->get();
        $ratio = 0;
        foreach ($fichesVigueur as $fiche) {
            $ratio += $fiche->ratioPiedCarreTerrainVigueur;
        }
        if ($ratio <= 0) {
            return 1;
        }
        if (!count($fichesVigueur)) {
            return 1;
        } else {
            return round($ratio / count($fichesVigueur));
        }
    }

    public function getMoyenneJoursVenteAttribute()
    {
        $fichesVendu = $this->fichesVendu()->get();
        $ratio = 0;
        foreach ($fichesVendu as $fiche) {
            $ratio += $fiche->comparable_vendu_delais_vente;
        }
        if ($ratio <= 0) {
            return 1;
        }
        if (!count($fichesVendu)) {
            return 1;
        } else {
            return round($ratio / count($fichesVendu));
        }
    }
    public function getMoyenneJoursVigueurAttribute()
    {
        $fichesVigueur = $this->fichesVigueur()->get();
        $ratio = 0;
        foreach ($fichesVigueur as $fiche) {
            $ratio += $fiche->jourSurLeMarche;
        }
        if ($ratio <= 0) {
            return 1;
        }


        if (!count($fichesVigueur)) {
            return 1;
        } else {
            return round($ratio / count($fichesVigueur));
        }
    }
    
    public function getMoyennePrixVenteSelonEvaluationMunicipaleAttribute()
    {

        $fichesVendu = $this->fichesVendu()->get();

        $ratio = 0;
        foreach ($fichesVendu as $fiche) {
            $ratio += $fiche->comparable_vendu_prix_evaluation;
        }
        if ($ratio <= 0) {
            return 1;
        }
        if (!count($fichesVendu)) {
            return 1;
        } else {
            return round($ratio / count($fichesVendu));
        }
    }
    
    
    public function getMoyennePrixVenteAttribute()
    {

        $fichesVendu = $this->fichesVendu()->get();

        $ratio = 0;
        foreach ($fichesVendu as $fiche) {
            $ratio += $fiche->comparable_vendu_prix_vente;
        }
        if ($ratio <= 0) {
            return 1;
        }
        if (!count($fichesVendu)) {
            return 1;
        } else {
            return round($ratio / count($fichesVendu));
        }
    }

    public function getPrixSelonEvaluationAttribute()
    {
        return ($this->evaluationTotale * $this->moyenneRatioVenteEvaluation / 100);
    }

    public function getPrixSelonVenteAttribute()
    {
        return ($this->evaluationTotale * $this->moyenneRatioVenteDemande / 100);
    }

    public function getPrixSelonSuperficieHabitableAttribute()
    {
        if (!is_numeric($this->caracteristique_superficie_habitable)) {
            return 1;
        }
        return ($this->caracteristique_superficie_habitable * $this->moyenneRatioPrixHabitableVendu);
    }


    public function getPrixSelonSuperficieTerrainAttribute()
    {
        if(isset($this->prix_au_pied_carre_terrain) && $this->prix_au_pied_carre_terrain){
            return $this->prix_au_pied_carre_terrain;
        }
        
        if (!is_numeric($this->caracteristique_superficie_terrain)) {
            return 1;
        }

        return ($this->caracteristique_superficie_terrain * $this->moyenneRatioPrixTerrainVendu);
    }

    public function getPrixVenteSelonMoyenneAttribute()
    {
        return money(($this->prixSelonEvaluation + $this->prixSelonSuperficieHabitable + $this->prixSelonSuperficieTerrain + $this->moyennePrixVente) / 4);
    }


    public function getMoyenneMRBAttribute()
    {
        $fichesVendu = $this->fichesVendu()->get();
        $ratio = 0;
        foreach ($fichesVendu as $fiche) {
            $ratio += $fiche->MRB;
        }
        if ($ratio <= 0) {
            return 0;
        }
        if (!count($fichesVendu)) {
            return 0;
        } else {
            return number_format($ratio / count($fichesVendu),2,'.',' ');
        }
    }


    public function getMoyenneMRNAttribute()
    {
        $fichesVendu = $this->fichesVendu()->get();
        $ratio = 0;
        foreach ($fichesVendu as $fiche) {
            $ratio += $fiche->MRN;
        }
        if ($ratio <= 0) {
            return 0;
        }
        if (!count($fichesVendu)) {
            return 0;
        } else {
            return number_format($ratio / count($fichesVendu),2,'.',' ');
        }
    }

    public function getMoyenneCAPAttribute()
    {
        $fichesVendu = $this->fichesVendu()->get();
        $ratio = 0;
        foreach ($fichesVendu as $fiche) {
            $ratio += $fiche->CAP;
        }
        if ($ratio <= 0) {
            return 0;
        }
        if (!count($fichesVendu)) {
            return 0;
        } else {
            return (number_format($ratio / count($fichesVendu),2,'.',' '));
        }
    }

    public function getMoyenneRBEAttribute()
    {
        $fichesVendu = $this->fichesVendu()->get();
        $ratio = 0;
        foreach ($fichesVendu as $fiche) {
            $ratio += $fiche->RBE;
        }
        if ($ratio <= 0) {
            return 0;
        }
        if (!count($fichesVendu)) {
            return 0;
        } else {
            return number_format($ratio / count($fichesVendu),2,'.',' ');
        }
    }
    
    
    

    public function getMoyenneMRBVigueurAttribute()
    {
        $fichesVendu = $this->fichesVigueur()->get();
        $ratio = 0;
        foreach ($fichesVendu as $fiche) {
            $ratio += $fiche->MRB;
        }
        if ($ratio <= 0) {
            return 0;
        }
        if (!count($fichesVendu)) {
            return 0;
        } else {
            return number_format($ratio / count($fichesVendu),2,'.',' ');
        }
    }


    public function getMoyenneMRNVigueurAttribute()
    {
        $fichesVendu = $this->fichesVigueur()->get();
        $ratio = 0;
        foreach ($fichesVendu as $fiche) {
            $ratio += $fiche->MRN;
        }
        if ($ratio <= 0) {
            return 0;
        }
        if (!count($fichesVendu)) {
            return 0;
        } else {
            return number_format($ratio / count($fichesVendu),2,'.',' ');
        }
    }

    public function getMoyenneCAPVigueurAttribute()
    {
        $fichesVendu = $this->fichesVigueur()->get();
        $ratio = 0;
        foreach ($fichesVendu as $fiche) {
            $ratio += $fiche->CAP;
        }
        if ($ratio <= 0) {
            return 0;
        }
        if (!count($fichesVendu)) {
            return 0;
        } else {
            return (number_format($ratio / count($fichesVendu),2,'.',' '));
        }
    }

    public function getMoyenneRBEVigueurAttribute()
    {
        $fichesVendu = $this->fichesVigueur()->get();
        $ratio = 0;
        foreach ($fichesVendu as $fiche) {
            $ratio += $fiche->RBE;
        }
        if ($ratio <= 0) {
            return 0;
        }
        if (!count($fichesVendu)) {
            return 0;
        } else {
            return number_format($ratio / count($fichesVendu),2,'.',' ');
        }
    }
    
    

    public function getPrixSelonMRBAttribute()
    {
        return ($this->rendement_revenus_brut * $this->moyenneMRB );
    }

    public function getPrixSelonMRNAttribute()
    {
        return (($this->rendement_revenus_brut - $this->rendement_depense) * $this->moyenneMRN );
    }

    public function getPrixSelonCAPAttribute()
    {
        if($this->moyenneCAP && $this->rendement_depense && $this->rendement_revenus_brut ){
            return (($this->rendement_revenus_brut - $this->rendement_depense) / ($this->moyenneCAP/100) );
        }else{
            return 0;
        }
    }


    public function getTemplateFolderAttribute()
    {
        if($this->categorie == "unifamiliale" || $this->categorie=="condo" ){
            return $this->categorie;
        }else if($this->categorie == "commercial" || $this->categorie == "mixte" || $this->categorie=="residentiel"){
            return "plex";
        }
    }

    public function getDateFormatAttribute()
    {
        // Utilise la locale courante de Laravel
        $locale = app()->getLocale();
        Carbon::setLocale($locale);
        $date = new Carbon($this->date);
        return $date->isoFormat('Do MMMM YYYY');
    }
}