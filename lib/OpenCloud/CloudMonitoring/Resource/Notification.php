<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2013 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\CloudMonitoring\Resource;

/**
 * Notification class.
 */
class Notification extends AbstractResource
{
    private $id;
    private $label;
    private $type;
    private $details;
    
    protected static $json_name = false;
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'notifications';
    
    protected static $emptyObject = array(
        'label',
        'type',
        'details'
    );

    protected static $requiredKeys = array(
        'type',
        'details'
    );
    
    protected $associatedResources = array(
        'NotificationType' => 'NotificationType'
    );
        
    public function testUrl($debug = false)
    {
        return $this->getService()->url('test-notification');
    }
    
    public function testExisting($debug = false)
    {
        return $this->getService()
            ->getClient()
            ->post($this->testUrl($debug))
            ->send()
            ->getDecodedBody();
    }
    
}