🎟️ EventHub – Online Event Booking Platform
A modern, scalable event booking platform for discovering and reserving tickets to the latest concerts, shows, and international performances. Built for global audiences with secure online payments via Razorpay.

📜 Overview
EventHub is a Node.js-powered backend for managing upcoming and ongoing event listings with integrated ticket booking. The platform supports international access and ensures a seamless user experience for event discovery, seat selection, and payment processing using Razorpay.

🚀 Features
🎫 Event Listings: Browse latest and trending events, including top artists like Arijit Singh and rising global stars.

🌍 International Support: Users from across the globe can view and book events.

💳 Payment Integration: Integrated Razorpay for secure transactions.

🧪 Test Mode Enabled: Safe testing with demo card & OTP.

🔒 Secure Booking Flow: Every booking is verified and confirmed before ticket generation.

📱 Mobile-Responsive: Optimized for mobile and desktop platforms.

🔧 Setup & Installation
Prerequisites
Node.js (v14+)

NPM or Yarn

Razorpay account (for live integration)

Installation Steps
Clone the repository

bash
Copy
Edit
git clone https://github.com/yourusername/eventhub
cd eventhub/backend
Install dependencies

bash
Copy
Edit
npm install
Configure environment

Create a .env file in the project root with the following:

env
Copy
Edit
PORT=3000
RAZORPAY_KEY_ID=your_razorpay_key_id
RAZORPAY_KEY_SECRET=your_razorpay_key_secret
Start the server

bash
Copy
Edit
npm start
🌐 API Endpoints
🧾 Events
GET /api/events – Get all active and upcoming events

GET /api/events/:id – Get details of a specific event

💳 Payments
POST /api/checkout – Create a Razorpay order

POST /api/verify – Verify payment and confirm ticket

🧪 Test Mode (Razorpay)
Currently, Razorpay is in test mode. You can use the following dummy credentials to test payments:

Card Number: 4111 1111 1111 1111

Expiry: Any future date

CVV: 123

OTP: 111111

🚫 Note: UPI will not work in test mode. Switch to live mode for full functionality.

📂 Project Structure
bash
Copy
Edit
eventhub/
├── backend/
│   ├── server.js           # Entry point
│   ├── routes/             # API routes
│   ├── controllers/        # Business logic
│   ├── models/             # Event and Booking models
│   ├── utils/              # Razorpay integration utils
│   ├── .env                # Environment variables
│   └── ...
├── frontend/               # (Optional if separate repo)
🔐 Security Features
Payment Verification: Razorpay signature check to prevent spoofing

Input Validation: Protects against injection and malformed data

HTTPS Ready: Deployable behind a reverse proxy for SSL support

⚡ Performance Optimizations
Caching event listings for fast delivery

Lazy loading images on the frontend

Graceful fallback for failed payments

🛠️ Troubleshooting
❌ Payment Not Going Through
Ensure your .env has correct Razorpay keys

Confirm you're in test mode and using test credentials

🧪 UPI Not Working?
UPI is disabled in test mode. It will work once live keys are used.

🚀 Deployment
Recommended Setup
Use PM2 to manage the backend server

bash
Copy
Edit
npm install -g pm2
pm2 start server.js --name eventhub
Set up Nginx or Apache for HTTPS and reverse proxy

Monitor server logs regularly and secure your environment

📘 License
MIT © Deepanshu Singh
