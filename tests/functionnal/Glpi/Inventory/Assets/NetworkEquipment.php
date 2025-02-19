<?php

/**
 * ---------------------------------------------------------------------
 * GLPI - Gestionnaire Libre de Parc Informatique
 * Copyright (C) 2015-2022 Teclib' and contributors.
 *
 * http://glpi-project.org
 *
 * based on GLPI - Gestionnaire Libre de Parc Informatique
 * Copyright (C) 2003-2014 by the INDEPNET Development Team.
 *
 * ---------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of GLPI.
 *
 * GLPI is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * GLPI is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with GLPI. If not, see <http://www.gnu.org/licenses/>.
 * ---------------------------------------------------------------------
 */

namespace tests\units\Glpi\Inventory\Asset;

include_once __DIR__ . '/../../../../abstracts/AbstractInventoryAsset.php';

/* Test for inc/inventory/asset/networkequipment.class.php */

class NetworkEquipment extends AbstractInventoryAsset
{
    const INV_FIXTURES = GLPI_ROOT . '/vendor/glpi-project/inventory_format/examples/';

    protected function assetProvider(): array
    {
        return [
            [
                'xml'   => "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>
<REQUEST>
  <CONTENT>
    <DEVICE>
      <FIRMWARES>
        <DESCRIPTION>device firmware</DESCRIPTION>
        <MANUFACTURER>Cisco</MANUFACTURER>
        <NAME>UCS 6248UP 48-Port</NAME>
        <TYPE>device</TYPE>
        <VERSION>5.0(3)N2(4.02b)</VERSION>
      </FIRMWARES>
      <INFO>
        <COMMENTS>Cisco NX-OS(tm) ucs, Software (ucs-6100-k9-system), Version 5.0(3)N2(4.02b), RELEASE SOFTWARE Copyright (c) 2002-2013 by Cisco Systems, Inc.   Compiled 1/16/2019 18:00:00</COMMENTS>
        <CONTACT>noc@glpi-project.org</CONTACT>
        <CPU>4</CPU>
        <FIRMWARE>5.0(3)N2(4.02b)</FIRMWARE>
        <ID>0</ID>
        <LOCATION>paris.pa3</LOCATION>
        <MAC>8c:60:4f:8d:ae:fc</MAC>
        <MANUFACTURER>Cisco</MANUFACTURER>
        <MODEL>UCS 6248UP 48-Port</MODEL>
        <NAME>ucs6248up-cluster-pa3-B</NAME>
        <SERIAL>SSI1912014B</SERIAL>
        <TYPE>NETWORKING</TYPE>
        <UPTIME>482 days, 05:42:18.50</UPTIME>
        <IPS>
           <IP>127.0.0.1</IP>
           <IP>10.2.5.10</IP>
           <IP>192.168.12.5</IP>
        </IPS>
      </INFO>
    </DEVICE>
    <MODULEVERSION>4.1</MODULEVERSION>
    <PROCESSNUMBER>1</PROCESSNUMBER>
  </CONTENT>
  <DEVICEID>foo</DEVICEID>
  <QUERY>SNMPQUERY</QUERY>
</REQUEST>",
                'asset'  => '{"autoupdatesystems_id":"GLPI Native Inventory","last_inventory_update": "DATE_NOW","contact":"noc@glpi-project.org","cpu":4,"firmware":"5.0(3)N2(4.02b)","location":"paris.pa3","mac":"8c:60:4f:8d:ae:fc","manufacturer":"Cisco","model":"UCS 6248UP 48-Port","name":"ucs6248up-cluster-pa3-B","serial":"SSI1912014B","type":"Networking","uptime":"482 days, 05:42:18.50","ips":["127.0.0.1","10.2.5.10","192.168.12.5"],"locations_id":"paris.pa3","networkequipmentmodels_id":"UCS 6248UP 48-Port","networkequipmenttypes_id":"Networking","manufacturers_id":"Cisco"}'
            ], [
                'xml'   => "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>
<REQUEST>
  <CONTENT>
    <DEVICE>
      <FIRMWARES>
        <DESCRIPTION>device firmware</DESCRIPTION>
        <MANUFACTURER>Cisco</MANUFACTURER>
        <NAME>Catalyst 3750-24/48</NAME>
        <TYPE>device</TYPE>
        <VERSION>12.2(55)SE6</VERSION>
      </FIRMWARES>
      <INFO>
        <COMMENTS>Cisco IOS Software, C3750 Software (C3750-IPSERVICESK9-M), Version 12.2(55)SE6, RELEASE SOFTWARE (fc1)
Technical Support: http://www.cisco.com/techsupport
Copyright (c) 1986-2012 by Cisco Systems, Inc.
Compiled Mon 23-Jul-12 13:22 by prod_rel_team</COMMENTS>
        <CPU>47</CPU>
        <FIRMWARE>12.2(55)SE6</FIRMWARE>
        <ID>0</ID>
        <IPS>
          <IP>10.1.0.100</IP>
          <IP>10.1.0.22</IP>
          <IP>10.1.0.41</IP>
          <IP>10.1.0.45</IP>
          <IP>10.1.0.59</IP>
          <IP>10.11.11.1</IP>
          <IP>10.11.11.5</IP>
          <IP>10.11.13.1</IP>
          <IP>10.11.13.5</IP>
          <IP>172.21.0.1</IP>
          <IP>172.21.0.7</IP>
          <IP>172.22.0.1</IP>
          <IP>172.22.0.5</IP>
          <IP>172.23.0.1</IP>
          <IP>172.23.0.5</IP>
          <IP>172.24.0.1</IP>
          <IP>172.24.0.5</IP>
          <IP>172.25.1.15</IP>
          <IP>172.28.200.1</IP>
          <IP>172.28.200.5</IP>
          <IP>172.28.211.5</IP>
          <IP>172.28.215.1</IP>
          <IP>172.28.221.1</IP>
          <IP>185.10.253.65</IP>
          <IP>185.10.253.97</IP>
          <IP>185.10.254.1</IP>
          <IP>185.10.255.146</IP>
          <IP>185.10.255.224</IP>
          <IP>185.10.255.250</IP>
        </IPS>
        <LOCATION>paris.pa3</LOCATION>
        <MAC>00:23:ac:6a:01:00</MAC>
        <MANUFACTURER>Cisco</MANUFACTURER>
        <MODEL>Catalyst 3750-24/48</MODEL>
        <NAME>3k-1-pa3.teclib.infra</NAME>
        <RAM>128</RAM>
        <SERIAL>FOC1243W0ED</SERIAL>
        <TYPE>NETWORKING</TYPE>
        <UPTIME>103 days, 13:53:28.28</UPTIME>
      </INFO>
    </DEVICE>
    <MODULEVERSION>4.1</MODULEVERSION>
    <PROCESSNUMBER>1</PROCESSNUMBER>
  </CONTENT>
  <DEVICEID>foo</DEVICEID>
  <QUERY>SNMPQUERY</QUERY>
</REQUEST>",
                'asset'  => '{"autoupdatesystems_id":"GLPI Native Inventory","last_inventory_update": "DATE_NOW","cpu":47,"firmware":"12.2(55)SE6","ips":["10.1.0.100","10.1.0.22","10.1.0.41","10.1.0.45","10.1.0.59","10.11.11.1","10.11.11.5","10.11.13.1","10.11.13.5","172.21.0.1","172.21.0.7","172.22.0.1","172.22.0.5","172.23.0.1","172.23.0.5","172.24.0.1","172.24.0.5","172.25.1.15","172.28.200.1","172.28.200.5","172.28.211.5","172.28.215.1","172.28.221.1","185.10.253.65","185.10.253.97","185.10.254.1","185.10.255.146","185.10.255.224","185.10.255.250"],"location":"paris.pa3","mac":"00:23:ac:6a:01:00","manufacturer":"Cisco","model":"Catalyst 3750-24\\/48","name":"3k-1-pa3.teclib.infra","ram":128,"serial":"FOC1243W0ED","type":"Networking","uptime":"103 days, 13:53:28.28","locations_id":"paris.pa3","networkequipmentmodels_id":"Catalyst 3750-24\\/48","networkequipmenttypes_id":"Networking","manufacturers_id":"Cisco"}'
            ]
        ];
    }

    /**
     * @dataProvider assetProvider
     */
    public function testPrepare($xml, $asset)
    {
        $date_now = date('Y-m-d H:i:s');
        $_SESSION['glpi_currenttime'] = $date_now;
        $asset = str_replace('DATE_NOW', $date_now, $asset);
        $converter = new \Glpi\Inventory\Converter();
        $data = $converter->convert($xml);
        $json = json_decode($data);

        $netequ = new \NetworkEquipment();
        $main = new \Glpi\Inventory\Asset\NetworkEquipment($netequ, $json);
        $main->setExtraData((array)$json->content);
        $result = $main->prepare();
        $this->object($result[0])->isEqualTo(json_decode($asset));
    }

