<?php

namespace Alura\Arquitetura\Testes\Aplicacao;

use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno;
use Alura\Arquitetura\Aplicacao\Aluno\MatricularAlunoDto;
use Alura\Arquitetura\Dominio\Cpf;
use Alura\Arquitetura\Infra\Aluno\RepositorioDeAlunoEmMemoria;
use PHPUnit\Framework\TestCase;

class MatricularAlunoTest extends TestCase
{
    public function testAlunoDeveSerAdicionadoAoRepositorio(): void
    {
        $cpf = "123.123.123-44";
        $nome = "Teste";
        $email = "example@gmail.com";

        $matricularAluno = new MatricularAlunoDto(
            $cpf,
            $nome,
            $email,
        );

        $repositorioDeAluno = new RepositorioDeAlunoEmMemoria();
        $useCase = new MatricularAluno($repositorioDeAluno);
        $useCase->executa($matricularAluno);

        $aluno = $repositorioDeAluno->buscarPorCpf(new Cpf($cpf));

        $this->assertSame($nome, $aluno->nome());
        $this->assertSame($email, $aluno->email());
        $this->assertEmpty($aluno->telefones());
    }
}