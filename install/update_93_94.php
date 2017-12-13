<?php
/**
 * ---------------------------------------------------------------------
 * GLPI - Gestionnaire Libre de Parc Informatique
 * Copyright (C) 2015-2018 Teclib' and contributors.
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

/**
 * Update from 9.3 to 9.4
 *
 * @return bool for success (will die for most error)
**/
function update93to94() {
   global $DB, $migration, $CFG_GLPI;
   $dbutils = new DbUtils();

   $current_config   = Config::getConfigurationValues('core');
   $updateresult     = true;
   $ADDTODISPLAYPREF = [];

   //TRANS: %s is the number of new version
   $migration->displayTitle(sprintf(__('Update to %s'), '9.4'));
   $migration->setVersion('9.4');

   /** Add otherserial field on ConsumableItem */
   if (!$DB->fieldExists('glpi_consumableitems', 'otherserial')) {
      $migration->addField("glpi_consumableitems", "otherserial", "varchar(255) NULL DEFAULT NULL");
      $migration->addKey("glpi_consumableitems", 'otherserial');
   }
   /** /Add otherserial field on ConsumableItem */

   /** Add business rules on assets */
   $rule = ['name'         => 'Domain user assignation',
            'is_active'    => 1,
            'is_recursive' => 1,
            'sub_type'     => 'RuleAsset',
            'condition'    => 3,
            'entities_id'  => 0,
            'uuid'         => 'fbeb1115-7a37b143-5a3a6fc1afdc17.92779763',
            'match'        => \Rule::AND_MATCHING
           ];
   $criteria = [
      ['criteria' => '_itemtype', 'condition' => \Rule::PATTERN_IS, 'pattern' => 'Computer'],
      ['criteria' => '_auto', 'condition' => \Rule::PATTERN_IS, 'pattern' => 1],
      ['criteria' => 'contact', 'condition' => \Rule::REGEX_MATCH, 'pattern' => '/(.*)@/']
   ];
   $action = [['action_type' => 'regex_result', 'field' => '_affect_user_by_regex', 'value' => '#0']];
   $migration->createRule($rule, $criteria, $action);

   $rule = ['name'         => 'Multiple users: assign to the first',
            'is_active'    => 1,
            'is_recursive' => 1,
            'sub_type'     => 'RuleAsset',
            'condition'    => 3,
            'entities_id'  => 0,
            'uuid'         => 'fbeb1115-7a37b143-5a3a6fc1b03762.88595154',
            'match'        => \Rule::AND_MATCHING
           ];
   $criteria = [
      ['criteria' => '_itemtype', 'condition' => \Rule::PATTERN_IS, 'pattern' => 'Computer'],
      ['criteria' => '_auto', 'condition' => \Rule::PATTERN_IS, 'pattern' => 1],
      ['criteria' => 'contact', 'condition' => \Rule::REGEX_MATCH, 'pattern' => '/(.*),/']
   ];
   $migration->createRule($rule, $criteria, $action);

   $rule = ['name'         => 'One user assignation',
            'is_active'    => 1,
            'is_recursive' => 1,
            'sub_type'     => 'RuleAsset',
            'condition'    => 3,
            'entities_id'  => 0,
            'uuid'         => 'fbeb1115-7a37b143-5a3a6fc1b073e1.16257440',
            'match'        => \Rule::AND_MATCHING
           ];
   $criteria = [
      ['criteria' => '_itemtype', 'condition' => \Rule::PATTERN_IS, 'pattern' => 'Computer'],
      ['criteria' => '_auto', 'condition' => \Rule::PATTERN_IS, 'pattern' => 1],
      ['criteria' => 'contact', 'condition' => \Rule::REGEX_MATCH, 'pattern' => '/(.*)/']
   ];
   $migration->createRule($rule, $criteria, $action);

   if (!countElementsInTable('glpi_profilerights', ['profiles_id' => 4, 'name' => 'rule_asset'])) {
      $DB->query("INSERT INTO `glpi_profilerights` VALUES ('NULL','4','rule_asset','255')");
   }
   /** Add business rules on assets */

   // ************ Keep it at the end **************
   $migration->executeMigration();

   return $updateresult;
}