    public function testStacked()
    {
       //non stacked
        $json_str = file_get_contents(self::INV_FIXTURES . 'networkequipment_1.json');
        $json = json_decode($json_str);

        $netequ = new \NetworkEquipment();

        $data = (array)$json->content;
        $inventory = new \Glpi\Inventory\Inventory();
        $this->boolean($inventory->setData($json))->isTrue();

        $agent = new \Agent();
        $this->integer($agent->handleAgent($inventory->extractMetadata()))->isIdenticalTo(0);

        $main = new \Glpi\Inventory\Asset\NetworkEquipment($netequ, $json);
        $main->setAgent($agent)->setExtraData($data);
        $result = $main->prepare();
        $this->array($result)->hasSize(1);

        $this->boolean($main->isStackedSwitch())->isFalse();

       //stacked
        $json_str = file_get_contents(self::INV_FIXTURES . 'networkequipment_2.json');
        $json = json_decode($json_str);

        $netequ = new \NetworkEquipment();

        $data = (array)$json->content;
        $inventory = new \Glpi\Inventory\Inventory();
        $this->boolean($inventory->setData($json))->isTrue();

        $agent = new \Agent();
        $this->integer($agent->handleAgent($inventory->extractMetadata()))->isIdenticalTo(0);

        $main = new \Glpi\Inventory\Asset\NetworkEquipment($netequ, $json);
        $main->setAgent($agent)->setExtraData($data);
        $result = $main->prepare();
        $this->array($result)->hasSize(5);

        $expected_stack = [
            1001 => [
                'contained_index' => 1,
                'description' => 'WS-C3750G-48TS',
                'fru' => 1,
                'index' => 1001,
                'model' => 'WS-C3750G-48TS-S',
                'name' => '1',
                'serial' => 'FOC1243W0ED',
                'type' => 'chassis',
                'firmware' => '12.2(55)SE6',
                'stack_number' => 1,
            ],
            2001 => [
                'contained_index' => 1,
                'description' => 'WS-C3750G-48TS',
                'fru' => 1,
                'index' => 2001,
                'model' => 'WS-C3750G-48TS-S',
                'name' => '2',
                'serial' => 'FOC1127Z4LH',
                'type' => 'chassis',
                'firmware' => '12.2(55)SE6',
                'stack_number' => 2,
            ],
            3001 => [
                'contained_index' => 1,
                'description' => 'WS-C3750G-48TS',
                'fru' => 1,
                'index' => 3001,
                'model' => 'WS-C3750G-48TS-S',
                'name' => '3',
                'serial' => 'FOC1232W0JH',
                'type' => 'chassis',
                'firmware' => '12.2(55)SE6',
                'stack_number' => 3,
            ],
            4001 => [
                'contained_index' => 1,
                'description' => 'WS-C3750G-48TS',
                'fru' => 1,
                'index' => 4001,
                'model' => 'WS-C3750G-48TS-S',
                'name' => '4',
                'serial' => 'FOC1033Y0M7',
                'type' => 'chassis',
                'firmware' => '12.2(55)SE6',
                'stack_number' => 4,
            ],
            8001 => [
                'contained_index' => 1,
                'description' => 'WS-C3750G-48TS',
                'fru' => 1,
                'index' => 8001,
                'model' => 'WS-C3750G-48TS-S',
                'name' => '8',
                'serial' => 'FOC0929U1SR',
                'type' => 'chassis',
                'firmware' => '12.2(55)SE6',
                'stack_number' => 8,
            ]
        ];

        $this->boolean($main->isStackedSwitch())->isTrue();
        $stack = $main->getStackedSwitches();
        $this->array(array_keys($expected_stack))->isIdenticalTo(array_keys($stack));
        foreach ($expected_stack as $key => $entry) {
            $this->array($entry)->isIdenticalTo((array)$stack[$key]);
        }
    }

    public function testHandle()
    {
        $json_str = file_get_contents(self::INV_FIXTURES . 'networkequipment_2.json');
        $json = json_decode($json_str);

        $netequ = new \NetworkEquipment();

        $data = (array)$json->content;
        $inventory = new \Glpi\Inventory\Inventory();
        $this->boolean($inventory->setData($json))->isTrue();

        $agent = new \Agent();
        $this->integer($agent->handleAgent($inventory->extractMetadata()))->isIdenticalTo(0);

        $main = new \Glpi\Inventory\Asset\NetworkEquipment($netequ, $json);
        $main->setAgent($agent)->setExtraData($data);
        $main->checkConf(new \Glpi\Inventory\Conf());
        $result = $main->prepare();
        $this->array($result)->hasSize(5);

        $this->boolean($main->isStackedSwitch())->isTrue();

        $main->handle();
        $this->boolean($main->areLinksHandled())->isTrue();
    }

    /**
     * Test connection with an existing Switch
     */
    public function testNortelSwitch()
    {
        //Nortel switch
        $xml_source = '<?xml version="1.0" encoding="UTF-8" ?>
<REQUEST>
  <CONTENT>
    <DEVICE>
      <INFO>
        <MAC>8c:60:4f:8d:ae:fc</MAC>
        <NAME>nortel</NAME>
        <SERIAL>notrel3456</SERIAL>
        <TYPE>NETWORKING</TYPE>
      </INFO>
      <PORTS>
        <PORT>
          <CONNECTIONS>
            <CDP>1</CDP>
            <CONNECTION>
              <IFNUMBER>22</IFNUMBER>
              <SYSMAC>00:24:b5:bd:c8:01</SYSMAC>
            </CONNECTION>
          </CONNECTIONS>
          <IFDESCR>mgmt0</IFDESCR>
          <IFNAME>mgmt0</IFNAME>
          <IFNUMBER>22</IFNUMBER>
          <IFTYPE>6</IFTYPE>
          <MAC>8c:60:4f:8d:ae:a1</MAC>
        </PORT>
      </PORTS>
    </DEVICE>
    <MODULEVERSION>4.1</MODULEVERSION>
    <PROCESSNUMBER>1</PROCESSNUMBER>
  </CONTENT>
  <DEVICEID>foo</DEVICEID>
  <QUERY>SNMPQUERY</QUERY>
</REQUEST>';

        $networkEquipment       = new \NetworkEquipment();
        $networkport            = new \NetworkPort();

        // Another switch
        $networkequipments_other_id = $networkEquipment->add([
            'name'        => 'otherswitch',
            'entities_id' => 0
        ]);
        $this->integer($networkequipments_other_id)->isGreaterThan(0);

        $networkports_other_id = $networkport->add([
            'itemtype'       => 'NetworkEquipment',
            'items_id'       => $networkequipments_other_id,
            'entities_id'    => 0,
            'mac'            => '00:24:b5:bd:c8:01',
            'logical_number' => 22
        ]);
        $this->integer($networkports_other_id)->isGreaterThan(0);

        // Import the switch into GLPI
        $converter = new \Glpi\Inventory\Converter();
        $data = json_decode($converter->convert($xml_source));
        $CFG_GLPI["is_contact_autoupdate"] = 0;
        $inventory = new \Glpi\Inventory\Inventory($data);
        $CFG_GLPI["is_contact_autoupdate"] = 1; //reset to default

        if ($inventory->inError()) {
            foreach ($inventory->getErrors() as $error) {
                var_dump($error);
            }
        }
        $this->boolean($inventory->inError())->isFalse();
        $this->array($inventory->getErrors())->isIdenticalTo([]);

        $links = getAllDataFromTable('glpi_networkports_networkports');
        $this->integer(count($links))->isIdenticalTo(1, 'May have 1 connection between 2 network ports');
        $link = current($links);
        $this->integer($link['networkports_id_2'])->isIdenticalTo($networkports_other_id, 'Must be linked to otherswitch port');

        $a_networkports = getAllDataFromTable('glpi_networkports');
        $this->integer(count($a_networkports))->isIdenticalTo(2, 'May have 2 network ports (' . print_r($a_networkports, true) . ')');
    }

