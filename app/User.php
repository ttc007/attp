<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password','role'
    // ];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function apps()
    {
        return $this->hasMany(App::class);
    }

    /**
     * Assign the given role to the user.
     *
     * @param  string $role
     * @return mixed
     */
    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::whereName($role)->firstOrFail()
        );
    }

    /**
     * Determine if the user has the given role.
     *
     * @param  mixed $role
     * @return boolean
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !! $role->intersect($this->roles)->count();
    }

    public function isManager()
    {
        return 1;
        $role = Role::whereName('manager')->get();
        return User::find(Auth::id())->hasRole($role);

    }

    function role(){
        return 'maneger';
        $role = DB::table('role_user')
                        ->join('roles','role_user.role_id','roles.id')
                        ->where('role_user.user_id',$this->id)
                        ->first();
        return isset($role->name)?$role->name:'null';
    }

    function app_id(){
        $app_user = DB::table('app_user')->where('user_id',$this->id)->first();
        if($app_user) return $app_user->app_id;
        return 0;
    }

    function app_name(){
        $app_user = DB::table('app_user')
                    ->join('apps','apps.id','app_user.app_id')
                    ->where('app_user.user_id',$this->id)
                    ->where('apps.id',Session::get('app_id'))
                    ->first();
        if($app_user) return $app_user->company_name;
        return 0;
    }

    function app_role($app_id){
        $app_user = DB::table('app_user')
                    ->where('user_id',$this->id)
                    ->where('app_id',$app_id)->first();
        if($app_user) return $app_user->role;
        return 0;
    }

}
