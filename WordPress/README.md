# WordPress + Docker Compose

A lightweight **WordPress development setup** using **Docker Compose**.  
Designed to be quick to copy, paste, and adapt for local development, demos, or teaching environments.

Includes:
- WordPress (Apache + PHP)
- MySQL
- Persistent volumes
- `uploads.ini` for increased file upload limits

---

## Requirements

- Docker  
- Docker Compose  

Check installation:

```bash
docker --version
docker compose version

## Quick Start 

```bash
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name
docker compose up -d

### Open in your Browser

http://localhost:8080


## NOTES 

- Meant for local development only 
- not production ready
