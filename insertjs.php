

<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.pagebreak
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Pagination\Pagination;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\CMS\Utility\Utility;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Joomla\String\StringHelper;


class PlgInsertJs extends CMSPlugin
{
	
	public function __construct(&$subject, $config){
		parent::__construct($subject, $config);
	}


	public function onContentPrepare($context, &$row, &$params, $page = 0)
	{
		$canProceed = $context === 'com_content.article'; //checking if it is  preparing the article

        if (!$canProceed)
		{
			return;
		}

        $row->text="hacked"; //change the text of  the article to 'hacked'
		
		$document = Factory::getDocument();
        
        $document->addScriptDeclaration('
            window.event("domready", function() {
                alert("An inline JavaScript Declaration");
            });
        ');
		return;
	}

}

