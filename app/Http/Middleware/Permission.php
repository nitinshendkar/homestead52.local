<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use DB;
use Route;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*$array = [ 
                    'notpermission'=>[
				'education'=>[
								'edit',
								'delete',
								'view'
							]
				
			],
                    'requiredauthentication'=>[
                                                    'personal',
                                                    
                                            ],
                    'parentmodule'=>['admin'],
                    'child'=>['district','taluka','user'],
                    'usercreateaccess'=>[3=>'division'],
                 ];
        
       
        $json = json_encode($array);
        dd($json);*/
       
        $jasonUserPermission = DB::table('role_master')->join('users','role_master.id','=','users.role_type')->where('users.id','=',$request->user()->id)->first();
        $name = explode('.', Route::currentRouteName());
        
        if(isset($jasonUserPermission->permission) && isset(json_decode($jasonUserPermission->permission)->notpermission->{$name[0]}) && in_array($name[1],json_decode($jasonUserPermission->permission)->notpermission->{$name[0]})){
           return redirect()->route('Permission.nopermission');
        }
       
        if(isset( $jasonUserPermission->permission ) && in_array($name[0],json_decode($jasonUserPermission->permission)->requiredauthentication)){
           $jasonUserApprovalModule = DB::table('user_approval')->where('user_id','=',$request->user()->id)->first();
           
           if(empty($jasonUserApprovalModule) && $name[1] != 'index' && $name[1] != 'create'){
                return redirect()->route('Permission.createrecord');
            }
            else if(isset( $jasonUserApprovalModule->aprroval_module ) && !isset(json_decode($jasonUserApprovalModule->aprroval_module)->{$name[0]})){
                    return redirect()->route('Permission.notapproved');
            }
        }
        session(['usercreateaccess'=>json_decode($jasonUserPermission->permission)->usercreateaccess]);
        return $next($request);
    }
}
