<p align="center">
  <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>
</p>

<p align="center">
  <strong>Aplikasi Absensi Wajah</strong> menggunakan <code>Laravel 12</code>, <code>React + WebRTC</code>, dan <code>FastAPI + DeepFace</code>
</p>

<p align="center">
  <a href="https://laravel.com">Laravel</a> •
  <a href="https://reactjs.org">React</a> •
  <a href="https://fastapi.tiangolo.com/">FastAPI</a> •
  <a href="https://github.com/serengil/deepface">DeepFace</a>
</p>

---

## 🎯 Deskripsi

Proyek ini merupakan sistem absensi online yang menggunakan deteksi wajah sebagai metode validasi kehadiran. Cocok digunakan untuk kantor, sekolah, atau organisasi lain yang membutuhkan presensi otomatis berbasis wajah.

---

## 📺 Playlist Tutorial

- **📹 Playlist Lengkap Source Code (YouTube)**:  
  [https://www.youtube.com/playlist?list=PL-EYPUojWTgMVzLoy0WfK5MfmGJh4MwA8](https://www.youtube.com/playlist?list=PL-EYPUojWTgMVzLoy0WfK5MfmGJh4MwA8)

- **📊 Data Playlist (Google Spreadsheet)**:  
  [https://docs.google.com/spreadsheets/d/1y_VYx4VrMAEnc0B6MQFrrnYWLx8jjOMl](https://docs.google.com/spreadsheets/d/1y_VYx4VrMAEnc0B6MQFrrnYWLx8jjOMl)

---

## 🧰 Teknologi

- **Backend**: Laravel 12
- **Frontend**: React + Vite + WebRTC (untuk akses kamera)
- **Python API**: FastAPI + DeepFace (ResNet untuk face recognition)
- **Database**: MySQL
- **Ekspor Data**: PDF, Excel (soon)

---

## 🚀 Fitur

- Login Admin & Karyawan
- Upload foto wajah saat registrasi
- Absensi masuk & pulang dengan kamera
- Deteksi wajah otomatis (Real-time)
- Riwayat absensi harian & bulanan
- Komunikasi API antara Laravel ↔ Python

---

## 📦 Instalasi Cepat

### Laravel Backend
```bash
cd backend-laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan storage:link
npm install && npm run dev
