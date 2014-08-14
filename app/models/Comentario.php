<?php

class Comentario extends Eloquent
{
    protected $table      = 'mb_mnt_comments';
    protected $primaryKey = 'comments_id';
    protected $fillable   = array('comments_alias','comments_descrip','comments_fecha');
    protected $guarded    = array('comments_id');
    public    $timestamps = false;


    public static function comments() {
    $alias = Auth::user()->usrs_alias;
    return DB::select("
    select comments_alias alias, comments_descrip commentario, comments_fecha fecha, usrs_avatar avatar 
    from mb_mnt_comments cmts, users usrs
      where cmts.comments_alias= ?
      and usrs.usrs_alias= ?
    union
    select cnts.contacts_alias_dest  alias, comments_descrip commentario, comments_fecha fecha , usrs_avatar avatar 
    from mb_mnt_comments cmts, mb_mnt_contacts cnts , users usrs
      where cmts.comments_alias = cnts.contacts_alias_dest 
      and cnts.contacts_alias_bloq=0
      and cnts.contacts_alias_seg=1
      and cnts.contacts_alias_orig= ?
      and ? in (select usrs_alias from users )
      and usrs.usrs_alias= ?
    union
    select comments_alias alias, comments_descrip commentario, comments_fecha fecha , usrs_avatar avatar 
    from mb_mnt_comments cmts, users usrs
      where lower(cmts.comments_descrip)like'%$alias%'
      and ? in (select usrs_alias from users )
      and usrs.usrs_alias= ?
    order by fecha DESC" , array($alias,$alias,$alias,$alias,$alias,$alias,$alias));
   }

    public static function deleteComment($comment) {
    $alias = Auth::user()->usrs_alias;
     return DB::select("
    delete from mb_mnt_comments 
      where comments_alias=?
      and comments_descrip = ?" , array($alias, $comment));
   }

   public static function hashtagSearched($hashtag) {
    return DB::select("
    select alias,commentario,fecha  from  v_comentarios
      where hastag in (?) order by fecha desc" , array($hashtag));
   }
}