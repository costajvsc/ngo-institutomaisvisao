<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class InsertDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Teste IMV',
            'email' => 'teste@imv.com.br',
            'password' => Hash::make('123123'),
            'user_type' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'Secretaria Municipal',
            'email' => 'sec.mun@imv.com.br',
            'password' => Hash::make('123123'),
            'user_type' => 'Secretaria Municipal',
        ]);
        DB::table('users')->insert([
            'name' => 'Setor de documentos',
            'email' => 'set.doc@imv.com.br',
            'password' => Hash::make('123123'),
            'user_type' => 'Setor de documentos',
        ]);
        DB::table('users')->insert([
            'name' => 'Central atendimento',
            'email' => 'central.atm@imv.com.br',
            'password' => Hash::make('123123'),
            'user_type' => 'Central de agendamento',
        ]);

        $procedimentos = ['Catarata', 'Pterígio', 'Glaucoma', 'Retina', 'Outros'];
        $status = ['Solicitação enviada', 'Trocar cartão SUS', 'Agendar procedimento', 'Procedimento agendado', 'Pendência documental', 'Pendência Cartão SUS novo'];


        foreach ($procedimentos as $p) {
            foreach ($status as $s) {
                DB::table('solicitacoes')->insert([
                    'nome_paciente' => 'nome '.Str::random(10),
                    'sobrenome_paciente' => 'sobrenome '.Str::random(10),
                    'telefone_fixo' => '9232422312',
                    'telefone_celular' => '42940322321',
                    'endereco' => 'Rua '.Str::random(10).' Bairro'.Str::random(10),
                    'rg_paciente' => '321932',
                    'cpf_paciente' => '20150323232',
                    'cartaoSUS' => '325023',
                    'observacao' => 'Observacao'.Str::random(100),
                    'urgencia' => false,
                    'data_procedimento' => '2021-12-01',
                    'senha_procedimento' => 'password123',
                    'local_procedimento' => 'Hospital'.Str::random(10),
                    'status'  => $s,
                    'procedimento'  => $p,
                    'id_user' => 2,
                ]);
            }
        }


    }
}
