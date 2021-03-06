<?php

/**
 * Unit Tests
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @version 1.0.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\Tests\Volume;

class ServiceTest extends \OpenCloud\Tests\OpenCloudTestCase
{

    private $service;

    public function __construct()
    {
        $this->service = $this->getClient()->volumeService('cloudBlockStorage', 'DFW');
    }

    public function test__construct()
    {
        $this->assertInstanceOf(
            'OpenCloud\Volume\Service', 
            $this->getClient()->volumeService('cloudBlockStorage', 'DFW')
        );
    }

    public function testVolume()
    {
        $this->assertInstanceOf('OpenCloud\Volume\Resource\Volume', $this->service->Volume());
    }

    public function testVolumeList()
    {
        $this->assertInstanceOf('OpenCloud\Common\Collection', $this->service->VolumeList());
    }

    public function testVolumeType()
    {
        $this->assertInstanceOf('OpenCloud\Volume\Resource\VolumeType', $this->service->VolumeType());
    }

    /**
     * @expectedException Guzzle\Http\Exception\ClientErrorResponseException
     */
    public function testVolumeTypeList()
    {
        $this->service->VolumeTypeList();
    }

    public function testSnapshot()
    {
        $this->assertInstanceOf('OpenCloud\Volume\Resource\Snapshot', $this->service->Snapshot());
    }

    /**
     * @expectedException Guzzle\Http\Exception\ClientErrorResponseException
     */
    public function testSnapshotList()
    {
        $this->service->SnapshotList();
    }

}
