<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $hidden = array('password', 'remember_token');
	protected $table      = 'users';
    protected $primaryKey = 'usrs_alias';
    protected $fillable   = array('
    	email','usrs_alias', 'usrs_nombre','usrs_apellidos','usrs_telefono','usrs_direccion','usrs_biografia','password', 'usrs_avatar','usrs_fecha_ingreso','usrs_estado');
    protected $guarded    = array('usrs_id');
    public    $timestamps = false;
    
    public static function datosUsr() { 
    $alias =  Auth::user()->usrs_alias;
	return DB::select("
	select email email, usrs_alias alias, usrs_nombre nombre,  usrs_apellidos apellido, usrs_telefono telefono, usrs_direccion direccion, usrs_biografia biografia, usrs_avatar avatar
	from users
		where usrs_alias= ?", array($alias));
	 }

	 public static function datosUsrMB() { 
    $alias =  Auth::user()->usrs_alias;
	return DB::select("
	select usrs.email email, usrs_alias alias, usrs_nombre nombre,  usrs_apellidos apellido, usrs_telefono telefono, usrs_direccion direccion, usrs_avatar avatar 
    from users usrs, mb_mnt_contacts cnts
	    where ((cnts.contacts_alias_orig <> ?) or (cnts.contacts_alias_dest <> ? ) )
	    and cnts.contacts_alias_orig = usrs.usrs_alias
	    and cnts.contacts_alias_dest <> usrs.usrs_alias
	    and cnts.contacts_alias_bloq=0
	    and cnts.contacts_alias_seg=0
	    --para que descarte las usuarios que con solcitud ya sea pendiente o aceptada 
	    -- abajo los filtra los correctos
	    and cnts.contacts_alias_solic  not in (1 ,0)
	    and usrs_alias <> ?
    union
    select email email, usrs_alias alias, usrs_nombre nombre,  usrs_apellidos apellido, usrs_telefono telefono, usrs_direccion direccion, usrs_avatar avatar
    from users 
    -- todos menos los usuarios siguientes
	    where usrs_alias <> ?
	    and usrs_alias not  in (
		--usuarios  que ya estoy  siguiendo
    select contacts_alias_dest  
    from mb_mnt_contacts 
    	where contacts_alias_seg=1 and contacts_alias_solic=0
	    and contacts_alias_orig = ? )
	    and usrs_alias not  in (
		--usuarios  que ya tiene solicitud pendiente
    select contacts_alias_dest  
    from mb_mnt_contacts 
    	where contacts_alias_seg=0 
    	and contacts_alias_solic=1
    	and contacts_alias_orig = ?)" , array($alias,$alias,$alias,$alias,$alias,$alias));
	 }

	public static function datosSolic() { 
    $alias =  Auth::user()->usrs_alias;
	return DB::select("
	select usrs.email email, usrs_alias alias, usrs_nombre nombre,  usrs_apellidos apellido, usrs_telefono telefono, usrs_direccion direccion, usrs_avatar avatar 
    from users usrs, mb_mnt_contacts cnts
	    where usrs.usrs_alias<> ?
	    and cnts.contacts_alias_orig = usrs.usrs_alias
	    and cnts.contacts_alias_dest <> usrs.usrs_alias
	    and cnts.contacts_alias_bloq=0
	    and cnts.contacts_alias_seg=0
	    and cnts.contacts_alias_solic=1
		and cnts.contacts_alias_dest=?" , array($alias,$alias));
	 }

	public static function datosBloq() { 
    $alias =  Auth::user()->usrs_alias;
	return DB::select("
	select u.email , u.usrs_alias alias, u.usrs_nombre nombre,  u.usrs_apellidos apellido, usrs_telefono telefono, usrs_direccion direccion, usrs_avatar avatar 
  	from mb_mnt_contacts c , users u
		where c.contacts_alias_dest=u.usrs_alias
		and  c.contacts_alias_orig= ?
		and c.contacts_alias_bloq=1
		and c.contacts_alias_seg=1
		and c.contacts_alias_solic=0" , array($alias));
	 }

	public static function deleteUserAlias() { 
    $alias =  Auth::user()->usrs_alias;
	return DB::select("
	delete  from users 
		where usrs_alias = ?;", array($alias));
	 }

	public static function deleteUserAliasOrig() { 
    $alias =  Auth::user()->usrs_alias;
	return DB::select("
	delete  from mb_mnt_contacts 
	where ((contacts_alias_orig = ?) or (contacts_alias_dest = ?));", array($alias,$alias));
	 }

	public static function deleteUserCommentsAlias() { 
    $alias =  Auth::user()->usrs_alias;
	return DB::select("
	delete  from mb_mnt_comments 
	where comments_alias = ?;" , array($alias));
	 }

	public static function deleteUserCommentsAliasTag() { 
    $alias =  Auth::user()->usrs_alias;
	return DB::select("
	delete  from mb_mnt_comments 
	where lower(comments_descrip)like ?;" , array($alias));
	}

	public static function findUser($email) {
	return DB::select("
	select email email, usrs_alias alias, usrs_nombre nombre,  usrs_apellidos apellido, usrs_telefono telefono, usrs_direccion direccion, usrs_biografia biografia, usrs_avatar avatar
	from users
		where email = '$email'");
	 }

	public static function changePassword($email) {
    $aliasOrig =  Auth::user()->usrs_alias;
	return DB::select("
	update mb_mnt_contacts set contacts_alias_bloq=1
		where contacts_alias_orig=? and contacts_alias_dest=?", array($aliasOrig, $aliasDest));
    }
}
