<?php

class Home_Controller extends Base_Controller {

	
	
	public function action_index()
	{
		if (Auth::check())
		{

			$data = DB::table('data')->where('id', '=', Auth::user()->level)->first();
			$rank = $this->action_rank();
			if( Auth::user()->level==46)
				return View::make('home.finsh');	
			if (!$data) {
				return Redirect::to('/logout');
			}
			if (Auth::user()->level==37 && Auth::user()->flip==0) {
				$affected = DB::table('users')
				->where('id', '=', Auth::user()->id)
				->update(array(
					'flip' =>rand(1,4)
					));
			}

			if( Auth::user()->level==44)
				return View::make('home.flipper')->with('data',$data)->with('rank',$rank)->with('imgw',0)->with('imgw1',0);	
			return View::make('home.dash')->with('data',$data)->with('rank',$rank);		
		}
		else
			return View::make('home.index');
	}
	
	

	public function action_logout()
	{
		if (Auth::check())
			Auth::logout();
		return Redirect::to('http://brainstrain.cetdrishti.com');
	}
	public function action_auth()
	{
		$provider='facebook';
		if (!$provider || Auth::check()) {

			return Redirect::to('/');
			
		}
		
		Bundle::start('laravel-oauth2');

		$provider = OAuth2::provider($provider, array(
			'id' => '353718588071348',
			'secret' => 'f31383f677ad10c01ae837e9447c7ceb',
			));

		if ( ! isset($_GET['code']))
		{
        // By sending no options it'll come back here
			return $provider->authorize();
		}
		else
		{
        // Howzit?
			try
			{
				$params = $provider->access($_GET['code']);

				$token = new OAuth2_Token_Access(array('access_token' => $params->access_token));
				
				$user = $provider->get_user_info($token);

				$user_data = DB::table('users')->where('uid', '=',$user['uid'])->first();
				
				if (!$user_data) {
					$id = DB::table('users')->insert_get_id(array(
						'uid' => $user['uid'],
						'email' => $user['email'],
						'username' => $user['nickname'],
						'urls' => $user['urls']['Facebook'],
						'token' => $token
						));
					Auth::login($id);
					
					return View::make('home.correct');

					

					
				}
				else{
					Auth::login($user_data->id);
				}
            // Here you should use this information to A) look for a user B) help a new user sign up with existing data.
            // If you store it all in a cookie and redirect to a registration page this is crazy-simple.
				

				return Redirect::to('/');
			}

			catch (OAuth2_Exception $e)
			{
				show_error('That didnt work: '.$e);
			}

		}

	}

	public function action_ans(){
		if ($_POST && Auth::check()) {

			try {
						$log_id = DB::table('log')->insert_get_id(array('level'=> Auth::user()->level,'username' => Auth::user()->username,'answer'=>Input::get('answer')));
	
			} catch (Exception $e) {
				
			}

			

			$data = DB::table('data')->where('id', '=', Auth::user()->level)->first();
			
			
			if (Auth::user()->level==44) {
			
			$thisb=Auth::user()->flip-1;
				
			if(!isset($_POST["t"."$thisb"])){
					$affected = DB::table('users')
				->where('id', '=', Auth::user()->id)
				->update(array(
					'level' =>-1
					));
				 Auth::user()->level=-1;
				 return Redirect::to('/');
					
				}else {
					if ($data->answer == $_POST["t"."$thisb"]) {

				$virgin = DB::table('data')->where('id', '=',Auth::user()->level )->only('virgin');

				$aftime= DB::query('update users set time = now() where id = ?',Auth::user()->id);
				
				Auth::user()->point = Auth::user()->point+100;

				Auth::user()->level = Auth::user()->level+1;


				$affected = DB::table('users')
				->where('id', '=', Auth::user()->id)
				->update(array(
					'level' => Auth::user()->level,
					'point' => Auth::user()->point,
					));
				$current = Auth::user()->level;
				$current--;
				
				return View::make('home.correct');

			}
			else{
				return View::make("home.wrong");
			}
				}
					
			}

			if ($data->answer == Input::get('answer')) {

				$virgin = DB::table('data')->where('id', '=',Auth::user()->level )->only('virgin');

				$aftime= DB::query('update users set time = now() where id = ?',Auth::user()->id);
				
				Auth::user()->point = Auth::user()->point+100;

				Auth::user()->level = Auth::user()->level+1;


				$affected = DB::table('users')
				->where('id', '=', Auth::user()->id)
				->update(array(
					'level' => Auth::user()->level,
					'point' => Auth::user()->point,
					));
				$current = Auth::user()->level;
				$current--;
				
				return View::make('home.correct');

			}
			else{
				return View::make("home.wrong");
			}

		}
		return Redirect::to('/');
	}

	public function action_board(){
		$board = DB::table('users')->order_by('level', 'desc')->order_by('time', 'asc')->get();
		$no_user = DB::table('users')->count();
		return View::make('home.board')->with('board',$board)->with('total',$no_user);
	}

	private function action_rank(){
		$board = DB::table('users')->order_by('level', 'desc')->order_by('time', 'asc')->get();
		$rank=1;
		foreach ($board as $key) {
			if ($key->id == Auth::user()->id) {
				break;
			}
			$rank++;

		}
		Session::put('ranka', $rank);
		return $rank;

	}

	private function action_fbfeeder($type = 0){
		
		try {
			require_once('/home/cetdriss/www/fb/src/facebook.php');


		$to = DB::table('users')->where('uid', '=', Auth::user()->uid)->only('token');;
		$config = array(
			'appId' => '354997024639145',
			'secret' => 'e57fe4b3ff954eb641f4119506fec7c9',
			);


		$facebook = new Facebook_1($config);

		$accessToken = $facebook->getAccessToken();

		$facebook->setAccessToken($to);
		$user_id = $facebook->getUser();

		if ($type == 0) {
			$fb_message = "Mind Sweeper !!! Ultimate brainstrain for First year Cetians";
		}else{
			$fb_message = "Crossed  ".$type." Level in Mind Sweeper!! BrainStrain for first years";
		}

			$ret_obj = $facebook->api('/me/feed', 'POST',
				array(
					'link' => 'http://brainstrain.cetdrishti.com/',
					'picture'=> 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash4/373159_158083080875524_1132952370_q.jpg',
					'name'=>'Mind Sweeper',
					'description' => 'Ultimate Game for First Year CETIANS !!!',
					'message' => $fb_message,
					));
			


		} catch(FacebookApiException_1 $e) {
			
			
		}

	}
	
}