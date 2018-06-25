<?php

	use Illuminate\Support\Facades\DB;

	function dateConvertFormtoDB($date){
		if(!empty($date)){
			return date("Y-m-d",strtotime(str_replace('/','-',$date)));
		}
	}

	function dateConvertDBtoForm($date){
		if(!empty($date)){
			$date = strtotime($date);
			return date('d/m/Y', $date);
		}
	}

	function employeeInfo(){
        $result = DB::collection('users')->where('_id', session('logged_session_data.id'))->first();
        return $result;
    }





?>