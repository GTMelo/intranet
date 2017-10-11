<?php
/**
 * Created by PhpStorm.
 * User: 02364114110
 * Date: 02/10/2017
 * Time: 11:24
 */

namespace App\Traits;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PDO;
use Symfony\Component\Console\Output\ConsoleOutput;

trait Seedable
{

    public static function clear($relationsToClear = null){

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        static::truncate();
        if($relationsToClear){
            if(is_string($relationsToClear)) $relationsToClear = [$relationsToClear];
            foreach ($relationsToClear as $item){
                DB::table($item)->truncate();
            }
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $result = static::all()->count() == 0;

        $class = static::class;
        $output = new ConsoleOutput();
        $output->writeln("<info>Truncating $class: $result</info>");
    }

    public static function random(){

        $forceCollection = false;
        $ammount = 1;

        $args = collect(func_get_args());
        foreach ($args as $arg){
            if(is_bool($arg)) $forceCollection = $arg;
            if(is_integer($arg)) $ammount = $arg;
        }

        if($ammount == 1 && !$forceCollection) return static::inRandomOrder()->take($ammount)->first();
        return static::inRandomOrder()->take($ammount)->get();
    }

    public static function randomOrNew(){

        $forceCollection = false;
        $ammount = 1;

        $args = collect(func_get_args());
        foreach ($args as $arg){
            if(is_bool($arg)) $forceCollection = $arg;
            if(is_integer($arg)) $ammount = $arg;
        }

        $qtdInTable = static::all()->count();

        if ($qtdInTable == 0 || $qtdInTable < $ammount){
            factory(static::class, ($ammount - $qtdInTable))->create();
            return static::random($ammount);
        } else {
            return static::random($ammount, $forceCollection);
        }
    }

    public static function clearRelations(){

        $tables = collect(func_get_args());

        foreach ($tables as $table){
            DB::table($table)->truncate();
        }
    }

}