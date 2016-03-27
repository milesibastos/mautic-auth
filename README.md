# mautic-auth
Mautic auth token generator

This is a way to generate auth token on Mautic API

## Usage:

. Clone the project

```
git clone https://github.com/HomeRefill/mautic-auth.git
```

. Create the ini file and run composer

```
cd mautic-auth
cp config/environment/dev.ini-dist config/environment/dev.ini
composer install
```

. Edit the ini file with your mautic base url and auth information

```
; MAUTIC
[mautic_settings]
baseUrl          = 'http://YOUR_MAUTIC_SERVER/'
version          = 'OAuth1a'
clientKey        = 'CLIENT_KEY_GENERATED_ON_MAUTIC_APP'
clientSecret     = 'CLIENT_SECRET_KEY_GENERATED_ON_MAUTIC_APP'
callback         = 'http://localhost:8070/auth'
```

* PS.: The callback must be accessable to your Mautic APP and must be the same configured on Mautic API Credentials

. Runs the server

```
cd web/
php -S localhost:8070
```

. Access the endpoint to generate the token

http://localhost:8070/auth
