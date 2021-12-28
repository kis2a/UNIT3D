<p align="center">
    <img src="https://i.postimg.cc/vZb6tpnw/Screen-Shot-2021-10-21-at-5-09-07-PM.png" alt="UNIT3D-Community-Edition Cover Image">
</p>

<hr>

<p align="center">
<a href="http://laravel.com"><img src="https://img.shields.io/badge/Laravel-8-f4645f.svg" /></a> 
<a href="https://github.com/HDInnovations/UNIT3D/blob/master/LICENSE"><img src="https://img.shields.io/badge/License-AGPL%20v3.0-yellow.svg" /></a>
<br>
<a href="https://github.styleci.io/repos/113471037"><img src="https://github.styleci.io/repos/113471037/shield?style=flat&branch=master" alt="StyleCI"></a>
<a href="https://github.com/HDInnovations/UNIT3D-Community-Edition/actions/workflows/phpunit-test.yml/badge.svg"><img src="https://github.com/HDInnovations/UNIT3D-Community-Edition/actions/workflows/phpunit-test.yml/badge.svg" /></a>
<a href="https://github.com/HDInnovations/UNIT3D-Community-Edition/actions/workflows/compile-assets-test.yml/badge.svg"><img src="https://github.com/HDInnovations/UNIT3D-Community-Edition/actions/workflows/compile-assets-test.yml/badge.svg" /></a>
<br>
<a href="https://discord.gg/J8dsx7F5yT"><img alt="Discord chat" src="https://img.shields.io/badge/discord-Chat%20Now-a29bfe.svg" /></a>
<a href="https://observatory.mozilla.org/analyze/unit3d.site"><img src="https://img.shields.io/badge/A+-Mozilla%20Observatory-blueviolet.svg"></a>
<a href="http://makeapullrequest.com"><img src="https://img.shields.io/badge/PRs-welcome-brightgreen.svg"></a>
<br>
<a href="https://huntr.dev"><img src="https://cdn.huntr.dev/huntr_security_badge_mono.svg"></a>    
</p>

<p align="center">
    🎉<b>A Big Thanks To All Our <a href="https://github.com/HDInnovations/UNIT3D-Community-Edition/graphs/contributors">Contributors</a> and <a href="https://github.com/sponsors/HDVinnie">Sponsors</a></b>🎉
</p>

## 📝 Table of Contents

1. [Introduction](#introduction)
2. [Some Features](#features)
3. [Requirements](#requirements)
4. [Installation](#installation)
4.1 [Automated-Installer](#auto-install)
5. [Updating](#updating)
6. [Version Support Information](#versions)
7. [Security](#security)
8. [Contributing](#contributing)
9. [License](#license)
10. [Demo](#demo)
11. [Sponsor-Chat](#chat)
12. [Sponsoring](#sponsor)
13. [Special Thanks](#thanks)


## <a name="introduction"></a> 🧐 Introduction

I have been developing a Nex-Gen Torrent Tracker Software called "UNIT3D." This is a PHP software based on the lovely Laravel Framework -- currently Laravel Framework 8, MySQL Strict Mode Compliant, and PHP 8.0 Ready. The code is well-designed and follows the PSR-2 coding style. It uses an MVC Architecture to ensure clarity between logic and presentation. As a hashing algorithm of Bcrypt or Argon2 is used, to ensure a safe and proper way to store the passwords for the users. A lightweight Blade Templating Engine. Caching System Supporting: "apc,” "array,” "database,” "file," "memcached," and "redis" methods. Eloquent and much more!

## <a name="features"></a> 💎 Some Features

UNIT3D currently offers the following features:
  - Internal Forums System
  - Staff Dashboard
  - Faceted Ajax Torrent Search System
  - BON Store
  - Torrent Request Section with BON Bounties
  - Freeleech System
  - Double Upload System
  - Featured Torrents System
  - Polls System
  - Extra-Stats
  - PM System
  - Multilingual Support
  - TwoStep Auth System
  - DB + Files Backup Manager
  - RSS System
  - and MUCH MORE!

## <a name="requirements"></a> ☑️ Requirements

- A Web server (NGINX is recommended)
- PHP 8.0 + is required
- Dependencies for PHP,
  -   php-curl -> This is specifically needed for the various APIs we have running.
  -   php-intl -> This is required for the Spatie\SslCertificate.
  -   php-zip -> This is required for the Backup Manager.
- Crontab access
- A Redis server
- MySQL 5.7 + or MariaDB 10.2 +
- TheMovieDB API Key: https://www.themoviedb.org/documentation/api
- A decent dedicated server. Dont try running this on some crappy server!
<pre>
Processor: Intel  Xeon E3-1245v2 -
Cores/Threads: 4c/8t
Frequency: 3.4GHz /3.8GHz
RAM: 32GB DDR3 1333 MHz
Disks: SoftRaid  2x240 GB   SSD
Bandwidth: 250 Mbps
Traffic: Unlimited
<b>Is Under $50 A Month</b>
</pre>

## <a name="installation"></a> 🖥️ Installation
```
NOTE: If you are running UNIT3D on a non HTTPS instance you MUST change the following configs.

.env  <-- SESSION_SECURE_COOKIE must be set to false
config/secure-headers.php   <-- HTTP Strict Transport Security must be set to false
config/secure-headers.php   <-- Content Security Policy must be disabled
```

### <a name="auto-install"></a> Automated Installer
**A UNIT3D Installer has been released by Poppabear.**

**Officially Supported OS's**
- Ubuntu 20.04 LTS (Recommended)
- Ubuntu 18.04 LTS
- Ubuntu 16.04 LTS

**For Ubuntu 20.04 LTS:**
```
git clone https://github.com/kis2a/INSTALLER-UNIT3D.git installer
cd installer
sudo ./install.sh
```

Check it out here for more information: https://github.com/kis2a/INSTALLER-UNIT3D

### Demo Data

Use this command to generate demo users and torrents for testing purposes:

`php artisan demo:seed`

## <a name="updating"></a> 🖥️ Updating
`php artisan git:update`

## <a name="versions"></a> 🚨 Version Support Information
 Version     | Status                   | PHP Version Required
:------------|:-------------------------|:------------
 5.x.x       |  Active Support :rocket: | >= 8.0
 4.x.x       |  End Of Life :skull: | >= 7.4
 3.x.x       |  End Of Life :skull: | >= 7.4
 2.3.0 to 2.7.0|  End Of Life :skull: | >= 7.4
 2.0.0 to 2.2.7|  End Of Life :skull: | >= 7.3
 1.0 to 1.9.4|  End Of Life :skull:     | >= 7.1.3


