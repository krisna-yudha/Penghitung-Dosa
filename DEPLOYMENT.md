# Deployment Checklist untuk Production

## 1. Update file .env di server
Pastikan setting ini ada di file .env server:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://dosa.gentz.me

# Force HTTPS
FORCE_HTTPS=true
```

## 2. Run command di server
```bash
cd /path/to/project

# Clear cache
php artisan config:clear
php artisan route:clear
php artisan cache:clear
php artisan view:clear

# Optimize untuk production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set permissions (Linux/Unix)
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

## 3. Pastikan file .htaccess di folder public/
```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Force HTTPS
    RewriteCond %{HTTPS} off
    RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

## 4. Cek file yang sudah diupdate:
- ✅ app/Providers/AppServiceProvider.php (sudah ditambahkan force HTTPS)
- ✅ routes/web.php (sudah ditambahkan fallback route)

## 5. Testing
Setelah deploy update:
1. Clear browser cache (Ctrl+Shift+Del)
2. Test di Incognito/Private mode
3. Buka https://dosa.gentz.me
4. Cek console browser untuk error
5. Test fitur "Cek Dosa"

## 6. Troubleshooting jika masih error:
- Cek SSL certificate valid
- Pastikan document root point ke folder `public/`
- Cek file permissions `storage/` dan `bootstrap/cache/`
- Restart PHP-FPM atau web server
