<?php
class PassengerController extends BaseController
{
	public function register()
	{
		$response['status'] = array();
		
		$input_json = Input::all();
		
		if(isset($input_json))
		{
			$input = json_decode($input_json['passengers'],true);

			$response['status']['description'] = "";
			foreach ($input['passengers'] as $passenger) {
				$response['status']['description'] = $response['status']['description']." ".$this->createPassenger($passenger);
			}

			$response['status']['code'] = 200;
			$response['status']['message'] = 'OK';
			$response['status']['description'] = 'Operation successful';
		}else{
			$response['status']['code'] = 400;
			$response['status']['message'] = 'Bad request';
			$response['status']['description'] = 'Missing search_text parameter.';
		}

		return Response::json($response, $response['status']['code']);
	}

	public function createPassenger($passenger)
	{
		$document_number = $passenger['document_number'];
		if(strlen($document_number) == 8) //8 porque 8 caracteres tiene el dni , se tiene que validar con diferentes tipos de documentos
		{
			$menbership = $this->verifyMembership($document_number);
			if($menbership)
			{
				//se tiene que agregar para modificar los telefonos e emails 
				echo $menbership;
			}else{
				$newpassenger = new Passenger;

				$newpassenger->firs_name = $passenger['first_name']; //la columna se llama firs_name cambiar a first_name
				$newpassenger->last_name = $passenger['last_name'];
				$newpassenger->document_id = $passenger['document_id'];
				$newpassenger->document_number = $passenger['document_number'];

				$newpassenger->save();

			}

			return "Operation successful";
		}else
		{
			return "Invalid Document Number: ".$document_number;
		}
	}

	public function verifyMembership($document_number)
	{
		$ismenber = Passenger::where('document_number','=',$document_number)->pluck('id');
		return $ismenber;
	}
}