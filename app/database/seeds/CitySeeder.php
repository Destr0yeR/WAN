<?php

class CitySeeder extends Seeder {

	public function run(){
		//Country::create(array('name' => '', 'country_id' => ));
		City::create(array('name' => 'Buenos Aires', 'country_id' => 1));
		City::create(array('name' => 'Córdoba', 'country_id' => 1));
		City::create(array('name' => 'Mar de la Plata', 'country_id' => 1));
		City::create(array('name' => 'Mendoza', 'country_id' => 1));

		City::create(array('name' => 'La Paz', 'country_id' => 2));
		City::create(array('name' => 'Santa Cruz', 'country_id' => 2));
		
		City::create(array('name' => 'Brasilia', 'country_id' => 3));
		City::create(array('name' => 'Río de Janeiro', 'country_id' => 3));
		City::create(array('name' => 'Sao Paolo', 'country_id' => 3));

		City::create(array('name' => 'Arica', 'country_id' => 4));
		City::create(array('name' => 'Iquique', 'country_id' => 4));
		City::create(array('name' => 'Santiago', 'country_id' => 4));

		City::create(array('name' => 'Bogotá', 'country_id' => 5));
		City::create(array('name' => 'Cali', 'country_id' => 5));
		City::create(array('name' => 'Medellín', 'country_id' => 5));

		City::create(array('name' => 'Cuenca', 'country_id' => 6));
		City::create(array('name' => 'Guayaquil', 'country_id' => 6));
		City::create(array('name' => 'Quito', 'country_id' => 6));

		City::create(array('name' => 'Los Ángeles', 'country_id' => 7));
		City::create(array('name' => 'Nueva York', 'country_id' => 7));
		City::create(array('name' => 'San Francisco', 'country_id' => 7));
		City::create(array('name' => 'Miami', 'country_id' => 7));

		City::create(array('name' => 'Ciudad de México', 'country_id' => 8));
		City::create(array('name' => 'Cacún y Tulum', 'country_id' => 8));

		City::create(array('name' => 'Amazonas', 'country_id' => 9));
		City::create(array('name' => 'Áncash', 'country_id' => 9));
		City::create(array('name' => 'Apurímac', 'country_id' => 9));
		City::create(array('name' => 'Arequipa', 'country_id' => 9));
		City::create(array('name' => 'Ayacucho', 'country_id' => 9));
		City::create(array('name' => 'Cajamarca', 'country_id' => 9));
		City::create(array('name' => 'Callao', 'country_id' => 9));
		City::create(array('name' => 'Cuzco', 'country_id' => 9));
		City::create(array('name' => 'Huancavelica', 'country_id' => 9));
		City::create(array('name' => 'Huánuco', 'country_id' => 9));
		City::create(array('name' => 'Ica', 'country_id' => 9));
		City::create(array('name' => 'Junín', 'country_id' => 9));
		City::create(array('name' => 'La Libertad', 'country_id' => 9));
		City::create(array('name' => 'Lambayeque', 'country_id' => 9));
		City::create(array('name' => 'Lima', 'country_id' => 9));
		City::create(array('name' => 'Loreto', 'country_id' => 9));
		City::create(array('name' => 'Madre de Dios', 'country_id' => 9));
		City::create(array('name' => 'Moquegua', 'country_id' => 9));
		City::create(array('name' => 'Pasco', 'country_id' => 9));
		City::create(array('name' => 'Piura', 'country_id' => 9));
		City::create(array('name' => 'Puno', 'country_id' => 9));
		City::create(array('name' => 'San Martín', 'country_id' => 9));
		City::create(array('name' => 'Tacna', 'country_id' => 9));
		City::create(array('name' => 'Tumbes', 'country_id' => 9));
		City::create(array('name' => 'Ucayali', 'country_id' => 9));

		City::create(array('name' => 'Montevideo', 'country_id' => 10));
		City::create(array('name' => 'Punta del Este', 'country_id' => 10));

		City::create(array('name' => 'Caracas', 'country_id' => 11));
	}
}