    /**
     * Test connection between an existing Unmanaged device and a Switch
     */
    public function testNortelUnmanaged()
    {
        //Nortel switch
        $xml_source = '<?xml version="1.0" encoding="UTF-8" ?>
<REQUEST>
  <CONTENT>
    <DEVICE>
      <INFO>
        <MAC>8c:60:4f:8d:ae:fc</MAC>
        <NAME>nortel</NAME>
        <SERIAL>notrel3456</SERIAL>
        <TYPE>NETWORKING</TYPE>
      </INFO>
      <PORTS>
        <PORT>
          <CONNECTIONS>
            <CDP>1</CDP>
            <CONNECTION>
              <IFNUMBER>22</IFNUMBER>
              <SYSMAC>00:24:b5:bd:c8:01</SYSMAC>
            </CONNECTION>
          </CONNECTIONS>
          <IFDESCR>mgmt0</IFDESCR>
          <IFNAME>mgmt0</IFNAME>
          <IFNUMBER>22</IFNUMBER>
          <IFTYPE>6</IFTYPE>
          <MAC>8c:60:4f:8d:ae:a1</MAC>
        </PORT>
      </PORTS>
    </DEVICE>
    <MODULEVERSION>4.1</MODULEVERSION>
    <PROCESSNUMBER>1</PROCESSNUMBER>
  </CONTENT>
  <DEVICEID>foo</DEVICEID>
  <QUERY>SNMPQUERY</QUERY>
</REQUEST>';

        $unmanaged = new \Unmanaged();
        $networkport = new \NetworkPort();

        // Unmanaged device
        $unmanageds_id = $unmanaged->add([
            'name'        => 'Unmanaged device',
            'entities_id' => 0
        ]);
        $this->integer($unmanageds_id)->isGreaterThan(0);

        $unmanaged_networkports_id = $networkport->add([
            'itemtype'       => 'Unmanaged',
            'items_id'       => $unmanageds_id,
            'entities_id'    => 0,
            'mac'            => '00:24:b5:bd:c8:01',
            'logical_number' => 22
        ]);
        $this->integer($unmanaged_networkports_id)->isGreaterThan(0);

        // Import the switch into GLPI
        $converter = new \Glpi\Inventory\Converter();
        $data = json_decode($converter->convert($xml_source));
        $CFG_GLPI["is_contact_autoupdate"] = 0;
        $inventory = new \Glpi\Inventory\Inventory($data);
        $CFG_GLPI["is_contact_autoupdate"] = 1; //reset to default

        if ($inventory->inError()) {
            foreach ($inventory->getErrors() as $error) {
                var_dump($error);
            }
        }
        $this->boolean($inventory->inError())->isFalse();
        $this->array($inventory->getErrors())->isIdenticalTo([]);

        $links = getAllDataFromTable('glpi_networkports_networkports');
        $this->integer(count($links))->isIdenticalTo(1, 'May have 1 connection between 2 network ports');
        $link = current($links);
        $this->integer($link['networkports_id_2'])->isIdenticalTo($unmanaged_networkports_id, 'Must be linked to Unmanaged device port');

        $a_networkports = getAllDataFromTable('glpi_networkports');
        $this->integer(count($a_networkports))->isIdenticalTo(2, 'May have 2 network ports (' . print_r($a_networkports, true) . ')');
    }

    /**
     * Test connection with no existing device
     */
    public function testNortelNodevice()
    {
        //Nortel switch
        $xml_source = '<?xml version="1.0" encoding="UTF-8" ?>
<REQUEST>
  <CONTENT>
    <DEVICE>
      <INFO>
        <MAC>8c:60:4f:8d:ae:fc</MAC>
        <NAME>nortel</NAME>
        <SERIAL>notrel3456</SERIAL>
        <TYPE>NETWORKING</TYPE>
      </INFO>
      <PORTS>
        <PORT>
          <CONNECTIONS>
            <CDP>1</CDP>
            <CONNECTION>
              <IFNUMBER>22</IFNUMBER>
              <SYSMAC>00:24:b5:bd:c8:01</SYSMAC>
            </CONNECTION>
          </CONNECTIONS>
          <IFDESCR>mgmt0</IFDESCR>
          <IFNAME>mgmt0</IFNAME>
          <IFNUMBER>22</IFNUMBER>
          <IFTYPE>6</IFTYPE>
          <MAC>8c:60:4f:8d:ae:a1</MAC>
        </PORT>
      </PORTS>
    </DEVICE>
    <MODULEVERSION>4.1</MODULEVERSION>
    <PROCESSNUMBER>1</PROCESSNUMBER>
  </CONTENT>
  <DEVICEID>foo</DEVICEID>
  <QUERY>SNMPQUERY</QUERY>
</REQUEST>';

        // Import the switch into GLPI
        $converter = new \Glpi\Inventory\Converter();
        $data = json_decode($converter->convert($xml_source));
        $CFG_GLPI["is_contact_autoupdate"] = 0;
        $inventory = new \Glpi\Inventory\Inventory($data);
        $CFG_GLPI["is_contact_autoupdate"] = 1; //reset to default

        if ($inventory->inError()) {
            foreach ($inventory->getErrors() as $error) {
                var_dump($error);
            }
        }
        $this->boolean($inventory->inError())->isFalse();
        $this->array($inventory->getErrors())->isIdenticalTo([]);

        $links = getAllDataFromTable('glpi_networkports_networkports');
        $this->integer(count($links))->isIdenticalTo(1, 'May have 1 connection between 2 network ports');
        $link = current($links);
        $netport = new \NetworkPort();
        $this->boolean($netport->getFromDBByCrit(['mac' => '00:24:b5:bd:c8:01']))->isTrue();
        $this->integer($link['networkports_id_2'])->isIdenticalTo($netport->fields['id'], 'Must be linked to new Unmanaged device port');

        $a_networkports = getAllDataFromTable('glpi_networkports');
        $this->integer(count($a_networkports))->isIdenticalTo(2, 'May have 2 network ports (' . print_r($a_networkports, true) . ')');

        $unmanageds = getAllDataFromTable(\Unmanaged::getTable());
        $this->integer(count($unmanageds))->isIdenticalTo(1, 'May have 1 new unmanaged device');
    }

    /**
     * @test
     */
    public function testCisco1Switch()
    {
        //Cisco switch
        $xml_source = '<?xml version="1.0" encoding="UTF-8" ?>
<REQUEST>
  <CONTENT>
    <DEVICE>
      <INFO>
        <MAC>00:24:b5:bd:c8:01</MAC>
        <NAME>cisco1</NAME>
        <SERIAL>cisco1</SERIAL>
        <TYPE>NETWORKING</TYPE>
      </INFO>
      <PORTS>
        <PORT>
          <CONNECTIONS>
            <CDP>1</CDP>
            <CONNECTION>
              <IFDESCR>GigabitEthernet0/10</IFDESCR>
              <IP>192.168.200.124</IP>
            </CONNECTION>
          </CONNECTIONS>
          <IFDESCR>mgmt0</IFDESCR>
          <IFNAME>mgmt0</IFNAME>
          <IFNUMBER>22</IFNUMBER>
          <IFTYPE>6</IFTYPE>
          <MAC>00:24:b5:bd:c8:02</MAC>
        </PORT>
      </PORTS>
    </DEVICE>
    <MODULEVERSION>4.1</MODULEVERSION>
    <PROCESSNUMBER>1</PROCESSNUMBER>
  </CONTENT>
  <DEVICEID>foo</DEVICEID>
  <QUERY>SNMPQUERY</QUERY>
</REQUEST>';

        $networkEquipment       = new \NetworkEquipment();
        $networkport            = new \NetworkPort();
        $networkName            = new \NetworkName();
        $iPAddress              = new \IPAddress();

        // Another switch
        $networkequipments_other_id = $networkEquipment->add([
            'name'        => 'otherswitch',
            'entities_id' => 0
        ]);
        $this->integer($networkequipments_other_id)->isGreaterThan(0);

        // Management port
        $managementports_id = $networkport->add([
            'itemtype'          => 'NetworkEquipment',
            'instantiation_type' => 'NetworkPortAggregate',
            'items_id'          => $networkequipments_other_id,
            'entities_id'       => 0
        ]);
        $this->integer($managementports_id)->isGreaterThan(0);

        $networknames_id = $networkName->add([
            'entities_id' => 0,
            'itemtype'    => 'NetworkPort',
            'items_id'    => $managementports_id
        ]);
        $this->integer($networknames_id)->isGreaterThan(0);

        $ipaddress_id = $iPAddress->add([
            'entities_id' => 0,
            'itemtype' => 'NetworkName',
            'items_id' => $networknames_id,
            'name' => '192.168.200.124'
        ]);
        $this->integer($ipaddress_id)->isGreaterThan(0);

        // Port GigabitEthernet0/10
        $networkports_other_id = $networkport->add([
            'itemtype'       => 'NetworkEquipment',
            'items_id'       => $networkequipments_other_id,
            'entities_id'    => 0,
            'mac'            => '00:24:b5:bd:c8:01',
            'logical_number' => 22,
            'ifdescr' => 'GigabitEthernet0/10'
        ]);
        $this->integer($networkports_other_id)->isGreaterThan(0);

        // Import the switch into GLPI
        $converter = new \Glpi\Inventory\Converter();
        $data = json_decode($converter->convert($xml_source));
        $CFG_GLPI["is_contact_autoupdate"] = 0;
        $inventory = new \Glpi\Inventory\Inventory($data);
        $CFG_GLPI["is_contact_autoupdate"] = 1; //reset to default

        if ($inventory->inError()) {
            foreach ($inventory->getErrors() as $error) {
                var_dump($error);
            }
        }
        $this->boolean($inventory->inError())->isFalse();
        $this->array($inventory->getErrors())->isIdenticalTo([]);

        $a_portslinks = getAllDataFromTable('glpi_networkports_networkports');
        $this->integer(count($a_portslinks))->isIdenticalTo(1, sprintf('May have 1 connection between 2 network ports, %s found', count($a_portslinks)));

        $a_networkports = getAllDataFromTable('glpi_networkports');
        $this->integer(count($a_networkports))->isIdenticalTo(3, 'May have 3 network ports (' . print_r($a_networkports, true) . ')');

        $portLink = current($a_portslinks);
        $this->integer($portLink['networkports_id_2'])->isIdenticalTo($networkports_other_id);
    }

