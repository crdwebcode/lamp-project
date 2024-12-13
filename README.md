# Guia de Configuração do Ambiente LAMP

Este guia descreve as etapas para configurar um ambiente LAMP (Linux, Apache, MySQL, PHP) no Ubuntu 22.04.5 LTS.

## Índice
1. [Instalação e Configuração do Apache](#instalacao-e-configuracao-do-apache)
2. [Instalação e Configuração do PHP](#instalacao-e-configuracao-do-php)
3. [Instalação do MySQL e Configuração do phpMyAdmin](#instalacao-do-mysql-e-configuracao-do-phpmyadmin)
4. [Melhorias de Segurança](#melhorias-de-seguranca)
5. [Ferramentas Adicionais](#ferramentas-adicionais)
6. [Configuração de Virtual Hosts](#configuracao-de-virtual-hosts)
7. [Como Subir para o GitHub](#como-subir-para-o-github)

---

## Instalação e Configuração do Apache

1. **Atualize e Faça Upgrade dos Pacotes:**
   ```bash
   sudo apt update && sudo apt upgrade -y
   ```
2. **Instale o Apache:**
   ```bash
   sudo apt install apache2 -y
   ```
3. **Verifique se o Apache está em Execução:**
   ```bash
   sudo systemctl status apache2
   ```
4. **Teste no Navegador:** Abra `http://localhost` para verificar a página padrão do Apache.
5. **Configure o Firewall:**
   ```bash
   sudo ufw allow 'Apache Full'
   ```

---

## Instalação e Configuração do PHP

1. **Instale o PHP e Extensões:**
   ```bash
   sudo apt install php libapache2-mod-php php-mysql php-cli php-curl php-mbstring php-xml php-zip -y
   ```
2. **Verifique a Versão do PHP:**
   ```bash
   php -v
   ```
3. **Teste o PHP:**
   - Crie um arquivo de teste:
     ```bash
     sudo nano /var/www/html/info.php
     ```
     Adicione o seguinte código:
     ```php
     <?php phpinfo(); ?>
     ```
   - Abra `http://localhost/info.php` em um navegador.

---

## Instalação do MySQL e Configuração do phpMyAdmin

1. **Instale o MySQL:**
   ```bash
   sudo apt install mysql-server -y
   ```
2. **Aumente a Segurança do MySQL:**
   ```bash
   sudo mysql_secure_installation
   ```
3. **Teste o Acesso ao MySQL:**
   ```bash
   sudo mysql -u root -p
   ```
4. **Instale o phpMyAdmin:**
   ```bash
   sudo apt install phpmyadmin -y
   ```
5. **Proteja o Acesso ao phpMyAdmin:** Edite a configuração para restringir o acesso.

---

## Melhorias de Segurança

1. **Habilite HTTPS:**
   ```bash
   sudo apt install certbot python3-certbot-apache -y
   sudo certbot --apache
   ```
2. **Configure o Firewall:**
   ```bash
   sudo ufw enable
   ```
3. **Restrinja o Acesso ao phpMyAdmin:**
   ```apache
   <Directory /usr/share/phpmyadmin>
       Order Deny,Allow
       Deny from All
       Allow from 127.0.0.1
   </Directory>
   ```

---

## Ferramentas Adicionais

1. **Instale o Composer:**
   ```bash
   sudo apt install composer -y
   ```
2. **Instale o Node.js e o npm:**
   ```bash
   sudo apt install nodejs npm -y
   ```
3. **Instale o Git:**
   ```bash
   sudo apt install git -y
   ```
4. **Instale o VS Code:**
   Baixe e instale o pacote `.deb` no [site oficial](https://code.visualstudio.com/).

---

## Configuração de Virtual Hosts

1. **Crie um Arquivo de Virtual Host:**
   ```bash
   sudo nano /etc/apache2/sites-available/meuprojeto.conf
   ```
   Adicione o seguinte:
   ```apache
   <VirtualHost *:80>
       ServerName meuprojeto.local
       DocumentRoot /var/www/meuprojeto
       <Directory /var/www/meuprojeto>
           AllowOverride All
           Require all granted
       </Directory>
   </VirtualHost>
   ```
2. **Habilite o Site e o Módulo Rewrite:**
   ```bash
   sudo a2ensite meuprojeto.conf
   sudo a2enmod rewrite
   sudo systemctl reload apache2
   ```
3. **Edite o Arquivo Hosts:**
   ```bash
   sudo nano /etc/hosts
   ```
   Adicione:
   ```
   127.0.0.1 meuprojeto.local
   ```

---

## Como Subir para o GitHub

1. **Inicie o Git no Diretório do Projeto:**
   ```bash
   cd /caminho/para/o/projeto
   git init
   ```
2. **Adicione os Arquivos ao Repositório:**
   ```bash
   git add .
   git commit -m "Commit inicial"
   ```
3. **Crie um Repositório no GitHub:**
   - Acesse o GitHub e crie um novo repositório.
4. **Envie os Arquivos para o GitHub:**
   ```bash
   git remote add origin https://github.com/seuusuario/seurepositorio.git
   git branch -M main
   git push -u origin main
   ```

---

Este guia conclui a configuração e o deploy do ambiente LAMP.
