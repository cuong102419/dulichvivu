# ✈️ Dulichvivu — Travel Booking System

A full-stack travel booking system with a **Laravel REST API** backend and **ReactJS** frontend, featuring real-time booking updates and automated scheduling.

---

## 🚀 Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel (REST API) |
| Frontend | ReactJS, CSS |
| Database | MySQL |
| Auth | Laravel Sanctum (Token-based) |
| Real-time | Pusher (WebSocket) |
| Automation | Laravel Task Scheduler |
| Tools | Git, Postman |

---

## ✨ Features

- 🔐 Token-based authentication with **Laravel Sanctum**
- 🗺️ Browse and search available tours
- 📅 Tour booking with real-time status updates via **Pusher**
- 📋 Booking history for users
- ⚙️ Admin panel for managing tours and bookings
- 🤖 Automated cancellation of overdue bookings via **Task Scheduler**
- 🔄 Automatic departure status updates for ongoing trips
- 🧩 Custom **React hooks** for API handling and state management

---

## ⚙️ Installation

### Backend

```bash
# 1. Navigate to backend folder
cd dulichvivu_backend

# 2. Install dependencies
composer install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Configure your .env
# DB_DATABASE=dulichvivu
# PUSHER_APP_ID=your_pusher_app_id
# PUSHER_APP_KEY=your_pusher_key
# PUSHER_APP_SECRET=your_pusher_secret

# 5. Run migrations & seed data
php artisan migrate --seed

# 6. Start the server
php artisan serve
```

### Frontend

```bash
# 1. Navigate to frontend folder
cd dulichvivu_frontend

# 2. Install dependencies
npm install

# 3. Configure API base URL in .env
# REACT_APP_API_URL=http://localhost:8000/api

# 4. Start development server
npm start
```

---

## 📁 Project Structure

```
dulichvivu/
├── dulichvivu_backend/
│   ├── app/Http/Controllers/    # API Controllers
│   ├── app/Models/              # Eloquent models
│   ├── routes/api.php           # API routes
│   └── app/Console/Commands/    # Scheduled tasks
└── dulichvivu_frontend/
    ├── src/
    │   ├── components/          # React components
    │   ├── hooks/               # Custom React hooks
    │   ├── pages/               # Page components
    │   └── services/            # API service calls
    └── public/
```

---

## 👨‍💻 Author

**Pham Manh Cuong**
- Email: cuongmanh1024@gmail.com
- GitHub: [@cuong102419](https://github.com/cuong102419)
