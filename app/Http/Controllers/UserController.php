<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
//        $users = DB::table('users')
//            ->select('users.id','users.name','users.status') // quais colunas eu quero
//            ->where('users.status','=','1')
//            ->orderBy('users.name','ASC')
//            ->oldest('name') // ASC
//            ->latest('name') // DESC
//            ->inRandomOrder()
//            ->limit(10)
//            ->offset(1)
//            ->get();
//        foreach ($users as $user) {
//            echo "<p>#{$user->id} Nome: {$user->name} - {$user->status}</p>";
//        }

//        $users = DB::table('users')
//            ->selectRaw('users.id, users.name, CASE WHEN users.status = 1 THEN "ATIVO" ELSE "INATIVO" END status_description')
//            ->whereRaw('(SELECT COUNT(1) FROM addresses a WHERE a.user = users.id) > 2')
//            ->whereRaw('users.status = 1')
//            ->orderByRaw('updated_at - created_at','ASC')
//            ->get();
//
//        foreach ($users as $user) {
//            echo "<p>#{$user->id} Nome: {$user->name} - {$user->status_description}</p>";
//        }

//        DB::table('users')->where('id','<','500')->chunkById(50, function ($users){
//            foreach ($users as $user){
//                echo "<p>#{$user->id} Nome: {$user->name} - {$user->status}</p>";
//            }
//            echo "Encerrou um ciclo!<br>";
//            sleep(2);
//        });

//        $users = DB::table('users')
//            ->whereIn('users.status',[0,1])
//            ->whereNotIn('users.status',[0,1])
//            ->whereNull('')
//            ->whereNotNull('users.name')
//            ->whereColumn('created_at','=','updated_at')
//            ->whereDate('updated_at','>','2018-11-30 17:30:00')
//          ->whereDay('updated_at', '=','01')
//          ->whereMonth('updated_at', '=','01')
//          ->whereYear('updated_at', '=','2020')
//          ->whereTime('updated_at', '>','17:30:00')
//            ->get();

//        foreach ($users as $user){
//            echo "<p>#{$user->id} Nome: {$user->name} - {$user->status}</p>";
//        }

//        $users = DB::table('users')
//            ->select('users.id','users.name','users.status','addresses.address')
//            ->leftJoin('addresses','users.id','=','addresses.user')
//            ->join('addresses',function ($join){
//              $join->on('users.id','=','addresses.user')
//                  ->where('addresses.status','=','1');
//            })
//            ->orderBy('users.id','ASC')
//            ->get();
//
//        echo "<p>Total de registros: {$users->count()} </p>";
//
//        foreach ($users as $user){
//            echo "<p>#{$user->id} Nome: {$user->name} - {$user->status} - {$user->address}</p>";
//        }

//        DB::table('users')->insert([
//            'name' => 'Lucas',
//            'email' => 'lucasdauto@teste.com',
//            'password' => bcrypt('123456'),
//            'status' => 1
//        ]);

//        DB::table('users')->where('id','1001')->update([
//            'email' => 'teste@teste.com'
//        ]);

//        DB::table('users')->where('id',1001)->delete();

        $users = DB::table('users')->paginate(50);

        foreach ($users as $user){
            echo "<p>#{$user->id} Nome: {$user->name} - {$user->status}</p>";
        }

        echo $users->links();
    }
}
