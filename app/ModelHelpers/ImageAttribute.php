<?php

namespace  App\ModelHelpers;

Trait ImageAttribute {
    public function getImageAttribute()
    {
        $firstName = strtolower(explode(' ', $this->name)[0]);

        $img = "/img/speakers/".$firstName.'.jpg';

        if (file_exists(public_path().$img)) {
            return $img;
        }

        $img = "/img/speakers/".$firstName.'.png';

        if (file_exists(public_path().$img)) {
            return $img;
        }

        return "/img/speakers/placeholder.png";
    }
}