    /**
     * It find unknown device, but may add the port with this ifdescr
     *
     * FIXME: does not work :'(
     */
    public function testCisco1Unmanaged()
    {
        //Cisco switch
        $xml_source = '<?xml version="1.0" encoding="UTF-8" ?>
<REQUEST>
  <CONTENT>
    <DEVICE>
      <INFO>
        <MAC>00:24:b5:bd:c8:01</MAC>
        <NAME>cisco1</NAME>
        <SERIAL>cisco1</SERIAL>
        <TYPE>NETWORKING</TYPE>
      </INFO>
      <PORTS>
        <PORT>
          <CONNECTIONS>
            <CDP>1</CDP>
            <CONNECTION>
              <IFDESCR>GigabitEthernet0/10</IFDESCR>
              <IP>192.168.200.124</IP>
            </CONNECTION>
          </CONNECTIONS>
          <IFDESCR>mgmt0</IFDESCR>
          <IFNAME>mgmt0</IFNAME>
          <IFNUMBER>22</IFNUMBER>
          <IFTYPE>6</IFTYPE>
          <MAC>00:24:b5:bd:c8:02</MAC>
        </PORT>
      </PORTS>
    </DEVICE>
    <MODULEVERSION>4.1</MODULEVERSION>
    <PROCESSNUMBER>1</PROCESSNUMBER>
  </CONTENT>
  <DEVICEID>foo</DEVICEID>
  <QUERY>SNMPQUERY</QUERY>
</REQUEST>';

        $networkport            = new \NetworkPort();
        $networkName            = new \NetworkName();
        $iPAddress              = new \IPAddress();
        $unmanaged              = new \Unmanaged();

        // Unmanaged
        $unmanageds_id = $unmanaged->add([
            'name'        => 'otherswitch',
            'entities_id' => 0
        ]);
        $this->integer($unmanageds_id)->isGreaterThan(0);

        $networkports_unknown_id = $networkport->add([
            'itemtype'       => 'Unmanaged',
            'items_id'       => $unmanageds_id,
            'entities_id'    => 0
        ]);
        $this->integer($networkports_unknown_id)->isGreaterThan(0);

        $networknames_id = $networkName->add([
            'entities_id' => 0,
            'itemtype'    => 'NetworkPort',
            'items_id'    => $networkports_unknown_id
        ]);
        $this->integer($networknames_id)->isGreaterThan(0);

        $ipaddress_id = $iPAddress->add([
            'entities_id' => 0,
            'itemtype' => 'NetworkName',
            'items_id' => $networknames_id,
            'name' => '192.168.200.124'
        ]);
        $this->integer($ipaddress_id)->isGreaterThan(0);

        // Import the switch into GLPI
        $converter = new \Glpi\Inventory\Converter();
        $data = json_decode($converter->convert($xml_source));
        $CFG_GLPI["is_contact_autoupdate"] = 0;
        $inventory = new \Glpi\Inventory\Inventory($data);
        $CFG_GLPI["is_contact_autoupdate"] = 1; //reset to default

        if ($inventory->inError()) {
            foreach ($inventory->getErrors() as $error) {
                var_dump($error);
            }
        }
        $this->boolean($inventory->inError())->isFalse();
        $this->array($inventory->getErrors())->isIdenticalTo([]);

        $a_portslinks = getAllDataFromTable('glpi_networkports_networkports');
        $this->integer(count($a_portslinks))->isIdenticalTo(1, 'May have 1 connection between 2 network ports');

        $a_networkports = getAllDataFromTable('glpi_networkports');
        $this->integer(count($a_networkports))->isIdenticalTo(3, 'May have 3 network ports (' . print_r($a_networkports, true) . ')');

        //FIXME: does not work :'(
        //$a_unknowns = getAllDataFromTable('glpi_unmanageds');
        //$this->integer(count($a_unknowns))->isIdenticalTo(1, 'May have only one unknown device (' . print_r($a_unknowns, true) . ')');

        $a_networkport_ref = [
            'items_id'           => $unmanageds_id,
            'itemtype'           => 'Unmanaged',
            'entities_id'        => 0,
            'is_recursive'       => 0,
            'logical_number'     => 0,
            'name'               => 'GigabitEthernet0/10',
            'instantiation_type' => 'NetworkPortEthernet',
            'mac'                => null,
            'comment'            => null,
            'is_deleted'         => 0,
            'is_dynamic'         => 0,
            'ifmtu' => 0,
            'ifspeed' => 0,
            'ifinternalstatus' => null,
            'ifconnectionstatus' => 0,
            'iflastchange' => null,
            'ifinbytes' => 0,
            'ifinerrors' => 0,
            'ifoutbytes' => 0,
            'ifouterrors' => 0,
            'ifstatus' => null,
            'ifdescr' => null,
            'ifalias' => null,
            'portduplex' => null,
            'trunk' => 0,
            'lastup' => null
        ];
        $networkport = new \NetworkPort();
        $this->boolean($networkport->getFromDBByCrit(['name' => 'GigabitEthernet0/10']))->isTrue();
        unset(
            $networkport->fields['id'],
            $networkport->fields['date_mod'],
            $networkport->fields['date_creation']
        );

        //FIXME: does not work :'(
        /*$this->array($networkport->fields)->isEqualTo($a_networkport_ref, 'New unknown port created');

        $portLink = current($a_portslinks);
        $this->integer($a_portslinks['networkports_id_2'])->isIdenticalTo($networkports_unknown_id);*/
    }

    public function testCisco1Nodevice()
    {
        //Cisco switch
        $xml_source = '<?xml version="1.0" encoding="UTF-8" ?>
<REQUEST>
  <CONTENT>
    <DEVICE>
      <INFO>
        <MAC>00:24:b5:bd:c8:01</MAC>
        <NAME>cisco1</NAME>
        <SERIAL>cisco1</SERIAL>
        <TYPE>NETWORKING</TYPE>
      </INFO>
      <PORTS>
        <PORT>
          <CONNECTIONS>
            <CDP>1</CDP>
            <CONNECTION>
              <IFDESCR>GigabitEthernet0/10</IFDESCR>
              <IP>192.168.200.124</IP>
            </CONNECTION>
          </CONNECTIONS>
          <IFDESCR>mgmt0</IFDESCR>
          <IFNAME>mgmt0</IFNAME>
          <IFNUMBER>22</IFNUMBER>
          <IFTYPE>6</IFTYPE>
          <MAC>00:24:b5:bd:c8:02</MAC>
        </PORT>
      </PORTS>
    </DEVICE>
    <MODULEVERSION>4.1</MODULEVERSION>
    <PROCESSNUMBER>1</PROCESSNUMBER>
  </CONTENT>
  <DEVICEID>foo</DEVICEID>
  <QUERY>SNMPQUERY</QUERY>
</REQUEST>';

        // Import the switch into GLPI
        $converter = new \Glpi\Inventory\Converter();
        $data = json_decode($converter->convert($xml_source));
        $CFG_GLPI["is_contact_autoupdate"] = 0;
        $inventory = new \Glpi\Inventory\Inventory($data);
        $CFG_GLPI["is_contact_autoupdate"] = 1; //reset to default

        if ($inventory->inError()) {
            foreach ($inventory->getErrors() as $error) {
                var_dump($error);
            }
        }
        $this->boolean($inventory->inError())->isFalse();
        $this->array($inventory->getErrors())->isIdenticalTo([]);

        $a_portslinks = getAllDataFromTable('glpi_networkports_networkports');
        $this->integer(count($a_portslinks))->isIdenticalTo(1, 'May have 1 connection between 2 network ports');

        $a_networkports = getAllDataFromTable('glpi_networkports');
        $this->integer(count($a_networkports))->isIdenticalTo(2, 'May have 2 network ports (' . print_r($a_networkports, true) . ')');

        $networkPort = new \NetworkPort();
        $networkPort->getFromDBByCrit(['name' => 'GigabitEthernet0/10']);

        $portLink = current($a_portslinks);
        $this->integer($portLink['networkports_id_2'])->isIdenticalTo($networkPort->fields['id']);
    }

