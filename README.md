# Development Environments with Docker Compose

## 📌 What is Docker Compose?
[Docker Compose](https://docs.docker.com/compose/) is a tool that lets you **define and manage multi-container Docker applications** using a single YAML file (`docker-compose.yml`).  
Instead of running each container separately, you describe all services in one file and start them together with a single command:

```bash
docker-compose up -d
```

### ✅ Key Features
- Define multiple services (e.g., web, database, admin tools) in a single file.  
- Automatic networking between services.  
- Easily persist and share development environments across machines.  
- Recreate consistent environments for labs, assignments and group projects.

Useful official resources:  
- [Docker Compose Overview](https://docs.docker.com/compose/)  
- [Compose File Reference](https://docs.docker.com/compose/compose-file/)

---

## 🎯 Purpose of This Repository
This repository stores **development environments built with Docker Compose** for students. Each environment is a ready-to-run setup intended to:

- Provide **ready-to-use development stacks** (LAMP, Node.js + Redis, etc.).  
- Help students learn how services connect and interact.  
- Standardize environments across classroom machines and personal laptops.  
- Allow quick experiments with containerized workflows and DevOps basics.

---

## 📂 Repository Structure
Each environment lives in its own folder. A typical folder contains:

```
environment-name/
├── docker-compose.yml
├── README.md          # environment-specific instructions
├── html/               # example web files (if applicable)
└── mysql_data/         # persistent DB data (local bind mount)
```

- `docker-compose.yml`: the environment definition.  
- `README.md`: local instructions (ports, credentials, how to use).  
- Other files/folders: any sample code, seed data, or assets required by the environment.

---

## 🚀 Getting Started (Student Quickstart)
1. Clone this repository:
   ```bash
   git clone https://github.com/your-org/docker-student-environments.git
   ```
2. Change into the environment folder (example: LAMP):
   ```bash
   cd lamp-environment
   ```
3. Start the environment:
   ```bash
   docker-compose up -d
   ```
4. Visit services in your browser as described in the environment README.

**Stop and remove** the environment when finished:
```bash
docker-compose down
```

---

## 🖥 Example: LAMP Environment (Included Example)
Below is a sample `docker-compose.yml` for a simple LAMP-style dev environment (PHP + Apache, MySQL, phpMyAdmin). This is a **student-friendly example** — change versions and passwords to match your project requirements.

```yaml
version: '3.8'  # Compose file format version

services:
  web:
    image: php:8.2-apache    # PHP version (change as needed)
    ports:
      - "80:80"              # host:container
    depends_on:
      - db
    volumes:
      - ./html:/var/www/html # map local ./html to container webroot

  db:
    image: mysql:8.1.0       # MySQL version (change as needed)
    environment:
      MYSQL_ROOT_PASSWORD: root_password  # change for security in real projects
      MYSQL_DATABASE: lamp_db
      MYSQL_USER: your_username           # optional: creates a non-root user
      MYSQL_PASSWORD: your_password
    volumes:
      - ./mysql_data:/var/lib/mysql       # persist DB files locally

  phpmyadmin:
    image: phpmyadmin/phpmyadmin:latest
    platform: linux/amd64     # helpful on some lab Macs / CI environments
    restart: always
    depends_on:
      - db
    environment:
      PMA_HOST: db
      MYSQL_ROOT_PASSWORD: root_password
    ports:
      - "8080:80"             # access phpMyAdmin at http://localhost:8080
```

### 🔐 Notes on the example
- **Change the `MYSQL_ROOT_PASSWORD`** before using this in any public or production-like environment.  
- **PHP & MySQL versions** should match the requirements of your coursework or project. If your project needs PHP 8.1 or 8.3, update the `image` tag.  
- `volumes` keep your code and database persistent on your local machine so you don't lose work when containers are restarted.

### 🔌 Access
- Application (web): `http://localhost`  
- phpMyAdmin: `http://localhost:8080`  
  - login user: `root`  
  - password: the `MYSQL_ROOT_PASSWORD` value set in `db` service.

---

## 📷 Diagram (Visual)
You can add a diagram to the repo (for example `assets/lamp-diagram.png`) and embed it in each environment README:

```markdown
![LAMP Architecture](assets/lamp-diagram.png)
```

If you want, I can export the diagram image for you and provide a download link or a file to add to the repo.

---

## 👩‍💻 Contributing
Students and instructors are encouraged to add or improve environments:

1. Create a new folder named for your environment (e.g., `node-redis/`).  
2. Add a `docker-compose.yml` and any supporting files.  
3. Add a `README.md` inside the folder explaining:
   - What the environment contains
   - How to start/stop it
   - Ports and credentials
   - Any sample commands or test pages
4. Open a pull request to the main repository.

Please avoid committing sensitive credentials. Use placeholders like `MYSQL_ROOT_PASSWORD: changeme` and document how to replace them.

---

## ❓ Questions / Help
If you need help:
- Ask your instructor or lab assistant.
- Check Docker docs: [https://docs.docker.com/](https://docs.docker.com/).  
- Or open an issue / discussion in this repository describing the problem and environment folder.

---

> This README is designed to be the canonical entry point for students using the repository.
