# Laravel 11 Todo Application

Modern ve kullanıcı dostu bir todo uygulaması. Laravel 11 ve Jetstream kullanılarak geliştirilmiştir.

## Özellikler

- 🔐 Kullanıcı Kimlik Doğrulama (Laravel Jetstream)
- 📝 Todo Oluşturma ve Yönetme
- ✅ Todo Durumunu Değiştirme (Tamamlandı/Beklemede)
- 🗑️ Todo Silme
- 🌓 Karanlık/Aydınlık Tema Desteği
- 🎨 Özel Renk Teması (Olive Green & Light Beige)
- 📱 Responsive Tasarım

## Teknolojiler

- Laravel 11
- Laravel Jetstream
- Tailwind CSS
- Alpine.js
- MySQL

## Kurulum

1. Repoyu klonlayın:
```bash
git clone https://github.com/ademcaniyik/laravel11_todo.git
cd laravel11_todo
```

2. Bağımlılıkları yükleyin:
```bash
composer install
npm install
```

3. .env dosyasını oluşturun:
```bash
cp .env.example .env
```

4. Uygulama anahtarını oluşturun:
```bash
php artisan key:generate
```

5. Veritabanı ayarlarını yapın:
- .env dosyasında veritabanı bilgilerinizi düzenleyin
```bash
php artisan migrate
```

6. Asset'leri derleyin:
```bash
npm run build
```

7. Uygulamayı çalıştırın:
```bash
php artisan serve
```

## XAMPP ile Kullanım

1. Projeyi `C:/xampp/htdocs/` dizinine klonlayın
2. XAMPP'i başlatın ve Apache ile MySQL servislerini çalıştırın
3. Tarayıcıdan `http://localhost/laravel11_todo/public` adresine gidin

## Özelleştirme

### Tema Renkleri
Özel tema renkleri `tailwind.config.js` dosyasında tanımlanmıştır:
- Olive Green: #767442
- Light Beige: #e6e5ca

## Lisans

Bu proje [MIT lisansı](LICENSE) altında lisanslanmıştır.

## İletişim

Sorularınız veya önerileriniz için [GitHub Issues](https://github.com/ademcaniyik/laravel11_todo/issues) kullanabilirsiniz.
