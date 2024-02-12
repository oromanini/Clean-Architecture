<?php

namespace Alura\Arquitetura\Aplicacao\Aluno;

class MatricularAlunoDto
{
    public function __construct(
        private readonly string $cpfAluno,
        private readonly string $nomeAluno,
        private readonly string $emailAluno,
    ) {}

    public function cpf(): string
    {
        return $this->cpfAluno;
    }

    public function nome(): string
    {
        return $this->nomeAluno;
    }

    public function email(): string
    {
        return $this->emailAluno;
    }

}