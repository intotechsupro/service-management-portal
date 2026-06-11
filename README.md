# Complete Multi-Role Service Management Portal

## Overview

A production-ready web application built with Laravel 12, PHP 8.3, MySQL 8, Redis, Bootstrap 5, and Tailwind CSS. Features a modern premium UI with dark glassmorphism design and real-time WebSocket updates.

## Tech Stack

- **Backend:** Laravel 12, PHP 8.3
- **Database:** MySQL 8
- **Real-Time:** Redis, Laravel WebSockets, Laravel Echo
- **Frontend:** Bootstrap 5, Tailwind CSS, Alpine.js, Chart.js, DataTables

## User Roles

1. Super Admin
2. Master Admin
3. Distributor
4. Sub Distributor
5. Retailer
6. Data Entry Operator

## Installation

```bash
# Clone repository
git clone https://github.com/intotechsupro/service-management-portal.git
cd service-management-portal

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Database setup
php artisan migrate
php artisan db:seed

# Build assets
npm run dev

# Start server
php artisan serve

# In another terminal, start WebSockets
php artisan websockets:serve
```

## Key Features

- ✅ Role-Based Access Control (RBAC)
- ✅ Wallet Management System
- ✅ Real-Time OTP Modal with WebSockets
- ✅ Real-Time Finger Verification Modal
- ✅ Live Agent Monitoring
- ✅ Application Status Tracking
- ✅ Comprehensive Reporting
- ✅ Activity Logging
- ✅ Beautiful Dark Glassmorphism UI
- ✅ Responsive Design

## Documentation

- See `docs/DATABASE_SCHEMA.md` for database structure
- See `docs/API_DOCUMENTATION.md` for API endpoints
- See `docs/INSTALLATION.md` for detailed setup
