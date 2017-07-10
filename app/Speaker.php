<?php

namespace App;

use App\ModelHelpers\ImageAttribute;
use \Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Speaker extends Model {
    use ImageAttribute;
    use Searchable;

    public $appends = ['image'];

    public function conferences()
    {
        return $this->belongsToMany('\App\Conference');
    }

    public function attend(Conference $event)
    {
        $events_ids = $this->conferences->map(function ($event) { return $event->id; })->toArray();

        return in_array($event->id, $events_ids);
    }

    public function toSearchableArray()
    {
        $array = [
            'name' => $this->name,
            'title' => $this->title,
            'image' => $this->image,
            'number_of_conf' => count($this->conferences),
            'is_laravel_creator' => $this->name === 'Taylor Otwell'
        ];

        $array['conferences'] = $this->conferences->map(function ($conf) {
            return $conf->location;
        });

        return $array;
    }
}