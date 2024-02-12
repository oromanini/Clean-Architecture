<?php

namespace Alura\Arquitetura\Aplicacao\Aluno;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\RepositorioDeAluno;

class MatricularAluno
{
    public function __construct(private readonly RepositorioDeAluno $repositorioDeAluno)
    {}

    public function executa(MatricularAlunoDto $matricularAlunoDto): void
    {
        $aluno = Aluno::comCpfNomeEEmail(
            $matricularAlunoDto->cpf(),
            $matricularAlunoDto->nome(),
            $matricularAlunoDto->email()
        );
        $this->repositorioDeAluno->adicionar($aluno);
    }
}