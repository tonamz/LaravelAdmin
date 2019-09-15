<?php

namespace App\Models\sweet\Traits;

/**
 * Class SweetAttribute.
 */
trait SweetAttribute
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
                '.$this->getEditButtonAttribute("edit-sweet", "admin.sweets.edit").'
                '.$this->getDeleteButtonAttribute("delete-sweet", "admin.sweets.destroy").'
                </div>';
    }
}
