# AgentForge

![GitHub commit activity](https://img.shields.io/github/commit-activity/w/hosseinmirzapur/agentforge)
[![Laravel Version](https://img.shields.io/badge/Laravel-%5E11.0-brightgreen)](https://laravel.com/)
[![Redis Cache](https://img.shields.io/badge/Redis-Cache-red)](https://redis.io/)

AgentForge is an **Agent-as-a-Service (AaaS)** platform that empowers users to create, manage, and deploy intelligent
agents tailored to their needs. Whether you're building chatbots, conversational assistants, or knowledge-based systems,
AgentForge provides the tools and infrastructure to bring your ideas to life.

---

## Table of Contents

1. [Overview](#overview)
2. [Features](#features)
3. [Architecture](#architecture)
4. [Prerequisites](#prerequisites)
5. [Installation](#installation)
6. [Usage](#usage)
7. [Deployment](#deployment)
8. [Contributing](#contributing)
9. [License](#license)
10. [Acknowledgments](#acknowledgments)

---

## Overview

AgentForge is designed to simplify the creation and management of AI-powered agents. With AgentForge, users can:

- Create custom knowledge bases by uploading documents, URLs, or plain text.
- Define agent personalities, tones, and rules.
- Access agents via RESTful APIs or embeddable chat scripts for seamless integration into websites and applications.
- Monitor agent performance and usage through detailed analytics.

The platform leverages cutting-edge technologies such as **NLP models**, **vector databases**, and **real-time
communication** to deliver fast, accurate, and scalable solutions.

---

## Features

### Core Features

- **User Management**: Secure signup, login, and profile management.
- **Knowledge Base Creation**: Upload and manage documents, PDFs, or plain text.
- **Agent Customization**: Define agent behavior, personality, and domain-specific rules.
- **API Access**: Expose agents via RESTful or GraphQL API endpoints.
- **Chat Script Integration**: Embed chat scripts into websites for real-time interaction.
- **Analytics & Reporting**: Track agent performance, usage statistics, and user interactions.

### Advanced Features

- **Subscription Plans**: Offer tiered pricing models with varying feature sets.
- **Collaboration Tools**: Allow multiple users to work on shared agents.
- **Third-party Integrations**: Connect with platforms like Slack, Zendesk, or Salesforce.

---

## Architecture

AgentForge follows a modern, scalable architecture:

### Backend

- **Framework**: Laravel 11.x
- **Database**: MySQL for structured data, Redis for caching frequently accessed data.
- **Search & Retrieval**: Vector databases (e.g., Pinecone, Weaviate) for RAG systems.
- **NLP Models**: Pre-trained models from Hugging Face, OpenAI, or Anthropic for conversational AI.
- **Deployment**: Laravel Octane with PHP Swoole extension for high-performance server-side processing.

### Caching

- **Redis**: Used for caching API responses, session data, and other frequently accessed resources.

---

## Prerequisites

Before installing AgentForge, ensure you have the following installed on your system:

- **PHP**: >=8.2
- **Composer**: PHP dependency manager
- **MySQL**: >=8.0
- **Redis**: For caching
- **Git**: For version control
- **Docker (Optional)**: For containerized development and deployment

---

## Installation

Follow these steps to set up AgentForge locally:

### 1. Clone the Repository

```bash
git clone https://github.com/hosseinmirzapur/agentforge.git
cd agentforge
```

### 2. Install Backend Dependencies

```bash
# Install PHP dependencies
composer install

# Copy the environment file and configure it
cp .env.example .env

# Generate an application key
php artisan key:generate

# Run database migrations
php artisan migrate

# Seed the database (optional)
php artisan db:seed
```

### 3. Configure Redis

Ensure Redis is running on your system. Update the `.env` file in the backend directory with the correct Redis
connection details:

```env
REDIS_HOST=127.0.0.1
REDIS_PORT=6379
REDIS_PASSWORD=
```

### 4. Start the Application

Run the Laravel Octane server:

```bash
# In the backend directory
php octane:start
```

Access the application at [http://localhost:8000](http://localhost:8000).

---

## Usage

### User Interface

- **Dashboard**: View all agents, knowledge bases, and analytics.
- **Agent Builder**: Customize agent behavior, personality, and rules.
- **Embed Code Generator**: Generate HTML/JavaScript snippets for embedding chat scripts.

### API Documentation

Visit `/api/docs` to explore the available API endpoints and generate client code using Swagger or Postman.

---

## Deployment

AgentForge is deployed using Laravel Octane with the PHP Swoole extension for high-performance server-side processing.
Follow these steps for production deployment:

### 1. Prepare the Environment

- Set up a production server with PHP, MySQL, Redis, and Nginx/Apache.
- Configure environment variables in the `.env` file.

### 2. Optimize the Application

```bash
# Clear and cache configurations
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Compile assets
npm run build
```

### 3. Start Laravel Octane

```bash
php octane:start --server=swoole
```

### 4. Configure Nginx/Apache

Set up a reverse proxy to forward requests to the Laravel Octane server.

---

## Contributing

We welcome contributions from the community! To contribute to AgentForge, follow these guidelines:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Commit your changes and push them to your fork.
4. Submit a pull request detailing your changes.

For more information, see our [Contribution Guidelines](CONTRIBUTING.md).

---

## License

AgentForge is open-source software licensed under the [MIT License](LICENSE). See the `LICENSE` file for more details.

---

## Acknowledgments

Special thanks to the following projects and libraries that make AgentForge possible:

- [Laravel](https://laravel.com/)
- [Redis](https://redis.io/)
- [Hugging Face Transformers](https://huggingface.co/)
- [Pinecone](https://www.pinecone.io/) and [Weaviate](https://weaviate.io/) for vector search capabilities.
