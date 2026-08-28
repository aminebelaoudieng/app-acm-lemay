<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FicheVendu extends Fiche
{

    protected $table = "fiches";

    public function fiche()
    {
        return $this->hasMany('App\Fiche');
    }

    public function getRatioVenteVsDemandeAttribute()
    {
        if (!$this->comparable_vendu_prix_demande) {
            return 1;
        } else {
            return round($this->comparable_vendu_prix_vente / $this->comparable_vendu_prix_demande * 100);
        }
    }

    public function getRatioVenteVsEvaluationAttribute()
    {
        if (!$this->comparable_vendu_prix_evaluation) {
            return 1;
        } else {
            return round($this->comparable_vendu_prix_vente / $this->comparable_vendu_prix_evaluation * 100);
        }
    }
    public function getRatioPiedCarreHabitableVenduAttribute()
    {
        if (!is_numeric($this->caracteristique_superficie_habitable)) {
            return 1;
        } else {
            if($this->caracteristique_superficie_habitable>0){
                return round($this->comparable_vendu_prix_vente / $this->caracteristique_superficie_habitable);
            }else{
                return 1;
            }
        }
    }

    public function getRatioPiedCarreTerrainVenduAttribute()
    {
        if (!is_numeric($this->caracteristique_superficie_terrain) || $this->caracteristique_superficie_terrain == 0) {
            return 1;
        } else {
            return round($this->comparable_vendu_prix_vente / $this->caracteristique_superficie_terrain);
        }
    }


    public function getMRBAttribute()
    {
        if (!is_numeric($this->rendement_revenus_brut) || $this->rendement_revenus_brut == 0) {
            return 0;
        }else{
            return number_format($this->comparable_vendu_prix_vente / $this->rendement_revenus_brut,2,'.',' ');
        }
        
    }

    public function getMRNAttribute()
    {
        if (!is_numeric($this->rendement_revenus_brut) || $this->rendement_revenus_brut == 0 || $this->rendement_depense == 0) {
            return 0;
        }else{
            return number_format($this->comparable_vendu_prix_vente /( $this->rendement_revenus_brut-$this->rendement_depense ),2,'.',' ');
        }
        
    }

    public function getCAPAttribute()
    {
        if (!is_numeric($this->rendement_revenus_brut) || $this->rendement_revenus_brut == 0 || $this->rendement_depense == 0) {
            return 0;
        }else{
            return number_format(( $this->rendement_revenus_brut-$this->rendement_depense )/$this->comparable_vendu_prix_vente,2,'.',' ')*100;
        }
        
    }

    public function getRBEAttribute()
    {
        if (!is_numeric($this->rendement_revenus_brut) || $this->rendement_revenus_brut == 0 || $this->rendement_depense == 0) {
            return 0;
        }else{
            return number_format(($this->rendement_depense )/$this->rendement_revenus_brut,2,'.',' ');
        }
        
    }

    public function getPrixLocationAttribute()
    {
       
        if (!is_numeric($this->caracteristique_superficie_habitable)) {
            return 0;
        }else{
            return number_format(($this->rendement_revenus_brut -$this->rendement_depense )/$this->caracteristique_superficie_habitable,2,'.',' ')."$";
        }
        
    }



}