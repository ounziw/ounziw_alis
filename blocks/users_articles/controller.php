<?php  
namespace Concrete\Package\OunziwAlis\Block\UsersArticles;

use Concrete\Core\Block\BlockController;
use Concrete\Package\OunziwAlis\Http\GetAlisDataTrait;

class Controller extends BlockController
{
    use GetAlisDataTrait;
    protected $btTable = 'btOunziwUserArticle';
    protected $btInterfaceWidth = "320";
    protected $btInterfaceHeight = "320";

    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = true;
    protected $btCacheBlockOutputLifetime = 21600; // 6 hours

    public function getBlockTypeName()
    {
        return t('ALIS: User Article');
    }

    public function getBlockTypeDescription()
    {
        return t('Pickups ALIS User Articles and Displays them.');
    }

    public function view()
    {
        $data = array();
        if (isset($this->user_id) && ctype_alnum($this->user_id)) {
            if (!$this->numlimit) {
                $this->numlimit = 5;
            }
            $url = 'https://alis.to/api/users/'. $this->user_id . '/articles/public?limit=' . intval($this->numlimit);
            $data = $this->getAlisData($url);
        }
        $this->set('alisdata', $data);
    }

    public function validate($args) {
        $error = $this->app->make('helper/validation/error');
        // User IDは英数字 (ALISの仕様では、ハイフンなども通るようだが、このルールにしてある。厳密な仕様に合わせたプルリクエストは歓迎です)
        if ($args['user_id'] && !ctype_alnum($args['user_id'])) {
            $error->add(t('User ID must be alphanumeric.'));
        }
        // Number of Articlesは数字 (is_numericなので数字っぽいものなら通るが、管理画面用なら緩い基準で良い、という判断。厳密な仕様に合わせたプルリクエストは歓迎です)
        if ($args['numlimit'] && !is_numeric($args['numlimit'])) {
            $error->add(t('Number of Articles must be a number.'));
        }
        return $error;
    }
}