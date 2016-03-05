<?php

/**
 * 2016
 */

namespace sheillendra\theme;

use Yii;
use yii\base\BootstrapInterface;
use yii\web\CookieCollection;
/**
 * class ini hanya digunakan jika extension ini digunakan sebagai module
 * dan didaftarkan di bootstrap aplikasi
 */
class Module extends \yii\base\Module implements BootstrapInterface {

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'sheillendra\theme\controllers';

    /**
     * default name of theme, set in config
     * @var string 
     */
    public $defaultTheme;

    /**
     * as default this theme use cookie to save theme state
     * @var string 
     */
    public $themeCookieName = 'sheillendra-theme';

    /**
     * @var boolean 
     */
    public $useDbConfig = false;

    /**
     * connection name of configuration if $useDbConfig is true
     * @var string 
     */
    public $configConnectionName = 'db';

    /**
     * table name of configuration
     * @var string 
     */
    public $configTableName = 'configuration';

    
    /**
     * @inheritdoc
     */
    public function bootstrap($app) {
        //echo preg_replace('/ \((?!(The|UCSD)\)).*?\)/', '', 'The makanan UCSD');exit;
        if ($app instanceof \yii\web\Application) {

            $activeTheme = $this->defaultTheme;
            if ($this->useDbConfig) {
                
            } else {
                $cookie = new CookieCollection();
                if ($themeNameFromCookie = $cookie->get($this->themeCookieName)) {
                    $activeTheme = $themeNameFromCookie;
                }
            }

            if (!$activeTheme) {
                $activeTheme = $this->getTheme($app);
            }
            
            
        }
    }

    public function getTheme($app) {
        $this->collectThemes($app);
    }

    public function getThemes() {
        $this->collectThemes();
    }

    protected function collectThemes($app) {
//        print_r($app->getView()->theme->pathMap);exit;
    }

}
