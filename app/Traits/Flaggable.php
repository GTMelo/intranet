<?php
/**
 * Created by PhpStorm.
 * User: 02364114110
 * Date: 25/08/2017
 * Time: 13:17
 */

namespace App\Traits;


use App\Models\Flag;
use DB;
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

    public static function hasFlagColumn(){
        return collect(DB::getSchemaBuilder()->getColumnListing((new self())->getTable()))
            ->contains('flags');
    }

    public function getFlagsAttribute($value){
        return Flag::findMany(explode(',', $value));
    }

    public function setFlagsAttribute($value){
        if($value instanceof Collection && $value->isEmpty()) {
            $this->attributes['flags'] = null;
        } else {
            $this->attributes['flags'] = $value->implode('id',',');
        };
    }

    public function addFlag($flag){
        $collection = $this->flags;
        if(!is_array($flag)) $flag = collect($flag);
        foreach ($flag as $item) {
            if (is_int($item)) $collection->push(Flag::find($item));
            if (is_object($item)) $collection->push($item);
        }
        $this->syncFlag($collection);
    }

    public function removeFlag($flag = null){
        $collection = $this->flags->keyBy('id');
        if(!$flag) {
            $collection = collect([]);
        } else {
            if(!is_array($flag)) $flag = collect([])->push($flag);
            foreach ($flag as $item) {
                if (is_int($item)) $collection->forget($item);
                if (is_object($item)) $collection->forget($item->id);
            }
        };

        $this->syncFlag($collection);
    }

    /**
     * Syncs a list of flags with a collection
     * @param Collection $flags
     * @return bool
     */
    public function syncFlag(Collection $flags){
        $this->flags = $flags;
        $this->save();
    }

    /**
     * Checks if object has flag, or a list of flags
     * @param $flag string|Flag|array
     * @param bool $requireAll
     * @return bool
     */
    public function hasFlag($flag, $requireAll = false){
        if($flag instanceof Flag) return $this->flags->contains($flag);
        if(is_string($flag)) return $this->flags->pluck('code')->contains($flag);
        if(is_array($flag) || $flag instanceof Collection){
            if($requireAll){
                foreach ($flag as $item){
                    if(!$this->hasFlag($item)) return false;
                }
                return true;
            } else {
                foreach ($flag as $item){
                    if($this->hasFlag($item)) return true;
                }
                return false;
            }
        }
        return null;
    }

    public static function filterByFlag($flag, $chunkSize = 100){

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

    public function scopeWithFlag($query, $flag, $reversed = false){

        $a = Flag::ofCode($flag)->id;

        if(!$reversed){
            $result = $query->where('flags', 'like', "%$a%");
        } else {
            $result = $query->whereNull('flags')->orWhere('flags', 'not like', "%$a%");
        }

        return $result;
    }

    public static function hydrateFlags($list){
        $col = explode(',', $list);
        return Flag::findMany($col);
    }

    /**
     * Searches for an entry's relation, searching for relations
     * with a specific flag
     * @param $relation
     * @param $flag
     * @return Collection
     */
    public function relationsWithFlag($relation, $flag){

        if($flag instanceof Flag) $flag = $flag->id;
        if(is_string($flag)) $flag = Flag::ofCode($flag)->id;

        $relation = $this->$relation()->wherePivot('flags', 'LIKE', "%$flag%")->get();
        return $relation;
    }

    public static function filterByRelationWithFlag($rel, $flag){
        $model = new self();
        $table = $model->$rel()->getTable();
        if($flag instanceof Flag) $flag = $flag->id;
        if(is_string($flag)) $flag = Flag::ofCode($flag)->id;
        $partialResult = DB::table($table)
            ->select()
            ->where('flags', 'LIKE', "%$flag%")
            ->get()
            ->pluck($model->getForeignKey());
        $result = self::findMany($partialResult);
        return $result;
    }

//    /**
//     * Returns all flags assigned to the item
//     * @param bool $codeOnly if true, return only the codes
//     * @return Collection or null
//     */
//    public function flags($codeOnly = false)
//    {
//        if ($codeOnly) return self::belongsToMany(Flag::class)->pluck('code');
//
//        return self::belongsToMany(Flag::class);
//    }
//
//    /**
//     * Check if the model has the queried flag
//     * @param Flag|String $flag the interested code
//     * @return bool true if model has flag
//     */
//    public function hasFlag($flag)
//    {
//        if ($flag instanceof Flag) return self::flags()->get()->contains($flag);
//
//        return self::flags(true)->contains($flag);
//    }
//
//    /**
//     * Adds a flag to a model
//     * @param $code
//     * @return mixed
//     */
//    public function addFlag($code)
//    {
//
//        if ($code instanceof Flag) return self::flags()->attach($code);
//
//        return self::flags()->attach(Flag::ofCode($code));
//    }
//
//    /**
//     * Removes a flag to a model
//     * @param $code
//     * @return mixed
//     */
//    public function removeFlag($code)
//    {
//
//        if ($code instanceof Flag) return self::flags()->detach($code);
//
//        return self::flags()->detach(Flag::ofCode($code));
//    }
//
//    /**
//     * Clears all flags of a model
//     * @return mixed
//     */
//    public function removeAllFlags()
//    {
//        return self::flags()->detach();
//    }
//
//    /**
//     * Filters results for results that have an specific match
//     * @param $flag
//     * @param int $chunkSize
//     * @return Collection
//     */
//    public static function filterFlag($flag, $chunkSize = 100)
//    {
//
//        $isTableBig = static::all()->count() > 1000;
//
//        if($isTableBig){
//            $result = collect([]);
//            static::chunk($chunkSize, function ($batch) use ($flag, $result) {
//                foreach ($batch as $item){
//                    if($item->hasFlag($flag)) $result->push($item);
//                }
//            });
//        } else {
//            return static::all()->filter(function ($value) use ($flag) {
//                return $value->hasFlag($flag);
//            });
//        }
//
//        return $result;
//    }

}