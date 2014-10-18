<?php

class Sudo_Controller extends Base_Controller {

	
	
	public function action_index()
	{
		if(Session::has('sudo')){
			$total = DB::table('data')->count();

            	$no_user = DB::table('users')->count();

            	return View::make('home.sudo')
            		->with('total',$total)
            		->with('no_user',$no_user);
		}
		else{
			return View::make('home.get_sudo');
		}	
	}

	public function action_login(){

		if ($_POST) {
			$input = Input::all();
            $rules = array(
                'username' => 'required',
                'password' => 'required|min:5',
                
                );
            $validation = Validator::make($input, $rules);
            if ($validation->fails())
            {                
                return Redirect::to('/sudo/index')->with_input()->with_errors($validation);
            }

            if (Input::get('username')=='sudo' && Input::get('password')=='chaliyans') {
            
            	Session::put('sudo', 'up');

            }

		}

		return Redirect::to('/sudo');
	}
	public function action_upload(){
		if($_POST){
			if (Session::has('sudo')) {
		$input = Input::all();
            $rules = array(
                'question' => 'required',
                'answer' => 'required',
                
                );
            $validation = Validator::make($input, $rules);
            if ($validation->fails())
            {                
                return Redirect::to('/sudo/')->with_input()->with_errors($validation);
            }
            $rules = array(
                'image' => 'required',
                
                );
            $validation = Validator::make($input, $rules);
            	if ($validation->fails())
            {
            	$imgurl =null;
            	
            }else{
            	
    	$imgurl = $input['image'];

    	
            }
            

            
	

    $id = DB::table('data')->insert_get_id(array(
						'question' => $input['question'],
						'answer' => $input['answer'],
						'image' => $imgurl,
						'html' => $input['html'],
						'hash' => $input['hash']
						));
	}

	return Redirect::to('/sudo')->with('done','ye');
	
		}
	}
	public function action_upedit(){
		if($_POST){
			if (Session::has('sudo')) {
		$input = Input::all();
            $rules = array(
                'question' => 'required',
                'answer' => 'required',
                'level' => 'required',
                
                );
            $validation = Validator::make($input, $rules);
            if ($validation->fails())
            {                
                return Redirect::to('/sudo/')->with_input()->with_errors($validation);
            }
            $rules = array(
                'image' => 'required',
                
                );
            $validation = Validator::make($input, $rules);
            	if ($validation->fails())
            {
            	$imgurl =null;
            	
            }else{
            	
    	$imgurl = $input['image'];

    	
            }
            

            
	

    $id = DB::table('data')
    ->where('id', '=', $input['level'])
    ->update(array(
						'question' => $input['question'],
						'answer' => $input['answer'],
						'image' => $imgurl,
						'html' => $input['html'],
						'hash' => $input['hash']
						));
	}

	return Redirect::to('sudo/upedit')->with('done','ye');
	
		}
		if (Session::has('sudo'))
		return View::make('home.edit_sudo');
	}
}