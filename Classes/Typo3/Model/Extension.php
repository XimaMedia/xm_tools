<?php

namespace Xima\XmTools\Classes\Typo3\Model;

use Xima\XmTools\Classes\Typo3\Helper\Localization;

class Extension
{
    protected $name = null;
    protected $key = null;
    protected $relPath = null;
    protected $extPath = null;
    protected $jsRelPath = 'Resources/Public/js/';
    protected $cssRelPath = 'Resources/Public/css/';
    protected $settings = array();
    protected $translations = array();
    protected $configuration = array();

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function setKey($key)
    {
        $this->key = $key;
    }

    public function getRelPath()
    {
        return $this->relPath;
    }

    public function setRelPath($relPath)
    {
        $this->relPath = $relPath;
    }

    public function getExtPath()
    {
        return $this->extPath;
    }

    public function setExtPath($extPath)
    {
        $this->extPath = $extPath;
    }

    public function getJsRelPath()
    {
        return $this->jsRelPath;
    }

    public function setJsRelPath($jsRelPath)
    {
        $this->jsRelPath = $jsRelPath;
    }

    public function getCssRelPath()
    {
        return $this->cssRelPath;
    }

    public function setCssRelPath($cssRelPath)
    {
        $this->cssRelPath = $cssRelPath;
    }

    public function getSettings()
    {
        return $this->settings;
    }

    public function setSettings($settings)
    {
        $this->settings = $settings;
    }

    public function getTranslations($lang)
    {
        if (empty($this->translations[$lang])) {
            $this->translations[$lang] = Localization::getTranslations($this, $lang);
        }

        return $this->translations[$lang];
    }

    public function setTranslations($translations)
    {
        $this->translations = $translations;

        return $this;
    }

    public function getConfiguration()
    {
        return $this->configuration;
    }

    public function setConfiguration($configuration)
    {
        $this->configuration = $configuration;

        return $this;
    }
}