    /**
     * //FIXME: does not work :'(
     */
    public function testCisco2Switch()
    {
        //Cisco switch
        $xml_source = '<?xml version="1.0" encoding="UTF-8" ?>
<REQUEST>
  <CONTENT>
    <DEVICE>
      <INFO>
        <MAC>00:24:b5:bd:c8:01</MAC>
        <NAME>cisco2</NAME>
        <SERIAL>cisco2</SERIAL>
        <TYPE>NETWORKING</TYPE>
      </INFO>
      <PORTS>
        <PORT>
          <CONNECTIONS>
            <CDP>1</CDP>
            <CONNECTION>
              <IFDESCR>ge-0/0/1.0</IFDESCR>
              <IFNUMBER>504</IFNUMBER>
              <SYSDESCR>Juniper Networks, Inc. ex2200-24t-4g , version 10.1R1.8 Build date: 2010-02-12 16:59:31 UTC </SYSDESCR>
              <SYSMAC>2c:6b:f5:98:f9:70</SYSMAC>
              <SYSNAME>juniperswitch3</SYSNAME>
            </CONNECTION>
          </CONNECTIONS>
          <IFDESCR>mgmt0</IFDESCR>
          <IFNAME>mgmt0</IFNAME>
          <IFNUMBER>22</IFNUMBER>
          <IFTYPE>6</IFTYPE>
          <MAC>00:24:b5:bd:c8:02</MAC>
        </PORT>
      </PORTS>
    </DEVICE>
    <MODULEVERSION>4.1</MODULEVERSION>
    <PROCESSNUMBER>1</PROCESSNUMBER>
  </CONTENT>
  <DEVICEID>foo</DEVICEID>
  <QUERY>SNMPQUERY</QUERY>
</REQUEST>';

        $networkEquipment = new \NetworkEquipment();
        $networkport = new \NetworkPort();

        // Another switch
        $networkequipments_other_id = $networkEquipment->add([
            'name'        => 'juniperswitch3',
            'entities_id' => 0
        ]);
        $this->integer($networkequipments_other_id)->isGreaterThan(0);

        // Port ge-0/0/1.0
        $networkports_other_id = $networkport->add([
            'itemtype'       => 'NetworkEquipment',
            'items_id'       => $networkequipments_other_id,
            'entities_id'    => 0,
            'mac'            => '2c:6b:f5:98:f9:70',
            'logical_number' => 504,
            'ifdescr' => 'ge-0/0/1.0'
        ]);
        $this->integer($networkports_other_id)->isGreaterThan(0);

        // Import the switch into GLPI
        $converter = new \Glpi\Inventory\Converter();
        $data = json_decode($converter->convert($xml_source));
        $CFG_GLPI["is_contact_autoupdate"] = 0;
        $inventory = new \Glpi\Inventory\Inventory($data);
        $CFG_GLPI["is_contact_autoupdate"] = 1; //reset to default

        if ($inventory->inError()) {
            foreach ($inventory->getErrors() as $error) {
                var_dump($error);
            }
        }
        $this->boolean($inventory->inError())->isFalse();
        $this->array($inventory->getErrors())->isIdenticalTo([]);

        $a_portslinks = getAllDataFromTable('glpi_networkports_networkports');
        $this->integer(count($a_portslinks))->isIdenticalTo(1, 'May have 1 connection between 2 network ports');

        $a_networkports = getAllDataFromTable('glpi_networkports');
        $this->integer(count($a_networkports))->isIdenticalTo(2, 'May have 2 network ports (' . print_r($a_networkports, true) . ')');

        //FIXME: does not work :'(
        /*$portLink = current($a_portslinks);
        $this->integer($portLink['networkports_id_2'])->isIdenticalTo($networkequipments_other_id);*/
    }

    public function testSwitchLldpImport()
    {
        $xml_source = '<?xml version="1.0" encoding="UTF-8" ?>
<REQUEST>
  <CONTENT>
    <DEVICE>
      <INFO>
        <TYPE>NETWORKING</TYPE>
        <MANUFACTURER>Hewlett-Packard</MANUFACTURER>
        <MODEL>J9085A</MODEL>
        <DESCRIPTION>ProCurve J9085A</DESCRIPTION>
        <NAME>FR-SW01</NAME>
        <LOCATION>BAT A - Niv 3</LOCATION>
        <CONTACT>Admin</CONTACT>
        <SERIAL>CN536H7J</SERIAL>
        <FIRMWARE>R.10.06 R.11.60</FIRMWARE>
        <UPTIME>8 days, 01:48:57.95</UPTIME>
        <MAC>b4:39:d6:3a:7f:00</MAC>
        <ID>0</ID>
        <IPS>
          <IP>192.168.1.56</IP>
          <IP>192.168.10.56</IP>
        </IPS>
      </INFO>
      <PORTS>
        <PORT>
          <CONNECTIONS>
            <CDP>1</CDP>
            <CONNECTION>
              <IFDESCR>ge-0/0/1.0</IFDESCR>
              <IFNUMBER>504</IFNUMBER>
              <SYSDESCR>Juniper Networks, Inc. ex2200-24t-4g , version 10.1R1.8 Build date: 2010-02-12 16:59:31 UTC </SYSDESCR>
              <SYSMAC>2c:6b:f5:98:f9:70</SYSMAC>
              <SYSNAME>juniperswitch3</SYSNAME>
            </CONNECTION>
          </CONNECTIONS>
          <IFDESCR>3</IFDESCR>
          <IFNAME>3</IFNAME>
          <IFNUMBER>3</IFNUMBER>
          <IFSPEED>1000000000</IFSPEED>
          <IFSTATUS>1</IFSTATUS>
          <IFINTERNALSTATUS>1</IFINTERNALSTATUS>
          <IFPORTDUPLEX>2</IFPORTDUPLEX>
          <IFTYPE>6</IFTYPE>
          <MAC>b4:39:d6:3b:22:bd</MAC>
          <VLANS>
            <VLAN>
              <NAME>VLAN160</NAME>
              <NUMBER>160</NUMBER>
            </VLAN>
          </VLANS>
        </PORT>
      </PORTS>
    </DEVICE>
    <MODULEVERSION>3.0</MODULEVERSION>
    <PROCESSNUMBER>1</PROCESSNUMBER>
  </CONTENT>
  <DEVICEID>foo</DEVICEID>
  <QUERY>SNMPQUERY</QUERY>
</REQUEST>';

        $networkEquipment        = new \NetworkEquipment();
        $networkPort             = new \NetworkPort();
        $networkPort_NetworkPort = new \NetworkPort_NetworkPort();

        $networkEquipments_id = $networkEquipment->add([
            'entities_id' => 0,
            'name'        => 'juniperswitch3',
        ]);
        $this->integer($networkEquipments_id)->isGreaterThan(0);

        // Add management port
        // 2c:6b:f5:98:f9:70
        $mngtports_id = $networkPort->add([
            'mac'                => '2c:6b:f5:98:f9:70',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'instantiation_type' => 'NetworkPortAggregate',
            'name'               => 'general',
        ]);
        $this->integer($mngtports_id)->isGreaterThan(0);

        $ports_id = $networkPort->add([
            'mac'                => '2c:6b:f5:98:f9:71',
            'name'               => 'ge-0/0/1.0',
            'logical_number'     => '504',
            'instantiation_type' => 'NetworkPortEthernet',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'ifdescr'         => 'ge-0/0/1.0',
        ]);
        $this->integer($ports_id)->isGreaterThan(0);

        // Import the switch into GLPI
        $converter = new \Glpi\Inventory\Converter();
        $data = json_decode($converter->convert($xml_source));
        $CFG_GLPI["is_contact_autoupdate"] = 0;
        $inventory = new \Glpi\Inventory\Inventory($data);
        $CFG_GLPI["is_contact_autoupdate"] = 1; //reset to default

        if ($inventory->inError()) {
            foreach ($inventory->getErrors() as $error) {
                var_dump($error);
            }
        }
        $this->boolean($inventory->inError())->isFalse();
        $this->array($inventory->getErrors())->isIdenticalTo([]);

        // check port
        $this->boolean($networkPort->getFromDBByCrit(['mac' => 'b4:39:d6:3b:22:bd']))->isTrue();
        $this->boolean($networkPort_NetworkPort->getFromDBForNetworkPort($networkPort->fields['id']))->isTrue();
    }

