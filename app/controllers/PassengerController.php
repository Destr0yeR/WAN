<?php
class PassengerController extends BaseController
{
	public function register()
	{
		$response['status'] = array();
		$response['status']['code'] = 200;
		$response['status']['message'] = 'OK';
		$response['status']['description'] = ['Operation successful'];
		
		$input_json = Input::all();	
		
		if(isset($input_json))
		{
			$input = json_decode($input_json['passengers'],true);

			$response['status']['description'] = array();
			foreach ($input['passengers'] as $passenger) {
				$creation_flag= $this->createPassenger($passenger);
				if(!is_null($creation_flag)){
					$response['status']['code'] = 400;		
					$response['status']['message'] = 'Invalid data';
					array_push($response['status']['description'] ,$this->createPassenger($passenger));	
				}
			}
		}else{
			$response['status']['code'] = 400;
			$response['status']['message'] = 'Bad request';
		}

		return Response::json($response, $response['status']['code']);
		
	}

	public function createPassenger($passenger)
	{
		$document_number = $passenger['document_number'];
		//var_dump($passenger);
		$validator = $this->validations($passenger);
		$menbership = $this->verifyMembership($document_number);
		if($validator->passes())
		{
			if($menbership)
			{
				//se tiene que agregar para modificar los telefonos e emails 
				//echo $menbership;
			}else{
				$newpassenger = new Passenger;
				$newpassenger->firs_name = $passenger['first_name']; //la columna se llama firs_name cambiar a first_name
				$newpassenger->last_name = $passenger['last_name'];
				$newpassenger->document_id = $passenger['document_id'];
				$newpassenger->document_number = $passenger['document_number'];
				$newpassenger->save();

			}
			return null;
		}	
		else
		{
			return $validator->messages();
		}
	}

	public function verifyMembership($document_number)
	{
		$ismenber = Passenger::where('document_number','=',$document_number)->pluck('id');
		return $ismenber;
	}

	public function validations($passenger)
	{
		$validator = Validator::make($passenger,array(
			'document_id' => 'exists:documents,id',
			'document_number' => 'digits:8',
			'first_name' => array('regex:/[a-zA-Z]/'),
			'last_name' =>  array('regex:/[a-zA-Z]/')
		));

		return $validator;
	}
}