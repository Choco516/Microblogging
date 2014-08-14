<?php

class Contact extends Eloquent
{
    protected $table      = 'mb_mnt_contacts';
    protected $primaryKey = 'contacts_alias_dest';
    protected $fillable   = array('contacts_alias_orig','contacts_alias_dest','contacts_alias_seg','contacts_alias_bloq','contacts_alias_solic');
    public    $timestamps = false;


    public static function unfollowUser($aliasDest) {
    $aliasOrig =  Auth::user()->usrs_alias;
	return DB::select("
    delete from  mb_mnt_contacts 
        where contacts_alias_orig=? 
        and contacts_alias_dest=?", array($aliasOrig, $aliasDest));
    /*Preguntarle al profe si debe borrar de los dos lados */
    }

    public static function blockadeUser($aliasDest) {
    $aliasOrig =  Auth::user()->usrs_alias;
    /*Preguntarle al profe si cuando se utilizaun 1 o un 0 tambien debe hacerse en variable*/
	return DB::select("
    update mb_mnt_contacts set contacts_alias_bloq=1
        where contacts_alias_orig=? and contacts_alias_dest=?", array($aliasOrig, $aliasDest));
    }

    public static function followUser($aliasDest) {
    $aliasOrig =  Auth::user()->usrs_alias;
    $bloq=0;
    $seg=0;
    $solic=1;
    return DB::select("
    insert into mb_mnt_contacts (contacts_alias_orig, contacts_alias_dest, contacts_alias_bloq, contacts_alias_seg, contacts_alias_solic) 
        values (?,?,?,?,?);", array($aliasOrig, $aliasDest, $bloq, $seg, $solic));
    }

    public static function unlockUser($aliasDest) {
    $aliasOrig =  Auth::user()->usrs_alias;
    return DB::select("
    update mb_mnt_contacts set contacts_alias_bloq=0
        where contacts_alias_orig=? and contacts_alias_dest=?", array($aliasOrig, $aliasDest));
    }

    public static function acceptRequest($aliasDest) {
    $aliasOrig =  Auth::user()->usrs_alias;
    return DB::select("
    update mb_mnt_contacts set contacts_alias_bloq=0, contacts_alias_seg=1, contacts_alias_solic =0
        where contacts_alias_orig=? and contacts_alias_dest=?;", array($aliasDest, $aliasOrig));
    }

    public static function insertPostAcept($aliasDest) {
    $aliasOrig =  Auth::user()->usrs_alias;
    return DB::select("
    insert into mb_mnt_contacts (contacts_alias_orig,contacts_alias_dest,contacts_alias_bloq,contacts_alias_seg,contacts_alias_solic)
        values (?,?,0,1,0);", array($aliasOrig,$aliasDest));
    }

    public static function declineRequest($aliasDest) {
    $aliasOrig =  Auth::user()->usrs_alias;
    return DB::select("
    delete from  mb_mnt_contacts
        where contacts_alias_orig=? and contacts_alias_dest=?", array($aliasDest, $aliasOrig));
    }
}
