<?php  
namespace Concrete\Package\OunziwAlis;

use Concrete\Core\Backup\ContentImporter;
use Concrete\Core\Package\Package;

class Controller extends Package
{
    protected $pkgHandle = 'ounziw_alis';
    protected $appVersionRequired = '8.4.2';
    protected $pkgVersion = '0.9';
    protected $pkgAutoloaderRegistries = [
        'src/Http' => 'Concrete\Package\OunziwAlis\Http',
    ];

    public function getPackageName()
    {
        return t('ALIS');
    }

    public function getPackageDescription()
    {
        return t('A package to pickup data from ALIS');
    }

    protected function installXmlContent()
    {
        $pkg = Package::getByHandle($this->pkgHandle);

        $ci = new ContentImporter();
        $ci->importContentFile($pkg->getPackagePath() . '/install.xml');
    }

    public function install()
    {
        parent::install();
        $this->installXmlContent();
    }

    public function upgrade()
    {
        parent::upgrade();
        $this->installXmlContent();
    }
}