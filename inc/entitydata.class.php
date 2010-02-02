<?php
/*
 * @version $Id$
 -------------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2009 by the INDEPNET Development Team.

 http://indepnet.net/   http://glpi-project.org
 -------------------------------------------------------------------------

 LICENSE

 This file is part of GLPI.

 GLPI is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 GLPI is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with GLPI; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 --------------------------------------------------------------------------
 */

// ----------------------------------------------------------------------
// Original Author of file: Julien Dombre
// Purpose of file:
// ----------------------------------------------------------------------

if (!defined('GLPI_ROOT')){
   die("Sorry. You can't access directly to this file");
}

/**
 * Entity Data class
 */
class EntityData extends CommonDBTM {

   // From CommonDBTM
   public $table = 'glpi_entitydatas';
   // link in message dont work (no showForm)
   public $auto_message_on_action = false;

   // Array of "right required to update" => array of fields allowed
   private static $field_right = array(
                  // Address
                 'entity' => array('address', 'postcode', 'postcode', 'town', 'state', 'country',
                                   'website', 'phonenumber', 'fax', 'email', 'notepad'),
                 // Advanced (could be user_authtype ?)
                 'entity' => array('ldap_dn', 'tag', 'ldapservers_id', 'entity_ldapfilter'),
                 // Notification
                 'notification' => array('admin_email', 'admin_reply', 'mailing_signature',
                                         'cartridges_alert_repeat', 'consumables_alert_repeat',
                                         'use_licenses_alert'));
/*
   function getEmpty() {
      global $CFG_GLPI;
      $this->fields['cartridges_alert_repeat'] = -1;
      $this->fields['consumables_alert_repeat'] = -1;
      $this->fields['use_licenses_alert'] = 0;
      $this->fields['mailing_signature'] = '';
   }
*/
   function getIndexName() {
      return 'entities_id';
   }

   function canCreate() {
      return haveRight('entity', 'w') || haveRight('notification', 'w');
   }

   function canView() {
      return haveRight('entity', 'r');
   }

   function prepareInputForAdd($input) {

      foreach (self::$field_right as $right => $fields) {
         if (!haveRight($right, 'w')) {
            foreach ($fields as $field) {
               if (isset($input[$field])) {
                  unset($input[$field]);
               }
            }
         }
      }
      return $input;
   }

   function prepareInputForUpdate($input) {
      return $this->prepareInputForAdd($input);
   }

   /**
    *
    */
   static function showStandardOptions(Entity $entity) {
      global $DB, $LANG;

      $con_spotted=false;

      $ID = $entity->getField('id');
      if (!$entity->can($ID,'r')) {
         return false;
      }

      // Entity right applied
      $canedit=$entity->can($ID,'w');

      // Get data
      $entdata=new EntityData();
      if (!$entdata->getFromDB($ID)) {
         $entdata->getEmpty();
      }


      if ($canedit) {
         echo "<form method='post' name=form action='".getItemTypeFormURL(__CLASS__)."'>";
      }
      echo "<table class='tab_cadre_fixe'>";


      echo "<tr><th colspan='4'>".$LANG['financial'][44]."</th></tr>";


      echo "<tr class='tab_bg_1'>";
      echo "<td>".$LANG['help'][35]."&nbsp;:</td>";
      echo "<td>";
      autocompletionTextField($entdata, "phonenumber");
      echo "</td>";
      echo "<td rowspan='6'>".$LANG['financial'][44]."&nbsp;:</td>";
      echo "<td rowspan='6'><textarea cols='45' rows='6' name='address'>".
             $entdata->fields["address"]."</textarea></td></tr>";

      echo "<tr class='tab_bg_1'>";
      echo "<td>".$LANG['financial'][30]."&nbsp;:</td>";
      echo "<td>";
      autocompletionTextField($entdata, "fax");
      echo "</td></tr>";
      echo "<tr class='tab_bg_1'>";
      echo "<td>".$LANG['financial'][45]."&nbsp;:</td>";
      echo "<td>";
      autocompletionTextField($entdata, "website");
      echo "</td></tr>";

      echo "<tr class='tab_bg_1'>";
      echo "<td>".$LANG['setup'][14]."&nbsp;:</td>";
      echo "<td>";
      autocompletionTextField($entdata, "email");
      echo "</td></tr>";

      echo "<tr class='tab_bg_1'>";
      echo "<td>".$LANG['financial'][100]."&nbsp;:</td>";
      echo "<td>";
      autocompletionTextField($entdata,"postcode",array('size' => 7));
      echo "&nbsp;".$LANG['financial'][101]."&nbsp;:&nbsp;";
      autocompletionTextField($entdata, "town", array('size'=>25));
      echo "</td></tr>";

      echo "<tr class='tab_bg_1'>";
      echo "<td>".$LANG['financial'][103]."&nbsp;:</td>";
      echo "<td>";
      autocompletionTextField($entdata, "state");
      echo "</td></tr>";

      if ($canedit) {
         echo "<tr>";
         echo "<td class='tab_bg_2 center' colspan='4'>";
         echo "<input type='hidden' name='entities_id' value='$ID'>";
         if ($entdata->fields["id"]) {
            echo "<input type='hidden' name='id' value=\"".$entdata->fields["id"]."\">";
            echo "<input type='submit' name='update' value=\"".$LANG['buttons'][7]."\" class='submit' >";
         } else {
            echo "<input type='submit' name='add' value=\"".$LANG['buttons'][7]."\" class='submit' >";
         }
         echo "</td></tr>";
         echo "</table></form>";
      } else {
         echo "</table>";
      }
   }