    /**
     * case 1 : IP on management port of the switch
     */
    public function testSwitchLLDPImport_ifdescr_ip_case1()
    {
        $xml_source = '<?xml version="1.0" encoding="UTF-8" ?>
<REQUEST>
  <CONTENT>
    <DEVICE>
      <INFO>
        <TYPE>NETWORKING</TYPE>
        <MANUFACTURER>Hewlett-Packard</MANUFACTURER>
        <MODEL>J9085A</MODEL>
        <DESCRIPTION>ProCurve J9085A</DESCRIPTION>
        <NAME>FR-SW01</NAME>
        <LOCATION>BAT A - Niv 3</LOCATION>
        <CONTACT>Admin</CONTACT>
        <SERIAL>CN536H7J</SERIAL>
        <FIRMWARE>R.10.06 R.11.60</FIRMWARE>
        <UPTIME>8 days, 01:48:57.95</UPTIME>
        <MAC>b4:39:d6:3a:7f:00</MAC>
        <ID>0</ID>
        <IPS>
          <IP>192.168.1.56</IP>
          <IP>192.168.10.56</IP>
        </IPS>
      </INFO>
      <PORTS>
        <PORT>
          <CONNECTIONS>
            <CDP>1</CDP>
            <CONNECTION>
              <IFDESCR>28</IFDESCR>
              <IP>10.226.164.55</IP>
            </CONNECTION>
          </CONNECTIONS>
          <IFDESCR>3</IFDESCR>
          <IFNAME>3</IFNAME>
          <IFNUMBER>3</IFNUMBER>
          <IFSPEED>1000000000</IFSPEED>
          <IFSTATUS>1</IFSTATUS>
          <IFINTERNALSTATUS>1</IFINTERNALSTATUS>
          <IFPORTDUPLEX>2</IFPORTDUPLEX>
          <IFTYPE>6</IFTYPE>
          <MAC>b4:39:d6:3b:22:bd</MAC>
          <VLANS>
            <VLAN>
              <NAME>VLAN160</NAME>
              <NUMBER>160</NUMBER>
            </VLAN>
          </VLANS>
        </PORT>
      </PORTS>
    </DEVICE>
    <MODULEVERSION>3.0</MODULEVERSION>
    <PROCESSNUMBER>1</PROCESSNUMBER>
  </CONTENT>
  <DEVICEID>foo</DEVICEID>
  <QUERY>SNMPQUERY</QUERY>
</REQUEST>';

        $networkEquipment        = new \NetworkEquipment();
        $networkPort             = new \NetworkPort();
        $networkPort_NetworkPort = new \NetworkPort_NetworkPort();

        $networkEquipments_id = $networkEquipment->add([
            'entities_id' => 0,
            'name'        => 'sw10',
        ]);
        $this->integer($networkEquipments_id)->isGreaterThan(0);

        // Add management port
        $mngtports_id = $networkPort->add([
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'instantiation_type' => 'NetworkPortAggregate',
            'name'               => 'general',
            '_create_children'   => 1,
            'NetworkName_name'   => '',
            'NetworkName_fqdns_id' => 0,
            'NetworkName__ipaddresses' => [
                '-1' => '10.226.164.55'
            ],

        ]);
        $this->integer($mngtports_id)->isGreaterThan(0);

        // Add a port that will not be used, but needed for the test
        $ports_id = $networkPort->add([
            'mac'                => '00:6b:03:98:f9:70',
            'name'               => 'port27',
            'logical_number'     => '28',
            'instantiation_type' => 'NetworkPortEthernet',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'ifdescr'         => '27',
        ]);
        $this->integer($ports_id)->isGreaterThan(0);

        // Add the second port right
        $ports_id = $networkPort->add([
            'mac'                => '00:6b:03:98:f9:71',
            'name'               => 'port28',
            'logical_number'     => '30',
            'instantiation_type' => 'NetworkPortEthernet',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'ifdescr'         => '28',
        ]);
        $this->integer($ports_id)->isGreaterThan(0);

        // Add another port that will not be used, but needed for the test
        $ports_id = $networkPort->add([
            'mac'                => '00:6b:03:98:f9:72',
            'name'               => 'port29',
            'logical_number'     => '29',
            'instantiation_type' => 'NetworkPortEthernet',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'ifdescr'         => '29',
        ]);
        $this->integer($ports_id)->isGreaterThan(0);

        // Import the switch into GLPI
        $converter = new \Glpi\Inventory\Converter();
        $data = json_decode($converter->convert($xml_source));
        $CFG_GLPI["is_contact_autoupdate"] = 0;
        $inventory = new \Glpi\Inventory\Inventory($data);
        $CFG_GLPI["is_contact_autoupdate"] = 1; //reset to default

        if ($inventory->inError()) {
            foreach ($inventory->getErrors() as $error) {
                var_dump($error);
            }
        }
        $this->boolean($inventory->inError())->isFalse();
        $this->array($inventory->getErrors())->isIdenticalTo([]);

        // check port
        $this->boolean($networkPort->getFromDBByCrit(['name' => 'port28']));
        $this->boolean($networkPort_NetworkPort->getFromDBForNetworkPort($networkPort->fields['id']))->isTrue();
    }

    /**
     * case 2 : IP on the port of the switch
     */
    public function testSwitchLLDPImport_ifdescr_ip_case2()
    {
        $xml_source = '<?xml version="1.0" encoding="UTF-8" ?>
<REQUEST>
  <CONTENT>
    <DEVICE>
      <INFO>
        <TYPE>NETWORKING</TYPE>
        <MANUFACTURER>Hewlett-Packard</MANUFACTURER>
        <MODEL>J9085A</MODEL>
        <DESCRIPTION>ProCurve J9085A</DESCRIPTION>
        <NAME>FR-SW01</NAME>
        <LOCATION>BAT A - Niv 3</LOCATION>
        <CONTACT>Admin</CONTACT>
        <SERIAL>CN536H7J</SERIAL>
        <FIRMWARE>R.10.06 R.11.60</FIRMWARE>
        <UPTIME>8 days, 01:48:57.95</UPTIME>
        <MAC>b4:39:d6:3a:7f:00</MAC>
        <ID>0</ID>
        <IPS>
          <IP>192.168.1.56</IP>
          <IP>192.168.10.56</IP>
        </IPS>
      </INFO>
      <PORTS>
        <PORT>
          <CONNECTIONS>
            <CDP>1</CDP>
            <CONNECTION>
              <IFDESCR>28</IFDESCR>
              <IP>10.226.164.55</IP>
            </CONNECTION>
          </CONNECTIONS>
          <IFDESCR>3</IFDESCR>
          <IFNAME>3</IFNAME>
          <IFNUMBER>3</IFNUMBER>
          <IFSPEED>1000000000</IFSPEED>
          <IFSTATUS>1</IFSTATUS>
          <IFINTERNALSTATUS>1</IFINTERNALSTATUS>
          <IFPORTDUPLEX>2</IFPORTDUPLEX>
          <IFTYPE>6</IFTYPE>
          <MAC>b4:39:d6:3b:22:bd</MAC>
          <VLANS>
            <VLAN>
              <NAME>VLAN160</NAME>
              <NUMBER>160</NUMBER>
            </VLAN>
          </VLANS>
        </PORT>
      </PORTS>
    </DEVICE>
    <MODULEVERSION>3.0</MODULEVERSION>
    <PROCESSNUMBER>1</PROCESSNUMBER>
  </CONTENT>
  <DEVICEID>foo</DEVICEID>
  <QUERY>SNMPQUERY</QUERY>
</REQUEST>';

        $networkEquipment        = new \NetworkEquipment();
        $networkPort             = new \NetworkPort();
        $networkPort_NetworkPort = new \NetworkPort_NetworkPort();

        $networkEquipments_id = $networkEquipment->add([
            'entities_id' => 0,
            'name'        => 'sw10',
        ]);
        $this->integer($networkEquipments_id)->isGreaterThan(0);

        // Add a port that will not be used, but needed for the test
        $ports_id = $networkPort->add([
            'mac'                => '00:6b:03:98:f9:70',
            'name'               => 'port27',
            'logical_number'     => '28',
            'instantiation_type' => 'NetworkPortEthernet',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            '_create_children'   => 1,
            'NetworkName_name'   => '',
            'NetworkName_fqdns_id' => 0,
            'NetworkName__ipaddresses' => [
                '-1' => '10.226.164.55'
            ],
            'ifdescr'         => '27',
        ]);
        $this->integer($ports_id)->isGreaterThan(0);

        // Add the second port right
        $ports_id = $networkPort->add([
            'mac'                => '00:6b:03:98:f9:71',
            'name'               => 'port28',
            'logical_number'     => '30',
            'instantiation_type' => 'NetworkPortEthernet',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            '_create_children'   => 1,
            'NetworkName_name'   => '',
            'NetworkName_fqdns_id' => 0,
            'NetworkName__ipaddresses' => [
                '-1' => '10.226.164.55'
            ],
            'ifdescr'         => '28',
        ]);
        $this->integer($ports_id)->isGreaterThan(0);

        // Add another port that will not be used, but needed for the test
        $ports_id = $networkPort->add([
            'mac'                => '00:6b:03:98:f9:72',
            'name'               => 'port29',
            'logical_number'     => '31',
            'instantiation_type' => 'NetworkPortEthernet',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            '_create_children'   => 1,
            'NetworkName_name'   => '',
            'NetworkName_fqdns_id' => 0,
            'NetworkName__ipaddresses' => [
                '-1' => '10.226.164.55'
            ],
            'ifdescr'         => '29',
        ]);
        $this->integer($ports_id)->isGreaterThan(0);

        // Import the switch into GLPI
        $converter = new \Glpi\Inventory\Converter();
        $data = json_decode($converter->convert($xml_source));
        $CFG_GLPI["is_contact_autoupdate"] = 0;
        $inventory = new \Glpi\Inventory\Inventory($data);
        $CFG_GLPI["is_contact_autoupdate"] = 1; //reset to default

        if ($inventory->inError()) {
            foreach ($inventory->getErrors() as $error) {
                var_dump($error);
            }
        }
        $this->boolean($inventory->inError())->isFalse();
        $this->array($inventory->getErrors())->isIdenticalTo([]);

        // check port
        $this->boolean($networkPort->getFromDBByCrit(['name' => 'port28']));
        $this->boolean($networkPort_NetworkPort->getFromDBForNetworkPort($networkPort->fields['id']))->isTrue();
    }

