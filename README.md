# Labify Auth Scaffold Bootstrap

Auth scaffolding for Laravel 12.x with Bootstrap 5 — login, register, forgot/reset, verify, confirm — plus a separate **user_profiles** table and polished UI.

## Compatibility
- Laravel: 12.x
- PHP: >= 8.2
- Bootstrap: 5.3.6 (CDN)
- jQuery: not required
- HTML: Blade + HTML5

## Install (Packagist/VCS)
```bash
composer require labify/auth-scaffold-bootstrap:dev-main
```

If private, add a repository to your app `composer.json`:
```json
{
  "repositories": [
    {"type":"vcs","url":"https://github.com/<you>/auth-scaffold-bootstrap"}
  ]
}
```
or use a local path:
```json
{
  "repositories": {
    "labify-auth-scaffold": {"type":"path","url":"D:/packages/auth-scaffold-bootstrap","options":{"symlink":false}}
  }
}
```

## Publish & migrate
```bash
php artisan asb:install --migrate
# paste routes from routes/web.auth.php into routes/web.php
# /home is behind ['auth','verified']
```

## Models & relations
- `User` implements `MustVerifyEmail` and hasOne `UserProfile`.
- `UserProfile` belongsTo `User`.
- Registration creates `User`, then `UserProfile`, and redirects to `verification.notice`.

## Assets
```bash
npm i && npm run build
```

MIT © 2025 Labify