   /**
    *
    */
   static function showAdvancedOptions(Entity $entity) {
      global $DB, $LANG;

      $con_spotted=false;

      $ID = $entity->getField('id');
      if (!$entity->can($ID,'r')) {
         return false;
      }

      // Entity right applied (could be user_authtype)
      $canedit=$entity->can($ID,'w');

      // Get data
      $entdata=new EntityData();
      if (!$entdata->getFromDB($ID)) {
         $entdata->getEmpty();
      }


      if ($canedit) {
         echo "<form method='post' name=form action='".getItemTypeFormURL(__CLASS__)."'>";
      }
      echo "<table class='tab_cadre_fixe'>";

      echo "<tr><th colspan='4'>".$LANG['entity'][14]."</th></tr>";

      echo "<tr><th colspan='4'>".$LANG['login'][2]."</th></tr>";
      echo "<tr class='tab_bg_1'>";
      echo "<td>".$LANG['entity'][15]."&nbsp;:</td>";
      echo "<td>";
      Dropdown::show('AuthLDAP',
                     array ('name'=>'ldapservers_id',
                            'value'=> $entdata->fields['ldapservers_id']));
      echo "</td>";
      echo "<td>".$LANG['entity'][12]."&nbsp;:</td>";
      echo "<td>";
      autocompletionTextField($entdata, "ldap_dn");
      echo "</td></tr>";

      echo "<tr class='tab_bg_1'>";
      echo "<td>".$LANG['entity'][16]."&nbsp;:</td>";
      echo "<td colspan='3'><input type='text' name='entity_ldapfilter'
                   value='".$entdata->fields['entity_ldapfilter']."' size='100'>";
      echo "</td></tr>";

      echo "<tr><th colspan='4'>".$LANG['Menu'][33]."</th></tr>";
      echo "<tr class='tab_bg_1'>";
      echo "<td>".$LANG['entity'][13]."&nbsp;:</td>";
      echo "<td>";
      autocompletionTextField($entdata, "tag");
      echo "</td><td colspan='2'></td></tr>";


      if ($canedit) {
         echo "<tr>";
         echo "<td class='tab_bg_2 center' colspan='4'>";
         echo "<input type='hidden' name='entities_id' value='$ID'>";
         if ($entdata->fields["id"]) {
            echo "<input type='hidden' name='id' value=\"".$entdata->fields["id"]."\">";
            echo "<input type='submit' name='update' value=\"".$LANG['buttons'][7]."\" class='submit' >";
         } else {
            echo "<input type='submit' name='add' value=\"".$LANG['buttons'][7]."\" class='submit' >";
         }
         echo "</td></tr>";
         echo "</table></form>";
      } else {
         echo "</table>";
      }
   }