    /**
     * case 1 : mac on management port
     */
    public function testSwitchLLDPImport_ifnumber_mac_case1()
    {
        $xml_source = '<?xml version="1.0" encoding="UTF-8" ?>
<REQUEST>
  <CONTENT>
    <DEVICE>
      <INFO>
        <TYPE>NETWORKING</TYPE>
        <MANUFACTURER>Hewlett-Packard</MANUFACTURER>
        <MODEL>J9085A</MODEL>
        <DESCRIPTION>ProCurve J9085A</DESCRIPTION>
        <NAME>FR-SW01</NAME>
        <LOCATION>BAT A - Niv 3</LOCATION>
        <CONTACT>Admin</CONTACT>
        <SERIAL>CN536H7J</SERIAL>
        <FIRMWARE>R.10.06 R.11.60</FIRMWARE>
        <UPTIME>8 days, 01:48:57.95</UPTIME>
        <MAC>b4:39:d6:3a:7f:00</MAC>
        <ID>0</ID>
        <IPS>
          <IP>192.168.1.56</IP>
          <IP>192.168.10.56</IP>
        </IPS>
      </INFO>
      <PORTS>
        <PORT>
          <CONNECTIONS>
            <CDP>1</CDP>
            <CONNECTION>
              <IFNUMBER>21</IFNUMBER>
              <SYSMAC>00:24:b5:bd:c8:01</SYSMAC>
            </CONNECTION>
          </CONNECTIONS>
          <IFDESCR>3</IFDESCR>
          <IFNAME>3</IFNAME>
          <IFNUMBER>3</IFNUMBER>
          <IFSPEED>1000000000</IFSPEED>
          <IFSTATUS>1</IFSTATUS>
          <IFINTERNALSTATUS>1</IFINTERNALSTATUS>
          <IFPORTDUPLEX>2</IFPORTDUPLEX>
          <IFTYPE>6</IFTYPE>
          <MAC>b4:39:d6:3b:22:bd</MAC>
          <VLANS>
            <VLAN>
              <NAME>VLAN160</NAME>
              <NUMBER>160</NUMBER>
            </VLAN>
          </VLANS>
        </PORT>
      </PORTS>
    </DEVICE>
    <MODULEVERSION>3.0</MODULEVERSION>
    <PROCESSNUMBER>1</PROCESSNUMBER>
  </CONTENT>
  <DEVICEID>foo</DEVICEID>
  <QUERY>SNMPQUERY</QUERY>
</REQUEST>';

        $networkEquipment        = new \NetworkEquipment();
        $networkPort             = new \NetworkPort();
        $networkPort_NetworkPort = new \NetworkPort_NetworkPort();

        $networkEquipments_id = $networkEquipment->add([
            'entities_id' => 0,
            'name'        => 'sw10',
        ]);
        $this->integer($networkEquipments_id)->isGreaterThan(0);

        // Add management port
        $mngtports_id = $networkPort->add([
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'instantiation_type' => 'NetworkPortAggregate',
            'name'               => 'general',
            'mac'                => '00:24:b5:bd:c8:01',
        ]);
        $this->integer($mngtports_id)->isGreaterThan(0);

        // Add a port that will not be used, but needed for the test
        $ports_id = $networkPort->add([
            'name'               => 'port20',
            'logical_number'     => '20',
            'instantiation_type' => 'NetworkPortEthernet',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'ifdescr'         => '20',
        ]);
        $this->integer($ports_id)->isGreaterThan(0);

        // Add the second port right
        $ports_id = $networkPort->add([
            'name'               => 'port21',
            'logical_number'     => '21',
            'instantiation_type' => 'NetworkPortEthernet',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'ifdescr'         => '21',
        ]);
        $this->integer($ports_id)->isGreaterThan(0);

        // Add another port that will not be used, but needed for the test
        $ports_id = $networkPort->add([
            'name'               => 'port22',
            'logical_number'     => '22',
            'instantiation_type' => 'NetworkPortEthernet',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'ifdescr'         => '22',
        ]);
        $this->integer($ports_id)->isGreaterThan(0);

        // Import the switch into GLPI
        $converter = new \Glpi\Inventory\Converter();
        $data = json_decode($converter->convert($xml_source));
        $CFG_GLPI["is_contact_autoupdate"] = 0;
        $inventory = new \Glpi\Inventory\Inventory($data);
        $CFG_GLPI["is_contact_autoupdate"] = 1; //reset to default

        if ($inventory->inError()) {
            foreach ($inventory->getErrors() as $error) {
                var_dump($error);
            }
        }

        $this->boolean($inventory->inError())->isFalse();
        $this->array($inventory->getErrors())->isIdenticalTo([]);

        // check port
        $this->boolean($networkPort->getFromDBByCrit(['name' => 'port21']));
        $this->boolean($networkPort_NetworkPort->getFromDBForNetworkPort($networkPort->fields['id']))->isTrue();
    }

    /**
     * case 2 : mac on the right port
     */
    public function testSwitchLLDPImport_ifnumber_mac_case2()
    {
        $xml_source = '<?xml version="1.0" encoding="UTF-8" ?>
<REQUEST>
  <CONTENT>
    <DEVICE>
      <INFO>
        <TYPE>NETWORKING</TYPE>
        <MANUFACTURER>Hewlett-Packard</MANUFACTURER>
        <MODEL>J9085A</MODEL>
        <DESCRIPTION>ProCurve J9085A</DESCRIPTION>
        <NAME>FR-SW01</NAME>
        <LOCATION>BAT A - Niv 3</LOCATION>
        <CONTACT>Admin</CONTACT>
        <SERIAL>CN536H7J</SERIAL>
        <FIRMWARE>R.10.06 R.11.60</FIRMWARE>
        <UPTIME>8 days, 01:48:57.95</UPTIME>
        <MAC>b4:39:d6:3a:7f:00</MAC>
        <ID>0</ID>
        <IPS>
          <IP>192.168.1.56</IP>
          <IP>192.168.10.56</IP>
        </IPS>
      </INFO>
      <PORTS>
        <PORT>
          <CONNECTIONS>
            <CDP>1</CDP>
            <CONNECTION>
              <IFNUMBER>21</IFNUMBER>
              <SYSMAC>00:24:b5:bd:c8:01</SYSMAC>
            </CONNECTION>
          </CONNECTIONS>
          <IFDESCR>3</IFDESCR>
          <IFNAME>3</IFNAME>
          <IFNUMBER>3</IFNUMBER>
          <IFSPEED>1000000000</IFSPEED>
          <IFSTATUS>1</IFSTATUS>
          <IFINTERNALSTATUS>1</IFINTERNALSTATUS>
          <IFPORTDUPLEX>2</IFPORTDUPLEX>
          <IFTYPE>6</IFTYPE>
          <MAC>b4:39:d6:3b:22:bd</MAC>
          <VLANS>
            <VLAN>
              <NAME>VLAN160</NAME>
              <NUMBER>160</NUMBER>
            </VLAN>
          </VLANS>
        </PORT>
      </PORTS>
    </DEVICE>
    <MODULEVERSION>3.0</MODULEVERSION>
    <PROCESSNUMBER>1</PROCESSNUMBER>
  </CONTENT>
  <DEVICEID>foo</DEVICEID>
  <QUERY>SNMPQUERY</QUERY>
</REQUEST>';

        $networkEquipment        = new \NetworkEquipment();
        $networkPort             = new \NetworkPort();
        $networkPort_NetworkPort = new \NetworkPort_NetworkPort();

        $networkEquipments_id = $networkEquipment->add([
            'entities_id' => 0,
            'name'        => 'sw10',
        ]);
        $this->integer($networkEquipments_id)->isGreaterThan(0);

        // Add a port that will not be used, but needed for the test
        $ports_id = $networkPort->add([
            'mac'                => '00:24:b5:bd:c8:00',
            'name'               => 'port20',
            'logical_number'     => '20',
            'instantiation_type' => 'NetworkPortEthernet',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'ifdescr'         => '20',
        ]);
        $this->integer($ports_id)->isGreaterThan(0);

        // Add the second port right
        $ports_id = $networkPort->add([
            'mac'                => '00:24:b5:bd:c8:01',
            'name'               => 'port21',
            'logical_number'     => '21',
            'instantiation_type' => 'NetworkPortEthernet',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'ifdescr'         => '21',
        ]);
        $this->integer($ports_id)->isGreaterThan(0);

        // Add another port that will not be used, but needed for the test
        $ports_id = $networkPort->add([
            'mac'                => '00:24:b5:bd:c8:02',
            'name'               => 'port22',
            'logical_number'     => '22',
            'instantiation_type' => 'NetworkPortEthernet',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'ifdescr'         => '22',
        ]);
        $this->integer($ports_id)->isGreaterThan(0);

        // Import the switch into GLPI
        $converter = new \Glpi\Inventory\Converter();
        $data = json_decode($converter->convert($xml_source));
        $CFG_GLPI["is_contact_autoupdate"] = 0;
        $inventory = new \Glpi\Inventory\Inventory($data);
        $CFG_GLPI["is_contact_autoupdate"] = 1; //reset to default

        if ($inventory->inError()) {
            foreach ($inventory->getErrors() as $error) {
                var_dump($error);
            }
        }

        $this->boolean($inventory->inError())->isFalse();
        $this->array($inventory->getErrors())->isIdenticalTo([]);

        // check port
        $this->boolean($networkPort->getFromDBByCrit(['name' => 'port21']));
        $this->boolean($networkPort_NetworkPort->getFromDBForNetworkPort($networkPort->fields['id']))->isTrue();
    }

