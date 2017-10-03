<?php
/**
 * Created by PhpStorm.
 * User: 02364114110
 * Date: 25/08/2017
 * Time: 13:17
 */

namespace App\Traits;


use App\Models\Flag;
use Illuminate\Support\Collection;

/**
 * Trait Flaggable
 *
 * Flags are reusable enum-like items that reflect states of a model,
 * similar to tags. For example, an email may be flagged with a
 * 'personal' flag, which represents that the item in question is the
 * user's personal account. Flags differ from tags because flags are
 * meant for backend utilities and not for data semantic organization.
 * <b> When applying the trait to a model, make sure there is a pivot
 * table between the intented model and the Tags table </b>.
 *
 * @package App\Traits
 */
trait Flaggable
{
    /**
     * Returns all flags assigned to the item
     * @param bool $codeOnly if true, return only the codes
     * @return Collection or null
     */
    public function flags($codeOnly = false)
    {
        if ($codeOnly) return self::belongsToMany(Flag::class)->pluck('code');

        return self::belongsToMany(Flag::class);
    }

    /**
     * Check if the model has the queried flag
     * @param Flag|String $flag the interested code
     * @return bool true if model has flag
     */
    public function hasFlag($flag)
    {
        if ($flag instanceof Flag) return self::flags()->get()->contains($flag);

        return self::flags(true)->contains($flag);
    }

    /**
     * Adds a flag to a model
     * @param $code
     * @return mixed
     */
    public function addFlag($code)
    {

        if ($code instanceof Flag) return self::flags()->attach($code);

        return self::flags()->attach(Flag::ofCode($code));
    }

    /**
     * Removes a flag to a model
     * @param $code
     * @return mixed
     */
    public function removeFlag($code)
    {

        if ($code instanceof Flag) return self::flags()->detach($code);

        return self::flags()->detach(Flag::ofCode($code));
    }

    /**
     * Clears all flags of a model
     * @return mixed
     */
    public function removeAllFlags()
    {
        return self::flags()->detach();
    }

    /**
     * Filters results for results that have an specific match
     * @param $flag
     * @param int $chunkSize
     * @return Collection
     */
    public static function filterFlag($flag, $chunkSize = 100)
    {

        $isTableBig = static::all()->count() > 1000;

        if($isTableBig){
            $result = collect([]);
            static::chunk($chunkSize, function ($batch) use ($flag, $result) {
                foreach ($batch as $item){
                    if($item->hasFlag($flag)) $result->push($item);
                }
            });
        } else {
            return static::all()->filter(function ($value) use ($flag) {
                return $value->hasFlag($flag);
            });
        }

        return $result;
    }

}