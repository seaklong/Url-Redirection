<?php

namespace Kineticamobile\Lumki\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Kineticamobile\Lumki\Facades\Lumki;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\Process\Process;

/**
 * Setup Lumki package
 *
 * @author raultm
 **/
class SetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'lumki:setup';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Package Setup.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        // Publicar migraciones de Spatie/Laravel permissions
        $this->askStep(
            __("lumki::cmd.publish_spatie_migrations"),
            function () {
                $this->call('vendor:publish', [
                    '--provider' => 'Spatie\Permission\PermissionServiceProvider'
                ]);
            }
        );
        // Publicar configuracion de Lab404/Impersonate permissions
        $this->askStep(
            __("lumki::cmd.publish_lab404_impersonate_configuration"),
            function () {
                $this->call('vendor:publish', [
                    '--provider' => 'Lab404\Impersonate\ImpersonateServiceProvider'
                ]);
            }
        );
        // Migrar
        $this->askStep(
            __("lumki::cmd.run_migrations_now"),
            function () {
                $this->call('migrate');
            }
        );
        // Model User
        // Añadir Trait/Use Spatie\Permission\Traits\HasRoles after use Laravel\Jetstream\HasProfilePhoto;;
        $this->askStep(
            __("lumki::cmd.add_trait_hasrole_user"),
            function () {
                $this->info(
                    Lumki::insertLineAfter(
                        app_path("Models/User.php"),
                        "use Laravel\Jetstream\HasProfilePhoto;",
                        "use Spatie\Permission\Traits\HasRoles;")
                );

                $this->info(
                    Lumki::insertLineAfter(
                        app_path("Models/User.php"),
                        "use HasProfilePhoto;",
                        "use HasRoles;")
                );
            }
        );
        // Añadir Trait/Use Lab404\Impersonate\Models\Impersonate; after Spatie\Permission\Traits\HasRoles
        $this->askStep(
            __("lumki::cmd.add_trait_impersonate_user"),
            function () {
                $this->info(
                    Lumki::insertLineAfter(
                        app_path("Models/User.php"),
                        "use Spatie\Permission\Traits\HasRoles;",
                        "use Lab404\Impersonate\Models\Impersonate;")
                );

                $this->info(
                    Lumki::insertLineAfter(
                        app_path("Models/User.php"),
                        "use HasRoles;",
                        "use Impersonate;")
                );
            }
        );

        // Añadir Rutas de Impersonate
        $this->askStep(
            __("lumki::cmd.add_impersonate_routes"),
            function () {
                $this->info(
                    Lumki::insertLineBefore(
                        base_path("routes/web.php"),
                        "Route::get('/', function () {",
                        "Route::impersonate();\n")
                );
            }
        );

        // Añadir directiva @lumki al menu del usuario
        $this->askStep(
            __("lumki::cmd.add_links_user_menu"),
            function () {
                $this->info(
                    Lumki::insertLineBefore(
                        resource_path('views/navigation-menu.blade.php'),
                        "@if (Laravel\Jetstream\Jetstream::hasApiFeatures())",
                        "\n@lumki\n")
                );
            }
        );

        // Añadir roles, permisos
        $this->askStep(
            __("lumki::cmd.add_roles"),
            function () {
                $r1 = Role::firstOrCreate(["name" => "Superadmin"]);
                $r2 = Role::firstOrCreate(["name" => "Admin"]);
                $r3 = Role::firstOrCreate(["name" => "User"]);

                $p1 = Permission::firstOrCreate(['name' => 'manage users']);

                $r1->givePermissionTo('manage users');

                $user = User::first();
                $user->assignRole($r1);
                $user->assignRole($r2);
                $user->assignRole($r3);
            }
        );



    }

    public function askStep($question, $yesCallback, $noCallback = null)
    {
        if( $this->confirm($question, "yes") ){
            $yesCallback();
        }else{
            if($noCallback === null){
                $this->info("Step Skipped.");
            }else{
                $noCallback();
            }
        }
    }
}
