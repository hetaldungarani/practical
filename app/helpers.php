<?php



use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
Use App\Hobbies;


if (! function_exists('getHobbyName')) {
	function getHobbyName($id)
	{
		return Hobbies::where('id',$id)->value('name');
	}
}


function getRequestType($from_id,$to_id)
{
	$type_data = [];
	$type_data['type'] = 'send';
	$type_data['type_text'] = 'Send Request';
	$user_ids = [$from_id,$to_id];
	$user_request = DB::table('user_request')->whereIn('from_id',$user_ids)->whereIn('to_id',$user_ids)->where('is_latest',1)->first();
	if(!empty($user_request)){
		$request_type = $user_request->request_type;
		$from_id = $user_request->from_id;
		if($request_type == '3'){
			if($from_id == Auth::id()){
				$type_data['type'] = 'blocked';
				$type_data['type_text'] = 'Blocked';
			}
			else{
				$type="hide";
				$type_data['type_text'] = 'Send Request';
			}
		}
		else if($request_type == '2'){
			$type_data['type'] = 'friends';
			$type_data['type_text'] = 'Your friend';
		}
		else if($request_type == '1'){
			if($from_id == Auth::id()){
				$type_data['type'] = 'sent';
				$type_data['type_text'] = 'Request sent';
			}
			else{
				$type_data['type'] = 'accept';
				$type_data['type_text'] = 'Accept';
			}
		}
	}


	return $type_data;
}
