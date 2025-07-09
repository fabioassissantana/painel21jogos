# 🎮 VortexAPI - Painel Administrativo

<div align="center">
  <img src="public/storage/images/vortexapi.png" alt="VortexAPI Logo" width="200"/>
  <br>
  <strong>Plataforma de Gestão Completa para APIs de Jogos</strong>
</div>

---

## 📋 Sobre o Projeto

O **VortexAPI** é um painel administrativo moderno e robusto construído com **[FilamentPHP v3](https://filamentphp.com)**, desenvolvido especificamente para gestão de APIs de jogos. O sistema oferece controle total sobre usuários, agentes, jogos e relatórios com interface intuitiva e responsiva.

### ✨ Principais Funcionalidades

- 🔐 **Sistema de Autenticação Multi-nível** (Admin/Agent)
- 📊 **Dashboard Interativo** com métricas em tempo real
- 🎮 **Gestão Completa de Jogos** (CRUD)
- 👥 **Controle de Agentes** e permissões
- 📈 **Relatórios e Estatísticas** avançadas
- 🎨 **Interface Moderna** com tema escuro
- 📱 **Design Responsivo** para todos os dispositivos

---

## 🛠️ Stack Tecnológica

| Tecnologia | Versão | Descrição |
|------------|--------|-----------|
| **PHP** | 8.2+ | Linguagem principal |
| **Laravel** | 10+ | Framework PHP |
| **FilamentPHP** | 3.x | Painel administrativo |
| **Livewire** | 3.x | Componentes reativos |
| **TailwindCSS** | 4.x | Framework CSS |
| **MySQL** | 8.0+ | Banco de dados |
| **Spatie Permission** | - | Controle de permissões |

---

## 🚀 Instalação Rápida

### Pré-requisitos

- PHP 8.2 ou superior
- Composer 2.0+
- Node.js 18+
- MySQL 8.0+
- Git

### 1. Clone o Repositório

```bash
git clone https://github.com/SEU_USUARIO/vortexapi.git
cd vortexapi
```

### 2. Instale as Dependências

```bash
# Dependências PHP
composer install

# Dependências Node.js
npm install
npm run dev
```

### 3. Configure o Ambiente

```bash
# Copie o arquivo de ambiente
cp .env.example .env

# Gere a chave da aplicação
php artisan key:generate
```

### 4. Configure o Banco de Dados

Edite o arquivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vortexapi
DB_USERNAME=root
DB_PASSWORD=sua_senha
```

### 5. Execute as Migrações

```bash
php artisan migrate
```

### 6. Configure o Storage

```bash
php artisan storage:link
```

### 7. Instale as Permissões

```bash
composer require spatie/laravel-permission
php artisan vendor:publish --tag="permission-config"
php artisan migrate
```

### 8. Crie os Papéis do Sistema

```bash
php artisan permission:create-role Admin
php artisan permission:create-role Agent
```

---

## 🏗️ Estrutura do Projeto

```
vortexapi/
├── app/
│   ├── Filament/           # Painéis Filament
│   ├── Models/             # Modelos Eloquent
│   └── Providers/          # Service Providers
├── resources/
│   ├── views/              # Views Blade
│   └── css/                # Estilos
├── public/
│   ├── storage/            # Arquivos públicos
│   └── favicon.png         # Favicon personalizado
└── database/
    └── migrations/         # Migrações
```

---

## 🔐 Sistema de Acesso

### 👑 Painel de Administrador
- **URL**: `/admin`
- **Funcionalidades**:
  - Controle total do sistema
  - Gestão de agentes e usuários
  - Configurações globais
  - Relatórios completos

### 👤 Painel de Agente
- **URL**: `/agent`
- **Funcionalidades**:
  - Acesso restrito aos dados
  - Visualização de jogos vinculados
  - Relatórios personalizados

---

## 📊 Recursos Principais

### 🎮 Gestão de Jogos
- Cadastro e edição de jogos
- Categorização automática
- Status de disponibilidade
- Estatísticas de uso

### 👥 Gestão de Usuários
- Sistema multi-nível
- Controle de permissões
- Perfis personalizados
- Histórico de atividades

### 📈 Dashboard Inteligente
- Métricas em tempo real
- Gráficos interativos
- Relatórios exportáveis
- Alertas automáticos

### ⚙️ Configurações
- Personalização de logo
- Configurações de API
- Tema escuro/claro
- Notificações

---

## 🧪 Testes

Execute os testes automatizados:

```bash
# Testes unitários
php artisan test

# Testes com cobertura
php artisan test --coverage
```

---

## 🔧 Comandos Úteis

```bash
# Limpar caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Otimizar aplicação
php artisan optimize

# Verificar rotas
php artisan route:list

# Criar novo admin
php artisan make:admin

# Backup do banco
php artisan backup:run
```

---

## 📱 Acesso aos Painéis

| Painel | URL | Descrição |
|--------|-----|-----------|
| **Admin** | `/admin` | Painel principal de administração |
| **Agent** | `/agent` | Painel de agentes |
| **Agent Panel** | `/agentPanel` | Painel adicional de agentes |

---

## 🛡️ Segurança

- ✅ Autenticação multi-fator
- ✅ Controle de sessões
- ✅ Validação de dados
- ✅ Proteção CSRF
- ✅ Logs de auditoria
- ✅ Backup automático

---

## 📞 Suporte

### 🆘 Problemas Comuns

**Erro de permissões:**
```bash
chmod -R 755 storage bootstrap/cache
```

**Erro de dependências:**
```bash
composer install --no-dev
npm install --production
```

### 📧 Contato

- **Email**: suporte@vortexapi.com
- **Telegram**: @vortexapi_support
- **Documentação**: [docs.vortexapi.com](https://docs.vortexapi.com)

---

## 🤝 Contribuição

1. Faça um fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

---

## 📄 Licença

Este projeto está sob a licença **MIT**. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---

<div align="center">
  <strong>VortexAPI © 2025</strong> - Desenvolvido com ❤️ para a comunidade de jogos
  <br>
  <sub>Powered by Laravel & FilamentPHP</sub>
</div>
