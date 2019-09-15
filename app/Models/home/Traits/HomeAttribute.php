<?php

namespace App\Models\home\Traits;

/**
 * Class HomeAttribute.
 */
trait HomeAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-home", "admin.homes.edit").'
                '.$this->getDeleteButtonAttribute("delete-home", "admin.homes.destroy").'
                </div>';
    }
}
