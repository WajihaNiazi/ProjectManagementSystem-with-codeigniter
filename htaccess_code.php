<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /ci/

RewriteCond %{REQUEST_URI} ^system.*
RewriteRule ^(.*)$ /index.php?/$1 [L]

RewriteCond %{REQUEST_URI} ^application.*
RewriteRule ^(.*)$ /index.php?/$1 [L]

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?/$1 [L]
</IfModule>