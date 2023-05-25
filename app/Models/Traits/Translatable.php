<?php
namespace App\Models\Traits;
use Illuminate\Support\Facades\App;

trait Translatable {

    protected $defaultLocale ='kz';

    public function __($originFieldName)
    {
        $locale = App::getLocale() ?? $this->defaultLocale;

        if($locale === 'ru'){
            $fieldName = $originFieldName . '_ru';
        }

        elseif($locale === 'en'){
            $fieldName = $originFieldName . '_en';
        }

      
        else{
            $fieldName = $originFieldName .'_kz';
        }

        if($locale ==='en' && (is_null($this->$fieldName) || empty($this->$fieldName))) {

            return $this->$originFieldName;

        }

        return $this->$fieldName;
    }
}