<?php

namespace App\trait;


trait LocalData
{
    
   /**
     * 
     *
     * @param string $field
     * @return mixed
     */
    public function getLocalizedField($field): mixed
    {
        $locale = app()->getLocale();
        $localizedField = $field . '_' . $locale; 
                return $this->{$localizedField} ?? $this->{$field . '_en'};
    }

    /**
     * \
     *
     * @return mixed
     */
    public function getNameAttribute()
    {
        return $this->getLocalizedField('name');
    }

    /**
     * 
     *
     * @return mixed
     */
    public function getDescriptionAttribute()
    {
        return $this->getLocalizedField('description');
    }
}