   static function showNotificationOptions(Entity $entity) {
      global $DB, $LANG, $CFG_GLPI;

      $con_spotted=false;

      $ID = $entity->getField('id');
      if (!$entity->can($ID,'r')) {
         return false;
      }

      // Notification right applied
      $canedit = haveRight('notification','w') && haveAccessToEntity($ID);

      // Get data
      $entitynotification=new EntityData();
      if (!$entitynotification->getFromDB($ID)) {
         $entitynotification->getEmpty();
      }

      if ($canedit) {
         echo "<form method='post' name=form action='".getItemTypeFormURL(__CLASS__)."'>";
      }
      echo "<table class='tab_cadre_fixe'>";

      echo "<tr><th colspan='4'>".$LANG['setup'][240]."</th></tr>";

      echo "<tr class='tab_bg_1'>";
      echo "<td>".$LANG['setup'][203]."&nbsp;:</td>";
      echo "<td>";
      autocompletionTextField($entitynotification, "admin_email");
      echo "</td>";
      echo "<td rowspan='2' class='middle right'>" . $LANG['setup'][204] . "</td>";
      echo "<td rowspan='2' class='middle right'><textarea cols='60' rows='5' name=\"mailing_signature\" >".
                 $entitynotification->fields["mailing_signature"]."</textarea></td></tr>";

      echo "<tr class='tab_bg_1'>";
      echo "<td>".$LANG['setup'][207]."&nbsp;:</td>";
      echo "<td>";
      autocompletionTextField($entitynotification, "admin_reply");
      echo "</td></tr>";

      echo "<tr><th colspan='4'>".$LANG['setup'][242]."</th></tr>";
      echo "<tr class='tab_bg_1'>";
      echo "<td>" . $LANG['setup'][245] . " " . $LANG['setup'][244] . "</td><td>";

      $default_value = ($entitynotification->fields['cartridges_alert_repeat']?
                           $entitynotification->fields['cartridges_alert_repeat']:-1);
      Alert::dropdown(array('name'=>'cartridges_alert_repeat',
                            'value'=>$default_value,
                            'inherit_global'=>1));

      echo "</td>";
      echo "<td>" . $LANG['setup'][245] . " " . $LANG['setup'][243] . "</td><td>";
      $default_value = ($entitynotification->fields['consumables_alert_repeat']?
                           $entitynotification->fields['consumables_alert_repeat']:-1);
      Alert::dropdown(array('name'=>'consumables_alert_repeat',
                            'value'=>$default_value,
                            'inherit_global'=>1));

      echo "</td></tr>";
      echo "<tr class='tab_bg_1'><td>" . $LANG['setup'][264] . "</td><td>";
      Dropdown::showYesNo("use_licenses_alert", $entitynotification->fields["use_licenses_alert"]);
      echo "<td colspan='2'></td>";
      echo "</td></tr>";

      if ($canedit) {
         echo "<tr>";
         echo "<td class='tab_bg_2 center' colspan='4'>";
         echo "<input type='hidden' name='entities_id' value='$ID'>";
         if (isset($entitynotification->fields["id"])) {
            echo "<input type='hidden' name='id' value=\"".$entitynotification->fields["id"]."\">";
            echo "<input type='submit' name='update' value=\"".$LANG['buttons'][7]."\" class='submit' >";
         } else {
            echo "<input type='submit' name='add' value=\"".$LANG['buttons'][7]."\" class='submit' >";
         }
         echo "</td></tr>";
         echo "</table></form>";
      } else {
         echo "</table>";
      }
   }

   private static function getEntityIDByField($field,$value) {
      global $DB;

      $sql = "SELECT `entities_id`
              FROM `glpi_entitydatas`
              WHERE ".$field."='".$value."'";

      $result = $DB->query($sql);
      if ($DB->numrows($result)==1) {
         return $DB->result($result,0,"entities_id");
      } else {
         return -1;
      }
   }

   static function getEntityIDByDN($value) {
      return self::getEntityIDByField("ldap_dn",$value);
   }

   static function getEntityIDByTag($value) {
      return self::getEntityIDByField("tag",$value);
   }

}

?>