    /**
     * case 3 : same mac on all ports
     */
    public function testSwitchLLDPImport_ifnumber_mac_case3()
    {
        $xml_source = '<?xml version="1.0" encoding="UTF-8" ?>
<REQUEST>
  <CONTENT>
    <DEVICE>
      <INFO>
        <TYPE>NETWORKING</TYPE>
        <MANUFACTURER>Hewlett-Packard</MANUFACTURER>
        <MODEL>J9085A</MODEL>
        <DESCRIPTION>ProCurve J9085A</DESCRIPTION>
        <NAME>FR-SW01</NAME>
        <LOCATION>BAT A - Niv 3</LOCATION>
        <CONTACT>Admin</CONTACT>
        <SERIAL>CN536H7J</SERIAL>
        <FIRMWARE>R.10.06 R.11.60</FIRMWARE>
        <UPTIME>8 days, 01:48:57.95</UPTIME>
        <MAC>b4:39:d6:3a:7f:00</MAC>
        <ID>0</ID>
        <IPS>
          <IP>192.168.1.56</IP>
          <IP>192.168.10.56</IP>
        </IPS>
      </INFO>
      <PORTS>
        <PORT>
          <CONNECTIONS>
            <CDP>1</CDP>
            <CONNECTION>
              <IFNUMBER>21</IFNUMBER>
              <SYSMAC>00:24:b5:bd:c8:01</SYSMAC>
            </CONNECTION>
          </CONNECTIONS>
          <IFDESCR>3</IFDESCR>
          <IFNAME>3</IFNAME>
          <IFNUMBER>3</IFNUMBER>
          <IFSPEED>1000000000</IFSPEED>
          <IFSTATUS>1</IFSTATUS>
          <IFINTERNALSTATUS>1</IFINTERNALSTATUS>
          <IFPORTDUPLEX>2</IFPORTDUPLEX>
          <IFTYPE>6</IFTYPE>
          <MAC>b4:39:d6:3b:22:bd</MAC>
          <VLANS>
            <VLAN>
              <NAME>VLAN160</NAME>
              <NUMBER>160</NUMBER>
            </VLAN>
          </VLANS>
        </PORT>
      </PORTS>
    </DEVICE>
    <MODULEVERSION>3.0</MODULEVERSION>
    <PROCESSNUMBER>1</PROCESSNUMBER>
  </CONTENT>
  <DEVICEID>foo</DEVICEID>
  <QUERY>SNMPQUERY</QUERY>
</REQUEST>';

        $networkEquipment        = new \NetworkEquipment();
        $networkPort             = new \NetworkPort();
        $networkPort_NetworkPort = new \NetworkPort_NetworkPort();

        $networkEquipments_id = $networkEquipment->add([
            'entities_id' => 0,
            'name'        => 'sw10',
        ]);
        $this->integer($networkEquipments_id)->isGreaterThan(0);

        // Add a port that will not be used, but needed for the test
        $ports_id = $networkPort->add([
            'mac'                => '00:24:b5:bd:c8:01',
            'name'               => 'port20',
            'logical_number'     => '20',
            'instantiation_type' => 'NetworkPortEthernet',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'ifdescr'         => '20',
        ]);
        $this->integer($ports_id)->isGreaterThan(0);

        // Add the second port right
        $ports_id = $networkPort->add([
            'mac'                => '00:24:b5:bd:c8:01',
            'name'               => 'port21',
            'logical_number'     => '21',
            'instantiation_type' => 'NetworkPortEthernet',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'ifdescr'         => '21',
        ]);
        $this->integer($ports_id)->isGreaterThan(0);

        // Add another port that will not be used, but needed for the test
        $ports_id = $networkPort->add([
            'mac'                => '00:24:b5:bd:c8:01',
            'name'               => 'port22',
            'logical_number'     => '22',
            'instantiation_type' => 'NetworkPortEthernet',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'ifdescr'         => '22',
        ]);
        $this->integer($ports_id)->isGreaterThan(0);

        // Import the switch into GLPI
        $converter = new \Glpi\Inventory\Converter();
        $data = json_decode($converter->convert($xml_source));
        $CFG_GLPI["is_contact_autoupdate"] = 0;
        $inventory = new \Glpi\Inventory\Inventory($data);
        $CFG_GLPI["is_contact_autoupdate"] = 1; //reset to default

        $this->boolean($inventory->inError())->isFalse();
        $this->array($inventory->getErrors())->isIdenticalTo([]);

        // check port
        $this->boolean($networkPort->getFromDBByCrit(['name' => 'port21']));
        $this->boolean($networkPort_NetworkPort->getFromDBForNetworkPort($networkPort->fields['id']))->isTrue();
    }

    public function testSwitchLLDPImport_othercase1()
    {
        $xml_source = '<?xml version="1.0" encoding="UTF-8" ?>
<REQUEST>
  <CONTENT>
    <DEVICE>
      <INFO>
        <TYPE>NETWORKING</TYPE>
        <MANUFACTURER>Hewlett-Packard</MANUFACTURER>
        <MODEL>J9085A</MODEL>
        <DESCRIPTION>ProCurve J9085A</DESCRIPTION>
        <NAME>FR-SW01</NAME>
        <LOCATION>BAT A - Niv 3</LOCATION>
        <CONTACT>Admin</CONTACT>
        <SERIAL>CN536H7J</SERIAL>
        <FIRMWARE>R.10.06 R.11.60</FIRMWARE>
        <UPTIME>8 days, 01:48:57.95</UPTIME>
        <MAC>b4:39:d6:3a:7f:00</MAC>
        <ID>0</ID>
        <IPS>
          <IP>192.168.1.56</IP>
          <IP>192.168.10.56</IP>
        </IPS>
      </INFO>
      <PORTS>
        <PORT>
         <CONNECTIONS>
            <CDP>1</CDP>
            <CONNECTION>
              <IFDESCR>48</IFDESCR>
              <IP>172.16.100.252</IP>
              <MODEL>ProCurve J9148A 2910al-48G-PoE Switch, revision W.14.49, ROM W.14.04 (/sw/code/build/sbm(t4a))</MODEL>
              <SYSDESCR>ProCurve J9148A 2910al-48G-PoE Switch, revision W.14.49, ROM W.14.04 (/sw/code/build/sbm(t4a))</SYSDESCR>
              <SYSNAME>0x78acc0146cc0</SYSNAME>
            </CONNECTION>
          </CONNECTIONS>
          <IFDESCR>3</IFDESCR>
          <IFNAME>3</IFNAME>
          <IFNUMBER>3</IFNUMBER>
          <IFSPEED>1000000000</IFSPEED>
          <IFSTATUS>1</IFSTATUS>
          <IFINTERNALSTATUS>1</IFINTERNALSTATUS>
          <IFPORTDUPLEX>2</IFPORTDUPLEX>
          <IFTYPE>6</IFTYPE>
          <MAC>b4:39:d6:3b:22:bd</MAC>
          <VLANS>
            <VLAN>
              <NAME>VLAN160</NAME>
              <NUMBER>160</NUMBER>
            </VLAN>
          </VLANS>
        </PORT>
      </PORTS>
    </DEVICE>
    <MODULEVERSION>3.0</MODULEVERSION>
    <PROCESSNUMBER>1</PROCESSNUMBER>
  </CONTENT>
  <DEVICEID>foo</DEVICEID>
  <QUERY>SNMPQUERY</QUERY>
</REQUEST>';

        $networkEquipment        = new \NetworkEquipment();
        $networkPort             = new \NetworkPort();
        $networkPort_NetworkPort = new \NetworkPort_NetworkPort();

        $networkEquipments_id = $networkEquipment->add([
            'entities_id' => 0,
            'name'        => 'sw001',
        ]);
        $this->integer($networkEquipments_id)->isGreaterThan(0);

        // Add management port
        $mngtports_id = $networkPort->add([
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'instantiation_type' => 'NetworkPortAggregate',
            'name'               => 'general',
            '_create_children'   => 1,
            'NetworkName_name'   => '',
            'NetworkName_fqdns_id' => 0,
            'NetworkName__ipaddresses' => [
                '-1' => '172.16.100.252'
            ],
        ]);
        $this->integer($mngtports_id)->isGreaterThan(0);

        // Add a port that will not be used, but needed for the test
        $ports_id = $networkPort->add([
            'name'               => 'port47',
            'logical_number'     => '47',
            'instantiation_type' => 'NetworkPortEthernet',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'ifdescr'         => '47',
        ]);
        $this->integer($ports_id)->isGreaterThan(0);

        // Add the second port right
        $ports_id = $networkPort->add([
            'name'               => 'port48',
            'logical_number'     => '48',
            'instantiation_type' => 'NetworkPortEthernet',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'ifdescr'         => '48',
        ]);
        $this->integer($ports_id)->isGreaterThan(0);

        // Add another port that will not be used, but needed for the test
        $ports_id = $networkPort->add([
            'name'               => 'port49',
            'logical_number'     => '49',
            'instantiation_type' => 'NetworkPortEthernet',
            'items_id'           => $networkEquipments_id,
            'itemtype'           => 'NetworkEquipment',
            'ifdescr'         => '49',
        ]);
        $this->integer($ports_id)->isGreaterThan(0);

        // Import the switch into GLPI
        $converter = new \Glpi\Inventory\Converter();
        $data = json_decode($converter->convert($xml_source));
        //$json = json_decode($data);
        $CFG_GLPI["is_contact_autoupdate"] = 0;
        $inventory = new \Glpi\Inventory\Inventory($data);
        $CFG_GLPI["is_contact_autoupdate"] = 1; //reset to default

        $this->boolean($inventory->inError())->isFalse();
        $this->array($inventory->getErrors())->isIdenticalTo([]);

        // check port
        $this->boolean($networkPort->getFromDBByCrit(['name' => 'port48']));
        $this->boolean($networkPort_NetworkPort->getFromDBForNetworkPort($networkPort->fields['id']))->isTrue();
    }
}
