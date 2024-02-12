<?php

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Infra\Aluno\RepositorioDeAlunoEmMemoria;

require 'vendor/autoload.php';

$cpf = $argv[1];
$name = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$number = $argv[5];

$aluno = Aluno::comCpfNomeEEmail($cpf, $name, $email)
    ->adicionarTelefone($ddd, $number);

$repositorio = new RepositorioDeAlunoEmMemoria();
$repositorio->adicionar($aluno);