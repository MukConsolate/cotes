<?php

namespace App\Console\Commands;

use App\Models\Etudiant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncEtudiants extends Command
{
    protected $signature = 'sync:etudiants';
    protected $description = 'Synchronise les étudiants admis depuis le service inscription';

    public function handle()
    {
        $response = Http::get(config('services.inscription.base_uri') . '/etudiants');

        if ($response->failed()) {
            $this->error('Échec de récupération des étudiants.');
            return;
        }

        $etudiants = $response->json();

        foreach ($etudiants as $etudiant) {
            Etudiant::updateOrCreate(
                ['candidat_id' => $etudiant['id']],
                [
                    'matricule' => $etudiant['matricule'],
                    'mail' => $etudiant['mail'],
                ]
            );
        }

        $this->info('Synchronisation des étudiants réussie.');
    }
}
