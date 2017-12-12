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
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

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

    public static function hasFlagColumn()
    {
        return collect(DB::getSchemaBuilder()->getColumnListing((new self())->getTable()))
            ->contains('flags');
    }

    private static function createFlagsColumn()
    {
        if (!self::hasFlagColumn()) {
            Schema::table((new self())->getTable(), function (Blueprint $table) {
                $table->string('flags')->nullable();
            });
        }
    }

    public function getFlagsAttribute($value)
    {
        return Flag::findMany(explode(',', $value));
    }

    public function setFlagsAttribute($value)
    {
        if ($value instanceof Collection && $value->isEmpty()) {
            $this->attributes['flags'] = null;
        } else {
            $value = $value->sortBy('id');
            $this->attributes['flags'] = $value->implode('id', ',');
        }
    }

    public function addFlag($flag)
    {
        self::createFlagsColumn();

        $userFlags = $this->flags;
        $flagsToAdd = $this->createFlagCollection($flag);

        $result = $userFlags->merge($flagsToAdd);

        $this->syncFlag($result);

        return $this->flags;
    }

    private function convertToFlag($arg)
    {
        $type = gettype($arg);
        switch ($type) {
            case 'string':
                return Flag::ofCode($arg);
            case 'integer':
                return Flag::find($arg);
            case 'object':
                return $arg;
        }
        return false;
    }

    private function createFlagCollection($arg)
    {
        $type = \gettype($arg);
        $partialResult = collect([]);
        $result = collect([]);

        $types = collect(['string', 'integer', 'object']);

        if ($types->contains($type) && !$arg instanceof Collection) {
            return collect([$this->convertToFlag($arg)]);
        }

        if ($type === 'array') {
            $partialResult = $partialResult->merge($arg);
        }

        if ($arg instanceof collection) {
            $partialResult = $arg;
        }

        foreach ($partialResult as $entry) {
            $result->push($this->convertToFlag($entry));
        }

        return $result;

    }

    // TODO removeFlag funcionando apenas com int e object. Add String, Array e Collection
    public function removeFlag($flag = null)
    {

        // Clear all flags if flag is null
        if (!$flag) {
            $this->syncFlag(collect([]));
        }

        $userFlags = $this->flags->keyBy('id');
        $flag = $this->createFlagCollection($flag)->keyBy('id');

        $result = $userFlags->reject(function ($value, $key) use ($flag) {
            return $flag->contains($value);
        });

        $this->syncFlag($result);

        return $this->flags;
    }

    /**
     * Syncs a list of flags with a collection
     * @param Collection $flags
     * @return bool
     */
    public function syncFlag(Collection $flags)
    {
        $this->flags = $flags;
        $this->save();
    }

    /**
     * Checks if object has flag, or a list of flags
     * @param $flag string|Flag|array
     * @param bool $requireAll
     * @return bool
     */
    public function hasFlag($flag, $requireAll = false)
    {
        self::createFlagsColumn();

        if ($flag instanceof Flag) return $this->flags->contains($flag);
        if (is_string($flag)) return $this->flags->pluck('code')->contains($flag);
        if (is_array($flag) || $flag instanceof Collection) {
            if ($requireAll) {
                foreach ($flag as $item) {
                    if (!$this->hasFlag($item)) return false;
                }
                return true;
            } else {
                foreach ($flag as $item) {
                    if ($this->hasFlag($item)) return true;
                }
                return false;
            }
        }
        return null;
    }

    public static function filterByFlag($flag, $chunkSize = 100)
    {
        self::createFlagsColumn();

        $isTableBig = static::all()->count() > 1000;

        if ($isTableBig) {
            $result = collect([]);
            static::chunk($chunkSize, function ($batch) use ($flag, $result) {
                foreach ($batch as $item) {
                    if ($item->hasFlag($flag)) $result->push($item);
                }
            });
        } else {
            return static::all()->filter(function ($value) use ($flag) {
                return $value->hasFlag($flag);
            });
        }

        return $result;
    }

    public function scopeWithFlag($query, $flag, $reversed = false)
    {

        $a = Flag::ofCode($flag)->id;

        if (!$reversed) {
            $result = $query->where('flags', 'like', "%$a%");
        } else {
            $result = $query->whereNull('flags')->orWhere('flags', 'not like', "%$a%");
        }

        return $result;
    }

    public static function hydrateFlags($list)
    {
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
    public function relationsWithFlag($relation, $flag)
    {

        if ($flag instanceof Flag) $flag = $flag->id;
        if (is_string($flag)) $flag = Flag::ofCode($flag)->id;

        $relation = $this->$relation()->wherePivot('flags', 'LIKE', "%$flag%")->get();
        return $relation;
    }

    public static function filterByRelationWithFlag($rel, $flag)
    {
        $model = new self();
        $table = $model->$rel()->getTable();
        if ($flag instanceof Flag) $flag = $flag->id;
        if (is_string($flag)) $flag = Flag::ofCode($flag)->id;
        $partialResult = DB::table($table)
            ->select()
            ->where('flags', 'LIKE', "%$flag%")
            ->get()
            ->pluck($model->getForeignKey());

        return self::findMany($partialResult);
    }

}