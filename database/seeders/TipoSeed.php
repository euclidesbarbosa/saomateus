<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TipoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //PERFIL
        DB::table('tipo')
        ->insert([
            'tipo_id' => 1,
            'tipo_sigla' => 'PERFIL',
            'tipo_nome' => 'ADMINISTRADOR',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        DB::table('tipo')
        ->insert([
            'tipo_id' => 2,
            'tipo_sigla' => 'PERFIL',
            'tipo_nome' => 'GESTOR',
            'tipo_ordem' => 2,
            'tipo_sta' => 1,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        DB::table('tipo')
        ->insert([
            'tipo_id' => 3,
            'tipo_sigla' => 'PERFIL',
            'tipo_nome' => 'SUPORTE',
            'tipo_ordem' => 3,
            'tipo_sta' => 1,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        DB::table('tipo')
        ->insert([
            'tipo_id' => 4,
            'tipo_sigla' => 'PERFIL',
            'tipo_nome' => 'USUARIO',
            'tipo_ordem' => 4,
            'tipo_sta' => 1,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        //CENSO_STATUS
        DB::table('tipo')
        ->insert([
            'tipo_id' => 5,
            'tipo_sigla' => 'CENSO_STATUS',
            'tipo_nome' => 'EDITAR - TODOS',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        DB::table('tipo')
        ->insert([
            'tipo_id' => 6,
            'tipo_sigla' => 'CENSO_STATUS',
            'tipo_nome' => 'Editar - Suporte | Gestor | Administrador',
            'tipo_ordem' => 2,
            'tipo_sta' => 1,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        DB::table('tipo')
        ->insert([
            'tipo_id' => 7,
            'tipo_sigla' => 'CENSO_STATUS',
            'tipo_nome' => 'Editar - Gestor | Administrador',
            'tipo_ordem' => 3,
            'tipo_sta' => 1,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        DB::table('tipo')
        ->insert([
            'tipo_id' => 8,
            'tipo_sigla' => 'CENSO_STATUS',
            'tipo_nome' => 'Editar - Administrador',
            'tipo_ordem' => 4,
            'tipo_sta' => 1,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        DB::table('tipo')
        ->insert([
            'tipo_id' => 9,
            'tipo_sigla' => 'CENSO_STATUS',
            'tipo_nome' => 'Editar - Ninguém',
            'tipo_ordem' => 5,
            'tipo_sta' => 1,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        //DOCUMENTO
        DB::table('tipo')->insert([
            'tipo_sigla' => 'DOCUMENTO',
            'tipo_nome' => 'CPF',
            'tipo_ordem' => 1,
            'tipo_mask' => '###.###.###-##',
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'DOCUMENTO',
            'tipo_nome' => 'RG',
            'tipo_ordem' => 2,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'DOCUMENTO',
            'tipo_nome' => 'Comprovante de Residência',
            'tipo_ordem' => 3,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'DOCUMENTO',
            'tipo_nome' => 'Certidão de Naascimento',
            'tipo_ordem' => 4,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'DOCUMENTO',
            'tipo_nome' => 'Cartão Bolsa Família',
            'tipo_ordem' => 5,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'DOCUMENTO',
            'tipo_nome' => 'Cartão SUS',
            'tipo_ordem' => 6,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'DOCUMENTO',
            'tipo_nome' => 'CNH',
            'tipo_ordem' => 7,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'DOCUMENTO',
            'tipo_nome' => 'Título de Eleitor',
            'tipo_ordem' => 8,
            'tipo_sta' => 1,
        ]);

        //ORGAO
        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Câmara Municipal',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Centro de Vigilância em Saúde',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Conselho Tutelar',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Controladoria Geral do Município',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'CRAS',
            'tipo_link' => 'unico/index',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Gabinete do Prefeito',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Hospital Municipal',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Posto de Saúde',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Secretaria Municipal da Mulher',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Secretaria Municipal de Administração',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Secretaria Municipal de Agricultura',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Secretaria Municipal de Assistência Social',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Secretaria Municipal de Educação',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Secretaria Municipal de Esportes',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Secretaria Municipal de Fazenda',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Secretaria Municipal de Finanças',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Secretaria Municipal de Governo',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Secretaria Municipal de Infraestrutura',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Secretaria Municipal de Meio Ambiente',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Secretaria Municipal de Saúde',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ORGAO',
            'tipo_nome' => 'Secretaria de Cultura',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        //PARENTESCO
        DB::table('tipo')->insert([
            'tipo_sigla' => 'PARENTESCO',
            'tipo_nome' => 'Conjuge',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'PARENTESCO',
            'tipo_nome' => 'Filho(a)',
            'tipo_ordem' => 2,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'PARENTESCO',
            'tipo_nome' => 'Avô(ó)',
            'tipo_ordem' => 3,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'PARENTESCO',
            'tipo_nome' => 'Irmão(ã)',
            'tipo_ordem' => 4,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'PARENTESCO',
            'tipo_nome' => 'Sobrinho(a)',
            'tipo_ordem' => 5,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'PARENTESCO',
            'tipo_nome' => 'Não se Aplica',
            'tipo_ordem' => 6,
            'tipo_sta' => 1,
        ]);

        //CONTATO
        DB::table('tipo')->insert([
            'tipo_sigla' => 'CONTATO',
            'tipo_nome' => 'Celular',
            'tipo_mask' => '(##) #####-####',
            'tipo_ordem' => 1,
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'CONTATO',
            'tipo_nome' => 'Email',
            'tipo_ordem' => 2,
            'tipo_sta' => 1,
        ]);

        //PROFISSAO
        DB::table('tipo')->insert([
            'tipo_sigla'=>'PROFISSAO',
            'tipo_nome'=>'Administrador(a)',
            'tipo_nome_abrv' => 'Administrador(a)',
            'tipo_sta' => 1,
            'tipo_ordem'=> null
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=>'PROFISSAO',
            'tipo_nome'=>'Agricultor',
            'tipo_nome_abrv' => 'Agricultor',
            'tipo_sta' => 1,
            'tipo_ordem'=> null
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=>'PROFISSAO',
            'tipo_nome'=>'Apicultor(a)',
            'tipo_nome_abrv' => 'Apicultor(a)',
            'tipo_sta' => 1,
            'tipo_ordem'=> null
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=>'PROFISSAO',
            'tipo_nome'=>'Carroceiro(a)',
            'tipo_nome_abrv' => 'Carroceiro(a)',
            'tipo_sta' => 1,
            'tipo_ordem'=> null
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=>'PROFISSAO',
            'tipo_nome'=>'Doméstica',
            'tipo_nome_abrv' => 'Doméstica',
            'tipo_sta' => 1,
            'tipo_ordem'=> null
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=>'PROFISSAO',
            'tipo_nome'=>'Enfermeiro(a)',
            'tipo_nome_abrv' => 'Enfermeiro(a)',
            'tipo_sta' => 1,
            'tipo_ordem'=> null
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=>'PROFISSAO',
            'tipo_nome'=>'Lavrador(a)',
            'tipo_nome_abrv' => 'Lavrador(a)',
            'tipo_sta' => 1,
            'tipo_ordem'=> null
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=>'PROFISSAO',
            'tipo_nome'=>'Motorista',
            'tipo_nome_abrv' => 'Motorista',
            'tipo_sta' => 1,
            'tipo_ordem'=> null
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=>'PROFISSAO',
            'tipo_nome'=>'Pedagogo(a)',
            'tipo_nome_abrv' => 'Pedagogo(a)',
            'tipo_sta' => 1,
            'tipo_ordem'=> null
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=>'PROFISSAO',
            'tipo_nome'=>'Pedreiro',
            'tipo_nome_abrv' => 'Pedreiro',
            'tipo_sta' => 1,
            'tipo_ordem'=> null
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=>'PROFISSAO',
            'tipo_nome'=>'Pescador',
            'tipo_nome_abrv' => 'Pescador',
            'tipo_sta' => 1,
            'tipo_ordem'=> null
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=>'PROFISSAO',
            'tipo_nome'=>'Porteiro(a)',
            'tipo_nome_abrv' => 'Porteiro(a)',
            'tipo_sta' => 1,
            'tipo_ordem'=> null
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=>'PROFISSAO',
            'tipo_nome'=>'Segurança',
            'tipo_nome_abrv' => 'Segurança',
            'tipo_sta' => 1,
            'tipo_ordem'=> null
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=>'PROFISSAO',
            'tipo_nome'=>'Vigilante',
            'tipo_nome_abrv' => 'Vigilante',
            'tipo_sta' => 1,
            'tipo_ordem'=> null
        ]);

        //ASSUNTO
        DB::table('tipo')->insert([
            'tipo_sigla' => 'ASSUNTO',
            'tipo_nome' => 'Denúncia',
            'tipo_sta' => 1,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ASSUNTO',
            'tipo_nome' => 'Informação',
            'tipo_sta' => 2,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ASSUNTO',
            'tipo_nome' => 'Solicitação',
            'tipo_sta' => 3,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ASSUNTO',
            'tipo_nome' => 'Atualização Cadastral',
            'tipo_sta' => 4,
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'ASSUNTO',
            'tipo_nome' => 'Outros Assuntos...',
            'tipo_sta' => 5,
        ]);

        //POVOADO
        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Bacabeira','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Bacuri dos Pires','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Barriguda','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Belém','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Boa Hora','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Bom Gosto','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Bona','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Bona Ii','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Buriti','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Buriti Alzemir','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Buriti do Alzemir','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Cachimbo','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Cajueiro','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Campestre','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Candiba','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Cantinho','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Capoeira de Baixo','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Chiquitão','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Corante','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Curimatá','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Floresta','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Galvão','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Garrafinha','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Gloria','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Ingá','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Jacaré','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Jundiaí','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Lagoa do Zé Pedro','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Livramento','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Mandacaru','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Mangueirão','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Marajá','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Mata','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Morro da Pimenta','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Morro Grande','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Morro I','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Morro II','tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'POVOADO',
	        'tipo_nome' => "Olho D'Água da Crispiana",
            'tipo_ordem' => 1,
            'tipo_sta' => 1
	    ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Padre',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Pai Joao',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Pimenta',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Pindoval',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Piquizeiro',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Pitomba I',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Pitomba II',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => "Poço D'Água",
            'tipo_ordem' => 1, 'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Primavera',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Quelele',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Recanto II',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Saco Dantas',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Santa Luzia',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Santa Rita do Cabral',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Santana',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'São Patrício',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'São Pedro',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'São Roque',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Supapo',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Tambá',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Trizidela',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Vassoura de Botão',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Vila Nova',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla'=> 'POVOADO',
            'tipo_nome' => 'Viúva',
            'tipo_ordem' => 1,
            'tipo_sta' => 1
        ]);

        //BAIRRO
        DB::table('tipo')->insert([
            'tipo_sigla' => 'BAIRRO',
            'tipo_nome' => 'Alto da Torre',
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'BAIRRO',
            'tipo_nome' => 'Alto São Raimundo',
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'BAIRRO',
            'tipo_nome' => 'Boa Esperança',
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'BAIRRO',
            'tipo_nome' => 'Cajazeira',
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'BAIRRO',
            'tipo_nome' => 'Cajuí',
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'BAIRRO',
            'tipo_nome' => 'Centro',
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'BAIRRO',
            'tipo_nome' => 'Fazenda',
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'BAIRRO',
            'tipo_nome' => 'Jardim Botânico',
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'BAIRRO',
            'tipo_nome' => 'Morro Grande',
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'BAIRRO',
            'tipo_nome' => 'Mutirão',
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'BAIRRO',
            'tipo_nome' => 'Nova Cantanhede',
            'tipo_sta' => 1
        ]);

        DB::table('tipo')->insert([
            'tipo_sigla' => 'BAIRRO',
            'tipo_nome' => 'Trado',
            'tipo_sta' => 1
        ]);

    }
}