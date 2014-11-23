Dockerfile Generator
====================

This library will help you to generate a *Dockerfile* programmatically.

```php
include 'vendor/autoload.php';

use \Smalot\Docker\Dockerfile\Dockerfile;
use \Smalot\Docker\Dockerfile\Instruction\Run;
use \Smalot\Docker\Dockerfile\Instruction\Expose;
use \Smalot\Docker\Dockerfile\Source\File;

$dockerFile = new Dockerfile('debian:wheezy', 'Sebastien MALOT <smalot@actualys.com>');

$cmds = array(
    'apt-get update',
    'DEBIAN_FRONTEND=noninteractive apt-get -y upgrade',
    'DEBIAN_FRONTEND=noninteractive apt-get -y install supervisor pwgen',
    'DEBIAN_FRONTEND=noninteractive apt-get -y install git apache2 libapache2-mod-php5 php5-mysql php5-pgsql php5-gd php-pear php-apc curl',
    'curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin',
    'mv /usr/local/bin/composer.phar /usr/local/bin/composer',
);

$layer = new Run($cmds, 'Install packages');
$dockerFile->addLayer($layer);

$layer = new Expose(array(80, 443), 'Expose Ports');
$dockerFile->addLayer($layer);

$writer = new File('Dockerfile');
$dockerFile->write($writer);
```

Notes
-----

Excluding *FROM* and *MAINTAINER* instructions, which are passed to the constructor, other ones are passed to the writer in the same order as added to the Dockerfile object.
