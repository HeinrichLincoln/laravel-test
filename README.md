# 🎮 Laravel Test — Projeto de Aprendizado

Projeto criado para aprender Laravel e as ferramentas utilizadas no projeto real (CRM Concessionária), seguindo as mesmas regras técnicas e fluxo de trabalho.

O sistema consiste em uma tela de login, uma home com lista de jogos e dois jogos simples: Jogo da Velha e Jogo da Memória.

---

## 🛠️ Especificações Técnicas

### Stack

| Ferramenta | Função |
|---|---|
| Laravel + Laravel Sail | Framework PHP rodando via Docker |
| Livewire | Componentes interativos sem JavaScript |
| Mary UI | Biblioteca de componentes visuais (vem com Livewire) |
| Laravel Fortify | Autenticação (login, logout, recuperar senha) |
| PEST | Testes automatizados (TDD) |
| Larastan | Análise estática do código PHP |
| Laravel Pint | Formatação padronizada do código |
| Husky | Validações automáticas antes de cada commit |

### Ambiente

- Windows 11 + WSL2 + Ubuntu 24.04
- Docker Desktop
- PHP 8.3
- Composer 2.x
- Node.js 18 + npm

---

## 📋 Tarefas

| ID | Tarefa | Branch | Status |
|---|---|---|---|
| LEARN-1 | Configurar o projeto Laravel | config/LEARN-1 | A fazer |
| LEARN-2 | Instalar todos os pacotes | config/LEARN-2 | A fazer |
| LEARN-3 | Criar página de Login com TDD | feature/LEARN-3 | A fazer |
| LEARN-4 | Criar rota de logout | feature/LEARN-4 | A fazer |
| LEARN-5 | Criar home com lista de jogos | feature/LEARN-5 | A fazer |
| LEARN-6 | Criar Jogo da Velha | feature/LEARN-6 | A fazer |
| LEARN-7 | Criar Jogo da Memória | feature/LEARN-7 | A fazer |

---

## 🔄 Fluxo de Trabalho (Git)

Nunca trabalhe diretamente na branch `main`. Todo desenvolvimento deve ser feito em branches separadas por tarefa.

### Passo a passo para cada tarefa:

**1. Atualizar a main antes de começar**
```bash
git checkout main
git pull
```

**2. Criar uma branch nova para a tarefa**
```bash
git checkout -b feature/LEARN-3
```

**3. Desenvolver a tarefa**

Codifique tudo o que a tarefa exige.

**4. Fazer o commit**
```bash
git add .
git commit -m "feat: criar página de login"
```

> ⚠️ Neste momento o **Husky** roda automaticamente e verifica:
> - Se o nome da branch está no padrão correto
> - Se o **Larastan** não encontrou erros no código
> - Se todos os testes do **PEST** estão passando
>
> Se alguma verificação falhar, o commit é bloqueado até você corrigir.

**5. Subir a branch para o GitHub**
```bash
git push origin feature/LEARN-3
```

**6. Abrir um Pull Request no GitHub**

Acesse o repositório no GitHub e abra um Pull Request da sua branch para a `main`.

**7. Aprovar e fazer o merge**

Após revisão, aprove o Pull Request e faça o merge na `main`.

---

## 📐 Padrão de Branches

| Tipo | Padrão | Exemplo |
|---|---|---|
| Configuração | `config/NOME` | `config/LEARN-1` |
| Funcionalidade | `feature/NOME` | `feature/LEARN-3` |

---

## 📝 Padrão de Commits

```
feat: descrição da funcionalidade adicionada
fix: descrição do bug corrigido
config: descrição da configuração realizada
```

---

## 🚀 Diário de Desenvolvimento

### LEARN-1 — Configurar o projeto Laravel

```bash
# 1. Clonar o repositório e criar a branch
git clone https://github.com/HeinrichLincoln/laravel-test
cd laravel-test
git checkout -b config/LEARN-1

# 2. Instalar o Laravel
composer create-project laravel/laravel . --prefer-dist

# 3. Instalar as dependências
composer install

# 4. Subir para o GitHub
git init
git checkout -b config/LEARN-1
git add .
git commit -m "config: instalar laravel"
git remote add origin https://github.com/HeinrichLincoln/laravel-test
git push -u origin config/LEARN-1

# 5. Criar a main e abrir o Pull Request
git checkout -b main
git push -u origin main
```

**Problemas encontrados:**

| Problema | Causa | Solução |
|---|---|---|
| Pasta não vazia | Tinha `.git` e `readme.md` na pasta | `rm -rf .git` e remover o readme |
| Extensão PHP faltando | `ext-xml` não instalada | `apt-get install php8.3-xml -y` |
| Autenticação GitHub falhou | GitHub não aceita senha comum | Usar Personal Access Token no lugar da senha |
| Branch `main` não existia | Repositório iniciado do zero | `git checkout -b main && git push -u origin main` |