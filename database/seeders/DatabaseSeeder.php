<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // 👈 Importamos DB para poder vaciar la tabla

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Llamamos al seeder de películas que ya tenías funcional
        $this->call([
            MoviesTableSeeder::class
        ]);
        $this->command->info('Tabla catálogo inicializada con datos!');

        // 2. 👤 LLAMADA AL SEED DE USUARIOS (Requerido por el Ejercicio 4.2)
        self::seedUsers();
        $this->command->info('Tabla usuarios inicializada con datos!');
    }

    /**
     * Método privado para inicializar los usuarios de prueba (Exigido en el enunciado)
     */
    private function seedUsers(): void
    {
        // Limpiamos la tabla de usuarios para evitar duplicados al correr el comando
        DB::table('users')->delete();

        // Creamos el primer usuario de prueba (puedes usar tu nombre)
        $user1 = new User();
        $user1->name = 'Gustavo';
        $user1->email = 'gustavo@example.com';
        $user1->password = bcrypt('12345678'); // 🔒 Contraseña encriptada obligatoria
        $user1->save();

        // Creamos un segundo usuario de prueba (para el profesor)
        $user2 = new User();
        $user2->name = 'Profesor';
        $user2->email = 'profesor@example.com';
        $user2->password = bcrypt('87654321'); // 🔒 Contraseña encriptada obligatoria
        $user2->save();
    }
}