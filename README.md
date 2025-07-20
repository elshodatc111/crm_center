
# CRM Center

Bu Laravel asosidagi CRM tizimi ta'lim markazlari, kurslar va foydalanuvchilarni boshqarish uchun ishlab chiqilgan. Tizim o‘qituvchilar, talabalar va administratorlar uchun alohida imkoniyatlar taqdim etadi.

## 📦 Texnologiyalar

- Laravel (PHP)
- MySQL
- Tailwind CSS
- Vite
- Composer / NPM

## ⚙️ O‘rnatish

1. **Loyihani yuklab oling:**
   ```bash
   git clone https://your-repo-link.git
   cd crm_center-main
   ```

2. **Composer va NPM paketlarini o‘rnating:**
   ```bash
   composer install
   npm install && npm run dev
   ```

3. **.env faylini sozlang:**
   ```
   cp .env.example .env
   php artisan key:generate
   ```

4. **Ma’lumotlar bazasini sozlang:**
   `.env` faylida quyidagilarni yangilang:
   ```
   DB_DATABASE=crm_center
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```
   Keyin SQL faylni import qiling:
   ```
   mysql -u root -p crm_center < u929278937_crm_center.sql
   ```

5. **Migrations va seeding (agar kerak bo‘lsa):**
   ```bash
   php artisan migrate --seed
   ```

6. **Serverni ishga tushiring:**
   ```bash
   php artisan serve
   ```

## 🔐 Rollar

- `admin`: Kurslar, foydalanuvchilar, hisobotlar, SMS sozlamalar va boshqalar.
- `teacher`: Guruhlar, testlar, videodarslar va monitoring
- `user`: Kurslarga yozilish, test ishlash, video ko‘rish

## 📁 Muhim Papkalar

- `app/Http/Controllers/` – Controllerlar
- `routes/web.php` – Veb marshrutlar
- `resources/views/` – Blade shablonlari
- `public/` – Frontend fayllar

## 📄 Litsenziya

Ushbu loyiha xususiy yoki ochiq manba sifatida litsenziyalanishi mumkin. Talab bo‘yicha aniqlashtiriladi.
