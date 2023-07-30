# How To Install Phalcon In XAMPP On Windows 11 ✨

This is a sample application for the Phalcon Framework minimized from phalcon vokuro sample project.

## Clone The Repository

Download the repository inside the composer package inside the xampp htdocs folder

```bash

git clone git@github.com:dhanar98/phalcon-skeleton-xampp.git
```

## Installing Dependencies via Composer

```shell

cd phalcon-skeleton-xampp
composer install

vendor/bin/phinx migrate
vendor/bin/phinx seed:run
```

Rename the file
> .env.example 

To 

> .env 

## Support Phalcon Framework

<a href="https://opencollective.com/phalcon/#contributors">
<img src="https://opencollective.com/phalcon/tiers/sponsors.svg?avatarHeight=48&width=800" alt="sponsors">
</a>

## SYSTEM CONFIGURATION INFORMATION 

```bash
OS VERSION : WINDOWS 11
PHP VERSION : 8.1.17
PHALCON VERSION : 5.0.1
```