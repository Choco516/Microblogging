<?php

class HomeController extends BaseController {

	private function validationRules()
    {
        // validate the info, create rules for the inputs
        return array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );
    }

	public function Index()
	{
		$comentarios = Comentario::comments();
		return View::make('microblogging.index')->with('comentarios',$comentarios);
	}

	public function profile()
	{
		$usuario = User::datosUsr();
		return View::make('profile.index')->with('usuario',$usuario);
	}

	public function edit()
	{
		$usuario = User::datosUsr();
		return View::make('profile.edit')->with('usuario',$usuario);
	}

	public function passwordForgotten()
	{
		return View::make('microblogging.changePassword');
	}

	public function changePassword()
	{
		$rules = $this->validationRules(); 
        $rules['password'] = 'required|alphaNum|min:3|Confirmed';
        $rules['password_confirmation'] = 'required|alphaNum|min:3'; 
        $validator = Validator::make(Input::all(), $rules);
          // if the validator fails, redirect back to the form 
          if ($validator->fails()) { return Redirect::to('/') ->withErrors($validator) 
          // send back all errors to the login form 
          ->withInput(Input::except('password')); 
          // send back the input (not the password) so that we can repopulate the form 
        } 
		$email = Input::get('email');
		$password = Input::get('password');
		/*Contact::changePassword($email);*/

		$user = User::find($email);
		$user->password = Hash::make($password);
		$user->save();
		return Redirect::to('/');
	}

	public function update()
	{
		$photo = Input::file('avatar');
		if (empty($photo))
			{
				$alias = Auth::user()->usrs_alias;
				$user = User::find($alias);
				$user->usrs_nombre = Input::get('nombre');
				$user->usrs_apellidos = Input::get('apellido');
				$user->usrs_telefono = Input::get('telefono');
				$user->usrs_direccion = Input::get('direccion');
				$user->usrs_biografia = Input::get('biografia');
				$user->save();
				return Redirect::to('profile');
			}else
			{
				$name = $photo->getClientOriginalName();
				$extension=$photo->getClientOriginalExtension();
				if($extension=="jpg")
				{
					$file = public_path(). "/images";
					$upload = $photo->move($file,$name);
					$alias = Auth::user()->usrs_alias;
					$user = User::find($alias);
					$user->usrs_nombre = Input::get('nombre');
					$user->usrs_apellidos = Input::get('apellido');
					$user->usrs_telefono = Input::get('telefono');
					$user->usrs_direccion = Input::get('direccion');
					$user->usrs_avatar = $name;
					$user->usrs_biografia = Input::get('biografia');
					$user->save();
					return Redirect::to('profile');
				}
			}
	}

	public function hum()
	{
		$fecha = Input::get('fecha'); 
		$mensage = Input::get('mensage'); 
		$comentario = new Comentario;
		$comentario->comments_alias = Auth::user()->usrs_alias;
		$comentario->comments_descrip = $mensage;
		$comentario->comments_fecha = $fecha;
		$comentario->save();
		return Redirect::to('microblogging');
	}

	public function unfollow()
	{
		$aliasDest = Input::get('aliasDest');
		Contact::unfollowUser($aliasDest);
		return Redirect::to('microblogging');
	}

	public function blockade()
	{
		$aliasDest = Input::get('aliasDest');
		Contact::blockadeUser($aliasDest);
		return Redirect::to('microblogging');
	}

	public function follow()
	{
		$aliasDest = Input::get('aliasDest');
		Contact::followUser($aliasDest);
		return Redirect::to('people');
	}

	public function unlock()
	{
		$aliasDest = Input::get('aliasDest');
		Contact::unlockUser($aliasDest);
		return Redirect::to('microblogging');
	}

	public function accept()
	{
		$aliasDest = Input::get('aliasDest');

		Contact::acceptRequest($aliasDest);
		/*Contact::insertPostAcept($aliasDest);*/
		return Redirect::to('requests');
	}

	public function decline()
	{
		$aliasDest = Input::get('aliasDest');
		Contact::declineRequest($aliasDest);
		return Redirect::to('requests');
	}


	public function deletecomment()
	{
		$comment = Input::get('comment');
		Comentario::deleteComment($comment);
		return Redirect::to('microblogging');
	}

	public function people()
	{
		$usuario = User::datosUsrMB();
		return View::make('contact.index')->with('usuario',$usuario);
	}

	public function lockedUsers()
	{
		$usuario = User::datosBloq();
		return View::make('contact.lockedUsers')->with('usuario',$usuario);
	}

	public function requests()
	{
		$usuario = User::datosSolic();
		return View::make('contact.requests')->with('usuario',$usuario);
	}

	public function hashtags()
	{
		$hashtag = Input::get('hashtag');
		$hashtagSearched = Comentario::hashtagSearched($hashtag);
		return View::make('microblogging.hashtags')->with('hashtagSearched',$hashtagSearched);
	}

	public function deleteUser()
	{
		User::deleteUserAlias();
		User::deleteUserAliasOrig();
		User::deleteUserCommentsAlias();
		User::deleteUserCommentsAliasTag();
		return Redirect::to('/');
	}

	public function login()
    {
        return view::make('microblogging.login');
    }
}
